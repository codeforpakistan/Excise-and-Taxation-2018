   <!-- Large Size -->
          	   <div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header bg-gray">
								<h4 class="modal-title" id="defaultModalLabel">Release Vehicle</h4>
							</div>
							<form  action="#" id="Release_vehicle_waiting_handover" enctype="multipart/form-data">
							<div class="modal-body">
						
							<div class="row">
							<div class="col-md-4">
							<label>Letter no</label>
							</div>
							<div class="col-md-6">
							<div class="form-group">
											<div class="form-line">
												<input type="text" id="letterno" name="letterno" class="form-control" placeholder="Enter Letter no" required >
											</div>
										</div>
							</div>
						
							</div>
							<div class="row">
							<div class="col-md-4">
							<label>Receiver Name</label>
							</div>
							<div class="col-md-6">
							<div class="form-group">
											<div class="form-line">
												<input type="text" id="receivername" name="receivername" 
												class="form-control" placeholder="Enter Reciver Name" required>
												<input type="hidden" id="" name="handover" class="form-control" value="10">
											</div>
										</div>
							</div>
						
							</div>
							<div class="row">
							<div class="col-md-4">
							<label>Receiver Cnic</label>
							</div>
							<div class="col-md-6">
							<div class="form-group">
											<div class="form-line">
												<input type="text" id="receivercnic" data-inputmask='"mask": "99999-9999999-9"' data-mask  name="receivercnic" class="form-control" placeholder="Enter Reciver Cnic" required>
											</div>
										</div>
							</div>
						
							</div>
							<div class="row">
							<div class="col-md-4">
							<label>Receiver Mobile Number</label>
							</div>
							<div class="col-md-6">
							<div class="form-group">
											<div class="form-line">
												<input type="text" id="receivermobileno" data-inputmask='"mask": "9999-9999999"' data-mask name="receivermobileno" class="form-control" placeholder="Enter Receiver Mobile number" required>
											</div>
										</div>
							</div>
						
							</div>
							<div class="row">  
							<div class="col-md-4">
							<label>Date</label>
							</div>
							<div class="col-md-6">
							<div class="input-group demo-masked-input">
												<span class="input-group-addon">
													<i class="material-icons">date_range</i>
												</span>
												<div class="form-line">
											
													<input type="text" id="date_confis"
													name="date" class="datepicker form-control" placeholder="Please choose a date..." required>
												</div>
											</div>
							</div>
						
							</div>
							
								<div class="row">
							<div class="col-md-4">
							<label>Time</label>
							  
							</div>
							<div class="col-md-6">
							<div class="input-group">
												<span class="input-group-addon">
													<i class="material-icons">access_time</i>
												</span>
												<div class="form-line">
													<input type="text" name="time" id="confis_time" class="form-control
													time12" placeholder="Ex: 23:59" required>
												</div>
											</div>
							</div>
						
							</div>
								<div class="row">
							<div class="col-md-4">
							<label>Description</label>
							  
							</div>
							<div class="col-md-6">
							<div class="form-group">
											<div class="form-line">
												<textarea rows="4" name="description" id="description" class="form-control no-resize" placeholder="Please type Your Description"></textarea>
											</div>
										</div>
							</div>
						
							</div>
								<div class="row">
							<div class="col-md-4">
							<label>Attach letter Image</label>
							  
							</div>
							<div class="col-md-6">
							<div class="form-group">
											<div class="form-line">
												   <input type="file" name="userfile" id="userfile" class="form-control" required >
											</div>
										</div>
							</div>
						
							</div>
							
							  <input type="hidden" name="vechicle_id1" id="vechicle_id1" >
								
								
							</div>    
							<div class="modal-footer">
								<button  type="submit" id="submit" name="submit" class="btn bg-green  waves-effect" >Release</button>
								<button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
							</div>
							</form>
						</div>
					</div>
				</div>
	  <!-- send to Mra modal -->
  <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
                <div class="modal-dialog " role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="largeModalLabel">Confiscation Order</h4>
                        </div>
							<form  action="#" id="confiscate" enctype="multipart/form-data">
                        <div class="modal-body ">
					
						
						<div class="row">
						<div class="col-md-4">
						<label>Confiscation Order No</label>
						</div>
						<div class="col-md-4">
						<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="orderno" name="orderno" class="form-control" placeholder="Enter Letter no" required>
                                        </div>
                                    </div>
						</div>
					
						</div>
						<div class="row">  
						<div class="col-md-4">
						<label>Confiscation Order Date</label>
						</div>
						<div class="col-md-4">
						<div class="input-group demo-masked-input">
                                            <span class="input-group-addon">
                                                <i class="material-icons">date_range</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="text" id="date" name="date" class="datepicker form-control" placeholder="Please choose a date..." required>
                                            </div>
                                        </div>
						</div>
					
						</div>
						
							<div class="row">
						<div class="col-md-4">
						<label>Confiscation Order Time</label>
						  
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
						<label>Confiscation Description</label>
						  
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
						<label>Letter Issued</label>
						  
						</div>
						<div class="col-md-4">
						<div class="form-group">
                                        <div class="form-line">
                                               <input type="file" name="userfile" id="userfile" class="form-control"  required>
                                        </div>
                                    </div>
						</div>
					
						</div>
						
                          <input type="hidden" name="vechicle_id" id="vechicle_id" >
						             <button  type="submit" id="submit" name="submit" class="btn bg-green waves-effect">Confiscate</button>
								
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
                                FSL Reports							
                                <small></small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                              
                               
                            </ul>
                        </div>
                        <div class="body table-responsive">
                          <table id="warehouse" class="display" style="width:100%">
        <thead>
            <tr>
               
                
                <th>FormA</th>
                <th>Make</th>
                <th>Letterno</th>
				<th>Seized Category</th>
                <th>Fsl Report Status</th>
                
                
                 <th>Actions </th>
				 <th></th>
                 
            </tr>
        </thead>
		
        <tbody>
            <?php foreach($seized_vechicles as $key=>$data):?>
                                    <tr style="border-bottom:1px solid lightgray;">
                                        <td><?php echo $data->formserialno; ?></td>
                                          <td><?php echo $data->makename; ?></td>
                                         
                             
                                         
                                          <td><?php echo $data->fslletter; ?></td>
                                         
                                    
										  <?php $vehicleseize_category = explode(",",$data->categories); //print_r($vehicleseize_category);?>
											   <td>  	 
										 <?php  for($a=0; $a<sizeof($vehicleseize_category);$a++){ 
										 $query = custom_query("select * from tbl_vehicle_seized_categories where
										 siezedid={$vehicleseize_category[$a]}","result"); ?>
															<?php foreach($query as $category):?>
											 <?php echo $category->seizedtype."</br>"; ?>   
											 
											  <?php endforeach;  }  ?>          
										   </td> 
											<td><?php if($data->fslclearnotclear == 1) {echo "<span style='color:green;'>Cleared</span>";}else{
											echo "<span style='color:Red;'>Not Cleared</span>";	
											}?></td>										   
                                          <td><?php echo $data->vechileregistrationno; ?></td>
                                         <td><a href="<?php echo site_url("Vehicles/fsl_report_dispatched_details/"); ?><?php echo $data->vechileid; ?>" class="btn bg-indigo waves-effect">view Details</a></td>
                                         
									<td>
									<div class="btn-group" role="group">
									   
										<div class="btn-group" role="group">
											<button type="button" class="btn btn-success waves-effect dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
												Actions
												<span class="caret"></span>
											</button>
											<ul class="dropdown-menu">
											
												<li><a href="javascript:void(0);" class=" waves-effect waves-block"  class=" waves-effect waves-block" custom="<?php echo $data->vechileid; ?>" id="release" onclick="clicked(this);">Release</a></li>
												<li><a href="javascript:void(0);" class="waves-effect waves-block" id="show_val<?php echo $data->vechileid; ?>"  onclick="clicked_v2(this);" custom="<?php echo $data->vechileid; ?>">Confiscate</a></li>
												
												
											
												
											</ul>
										</div>   
									</div>
									
									</td>
										  
										  </tr>
										 
										  <?php endforeach; ?>
        </tbody>
        
    </table>
                        </div>
                    </div>