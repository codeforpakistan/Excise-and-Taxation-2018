<!-- Jquery Core Js -->
   
   

    <!-- Select Plugin Js -->
    <script src="<?php echo base_url();?>assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>
<script>

</script>
    <!-- Slimscroll Plugin Js -->
    <script src="<?php echo base_url();?>assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url();?>assets/plugins/node-waves/waves.js"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="<?php echo base_url();?>assets/plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Morris Plugin Js -->
    <script src="<?php echo base_url();?>assets/plugins/raphael/raphael.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/morrisjs/morris.js"></script>

    <!-- ChartJs -->
    <script src="<?php echo base_url();?>assets/plugins/chartjs/Chart.bundle.js"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="<?php echo base_url();?>assets/plugins/flot-charts/jquery.flot.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/flot-charts/jquery.flot.resize.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/flot-charts/jquery.flot.pie.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/flot-charts/jquery.flot.categories.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/flot-charts/jquery.flot.time.js"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="<?php echo base_url();?>assets/plugins/jquery-sparkline/jquery.sparkline.js"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url();?>assets/js/admin.js"></script>
    <script src="<?php echo base_url();?>assets/js/pages/index.js"></script>

    <!-- Demo Js -->
    <script src="<?php echo base_url();?>assets/js/demo.js"></script>
		 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
		      <!-- Input Mask Plugin Js -->
			
			 <script src="<?php echo base_url();?>assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
			
			   <script src="<?php echo base_url();?>assets/plugins/dropzone/dropzone.js"></script>
			
    <script src="<?php echo base_url();?>assets/plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>
		  <script src="<?php echo base_url();?>assets/plugins/bootstrap/js/bootstrap.js"></script>
		
		 <script src="<?php echo base_url();?>assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
			     <script src="<?php echo base_url();?>assets/plugins/node-waves/waves.js"></script>
		    <script src="<?php echo base_url();?>assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
 <script src="<?php echo base_url();?>assets/plugins/jquery-countto/jquery.countTo.js"></script>
 <script src="<?php echo base_url();?>assets/plugins/jquery-validation/jquery.validate.js"></script>

    <script src="<?php echo base_url();?>assets/js/admin.js"></script>
	 <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	 <script type="text/javascript" src="<?php echo base_url();?>assets/js/lightslider.min.js"></script>
 	 <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script> 
 <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/additional-methods.js"></script>
 <script src="<?php echo base_url();?>/assets/plugins/autosize/autosize.js"></script>

<script src="<?php echo base_url();?>assets/js/pages/forms/basic-form-elements.js"></script>

<script src="<?php echo base_url();?>assets/js/jquery.inputmask.js"></script>

 <!-- Moment Plugin Js -->
    <script src="<?php echo base_url();?>assets/plugins/momentjs/moment.js"></script>  
    <script src="<?php echo base_url();?>assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
	 <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
 <!-- Multi Select Plugin Js -->
    <script src="<?php echo base_url();?>assets/plugins/multi-select/js/jquery.multi-select.js"></script>
<!-- Select Plugin Js -->
    <script src="<?php echo base_url();?>assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>
    <!-- Jquery Spinner Plugin Js -->
   

	<?php echo $this->load->view("myjs"); ?>
	
	

	             
<script>
          

 $('#mradate').bootstrapMaterialDatePicker({ weekStart : 0, time: false });
 $('#date').bootstrapMaterialDatePicker({ weekStart : 0, time: false });
 $('#datese').bootstrapMaterialDatePicker({ weekStart : 0, time: false });
 $('#dateto').bootstrapMaterialDatePicker({ weekStart : 0, time: false });
 $('#datef').bootstrapMaterialDatePicker({ weekStart : 0, time: false });
 $('#datet').bootstrapMaterialDatePicker({ weekStart : 0, time: false });
 $('#date_confis').bootstrapMaterialDatePicker({ weekStart : 0, time: false });

	 
</script>
    <!-- Bootstrap Material Datetime Picker Plugin Js -->
   
	<script>
	$(document).ready(function(){
              $('[data-mask]').inputmask();
			    
          });
		 $('#image-gallery1').lightSlider({
                gallery:true,
                item:1,
                thumbItem:5,
                slideMargin: 0,
                speed:500,
                auto:false,
                loop:false,
                onSliderLoad: function() {
                    $('#image-gallery1').removeClass('cS-hidden');
                }  
            }); 
	</script>


 
	
	
</body>

</html>
