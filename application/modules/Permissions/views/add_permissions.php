<div class="card">
                        <div class="header">
                            <h2>
                              <?php echo $name;?>
                                <small></small>
                            </h2>
                         
                        </div>
                        <div class="body table-responsive">
                           <form action="<?php echo base_url();?>Permissions/add_permissions" method="post">
                           	<div class="row">
                           		 	<div class="col-sm-3">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="class" class="form-control" placeholder="Enter Class Name">
                                        </div>
                                    </div>
                                </div>
                                  <div class="col-sm-3">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="method" class="form-control" placeholder="Enter Method Name">
                                        </div>
                                    </div>
                                </div>
                                 <div class="col-sm-3">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="display_name" class="form-control" placeholder="Enter Display Name">
                                        </div>
                                    </div>
                                </div>
                                  <div class="col-sm-3">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="icon" class="form-control" placeholder="Enter icon class">
                                        </div>
                                    </div>
                                </div>
                                  <div class="col-sm-3">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="position" class="form-control" placeholder="Enter display position">
                                        </div>
                                    </div>
                                </div>  
								
								<div class="col-sm-3">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <select class="form-control" name="parent_menu">
											<option value="0">No Parent</option>
											<?php foreach($parent_menu as $parent):?>
											<option value="<?php echo $parent->menuid;?>"><?php echo $parent->menuname;?>  </option>
											<?php endforeach; ?>
											</select>
											
                                        </div>
                                    </div>
                                </div>
                           	</div>
                         
                              <div class="row col-md-offset-2">
                               <input type="submit" class="btn bg-indigo waves-effect" value="Add Permission">
                              </div>
                               
                           </form> 
                        </div>
                    </div>