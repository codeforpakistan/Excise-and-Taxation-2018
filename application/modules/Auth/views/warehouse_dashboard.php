<?php echo $this->session->userdata("msg"); ?>


    <h5>VEHICLES PENDING STATUS</h5>
	<div class="row">
		<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
						<div class="our-services-wrapper mb-60" id="box1">
							<div class="services-inner">

								<div class="our-services-text">

									<p class="text-center">VEHICLES PENDING FOR </br>ETO APPROVAL</p>
									<h4 class="text-center"><strong>
									<?php
									if(empty($eto_received))
									{
										echo "0";
									}else{
										echo $eto_received;
									}

									?>
									</strong></h4>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
							<div class="our-services-wrapper mb-60" id="box2">
							<div class="services-inner">

								<div class="our-services-text">

									<p class="text-center">VEHICLES PENDING FOR </br>CHECKIN IN WAREHOUSE</p>
									<h4 class="text-center"><strong><?php
									if(empty($pending_checkin))
									{
										echo "0";
									}else{
										echo $pending_checkin;
									}

									?></strong></h4>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
						<div class="our-services-wrapper mb-60" id="box3">
							<div class="services-inner">

								<div class="our-services-text">

									<p class="text-center">VEHICLES PENDING FOR </br>FSL REPORT</p>
									<h4 class="text-center"><strong><?php if(empty($fsl_reports)){
										echo "0";
									}else{
										echo $fsl_reports;
									} ?></strong></h4>
								</div>
							</div>
						</div>
					</div>
	</div>


	  <h5>MY PENDING TASKS</h5>
	<div class="row">
		<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
						<div class="our-services-wrapper mb-60 " >
							<div class="services-inner  bg-teal">

								<div class="our-services-text">

									<p class="text-center">Send VEHICLES To FSL </p>
									<h4 class="text-center"><strong><?php
									if(empty($pending_fsl)){echo "0";}else{
										echo $pending_fsl;
									}
									?></strong></h4>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
							<div class="our-services-wrapper mb-60 " >
							<div class="services-inner bg-red">

								<div class="our-services-text">

									<p class="text-center">Send FSL Report To ETO </p>
									<h4 class="text-center"><strong><?php
									if(empty($fsl_report_eto)){
										echo "0";
									}else{ echo $fsl_report_eto;}
									?></strong></h4>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
						<div class="our-services-wrapper mb-60 " >
							<div class="services-inner bg-deep-purple">

								<div class="our-services-text">

									<p class="text-center">Released Handover Vehicles </p>
									<h4 class="text-center"><strong><?php
									if(empty($Release_handover_status)){
										echo "0";
									}else{ echo $Release_handover_status;}
									?></strong></h4>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
						<div class="our-services-wrapper mb-60 " >
							<div class="services-inner bg-amber">

								<div class="our-services-text">

									<p class="text-center">Receive Alloted Vehicles </p>
									<h4 class="text-center"><strong><?php
									if(empty($receive_back)){
										echo "0";
									}else{ echo $receive_back;}
									?></strong></h4>
								</div>
							</div>
						</div>
					</div>
	</div>
	<div class="container">
		<div class="row">
		<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
						<div class="our-services-wrapper mb-60 " >
							<div class="services-inner bg-deep-purple">

								<div class="our-services-text">

									<p class="text-center">Pending for Handover  </p>
									<h4 class="text-center"><strong><?php
									if(empty($allot_handover_status->count)){
										echo "0";
									}else{ echo $allot_handover_status->count; }
									?></strong></h4>
								</div>
							</div>
						</div>
					</div>
		</div>
	</div>
	<div class="clearfix"></div>
	<h5>TOTAL RECORDS</h5>
<div class="row">
		<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
						<div class="our-services-wrapper mb-60 " >
							<div class="services-inner  ">
								<div class="row">
								<div class="col-md-6 bg-light-green" style="min-height:132px;">
								<i class="material-icons" style="position: relative;
    font-size: 58px;
    top: 51px;
    left: 20px;">directions_car</i>
								</div>
								<div class="col-md-6 bg-green">
<div class="our-services-text">

									<p class="text-center">TOTAL </br>STOCK</p>
									<h4 class="text-center"><strong><?php
									if(empty($total_stock->count) && empty( $stock_plus1 )){
										echo "0";
									}else{ echo  $total_stock->count + $stock_plus1;}
									?></strong></h4>
								</div>
								</div>
								</div>


							</div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
							<div class="our-services-wrapper mb-60 " >
							<div class="services-inner  ">
								<div class="row">
								<div class="col-md-6 bg-teal" style="min-height:132px;">
								<i class="material-icons" style="position: relative;
    font-size: 58px;
    top: 51px;
    left: 20px;">directions_car</i>
								</div>
								<div class="col-md-6 bg-cyan">
<div class="our-services-text">

									<p class="text-center">Total Released</br> Vehicles</p>
									<h4 class="text-center"><strong><?php
									if(empty($total_released->count)){
										echo "0";
									}else{ echo $total_released->count;}
									?></strong></h4>
								</div>
								</div>
								</div>


							</div>
						</div>
					</div>
					
					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
							<div class="our-services-wrapper mb-60 " >
							<div class="services-inner  ">
								<div class="row">
								<div class="col-md-6 bg-indigo" style="min-height:132px;">
								<img src="http://175.107.63.24/wms/assets/images/allot white-01.svg" 
								class="custom-icon-hw"  style="position: relative;
    font-size: 58px;
    top: 51px;
    left: 20px;"/>
								</div>
								<div class="col-md-6 bg-deep-purple">
<div class="our-services-text">

									<p class="text-center"> Ready For </br>Allotment</p>
									<h4 class="text-center"><strong><?php
									if(empty($ready_allotment->count)){
										echo "0";
									}else{ echo $ready_allotment->count;}
									?></strong></h4>
								</div>
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
