<?php
	session_start();
	include("connect.php");
	if(isset($_SESSION["u_name"]))
	{
		header("location:http://$_SESSION[photo_art]");
	}
	else
	{
		
	} 

?>
<?php
	
    if(isset($_POST["login_data"]))
        {
        $username=mysqli_real_escape_string($con,$_POST['username']);
        $password=mysqli_real_escape_string($con,$_POST['password']);

        $query_login="select * from admin where name='$username' and password='$password'";
        $res_login=mysqli_query($con,$query_login);
            if(!$res_login)
            {
             die("Could Not Execute Query.".mysqli_error($con));
            }
            else
            {
                $num_login=mysqli_num_rows($res_login);
                if($num_login>0)
                {
                    $fetch_login=mysqli_fetch_assoc($res_login);
                    $_SESSION["u_name"]=$fetch_login["name"];
                    //$_SESSION["user_id"]=$fetch_login["user_id"]; 
                    echo '1';
                }
                else
                {
                    echo '0';
                }
            }       
    }
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <!--== META TAGS ==-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!--== FAV ICON ==-->
    <link rel="shortcut icon" href="">

    <!-- GOOGLE FONTS -->
    <link href="assets/css/font.css" rel="stylesheet">

    <!-- FONT-AWESOME ICON CSS -->
    <link rel="stylesheet" href="assets/css/login/font-awesome.min.css">

    <!--== ALL CSS FILES ==-->
    <link rel="stylesheet" href="assets/css/login/style.css">
    <link rel="stylesheet" href="assets/css/login/mob.css">
    <link rel="stylesheet" href="assets/css/login/bootstrap.css">
    <link rel="stylesheet" href="assets/css/login/materialize.css" />
    <style type="text/css">
        .error{
            border: 1px solid #f00;
            
        }
    </style>

</head>

<body>
    <div class="blog-login">
        <div class="blog-login-in">
            <form>
                <img src="assets/images/logo.jpg" alt="" />
                <div class="row">
                    <div class="input-field col s12">
                        <input id="first_name1" name="username" autofocus="" type="text" class="validate uname">
                        <label for="first_name1">User Name</label>
                    </div>
                </div>
                <div style="display: none;" class="error_uname">
                    Please enter your username
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="last_name" type="password" name="password" class="validate pwd">
                        <label for="last_name">Password</label>
                    </div>
                </div>
                <div class="error_pwd"></div>
                <div class="error_msg" style="display: none;color: #f00;font-size: 16px;">Please enter valid UserName & Password</div>
                <div class="row">
                    <div class="input-field col s12">
                        <a class="waves-effect waves-light btn-large btn-log-in login" name="login" >Login</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!--======== SCRIPT FILES =========-->
    <script src="assets/js/login/jquery.min.js"></script>
    <script src="assets/js/login/bootstrap.min.js"></script>
    <script src="assets/js/login/materialize.min.js"></script>
    <script src="assets/js/login/custom.js"></script>
    <script src="assets/js/login/ajax-jquery.js"></script>

    <script type="text/javascript">
        $('.login').click(function(){
            //alert('');
            var username=$('.uname').val();
            var password=$('.pwd').val();

            if(username!="" & password!="")
            {
                $.ajax({
                      url: 'index.php',  
                      type: 'POST',   
                      data: {username:username,password:password,login_data:1}, 
                      success:function(data)     
                              {
                                 if(data==0)
                                 {
                                  $('.uname').addClass('error');
                                  $('.pwd').addClass('error');
                                  $('.error_msg').show();
                                  $('.uname').focus();
                                 }
                                 else
                                 {
                                   $('.uname').removeClass('error');
                                   $('.error_uname').hide();
                                   $('.pwd').removeClass('error');
                                   $('.error_pwd').hide();

                                   //$('.error_msg').hide();
                                   document.location='home.php'; 
                                 }
                              }
                      });
                
            }
            else
            {   
                if(username=="")
                {
                   $('.uname').addClass('error');
                   $('.error_uname').show();
                   $('.error_uname').css("color","#f00");
                }
                else
                {
                    $('.uname').removeClass('error');
                    $('.error_uname').hide();
                }
                if(password=="")
                {
                    $('.pwd').addClass('error');
                    $('.error_pwd').html('Please enter your password');
                    $('.error_pwd').css("color","#f00");
                }
                else
                {
                    $('.pwd').removeClass('error');
                    $('.error_pwd').hide();
                }
            }
        });
    </script>
</body>
</html>