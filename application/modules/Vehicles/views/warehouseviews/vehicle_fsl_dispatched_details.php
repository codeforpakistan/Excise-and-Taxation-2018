<?php $releasehandeover = 0 ;?>
<div class="card">
                        <div class="header">
                            <h2>Form A And FormB Report
                                <small></small>
                            </h2>
                        </div>
                  

        <div class="wizard">
            <div class="wizard-inner">
                <div class="connecting-line"></div>
                <ul class="nav nav-tabs" role="tablist">

                    <li role="presentation" class="active">
                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                           FORM A
                        </a>
                    </li>

                    <li role="presentation" >
                        <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                           Form B
                        </a>
                    </li>
					 <li role="presentation" >
                        <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
                           FSL Report
                        </a>
                    </li>
					
					<?php if(!empty($release_order) ):?>
                <li role="presentation" >
                    <a href="#step4" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                        Release Order
                    </a>
                </li>
                <?php else:?>

                <li role="presentation" >
                    <a href="#step4" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                        Confiscation Order
                    </a>
                </li>
                <?php endif; ?>
                  


                </ul>
            </div>


                <div class="tab-content ">
                    <div class="tab-pane active" role="tabpanel" id="step1">
                       <div class="container" style="    margin-top: 35px; margin-bottom: -100px;">
                           <div class="row">
                              <div class="border_bottom">
                                 <a href="<?php echo base_url();?>/Vehicles/generate_pdf_main/<?php 
							 echo $this->uri->segment(3); 
							 ?>" target="_blank"><span class="icon-name">Download</span> <i class="material-icons">picture_as_pdf</i> </a>
                                  <div class="col-md-6">
                                    
                                  </div>
                                  <div class="col-md-6">
                                        
                                  </div>
                              </div>
                           </div>
                       </div>
                      
                    <div class="row">
				
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
					
					 <!--
					 <div class="row brder_botom">
					 <p  class="text-left padding-5">Seize  Category</p>
					 </div>
					 -->
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

					 foreach($all_vechicle_specific as $data):
					 
					 $releasedhandover = $data->releasedhandover;
					 ?>
						<div class="row brder_botom text-left lin-height"> <p><?php  if(empty($data->mobilesquadno)){echo " N/A";}else{ echo $data->mobilesquadno;}?></p></div>
						<div class="row brder_botom text-left" ><p><?php  if(empty($data->username)){echo " N/A";}else{ echo $data->username;}?></p></div>
						<div class="row brder_botom text-left"><p><?php  if(empty($data->districtname)){echo " N/A";}else{ echo $data->districtname;}?></p></div>
					
					<!-- <div class="row brder_botom text-left"> <p><?php  //if(empty($data->seizedtype)){echo " N/A";}else{ echo $data->seizedtype;}?></p></div>-->
					<div class="row brder_botom text-left"> <p><?php  if(empty($data->siezeddate)){echo " N/A";}
					else{ echo $data->siezeddate;}?></p></div>
					<div class="row brder_botom text-left"> <p><?php  if(empty($data->siezedtime)){echo " N/A";}else{ echo $data->siezedtime;}?></p></div>
					<div class="row brder_botom text-left"> <p><?php  if(empty($data->formserialno)){echo " N/A";}else{ echo $data->formserialno;}?></p></div>
					<div class="row text-left"> <p><?php  if(empty(convert_to_address($data->seizedlocationlat,$data->seizedlocationlong))){echo " N/A";}else{ echo convert_to_address($data->seizedlocationlat,$data->seizedlocationlong);}?></p></div>
					
					 <?php endforeach; ?>
					 </div> 
					
	  </div>
	  </div>      
       
	  </div>       
	        
	  <div class="row" style="margin-top:-20px;">           
					  <div class="panel panel-default  col-md-offset-1">
      <div class="panel-heading"> <h5 class="col-md-offset-1">Vehicle Information </h5></div>
      <div class="panel-body">
	   <div class="col-md-5 col-md-offset-1">
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
					<div class="row brder_botom text-left"> <p><?php  if(empty($data->bodybuildname)){echo " N/A";}else{ echo $data->bodybuildname;}?></p></div>
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
					  <div class="col-md-6 ">
			  <ul id="image-gallery" class="gallery list-unstyled cS-hidden" 
			  style="height:480px !important;   margin-top:30px; background: black;" >
			  <?php foreach($all_vechicle_images as $key=>$img):?>
                    <li data-thumb="<?php echo base_url();?>uploads/<?php echo $img->imagepath; ?>" 
					style="width:450px;height:490px;
    margin-right: 0px;" > 
                        <img src="<?php echo base_url();?>uploads/<?php echo $img->imagepath; ?>"  />
                         </li>
						 <?php endforeach; ?>
                 
                </ul>
				 <div class="row">   
