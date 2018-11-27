
 <div class="card">
  <?php
if ($this->session->flashdata("success")) {
	$msg = $this->session->flashdata("success");
	$type = "success";
	echo '<div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong>' . $msg . '
  </div>';

}
$this->session->unset_userdata("success");
?>
                        <div class="header">
                            <h2>
                                  <?php echo $name; ?>
                                <small></small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                              <a href="<?php echo base_url(); ?>Users/add_users" class="btn bg-indigo waves-effect">Add User</a>

                            </ul>
                        </div>
                        <div class="body table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>

                                        <th>Name</th>
                                        <th>Role</th>
                                         <th>cnic</th>
                                          <th>Mobile</th>
                                          <th>Account Status</th>

                                         <th>Edit</th>
                                         <th>Delete</th>

                                    </tr>
                                </thead>
                                <tbody>

                                        <?php foreach ($all_users as $key => $result): ?>
                                            <tr>
                                        <th scope="row"><?php echo $key; ?></th>
                                        <td><?php echo $result->username; ?></td>
                                       <td><?php echo $result->name; ?></td>
                                       <td><?php echo $result->usercnic; ?></td>
                                        <td><?php echo $result->usermobile; ?></td>
										 <td><?php if ($result->isactive == 1) {
	echo "Active";} else {echo "Disable";}?>

                                        <td><a href="<?php echo base_url(); ?>Users/edit_user/<?php echo $result->userid; ?>" class="btn bg-indigo waves-effect">Edit</a></td>
                                         <td><a href="<?php echo base_url(); ?>/Roles/Delete" class="btn btn-danger waves-effect">Delete</a></td>
                                          <td><a href="<?php echo base_url(); ?>/Users/change_password/<?php echo $result->userid; ?>" class="btn btn-danger waves-effect">change Password</a></td>

										 </td>

                                          </tr>
                                    <?php endforeach;?>


                                </tbody>
                            </table>
							<div class="text-center">

							<?php echo $this->pagination->create_links(); ?></div>

                        </div>
                    </div>