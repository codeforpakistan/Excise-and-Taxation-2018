

	   <div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header bg-gray">
								<h4 class="modal-title" id="defaultModalLabel">Release Vehicle</h4>
							</div>
							<form  action="#" id="release_vehicle" enctype="multipart/form-data">
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
												id="letterno" name="letterno" class="form-control" placeholder="Enter Letter no" required >
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
												<input type="text" id="receivercnic"
												data-inputmask='"mask": "99999-9999999-9"' data-mask
												name="receivercnic" class="form-control" placeholder="Enter Reciver Cnic" required>
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
													<input type="text" name="time" id="time-mra" class="form-control time12" placeholder="Ex: 23:59" required>
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
	  <!-- send to Mra modal -->



	  <!-- send to Mra modal -->
	   <!-- Default Size -->
				<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header bg-gray">
								<h4 class="modal-title custom-text" id="defaultModalLabel">Send vehicle To MRA</h4>
							</div>
							<p style="color:red;padding:5px; border-bottom:1px solid black;">Note:Document will Be sent to MRA and Vehicle will be sent to warehouse for parking</p>
							<form  action="#" id="sendtomra" enctype="multipart/form-data">
							<div class="modal-body">
							   <div class="row demo-masked-input">
							<div class="row">
							<div class="col-md-2">
							<label>Letter no</label>
							</div>
							<div class="col-md-6">
							<div class="input-group">
											<div class="form-line">
												<input type="text" id="letterno" name="letterno" class="form-control" placeholder="Enter Letter no" required autofocus>
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
												<input type="text" id="mradate" 
												name="mradate" class="datepicker form-control" 
												placeholder="Please choose a date..." required>
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
												<textarea rows="4" name="description"
												id="description" class="form-control no-resize" 
												placeholder="Please type Your Description" required></textarea>
											</div>
										</div>
							</div>

							</div>
								<div class="row">
							<div class="col-md-4">
							<label>Attach letter Image</label>

							</div>
							<div class="col-md-4">
							<div class="form-group">
											<div class="form-line">
												   <input type="file" name="userfile" 
												   id="userfile" class="form-control" >
											</div>
										</div>
							</div>

							</div>
							</div>
							  <input type="hidden" name="vechicle_id" id="vechicle_id" >
							  <input type="hidden" name="sendtoboth" id="sendtoboth" >


							</div>
							<div class="modal-footer">
								<button  type="submit" id="submit" name="submit" class="btn bg-green  waves-effect"  >Send</button>
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
									Seized Vehicle
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
											<th>Seized Category</th>
											<th>Mobile Squad No</th>

											<th>Reg No</th>
											<th>View</th>
											<th>Actions</th>

										</tr>
									</thead>
									<tbody>
									<?php

									foreach($seized_vechicles as $key=>$data):?>
										<tr>
											<th scope="row"><?php echo $key; ?></th>
											  <td><?php echo $data->siezeddate; ?></td>
											  <td><?php echo $data->siezedtime; ?></td>
											  <td><?php echo $data->formserialno; ?></td>

											  <?php $status = custom_query("select * from tbl_vehicle_status where vehicle_id ={$data->vechileid} and status_id=2","row");


											  ?>



											  <?php $vehicleseize_category = explode(",",$data->vehicleseize_category); //print_r($vehicleseize_category);?>
											   <td>
										 <?php  for($a=0; $a<sizeof($vehicleseize_category);$a++){
										 $query = custom_query("select * from tbl_vehicle_seized_categories where
										 siezedid={$vehicleseize_category[$a]}","result"); ?>
															<?php foreach($query as $category):?>
											 <?php echo $category->seizedtype."</br>"; ?>

											  <?php endforeach;  }  ?>
										   </td>

											<td><?php echo $data->mobilesquadno; ?></td>
											<td><?php echo $data->vechileregistrationno;?></td>


											<td><a href="<?php echo site_url("Vehicles/vehicle_single_detail/"); ?><?php echo $data->vechileid; ?>" class="btn bg-indigo waves-effect">view Details</a></td>
									 <td><div class="btn-group" role="group">

										<div class="btn-group" role="group">
											<button type="button" class="btn btn-success waves-effect dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
												Actions
												<span class="caret"></span>
											</button>
											<ul class="dropdown-menu">

												<li>
												<form id="receivedfrominspector" >
												<input type="hidden" name="vehicleid" 
												value="<?php echo $data->vechileid; ?>">
												<input  class="btn-submit" name="submit" 
												type="submit" onclick=" 
												return confirm('Are you want to Proceed?'); "
												title="Receive Vehicle From inspector"
												<?php echo $status->status_id; ?> 
												value="<?php if($status->status_id == 2 ){ echo 'Already Received';}else{ echo 'Receive Vehicle'; }?>" <?php if($status->status_id == 2 ){ echo "disabled"; }else{ echo ""; }?>>




											</form>
												</li>
												<li>
												<form id="sendtowhforfsl" >
												<input type="hidden" name="vehicleid" value="<?php echo $data->vechileid; ?>">
												<input  class="btn-submit" name="submit" 
												type="submit" onclick=" return confirm('Are you want to Proceed?'); "
												title="send Vehicle For FSL to Warehouse" value="Send To WH(FSL)"
												<?php if($status->status_id != 2 ){
													echo "disabled"; }else{echo '';}?>
												>

												</form>
												</li>


												<li><a href="javascript:void(0);"  class=" waves-effect waves-block" 
												custom="<?php echo $data->vechileid; ?>" id="mra"
												onclick="clicked_v2(this);" <?php if($status->status_id != 2 ){
													echo "style='pointer-events:
												none;'"; }else{echo '';}?>>Send To MRA												(WH Parking)</a></li>
												<li><a href="javascript:void(0);"
												<?php if($status->status_id != 2 ){
													echo "style='pointer-events:
												none;'"; }else{echo '';}?> class=" waves-effect waves-block" custom="<?php echo $data->vechileid; ?>" sendtoboth="1" id="sentoboth" onclick="clicked_v2(this);">Send To MRA + WH (FSL + Parking)</a></li>
												<li><a href="javascript:void(0);"
                                              <?php if($status->status_id != 2 ){
													echo "style='pointer-events:
												none;'"; }else{echo '';}?>
												class=" waves-effect waves-block"  class=" waves-effect waves-block" custom="<?php echo $data->vechileid; ?>" id="release" onclick="clicked(this);">Release</a></li>
											</ul>
										</div>
									</div></td>

											<td></td>

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
