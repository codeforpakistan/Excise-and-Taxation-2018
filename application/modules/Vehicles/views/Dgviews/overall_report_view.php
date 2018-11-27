<div class="card">
                        <div class="header">
                            <h2>
                                OverAll Report					
                                <small></small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                              
                               
                            </ul>
                        </div>
						<div class="body">

<div class="container">
							<div class="row">
							<div class="col-xl-5 col-lg-5 col-md-5 col-md-offset-2 col-sm-5">
							<div class="our-services-wrapper mb-60" id="box1">
							<div class="services-inner">
								
								<div class="our-services-text">
									
									<p class="text-center">TOTAL STOCK</p>
									<h4 class="text-center"><strong>
									<?php 
									if(!empty($total_stock->count) && !empty($stock_plus1))
									{
										echo $stock_plus1+ $total_stock->count;
									}else{
										echo "0";
									}
									
									?>									</strong></h4>
								</div>
							</div>
						</div>
						</div>    
							</div>
						</div>
							<div class="row">
		<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
						<div class="our-services-wrapper mb-60 ">
							<div class="services-inner  bg-teal">
								
								<div class="our-services-text">
									
									<p class="text-center">Vehicles Pending Fsl</p>
									<h4 class="text-center"><strong><?php 
									if(!empty($pending_fsl))
									{ echo $pending_fsl;
									}else{
										echo "0";
									}
									
									?></strong></h4>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
							<div class="our-services-wrapper mb-60 ">
							<div class="services-inner bg-red">
								
								<div class="our-services-text">
									
									<p class="text-center">Vehicles Pending Mra </p>
									<h4 class="text-center"><strong>
									<?php 
									if(!empty($pending_mra))
									{
										echo $pending_mra;
									}else{
										echo "0";
									}
									
									?>
									</strong></h4>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
						<div class="our-services-wrapper mb-60 ">
							<div class="services-inner bg-deep-purple">
								
								<div class="our-services-text">
									
									<p class="text-center">Handover VEHICLES </p>
									<h4 class="text-center"><strong>
									<?php 
									if(!empty($handoverd) && !empty($alloted_pending_handoverd))
									{
										echo $handoverd+$alloted_pending_handoverd;
									}else{
										echo "0";
									}
									?>
									</strong></h4>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
						<div class="our-services-wrapper mb-60 ">
							<div class="services-inner bg-amber">
								
								<div class="our-services-text">
									
									<p class="text-center">Ready For Allotment</p>
									<h4 class="text-center"><strong>
									<?php 
									if(!empty($ready_allotment))
									{
										echo $ready_allotment;
									}else{
										echo "0";
									}
									
									?>
									</strong></h4>
								</div>  
							</div>
						</div>
					</div>
	</div>
	</div>