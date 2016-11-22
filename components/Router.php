<?php

class Router {
    private $routes; //будет масив
    
    public function __construct() {
        $routesPath=ROOT.'/config/routes.php';
        $this->routes= include ($routesPath); //таким хитрым способом присваюем масив с routes
    }
    private function getUri() {
       if(!empty($_SERVER['REQUEST_URI'])){
           return trim($_SERVER['REQUEST_URI'],'/');//trim-Удаляет пробелы из начала и конца строки
       }
    }
    public function run() {
        //получить строку запроса
        //Проверить наличие такого запроса в роутс
        //Если есть совпадения, определить какой контроллер и екшн обработает запрос
        //подключить файл класа-контроллера
        //создать обьект вызвать екшн
        $uri = $this->getUri();
        foreach ($this->routes as $uriPattern=>$path){
            if(preg_match("~$uriPattern~", $uri)){//совпадение с нашими маршрутами
                //получаем внутренний путь из внешнего соласно правилу
                $internalRoute = preg_replace("~$uriPattern~",$path,$uri);
                //определить контроллер, екшн и параметры
                $segments = explode('/', $internalRoute); //массив с разделителем
                
                array_shift($segments);//убираем shop
                $controllerName= array_shift($segments).'Controller';//array_shift вытягивает с масива 1й елемент и удаляет его
                $controllerName= ucfirst($controllerName);//делаем название контроллера
                $actionName='action'.ucfirst(array_shift($segments));
                $parameters=$segments;
                //подключить файл класа-контроллера
                $controllerFile = ROOT.'/controllers/'.$controllerName.'.php';
                if(file_exists($controllerFile)){
                    include_once ($controllerFile);
                }
                
                //создать обьект, вызвать метод

                $controllerObject = new $controllerName();

                $result = call_user_func_array(array($controllerObject, $actionName), $parameters);
               
                if($result!=null){
                    break;//если проверка прошла, заканчиваем цикл поиска маршрута
                }
            }
        }      
    }
    
}
