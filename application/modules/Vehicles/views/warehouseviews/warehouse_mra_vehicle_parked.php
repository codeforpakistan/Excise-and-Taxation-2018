
 <div class="card">
                        <div class="header">
                            <h2>
                                Vehicles Parked MRA & FSL 							
                                <small></small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                              
                               
                            </ul>
                        </div>
                        <div class="body table-responsive">
                          <table id="warehouse" class="display" style="width:100%">
        <thead>
            <tr>
               
                
                <th>Date</th>
                <th>FormA</th>
                <th>FormB</th>
                <th>Make</th>
                <th>Model</th>
                <th>Regno</th>
				<th>Seized Category</th>
                <th>Parked For</th>
                
                
                 <th>Actions </th>
				 <th></th>
                 
            </tr>
        </thead>
		
        <tbody>
            <?php foreach($seized_vechicles as $key=>$data):?>
                                    <tr style="border-bottom:1px solid lightgray;">
                                        <td><?php echo $data->siezeddate; ?></td>
                                        <td><?php echo $data->formserialno; ?></td>
                                        <td><?php echo $data->form_bno; ?></td>
                                          <td><?php echo $data->makename; ?></td>
                                          <td><?php echo $data->submakename; ?></td>
                                           <td><?php echo $data->vechileregistrationno; ?></td>
                               <?php $vehicleseize_category = explode(",",$data->vehicleseize_category); //print_r($vehicleseize_category);?>
											   <td>  	 
										 <?php  for($a=0; $a<sizeof($vehicleseize_category);$a++){ 
										 $query = custom_query("select * from tbl_vehicle_seized_categories where
										 siezedid={$vehicleseize_category[$a]}","result"); ?>
															<?php foreach($query as $category):?>
											 <?php echo $category->seizedtype."</br>"; ?>   
											 
											  <?php endforeach;  }  ?>          
										   </td> 
										   <td>
											<?php if($data->parking == 1){
												echo "<p style='color:green'>MRA</p>";
											}else{
												echo "<p style='color:green'>FSL</p>";
											}?>
										   </td>
                                         
                                       
                                         
                                    
										
										
                                        
                                         <td><a href="<?php echo site_url("Vehicles/fsl_report_dispatched_details/"); ?><?php echo $data->vechileid; ?>"
										 class="btn bg-indigo waves-effect">view Details</a></td>
                                         
									
										  
										  </tr>
										 
										  <?php endforeach; ?>
        </tbody>
        
    </table>
                        </div>
                    </div>