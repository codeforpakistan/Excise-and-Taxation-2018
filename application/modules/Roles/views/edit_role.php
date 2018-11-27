<div class="card">
                        <div class="header">
                            <h2>
                              <?php echo $name;?>
                                <small></small>
                            </h2>
                         
                        </div>
                        <div class="body table-responsive">
                           <form action="<?php echo base_url();?>Roles/role_edit" method="post">
                           	<div class="row">
                           		 	<div class="col-sm-3">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="rolename" value="<?php echo $role_name->name;?>" class="form-control" placeholder="Enter Role Name">
                                            <input type="hidden" name="roleid" value="<?php echo $role_name->id;?>" class="form-control" placeholder="Enter Role Name">
                                        </div>
                                    </div>
                                </div>
                           	</div>
                            <div class="row">
                              <?php foreach($all_acos as $menus): ?>

													<div class="col-md-2">
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-addon">
                                            <input type="checkbox" <?php foreach($specific_acos as $specific){if ($menus->id == $specific->aco_id){ echo "checked";}}?>  value="<?php echo $menus->id; ?>" name="check_list[]" class="filled-in" id="ig_checkbox">
                                            <label for="ig_checkbox"><?php echo $menus->display_name; ?></label>
                                        </span>
                                      
                                    </div>
                                </div>
                              <?php endforeach; ?>
                              </div>
                              <div class="row col-md-offset-2">
                               <input type="submit" class="btn bg-indigo waves-effect" value="Update Role">
                              </div>
                               
                           </form> 
                        </div>
                    </div>