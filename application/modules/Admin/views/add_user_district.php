<div class="card">
                        <div class="header">
                            <h2>
                             Add District
                                <small></small>
                            </h2>

                        </div>
                        <div class="body table-responsive">
                           <form action="<?php echo base_url(); ?>Admin/user_districts" method="post">
                           	<div class="row">
                           		 	<div class="col-sm-3">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="name" class="form-control" placeholder="Enter District Name ">
                                             <input type="hidden" name="district_id" class="form-control" value="<?php echo $this->uri->segment(3); ?>">
                                        </div>
                                    </div>
                                </div>



                              <div class="row col-md-offset-2">
                             <input type="submit" class="btn bg-indigo waves-effect" value="save">
                              </div>
                               </div>
                           </form>
                        </div>
                    </div>