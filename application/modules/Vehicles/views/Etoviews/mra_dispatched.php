  <!-- send to Mra modal -->
   <!-- Default Size -->
            <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-gray">
                            <h4 class="modal-title" id="defaultModalLabel">MRA Report</h4>
                        </div>
						<form  action="#" id="mrareceive" enctype="multipart/form-data">
                        <div class="modal-body">
                           <div class="row demo-masked-input">
						<div class="row">
						<div class="col-md-2">
						<label>Letter no</label>
						</div>
						<div class="col-md-6">
						<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="letterno" name="letterno" class="form-control" placeholder="Enter Letter no" required>
                                        </div>
                                    </div>
						</div>
					
						</div>
						<div class="row">  
						<div class="col-md-2">
						<label>Date</label>
						</div>
						<div class="col-md-6">
						<div class="input-group demo-masked-input">
                                            <span class="input-group-addon">
                                                <i class="material-icons">date_range</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="text" id="mradate" name="mradate" class="form-control " placeholder="" required>
                                            </div>
                                        </div>
						</div>
					
						</div>
						
							<div class="row">
						<div class="col-md-2">
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
						<div class="col-md-2">
						<label>Description</label>
						  
						</div>
						<div class="col-md-6">
						<div class="form-group">
                                        <div class="form-line">
                                            <textarea rows="4" name="description" id="description" class="form-control no-resize" placeholder="Please type Your Description" ></textarea>
                                        </div>
                                    </div>
						</div>
					
						</div>
						<div class="row">
						<div class="col-md-3">
						<label>Report Satus</label>
						  
						</div>
						<div class="col-md-4">
						<div class="form-group">
                                       <select name="reportsatus" class="form-control" id="clearnotclear" 
									   onchange="hide_cat(this.id)" required>
										<option value="">Report Satus</option>
										<option value="1">clear</option>
										<option value="2">Not Clear</option>
									   </select>
                                    </div>
						</div>
					
						</div>
						<div class="row" id="seized_cat">
						<div class="col-md-3">
						<label>Seize Category</label>
						
						</div>
						<div class="col-md-4">
						<div class="form-group">
                                       <select name="seizecategories[]" 
									   class="form-control" multiple id="" >
									   <?php foreach($seize_category as $categories):?>
										<option value="<?php echo $categories->siezedid; ?>"><?php echo $categories->seizedtype; ?></option>
										
										
										<?php endforeach; ?>
									   </select>
                                    </div>
						</div>
					
						</div>
							<div class="row">
						<div class="col-md-4">
						<label>MRA Report Picture </label>
						  
						</div>
						<div class="col-md-4">
						<div class="form-group">
                                        <div class="form-line">
                                               <input type="file" name="userfile" id="userfile" class="form-control" required >
                                        </div>
                                    </div>
						</div>
					
						</div>
						</div>
                          <input type="hidden" name="vechicle_id" id="vechicle_id" >
							
							
                        </div>    
                        <div class="modal-footer">
                            <button  type="submit" id="submit" name="submit" class="btn bg-green  waves-effect" >Save</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
						</form>
                    </div>
                </div>
            </div>
  <!-- send to Mra modal -->
  
  
  
  
  
  
  
  
  
  
  
  
  <div class="card">
                        <div class="header">
                            <h2>
                                MRA Dispatched Vehicle
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
                                        <th>#</th>
                                        <th>Date</th>
                                        <th>Time</th>    
                                        <th>Form A</th>
                                     
                                        <th>Make</th>   
                                        <th>Model</th>   
                                        
                                        <th>Reg No</th>
                                        <th>Actions</th>
										
                                    </tr>
                                </thead>
                                <tbody>
								<?php foreach($seized_vechicles as $key=>$data):
										
								?>
                                    <tr>
                                        <th scope="row"><?php echo $key; ?></th>
                                          <td><?php echo $data->siezeddate; ?></td>
                                          <td><?php echo $data->siezedtime; ?></td>
                                          <td><?php echo $data->formserialno; ?></td>
                                          <td><?php echo $data->makename; ?></td>
                                          <td><?php echo $data->submakename; ?></td>
                                        <td><?php echo $data->vechileregistrationno;?></td>
                                 <td> <a href="javascript:void(0);" class="btn bg-indigo waves-effect"  custom="<?php echo $data->vechileid; ?>"  id="receivemra" onclick="clicked_v2(this);" class="btn btn-success waves-effect ">
                                            Recieve
                                            
                                        </a></td>
                                        <td></td>
                                        <td><a href="<?php echo site_url("Vehicles/
										mra_doc_dispatched_details/"); ?><?php echo $data->vechileid; ?>" class="btn bg-indigo waves-effect">View Details</a></td>
                                        <td><a href="http://maps.google.com/?q=<?php echo $data->seizedlocationlat.",".$data->seizedlocationlong; ?>" target="_blank" class=" waves-effect"><i class="material-icons">location_on</i></a></td>
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