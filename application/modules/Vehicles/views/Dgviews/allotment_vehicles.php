

 <!-- Large Size -->
            <div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
                <div class="modal-dialog " role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="largeModalLabel">Allot Vehicles</h4>
                        </div>
						  <div class="body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                                <li role="presentation" class="active"><a href="#Department"
								data-toggle="tab">Department</a></li>
                                <li role="presentation">
                                  <a href="#Individual" data-toggle="tab">Individual</a></li>
                                <li role="presentation"><a href="#auction" data-toggle="tab">Auction</a></li>

                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="Department">
                                  	<form  action="#" id="allotvechicle" enctype="multipart/form-data">
                        <div class="modal-body ">

						
						<div class="row">
						<div class="col-md-4">
						<label>Department name</label>
						</div>
						<div class="col-md-4">
						<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="departmentname"
											name="departmentname" class="form-control" placeholder="Enter Letter no" required>
                                        </div>
                                    </div>
						</div>

						</div>

						<div class="row">
						<div class="col-md-4">
						<label>Designation</label>
						</div>
						<div class="col-md-4">
						<div class="input-group ">

                                            <div class="form-line">
                                                <input type="text" id="designation" name="designation" class="form-control " placeholder="" required>
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
						  <input type="hidden" name="authorisedby" id="authorisedby" value="<?php
						  echo $this->session->userdata('user_rolename'); ?>">
						             <button  type="submit" id="submit" name="submit" class="btn bg-green waves-effect">Allot vehicle</button>

                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
						  	</form>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="Individual">
                                       	<form  id="individualallotvechicle" method="post" enctype="multipart/form-data">
                        <div class="modal-body ">

						
						<div class="row">
						<div class="col-md-4">
						<label>Name</label>
						</div>
						<div class="col-md-4">
						<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="receiver_name" name="receiver_name" class="form-control"
											placeholder="Enter Receiver Name" required>
                                        </div>
                                    </div>
						</div>

						</div>

						<div class="row">
						<div class="col-md-4">
						<label>CNIC Number</label>
						</div>
						<div class="col-md-4">
						<div class="input-group ">

                                            <div class="form-line">
                                                <input type="text" id="cnicnumber" name="cnicnumber"
												class="form-control " placeholder=""
												data-inputmask='"mask": "99999-9999999-9"' data-mask
												required
												>
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
												name="mobilenumber"
												data-inputmask='"mask": "9999-9999999"' data-mask
												class="form-control " placeholder="">
                                            </div>
                                        </div>
						</div>

						</div>
						<div class="row">
						<div class="col-md-4">
						<label>Department Name</label>
						</div>
						<div class="col-md-4">
						<div class="input-group ">

                                            <div class="form-line">
                                                <input type="text" id="departmentname" name="departmentname"
												class="form-control " placeholder="" required>
                                            </div>
                                        </div>
						</div>

						</div>
						<div class="row">
						<div class="col-md-4">
						<label>Designation</label>
						</div>
						<div class="col-md-4">
						<div class="input-group ">

                                            <div class="form-line">
                                                <input type="text" id="designation" name="designation"
												class="form-control " placeholder="" >
                                            </div>
                                        </div>
						</div>

						</div>
            <input type="hidden" name="authorisedby" id="authorisedby" value="<?php
            echo $this->session->userdata('user_rolename'); ?>">

						

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
						<label>Attach Evidance</label>

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
                          <input type="hidden" name="vechicle_id1" id="vechicle_id1" >
						             <button  type="submit" id="submit" name="submit"
									 class="btn bg-green waves-effect">Allot vehicle</button>

                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
						  	</form>
                                </div>

								  <div role="tabpanel" class="tab-pane fade in " id="auction">
                                  	<form  action="#" id="auction" enctype="multipart/form-data">
                        <div class="modal-body ">

						
						<div class="row">
						<div class="col-md-4">
						<label>Department name</label>
						</div>
						<div class="col-md-4">
						<div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="departmentname"
											name="departmentname" class="form-control" placeholder="Enter Letter no" required>
                                        </div>
                                    </div>
						</div>

						</div>

						<div class="row">
						<div class="col-md-4">
						<label>Designation</label>
						</div>
						<div class="col-md-4">
						<div class="input-group ">

                                            <div class="form-line">
                                                <input type="text" id="designation" name="designation" class="form-control " placeholder="" required>
                                            </div>
                                        </div>
						</div>

						</div>
            <input type="hidden" name="authorisedby" id="authorisedby" value="<?php
            echo $this->session->userdata('user_rolename'); ?>">

						

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
                          <input type="hidden" name="vechicle_id2" id="vechicle_id2" >
						             <button  type="submit" id="submit" name="submit"
									 class="btn bg-green waves-effect">Auction vehicle</button>

                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
						  	</form>
                                </div>

                            </div>
                        </div>

                        </div>
                        <div class="modal-footer">

                        </div>

                    </div>
                </div>
            </div>

 <div class="card">
                        <div class="header">
                            <h2>
                                Allot Vehicle

                                <small></small>
                            </h2>
                            <ul class="header-dropdown m-r--5">


                            </ul>
                        </div>
                        <div class="body table-responsive">
                          <table id="allotmentdatatable"  class="display " style="width:100%">
        <thead>
          <tr>
				<th>S.No</th>
                <th>Date</th>
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
