<div id="footer">
test-shop desinged by Ann Bernadska&nbsp &nbsp &nbsp
</div>

<script type="text/javascript">
     
     
            $(document).ready(function(){
               $(".add-to-cart").click(function(){
                 
                 var id=$(this).attr('data-id');
                  $.post("/cart/addAjax/"+id,{},function (data){//адрес, параметры, и функция которая обработает результат
                      $("#cart-count").html(data);
//                      console.log((data));
                  });
                  return false;
                  });
               });
</script>
</div>
</body>
</html>
