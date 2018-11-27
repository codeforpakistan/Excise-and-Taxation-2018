<div class="card">
                        <div class="header">
                            <h2>
                              Change Password
                                <small></small>
                            </h2>

                        </div>
                        <div class="body table-responsive">
                           <form action="<?php echo base_url(); ?>Auth/change_password" method="post">
                           	<div class="row">
                           		 	<div class="col-sm-3">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="password" class="form-control" placeholder="Enter password ">
                                             <input type="hidden" name="user_id" class="form-control" value="<?php echo $this->uri->segment(3); ?>">
                                        </div>
                                    </div>
                                </div>



                              <div class="row col-md-offset-2">
                             <input type="submit" class="btn bg-indigo waves-effect" value="Update password">
                              </div>
                               </div>
                           </form>
                        </div>
                    </div>