<?php ob_start(); ?>
<style>
td{
	padding:5px;
}
</style>
<h2 style="text-align:center"> Form A </h2>
<table style="border-collapse: collapse;width:400px;position:relative;left:20px; top:50px;" border="1">
<tbody>
<tr>
<td >Mobile Squad Number</td>
<td ><?php  if(empty($all_vechicle_specific->mobilesquadno)){echo " N/A";}else{ echo $all_vechicle_specific->mobilesquadno;}?></td>

</tr>
<tr>
    <td>Inspector Name</td>
    <td><?php  if(empty($all_vechicle_specific->username)){echo " N/A";}else{ 
						echo $all_vechicle_specific->username;}?></td>
</tr>
   <tr>
    <td>Seize District</td>
    <td><?php  if(empty($all_vechicle_specific->districtname)){echo " N/A";}else{ echo $all_vechicle_specific->districtname;}?></td>
</tr>
    <tr>
    <td>Seize  Category</td>
    <td style="overflow-wrap: break-word;width:350px;">
											  <?php 
											  $vehicleseize_category = explode(",",
											  $all_vechicle_specific->vehicleseize_category); //print_r($vehicleseize_category);?>
											   	 
										 <?php  for($a=0; $a<sizeof($vehicleseize_category);$a++){ 
										 $query = custom_query("select * from tbl_vehicle_seized_categories where
										 siezedid={$vehicleseize_category[$a]}","result"); ?>
															<?php foreach($query as $category):?>
											 <?php echo $category->seizedtype.","; ?>   
											 
											  <?php endforeach;  }  ?>
	</td>
</tr>
<tr>
    <td>Seize Date</td>
    <td><?php 
         if(empty($all_vechicle_specific->siezeddate))
					{echo " N/A";}else{ echo $all_vechicle_specific->siezeddate;}
        ?></td>
</tr>
<tr>
    <td>Seize Time</td>
    <td><?php  if(empty($all_vechicle_specific->siezedtime))
					{echo " N/A";}else{ echo $all_vechicle_specific->siezedtime;}?></td>
</tr>
<tr>
    <td>Form No</td>
    <td><?php  if(empty($all_vechicle_specific->formserialno))
					{echo " N/A";}else{ echo $all_vechicle_specific->formserialno;}?></td>
</tr>
<tr>
    <td>Seized Location</td>
    <td style="overflow-wrap: break-word;width:380px;">
        <?php  if(empty(convert_to_address
					($all_vechicle_specific->seizedlocationlat,$all_vechicle_specific->seizedlocationlong))){echo " N/A";}else
					{ echo convert_to_address($all_vechicle_specific->seizedlocationlat,$all_vechicle_specific->seizedlocationlong);}?>
    </td>
</tr>
</tbody>
</table>  
<!-- vehicle information -->


<h4 style="text-align:center"> Vehicle Information</h4>



<table style="border-collapse: collapse;width:400px;position:relative;left:20px; top:20px;" border="1">
<tbody>
<tr>
<td >Chasis No</td>
<td  style="width:500px;"><?php  if(empty($all_vechicle_specific->chasisno)){echo " N/A";}else{ echo $all_vechicle_specific->chasisno;}?></td>

</tr>
<tr>
    <td>Engine No</td>
    <td style="width:500px;"><?php  if(empty($all_vechicle_specific->engineno)){echo " N/A";}
						else{ echo $all_vechicle_specific->engineno;}?></td>
</tr>
   <tr>
    <td>Vehicle Registration</td>
    <td style="width:500px;"><?php  if(empty($all_vechicle_specific->vechileregistrationno)){
						echo " N/A";}else{ echo $all_vechicle_specific->vechileregistrationno;}?></td>
</tr>
    <tr>
    <td>Make</td>
    <td style="width:500px;">
											  <?php  if(empty($all_vechicle_specific->makename)){echo " N/A";}else
					{ echo $all_vechicle_specific->makename;}?>
	</td>
</tr>
<tr>
    <td>Model</td>
    <td style="width:500px;"><?php  if(empty($all_vechicle_specific->submakename)){echo " N/A";}
					else{ echo $all_vechicle_specific->submakename;}?></td>
</tr>
<tr>
    <td>Model Year</td>
    <td style="width:500px;"><?php  if(empty($all_vechicle_specific->modelyear)){echo " N/A";}
					else{ echo $all_vechicle_specific->modelyear;}?></td>
</tr>
<tr>
    <td>Vehicle Type</td>
    <td style="width:500px;"><?php if(empty($all_vechicle_specific->vehicletype)){echo " N/A";}
					else{ echo $all_vechicle_specific->vehicletype;}?></td>
</tr>
<tr>
    <td>Body Build</td>
    <td>
       <?php  if(empty($all_vechicle_specific->bodybuildname)){echo " N/A";}
					else{ echo $all_vechicle_specific->bodybuildname;}?>
    </td>
</tr>
<tr>
    <td>color</td>
    <td><?php  if(empty($all_vechicle_specific->colorname)){echo " N/A";}
					else{ echo $all_vechicle_specific->colorname;}?></td>
</tr>
   <tr>
    <td>Transmission</td>
    <td><?php  if(empty($all_vechicle_specific->transmission)){
						echo " N/A";}else{ echo $all_vechicle_specific->transmission;}?></td>
</tr>
    <tr>
    <td>Assembely</td>
    <td><?php  if(empty($all_vechicle_specific->assembely)){
						echo " N/A";}else{ echo $all_vechicle_specific->assembely;}?></td>
</tr>
   <tr>
    <td>Engine Type</td>
    <td><?php  if(empty($all_vechicle_specific->enginetype)){
						echo " N/A";}else{ echo $all_vechicle_specific->enginetype;}?></td>
</tr>
   <tr>
    <td>Engine Capacity</td>
    <td><?php  if(empty($all_vechicle_specific->vehicleengine_capcaity)){
						echo " N/A";}else{ echo $all_vechicle_specific->vehicleengine_capcaity;}?></td>
</tr>
   <tr>
    <td>Mileage</td>
    <td><?php  if(empty($all_vechicle_specific->mileage)){echo " N/A";}
					else{ echo $all_vechicle_specific->mileage;}?></td>
</tr> 
    <tr>
    <td>Description</td>
    <td><?php  if(empty($all_vechicle_specific->vechicledescription))
{echo " N/A";}else{ echo $all_vechicle_specific->vechicledescription;}?></td>
</tr>
</tbody>
</table>

  <h3 style="text-align:center;">Form A Accessories</h3>
<table style="border-collapse: collapse;width:400px;position:relative;left:20px; top:20px;
page-break-after: always;" border="1">
<tbody>  
<tr>
<td >Form A Accessories</td>
<td  style="width:500px;"><?php foreach($all_vechicle_accesories as $accesories):?>
					 <?php echo $accesories->accessoryname." , ";?>
					 <?php endforeach; ?></td>

</tr>

</tbody>
</table>
<div style="page-break-after:always;"></div>
<h3 style="text-align:center;"> Form B </h3>

<table style="border-collapse: collapse;width:400px;position:relative;left:20px; top:20px;" border="1">
<tbody>
<tr>
<td >Letter No</td>
<td  style="width:500px;"><?php echo $all_vechicle_specific->form_bno;?></td>

</tr>
<tr>
<td >FormBTimeo</td>
<td  style="width:500px;"><?php echo $all_vechicle_specific->formbdate;?></td>

</tr>
<tr>
<td >FormB Date</td>
<td  style="width:500px;"><?php echo $all_vechicle_specific->formbtime;?></td>

</tr>

<tr>
<td >Description</td>
<td  style="width:500px;"><?php echo $all_vechicle_specific->description;?></td>

</tr>

</tbody>
</table>

  
<h3 style="text-align:center;"> Form B Accessories</h3>
<table style="border-collapse: collapse;width:400px;position:relative;left:20px; top:20px;" border="1">
<tbody>
<tr>
<td >Form B Accessories</td>
<td  style="width:500px;"><?php foreach($formb_accessories as $accesories):?>
					 <?php echo $accesories->accessoryname." , ";?>
					 <?php endforeach; ?></td>

</tr>


</tbody>
</table>
<div style="page-break-after:always;"></div>

<h3 style="text-align:center;"> MRA Request/Response </h3>
<table style="border-collapse: collapse;width:400px;position:relative;left:20px; top:20px;" border="1">
  
<tbody>
<tr>
<td >letter No</td>
<td  style="width:500px;">
    <?php echo $mra_checkin->letterno;?>
</td>

</tr>
<tr>
<td >MRA Time</td>
<td  style="width:500px;">
    <?php echo $mra_checkin->mratime; ?>
</td>

</tr>
<tr>
<td >MRA Date</td>
<td  style="width:500px;">
     <?php echo $mra_checkin->mradate; ?>
</td>

</tr>
<tr>
<td >Description</td>
<td  style="width:500px;">
     <?php echo $mra_checkin->Description; ?>
</td>

</tr>


</tbody>
</table>

<h3 style="text-align:center;"> MRA Response </h3>
<table style="border-collapse: collapse;width:400px;position:relative;left:20px; top:20px;" border="1">
<tbody>
<tr>
<td >Letter NO</td>
<td  style="width:500px;">
    <?php echo $mra_checkout->letterno;?>
</td>

</tr>
<tr>
<td >MRA Time</td>
<td  style="width:500px;">
    <?php echo $mra_checkout->mratime; ?>
</td>

</tr>  
<tr>
<td >MRA Date</td>
<td  style="width:500px;">
     <?php echo $mra_checkout->mradate; ?>
</td>

</tr>
<tr>
<td >Description</td>
<td  style="width:500px;">
     <?php echo $mra_checkout->Description; ?>
</td>

</tr>


</tbody>
</table>
<div style="page-break-after:always;"></div>



<h3 style="text-align:center;">Confiscation Report</h3>
  <table style="border-collapse: collapse;width:400px;position:relative;left:20px; top:20px;" border="1">
<tbody>
<tr>
 
<td >Confiscation Order No</td>
<td  style="width:500px;"><?php echo $confiscation_order->confiscationorderno;?></td>

</tr>
<tr>
<td >Confication  Date</td>
<td  style="width:500px;"><?php echo $confiscation_order->confiscationorderdate;?></td>

</tr>
<tr>
<td >Confiscation Description</td>
<td  style="width:500px;"><?php echo $confiscation_order->confiscationdescription;?></td>

</tr>


</tbody>
</table>

