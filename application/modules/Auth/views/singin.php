<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign In |</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url();?>assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url();?>assets/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url();?>assets/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
	<style>
		.login-page {
  background-image: url("<?php echo base_url();?>assets/images/image2.png") !important;
  padding-left: 0;
  max-width: 360px;
  background-size:cover;
  margin: 5% auto;
  overflow-x: hidden; }
  .overlay{
	  
  }
  ::placeholder { 
  color:white !important;
}
  input[type="text"]{
	      background: #050536;
    border-bottom: 1px solid white;
	color:white;
  }
  input[type="password"]{
	      background: #050536;
    border-bottom: 1px solid white;
		color:white;
  }
 @media only screen and (max-width: 600px) {
    .msg{
		font-size: 15px;
		width:290px;
		
    }
}
	</style>

</head>

<body class="login-page">



    <div class="login-box">
        <div class="logo">
           <img src="<?php echo base_url();?>assets/images/logo150.png" style="
    position: relative;
    top: 93px;
    z-index: 2;
    left: 43%;" class="img-responsive" alt="">
        </div>
        <div class="card" style="width:126%;background:#050536;height:350px;">
            <div class="body">
                
                <form id="sign_in" action="<?php echo base_url();?>Auth/auth_check" method="POST" style="    margin-top: 75px;">
                    <h4 class="msg" style="color:white;" >Excise Motor Vehicle Seizure & Confiscation System </h4>
                    <div class="input-group">
                        
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8  col-md-offset-1">
                            
                        
                            <button class="btn btn-block bg-default waves-effect" type="submit"><span><strong>LOGIN</strong></span></button>
                        </div>
                    </div>
                  <?php  if($this->session->flashdata('error')){ echo $this->session->flashdata('error');} ?>
		
                </form>
            </div>
        </div>
		<?php 
		
		$this->session->unset_userdata('error');
		?>
    </div>

    <!-- Jquery Core Js -->
    <script src="<?php echo base_url();?>assets/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url();?>assets/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url();?>assets/plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="<?php echo base_url();?>assets/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url();?>assets/js/admin.js"></script>
    <script src="<?php echo base_url();?>assets/js/pages/examples/sign-in.js"></script>
	
</body>

</html>