<div class="col-md-12">					 
					<div class="panel panel-default mgr-top-10">
      <div class="panel-heading"> <h5 class="col-md-offset-1"> Vechicle Accessories</h5></div>
      <div class="panel-body"><?php foreach($all_vechicle_accesories as $accesories):?>
					 <?php echo "<div class='col-md-5 col-md-offset-1'><p>".$accesories->accessoryicon." ".$accesories->accessoryname."</p></div>";?>
					 <?php endforeach; ?></div>
	  </div>
					 </div>

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
                    <div class="tab-pane" role="tabpanel" id="step2">
					<div class="container pos-absolute">
                        <div class="row">
						<div class="col-md-5">
						<div class="panel panel-default mgr-top-10">
      <div class="panel-heading"> <h5 class="col-md-offset-1"> FormB Details</h5></div>
      <div class="panel-body">
	
	  <div class="col-md-5">
						  
						  <h5>Letter No</h5>
						   <h5>FormB Date</h5>
						  <h5>FormBTime</h5>

						 
					<h5>Description</h5>
				
						</div>
	  
						
						<div class="col-md-6">
						<?php foreach($all_vechicle_specific as $data):?>
						<p><?php echo $data->form_bno;?></p>
						<p><?php echo $data->formbdate;?></p>
						<p><?php echo $data->formbtime;?></p>
						<p><?php echo $data->description;?></p>
						
						

					
</p>
						<?php endforeach;?>
						</div>
						
						
						</div>
						
						</div>  
