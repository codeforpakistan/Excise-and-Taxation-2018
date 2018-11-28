  <!-- Large Size -->
            <div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
                <div class="modal-dialog " role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="largeModalLabel">
							Receive Vehicle From FSL</h4>
                        </div>
							<form  action="#" id="fslreportreceive" enctype="multipart/form-data">
                        <div class="modal-body ">
					
						<div class="row demo-masked-input">
						<div class="row">
						<div class="col-md-4">
						<label>Letter no</label>
						</div>
						<div class="col-md-4">
						<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="letterno" name="letterno" class="form-control" placeholder="Enter Letter no" required>
                                        </div>
                                    </div>
						</div>
					
						</div>
						<div class="row">
						<div class="col-md-4">
						<label>FSL no</label>
						</div>
						<div class="col-md-4">
						<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="fslno" name="fslno" class="form-control"
											placeholder="Enter FSL no" required>
                                        </div>
                                    </div>
						</div>
					
						</div>
						<div class="row">
						<div class="col-md-4">
						<label>Report Status</label>
						</div>
						<div class="col-md-4">
						<div class="form-group">
                                        <div class="form-line">
                                           <select class="form-control" required name="status" onchange="hide_cat(this.id);" 
										   id="report_status"
										   >
										   <option value="">Report Status</option>
										   <option value="1">Clear</option>
										   <option value="2">Not Clear</option>
										   </select>
                                        </div>
                                    </div>
						</div>
					
						</div>
						<div class="row" id="seized_cat">
						<div class="col-md-4">
						<label>Seize Category</label>
						 
						</div>
						<div class="col-md-4">
						<div class="form-group" >
                                       <select name="seizecategories[]" class="form-control" multiple id="" >
									   <?php foreach($seize_category as $categories):?>
										<option value="<?php echo $categories->siezedid; ?>"><?php echo $categories->seizedtype; ?></option>
										
										
										<?php endforeach; ?>
									   </select>
                                    </div>
						</div>
					
						</div>
						<div class="row">  
						<div class="col-md-4">
						<label>Date</label>
						</div>
						<div class="col-md-4">
						<div class="input-group demo-masked-input">
                                            <span class="input-group-addon">
                                                <i class="material-icons">date_range</i>
                                            </span>
                                            <div class="form-line">
                                             	<input type="text" id="date" name="date" class="datepicker form-control" 
												placeholder="Please choose a date..." required>
                                            </div>
                                        </div>
						</div>
					
						</div>
						
							<div class="row">
						<div class="col-md-4">
						<label>Time</label>
						  
						</div>
						<div class="col-md-4">
						<div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">access_time</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="text" name="time" id="time" class="form-control time12" placeholder="Ex: 23:59" required>
                                            </div>
                                        </div>
						</div>
					
						</div>
							<div class="row">
						<div class="col-md-4">
						<label>Description</label>
						  
						</div>
						<div class="col-md-4">
						<div class="form-group">
                                        <div class="form-line">
                                            <textarea rows="4" name="description" id="description" class="form-control no-resize" placeholder="Please type Your Description"></textarea>
                                        </div>
                                    </div>
						</div>
					
						</div>
							<div class="row">
						<div class="col-md-4">
						<label>Letter image</label>
						  
						</div>
						<div class="col-md-4">
						<div class="form-group">
                                        <div class="form-line">
                                               <input type="file" name="userfile" id="userfile" class="form-control" required>
                                        </div>
                                    </div>
						</div>
					   
						</div>
						</div>
                          <input type="hidden" name="vechicle_id" id="vechicle_id" >
						             <button  type="submit" id="submit" name="submit" class="btn bg-green  waves-effect">Send</button>
								
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
						  	</form>
                        </div>
                        <div class="modal-footer">
                 
                        </div>
					
                    </div>
                </div>
            </div>
 
 <div class="card">
                        <div class="header">
                            <h2>
                                Vehicle Dispatched To FSL								
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
                <th>Time</th>
                <th>FSL No</th>
                <th>Letter No</th>
                <th>Seized Category</th>
                 <th>Reg No </th>
                 <th>Actions </th>
				 <th></th>
                 
            </tr>
        </thead>
		
        <tbody>
            <?php foreach($seized_vechicles as $key=>$data):?>
                                    <tr style="border-bottom:1px solid lightgray;">
                                       
                                          <td><?php echo $data->fsldate; ?></td>
                                          <td><?php echo $data->fsltime; ?></td>
                             
                                          <td><?php echo $data->fslno; ?></td>
                                          <td><?php echo $data->fslletter; ?></td>
                                         
                                    
										  <?php $vehicleseize_category = explode(",",$data->vehicleseize_category); //print_r($vehicleseize_category);?>
											   <td>  	 
										 <?php  for($a=0; $a<sizeof($vehicleseize_category);$a++){ 
										 $query = custom_query("select * from tbl_vehicle_seized_categories where
										 siezedid={$vehicleseize_category[$a]}","result"); ?>
															<?php foreach($query as $category):?>
											 <?php echo $category->seizedtype."</br>"; ?>   
											 
											  <?php endforeach;  }  ?>          
										   </td>    
                                          <td><?php echo $data->vechileregistrationno; ?></td>
                                         <td><a href="<?php echo site_url("Vehicles/fsl_report_dispatched_details/"); ?><?php echo $data->vechileid; ?>" 
										 class="btn bg-indigo waves-effect">view Details</a></td>
                                         <td><a href="javascript:void(0);" class="btn bg-green 
										 waves-effect" id="show_val<?php echo $data->vechileid; ?>" 
										 onclick="clicked(this);" custom="<?php echo $data->vechileid; ?>">
										 Receive From FSL</a></td>
										  
										  </tr>
										 
										  <?php endforeach; ?>
        </tbody>
        
    </table>
                        </div>
                    </div>