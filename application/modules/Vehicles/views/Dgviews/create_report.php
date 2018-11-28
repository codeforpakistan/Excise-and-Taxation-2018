<style>
.custom_height{
	height: 101px !important;
}

</style>
<div class="card">
                        <div class="header">
                            <h2>
                                Generate Report
                                <small></small>
                            </h2>
                            <ul class="header-dropdown m-r--5">


                            </ul>
                        </div>
						<div class="body" style="min-height:400px;">
              							<div class="row">
                              <div class="col-xl-2 col-lg-2 col-md-2  col-sm-2">
                              <div class="our-services-wrapper " id="box1">
                              <div class="services-inner custom_height">

                                <div class="our-services-text">

                                  <p class="text-center">TOTAL STOCK</p>
                                  <h4 class="text-center"><strong>
                                  <?php

                                    echo $stock_plus1+ $total_stock->count;


                                  ?>									</strong></h4>
                                </div>
                              </div>
                            </div>
                            </div>
              		<div class="col-xl-2 col-lg-2 col-md-2  col-sm-2">
              						<div class="our-services-wrapper" id="box2">

                                <div class="services-inner custom_height">
              								<div class="our-services-text" style="padding: 7px !important;">

              									<p class="text-center" style="font-size:12px;">Vehicles Pending </br>FSL</p>
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

              					<div class="col-xl-2 col-lg-2 col-md-2  col-sm-2">
              							<div class="our-services-wrapper  " id="box3">
              							<div class="services-inner custom_height">

              								<div class="our-services-text" style="padding: 7px !important;">

              									<p class="text-center" style="font-size:12px;">Vehicles Pending MRA </p>
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
              					<div class="col-xl-2 col-lg-2 col-md-2  col-sm-2">
              						<div class="our-services-wrapper " id="box3">
              							<div class="services-inner custom_height">

              								<div class="our-services-text" style="padding: 7px !important;" >

              									<p class="text-center" style="font-size:13px;">Handover Vehicles </p>
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
              					<div class="col-xl-2 col-lg-2 col-md-2  col-sm-2">
              						<div class="our-services-wrapper " id="box1">
              							<div class="services-inner custom_height">

              								<div class="our-services-text" style="padding: 7px !important;">

              									<p class="text-center" style="font-size:12px;">Ready For Allotment</p>
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


	<div class="row">
	<div class="col-md-3">

	<select class="form-control show-tick" id="search_cat">
    <option value="All">All</option>
                                        <option value="mra_pending">MRA Pending</option>
                                        <option value="fsl_pending">FSL Pending</option>
                                        <option value="ready_allotment">Ready For Allotment</option>
                                        <option value="handover">Handover</option>
                                        <option value="Auctioned">Auctioned</option>
                                        <option value="Released">Released</option>

                                        <option value="indi_allotment">Individual Alloted</option>
                                        <option value="dep_allotment">Department Alloted</option>
                                    </select>
	</div>
	<div class="col-md-3">
	<div class="input-group demo-masked-input">
												<span class="input-group-addon">
													<i class="material-icons">date_range</i>
												</span>
												<div class="form-line">

													<input type="text" id="datef" name="fdate"
													class="datepicker form-control"
													placeholder="From Date" required>
												</div>
											</div>
	</div>
		<div class="col-md-3">
	<div class="input-group demo-masked-input">
												<span class="input-group-addon">
													<i class="material-icons">date_range</i>
												</span>
												<div class="form-line">

													<input type="text" id="datet" name="tdate"
													class="datepicker form-control"
													placeholder="To Date" required>
												</div>
											</div>
	</div>
	<div class="col-md-2">
			<div class="input-group demo-masked-input">
			<button class="btn btn-success"  id="search">Search</button>
			</div>
	</div>
	</div>

	<table id="report_data" class="display" style="width:100%">
        <thead>
				<th>S.No</th>
                <th>Make</th>
                <th>Model</th>
                <th>Reg No</th>
                <th>Color</th>
                 <th>District Name</th>

            </tr>
        </thead>
        <tbody>

        </tbody>

    </table>
                      </div>

  </div>