<div class="row">
<div class="col-md-12">					 
					<div class="panel panel-default mgr-top-10">
      <div class="panel-heading"> <h5 class="col-md-offset-1"> Vehicle Form b Accessories</h5></div>
      <div class="panel-body"><?php foreach($formb_accessories as $accesories):?>
					 <?php echo "<div class='col-md-5 col-md-offset-1'><p>".$accesories->accessoryicon." ".$accesories->accessoryname."</p></div>";?>
					 <?php endforeach; ?></div>
	  </div>
					 </div>

				</div>						
						</div> 
						  
	     
	  <div class="col-md-5" >
	<ul id="image-gallery1" class="gallery list-unstyled cS-hidden" style="  margin-top:30px; background: black;
	height:432px !important;" >
			  <?php foreach($warehouse_images as $key=>$img):?>
                    <li data-thumb="<?php echo base_url();?>uploads/<?php echo $img->imagepath; ?>"  style="width: 560px;
    margin-right: 0px;" > 
                        <img src="<?php echo base_url();?>uploads/<?php echo $img->imagepath; ?>"  />
                         </li>      
						 <?php endforeach; ?>
                 
                </ul>
	  </div>
	  
		</div>   
	 	

				 </div>
	  </div>
	  
	    <div class="tab-pane" role="tabpanel" id="step3">
		<div class="row pos-absolute">
					<div class="container ">
                        <div class="row">
						<div class="col-md-7 col-md-offset-1">
						<div class="panel panel-default mgr-top-10">
      <div class="panel-heading"> <h5 class="col-md-offset-1"> FSL Sent Report</h5></div>
      <div class="panel-body">
	  <div class="row">
	  
	  <div class="col-md-6">
	  <p>LetterNo</p>
	  <p>Time</p>
	  <p>Date</p>
	  <p>description</p>
	  <p>Attachment</p>
	  </div>
	  <div class="col-md-6">
	  <?php foreach($fsl_report as $row):?>
	  <p><?php echo $row->letterno;?></p>
	  <p><?php echo $row->time;?></p>
	  <p><?php echo $row->date;?></p>
	  <p><?php echo $row->description;?></p>
	  <a href="<?php echo base_url();?>uploads/<?php echo $row->upload?>" target="_blank"><img src="<?php echo base_url();?>uploads/<?php echo $row->upload?>" width="150"/></a>
	  
	  <?php endforeach; ?>
	  </div>
	  </div>
	  </div>
	  
	  </div>
	  </div>
						</div>
						</div>
						
						<div class="container ">
                        <div class="row">
						<div class="col-md-7 col-md-offset-1">
						<div class="panel panel-default mgr-top-10">
      <div class="panel-heading"> <h5 class="col-md-offset-1"> Fsl Received Report</h5></div>
      <div class="panel-body">
	  <div class="row">
	  <?php if(empty($fsl_report_checkout)){echo " <p class='text-center'>Not Received Yet</p>";}else{?>
	  <div class="col-md-6">
	  <p>LetterNo</p>
	  <p>Time</p>
	  <p>Date</p>
	  <p>description</p>
	 <p>seize Categories</p>
	  
	  <p>Attachment</p>
	  </div>
	  <div class="col-md-6">
	  <?php  foreach($fsl_report_checkout as $key=>$row):?>  
	  <p><?php echo $row->letterno;?></p>
	  <p><?php echo $row->time;?></p>
	  <p><?php echo $row->date;?></p>
	  <p><?php echo $row->description;?></p>
	  <p><?php $vehicleseize_category = explode(",",$row->seized_category); //print_r($vehicleseize_category);?>
											   <td>  	 
										 <?php  for($a=0; $a<sizeof($vehicleseize_category);$a++){ 
										 $query = custom_query("select * from tbl_vehicle_seized_categories where
										 siezedid={$vehicleseize_category[$a]}","result"); ?>
															<?php foreach($query as $category):?>
											 <?php echo $category->seizedtype."</br>"; ?>   
											 
											  <?php endforeach;  }  ?>
		
		
	  </p>   
	  <a href="<?php echo base_url();?>uploads/<?php echo $row->upload?>" target="_blank"><img src="<?php echo base_url();?>uploads/<?php echo $row->upload?>" width="150"/></a>
	  
	  <?php endforeach; }?>
	  </div>  
	  </div>
	  </div>
	  
	  </div>
	  </div>
						</div>
						</div>
						</div>
						  
						</div>
						
						  <div class="tab-pane" role="tabpanel" id="step4">
				
					<div class="container pos-absolute">
                        <div class="row">
						<div class="col-md-7 col-md-offset-1">
						<?php if(!empty($confiscation_order)):?>
						<div class="panel panel-default mgr-top-10">
      <div class="panel-heading"> <h5 class="col-md-offset-1"> Confiscation Order</h5></div>
      <div class="panel-body">
	  <div class="row">
	  <?php if(empty($confiscation_order)){echo " <p class='text-center'>Not Received Yet</p>";}else{?>
	  <div class="col-md-6">
	  <p>Confiscation Order No</p>
	  <p>Confication  Date</p>
	  <p>Confiscation Description</p>
	
	  <p>Attachment</p>
	  </div>
	  <div class="col-md-6">
	  <?php  foreach($confiscation_order as $row):?>  
	  <p><?php echo $row->confiscationorderno;?></p>
	  <p><?php echo $row->confiscationorderdate;?></p>
	  <p><?php echo $row->confiscationdescription;?></p>
	  
	  <a href="<?php echo base_url();?>uploads/<?php echo $row->upload?>" target="_blank">
	  <img src="<?php echo base_url();?>uploads/<?php echo $row->upload?>" width="150"/></a>
	  
	  <?php endforeach; }?>
	  </div>
	  </div>
	  </div> 
	  
	  </div>
	  
	  <?php endif; ?>
	  
	  <?php if(!empty($release_order)):?>
						<div class="panel panel-default mgr-top-10">
      <div class="panel-heading"> <h5 class="col-md-offset-1"> Release Order</h5></div>
      <div class="panel-body">
	  <div class="row">
	  <?php if(empty($release_order)){echo " <p class='text-center'>Not Received Yet</p>";}else{?>
	    <div class="col-md-6">
                                    <p>Letter No</p>
                                    <p>Release  Date</p>
                                    <p>Release  Time</p>
                                    <p>Receiver Name</p>
                                    <p>Receiver Cnic</p>
                                    <p>Receiver Mobile No</p>
                                    <p>Description</p>

                                    <p>Attachment</p>
                                </div>
                                <div class="col-md-6">
                                    <?php  foreach($release_order as $row):?>
                                    <p><?php echo $row->letterno;?></p>
                                    <p><?php echo $row->releasedate;?></p>
                                    <p><?php echo $row->releasetime;?></p>
                                    <p><?php echo $row->receivername;?></p>
                                    <p><?php echo $row->receivercnic;?></p>
                                    <p><?php echo $row->receivermobileno;?></p>
                                    <p><?php echo $row->description;?></p>

                                    <a href="<?php echo base_url();?>uploads/<?php echo $row->upload?>" target="_blank">
                                        <img src="<?php echo base_url();?>uploads/<?php echo $row->upload?>" width="150"/></a>

                                    <?php endforeach; }?>
                                </div>
	  </div>
	  </div> 
	  
	  </div>
	  <?php endif; ?>
	  </div>
						</div>
						</div>
						</div>
						
						</div>
						
                       
               </div>     
        
        </div>
 
