  <!-- Large Size -->
  <!-- Large Size -->
            <div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
                <div class="modal-dialog " role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="largeModalLabel">Handover Vehicle</h4>
                        </div>
						  

                            <!-- Tab panes -->
                            
                                  	 	<form  id="handover_form" method="post" enctype="multipart/form-data">
                        <div class="modal-body ">
					
						
						<div class="row">
						<div class="col-md-4">
						<label>Name</label>
						</div>
						<div class="col-md-4">
						<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" 
											id="receiver_name" name="receiver_name" 
											class="form-control" placeholder="Enter Receiver Name" required>
                                        </div>
                                    </div>
						</div>
					
						</div>
						
						<div class="row">  
						<div class="col-md-4">
						<label>Cnic Number</label>
						</div>
						<div class="col-md-4">
						<div class="input-group ">
                                            
                                            <div class="form-line">
                                                <input type="text" id="cnicnumber" 
												name="cnicnumber" class="form-control
												" data-inputmask='"mask": "99999-9999999-9"' data-mask  placeholder="" required>
                                            </div>
                                        </div>
						</div>
					
						</div>
						<div class="row">  
						<div class="col-md-4">
						<label>Mobile Number</label>
						</div>
						<div class="col-md-4">
						<div class="input-group ">
                                            
                                            <div class="form-line">
                                                <input type="text" 
												id="mobilenumber" 
												data-inputmask='"mask": "9999-9999999"' data-mask
												name="mobilenumber" class="form-control " placeholder="" required>
                                            </div>
                                        </div>
						</div>
					
						</div>
						
						<div class="row">  
						<div class="col-md-4">
						<label>Designation</label>
						</div>
						<div class="col-md-4">
						<div class="form-group ">
                                            
                                            <div class="form-line">
                                                <input type="text" id="designation" name="designation" 
												class="form-control " placeholder="">
                                            </div>
                                        </div>
						</div>
					
						</div>
						<input type="hidden" id="authorisedby" name="authorisedby" value="none">
					
					
						
						
							<div class="row">
						<div class="col-md-4">
						<label>Description</label>
						  
						</div>
						<div class="col-md-4">
						<div class="form-group">
                                        <div class="form-line">
                                            <textarea rows="4" name="description" id="description" 
											class="form-control no-resize" placeholder="Please type Your Description"></textarea>
                                        </div>
                                    </div>
						</div>
					
						</div>
							<div class="row">
						<div class="col-md-4">
						<label>Attach Evidance</label>
						  
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
						             <button  type="submit" id="submit" name="submit" 
									 class="btn bg-green waves-effect">Handover vehicle</button>
								
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
						  	</form>
                                </div>
                               
                        </div>
						
                        </div>
                        <div class="modal-footer">
                 
                        </div>
					
                 </div>
               
 
 <div class="card">
                        <div class="header">
                            <h2>
							
                               Handover Vehicle
								    
                                <small></small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                            
                               
                            </ul>
                        </div>
                        <div class="body table-responsive">
                          <table id="warehousehandover" class="display" style="width:100%">
        <thead>
            <tr>
               
                                           
                                        <th>Order Of</th>
                                        <th>From A</th>
                                        <th>Make</th>   
                                        <th>Model</th>   
                                        
                                        <th>Reg No</th>
                                        <th>Actions</th>
                                        <th>Handover</th>
            </tr>
        </thead>
        <tbody>
            
        </tbody>
        
    </table>
                        </div>
                    </div>