<?php 
	include 'connect.php';
	session_start();
	error_reporting(0);
	if(isset($_POST['login'])){
		$name = $_POST['username'];
		$password = $_POST['password'];
		
		$log = mysqli_query($con, "select * from user where name = '$name' OR email = '$name' AND password = '$password'");
		if(mysqli_num_rows($log) >  0){	// 1 > 0 true
			$user = mysqli_fetch_assoc($log);	// array user 
			//print_r($user);
			$_SESSION['user'] = array('id' => $user['id'], 'name' => $user['name'], 'email' => $user['email'], 'number' => $user['mobile']);
			// echo $_SESSION['log'] = $user['id'];	// user, id
			// $_SESSION['name'] = $user['name'];	//user, name
			echo "1";
		}else{
			echo '2';
		}
		exit;
	}
	$title='Login US';
	include'menu.php'; 
?>
<head>
		<style type="text/css"> 
		.err{
			border: 1px solid red;
		}
		body{
			background-image: url(assets/img/bw2.jpg);
			background-size: cover;
			background-attachment: fixed;
			font-family: calibri light;
			height: 90vh;
		}
		.login{
			margin-top: 100px;
		}
		.log{
			
		}
		.but1{
			
			background:transparent;
		}
			
		</style>
		<link rel="stylesheet" type="text/css" href="assets/login2.css">
	</head>
	<div class="login mb-5">
		<div class="container">
										
			<div class="row log">
					<div class="col-md-5"></div>
					<div class="col-md-2" style="text-align: center;">
						<h1 class="btn btn-default btn-block mt-5 but1"><h3>Login us</h3></h1>	
					</div>
					<div class="col-md-5"></div>
				
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<form id="loginform">
							
						<div class='alert alert-danger error' style="display: none;">Please check your username & password</div>
						<input type="text" class="form-control username" placeholder="Enter Name" name="username">
						<span class="err_username" style="color: red;font-size: 17px;display: none;">Enter username</span><br>
						<input type="password" name="password" class="form-control pwd" placeholder="Enter password">
						<span class="err_pwd" style="color: red;font-size: 17px;display: none;">Enter password</span><br>
						<button class="btn btn-success btn-block" id="login" name="login" type="button"><i class="fa fa-sign-in"></i> Sign in</button>
						
						<center><h3 class="btn btn-danger m-1 but1"> <b>OR </b> </h3></center>
						<!-- <p>Don't have an account!</p>  -->
						
						<a href="signup.php" class="btn btn-primary btn-block mb-5 <?php if($title == 'signup') { echo 'active'; } ?>"><i class="fa fa-user-plus"></i> Sign up New Account</a>	
						
				</div>
				<div class="col-md-4"></div>
			</div>
		</div>
	</div>
	<script src="assets/js/jquery.min.js"></script>
 <script type="text/javascript">
    $('#login').click(function(){
          var username = $('.username').val();
          var pwd = $('.pwd').val();
          if(username!='' && pwd!='')
          { 
            var form = document.getElementById('loginform');
            var data = new FormData(form);
            data.append('login','1');
              $.ajax({
                url:'login1.php',        
                type:'post',
                data: data,
                processData: false,  
                contentType: false ,            
                success:function(result)
                    {
                      // alert(result);die();
                      if(result==1){
                      	alert('You are Loged In.')
                        $('.username').val('');
                        $('.pwd').val('');
                        document.location = 'index.php';
                      }else if(result==2){
                      	$('.error').show();
                      	$('.err_username').hide();
               			$('.err_pwd').hide();
                		$('.username').addClass('err');
                		$('.pwd').addClass('err');

                      }
                    }
                });
          }
          else{
              if(username=='')
              {
                $('.err_username').show();
                $('.username').addClass('err');
              }
              else{
                $('.err_username').hide();
                $('.username').removeClass('err');  
              }
            if(pwd=='')
              {
                $('.err_pwd').show();
                $('#login').css('margin-top', '15px');
                $('.pwd').addClass('err');  
              }
              else{
                $('.err_pwd').hide();
                $('.pwd').removeClass('err');  
              }
          } 
        });
</script>