<?php ob_start(); ?>
<?php $this->load->view("Etoviews/forma_formb_print");?>
<div style="page-break-after:always;"></div>
<?php $this->load->view("Etoviews/mra_request_response_print");?>
<div style="page-break-after:always;"></div>
<?php $this->load->view("Etoviews/fsl_request_report_print");?>
<div style="page-break-after:always;"></div>
<?php $this->load->view("Etoviews/confiscation_report_print");?>
<div style="page-break-after:always;"></div>
<?php $this->load->view("allot_report_print");?>
<div style="page-break-after:always;"></div>
<p style="text-align:center;margin-top:80px;font-size:15px;">
I Certify that the Vehicle with Registration No <?php echo $all_vechicle_specific->vechileregistrationno; ?>
Chasis No <?php echo $all_vechicle_specific->chasisno;?> Make <?php echo $all_vechicle_specific->makename; ?>
Model <?php echo $all_vechicle_specific->submakename; ?> is Alloted To  <?php 
if(empty($individual_allot)):
echo $department_allot->departmentname; else:?>
<?php    
echo $individual_allot->departmentname;
echo "With Cnic " .$individual_allot->receivername;
 ?>
<?php endif; ?>

</p>
<table>
<tr>
	<td>_________________________</td>
	<td >_________________________</td>

</tr>
<tr>
	<td>Dg signature</td>
	<td> Receiver signature</td>
</tr>
</table>
