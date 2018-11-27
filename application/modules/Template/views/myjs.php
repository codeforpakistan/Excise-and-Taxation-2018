 
<script>
function add_class(id)
{
	
	$("ul li .active").removeClass("active"); 
}
  jQuery(function() {
    var pgurl = window.location.href.substr(window.location.href);
      //.lastIndexOf("/")+1);
	  //console.log(pgurl);
    jQuery("#menu  li a").each(function(){
      if( pgurl == jQuery(this).attr("href") )
	  
        jQuery(this).addClass("active");
        //jQuery(this).css("color","red !important");
       // jQuery(this > " span ").css("color","red !important");
		
		//console.log(jQuery(this).attr("href"));
		//console.log("page" + pgurl);
	  
        //jQuery("#menu li").css("color","red");
	   
    })
  });

function hide_cat(id)
{  var make_id= "#"+id;
var clear = $(make_id+" option:selected").val();
if(clear==1)
{
	$("#seized_cat").css("display","none");
}else{
	$("#seized_cat").css("display","block");
}
//console.log(make_id+" option:selected");
}
var currentDate = new Date();

var date = currentDate.getDate();
var month = currentDate.getMonth(); //Be careful! January is 0 not 1
var year = currentDate.getFullYear();

var dateString = year + "-" +(month + 1) + "-" +date ;
$("#date").val(dateString);
$("#mradate").val(dateString);
$("#date_confis").val(dateString);
var time = new Date();

  var cur_time = time.toLocaleString('en-US', { hour: 'numeric', minute: 'numeric', hour12: true });
$("#time").val(cur_time);
$("#confis_time").val(cur_time);
$("#time-mra").val(cur_time);

/*
|--------------------------------------------------------------------------
|ETO Ajax Calls STARTS
|--------------------------------------------------------------------------
*/



$('#image-gallery').lightSlider({
                gallery:true,
                item:1,
                thumbItem:5,
                slideMargin: 0,
                speed:500,
                auto:false,
                loop:false,
                onSliderLoad: function() {
                    $('#image-gallery').removeClass('cS-hidden');
                }
            });



 function submitform() {   document.myform.submit(); }

 $(document).on('submit','#receivedfrominspector',function(event){
				event.preventDefault();

					$.ajax({
url: "<?php echo base_url();?>/Vehicles/Receive_vehicle_from_inspector",
type: "POST",
data: new FormData(this),
contentType: false,
cache: false,
processData:false,
beforeSend:function (){
	$("button[type='submit']").attr('disabled',false);
},
success: function()
{


	     Command: toastr["success"]('Successfully Received From Inspector ')

toastr.options = {
 "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-bottom-center",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"

}
location. reload(true);

},complete: function(){
                        
                        $("button[type='submit']").attr('disabled',false);
                    }
			});
			});

//function to stop a href from submitting
			 function submitform() {   document.myform.submit(); }


