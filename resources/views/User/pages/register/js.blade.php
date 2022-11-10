<script>
    $(document).ready(function () {
        $("#confirmpassword").keyup(function () { 
          var cfpassword = $('#confirmpassword').val();
          var password = $('#password').val();
           if (cfpassword == password) {
                $('#successpass').removeClass("showandHide");
                $('#failpass').addClass("showandHide");
                return true;
           
           } 
      
           else {
            $('#failpass').removeClass("showandHide");
            $('#successpass').addClass("showandHide");
            return false;
           }
        });
    });
</script>