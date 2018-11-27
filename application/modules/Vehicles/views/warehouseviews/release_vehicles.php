	   <div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header bg-gray">
								<h4 class="modal-title" id="defaultModalLabel">Release Vehicle</h4>
							</div>
							<form  action="#" id="release_vehicle_warehouse1" 
														enctype="multipart/form-data">
							<div class="modal-body">
							   <div class="row demo-masked-input">
							<div class="row">
							<div class="col-md-4">
							<label>Letter no</label>
							</div>   
							<div class="col-md-6">
							<div class="form-group">
											<div class="form-line">
												<input type="text" 
												id="letterno" name="letterno" class="form-control" 
												placeholder="Enter Letter no" required >
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
												<input type="text" id="receivername" 
												name="receivername" class="form-control"
												placeholder="Enter Reciver Name" required>
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
												<input type="text" id="receivercnic"
												data-inputmask='"mask": "99999-9999999-9"' data-mask  
												name="receivercnic" class="form-control"
												placeholder="Enter Reciver Cnic" required>
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
												<input type="text" id="receivermobileno"
												data-inputmask='"mask": "9999-9999999"' data-mask name="receivermobileno" class="form-control" placeholder="Enter Receiver Mobile number" required>
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
                                Release Vehicle To the Owner   
								    
                                <small></small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                            
                               
                            </ul>
                        </div>
                        <div class="body table-responsive">
                          <table id="readyforrelease" class="display" style="width:100%">
        <thead>
          <tr>
                
                
                <th>Form A</th>
                <th>Form B</th>
                <th>Make</th>
                <th>Model</th>
                <th>Reg No</th>
                <th>Color</th>
                 <th>view </th>
                 <th>view </th>
                
            </tr>
        </thead>
        <tbody>
            
        </tbody>
        
    </table>
                        </div>
                    </div>