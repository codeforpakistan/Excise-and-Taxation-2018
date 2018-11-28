


<div class="container">
<div class="row">
<div class="card">
                        <div class="header">
                            <h2><a href="<?php echo base_url();?>Vehicles/seized_vehicles" class="icon-pos">
							<i class="material-icons">keyboard_backspace</i></a>Vehicle Specification
                                <small></small>
                            </h2>
                        </div>






                    <!--
                       <div class="container">
                           <div class="row">

                                 <a href="#"><span class="icon-name">Download</span> <i class="material-icons">picture_as_pdf</i> </a>
                                  <div class="col-md-6">

                                  </div>
                                  <div class="col-md-6">


                              </div>
                           </div>
                       </div>
                      -->
					  <div class="row">


				</div>
				<div class="col-md-5">

					 <div class="clearfix"></div>

					  <div class="row" style="margin-top:20px;">
					  <div class="panel panel-default mgr-top-10 col-md-offset-1">
      <div class="panel-heading"> <h5 class="col-md-offset-1"> Seize Details</h5></div>
      <div class="panel-body">
	   <div class="col-md-4 col-md-offset-1">
	   	 <div class="row brder_botom">

					 <p  class="text-left">Mobile Squad Number</p>
					 </div>
					 <div class="row brder_botom">
					 <p  class="text-left">Inspector Name</p>
					 </div>
					 <div class="row brder_botom">
					 <p  class="text-left padding-5">Seize District</p>
					 </div>



					 <div class="row brder_botom">
					 <p  class="text-left padding-5">Seize Date</p>
					 </div>
					 <div class="row brder_botom">
					 <p  class="text-left padding-5"> Seize Time</p>
					 </div>
					 <div class="row brder_botom">
					 <p  class="text-left padding-5">Form No</p>
					 </div>
					  <div class="row brder_botom" >
					 <p class="text-left padding-5">Seized Location</p>

					 </div>

					 </div>
					 <div class="col-md-6" >

					 <?php

					 foreach($all_vechicle_specific as $data):?>
						<div class="row brder_botom text-left lin-height"> <p><?php  if(empty($data->mobilesquadno)){echo " N/A";}else{ echo $data->mobilesquadno;}?></p></div>
						<div class="row brder_botom text-left" ><p><?php  if(empty($data->username)){echo " N/A";}else{ echo $data->username;}?></p></div>
						<div class="row brder_botom text-left"><p><?php  if(empty($data->districtname)){echo " N/A";}else{ echo $data->districtname;}?></p></div>


					<div class="row brder_botom text-left"> <p><?php  if(empty($data->siezeddate)){echo " N/A";}
					else{ echo $data->siezeddate;}?></p></div>
					<div class="row brder_botom text-left"> <p><?php  if(empty($data->siezedtime)){echo " N/A";}else{ echo $data->siezedtime;}?></p></div>
					<div class="row brder_botom text-left"> <p><?php  if(empty($data->formserialno)){echo " N/A";}else{ echo $data->formserialno;}?></p></div>
					<div class="row text-left"> <p><?php
					echo convert_to_address($data->seizedlocationlat,$data->seizedlocationlong); ?></p></div>

					 <?php endforeach; ?>
					 </div>

	  </div>
	  </div>

	  </div>

	  <div class="row" style="margin-top:-20px;">
					  <div class="panel panel-default  col-md-offset-1">
      <div class="panel-heading"> <h5 class="col-md-offset-1">Vehicle Information </h5></div>
      <div class="panel-body">
	   <div class="col-md-4 col-md-offset-1">
	   	 <div class="row brder_botom">

					 <p  class="text-left lin-height">Chasis No</p>
					 </div>
					 <div class="row brder_botom">
					 <p  class="text-left">Engine No</p>
					 </div>
					 <div class="row brder_botom">
					 <p  class="text-left padding-5">Vehicle Registration</p>
					 </div>
					 <div class="row brder_botom">
					 <p  class="text-left padding-5">Registration District</p>
					 </div>


					 <div class="row brder_botom">
					 <p  class="text-left padding-5">Make</p>
					 </div>
					 <div class="row brder_botom">
					 <p  class="text-left padding-5">Model</p>
					 </div>
					 <div class="row brder_botom">
					 <p  class="text-left padding-5">Model Year</p>
					 </div>
					 <div class="row brder_botom">
					 <p  class="text-left padding-5">Vehicle Type</p>
					 </div>
					  <div class="row brder_botom" >
					 <p class="text-left padding-5">Body Build</p>

					 </div>
					 <div class="row brder_botom" >
					 <p class="text-left padding-5">color</p>

					 </div>
					 <div class="row brder_botom" >
					 <p class="text-left padding-5">Transmission</p>

					 </div>
					 <div class="row brder_botom" >
					 <p class="text-left padding-5">Assembely</p>

					 </div>
					 <div class="row brder_botom" >
					 <p class="text-left padding-5">Wheels</p>

					 </div>
					 <div class="row brder_botom" >
					 <p class="text-left padding-5">Engine Type</p>

					 </div>
					 <div class="row brder_botom" >
					 <p class="text-left padding-5">Engine Capacity</p>

					 </div>

					 <div class="row brder_botom" >
					 <p class="text-left padding-5">Mileage</p>

					 </div>
					  <div class="row brder_botom" >
					 <p class="text-left padding-5">Description</p>

					 </div>

					 </div>
					 <div class="col-md-6" >

					 <?php

					 foreach($all_vechicle_specific as $data):?>
						<div class="row brder_botom text-left lin-height"> <p><?php  if(empty($data->chasisno)){echo " N/A";}else{ echo $data->chasisno;}?></p></div>
						<div class="row brder_botom text-left" ><p><?php  if(empty($data->engineno)){echo " N/A";}else{ echo $data->engineno;}?></p></div>


					<div class="row brder_botom text-left"> <p><?php  if(empty($data->vechileregistrationno)){echo " N/A";}else{ echo $data->vechileregistrationno;}?></p></div>
					<div class="row brder_botom text-left"> <p><?php  if(empty($data->registrationdistrictname)){echo " N/A";}else{ echo $data->registrationdistrictname;}?></p></div>
					<div class="row brder_botom text-left"> <p><?php  if(empty($data->makename)){echo " N/A";}else{ echo $data->makename;}?></p></div>
					<div class="row brder_botom text-left"> <p><?php  if(empty($data->submakename)){echo " N/A";}else{ echo $data->submakename;}?></p></div>
					<div class="row brder_botom text-left"> <p><?php  if(empty($data->modelyear)){echo " N/A";}else{ echo $data->modelyear;}?></p></div>
					<div class="row brder_botom text-left"> <p><?php  if(empty($data->vehicletype)){echo " N/A";}else{ echo $data->vehicletype;}?></p></div>
					<div class="row brder_botom text-left"> <p><?php  if(empty($data->bodybuildname))
					{echo " N/A";}else{ echo $data->bodybuildname;}?></p></div>
					<div class="row brder_botom text-left"> <p><?php  if(empty($data->colorname)){echo " N/A";}else{ echo $data->colorname;}?></p></div>
					<div class="row brder_botom text-left"> <p><?php  if(empty($data->transmission)){echo " N/A";}else{ echo $data->transmission;}?></p></div>
					<div class="row brder_botom text-left"> <p><?php  if(empty($data->assembely)){echo " N/A";}else{ echo $data->assembely;}?></p></div>

					<div class="row brder_botom text-left"> <p><?php  if(empty($data->wheelnumber)){echo " N/A";}else{ echo $data->wheelnumber;}?></p></div>
					<div class="row brder_botom text-left"> <p><?php  if(empty($data->enginetype)){echo " N/A";}else{ echo $data->enginetype;}?></p></div>
					<div class="row brder_botom text-left"> <p><?php  if(empty($data->vehicleengine_capcaity)){echo " N/A";}else{ echo $data->vehicleengine_capcaity;}?></p></div>
					<div class="row brder_botom text-left"> <p><?php  if(empty($data->mileage)){echo " N/A";}else{ echo $data->mileage;}?></p></div>
					<div class="row brder_botom text-left"> <p><?php  if(empty($data->vechicledescription)){echo " N/A";}else{ echo $data->vechicledescription;}?></p></div>


					 <?php endforeach; ?>
					 </div>

	  </div>
	  </div>

	  </div>






				</div>
					  <div class="col-md-5 ">
			  <ul id="image-gallery" class="gallery list-unstyled cS-hidden mgr-top-10" style="
           height:480px !important;width:350px;   margin-top:30px; background: black;" >
			  <?php

			  foreach($all_vechicle_images as $img):?>
                    <li data-thumb="<?php echo base_url();?>/uploads/<?php echo $img->imagepath; ?>"
                        style="width:450px;height:490px;
    margin-right: 0px;" >
                        <img src="<?php echo base_url();?>/uploads/<?php echo $img->imagepath; ?>" class="col-md-offset-1" style="width:100%;"  />
                         </li>
						 <?php endforeach; ?>

                </ul>
				<div class="panel panel-default mgr-top-10">
      <div class="panel-heading"> <h5 class="col-md-offset-1"> Vehicle Accessories</h5></div>
      <div class="panel-body"><?php foreach($all_vechicle_accesories as $accesories):?>
					 <?php echo "<div class='col-md-5 col-md-offset-1'><p>".$accesories->accessoryicon." ".$accesories->accessoryname."</p></div>";?>
					 <?php endforeach; ?></div>
	  </div>
					<div class="panel panel-default ">
      <div class="panel-heading"> <h5 class="col-md-offset-1">Driver and Owner Information</h5></div>
         <div class="row">
		 <div class="col-md-5 col-md-offset-1">
		 <div class="row brder_botom lin-height" >
					 <p class="text-left padding-5">Driver Name</p>

					 </div>
					 <div class="row brder_botom" >
					 <p class="text-left padding-5">Driver Cnic</p>

					 </div>
					 <div class="row brder_botom" >
					 <p class="text-left padding-5">Driver MobileNo</p>

					 </div>
					 <div class="row brder_botom" >
					 <p class="text-left padding-5">Driver Address</p>

					 </div>
					 <div class="row brder_botom" >
					 <p class="text-left padding-5">Owner Name</p>

					 </div>
					 <div class="row brder_botom" >
					 <p class="text-left padding-5">Owner Cnic</p>

					 </div>
					 <div class="row brder_botom" >
					 <p class="text-left padding-5">Owner Mobile No</p>

					 </div>
		 </div>
		 <div class="col-md-5">
			<?php foreach($all_vechicle_specific as $data):?>
						<div class="row brder_botom text-left lin-height"> <p><?php  if(empty($data->drivername)){echo " N/A";}else{ echo $data->drivername;}?></p></div>
						<div class="row brder_botom text-left "> <p><?php  if(empty($data->drivercnicno)){echo " N/A";}else{ echo $data->drivercnicno;}?></p></div>
						<div class="row brder_botom text-left "> <p><?php  if(empty($data->drivermobileno)){echo " N/A";}else{ echo $data->drivermobileno;}?></p></div>
						<div class="row brder_botom text-left "> <p><?php  if(empty($data->driveraddress)){echo " N/A";}else{ echo $data->driveraddress;}?></p></div>
						<div class="row brder_botom text-left "> <p><?php  if(empty($data->vechileownername)){echo " N/A";}else{ echo $data->vechileownername;}?></p></div>
						<div class="row brder_botom text-left "> <p><?php  if(empty($data->vechileownercnic)){echo " N/A";}else{ echo $data->vechileownercnic;}?></p></div>
						<div class="row brder_botom text-left "> <p><?php  if(empty($data->vechileownermobileno)){echo " N/A";}else{ echo $data->vechileownermobileno;}?></p></div>
						<?php endforeach; ?>
		 </div>
		 </div>
	  </div>

				</div>



                    <div class="clearfix"></div>

        </div>
		</div>
		</div>
