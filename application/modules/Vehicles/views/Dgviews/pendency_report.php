<style>
	table tr th{
		font-weight:lighter;
		font-size:13px;

	}
	table tr td{
		font-size:13px;
	}
.bg-gray{
	    background: #808080 !important;
	    color:white;
}
</style>

 <div class="card">
                        <div class="header">
                            <h2>
                                Pendency Report

                                <small></small>
                            </h2>
                            <ul class="header-dropdown m-r--5">


                            </ul>
                        </div>
                        <div class="body table-responsive">
                          <table
						  class=" table  table-bordered "
						  style="width:100%">
        <thead >
          <tr >

                <th class="bg-cyan">District Name</th>
                <th class="bg-cyan">Pending Eto Approval</th>
                <th class="bg-cyan">Action on seized Vehicles</th>
                <th class="bg-cyan">pending checkedin</th>
                <th class="bg-cyan">Pending MRA Response</th>
                <th class="bg-cyan">Pending in Wh For FSL</th>
                <th  class="bg-cyan">Pending  For FSL Response</th>
                <th  class="bg-cyan">pending in WH for ETO</th>
                <th class="bg-cyan">Pending at Eto for confiscation/Release</th>
               <!-- <th>Pending For Wh Handover</th>
                <th>Pending For Wh Recieve Back</th> -->
                <th class="bg-cyan">Total</th>
            </tr>

				<?php
$bg_class = " ";
$query = " SELECT vehicle_id FROM
				tbl_vehicle_status join tbl_vehicle on tbl_vehicle.vechileid = tbl_vehicle_status.vehicle_id
				";

foreach ($all_districts as $district):

?>
				<tr style="text-align:center;" class=" ">
				<td><?php echo $district->districtname; ?></td>
				<?php $a = custom_query(" $query  WHERE
				vehicle_id NOT IN (
						SELECT vehicle_id FROM tbl_vehicle_status where status_id = 2) and vehicle_id IN
							( SELECT vehicle_id FROM tbl_vehicle_status where
							status_id = 1) and tbl_vehicle.district_id ={$district->districtid} group by vehicle_id
							", "num_rows");?>
				<td class="<?php if ($a != 0): echo 'bg-gray';else:echo '';endif;?>" ><?php echo $a; ?> </td>
					<?php
$b = custom_query(" $query  WHERE
							vehicle_id  NOT IN (
						SELECT vehicle_id FROM tbl_vehicle_status where status_id = 3 or status_id=4)
						and vehicle_id IN
                        ( SELECT vehicle_id FROM tbl_vehicle_status where
							status_id = 2) and NOw() > DATE_ADD( date(createdat), INTERVAL 3 DAY )
							and tbl_vehicle.district_id ={$district->districtid} group by vehicle_id
							", "num_rows");

?>
					<td class="<?php if ($b != 0): echo 'bg-gray';else:echo '';endif;?>">
					<?php echo $b; ?>
							</td>
							<?php
$c = custom_query(" $query  WHERE
							vehicle_id  NOT IN (
						SELECT vehicle_id FROM tbl_vehicle_status where status_id = 11) and vehicle_id IN
						( SELECT vehicle_id FROM tbl_vehicle_status where
							status_id = 3 or status_id = 4 or status_id =5)
							and tbl_vehicle.district_id ={$district->districtid} group by vehicle_id
							", "num_rows");

?>
							<td class="<?php if ($c != 0): echo 'bg-gray';else:echo '';endif;?>">
					<?php echo $c; ?>
							</td>
							<?php
$d = custom_query(" $query  WHERE
							vehicle_id   NOT IN (
						SELECT vehicle_id FROM tbl_vehicle_status where status_id = 7) and vehicle_id IN
							( SELECT vehicle_id FROM tbl_vehicle_status where
							status_id = 4 or status_id =5)
							and tbl_vehicle.district_id ={$district->districtid} group by vehicle_id
							", "num_rows");

?>
							<td class="<?php if ($d != 0): echo 'bg-gray';else:echo '';endif;?>">
					<?php echo $d; ?>
							</td>
							<?php
$e = custom_query(" $query  WHERE
							vehicle_id NOT IN (
						SELECT vehicle_id FROM tbl_vehicle_status where status_id = 12 )
						and vehicle_id IN
 ( SELECT vehicle_id FROM tbl_vehicle_status where
							status_id = 3) and status_id=11
							and tbl_vehicle.district_id ={$district->districtid} group by vehicle_id
							", "num_rows");
?>
							<td class="<?php if ($e != 0): echo 'bg-gray';else:echo '';endif;?>">
							<?php

?>
					<?php echo $e; ?>
							</td>
							<?php
$f = custom_query(" $query  WHERE
							vehicle_id NOT IN (
						SELECT vehicle_id FROM tbl_vehicle_status where status_id = 13) and vehicle_id IN
					( SELECT vehicle_id FROM tbl_vehicle_status where
							 status_id =12)
							and tbl_vehicle.district_id ={$district->districtid} group by vehicle_id
							", "num_rows");
?>
							<td class="<?php if ($f != 0): echo 'bg-gray';else:echo '';endif;?>">
					<?php echo $f; ?>
							</td>
							<?php
$h = custom_query("$query
							WHERE vehicle_id NOT IN (
						  SELECT vehicle_id FROM tbl_vehicle_status where status_id = 9 or status_id = 10
						  or status_id =20 or status_id = 14
						  ) and vehicle_id IN
								( SELECT vehicle_id FROM tbl_vehicle_status where
							status_id = 13 ) and tbl_vehicle.district_id =
							 {$district->districtid} group by vehicle_id
							", "num_rows");
?>
							<td class="<?php if ($h != 0): echo 'bg-gray';else:echo '';endif;?>">
							<?php

echo $h;
?>

							</td>
							<?php
$g = custom_query("$query WHERE vehicle_id NOT IN (
						SELECT vehicle_id FROM tbl_vehicle_status where status_id = 9 or status_id=10)
						and vehicle_id IN
					( SELECT vehicle_id FROM tbl_vehicle_status where
							 status_id =7 or status_id = 14 ) and tbl_vehicle.district_id =
							 {$district->districtid} group by vehicle_id
							", "num_rows");
?>
							<td class="<?php if ($g != 0): echo 'bg-gray';else:echo '';endif;?>">
							<?php
echo $g;
?>
							</td>
							<?php $total = $a + $b + $c + $d + $f + $g + $h;?>
						 <td class="<?php if ($total != 0): echo 'bg-gray';else:echo '';endif;?>"><?php

echo $total; ?></td>
				</tr>
				<?php endforeach;?>

        </thead>
        <tbody>

        </tbody>

    </table>
                        </div>
                    </div>
