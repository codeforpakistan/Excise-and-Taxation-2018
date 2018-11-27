<?php echo $this->session->userdata("msg"); ?>
   <h5>VEHICLES PENDING STATUS</h5>
	<div class="row">
	
		<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
						<div class="our-services-wrapper mb-60" id="box1">
							<div class="services-inner">
								
								<div class="our-services-text">
									
									<p class="text-center">VEHICLES PENDING FOR </br>MRA REPORT</p>
									<h4 class="text-center"><strong><?php if(empty($count))
									{echo "0";}else{
										
									echo $count; } ?></strong></h4>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
							<div class="our-services-wrapper mb-60" id="box2">
							<div class="services-inner">
								
								<div class="our-services-text">
									
									<p class="text-center"> PENDING FOR WH</br>REPORTS</p>
									<h4 class="text-center"><strong><?php if(empty($wh_reports)){echo "0";}else{
										echo $wh_reports;
									}?></strong></h4>
								</div>
							</div>
						</div>
					</div>
				
	</div>

	  <h5>MY PENDING TASKS</h5>
	<div class="row">
	<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
						<a href="<?php echo base_url();?>/Vehicles/seized_vehicles" >
						<div class="our-services-wrapper mb-60 " >
							<div class="services-inner bg-teal">
								
								<div class="our-services-text">
									
									<p class="text-center">VEHICLES  TO BE<br> RECEIVED </p>
									<h4 class="text-center"><strong><?php if(empty($pending_receive)){
										echo "0";}else{
										echo $pending_receive;
									}?></strong></h4>
								</div>
							</div>
						</div>
						</a>
					</div>
			
				
					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
						<div class="our-services-wrapper mb-60 " >
							<div class="services-inner bg-deep-purple">
								
								<div class="our-services-text">
									
									<p class="text-center">TAKE ACTION ON </br>FSL REPORT</p>
									<h4 class="text-center"><strong><?php if(empty($fsl_reports))
									{echo "0";}else{
										echo $fsl_reports;
									} ?></strong></h4>
								</div>   
							</div>
						</div>    
					</div>
					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
						<div class="our-services-wrapper mb-60 " >
							<div class="services-inner bg-red">
								
								<div class="our-services-text">
									
									<p class="text-center">TAKE ACTION ON </br>MRA REPORT</p>
									<h4 class="text-center"><strong><?php if(empty($mra_reports)){
										echo "0";}else{
										echo $mra_reports;
									}?></strong></h4>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
						<a href="<?php echo base_url();?>/Vehicles/seized_vehicles" >
						<div class="our-services-wrapper mb-60 " >
							<div class="services-inner bg-amber">
								
								<div class="our-services-text">
									
									<p class="text-center">VEHICLES  PENDING FOR<br> Confiscation /Release </p>
									<h4 class="text-center"><strong><?php if(empty($pending_for_action)){
										echo "0";}else{
										echo $pending_for_action;
									}?></strong></h4>
								</div>
							</div>
						</div>
						</a>
	</div>
						
				
	</div>
	<div class="row">
	
	<div class="clearfix"></div>
		<!-- <h5>ANALYTICS</h5>	
<div class="row">
<div class="col-md-6">
<div class="card">
                <div class="body">
                           <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                        </div>
                    </div>
</div>

</div> -->
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