// function to send vehicle to warehouse for fsl

 $(document).on('submit','#sendtowhforfsl',function(event){
				event.preventDefault();

					$.ajax({
url: "<?php echo base_url();?>/Vehicles/sendtowh_fsl",
type: "POST",
data: new FormData(this),
contentType: false,
cache: false,
processData:false,
beforeSend:function (){
	
                        
                        $("button[type='submit']").attr('disabled',true);
                    
},
success: function()
{


	     Command: toastr["success"]('Successfully Sent To  Warehouse For Fsl ')

toastr.options = {
 "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-bottom-center",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"

}
location. reload(true);

},complete: function(){
                        
                        $("button[type='submit']").attr('disabled',false);
                    }
			});
			});

				/** ajax code for send to mra**/
			$(document).on('submit','#sendtomra',function(event){
                  
				event.preventDefault();
 

					$.ajax({
url: "<?php echo base_url();?>/Vehicles/sendvehicletomra", // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,
        // To send DOMDocument or non processed data file it is set to false
 beforeSend: function() {

        // setting a timeouts
      Command: toastr["info"]('Sending  Please Wait')

toastr.options = {  
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-top-center",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}

 $("button[type='submit']").attr('disabled',true);
 
    },
success: function()   // A function to be called if request succeeds
{


	     Command: toastr["success"]('Successfully sent To Mra')

toastr.options = {
 "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-bottom-center",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}



        $("#defaultModal").modal("hide");
location. reload(true);

},complete: function(){
                        
                        $("button[type='submit']").attr('disabled',false);
                    }


			});

			});


	$("#sendtomra").validate({
        ignore: [],
        rules: {
            userfile: {
                required: true,
                extension: 'docx|doc|jpg|jpeg|png'
            }
        }
    });
		$(document).on('submit','#release_vehicle',function(event){
				event.preventDefault();

					$.ajax({
url: "<?php echo base_url();?>/Vehicles/Release_vehicle_direct", // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,
 beforeSend: function() {

        // setting a timeouts
      Command: toastr["info"]('Sending  Please Wait')

toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-top-center",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
 $("button[type='submit']").attr('disabled',true);
 },
success: function() {


	     Command: toastr["success"]('Successfully Released Vehicle')

toastr.options = {
 "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-bottom-center",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
  $("#defaultModal").modal("hide");
   $("button[type='submit']").attr('disabled',fasle);
location. reload(true);
},complete: function(){
                        
                        $("button[type='submit']").attr('disabled',false);
                    }
 });
	  });
			$("#release_vehicle").validate({
        ignore: [],
        rules: {
            userfile: {
                required: true,
                extension: 'docx|doc|jpg|jpeg|png'
            }
        }
    });

			$(document).on('submit','#Release_vehicle_waiting_handover',function(event){
				event.preventDefault();

					$.ajax({
url: "<?php echo base_url();?>/Vehicles/Release_vehicle_waiting_handover", // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,
 beforeSend: function() {

        // setting a timeouts
      Command: toastr["info"]('Sending  Please Wait')

toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-top-center",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
 $("button[type='submit']").attr('disabled',true);
 },
success: function()   // A function to be called if request succeeds
{


	     Command: toastr["success"]('Successfully Released Waiting Handover')

toastr.options = {
 "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-bottom-center",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
        $("#defaultModal").modal("hide");
		 $("button[type='submit']").attr('disabled',false);
 location. reload(true);
},complete: function(){
                        
                        $("button[type='submit']").attr('disabled',false);
                    }
			});
			});

		$("#Release_vehicle_waiting_handover").validate({
        ignore: [],
        rules: {
            userfile: {
                required: true,
                extension: 'docx|doc|jpg|jpeg|png'
            }
        }
    });


			/** ajax code for receive from mra**/
			$(document).on('submit','#mrareceive',function(event){
				event.preventDefault();

					$.ajax({
url: "<?php echo base_url();?>/Vehicles/mra_doc_receive", // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,
 beforeSend: function() {

        // setting a timeouts
      Command: toastr["info"]('Sending  Please Wait')

toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-top-center",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
$("button[type='submit']").attr('disabled',true);
 },
success: function()   // A function to be called if request succeeds
{


	     Command: toastr["success"]('Successfully Received From Mra')

toastr.options = {
 "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-bottom-center",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
        $("#defaultModal").modal("hide");
 location. reload(true);
},complete: function(){
                        
                        $("button[type='submit']").attr('disabled',false);
                    }
			});
			});
				$("#mrareceive").validate({
        ignore: [],
        rules: {
            userfile: {
                required: true,
                extension: 'docx|doc|jpg|jpeg|png'
            }
        }
    });

	$(document).on('submit','#confiscate',function(event){
				event.preventDefault();

					$.ajax({
url: "<?php echo base_url();?>/Vehicles/Eto_confiscate", // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,        // To send DOMDocument or non processed data file it is set to false
beforeSend: function() {

        // setting a timeouts
      Command: toastr["info"]('Sending  Please Wait')

toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-top-center",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
$("button[type='submit']").attr('disabled',true);
 },
success: function()   // A function to be called if request succeeds
{


	     Command: toastr["success"]('Successfully Vehicle Confiscated')

toastr.options = {
 "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-bottom-center",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
        $("#largeModal").modal("hide");
location. reload(true);
},complete: function(){
                        
                        $("button[type='submit']").attr('disabled',false);
                    }
			});
			});
					$("#confiscate").validate({
        ignore: [],
        rules: {
            userfile: {
                required: true,
                extension: 'docx|doc|jpg|jpeg|png'
            }
        }
    });



	var dataTable = $('#vehicle_sent_to_warehouse_eto').DataTable({
           "processing":true,
           "serverSide":true,
           "order":[],
           "ajax":{
                url:"<?php echo base_url().'Vehicles/vehicle_sent_to_wh_list'; ?>",
                type:"POST"
           },
           "columnDefs":[
                {
                     "targets":[0, 3, 4],
                     "orderable":false,
                },
           ],
		    dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
      });
	  var dataTable = $('#vehicle_confiscated_eto').DataTable({
           "processing":true,
           "serverSide":true,
           "order":[],
           "ajax":{
                url:"<?php echo base_url().'Vehicles/confiscated_history_list'; ?>",
                type:"POST"
           },
           "columnDefs":[
                {
                     "targets":[0, 3, 4],
                     "orderable":false,
                },
           ],
 dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
      });
	  var dataTable = $('#vehicle_sent_mra').DataTable({
           "processing":true,
           "serverSide":true,
           "order":[],
           "ajax":{
                url:"<?php echo base_url().'Vehicles/sent_to_mra_history_list'; ?>",
                type:"POST"
           },
           "columnDefs":[
                {
                     "targets":[0, 3, 4],
                     "orderable":false,
                },
           ],
		    dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
      });
	  var dataTable = $('#vehicle_eto_send_both').DataTable({
           "processing":true,
           "serverSide":true,
           "order":[],
           "ajax":{
                url:"<?php echo base_url().'Vehicles/sent_to_both_history_list'; ?>",
                type:"POST"
           },
           "columnDefs":[
                {
                     "targets":[0, 3, 4],
                     "orderable":false,
                },
           ],
		    dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
      });
	  var dataTable = $('#vehicle_release_eto').DataTable({
           "processing":true,
           "serverSide":true,
           "order":[],
           "ajax":{
                url:"<?php echo base_url().'Vehicles/released_vehicles_history_list'; ?>",
                type:"POST"
           },
           "columnDefs":[
                {
                     "targets":[0, 3, 4],
                     "orderable":false,
                },
           ],
		    dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
      });
/*
|--------------------------------------------------------------------------
|ETO Ajax Calls Ends
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
|Warehouse Ajax Calls Starts
|--------------------------------------------------------------------------
*/

$(document).on('submit','#fslreportdispatched',function(event){
				event.preventDefault();

					$.ajax({
url: "<?php echo base_url();?>/Vehicles/vehicle_sent_to_fsl", // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,        // To send DOMDocument or non processed data file it is set to false
beforeSend: function() {

        // setting a timeouts
      Command: toastr["info"]('Sending  Please Wait')

toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-top-center",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
  
}
 $("button[type='submit']").attr('disabled',true);
 },
success: function()   // A function to be called if request succeeds
{


	     Command: toastr["success"]('Successfully Vehicle Sent To Fsl')

toastr.options = {
 "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-bottom-center",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
        $("#largeModal").modal("hide");
		 $("button[type='submit']").attr('disabled',false);
location. reload(true);
},complete: function(){
                        
                        $("button[type='submit']").attr('disabled',false);
                    }
			});
			});
					$("#fslreportdispatched").validate({
        ignore: [],
        rules: {
            userfile: {
                required: true,
                extension: 'docx|doc|jpg|jpeg|png'
            }
        }
    });
	$(document).on('submit','#fslreportreceive',function(event){
				event.preventDefault();

					$.ajax({
url: "<?php echo base_url();?>/Vehicles/vehicle_received_from_fsl", // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,        // To send DOMDocument or non processed data file it is set to false
beforeSend: function() {

        // setting a timeouts
      Command: toastr["info"]('Sending  Please Wait')

toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-top-center",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}

                        
                        $("button[type='submit']").attr('disabled',true);
                    
 },
success: function()   // A function to be called if request succeeds
{


	     Command: toastr["success"]('Successfully Vehicle Received From Fsl')

toastr.options = {
 "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-bottom-center",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
        $("#largeModal").modal("hide");
location. reload(true);
},complete: function(){
                        
                        $("button[type='submit']").attr('disabled',false);
                    }
			});
			});
					$("#fslreportreceive").validate({
        ignore: [],
        rules: {
            userfile: {
                required: true,
                extension: 'docx|doc|jpg|jpeg|png'
            }
        }
    });
	$(document).on('submit','#sendtoetoforconfiscation',function(event){
				event.preventDefault();
				

					$.ajax({
url: "<?php echo base_url();?>/Vehicles/send_to_eto_for_confiscation", // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,        // To send DOMDocument or non processed data file it is set to false
beforeSend: function() {

        // setting a timeouts
      Command: toastr["info"]('Sending  Please Wait')

toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-top-center",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"

  
}

                        
                        $("button[type='submit']").attr('disabled',true);
                    
 
 },
success: function()   // A function to be called if request succeeds
{


	     Command: toastr["success"]('Successfully Sent To ETO For Confiscation')

toastr.options = {
 "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-bottom-center",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}

location. reload(true);
},complete: function(){
                        
                        $("button[type='submit']").attr('disabled',false);
                    }
			});
			});




			 var dataTable = $('#warehouse_parked').DataTable({
           "processing":true,
           "serverSide":true,
           "order":[],
           "ajax":{
                url:"<?php echo base_url() . 'Vehicles/warehouse_available_list'; ?>",
                type:"POST"
           },
           "columnDefs":[
                {
                     "targets":[0, 3, 4],
                     "orderable":false,
                },
           ],
 dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
      });
	  	 var dataTable = $('#readyforrelease').DataTable({
           "processing":true,
           "serverSide":true,
           "order":[],
           "ajax":{
                url:"<?php echo base_url() . 'Vehicles/release_vehicle_handover_list'; ?>",
                type:"POST"
           },
           "columnDefs":[
                {
                     "targets":[0, 3, 4],
                     "orderable":false,
                },
           ],
 dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
      });

	  var dataTable = $('#warehousehandover').DataTable({
           "processing":false,
           "serverSide":true,
           "order":[],
           "ajax":{
                url:"<?php echo base_url() . 'Vehicles/warehouse_handover_list'; ?>",
                type:"POST"
           },
           "columnDefs":[
                {
                     "targets":[0, 3, 4],
                     "orderable":false,
                },
           ],
		    dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
      });

	   var dataTable = $('#receivehandoverd').DataTable({
           "processing":false,
           "serverSide":true,
           "order":[],
           "ajax":{
                url:"<?php echo base_url() . 'Vehicles/warehouse_receive_vehicle_list'; ?>",
                type:"POST"
           },
           "columnDefs":[
                {
                     "targets":[0, 3, 4],
                     "orderable":false,
                },
           ],
      });

	  $(document).on('submit','#handover_form',function(event){
				event.preventDefault();

					$.ajax({
url: "<?php echo base_url();?>/Vehicles/vehicle_handover_form", // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,        // To send DOMDocument or non processed data file it is set to false
beforeSend: function() {

        // setting a timeouts
      Command: toastr["info"]('Processing  Please Wait')

toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-top-center",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}

                        
                        $("button[type='submit']").attr('disabled',true);
                    
 },
success: function()   // A function to be called if request succeeds
{


	     Command: toastr["success"]('Successfully Handoverd')

toastr.options = {
 "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-bottom-center",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}

location. reload(true);
},complete: function(){
                        
                        $("button[type='submit']").attr('disabled',false);
                    }
			});
			});
					$("#handover_form").validate({
        ignore: [],
        rules: {
            userfile: {
                required: true,
                extension: 'docx|doc|jpg|jpeg|png'
            }
        }
    });


	  $(document).on('submit','#warehousehandover_form',function(event){
				event.preventDefault();

					$.ajax({
url: "<?php echo base_url();?>/Vehicles/warehouse_receive_form", // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,        // To send DOMDocument or non processed data file it is set to false
beforeSend: function() {

        // setting a timeouts
      Command: toastr["info"]('Processing  Please Wait')

toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-top-center",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}

                        
                        $("button[type='submit']").attr('disabled',true);
                    
 },
success: function()   // A function to be called if request succeeds
{


	     Command: toastr["success"]('Successfully Received')

toastr.options = {
 "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-bottom-center",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}

location. reload(true);
},complete: function(){
                        
                        $("button[type='submit']").attr('disabled',false);
                    }
			});
			});
					$("#warehousehandover_form").validate({
        ignore: [],
        rules: {
            userfile: {
                required: true,
                extension: 'docx|doc|jpg|jpeg|png'
            }
        }
    });

	  $(document).on('submit','#release_vehicle_warehouse1',function(event){
				event.preventDefault();

					$.ajax({
url: "<?php echo base_url();?>/Vehicles/release_form", // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,        // To send DOMDocument or non processed data file it is set to false
beforeSend: function() {

        // setting a timeouts
      Command: toastr["info"]('Processing  Please Wait')

toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-top-center",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}

                        
                        $("button[type='submit']").attr('disabled',true);
                    
 },
success: function()   // A function to be called if request succeeds
{


	     Command: toastr["success"]('Successfully Released And Handoverd')

toastr.options = {
 "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-bottom-center",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}

location. reload(true);
},complete: function(){
                        
                        $("button[type='submit']").attr('disabled',false);
                    }
			});
			});
					$("#release_vehicle_warehouse1").validate({
        ignore: [],
        rules: {
            userfile: {
                required: true,
                extension: 'docx|doc|jpg|jpeg|png'
            }
        }
    });

	var dataTable = $('#fsl_reports_history').DataTable({
           "processing":false,
           "serverSide":true,
           "order":[],
           "ajax":{
               url:"<?php echo base_url().'Vehicles/fsl_vehicles_histroy_list';?>",
                type:"POST"
           },
           "columnDefs":[
                {
                     "targets":[0, 3, 4],
                     "orderable":false,
                },
           ],
 dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
      });
	  var dataTable = $('#checkin_history').DataTable({
           "processing":false,
           "serverSide":true,
           "order":[],
           "ajax":{
               url:"<?php echo base_url().'Vehicles/warehouse_checkedin_vehicles_history_list';?>",
                type:"POST"
           },
           "columnDefs":[
                {
                     "targets":[0, 3, 4],
                     "orderable":false,
                },
           ],
 dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
      });
	  var dataTable = $('#handover_history').DataTable({
           "processing":false,
           "serverSide":true,
           "order":[],
           "ajax":{
               url:"<?php echo base_url().'Vehicles/handover_vehicles_history_list';?>",
                type:"POST"
           },
           "columnDefs":[
                {
                     "targets":[0, 3, 4],
                     "orderable":false,
                },
           ],
 dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
      });
/*
|--------------------------------------------------------------------------
|Warehouse Ajax Calls Ends
|--------------------------------------------------------------------------
*//*

|--------------------------------------------------------------------------
|DG Ajax Calls STARTS
|--------------------------------------------------------------------------
*/

 var dataTable = $('#receivedatatable').DataTable({
           "processing":false,
           "serverSide":true,
           "order":[],
           "ajax":{
                url:"<?php echo base_url() . 'Vehicles/Dg_alloted_list'; ?>",
                type:"POST"
           },
           "columnDefs":[
                {
                     "targets":[0, 3, 4],
                     "orderable":false,
                },
           ],
		    dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
      });

	  var dataTable = $('#allotmentdatatable').DataTable({
           "processing":false,
           "serverSide":true,
           "order":[],
           "ajax":{
                url:"<?php echo base_url() . 'Vehicles/Dg_allotment_list'; ?>",
                type:"POST"
           },
           "columnDefs":[
                {
                     "targets":[0, 3, 4],
                     "orderable":false,
                },
           ],
		   dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
      });
	  var dataTable = $('#peding_handover').DataTable({
           "processing":false,
           "serverSide":true,
           "order":[],
           "ajax":{
                url:"<?php echo base_url() . 'Vehicles/dg_pending_handover_list'; ?>",
                type:"POST"
           },
           "columnDefs":[
                {
                     "targets":[0, 3, 4],
                     "orderable":false,
                },
           ],
		   dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
      });


	  $(document).on('submit','#allotvechicle',function(event){
				event.preventDefault();

					$.ajax({
url: "<?php echo base_url();?>/Vehicles/Dg_allotment_vehicle", // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,
beforeSend: function() {

        // setting a timeouts
      Command: toastr["info"]('Sending  Please Wait')

toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-top-center",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}

                        
                        $("button[type='submit']").attr('disabled',true);
                 
 },
success: function()   // A function to be called if request succeeds
{


	     Command: toastr["success"]('Successfully Alloted ')

toastr.options = {
 "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-bottom-center",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
location. reload(true);
        $("#largeModal").modal("hide");
},complete: function(){
                        
                        $("button[type='submit']").attr('disabled',false);
                    }
			});
			});
			$("#allotvechicle").validate({
        ignore: [],
        rules: {
            userfile: {
                required: true,
                extension: 'docx|doc|jpg|jpeg|png'
            }
        }

    });



	$(document).on('submit','#individualallotvechicle',function(event){
				event.preventDefault();

					$.ajax({
url: "<?php echo base_url();?>/Vehicles/individualallotment", // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,
beforeSend: function() {

        // setting a timeouts
      Command: toastr["info"]('Sending  Please Wait')

toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-top-center",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}

                        
                        $("button[type='submit']").attr('disabled',true);
                    
 },
success: function()   // A function to be called if request succeeds
{


	     Command: toastr["success"]('Successfully Alloted ')

toastr.options = {
 "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-bottom-center",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
location. reload(true);
        $("#largeModal").modal("hide");
},complete: function(){
                        
                        $("button[type='submit']").attr('disabled',false);
                    }
			});
			});
			$("#individualallotvechicle").validate({
        ignore: [],
        rules: {
            userfile: {
                required: true,
                extension: 'docx|doc|jpg|jpeg|png'
            }
        }
    });



	 $(document).on('submit','#receive_form',function(event){
				event.preventDefault();

					$.ajax({
url: "<?php echo base_url();?>/Vehicles/receive_form", // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,
beforeSend: function() {

        // setting a timeouts
      Command: toastr["info"]('Sending  Please Wait')

toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-top-center",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}

                        
                        $("button[type='submit']").attr('disabled',true);
                    
 },
success: function()   // A function to be called if request succeeds
{


	     Command: toastr["success"]('Successfully Sent TO Warehouse For Handover ')

toastr.options = {
 "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-bottom-center",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
location. reload(true);
        $("#largeModal").modal("hide");
},complete: function(){
                        
                        $("button[type='submit']").attr('disabled',false);
                    }
			});
			});
			$("#receive_form").validate({
        ignore: [],
        rules: {
            userfile: {
                required: true,
                extension: 'docx|doc|jpg|jpeg|png'
            }
        }
    });


	$(document).on('submit','#auction',function(event){
				event.preventDefault();

					$.ajax({
url: "<?php echo base_url();?>/Vehicles/Allot_for_auction", // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,
beforeSend: function() {

        // setting a timeouts
      Command: toastr["info"]('Sending  Please Wait')

toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-top-center",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}

                        
                        $("button[type='submit']").attr('disabled',true);
                    
 },
success: function()   // A function to be called if request succeeds
{


	     Command: toastr["success"]('Successfully Sent TO Warehouse For Handover ')

toastr.options = {
 "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-bottom-center",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
location. reload(true);
        $("#largeModal").modal("hide");
},complete: function(){
                        
                        $("button[type='submit']").attr('disabled',false);
                    }
			});
			});
			$("#receive_form").validate({
        ignore: [],
        rules: {
            userfile: {
                required: true,
                extension: 'docx|doc|jpg|jpeg|png'
            }
        }
    });
/*
|--------------------------------------------------------------------------
|DG Ajax Calls Ends
|--------------------------------------------------------------------------
*/
/*
|--------------------------------------------------------------------------
|Reports Datatable
|--------------------------------------------------------------------------
*/

	 function fetch_data( start_date='', end_date='',cat_val='')
 {
  var dataTable = $('#report_data').DataTable({
   "processing" : true,
   "serverSide" : true,
   "order" : [],
   "ajax" : {
    url:"<?php echo base_url();?>/Vehicles/Report_list",
    type:"POST",
    data:{
      start_date:start_date, end_date:end_date,
	 cat_val:cat_val
    }
   },
           "columnDefs":[
                {
                     "targets":[0, 3, 4],
                     "orderable":false,
                },
           ],
 dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]

  });
 }
  fetch_data();

$('#search').click(function(){
  var start_date = $('#datef').val();
  var end_date = $('#datet').val();
  var cat_val= $("#search_cat option:selected").val();


   $('#report_data').DataTable().destroy();
   fetch_data( start_date, end_date,cat_val);

 });



 function fetch_data_eto( start_date='', end_date='',cat_val='')
{
var dataTable = $('#Eto_report_data').DataTable({
 "processing" : true,
 "serverSide" : true,
 "order" : [],
 "ajax" : {
	url:"<?php echo base_url();?>/Vehicles/Eto_create_report_list",
	type:"POST",
	data:{
		start_date:start_date, end_date:end_date,
 cat_val:cat_val
	}
 },
				 "columnDefs":[
							{
									 "targets":[0, 3, 4],
									 "orderable":false,
							},
				 ],
dom: 'Bfrtip',
			buttons: [
					'copy', 'csv', 'excel', 'pdf', 'print'
			]

});
}
fetch_data_eto();

$('#search').click(function(){
var start_date = $('#datef').val();
var end_date = $('#datet').val();
var cat_val= $("#search_cat option:selected").val();


 $('#Eto_report_data').DataTable().destroy();
 fetch_data_eto( start_date, end_date,cat_val);

});


function fetch_data_eto_dg( start_date='', end_date='',cat_val='')
{
var dataTable = $('#dg_Eto_report_data').DataTable({
"processing" : true,
"serverSide" : true,
"order" : [],
"ajax" : {
 url:"<?php echo base_url();?>/Vehicles/dg_eto_report_list",
 type:"POST",
 data:{
	 start_date:start_date, end_date:end_date,
cat_val:cat_val
 }
},
				"columnDefs":[
						 {
									"targets":[0, 3, 4],
									"orderable":false,
						 },
				],
dom: 'Bfrtip',
		 buttons: [
				 'copy', 'csv', 'excel', 'pdf', 'print'
		 ]

});  
}
fetch_data_eto_dg();

$('#search').click(function(){
var start_date = $('#datef').val();
var end_date = $('#datet').val();
var cat_val= $("#search_cat option:selected").val();


$('#dg_Eto_report_data').DataTable().destroy();
fetch_data_eto_dg( start_date, end_date,cat_val);

});  



		  </script>
