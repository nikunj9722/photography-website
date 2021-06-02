<?php
require 'connect.php';
if(isset($_POST['contact_id'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    //insert data
    $insert = "insert into contact(`id`, `name`, `email`, `subject`, `message`) VALUES ('','$name','$email','$subject','$message')";
    $query = mysqli_query($con,$insert);
    if(!$query>0){
      echo '1';
    }else{
      echo "0";
    }
    exit;
}
  

$title ="Contact US";
include "menu.php";
?>
<style type="text/css">
    li{
      list-style: none;
    }
</style>
<section class="wrapper">
    <section class="content">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div>
              <h4 class="text-muted"><span>Contact US</span></h4>
            </div>
             <h1>Nikunj Photography</h1>
             <ul>
              <li><i class="fa fa-camera"></i><p><strong>Camera</strong> Canon EOS 80D</p></li>
            <div class="alert alert-success contactSuccess  alert-dismissable" id="contactSuccess" style="display: none;">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <strong>Success!</strong> Your message has been sent.
            </div>
            <div class="alert alert-danger contactError" id="contactError" style="display: none;">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <strong>Error!</strong> There was an error sending your message.
            </div>
            <form id="contactForm" name="contact">
                <div class="row form-group">
                  <div class="col-lg-6">
                    <input type="text" id="name" name="name" class="form-control name" maxlength="100" placeholder="Your Name*" >
                    <label class="err_name" style="color: red;margin-left: 0.7pc;display: none;"> Please enter your name </label>
                  </div>
                      <div class="col-lg-6 ">
                        <input type="email" id="email" name="email" class="form-control email" maxlength="100" v placeholder="Your E-mail*" >
                        <label class="err_email" style="color: red;margin-left: 0.7pc;display: none;"> Please enter your email </label>
                      </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-12">
                      <input type="text" id="subject" name="subject" class="form-control subject" maxlength="100" placeholder="Subject*">
                      <label class="err_subject" style="color: red;margin-left: 0.7pc;display: none;"> Please enter your subject </label>
                    </div>
                </div>
                <div class="row form-group">
                  <div class="col-md-12">
                    <textarea id="message" class="form-control message" name="message" rows="5" cols="50" maxlength="3000" placeholder="Message*"></textarea>
                    <label class="err_message" style="color: red;margin-left: 0.7pc;display: none;"> Please enter your message </label>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <input type="button" class="btn btn-primary btn-lg" value="Send Message" name="btn" id="btn">
                  </div>
                </div>
            </form>
          </div>
          <div class="col-md-4">
                <h4 class="text-muted">Contact Info</h4>
                
                <ul>
                  <li><i class="fa fa-map-marker"></i> <p><strong>Address</strong> At:Vadsangal Ta:Gandevi Dist:Navsari</p></li>
                  <li><i class="fa fa-user"></i> <p><strong>Phone</strong>: (+91)1234569874</p></li>
                  <li><i class="fa fa-envelope"></i> <p><strong>Email</strong>: <a href="https://accounts.google.com/ServiceLogin"> @gmail.com</a></p></li>
                </ul>
              </div>
            </div>
          </div>
    </section>
  </section>

  <script src="assets/js/jquery.min.js" ></script>
  <script type="text/javascript">
    $('#btn').click(function(){
          // alert('');
          var name = $('.name').val();
          var email = $('.email').val();
          var subject = $('.subject').val();
          var message = $('.message').val();
          if(name!='' && email!='' && subject!='' && message!='')
          { 
            var form = document.getElementById('contactForm');
            var data = new FormData(form);
            data.append('contact_id','1');
              $.ajax({
                url:'contac.php',        
                type:'post',
                data: data,
                processData: false,  
                contentType: false ,            
                success:function(result)
                    {
                      // alert(result);
                      if(result==0){
                        $('.name').val('');
                        $('.email').val('');
                        $('.subject').val('');
                        $('.message').val('');
                        $('.contactSuccess').show();
                      }else if(result==1){
                        $('.contactError').show();
                      }
                    }
                });
          }
          else{
              if(name=='')
              {
                $('.err_name').show();
                $('.name').css('border-bottom','2px solid rgb(255, 128, 128)');  
              }
              else{
                $('.err_name').hide();
                $('.name').css('border-bottom','1px solid #ccc');  
              }
            if(email=='')
              {
                $('.err_email').show();
                $('.email').css('border-bottom','2px solid rgb(255, 128, 128)');  
              }
              else{
                $('.err_email').hide();
                $('.email').css('border-bottom','1px solid #ccc');  
              }
            if(subject=='')
              {
                $('.err_subject').show();
                $('.subject').css('border-bottom','2px solid rgb(255, 128, 128)');  
              }
              else{
                $('.err_subject').hide();
                $('.subject').css('border-bottom','1px solid #ccc');  
              }
            if(message=='')
              {
                $('.err_message').show();
                $('.message').css('border-bottom','2px solid rgb(255, 128, 128)');  
              }
              else{
                $('.err_message').hide();
                $('.message').css('border-bottom','1px solid #ccc');  
              }
          } 
        });
  </script>
  <?php
include "footer.php";
?>
