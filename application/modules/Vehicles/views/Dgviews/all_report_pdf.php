<?php 
header("Content-Type: application/xls");    
header("Content-Disposition: attachment; filename=report.xls");  
header("Pragma: no-cache"); 
header("Expires: 0");

?>

<table>
<tr>
<td>MRA Vehicles</td>
<td>FSL Vehicles</td>
<td>Released Vehicles</td>
<td>Confiscated Vehicles</td>
</tr>
<tr>
<td><?php 
if($mra_count =="")
{echo "0";}else{ echo $mra_count->count; }
?></td>
<td><?php 
if($fsl_count =="")
{echo "0";}else{ echo $fsl_count->count; }
?></td>
<td><?php 
if($released_count =="")
{echo "0";}else{ echo $released_count->count; }
?></td>
<td><?php 
if($confiscated =="")
{echo "0";}else{ echo $confiscated->count; }
?></td>
</tr>
</table>