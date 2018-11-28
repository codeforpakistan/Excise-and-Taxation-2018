<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title></title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">

	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/node-waves/waves.css" rel="stylesheet" />
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/animate-css/animate.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/icons.css" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="<?php echo base_url(); ?>assets/plugins/morrisjs/morris.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/lightslider.min.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
   <link href="<?php echo base_url(); ?>assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />
    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo base_url(); ?>assets/css/themes/all-themes.css" rel="stylesheet" />
    <link  href="<?php echo base_url(); ?>assets/css/themes/theme-indigo.css" rel="stylesheet">
	   <!-- Multi Select Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/multi-select/css/multi-select.css" rel="stylesheet">

    <!-- Bootstrap Spinner Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/jquery-spinner/css/bootstrap-spinner.css" rel="stylesheet">

    <!-- Bootstrap Tagsinput Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">

    <!-- Bootstrap Select Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

	<style>
	a:hover{
		text-decoration:none;
	}
	.btn-submit{
		padding: 7px 18px;
    color: #666;
    -moz-transition: all 0.5s;
    -o-transition: all 0.5s;
    -webkit-transition: all 0.5s;
    transition: all 0.5s;
    font-size: 14px;
    line-height: 25px;
	background: none;
    border: none;
    width: 100%;
	}
	.btn-submit:hover{
		    color: #262626;
    text-decoration: none;
	background-color: rgba(0, 0, 0, 0.075);
	cursor:pointer;
	}
	.icon-pos{
		    padding-right: 16px;
    color: white;
    position: relative;
    top: 7px;
	}
	.mgr-top-10{
		margin-top:10px;
	}
	.lin-height{
		line-height:40px;
	}
	.card .header {

    background: #7f8c8d;
	padding:14px;

}
.card .header h2{
    position: relative;
    top: 5px;
	color:white !important;
}
#refresh{
    color: white;
    font-size: 32px;
    position: relative;

    top: -8px;
}
#refresh:hover{
	cursor:pointer;
}
.panel-heading{
	    height: 42px;

    padding: 4px;
}
.modal-header
{	background:lightgray;
}
.table-responsive{
	overflow-x:none !important;
	    min-height: 500px;
}
.dropdown-menu {
    position: absolute;
    top: 100%;
    left: -100px !important;
    z-index: 1000;
    display: none;
    float: left;
    min-width: 160px;
    padding: 5px 0;
    margin: 2px 0 0;
    font-size: 14px;
    text-align: left;
    list-style: none;
    background-color: #fff;
    -webkit-background-clip: padding-box;
    background-clip: padding-box;
    border: 1px solid #ccc;
    border: 1px solid rgba(0, 0, 0, .15);
    border-radius: 4px;
    -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
    box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
}
.sub_heading{
	    position: absolute;
    top: 48px;
    left: 147px;
}
.navbar-brand{
	margin-left: 40px !important;
}
	</style>


		<script>

	function clicked(id){
				var ids="#"+$(id).attr("id");
			var vechicle_id=$(id).attr("custom");
			var second_id = $(id).attr("id");

				$("#vechicle_id").val(vechicle_id);
				$("#vechicle_id1").val(vechicle_id);
				$("#vechicle_id2").val(vechicle_id);

				if( second_id == "sentoboth"){
					$(".custom-text").html("Sent Doc To MRA and Vehicle To Warehouse for FSL");
				}else{
					$(".custom-text").html("Sent Doc To MRA and Vehicle To Warehouse for parking");
				}
				$("#largeModal").modal('show');


			}
			function clicked_v2(id){
				var ids="#"+$(id).attr("id");
				var second_id = $(id).attr("id");
			var vechicle_id=$(ids).attr("custom");
			var sendtoboth=$(ids).attr("sendtoboth");

				$("#vechicle_id").val(vechicle_id);
				$("#sendtoboth").val(sendtoboth);
				if( second_id == "sentoboth"){
					$(".custom-text").html("Sent Doc To MRA and Vehicle To Warehouse for FSL");
				}else{
					$(".custom-text").html("Sent Doc To MRA and Vehicle To Warehouse for parking");
				}



				$("#defaultModal").modal('show');


			}



		</script>

		<script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>


		   <script src="<?php echo base_url(); ?>assets/js/pages/forms/advanced-form-elements.js"></script>
			  <script src="<?php echo base_url(); ?>assets/js/admin.js"></script>


	  <!-- Bootstrap Core Js -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/lightslider.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<style>
 .brder_botom{
	 border-bottom:1px solid #D3D3D3;
 }
 .text-left{
	    padding: 6px;
 }
 .active{
	color:#01014c !important;
}
.active::before{
	content:" ";
	height:35px;
	position:relative;
	left:-10px;
	width:3px;
	background-color:#01014c !important;
}
.active span{
	color:#01014c !important;
}
.toggled{
	color:#01014c !important;
}
.toggled::before{
	content:" ";
	height:35px !important;
	position:relative !important;
	left:-10px !important;
	width:3px !important;
	background-color:#01014c !important;
}
</style>
</head>

<body class="theme-deep-purple">


    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-brand">

				<img src="<?php echo base_url(); ?>assets/images/logo.png"
				width="55" height="55" alt="" style="    position: absolute;
    top: 9px;">  </a>
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="index.html">
				Excise Motor Vehicle Seizure and Confiscation System</a>
                <p style='color:white;' class="sub_heading">
				(<?php echo $this->session->userdata("user_rolename"); ?> Dashboard)</p>

            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">


                      <li><a href="#"><?php echo $this->session->userdata("username"); ?></a></li>
                       <li class="dropdown">
                        <a href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                          <i class="material-icons dropdown-toggle" >keyboard_arrow_down</i>

                        </a>
                         <ul class="dropdown-menu pull-right">
                            <li><a href="<?php echo base_url(); ?>Auth/change_password/<?php echo $this->session->userdata("user_id"); ?>"><i class="material-icons">person</i>Change password</a></li>
                            <li role="separator" class="divider"></li>

                            <li role="separator" class="divider"></li>
                            <li><a href="<?php echo base_url(); ?>Auth/logout"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->