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