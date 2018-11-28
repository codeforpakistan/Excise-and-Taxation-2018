<div class="card">
                        <div class="header">
                            <h2>
                              <?php echo $name; ?>
                                <small></small>
                            </h2>
                         <?php $userdistrict = "";

foreach ($user_district as $user_district) {
	$userdistrict = $user_district->district_id;}?>
                        </div>

                        <div class="body table-responsive">
                           <form action="<?php echo base_url(); ?>Users/edit_user/<?php echo
$this->uri->segment(3); ?>" method="post">
                           	<div class="row">
                           		 	<div class="col-sm-3">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="username" value="<?php echo $specific_user->username; ?>" class="form-control" placeholder="Enter users Name">
                                        </div>
                                    </div>
                                </div>


                                 <div class="col-sm-3">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="usercnic" value="<?php echo
$specific_user->usercnic; ?>" class="form-control" placeholder="Enter usercnic">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <div class="form-line">
                                          <select name="userrole" id="" class="form-control">
                                             <option value="">Assign Role</option>
                                            <?php foreach ($all_roles as $roles): ?>

                                            <option value="<?php echo $roles->id; ?>" <?php if ($roles->id == $user_role->role_id) {echo "selected";}?>><?php echo $roles->name; ?></option>
                                          <?php endforeach;?>
                                          </select>
                                        </div>
                                    </div>
                                </div>
								<div class="col-sm-3">
                                    <div class="form-group">
                                        <div class="form-line">
                                          <select name="userdistrict" id="" class="form-control">
                                             <option value="">Assign District</option>
                                            <?php foreach ($all_districts as $districts): ?>

                                            <option value="<?php echo $districts->districtid; ?>"
											<?php if ($districts->districtid == $userdistrict) {echo "selected";}?>><?php echo $districts->districtname; ?>
										</option>
                                          <?php endforeach;?>
                                          </select>
                                        </div>
                                    </div>
                                </div>
								<div class="col-sm-3">
                                    <div class="form-group">
                                        <div class="form-line">
                                          <select name="isactive" id="" class="form-control">
                                             <option value="">Activate Status</option>
                                           <option value="1" <?php if ($specific_user->isactive == 1) {
	echo "selected";
}?>>Activate</option>
										   <option value="0" <?php if ($specific_user->isactive != 1) {
	echo "selected";
}?>>Disable</option>
										</option>

                                          </select>
                                        </div>
                                    </div>
                                </div>
                                  <div class="col-sm-3">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="usermobile" value="<?php echo $specific_user->usermobile; ?>"class="form-control" placeholder="Enter usermobile number">
                                        </div>
                                    </div>
                                </div>

                           	</div>

                              <div class="row col-md-offset-2">
                               <input type="submit" class="btn bg-indigo waves-effect" value="Update User">
                              </div>

                           </form>
                        </div>
                    </div>