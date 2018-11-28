<div class="card">
                        <div class="header">
                            <h2>
                              <?php echo $name;?>
                                <small></small>
                            </h2>
                         
                        </div>
                        <div class="body table-responsive">
                           <form action="<?php echo base_url();?>Users/add_users" method="post">
                           	<div class="row">
                           		 	<div class="col-sm-3">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="username" class="form-control" placeholder="Enter users Name">
                                        </div>
                                    </div>
                                </div>
                                  <div class="col-sm-3">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="password" class="form-control" placeholder="Enter password">
                                        </div>
                                    </div>
                                </div>
                                 <div class="col-sm-3">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="usercnic" class="form-control" placeholder="Enter usercnic">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <div class="form-line">
                                          <select name="userrole" id="" class="form-control">
                                             <option value="">Assign Role</option>
                                            <?php foreach($all_roles as $roles):?>

                                            <option value="<?php echo $roles->id; ?>"><?php echo $roles->name;?></option>
                                          <?php endforeach; ?>
                                          </select>
                                        </div>
                                    </div>
                                </div>    
								<div class="col-sm-3">
                                    <div class="form-group">
                                        <div class="form-line">
                                          <select name="userdistrict" id="" class="form-control">
                                             <option value="">Assign District</option>
                                            <?php foreach($all_districts as $districts):?>

                                            <option value="<?php echo $districts->districtid; ?>"><?php echo $districts->districtname;?></option>
                                          <?php endforeach; ?>
                                          </select>
                                        </div>
                                    </div>
                                </div>
                                  <div class="col-sm-3">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="usermobile" class="form-control" placeholder="Enter usermobile number">
                                        </div>
                                    </div>
                                </div>
                                 
                           	</div>
                         
                              <div class="row col-md-offset-2">
                               <input type="submit" class="btn bg-indigo waves-effect" value="Add User">
                              </div>
                               
                           </form> 
                        </div>
                    </div>