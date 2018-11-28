 <div class="card">
                        <div class="header">
                            <h2>
                                  <?php echo $name; ?>
                                <small></small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                              <a href="<?php echo base_url();?>Permissions/add_permissions" class="btn bg-indigo waves-effect">Add Permission</a>
                               
                            </ul>
                        </div>
                        <div class="body table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        
                                        <th>Display Name</th>
                                        <th>Class Name</th>
                                         <th>Method Name</th>
                                         <th>icon</th>
                                         
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                        <?php foreach($all_permissions as $key=>$permissions):?>
                                            <tr>
                                        <th scope="row"><?php echo $key; ?></th>
                                        <td><?php echo $permissions->display_name; ?></td>
                                       <td><?php echo $permissions->class; ?></td>
                                       <td><?php echo $permissions->method; ?></td>
                                       <td><?php echo $permissions->icons; ?></td>
                                        <td><a href="<?php echo base_url();?>permissions/edit_permissions/<?php echo $permissions->id;?>" class="btn bg-indigo waves-effect">Edit</a></td>
                                         <td><a href="<?php echo base_url();?>/Roles/Delete" class="btn bg-indigo waves-effect">Delete</a></td>
                                          
                                          </tr>
                                    <?php endforeach; ?>
                                    
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>