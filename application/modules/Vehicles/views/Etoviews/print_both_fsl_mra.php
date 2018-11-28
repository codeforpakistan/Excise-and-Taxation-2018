<?php ob_start(); ?>
<?php $this->load->view("forma_formb_print");?>
<div style="page-break-after:always;"></div>
<?php $this->load->view("mra_request_response_print");?>
<div style="page-break-after:always;"></div>
<?php $this->load->view("fsl_request_report_print");?>
<div style="page-break-after:always;"></div>
<?php $this->load->view("confiscation_report_print");?>
<div style="page-break-after:always;"></div>
<?php $this->load->view("release_report_print");?>