	<!-- Large Size -->
            <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
                <div class="modal-dialog " role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="largeModalLabel">Confiscation Order</h4>
                        </div>
							<form  action="#" id="confiscate" enctype="multipart/form-data">
                        <div class="modal-body ">
					
						<div class="row demo-masked-input">
						<div class="row">
						<div class="col-md-5">
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
						</div> 
                          <input type="hidden" name="vechicle_id" id="vechicle_id" >
						             <button  type="submit" id="submit" name="submit" class="btn bg-green waves-effect">Confiscat</button>
								
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
						  	</form>
                        </div>
                        <div class="modal-footer">
                 
                        </div>
					
                    </div>
                </div>
            </div> 


   
            <div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header bg-gray">
								<h4 class="modal-title" id="defaultModalLabel">Release Vehicle</h4>
							</div>
							<form  action="#" id="Release_vehicle_waiting_handover" enctype="multipart/form-data">
							<div class="modal-body">
							   <div class="row demo-masked-input">
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
												<input type="text" id="receivername" name="receivername" class="form-control" placeholder="Enter Reciver Name" required>
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
											
													<input type="text" id="date" name="date" class="datepicker form-control" placeholder="Please choose a date..." required>
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
													<input type="text" name="time" id="time" class="form-control time12" placeholder="Ex: 23:59" required>
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

  
  
  
  
  
  
  
  
  
  
  
  
  <div class="card">
                        <div class="header">
                            <h2>
                               MRA Reports
                                <small></small>
                            </h2>
							
                            <ul class="header-dropdown m-r--5">
                              
                               <i class="material-icons" id="refresh">refresh</i>
                            </ul>
                        </div>
                        <div class="body table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        
                                        <th>Date</th>
                                        <th>Time</th>    
                                        <th>FormA</th>
                                        <th>MRA Seized Category</th>
                                        <th>LetterNo</th>   
                                        <th> Report Status</th>   
                                 
                                        
                                     
                                        <th>Actions</th>
										
                                    </tr>
                                </thead>
                                <tbody>
								<?php foreach($seized_vechicles as $key=>$data):?>
                                    <tr>
                                       
                                          <td><?php echo $data->mradate; ?></td>
                                          <td><?php echo $data->mratime; ?></td>
                             
                                          <td><?php echo $data->formserialno; ?></td>
                                          
                                    
										  <?php $vehicleseize_category = explode(",",$data->seize_categories); //print_r($vehicleseize_category);?>
											   <td>  	 
										 <?php  for($a=0; $a<sizeof($vehicleseize_category);$a++){ 
										 $query = custom_query("select * from tbl_vehicle_seized_categories where
										 siezedid={$vehicleseize_category[$a]}","result"); ?>
															<?php foreach($query as $category):?>
											 <?php echo $category->seizedtype."</br>"; ?>   
											 
											  <?php endforeach;  }  ?>          
										   </td>    
                                          <td><?php echo $data->mraletter; ?></td>
                                          <td><?php if($data->clearnotclearstatus == 1) { echo "clear";}else{
											  echo "<span style='color:red;'>Not Clear</span>";
										  }?></td>
                                           
                              
                                 
                                 <td><div class="btn-group" role="group">
                                   
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-success waves-effect dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            Actions
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">   
                                           
                                            
                                            <li><a href="javascript:void(0);" class=" waves-effect waves-block" class=" waves-effect waves-block" custom="<?php echo $data->vechileid; ?>" id="release" onclick="clicked(this);">Release</a></li>
                                            <li><a href="javascript:void(0);" class="waves-effect waves-block" id="show_val<?php echo $data->vechileid; ?>"  onclick="clicked_v2(this);" custom="<?php echo $data->vechileid; ?>">Confiscat</a></li></li>
                                        </ul>
                                    </div>
                                </div></td>
                                        <td></td>
                                        <td><a href="<?php echo site_url("Vehicles/mra_doc_receive_details/"); ?><?php echo $data->vechileid; ?>" class="btn bg-indigo waves-effect">Details</a></td>
                                       
                                    </tr>
									
									<?php endforeach; ?>
                                   
                                   
                                </tbody>
                            </table>
							<?php  if($this->session->flashdata("msg")){ 
							$type = "success";
							$msg = $this->session->flashdata("msg");?> 
							<script type="text/javascript">
                          
                                   //Set theme
                                  Command: toastr["success"]('<?php echo $msg; ?>')

toastr.options = {
 "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-bottom-center",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
                             
                      </script> 
					  <?php } //$this->session->sess_destory($this->session->flashdata("msg"));?>
                        </div>
                    </div>