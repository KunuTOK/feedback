$(document).ready(function(){

    var email = '';
  
    $('#email').keyup(function(){
        var value = $(this).val();
  
        $.ajax({
            type:'POST',
            url:'from.php',
            data:'email='+value,
            success:function(msg){
  
              if(msg == 'valid'){
                $('#message').html('<font color="green">Этот Email можно использовать.</font>');
                email = value;
              }else{
                $('#message').html('<font color="red">Этот Email уже занят.</font>');
              }
            }
          });
      });  
  });