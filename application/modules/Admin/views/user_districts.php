
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
                                  User Districts
                                <small></small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                              <a href="<?php echo base_url(); ?>Admin/add_districts" class="btn bg-indigo waves-effect">Add District</a>

                            </ul>
                        </div>
                        <div class="body table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>

                                        <th>District Name</th>

                                         <th>Edit</th>
                                         <th>Delete</th>

                                    </tr>
                                </thead>
                                <tbody>

                                        <?php foreach ($all_districts as $key => $result): ?>
                                            <tr>
                                        <th scope="row"><?php echo $key; ?></th>
                                        <td><?php echo $result->districtname; ?></td>



                                        <td><a href="<?php echo base_url(); ?>Admin/edit_district/<?php echo $result->districtid; ?>" class="btn bg-indigo waves-effect">Edit</a></td>
                                         <td><a href="<?php echo base_url(); ?>/Admin/delete_district/<?php echo $result->districtid; ?>" class="btn btn-danger waves-effect">Delete</a></td>

										 </td>

                                          </tr>
                                    <?php endforeach;?>


                                </tbody>
                            </table>
							<div class="text-center">



                        </div>
                    </div>