<?php echo $this->session->userdata("msg"); ?>
   <h5>DASHBOARD</h5>
   <div class="row">
  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" >
                    <div class="info-box bg-indigo" style="background:#4ac2b2 !important;">
                        <div class="icon">
                     <img src="http://175.107.63.24/wms/assets/images/wh white-01.svg" class="custom-icon-hw"/>
                        </div>
                        <div class="content" >
                            <div class="text text-center">TOTAL STOCK IN WAREHOUSE</div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000"
							data-fresh-interval="20"><?php 
									if(empty($total_stock->count) && empty( $stock_plus1 )){
										echo "0";
									}else{ echo $total_stock->count + $stock_plus1; }
									?></div> 
                        </div>  
                    </div>
                </div>
   
  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-indigo" style="background:#1d1d60 !important;">
                        <div class="icon">
                                <img src="http://175.107.63.24/wms/assets/images/allot white-01.svg" class="custom-icon-hw"/>
                               
                        </div>
                        <div class="content">
                            <div class="text text-center">VEHICLE READY FOR ALLOTMENT</div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" 
							data-fresh-interval="20"><?php 
									if(empty($ready_allotment->count)){
										echo "0";
									}else{ echo $ready_allotment->count;}
									?></div>
                        </div>
                    </div>
                </div>
   
  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-indigo"  style="background:#ee6256 !important;">
                        <div class="icon">
                          
						      <img src="http://175.107.63.24/wms/assets/images/ready allot white-06.svg" class="custom-icon-hw"/>
                        </div>
                        <div class="content">
                            <div class="text text-center">TOTAL ALLOTED VEHICLE</div>
                            <div class="number count-to text-center" data-from="0" data-to="257" data-speed="1000" 
							data-fresh-interval="20"><?php 
									if(empty($alloted->count)){
										echo "0";
									}else{ echo $alloted->count;}
									?></div>
                        </div>
                    </div>
                </div>
  
  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-indigo" style="background:#eacc62 !important;">
                        <div class="icon">
                          <img src="http://175.107.63.24/wms/assets/images/releasedvec white-01.svg" class="custom-icon-hw"/>
                        </div>
                        <div class="content">
                            <div class="text text-center">RELEASED VEHICLE</div>
                            <div class="number count-to" data-from="0" data-to="257" 
							data-speed="1000" data-fresh-interval="20"><?php 
							
								if(empty($total_released->count))
								{
									echo "0";
								}else{
									echo $total_released->count;
								}
							
							
							?></div>
                        </div>
                    </div>
                </div>
   </div>
   <div class="row">
		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-indigo" style="background:#C3D0CF !important;">
                        <div class="icon">
                          <img src="http://175.107.63.24/wms/assets/images/releasedvec white-01.svg" class="custom-icon-hw"/>
                        </div>
                        <div class="content">
                            <div class="text text-center">TOTAL AUCTIONED VEHICLES</div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" 
							data-fresh-interval="20">
							<?php 
									if(empty($total_auctioned->count)){
										echo "0";
									}else{ echo $total_auctioned->count;}
									?></div>
                        </div>
                    </div>
                </div>
   </div>

				<h5>Pending Records</h5>	
				  <div class="row">
				  
				  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
						<div class="our-services-wrapper mb-60" style=" border-top: 7px solid #3D065A ;
    color: #3D065A;">
							<div class="services-inner">
								
								<div class="our-services-text" style="color:#3D065A ;">
									
									<p class="text-center">VEHICLES PENDING FOR <br>ETO APPROVAL</p>
									<h4 class="text-center"><strong>
									<?php if(empty($eto_pending_approval)){
										echo "0";
									}else{ echo $eto_pending_approval;}
									?>
													</strong></h4>
								</div>
							</div>   
						</div>
					</div>
					 <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
						<div class="our-services-wrapper mb-60" style=" border-top: 7px solid #F25C05;
    color:#F25C05;">
							<div class="services-inner">
								
								<div class="our-services-text" style="color:#F25C05;">
									
									<p class="text-center">Pending Action on </br>Seized Vehicles
								</p>
									<h4 class="text-center"><strong>
									<?php   
									
										echo $pending_action_eto;
									
									?>									</strong></h4>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
						<div class="our-services-wrapper mb-60" style=" border-top: 7px solid #B51A62 ;
    color: #B51A62;" >
							<div class="services-inner" style="color:#B51A62;">
								
								<div class="our-services-text">
									
									<p class="text-center">VEHICLES PENDING FOR <br>CHECKED IN WH</p>
									<h4 class="text-center"><strong>
									<?php if(empty($pending_for_checkedin)){
										echo "0";
									}else{ echo $pending_for_checkedin;}
									?>
																	</strong></h4>
								</div>
							</div>
						</div>  
					</div>
					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
						<div class="our-services-wrapper mb-60"  style=" border-top: 7px solid #437097 ;
    color: #B51A62;">
							<div class="services-inner">
								
								<div class="our-services-text" style="color:#437097;">
									
									<p class="text-center" style="color:#437097;">VEHICLES PENDING FOR <br>MRA RESPONSE</p>
									<h4 class="text-center"><strong>
									<?php if(empty($pending_mra_response)){
										echo "0";
									}else{ echo $pending_mra_response;}
									?>								</strong></h4>
								</div>
							</div>
						</div>
					</div>
					
				  </div>
				     
				  <div class="row">
				   <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
						<div class="our-services-wrapper mb-60" style=" border-top: 7px solid #4CAF50;
    color:#F25C05;">
							<div class="services-inner">
								
								<div class="our-services-text" style="color:#4CAF50;">
									
									<p class="text-center">Vehicles pending <br>in WH for FSL
								</p>
									<h4 class="text-center"><strong>
									<?php 
									
										echo $peding_wh_for_fsl;
									
									
									?>									</strong></h4>
								</div>
							</div>
						</div>
					</div>
				  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
						<div class="our-services-wrapper mb-60"  style=" border-top: 7px solid #5CA4C1 ;
    color: #5CA4C1;">   
							<div class="services-inner">
								
								<div class="our-services-text" style="color:#5CA4C1;">
									
									<p class="text-center">VEHICLES PENDING FOR <br>FSL Response</p>
									<h4 class="text-center"><strong>
									<?php if(empty($pending_fsl_report)){
										echo "0";
									}else{ echo $pending_fsl_report;}
									?>								</strong></h4>
								</div>
							</div>
						</div>
					</div>
				 <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
						<div class="our-services-wrapper mb-60" style=" border-top: 7px solid #F25C05;
    color:#F25C05;">
							<div class="services-inner">
								
								<div class="our-services-text" style="color:#F25C05;">
									
									<p class="text-center">FSL Report  pending <br>in WH for ETO
								</p>
									<h4 class="text-center"><strong>
									<?php 
									
										echo $pending_for_eto_fsl;
									
									
									?>									</strong></h4>
								</div>
							</div>
						</div>
					</div>
					   <div class="col-xl-3 col-lg-3 col-md-4 col-sm-3">
						<div class="our-services-wrapper mb-60"   style=" border-top: 7px solid #ABC15C ;
    color: #ABC15C;">
							<div class="services-inner">
								
								<div class="our-services-text" style="color:#ABC15C;">
									
									<p class="text-center">VEHICLES PENDING AT ETO<br>FOR CONFISACTION/RELEASE </p>
									<h4 class="text-center"><strong>
									<?php if(empty($pending_eto_decision)){
										echo "0";
									}else{ echo $pending_eto_decision;}
									?>																</strong></h4>
								</div>
							</div>
						</div>
					</div>
					
					
				  
				  </div>
				  <div class="container">
					<div class="row">
					
					 <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
						<div class="our-services-wrapper mb-60"  style=" border-top: 7px solid #F29F05;
    color:#F29F05;">
							<div class="services-inner">
								
								<div class="our-services-text" style="color:#F29F05;">
									
									<p class="text-center">VEHICLES PENDING FOR <br>WH HANDOVER</p>
									<h4 class="text-center"><strong>
										
									<?php if(empty($pending_handover)){
										echo "0";
									}else{ echo $pending_handover;}
									?>																									</strong></h4>
								</div>
							</div>
						</div>
					</div>
					  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
						<div class="our-services-wrapper mb-60" style=" border-top: 7px solid #F25C05;
    color:#F25C05;">
							<div class="services-inner">
								
								<div class="our-services-text" style="color:#F25C05;">
									
									<p class="text-center">VEHICLES PENDING FOR <br>WH RECEIVE BACK
								</p>
									<h4 class="text-center"><strong>
									0									</strong></h4>
								</div>
							</div>
						</div>
					</div>
					
					</div>
				  </div>
				<!--
					<h5>ANALYTICS</h5>	
<div class="row">
<div class="col-md-6">
<div class="card">
                <div class="body">
                            <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                        </div>
                    </div>
</div>

</div>
-->

<?php echo $this->session->unset_userdata("msg"); ?>



<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script>

Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Monthly Vehicles Report'
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        categories: [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'No of Vehicles '
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y} </b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Dir',
        data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]

    }, {
        name: 'Mardan',
        data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]

    }, {
        name: 'Swat',
        data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]

    }, {
        name: 'Chitral',
        data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]

    }]
});

</script>