<?php
	require 'connect.php';
	$title='Sign up';
	if(isset($_POST['register'])){ //check button submit or not
			$name = $_POST['name'];	// fetch form data and store in variable
			$email = $_POST['email'];
			$number = $_POST['number'];
			$pwd = $_POST['pwd'];
			
				//email allready exists
				$select = mysqli_query($con,"select * from user where email = '$email' ");
				$num = mysqli_num_rows($select);
				if($num>0)
				{
					echo '2';
				}else{
					
					// insert query
					$inst = mysqli_query($con,"insert into user(name , mobile , email , password)values('$name', '$number'  ,'$email' ,  '$pwd')");
					if($inst>0){
						echo '1';
					}
				}
			exit;
	}
	
 ?>

<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="assets/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		 <link rel="icon" href="assets/img/logo.jpg" type="image/jpg">
		  <title>Photography || <?php echo $title ?></title>
		<style type="text/css">
			
			body{
			background-image: url('assets/img/bw2.jpg');
			background-size: cover;
			height: 100%;
			font-family: 'Numans', sans-serif;
			}

			.container{
			height: 100%;
			align-content: center;
			}
			.social_icon span{
			font-size: 60px;
			margin-left: 10px;
			color: #E8F5E9;
			}

			.social_icon span:hover{
			color: white;
			cursor: pointer;
			}
			.social_icon{
			position: absolute;
			right: 20px;
			top: -45px;
			}

			.card-header h3{
			color:yellow;
			}
			.card{
			height: 620px;
			margin-top: auto;
			margin-bottom: auto;
			width: 400px;
			background-color: rgba(0,0,0,0.5) !important;
			}
			.input-group-prepend span{
			width: 50px;
			background-color: #FFC312;
			color: black;
			}
			.remember{
			color: blue;
			}

			.remember input
			{
			width: 20px;
			height: 20px;
			margin-left: 15px;
			margin-right: 5px;
			}

			.login_btn{
			color: black;
			background-color: #FFC312;
			width: 100px;
			}

			.login_btn:hover{
			color: black;
			background-color: white;
			}
			.err{
				border: 1.5px solid red !important;
			}
			</style>
		<script src="assets/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" >

		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" >

		<!-- <link rel="stylesheet" type="text/css" href="assets/style.css"> -->
	</head>
	<body>
		<div class="container">
			<div class="d-flex justify-content-center h-100">
				<div class="card">
					<div class="card-header text-warning">
						<h3 class="text-warning"><center> Sign up</center></h3>
					</div>
					<div class="card-body">
							<div class="float-right text-danger " style="font-size: 18px;color: red;">* All fields are required</div>
						<form id="registerform">	
						  <div class="form-group text-white">
							<label for="UserName">UserName<span style="font-size: 18px;color: red;">*</span></label>
							<input type="text" class="form-control name" name="name" placeholder="Enter Name" >
						  </div>
						  
						  <div class="form-group text-white">
							<label for="email">Email ID<span style="font-size: 18px;color: red;">*</span></label>
							<input type="email" class="form-control email" name="email" placeholder="Enter Email" >
						  </div>
						  
						  <div class="form-group text-white">
							<label for="email">Mobile Number<span style="font-size: 18px;color: red;">*</span></label>
							<input type="number" class="form-control number" name="number" placeholder="Enter Number" >
						  </div>

						  <div class="form-group text-white">
							<label for="pwd">Password<span style="font-size: 18px;color: red;">*</span></label>
							<input type="password" class="form-control pwd" name="pwd" placeholder="Enter Password">
						  </div>

						  <div class="form-group text-white">
							<label for="pwd">Confirm Password<span style="font-size: 18px;color: red;">*</span></label>
							<input type="password" class="form-control pwd1" name="pwd1" placeholder="Confirm Password">
						  </div>
						  <div class="form-group form-check">
								<input type="checkbox" class="form-check-input" id="exampleCheck1" >
								<label class="form-check-label text-white" for="exampleCheck1">I accept the <span style="color:#2196f3;">Term of use</span> & <span style="color:#2196f3;">Privacy Policy.</span></label>
							  </div>
							<input  type="button" class="btn btn-primary register" id="register" name="submit" value="Sign UP"><span style="text-decoration:none;" "color:white;"></span>
							<a href="login1.php" class="btn btn-primary">Sign IN</a>
						</form><br>
					</div>
					
				</div>
			</div>
		</div>
	</body>
</html>
<script src="assets/js/jquery.min.js"></script>
 <script type="text/javascript">
    $('#register').click(function(){
          var name = $('.name').val();
          var email = $('.email').val();
          var number = $('.number').val();
          var pwd = $('.pwd').val();
          var pwd1 = $('.pwd1').val();
          if(name!='' && email!='' && number!='' && pwd!='' && pwd1!='' && pwd==pwd1)
          { 
            var form = document.getElementById('registerform');
            var data = new FormData(form);
            data.append('register','1');
              $.ajax({
                url:'signup.php',        
                type:'post',
                data: data,
                processData: false,  
                contentType: false ,            
                success:function(result)
                    {
                      // alert(result);die();
                      if(result==1){
                      	alert('Data Insert Successfully.')
                        $('.name').val('');
                        $('.email').val('');
                        $('.number').val('');
                        $('.pwd').val('');
                        $('.pwd1').val('');
                        document.location = 'login1.php';
                      }else if(result==2){
                      	alert('Email Allready Exist!');
                      	$('.email').addClass('err');
                      }
                    }
                });
          }
          else{
              if(name=='')
              {
                $('.name').addClass('err');
              }
              else{
                $('.name').removeClass('err');  
              }
            if(email=='')
              {
                $('.email').addClass('err');  
              }
              else{
                $('.email').removeClass('err');  
              }
            if(number=='')
              {
                $('.number').addClass('err');  
              }
              else{
                $('.number').removeClass('err');  
              }
            if(pwd=='')
              {
                $('.pwd').addClass('err');  
              }
              else{
                $('.pwd').removeClass('err');  
              }
            if(pwd1=='')
              {
                $('.pwd1').addClass('err');  
              }
              else{
                $('.pwd1').removeClass('err');  
              }
           	if(pwd!=pwd1){
           		alert('Confirm password does not matched!')
           	}
          } 
        });
</script>