<div class="card">
                        <div class="header">
                            <h2>
                              <?php echo $name;?>
                                <small></small>
                            </h2>
                         
                        </div>
                        <div class="body table-responsive">
                           <form action="<?php echo base_url();?>Permissions/edit_permissions" method="post">
                            <?php foreach($edit_permissions as $edit):?>
                           	<div class="row">
                           		 	<div class="col-sm-3">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" value="<?php echo $edit->class;?>" name="class" class="form-control" placeholder="Enter Class Name">
                                        </div>
                                    </div>
                                </div>
                                  <div class="col-sm-3">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" value="<?php echo $edit->method;?>"  name="method" class="form-control" placeholder="Enter Method Name">
                                        </div>
                                    </div>
                                </div>
                                 <div class="col-sm-3">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" value="<?php echo $edit->display_name;?>" name="display_name" class="form-control" placeholder="Enter Display Name">
                                        </div>
                                    </div>
                                </div>
                                  <div class="col-sm-3">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" value=
                                            '<?php echo $edit->icons; ?>'
                                             name="icon" class="form-control" 
                                             placeholder="Enter icon class">
                                        </div>
                                    </div>
                                </div>
                                  <div class="col-sm-3">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" value="<?php echo $edit->displaystatus;?>"  name="position" class="form-control" placeholder="Enter display position">
                                               <input type="hidden" value="<?php echo $this->uri->segment(3);?>"  name="id" class="form-control" placeholder="Enter display position">
                                        </div>
                                    </div>
                                </div>
                           	</div>
                         <?php endforeach; ?>
                              <div class="row col-md-offset-2">
                               <input type="submit" class="btn bg-indigo waves-effect" value="Edit Permission">
                              </div>
                               
                           </form> 
                        </div>
                    </div>