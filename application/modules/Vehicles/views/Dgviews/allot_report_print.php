<h3 style="text-align:center;">Alloted To</h3>
  <?php if(empty($individual_allot)):?>
  <table style="border-collapse: collapse;width:400px;position:relative;left:20px; top:20px;" border="1">
<tbody>
<tr>
 
<td >Department Name</td>
<td  style="width:500px;"><?php echo $department_allot->departmentname;?></td>

</tr>
<tr>
<td >Description</td>
<td  style="width:500px;"><?php echo $department_allot->description;?></td>

</tr>
<tr>
<td >Designation</td>
<td  style="width:500px;"><?php echo $department_allot->designation;?></td>

</tr>
<tr>
<td >Authorized By</td>
<td  style="width:500px;"><?php echo $department_allot->authorisedby;?></td>

</tr>


</tbody>
</table>
<?php else:?>

 <table style="border-collapse: collapse;width:400px;position:relative;left:20px; top:20px;" border="1">
<tbody>
<tr>
 
<td >Receiver Cnic</td>
<td  style="width:500px;"><?php echo $individual_allot->receivercnic;?></td>

</tr>
<tr>
<td >Receiver Name  </td>
<td  style="width:500px;"><?php echo $individual_allot->receivername;?></td>

</tr>
<tr>
<td >Mobile Number</td>
<td  style="width:500px;"><?php echo $individual_allot->mobilenumber;?></td>

</tr>
<tr>
<td >Department Name</td>
<td  style="width:500px;"><?php echo $individual_allot->departmentname;?></td>

</tr>
<tr>
<td >Designation </td>
<td  style="width:500px;"><?php echo $individual_allot->designation;?></td>

</tr>
<tr>
<td >Authorized By </td>
<td  style="width:500px;"><?php echo $individual_allot->authorizedby;?></td>

</tr>
<tr>
<td >Description </td>
<td  style="width:500px;"><?php echo $individual_allot->description;?></td>

</tr>


</tbody>
</table>


<?php endif; ?>