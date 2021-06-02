<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Photography</title>

		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->
		<link href="assets/css/jquery-ui.min.css" rel="stylesheet" />
		<!-- text fonts -->
		<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />
		
        <!-- ckeditor -->	
        <link href="assets/css/samples.css" rel="stylesheet" />
        <link href="assets/css/neo.css" rel="stylesheet" /> 
        <script src="//cdn.ckeditor.com/4.6.2/full/ckeditor.js"></script>
			<script src="assets/js/sample.js" type="text/javascript"></script>
            <script src="assets/js/ckeditor.js" type="text/javascript"></script>
        <!-- ckeditor -->
        
        <!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="assets/js/ace-extra.min.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
		<script>
			
			function del_album(del)
			{
				if(confirm("Are You Sure You Want To Delete?"))
				{
					var xmlhttp = new XMLHttpRequest();
					xmlhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
							document.getElementById("ajaxData").innerHTML = this.responseText;
							//alert(this.responseText);
						}
					};
					xmlhttp.open("GET", "del_album.php?del_id="+del, true);
					xmlhttp.send();
				}
			}
			
			function del_contact(del)
			{
				if(confirm("Are You Sure You Want To Delete?"))
				{
					var xmlhttp = new XMLHttpRequest();
					xmlhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
							document.getElementById("ajaxData").innerHTML = this.responseText;
							//alert(this.responseText);
						}
					};
					xmlhttp.open("GET", "del_contact.php?del_id="+del, true);
					xmlhttp.send();
				}
			}
			function del_gallery(del)
			{
				if(confirm("Are You Sure You Want To Delete?"))
				{
					var xmlhttp = new XMLHttpRequest();
					xmlhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
							document.getElementById("ajaxData").innerHTML = this.responseText;
							//alert(this.responseText);
						}
					};
					xmlhttp.open("GET", "del_gallery.php?del_id="+del, true);
					xmlhttp.send();
				}
			}

			function del_Service(del)
			{
				if(confirm("Are You Sure You Want To Delete?"))
				{
					var xmlhttp = new XMLHttpRequest();
					xmlhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
							document.getElementById("ajaxData").innerHTML = this.responseText;
							//alert(this.responseText);
						}
					};
					xmlhttp.open("GET", "del_services.php?del_id="+del, true);
					xmlhttp.send();
				}
			}
			function del_slider(del)
			{
				if(confirm("Are You Sure You Want To Delete?"))
				{
					var xmlhttp = new XMLHttpRequest();
					xmlhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
							document.getElementById("ajaxData").innerHTML = this.responseText;
							//alert(this.responseText);
						}
					};
					xmlhttp.open("GET", "del_slider.php?del_id="+del, true);
					xmlhttp.send();
				}
			}
			function del_team(del)
			{
				if(confirm("Are You Sure You Want To Delete?"))
				{
					var xmlhttp = new XMLHttpRequest();
					xmlhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
							document.getElementById("ajaxData").innerHTML = this.responseText;
							//alert(this.responseText);
						}
					};
					xmlhttp.open("GET", "del_team.php?del_id="+del, true);
					xmlhttp.send();
				}
			}
		</script>
        <script>
			function validateNumber(event) 
			{	
				var key = window.event ? event.keyCode : event.which;
				if (event.keyCode === 8 || event.keyCode === 35) 
				{
					return true;
				} 
				else if ( key < 36 || key > 57) 
				{
					alert('Please Enter Numbers and %');
					return false;
				} 
				else 
				{
					return true;
				}
			}
      	</script>
	</head>
