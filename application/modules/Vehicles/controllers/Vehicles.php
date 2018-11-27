    <?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Spipu\Html2Pdf\Exception\ExceptionFormatter;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Html2Pdf;

class Vehicles extends MX_Controller {
	//var $query1,$query2,$query3,$user_id;
	var $user_id, $query1, $query2, $query3, $sel_col, $query4, $query5, $query6, $intype, $query7, $query8, $query9;
	function index() {
		parent::__construct();
		date_default_timezone_set("Asia/Karachi");
		if (time() - $this->session->userdata('timestamp') > 10) {
			//subtract new timestamp from the old one
			$this->session->sess_destroy();

			redirect(Modules::run("Auth/index"));
			exit;
		} else {
			//set new timestamp

		}
	}

	/*
		    |--------------------------------------------------------------------------
		    |ETO FUNTIONALITIES STARTS
		    |--------------------------------------------------------------------------
	*/
	function general_query_function($status1 = '', $status2 = '', $status3 = '', $status4 = '', $status5 = '', $status6 = '', $status7 = '', $equalnotequal = "", $intype = '') {
		$this->user_id = $this->session->userdata("user_id");
		$this->query1 = "select district_id from tbl_user_district where user_id={$this->user_id} order by udid DESC limit 0,1";
		$this->query2 = "select DISTINCT vehicle_id from tbl_vehicle_status where status_id =$status1
        OR status_id =$status2  OR status_id =$status3  OR status_id= $status4
        OR status_id =$status5  OR status_id =$status6  OR status_id = $status7";
		$this->query6 = "SELECT A.`vehicle_id`
                                FROM (SELECT `vehicle_id` FROM tbl_vehicle_status WHERE status_id =$status1  )A,
                                (SELECT `vehicle_id` FROM tbl_vehicle_status WHERE status_id = $status2 )B
                                WHERE A.vehicle_id $equalnotequal B.vehicle_id";
		$this->select_col = "SELECT `mobilesquadno`, `username`, `districtname`, `siezeddate`,clearnotclearstatus,
                                `siezedtime`, `formserialno`,`seizedlocationlat`, `drivername`, `seizedlocationlong`, `chasisno`, `engineno`,
                                `vechileregistrationno`, `makename`, `submakename`, `modelyear`, `vehicletype`, `drivercnicno`, `drivermobileno`,
                                `driveraddress`, `vechileid`, `vehicleseize_category`, `vechileownername`, `vechileownercnic`, `vechileownermobileno`,
                                `bodybuildname`, `colorname`, `transmission`, `assembely`, `wheelnumber`, `enginetype`, `vehicleengine_capcaity`,
                                `mileage`,`vechicledescription`,parking,fslparking";
		$this->query3 = " FROM `tbl_vehicle`
                                            JOIN `tbl_district` ON `tbl_district`.`districtid` = `tbl_vehicle`.`district_id` JOIN `tbl_vehicle_model`
                                ON `tbl_vehicle_model`.`makeid`=`tbl_vehicle`.`vehicle_make` JOIN `tbl_vehicle_model_sub` ON
                                `tbl_vehicle_model_sub`.`submakeid`=`tbl_vehicle`.`vehicle_model` JOIN `tbl_vehicle_modelyear`
                                ON `tbl_vehicle_modelyear`.`modelid`=`tbl_vehicle`.`vechiclemodelyear` JOIN `tbl_bodybuild`
                                ON `tbl_bodybuild`.`bodybuild`=`tbl_vehicle`.`build_id`  JOIN `tbl_wheels`
                                ON `tbl_wheels`.`wheelid`=`tbl_vehicle`.`vechilewheels`
                                JOIN `tbl_color` ON `tbl_color`.`colorid`=`tbl_vehicle`.`color_id` JOIN `tbl_user`
                                ON `tbl_user`.`userid`=`tbl_vehicle`.`user_id` ";

		$this->query7 = "WHERE (`vechileid` {$intype} IN(";
		$this->query4 = "))";
		$this->query8 = " AND `district_id` = ";
		$this->query9 = " AND (`district_id` = ";
		$this->query5 = " ORDER BY `vechileid` DESC";

	}
	function seized_vehicles() {
		echo Modules::run("Auth/check_login", "seized_vehicles");
		$data['module'] = "Vehicles";
		$data['file'] = "Etoviews/seized_vehicles";
		$data['name'] = "";
		$this->general_query_function(3, 4, 5, 6, 7, 0, 0, "", "NOT");
		$returneddistrict = custom_query($this->query1, "row");
		$status_3 = custom_query($this->query2, "array");
		$ary = array_column($status_3, "vehicle_id");
		$comma = implode(",", $ary);
		if (empty($comma)) {
			$comma = 0;
		}
		$userdistrict = $returneddistrict->district_id;
		$data['seized_vechicles'] = custom_query($this->select_col . $this->query3 . $this->query7 .
			$comma . $this->query4 . $this->query8 . $userdistrict . $this->query5, "result");

		echo Modules::run("Template/main", $data);
		if ($this->session->flashdata("msg")) {unset($_SESSION["msg"]);}
	}

	/**
	|-----
	| function to received the vehicle from inspector it call ajax funciton here on form submit
	|--
	 */
	function Receive_vehicle_from_inspector() {
		$data = array(
			"vehicle_id" => $this->input->post("vehicleid"),
			"status_id" => 2,
			"user_id" => $this->session->userdata("user_id"),
			"district_id" => $this->session->userdata("user_district"),
		);
		insert_data("tbl_vehicle_status", $data);

	}

	/**
	| function to send vehicle for fsl to warehouse from Eto Dashboard call a ajax funciton in myjs.php
	 */
	function sendtowh_fsl() {
		$data = array(
			"vehicle_id" => $this->input->post("vehicleid"),
			"status_id" => 3,
			"user_id" => $this->session->userdata("user_id"),
			"district_id" => $this->session->userdata("user_district"),
		);
		insert_data("tbl_vehicle_status", $data);
		$update_data = array("sendtowhforfsl" => 1);
		$where = array("vechileid" => $this->input->post("vehicleid"));
		update_where("tbl_vehicle", $update_data, $where);

	}

	function sendvehicletomra() {
		if (isset($_FILES['userfile'])) {
			$document = explode('.', $_FILES['userfile']['name']);
			$new_name = rand() . '.' . $document[1];
			// $destination = 'vendor_images'.$new_name;
			move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/' . $new_name);
		}
		$data = array(
			"letterno" => $this->input->post("letterno"),
			"vehicle_id" => $this->input->post("vechicle_id"),
			"mratime" => $this->input->post("time"),
			"Description" => $this->input->post("description"),

			"mradate" => $this->input->post("mradate"),
			"mracheckin" => 1,
			" upload" => $new_name,
		);
		if ($this->input->post("sendtoboth") == 1) {
			$status_data1 = array(
				"vehicle_id" => $this->input->post("vechicle_id"),
				"status_id" => 4,
				"user_id" => $this->session->userdata("user_id"),
				"district_id" => $this->session->userdata("user_district"),
			);
			$status_data2 = array(
				"vehicle_id" => $this->input->post("vechicle_id"),
				"status_id" => 3,
				"user_id" => $this->session->userdata("user_id"),
			);
			$status_data3 = array(
				"vehicle_id" => $this->input->post("vechicle_id"),
				"status_id" => 5,
				"user_id" => $this->session->userdata("user_id"),
				"district_id" => $this->session->userdata("user_district"),
			);

			insert_data("tbl_vehicle_status", $status_data1);
			insert_data("tbl_vehicle_status", $status_data2);
			insert_data("tbl_vehicle_status", $status_data3);

			insert_data("tbl_mra_report", $data);
			$where = array("vechileid" => $this->input->post("vechicle_id"));
			$update_data = array("sendtowhforfsl" => 1, "sendtoboth" => 1);
			update_where("tbl_vehicle", $update_data, $where);

		} else {
			$status_data = array(
				"vehicle_id" => $this->input->post("vechicle_id"),
				"status_id" => 4,
				"user_id" => $this->session->userdata("user_id"),
				"district_id" => $this->session->userdata("user_district"),
			);
			insert_data("tbl_vehicle_status", $status_data);
			insert_data("tbl_mra_report", $data);
			$where = array("vechileid" => $this->input->post("vechicle_id"));
			$update_data = array("parking" => 1);
			update_where("tbl_vehicle", $update_data, $where);
		}

	}

	function Release_vehicle_direct() {
		$status_data = array(
			"vehicle_id" => $this->input->post("vechicle_id1"),
			"status_id" => 6,
			"user_id" => $this->session->userdata("user_id"),
			"district_id" => $this->session->userdata("user_district"),
		);
		if (isset($_FILES['userfile'])) {
			$document = explode('.', $_FILES['userfile']['name']);
			$new_name = rand() . '.' . $document[1];
			// $destination = 'vendor_images'.$new_name;
			move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/' . $new_name);
		}
		$data = array(
			"letterno" => $this->input->post("letterno"),
			"vehicle_id" => $this->input->post("vechicle_id1"),
			"releasedate" => $this->input->post("time"),
			"receivername" => $this->input->post("receivername"),
			"receivercnic" => $this->input->post("receivercnic"),
			"receivermobileno" => $this->input->post("receivermobileno"),
			"description" => $this->input->post("description"),
			"releasetime" => $this->input->post("date"),
			" upload" => $new_name,
		);
		insert_data("tbl_released_vehicle", $data);
		insert_data("tbl_vehicle_status", $status_data);

	}
	function Release_vehicle_waiting_handover() {
		$status_data = array(
			"vehicle_id" => $this->input->post("vechicle_id1"),
			"status_id" => 10,
			"user_id" => $this->session->userdata("user_id"),
		);
		if (isset($_FILES['userfile'])) {
			$document = explode('.', $_FILES['userfile']['name']);
			$new_name = rand() . '.' . $document[1];
			// $destination = 'vendor_images'.$new_name;
			move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/' . $new_name);
		}
		$data = array(
			"letterno" => $this->input->post("letterno"),
			"vehicle_id" => $this->input->post("vechicle_id1"),
			"releasedate" => $this->input->post("time"),
			"receivername" => $this->input->post("receivername"),
			"receivercnic" => $this->input->post("receivercnic"),
			"receivermobileno" => $this->input->post("receivermobileno"),
			"description" => $this->input->post("description"),
			"releasetime" => $this->input->post("date"),
			" upload" => $new_name,
		);
		insert_data("tbl_released_vehicle", $data);
		insert_data("tbl_vehicle_status", $status_data);

	}
	function vehicle_single_detail($id) {
		$data['module'] = "Vehicles";
		$data['file'] = "Etoviews/show_specific_vehicle";
		$data['name'] = " ";
		$data['all_vechicle_specific'] = custom_query("SELECT mobilesquadno,username,districtname,seizedtype
             ,siezeddate,siezedtime,formserialno,seizedlocationlat,drivername
    ,seizedlocationlong,chasisno,engineno,vechileregistrationno,makename
     ,submakename,modelyear,vehicletype,drivercnicno,registrationdistrictname
    ,drivermobileno,driveraddress,
    vechileownername,vechileownercnic,vechileownermobileno,
    bodybuildname,colorname,transmission,assembely,wheelnumber,enginetype,vehicleengine_capcaity,mileage,vechicledescription
     FROM `tbl_vehicle`
             LEFT JOIN tbl_district on tbl_district.districtid = tbl_vehicle.district_id
            LEFT JOIN tbl_vehicle_model on tbl_vehicle_model.makeid=tbl_vehicle.vehicle_make
             LEFT JOIN tbl_vehicle_model_sub on tbl_vehicle_model_sub.submakeid=tbl_vehicle.vehicle_model
             LEFT JOIN tbl_vehicle_modelyear on tbl_vehicle_modelyear.modelid = tbl_vehicle.vechiclemodelyear
             LEFT JOIN tbl_bodybuild on tbl_bodybuild.bodybuild = tbl_vehicle.build_id
             LEFT JOIN tbl_wheels on tbl_wheels.wheelid = tbl_vehicle.vechilewheels
             LEFT JOIN tbl_color on tbl_color.colorid = tbl_vehicle.color_id
       LEFT JOIN tbl_district_registration on tbl_district_registration.registrationdistrictid = tbl_vehicle.registration_id
             LEFT JOIN tbl_vehicle_seized_categories on tbl_vehicle_seized_categories.siezedid = tbl_vehicle.vehicleseize_category
             LEFT JOIN tbl_user on tbl_user.userid=tbl_vehicle.user_id where vechileid ={$id}", "result");
		$data['all_vechicle_images'] = custom_query("SELECT * FROM `tbl_vehicle_images`
              where vechile_id ={$id}", "result");
		$data['all_vechicle_accesories'] = custom_query("SELECT * FROM `tbl_accesories` join tbl_vehicle_accessories on
                tbl_vehicle_accessories.accessories_id=tbl_accesories.accessoryid
                where tbl_vehicle_accessories.vehicle_id ={$id}", "result");
		echo Modules::run("Template/main", $data);
	}
	function mra_doc_dispatched() {
		echo Modules::run("Auth/check_login", "mra_doc_dispatched");
		$data['module'] = "Vehicles";
		$data['file'] = "Etoviews/mra_dispatched";
		$data['name'] = "";
		// $this->general_query_function (7,0,0,0,0,0,0,"Not");
		$this->general_query_function(4, 7, 0, 0, 0, 0, 0, "=", "NOT");

		$returneddistrict = custom_query($this->query1, "row");
		$status_3 = custom_query($this->query6, "array");
		$status_vehicle = array_column($status_3, "vehicle_id");
		$comma_separated1 = implode(",", $status_vehicle);
		if (empty($comma_separated1)) {
			$comma_separated1 = 0;
		}
		$status_4 = custom_query("select vehicle_id from tbl_vehicle_status where
                vehicle_id not in($comma_separated1) and status_id=4", "array");
		$status_vehicle1 = array_column($status_4, "vehicle_id");
		$comma_separated2 = implode(",", $status_vehicle1);
		$this->general_query_function(0, 0, 0, 0, 0, 0, 0, "", "");
		if (empty($comma_separated2)) {
			$comma_separated2 = 0;
		}
		$userdistrict = $returneddistrict->district_id;
		$data['seize_category'] = custom_query("SELECT * FROM tbl_vehicle_seized_categories", "result");
		$data['seized_vechicles'] = custom_query($this->select_col .
			$this->query3 . $this->query7 . $comma_separated2 . $this->query4 . $this->query8 . $userdistrict .
			$this->query5, "result");
		echo Modules::run("Template/main", $data);

	}
	function mra_doc_dispatched_details($id) {
		$data['module'] = "Vehicles";
		$data['file'] = "Etoviews/mra_dispatched_details";
		$data['name'] = "";
		$data['all_vechicle_specific'] = custom_query("SELECT mobilesquadno,username,districtname,seizedtype
             ,siezeddate,siezedtime,formserialno,seizedlocationlat,drivername
    ,seizedlocationlong,chasisno,engineno,vechileregistrationno,makename
     ,submakename,modelyear,vehicletype,drivercnicno
    ,drivermobileno,driveraddress,
    vechileownername,vechileownercnic,vechileownermobileno
    bodybuildname,colorname,transmission,assembely,wheelnumber,enginetype,vehicleengine_capcaity,mileage,vechicledescription,mratime,letterno,mradate,upload,Description
     FROM `tbl_vehicle`
             LEFT JOIN tbl_district on tbl_district.districtid = tbl_vehicle.district_id
            LEFT JOIN tbl_vehicle_model on tbl_vehicle_model.makeid=tbl_vehicle.vehicle_make
             LEFT JOIN tbl_vehicle_model_sub on tbl_vehicle_model_sub.submakeid=tbl_vehicle.vehicle_model
             LEFT JOIN tbl_vehicle_modelyear on tbl_vehicle_modelyear.modelid = tbl_vehicle.vechiclemodelyear
             LEFT JOIN tbl_bodybuild on tbl_bodybuild.bodybuild = tbl_vehicle.build_id
             LEFT JOIN tbl_wheels on tbl_wheels.wheelid = tbl_vehicle.vechilewheels
             LEFT JOIN tbl_mra_report on tbl_mra_report.vehicle_id = tbl_vehicle.vechileid
             LEFT JOIN tbl_color on tbl_color.colorid = tbl_vehicle.color_id
             LEFT JOIN tbl_vehicle_seized_categories on tbl_vehicle_seized_categories.siezedid = tbl_vehicle.vehicleseize_category
             LEFT JOIN tbl_user on tbl_user.userid=tbl_vehicle.user_id where vechileid ={$id} and mracheckin=1", "result");
		$data['all_vechicle_images'] = custom_query("SELECT * FROM `tbl_vehicle_images`
              where vechile_id ={$id}", "result");

		$data['all_vechicle_accesories'] = custom_query("SELECT * FROM `tbl_accesories` join tbl_vehicle_accessories on
                tbl_vehicle_accessories.accessories_id=tbl_accesories.accessoryid
                where tbl_vehicle_accessories.vehicle_id ={$id}", "result");

		echo Modules::run("Template/main", $data);
	}

	function mra_doc_receive() {
		if (isset($_FILES['userfile'])) {
			$document = explode('.', $_FILES['userfile']['name']);
			$new_name = rand() . '.' . $document[1];
			// $destination = 'vendor_images'.$new_name;
			move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/' . $new_name);
		}
		if ($this->input->post("reportsatus") == 1) {$comma_separated = 0;} else {
			$comma_separated = implode(",", $this->input->post("seizecategories"));
		}

		$data = array(
			"letterno" => $this->input->post("letterno"),
			"vehicle_id" => $this->input->post("vechicle_id"),
			"mratime" => $this->input->post("time"),
			"Description" => $this->input->post("description"),
			"mradate" => $this->input->post("mradate"),
			"mracheckout" => 1,
			" upload" => $new_name,
			"seize_categories" => $comma_separated,
		);

		if (insert_data("tbl_mra_report", $data)) {
			$status_data = array(
				"vehicle_id" => $this->input->post("vechicle_id"),
				"status_id" => 7,
				"user_id" => $this->session->userdata("user_id"),
				"district_id" => $this->session->userdata("user_district"),
			);
			insert_data("tbl_vehicle_status", $status_data);
			update_where("tbl_vehicle", array("clearnotclearstatus" => $this->input->post("reportsatus")),
				array("vechileid" => $this->input->post("vechicle_id")));
		}

	}
	function mra_doc_recieved() {
		echo Modules::run("Auth/check_login", "mra_doc_recieved");
		$data['module'] = "Vehicles";
		$data['file'] = "Etoviews/mra_doc_received";
		$data['name'] = "";
		$this->general_query_function();
		$results = custom_query("SELECT vehicle_id FROM tbl_vehicle_status
  WHERE vehicle_id NOT IN ( SELECT vehicle_id FROM tbl_vehicle_status where
  status_id =9 or status_id = 10 or status_id =20  or status_id =5 )and vehicle_id IN
  ( SELECT vehicle_id FROM tbl_vehicle_status where
     status_id= 7 )
    group by vehicle_id", "array");

		$ary = array_column($results, "vehicle_id");

		$comma_separated = implode(",", $ary);

		if (empty($comma_separated)) {
			$comma_separated = 0;
		}
		$returneddistrict = custom_query($this->query1, "row");

		$userdistrict = $returneddistrict->district_id;
		$data['seized_vechicles'] = custom_query($this->select_col . " ,tbl_mra_report.letterno as mraletter,mradate,mratime,seize_categories,mracheckout "
			. $this->query3 . " LEFT JOIN `tbl_mra_report`
                                ON `tbl_mra_report`.`vehicle_id`=`tbl_vehicle`.`vechileid`
                " . $this->query7 . $comma_separated . $this->query4 . $this->query8 . $userdistrict . "
        and mracheckout=1" . $this->query5, "result");

		echo Modules::run("Template/main", $data);

	}
	function mra_doc_receive_details($id) {
		$data['module'] = "Vehicles";
		$data['file'] = "Etoviews/mra_received_details";
		$data['name'] = "";
		$data['all_vechicle_specific'] = custom_query("SELECT mobilesquadno,username,districtname,seizedtype
             ,siezeddate,siezedtime,formserialno,seizedlocationlat,drivername
    ,seizedlocationlong,chasisno,engineno,vechileregistrationno,makename
     ,submakename,modelyear,vehicletype,drivercnicno
    ,drivermobileno,driveraddress,
    vechileownername,vechileownercnic,vechileownermobileno
    bodybuildname,colorname,transmission,assembely,wheelnumber,enginetype,
    vehicleengine_capcaity,mileage,vechicledescription,mratime,letterno,mradate,upload,Description
     FROM `tbl_vehicle`
             LEFT JOIN tbl_district on tbl_district.districtid = tbl_vehicle.district_id
            LEFT JOIN tbl_vehicle_model on tbl_vehicle_model.makeid=tbl_vehicle.vehicle_make
             LEFT JOIN tbl_vehicle_model_sub on tbl_vehicle_model_sub.submakeid=tbl_vehicle.vehicle_model
             LEFT JOIN tbl_vehicle_modelyear on tbl_vehicle_modelyear.modelid = tbl_vehicle.vechiclemodelyear
             LEFT JOIN tbl_bodybuild on tbl_bodybuild.bodybuild = tbl_vehicle.build_id
             LEFT JOIN tbl_wheels on tbl_wheels.wheelid = tbl_vehicle.vechilewheels
             LEFT JOIN tbl_mra_report on tbl_mra_report.vehicle_id = tbl_vehicle.vechileid
             LEFT JOIN tbl_color on tbl_color.colorid = tbl_vehicle.color_id
             LEFT JOIN tbl_vehicle_seized_categories on tbl_vehicle_seized_categories.siezedid = tbl_vehicle.vehicleseize_category
             LEFT JOIN tbl_user on tbl_user.userid=tbl_vehicle.user_id where vechileid ={$id} and mracheckout=1", "result");

		$data['all_vechicle_images'] = custom_query("SELECT * FROM `tbl_vehicle_images`
              where vechile_id ={$id}", "result");

		$data['all_vechicle_accesories'] = custom_query("SELECT * FROM `tbl_accesories` join tbl_vehicle_accessories on
                tbl_vehicle_accessories.accessories_id=tbl_accesories.accessoryid
                where tbl_vehicle_accessories.vehicle_id ={$id}", "result");

		$data['mra_checkin'] = custom_query("select * from tbl_mra_report where vehicle_id={$id}
                and mracheckin=1", "result");
		echo Modules::run("Template/main", $data);
	}
	function complete_confication_mra_report($id) {
		$data['module'] = "Vehicles";
		$data['file'] = "Etoviews/history/complete_confication_mra_report";
		$data['name'] = "";
		$data['all_vechicle_specific'] = custom_query("SELECT mobilesquadno,username,districtname,seizedtype
             ,siezeddate,siezedtime,formserialno,seizedlocationlat,drivername
    ,seizedlocationlong,chasisno,engineno,vechileregistrationno,makename
     ,submakename,modelyear,vehicletype,drivercnicno
    ,drivermobileno,driveraddress,
    vechileownername,vechileownercnic,vechileownermobileno
    bodybuildname,colorname,transmission,assembely,wheelnumber,enginetype,
    vehicleengine_capcaity,mileage,vechicledescription,mratime,letterno,mradate,upload,tbl_mra_report.Description,
    tbl_vehicle_formb.`description`, `formbdate`, `formbtime`,`form_bno`,releasedhandover
     FROM `tbl_vehicle`
             LEFT JOIN tbl_district on tbl_district.districtid = tbl_vehicle.district_id
            LEFT JOIN tbl_vehicle_model on tbl_vehicle_model.makeid=tbl_vehicle.vehicle_make
             LEFT JOIN tbl_vehicle_model_sub on tbl_vehicle_model_sub.submakeid=tbl_vehicle.vehicle_model
             LEFT JOIN tbl_vehicle_modelyear on tbl_vehicle_modelyear.modelid = tbl_vehicle.vechiclemodelyear
             LEFT JOIN tbl_bodybuild on tbl_bodybuild.bodybuild = tbl_vehicle.build_id
             LEFT JOIN tbl_vehicle_formb on tbl_vehicle_formb.vechicle_id = tbl_vehicle.vechileid
             LEFT JOIN tbl_wheels on tbl_wheels.wheelid = tbl_vehicle.vechilewheels
             LEFT JOIN tbl_mra_report on tbl_mra_report.vehicle_id = tbl_vehicle.vechileid
             LEFT JOIN tbl_color on tbl_color.colorid = tbl_vehicle.color_id
             LEFT JOIN tbl_vehicle_seized_categories on tbl_vehicle_seized_categories.siezedid = tbl_vehicle.vehicleseize_category
             LEFT JOIN tbl_user on tbl_user.userid=tbl_vehicle.user_id where vechileid ={$id} and mracheckin=1", "result");

		$data['all_vechicle_images'] = custom_query("SELECT * FROM `tbl_vehicle_images`
              where vechile_id ={$id}", "result");
		$data['formb_accessories'] = custom_query("SELECT *
                FROM `tbl_accesories` join tbl_formb_accessories on
                tbl_formb_accessories.formb_accessoryid=tbl_accesories.accessoryid
                where tbl_formb_accessories.vechicle_id ={$id}", "result");
		$data['all_vechicle_accesories'] = custom_query("SELECT * FROM `tbl_accesories` join tbl_vehicle_accessories on
                tbl_vehicle_accessories.accessories_id=tbl_accesories.accessoryid
                where tbl_vehicle_accessories.vehicle_id ={$id}", "result");
		$data['warehouse_images'] = custom_query("SELECT * FROM `tbl_warehouse_images`
              where vechicle_id ={$id}", "result");
		$data['confiscation_order'] = custom_query(
			"select * from tbl_confiscated where vechicle_id={$id}", "result");

		$data['mra_checkout'] = custom_query("select * from tbl_mra_report where mracheckout=1 and vehicle_id={$id}", "result");
		echo Modules::run("Template/main", $data);
	}

	function Eto_confiscate() {
		if (isset($_FILES['userfile'])) {
			$document = explode('.', $_FILES['userfile']['name']);
			$new_name = rand() . '.' . $document[1];
			// $destination = 'vendor_images'.$new_name;
			move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/' . $new_name);
		}
		$data = array(
			" confiscationorderno" => $this->input->post("orderno"),
			"vechicle_id" => $this->input->post("vechicle_id"),
			"confiscationordetime" => $this->input->post("time"),
			"confiscationdescription" => $this->input->post("description"),
			"confiscationorderdate" => $this->input->post("date"),
			" upload" => $new_name,
		);
		if (insert_data("tbl_confiscated", $data)) {
			$status_data = array(
				"vehicle_id" => $this->input->post("vechicle_id"),
				"status_id" => 9,
				"user_id" => $this->session->userdata("user_id"),
				"district_id" => $this->session->userdata("user_district"),
			);
			insert_data("tbl_vehicle_status", $status_data);

		}
	}
	function dispatched_for_fsl() {
		echo Modules::run("Auth/check_login", "dispatched_for_fsl");
		$data['module'] = "Vehicles";
		$data['file'] = "Etoviews/fsl_report_status";
		$data['name'] = "";

		$this->general_query_function(3, 14, 0, 0, 0, 0, 0, "=", "");

		$returneddistrict = custom_query($this->query1, "row");
		$status_3 = custom_query($this->query6, "array");
		$status_vehicle = array_column($status_3, "vehicle_id");
		$comma_separated1 = implode(",", $status_vehicle);
		if (empty($comma_separated1)) {
			$comma_separated1 = 0;
		}
		$status_4 = custom_query("select vehicle_id from tbl_vehicle_status where vehicle_id
                 in($comma_separated1) and status_id =3 or status_id= 5", "array");
		$status_vehicle1 = array_column($status_4, "vehicle_id");
		$comma_separated2 = implode(",", $status_vehicle1);
		if (empty($comma_separated2)) {
			$comma_separated2 = 0;
		}
		$status_5 = custom_query("select vehicle_id from tbl_vehicle_status where vehicle_id
                 in($comma_separated2) and status_id =9 or status_id= 20 ", "array");
		$status_vehicle3 = array_column($status_5, "vehicle_id");
		$comma_separated4 = implode(",", $status_vehicle3);

		if (empty($comma_separated4)) {
			$comma_separated4 = 0;
		}
		$status_5 = custom_query("select vehicle_id from tbl_vehicle_status where vehicle_id
              IN($comma_separated2) and vehicle_id NOT IN($comma_separated4) ", "array");
		$status_vehicle2 = array_column($status_5, "vehicle_id");
		$comma_separated3 = implode(",", $status_vehicle2);
		//$this->general_query_function (1,5,3,0,0,0,0,"","NOT");
		if (empty($comma_separated3)) {

			$comma_separated3 = 0;
		}

		//$returneddistrict = custom_query($this->query1,"row");
		$returneddistrict = custom_query($this->query1, "row");
		//$userdistrict=  $returneddistrict->district_id;
		$userdistrict = $returneddistrict->district_id;
		$data['seized_vechicles'] = custom_query($this->select_col . $this->query3 . $this->query7 .
			$comma_separated3 . $this->query4 . $this->query8 . $userdistrict . $this->query5, "result");
		echo Modules::run("Template/main", $data);
	}
	function Eto_fsl_reports() {
		echo Modules::run("Auth/check_login", "Eto_fsl_reports");
		$data['module'] = "Vehicles";
		$data['file'] = "Etoviews/fsl_eto_confiscate_view";
		$data['name'] = "";

		$this->general_query_function(3, 14, 0, 0, 0, 0, 0, "=", "");

		$returneddistrict = custom_query($this->query1, "row");
		$status_3 = custom_query($this->query6, "array");
		$status_vehicle = array_column($status_3, "vehicle_id");
		$comma_separated1 = implode(",", $status_vehicle);
		if (empty($comma_separated1)) {
			$comma_separated1 = 0;
		}
		$status_4 = custom_query("select vehicle_id from tbl_vehicle_status where vehicle_id
                 in($comma_separated1) and status_id = 10 or status_id = 9 or status_id=5", "array");
		$status_vehicle1 = array_column($status_4, "vehicle_id");
		$comma_separated2 = implode(",", $status_vehicle1);
		if (empty($comma_separated2)) {
			$comma_separated2 = 0;
		}
		$status_5 = custom_query("select vehicle_id from tbl_vehicle_status where vehicle_id
              IN($comma_separated1) and vehicle_id NOT IN ($comma_separated2) ", "array");
		$status_vehicle2 = array_column($status_5, "vehicle_id");
		$comma_separated3 = implode(",", $status_vehicle2);
		//$this->general_query_function (1,5,3,0,0,0,0,"","NOT");
		if (empty($comma_separated3)) {

			$comma_separated3 = 0;
		}
		$returneddistrict = custom_query($this->query1, "row");
		//$returneddistrict = custom_query($this->query1,"row");

		//$userdistrict=  $returneddistrict->district_id;
		$userdistrict = $returneddistrict->district_id;
		$data['seized_vechicles'] = custom_query($this->select_col . " ,tbl_fsl_report.letterno as fslletter
                ,tbl_fsl_report.fslno,tbl_fsl_report.seized_category as categories,tbl_vehicle_formb.form_bno,time as fsltime,
                date as fsldate,fslcheckin,fslclearnotclear "
			. $this->query3 . " JOIN `tbl_fsl_report`
                                ON `tbl_fsl_report`.`vechicle_id`=`tbl_vehicle`.`vechileid`
                                JOIN `tbl_vehicle_formb`
                                ON `tbl_vehicle_formb`.`vechicle_id`=`tbl_vehicle`.`vechileid`


                        " . $this->query7 . $comma_separated3 . $this->query4 . $this->query8 . $userdistrict . " and
            fslcheckout=1  " . $this->query5, "result");
		echo Modules::run("Template/main", $data);
	}
	function mra_fsl_report() {
		echo Modules::run("Auth/check_login", "mra_fsl_report");
		$data['module'] = "Vehicles";
		$data['file'] = "Etoviews/mra_fsl_report_both";
		$data['name'] = "";

		$this->general_query_function();

		$returneddistrict = custom_query($this->query1, "row");

		//$returneddistrict = custom_query($this->query1,"row");
		$results = custom_query("SELECT vehicle_id FROM tbl_vehicle_status
  WHERE vehicle_id NOT IN ( SELECT vehicle_id FROM tbl_vehicle_status where
  status_id =9 or status_id = 10 or status_id =20 ) and vehicle_id IN
    ( SELECT vehicle_id FROM tbl_vehicle_status where
  status_id= 14 or status_id = 7  ) and status_id = 5 group by vehicle_id
    ", "array");

		$ary = array_column($results, "vehicle_id");
		$comma_separated = implode(",", $ary);

		if (empty($comma_separated)) {
			$comma_separated = 0;
		}

		//$userdistrict=  $returneddistrict->district_id;
		$userdistrict = $this->session->userdata("user_district");
		$data['seized_vechicles'] = custom_query($this->select_col . " ,tbl_fsl_report.letterno as fslletter
                ,tbl_fsl_report.fslno,tbl_fsl_report.seized_category as categories,tbl_vehicle_formb.form_bno,time as fsltime,
                date as fsldate,fslcheckin,fslclearnotclear,tbl_mra_report.seize_categories as mracategories,mracheckout   "
			. $this->query3 . "    LEFT JOIN `tbl_fsl_report`
                                ON `tbl_fsl_report`.`vechicle_id`=`tbl_vehicle`.`vechileid`
                                AND tbl_fsl_report.fslcheckout=1
                                  JOIN `tbl_vehicle_formb`
                                ON `tbl_vehicle_formb`.`vechicle_id`=`tbl_vehicle`.`vechileid`
                                LEFT JOIN `tbl_mra_report`
                                ON `tbl_mra_report`.`vehicle_id`=`tbl_vehicle`.vechileid AND
                                tbl_mra_report.mracheckout = 1
                         " . $this->query7 . $comma_separated . $this->query4 . $this->query9 . $userdistrict . " )
             and (
                      ( clearnotclearstatus=1 or clearnotclearstatus=2 )
             or (fslclearnotclear=1 or fslclearnotclear=2 ))
                         group by  vechileid " . $this->query5, "result");
		echo Modules::run("Template/main", $data);

	}
	function vehicle_sent_to_wh_list() {
		$this->load->model("Mdl_vehicles");
		$userid = $this->session->userdata("user_id");
		$fetch_data = $this->Mdl_vehicles->make_datatables_eto_send_wh($userid);
		$data = array();
		foreach ($fetch_data as $key => $row) {
			$sub_array = array();

			$sub_array[] = $key;
			$sub_array[] = $row->siezeddate;
			$sub_array[] = $row->formserialno;
			$sub_array[] = $row->form_bno;
			$sub_array[] = $row->makename;
			$sub_array[] = $row->submakename;
			$sub_array[] = $row->vechileregistrationno;
			$sub_array[] = $row->colorname;
			$sub_array[] = '<a href="fsl_report_dispatched_details/' . $row->vechileid . '"
                    class="btn bg-green waves-effect">View Details</a>';
			$data[] = $sub_array;
		}
		$output = array(
			"draw" => intval($_POST["draw"]),

			"recordsTotal" => $this->Mdl_vehicles->get_all_data_eto_send_wh(),
			"recordsFiltered" => $this->Mdl_vehicles->get_filtered_data_eto_send_wh(),
			"data" => $data,
		);
		echo json_encode($output);
	}
	function vehicle_sent_to_wh() {
		echo Modules::run("Auth/check_login", "vehicle_sent_to_wh");
		$data['module'] = "Vehicles";
		$data['file'] = "Etoviews/history/vehicle_sent_to_warehouse";
		$data['name'] = "";
		echo Modules::run("Template/main", $data);
	}
	function confiscated_history_list() {
		$this->load->model("Mdl_vehicles");

		$fetch_data = $this->Mdl_vehicles->make_datatables_eto_send_confiscated();
		$data = array();
		foreach ($fetch_data as $key => $row) {
			$sub_array = array();

			$sub_array[] = $key;
			$sub_array[] = $row->siezeddate;
			$sub_array[] = $row->formserialno;
			$sub_array[] = $row->form_bno;
			$sub_array[] = $row->makename;
			$sub_array[] = $row->submakename;
			$sub_array[] = $row->vechileregistrationno;
			$sub_array[] = $row->colorname;
			/*   $sub_array[] = '<a href="Vehicles/"'.if()change_proceed_status/.'"'.$row->vechileid.'"
				                    click="return confirm(Do you want to Proceeded.);"
			*/
			if ($row->clearnotclearstatus != 0) {$detail_fun = "complete_confication_mra_report/";} else {
				$detail_fun = "fsl_report_dispatched_details/";
			}
			$sub_array[] = '<a href="' . $detail_fun . $row->vechileid . '"

                    class="btn bg-indigo waves-effect">View Details</a>';
			$data[] = $sub_array;
		}
		$output = array(
			"draw" => intval($_POST["draw"]),

			"recordsTotal" => $this->Mdl_vehicles->get_all_data_eto_send_confiscated(),
			"recordsFiltered" => $this->Mdl_vehicles->get_filtered_data_eto_send_confiscated(),
			"data" => $data,
		);
		echo json_encode($output);
	}
	function confiscated_history() {
		echo Modules::run("Auth/check_login", "confiscated_history");
		$data['module'] = "Vehicles";
		$data['file'] = "Etoviews/history/vehicle_confiscated_history";
		$data['name'] = "";
		echo Modules::run("Template/main", $data);
	}
	function sent_to_mra_history_list() {
		$this->load->model("Mdl_vehicles");

		$fetch_data = $this->Mdl_vehicles->make_datatables_eto_send_mra();
		$data = array();
		foreach ($fetch_data as $key => $row) {
			$sub_array = array();

			$sub_array[] = $key;
			$sub_array[] = $row->siezeddate;
			$sub_array[] = $row->formserialno;
			$sub_array[] = $row->form_bno;
			$sub_array[] = $row->makename;
			$sub_array[] = $row->submakename;
			$sub_array[] = $row->vechileregistrationno;
			$sub_array[] = $row->colorname;
			$sub_array[] = '<a href="complete_confication_mra_report/' . $row->vechileid . '"
                    click="return confirm(Do you want to Proceeded.);"
                    class="btn bg-indigo waves-effect">View Details</a>';
			$data[] = $sub_array;
		}
		$output = array(
			"draw" => intval($_POST["draw"]),

			"recordsTotal" => $this->Mdl_vehicles->get_all_data_eto_send_mra(),
			"recordsFiltered" => $this->Mdl_vehicles->get_filtered_data_eto_send_mra(),
			"data" => $data,
		);
		echo json_encode($output);
	}
	function sent_to_mra_history() {
		echo Modules::run("Auth/check_login", "sent_to_mra_history");
		$data['module'] = "Vehicles";
		$data['file'] = "Etoviews/history/vehicle_sent_mra";
		$data['name'] = "";
		echo Modules::run("Template/main", $data);
	}
	function sent_to_both_history_list() {
		$this->load->model("Mdl_vehicles");

		$fetch_data = $this->Mdl_vehicles->make_datatables_eto_send_both();
		$data = array();
		foreach ($fetch_data as $key => $row) {
			$sub_array = array();

			$sub_array[] = $key;
			$sub_array[] = $row->siezeddate;
			$sub_array[] = $row->formserialno;
			$sub_array[] = $row->form_bno;
			$sub_array[] = $row->makename;
			$sub_array[] = $row->submakename;
			$sub_array[] = $row->vechileregistrationno;
			$sub_array[] = $row->colorname;
			$sub_array[] = '<a href="Both_mra_fsl_details/' . $row->vechileid . '"
                   "
                    class="btn bg-indigo waves-effect">View Details</a>';
			$data[] = $sub_array;
		}
		$output = array(
			"draw" => intval($_POST["draw"]),

			"recordsTotal" => $this->Mdl_vehicles->get_all_data_eto_send_both(),
			"recordsFiltered" => $this->Mdl_vehicles->get_filtered_data_eto_send_both(),
			"data" => $data,
		);
		echo json_encode($output);
	}
	function sent_to_both_history() {
		echo Modules::run("Auth/check_login", "sent_to_both_history");
		$data['module'] = "Vehicles";
		$data['file'] = "Etoviews/history/vehicle_sent_both_history";
		$data['name'] = "";
		echo Modules::run("Template/main", $data);
	}
	function released_vehicles_history_list() {

		$this->load->model("Mdl_vehicles");

		$fetch_data = $this->Mdl_vehicles->make_datatables_eto_release_vehicle();
		$data = array();
		foreach ($fetch_data as $row) {
			$sub_array = array();

			$sub_array[] = $row->siezeddate;
			$sub_array[] = $row->formserialno;
			$sub_array[] = $row->form_bno;
			$sub_array[] = $row->makename;
			$sub_array[] = $row->submakename;
			$sub_array[] = $row->vechileregistrationno;
			$sub_array[] = $row->colorname;
			if ($row->clearnotclearstatus != 0) {$detail_fun = "complete_confication_mra_report/";} else {

				$detail_fun = "fsl_report_dispatched_details/";

			}
			$sub_array[] = '<a href="' . $detail_fun . $row->vechileid . '"

                    class="btn bg-indigo waves-effect">View Details</a>';
			$data[] = $sub_array;
		}
		$output = array(
			"draw" => intval($_POST["draw"]),

			"recordsTotal" => $this->Mdl_vehicles->get_all_data_eto_release_vehicle(),
			"recordsFiltered" => $this->Mdl_vehicles->get_filtered_data_eto_release_vehicle(),
			"data" => $data,
		);
		echo json_encode($output);

	}
	function released_vehicles_history() {
		echo Modules::run("Auth/check_login", "released_vehicles_history");
		$data['module'] = "Vehicles";
		$data['file'] = "Etoviews/history/vehicle_release_history";
		$data['name'] = "";
		echo Modules::run("Template/main", $data);
	}

	function print_report($id) {
		$data['all_vechicle_specific'] = custom_query("SELECT mobilesquadno,username,districtname,seizedtype
             ,siezeddate,siezedtime,formserialno,seizedlocationlat,drivername
    ,seizedlocationlong,chasisno,engineno,vechileregistrationno,makename
     ,submakename,modelyear,vehicletype,drivercnicno
    ,drivermobileno,driveraddress,
    vechileownername,vechileownercnic,vechileownermobileno
    bodybuildname,colorname,transmission,assembely,wheelnumber,enginetype,vehicleengine_capcaity,mileage,
    vechicledescription,vehicleseize_category,
     `description`, `formbdate`, `formbtime`,`form_bno`
     FROM `tbl_vehicle`
             LEFT JOIN tbl_district on tbl_district.districtid = tbl_vehicle.district_id
            LEFT JOIN tbl_vehicle_model on tbl_vehicle_model.makeid=tbl_vehicle.vehicle_make
             LEFT JOIN tbl_vehicle_model_sub on tbl_vehicle_model_sub.submakeid=tbl_vehicle.vehicle_model
             LEFT JOIN tbl_vehicle_modelyear on tbl_vehicle_modelyear.modelid = tbl_vehicle.vechiclemodelyear
             LEFT JOIN tbl_bodybuild on tbl_bodybuild.bodybuild = tbl_vehicle.build_id
             LEFT JOIN tbl_wheels on tbl_wheels.wheelid = tbl_vehicle.vechilewheels
             LEFT JOIN tbl_vehicle_formb on tbl_vehicle_formb.vechicle_id = tbl_vehicle.vechileid

             LEFT JOIN tbl_color on tbl_color.colorid = tbl_vehicle.color_id
             LEFT JOIN tbl_vehicle_seized_categories on tbl_vehicle_seized_categories.siezedid = tbl_vehicle.vehicleseize_category
             LEFT JOIN tbl_user on tbl_user.userid=tbl_vehicle.user_id where vechileid ={$id}", "row");

		$data['fsl_report'] = custom_query("SELECT * FROM `tbl_fsl_report`
              where vechicle_id ={$id} and fslcheckin=1", "row");
		$data['fsl_report_checkout'] = custom_query("SELECT * FROM `tbl_fsl_report`
              where vechicle_id ={$id} and fslcheckout=1", "row");
		$data['all_vechicle_accesories'] = custom_query("SELECT * FROM `tbl_accesories` join tbl_vehicle_accessories on
                tbl_vehicle_accessories.accessories_id=tbl_accesories.accessoryid
                where tbl_vehicle_accessories.vehicle_id ={$id}", "result");

		$data['formb_accessories'] = custom_query("SELECT *
                FROM `tbl_accesories` join tbl_formb_accessories on
                tbl_formb_accessories.formb_accessoryid=tbl_accesories.accessoryid
                where tbl_formb_accessories.vechicle_id ={$id}", "result");
		$data['confiscation_order'] = custom_query(
			"select * from tbl_confiscated where vechicle_id={$id}", "row");
		$this->load->view("Etoviews/print_report_fsl", $data);
	}
	function generate_pdf_main() {
		$id = $this->uri->segment(3);
		//$this->load->library("html2pdf");
		try {
			$html2pdf = new Html2Pdf('P', 'A4', 'fr', true, 'UTF-8', array(0, 0, 0, 0));
			$html2pdf->pdf->SetDisplayMode('default');
			ob_start();
			$this->print_report($id);
			$content = ob_get_clean();
			$html2pdf->writeHTML($content);
			$html2pdf->output('report.pdf'); // To see the output in browser
			//$html2pdf->output('case.pdf','D');// to download
		} catch (Html2PdfException $e) {
			$html2pdf->clean();
			$formatter = new ExceptionFormatter($e);
			echo $formatter->getHtmlMessage();
		}
	}
	function print_report_mra($id) {
		$data['all_vechicle_specific'] = custom_query("SELECT mobilesquadno,username,districtname,seizedtype
             ,siezeddate,siezedtime,formserialno,seizedlocationlat,drivername
    ,seizedlocationlong,chasisno,engineno,vechileregistrationno,makename
     ,submakename,modelyear,vehicletype,drivercnicno
    ,drivermobileno,driveraddress,
    vechileownername,vechileownercnic,vechileownermobileno
    bodybuildname,colorname,transmission,assembely,wheelnumber,enginetype,vehicleengine_capcaity,mileage,
    vechicledescription,vehicleseize_category,
     `description`, `formbdate`, `formbtime`,`form_bno`
     FROM `tbl_vehicle`
             LEFT JOIN tbl_district on tbl_district.districtid = tbl_vehicle.district_id
            LEFT JOIN tbl_vehicle_model on tbl_vehicle_model.makeid=tbl_vehicle.vehicle_make
             LEFT JOIN tbl_vehicle_model_sub on tbl_vehicle_model_sub.submakeid=tbl_vehicle.vehicle_model
             LEFT JOIN tbl_vehicle_modelyear on tbl_vehicle_modelyear.modelid = tbl_vehicle.vechiclemodelyear
             LEFT JOIN tbl_bodybuild on tbl_bodybuild.bodybuild = tbl_vehicle.build_id
             LEFT JOIN tbl_wheels on tbl_wheels.wheelid = tbl_vehicle.vechilewheels
             LEFT JOIN tbl_vehicle_formb on tbl_vehicle_formb.vechicle_id = tbl_vehicle.vechileid

             LEFT JOIN tbl_color on tbl_color.colorid = tbl_vehicle.color_id
             LEFT JOIN tbl_vehicle_seized_categories on tbl_vehicle_seized_categories.siezedid = tbl_vehicle.vehicleseize_category
             LEFT JOIN tbl_user on tbl_user.userid=tbl_vehicle.user_id where vechileid ={$id}", "row");

		$data['all_vechicle_accesories'] = custom_query("SELECT * FROM `tbl_accesories` join tbl_vehicle_accessories on
                tbl_vehicle_accessories.accessories_id=tbl_accesories.accessoryid
                where tbl_vehicle_accessories.vehicle_id ={$id}", "result");

		$data['formb_accessories'] = custom_query("SELECT *
                FROM `tbl_accesories` join tbl_formb_accessories on
                tbl_formb_accessories.formb_accessoryid=tbl_accesories.accessoryid
                where tbl_formb_accessories.vechicle_id ={$id}", "result");
		$data['confiscation_order'] = custom_query(
			"select * from tbl_confiscated where vechicle_id={$id}", "row");
		$data['mra_checkin'] = custom_query("select * from tbl_mra_report where vehicle_id={$id}
        and mracheckin=1", "row");

		$data['mra_checkout'] = custom_query("select * from tbl_mra_report where vehicle_id={$id}

        and mracheckout=1", "row");

		$this->load->view("Etoviews/print_report_mra", $data);
	}
	function generate_pdf_main_mra() {
		$id = $this->uri->segment(3);
		//$this->load->library("html2pdf");
		try {
			$html2pdf = new Html2Pdf('P', 'A4', 'fr', true, 'UTF-8', array(0, 0, 0, 0));
			$html2pdf->pdf->SetDisplayMode('default');
			ob_start();
			$this->print_report_mra($id);
			$content = ob_get_clean();
			$html2pdf->writeHTML($content);
			$html2pdf->output('report.pdf'); // To see the output in browser
			//$html2pdf->output('case.pdf','D');// to download
		} catch (Html2PdfException $e) {
			$html2pdf->clean();
			$formatter = new ExceptionFormatter($e);
			echo $formatter->getHtmlMessage();
		}
	}
	function print_report_both($id) {
		$data['all_vechicle_specific'] = custom_query("SELECT mobilesquadno,username,districtname,seizedtype
             ,siezeddate,siezedtime,formserialno,seizedlocationlat,drivername
    ,seizedlocationlong,chasisno,engineno,vechileregistrationno,makename
     ,submakename,modelyear,vehicletype,drivercnicno
    ,drivermobileno,driveraddress,
    vechileownername,vechileownercnic,vechileownermobileno
    bodybuildname,colorname,transmission,assembely,wheelnumber,enginetype,vehicleengine_capcaity,mileage,
    vechicledescription,vehicleseize_category,
     `description`, `formbdate`, `formbtime`,`form_bno`
     FROM `tbl_vehicle`
             LEFT JOIN tbl_district on tbl_district.districtid = tbl_vehicle.district_id
            LEFT JOIN tbl_vehicle_model on tbl_vehicle_model.makeid=tbl_vehicle.vehicle_make
             LEFT JOIN tbl_vehicle_model_sub on tbl_vehicle_model_sub.submakeid=tbl_vehicle.vehicle_model
             LEFT JOIN tbl_vehicle_modelyear on tbl_vehicle_modelyear.modelid = tbl_vehicle.vechiclemodelyear
             LEFT JOIN tbl_bodybuild on tbl_bodybuild.bodybuild = tbl_vehicle.build_id
             LEFT JOIN tbl_wheels on tbl_wheels.wheelid = tbl_vehicle.vechilewheels
             LEFT JOIN tbl_vehicle_formb on tbl_vehicle_formb.vechicle_id = tbl_vehicle.vechileid

             LEFT JOIN tbl_color on tbl_color.colorid = tbl_vehicle.color_id
             LEFT JOIN tbl_vehicle_seized_categories on tbl_vehicle_seized_categories.siezedid = tbl_vehicle.vehicleseize_category
             LEFT JOIN tbl_user on tbl_user.userid=tbl_vehicle.user_id where vechileid ={$id}", "row");

		$data['all_vechicle_accesories'] = custom_query("SELECT * FROM `tbl_accesories` join tbl_vehicle_accessories on
                tbl_vehicle_accessories.accessories_id=tbl_accesories.accessoryid
                where tbl_vehicle_accessories.vehicle_id ={$id}", "result");

		$data['formb_accessories'] = custom_query("SELECT *
                FROM `tbl_accesories` join tbl_formb_accessories on
                tbl_formb_accessories.formb_accessoryid=tbl_accesories.accessoryid
                where tbl_formb_accessories.vechicle_id ={$id}", "result");
		$data['confiscation_order'] = custom_query(
			"select * from tbl_confiscated where vechicle_id={$id}", "row");
		$data['mra_checkin'] = custom_query("select * from tbl_mra_report where vehicle_id={$id}
        and mracheckin=1", "row");
		$data['fsl_report'] = custom_query("SELECT * FROM `tbl_fsl_report`
              where vechicle_id ={$id} and fslcheckin=1", "row");
		$data['fsl_report_checkout'] = custom_query("SELECT * FROM `tbl_fsl_report`
              where vechicle_id ={$id} and fslcheckout=1", "row");
		$data['release_order'] = custom_query(
			"select * from tbl_released_vehicle where vehicle_id={$id}", "row");
		$data['mra_checkout'] = custom_query("select * from tbl_mra_report where vehicle_id={$id}

        and mracheckout=1", "row");

		$this->load->view("Etoviews/print_both_fsl_mra", $data);
	}
	function generate_pdf_complete_both() {
		$id = $this->uri->segment(3);
		//$this->load->library("html2pdf");
		try {
			$html2pdf = new Html2Pdf('P', 'A4', 'fr', true, 'UTF-8', array(0, 0, 0, 0));
			$html2pdf->pdf->SetDisplayMode('default');
			ob_start();
			$this->print_report_both($id);
			$content = ob_get_clean();
			$html2pdf->writeHTML($content);
			$html2pdf->output('report.pdf'); // To see the output in browser
			//$html2pdf->output('case.pdf','D');// to download
		} catch (Html2PdfException $e) {
			$html2pdf->clean();
			$formatter = new ExceptionFormatter($e);
			echo $formatter->getHtmlMessage();
		}
	}

	function vehicle_both_details($id) {

		$data['module'] = "Vehicles";
		$data['file'] = "Etoviews/vehicle_both_details";
		$data['name'] = "";
		$data['all_vechicle_specific'] = custom_query("SELECT mobilesquadno,username,districtname,seizedtype
             ,siezeddate,siezedtime,formserialno,seizedlocationlat,drivername
    ,seizedlocationlong,chasisno,engineno,vechileregistrationno,makename
     ,submakename,modelyear,vehicletype,drivercnicno
    ,drivermobileno,driveraddress,
    vechileownername,vechileownercnic,vechileownermobileno
    bodybuildname,colorname,transmission,assembely,wheelnumber,enginetype,vehicleengine_capcaity,mileage,
    vechicledescription,
     `description`, `formbdate`, `formbtime`,`form_bno`
     FROM `tbl_vehicle`
             LEFT JOIN tbl_district on tbl_district.districtid = tbl_vehicle.district_id
            LEFT JOIN tbl_vehicle_model on tbl_vehicle_model.makeid=tbl_vehicle.vehicle_make
             LEFT JOIN tbl_vehicle_model_sub on tbl_vehicle_model_sub.submakeid=tbl_vehicle.vehicle_model
             LEFT JOIN tbl_vehicle_modelyear on tbl_vehicle_modelyear.modelid = tbl_vehicle.vechiclemodelyear
             LEFT JOIN tbl_bodybuild on tbl_bodybuild.bodybuild = tbl_vehicle.build_id
             LEFT JOIN tbl_wheels on tbl_wheels.wheelid = tbl_vehicle.vechilewheels
             LEFT JOIN tbl_vehicle_formb on tbl_vehicle_formb.vechicle_id = tbl_vehicle.vechileid

             LEFT JOIN tbl_color on tbl_color.colorid = tbl_vehicle.color_id
             LEFT JOIN tbl_vehicle_seized_categories on tbl_vehicle_seized_categories.siezedid = tbl_vehicle.vehicleseize_category
             LEFT JOIN tbl_user on tbl_user.userid=tbl_vehicle.user_id where vechileid ={$id}", "result");
		$data['all_vechicle_images'] = custom_query("SELECT * FROM `tbl_vehicle_images`
              where vechile_id ={$id}", "result");
		$data['warehouse_images'] = custom_query("SELECT * FROM `tbl_warehouse_images`
              where vechicle_id ={$id}", "result");
		$data['fsl_report'] = custom_query("SELECT * FROM `tbl_fsl_report`
              where vechicle_id ={$id} and fslcheckin=1", "result");
		$data['fsl_report_checkout'] = custom_query("SELECT * FROM `tbl_fsl_report`
              where vechicle_id ={$id} and fslcheckout=1", "result");
		$data['all_vechicle_accesories'] = custom_query("SELECT * FROM `tbl_accesories` join tbl_vehicle_accessories on
                tbl_vehicle_accessories.accessories_id=tbl_accesories.accessoryid
                where tbl_vehicle_accessories.vehicle_id ={$id}", "result");

		$data['formb_accessories'] = custom_query("SELECT *
                FROM `tbl_accesories` join tbl_formb_accessories on
                tbl_formb_accessories.formb_accessoryid=tbl_accesories.accessoryid
                where tbl_formb_accessories.vechicle_id ={$id}", "result");
		$data['confiscation_order'] = custom_query(
			"select * from tbl_confiscated where vechicle_id={$id}", "result");
		echo Modules::run("Template/main", $data);

	}

	function Both_mra_fsl_details($id) {
		$data['module'] = "Vehicles";
		$data['file'] = "Etoviews/vehicle_both_details";
		$data['name'] = "";
		$data['all_vechicle_specific'] = custom_query("SELECT mobilesquadno,username,districtname,seizedtype
             ,siezeddate,siezedtime,formserialno,seizedlocationlat,drivername
    ,seizedlocationlong,chasisno,engineno,vechileregistrationno,makename
     ,submakename,modelyear,vehicletype,drivercnicno
    ,drivermobileno,driveraddress,releasedhandover,
    vechileownername,vechileownercnic,vechileownermobileno
    bodybuildname,colorname,transmission,assembely,wheelnumber,enginetype,vehicleengine_capcaity,mileage,
    vechicledescription,
     `description`, `formbdate`, `formbtime`,`form_bno`
     FROM `tbl_vehicle`
             LEFT JOIN tbl_district on tbl_district.districtid = tbl_vehicle.district_id
            LEFT JOIN tbl_vehicle_model on tbl_vehicle_model.makeid=tbl_vehicle.vehicle_make
             LEFT JOIN tbl_vehicle_model_sub on tbl_vehicle_model_sub.submakeid=tbl_vehicle.vehicle_model
             LEFT JOIN tbl_vehicle_modelyear on tbl_vehicle_modelyear.modelid = tbl_vehicle.vechiclemodelyear
             LEFT JOIN tbl_bodybuild on tbl_bodybuild.bodybuild = tbl_vehicle.build_id
             LEFT JOIN tbl_wheels on tbl_wheels.wheelid = tbl_vehicle.vechilewheels
             LEFT JOIN tbl_vehicle_formb on tbl_vehicle_formb.vechicle_id = tbl_vehicle.vechileid

             LEFT JOIN tbl_color on tbl_color.colorid = tbl_vehicle.color_id
             LEFT JOIN tbl_vehicle_seized_categories on tbl_vehicle_seized_categories.siezedid = tbl_vehicle.vehicleseize_category
             LEFT JOIN tbl_user on tbl_user.userid=tbl_vehicle.user_id where vechileid ={$id}", "result");
		$data['all_vechicle_images'] = custom_query("SELECT * FROM `tbl_vehicle_images`
              where vechile_id ={$id}", "result");
		$data['warehouse_images'] = custom_query("SELECT * FROM `tbl_warehouse_images`
              where vechicle_id ={$id}", "result");
		$data['fsl_report'] = custom_query("SELECT * FROM `tbl_fsl_report`
              where vechicle_id ={$id} and fslcheckin=1", "result");
		$data['fsl_report_checkout'] = custom_query("SELECT * FROM `tbl_fsl_report`
              where vechicle_id ={$id} and fslcheckout=1", "result");
		$data['all_vechicle_accesories'] = custom_query("SELECT * FROM `tbl_accesories` join tbl_vehicle_accessories on
                tbl_vehicle_accessories.accessories_id=tbl_accesories.accessoryid
                where tbl_vehicle_accessories.vehicle_id ={$id}", "result");

		$data['formb_accessories'] = custom_query("SELECT *
                FROM `tbl_accesories` join tbl_formb_accessories on
                tbl_formb_accessories.formb_accessoryid=tbl_accesories.accessoryid
                where tbl_formb_accessories.vechicle_id ={$id}", "result");
		$data['confiscation_order'] = custom_query(
			"select * from tbl_confiscated where vechicle_id={$id}", "result");
		$data['release_order'] = custom_query(
			"select * from tbl_released_vehicle where vehicle_id={$id}", "result");
		$data['mra_checkin'] = custom_query("select * from tbl_mra_report where vehicle_id={$id}
        and mracheckin=1", "row");

		$data['mra_checkout'] = custom_query("select * from tbl_mra_report where vehicle_id={$id}

        and mracheckout=1", "row");
		echo Modules::run("Template/main", $data);

	}
	function Eto_create_report_list() {
		$this->load->model("Mdl_Eto_reports");

		$fetch_data = $this->Mdl_Eto_reports->make_datatables_eto_report();

		$data = array();
		foreach ($fetch_data as $row) {
			$sub_array = array();

			$sub_array[] = $row->makename;
			$sub_array[] = $row->submakename;
			$sub_array[] = $row->vechileregistrationno;
			$sub_array[] = $row->colorname;
			$sub_array[] = $row->username;
			$sub_array[] = $row->usercnic;

			$data[] = $sub_array;

		}

		$output = array(
			"draw" => intval($_POST["draw"]),
			"recordsTotal" => $this->Mdl_Eto_reports->get_all_data_eto_report(),
			"recordsFiltered" => $this->Mdl_Eto_reports->get_filtered_data_eto_report(),
			"data" => $data,
		);

		echo json_encode($output);
	}
	function Eto_create_report() {
		$data['module'] = "Vehicles";
		$data['file'] = "Etoviews/Eto_create_report";
		$data['name'] = "";
		$user_district = $this->session->userdata("user_district");
		$data['all_inspectors'] = custom_query("SELECT * FROM `tbl_user` join tbl_user_district on
         tbl_user_district.user_id = tbl_user.userid join user_roles on
          user_roles.user_id = tbl_user.userid
         and district_id=$user_district and role_id=2 order by udid Desc", "result");

		echo Modules::run("Template/main", $data);
	}

	/*
		    |--------------------------------------------------------------------------
		    |ETO FUNTIONALITIES ENDS
		    |--------------------------------------------------------------------------
	*/
	/*
		    |--------------------------------------------------------------------------
		    |Warehouse FUNTIONALITIES ENDS
		    |--------------------------------------------------------------------------
	*/

	function send_vehicle_fsl() {
		$data['module'] = "Vehicles";
		$data['file'] = "warehouseviews/send_vehilce_to_fsl";
		$data['name'] = "";

		$this->general_query_function(3, 11, 0, 0, 0, 0, 0, "=", "");

		$returneddistrict = custom_query($this->query1, "row");
		$status_3 = custom_query($this->query6, "array");
		$status_vehicle = array_column($status_3, "vehicle_id");
		$comma_separated1 = implode(",", $status_vehicle);
		if (empty($comma_separated1)) {
			$comma_separated1 = 0;
		}

		$status_4 = custom_query("select vehicle_id from tbl_vehicle_status where vehicle_id
                in($comma_separated1)
                and status_id =12", "array");
		$status_vehicle1 = array_column($status_4, "vehicle_id");
		$comma_separated2 = implode(",", $status_vehicle1);
		if (empty($comma_separated2)) {
			$comma_separated2 = 0;
		}

		$status_5 = custom_query("select vehicle_id from tbl_vehicle_status where vehicle_id
             not IN($comma_separated2) and vehicle_id IN($comma_separated1)", "array");
		$status_vehicle2 = array_column($status_5, "vehicle_id");
		$comma_separated3 = implode(",", $status_vehicle2);
		//$this->general_query_function (1,5,3,0,0,0,0,"","NOT");
		if (empty($comma_separated3)) {

			$comma_separated3 = 0;
		}

		//$returneddistrict = custom_query($this->query1,"row");

		//$userdistrict=  $returneddistrict->district_id;
		$data['seized_vechicles'] = custom_query($this->select_col . " ,form_bno,formbtime,formbdate "
			. $this->query3 . " JOIN `tbl_vehicle_formb`
                                ON `tbl_vehicle_formb`.`vechicle_id`=`tbl_vehicle`.`vechileid`
                " . $this->query7 . $comma_separated3 . $this->query4 . " group by vechileid " . $this->query5, "result");
		echo Modules::run("Template/main", $data);
	}

	function send_vehicle_fsl_details($id) {
		$data['module'] = "Vehicles";
		$data['file'] = "warehouseviews/send_vehicle_fsl_details";
		$data['name'] = "";
		$data['all_vechicle_specific'] = custom_query("SELECT mobilesquadno,username,districtname,seizedtype
             ,siezeddate,siezedtime,formserialno,seizedlocationlat,drivername
    ,seizedlocationlong,chasisno,engineno,vechileregistrationno,makename
     ,submakename,modelyear,vehicletype,drivercnicno,registrationdistrictname
    ,drivermobileno,driveraddress,
    vechileownername,vechileownercnic,vechileownermobileno
    bodybuildname,colorname,transmission,assembely,wheelnumber,enginetype,vehicleengine_capcaity,mileage,
    vechicledescription,
     `description`, `formbdate`, `formbtime`,`form_bno`
     FROM `tbl_vehicle`
             LEFT JOIN tbl_district on tbl_district.districtid = tbl_vehicle.district_id
            LEFT JOIN tbl_vehicle_model on tbl_vehicle_model.makeid=tbl_vehicle.vehicle_make
             LEFT JOIN tbl_vehicle_model_sub on tbl_vehicle_model_sub.submakeid=tbl_vehicle.vehicle_model
             LEFT JOIN tbl_vehicle_modelyear on tbl_vehicle_modelyear.modelid = tbl_vehicle.vechiclemodelyear
             LEFT JOIN tbl_bodybuild on tbl_bodybuild.bodybuild = tbl_vehicle.build_id
             LEFT JOIN tbl_wheels on tbl_wheels.wheelid = tbl_vehicle.vechilewheels
             LEFT JOIN tbl_district_registration on tbl_district_registration.registrationdistrictid = tbl_vehicle.registration_id
             LEFT JOIN tbl_vehicle_formb on tbl_vehicle_formb.vechicle_id = tbl_vehicle.vechileid

             LEFT JOIN tbl_color on tbl_color.colorid = tbl_vehicle.color_id
             LEFT JOIN tbl_vehicle_seized_categories on tbl_vehicle_seized_categories.siezedid = tbl_vehicle.vehicleseize_category
             LEFT JOIN tbl_user on tbl_user.userid=tbl_vehicle.user_id where vechileid ={$id}", "result");
		$data['all_vechicle_images'] = custom_query("SELECT * FROM `tbl_vehicle_images`
              where vechile_id ={$id}", "result");
		$data['warehouse_images'] = custom_query("SELECT * FROM `tbl_warehouse_images`
              where vechicle_id ={$id}", "result");

		$data['all_vechicle_accesories'] = custom_query("SELECT * FROM `tbl_accesories` join tbl_vehicle_accessories on
                tbl_vehicle_accessories.accessories_id=tbl_accesories.accessoryid
                where tbl_vehicle_accessories.vehicle_id ={$id}", "result");
		$data['formb_accessories'] = custom_query("SELECT *
                FROM `tbl_accesories` join tbl_formb_accessories on
                tbl_formb_accessories.formb_accessoryid=tbl_accesories.accessoryid
                where tbl_formb_accessories.vechicle_id ={$id}", "result");
		echo Modules::run("Template/main", $data);

	}
	function vehicle_sent_to_fsl() {
		if (isset($_FILES['userfile'])) {
			$document = explode('.', $_FILES['userfile']['name']);
			$new_name = rand() . '.' . $document[1];
			// $destination = 'vendor_images'.$new_name;
			move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/' . $new_name);
		}
		$data = array(
			"letterno" => $this->input->post("letterno"),
			"vechicle_id" => $this->input->post("vechicle_id"),
			"time" => $this->input->post("time"),
			"fslno" => $this->input->post("fslno"),
			"description" => $this->input->post("description"),
			"date" => $this->input->post("date"),
			"fslcheckin" => 1,
			" upload" => $new_name,
		);
		if (insert_data("tbl_fsl_report", $data)) {
			$status_data = array(
				"vehicle_id" => $this->input->post("vechicle_id"),
				"status_id" => 12,
				"user_id" => $this->session->userdata("user_id"),
			);
			insert_data("tbl_vehicle_status", $status_data);
		}
	}

	function fsl_report_dispatched() {
		echo Modules::run("Auth/check_login", "fsl_report_dispatched");
		$data['module'] = "Vehicles";
		$data['file'] = "warehouseviews/fsl_report_dispatched";
		$data['name'] = "";

		$this->general_query_function(3, 12, 0, 0, 0, 0, 0, "=", "");

		$returneddistrict = custom_query($this->query1, "row");
		$status_3 = custom_query($this->query6, "array");
		$status_vehicle = array_column($status_3, "vehicle_id");
		$comma_separated1 = implode(",", $status_vehicle);
		if (empty($comma_separated1)) {
			$comma_separated1 = 0;
		}
		$status_4 = custom_query("select vehicle_id from tbl_vehicle_status where vehicle_id
                 in($comma_separated1) and status_id =13", "array");
		$status_vehicle1 = array_column($status_4, "vehicle_id");
		$comma_separated2 = implode(",", $status_vehicle1);
		if (empty($comma_separated2)) {
			$comma_separated2 = 0;
		}
		$status_5 = custom_query("select vehicle_id from tbl_vehicle_status where vehicle_id
             Not IN($comma_separated2) and vehicle_id IN($comma_separated1)", "array");
		$status_vehicle2 = array_column($status_5, "vehicle_id");
		$comma_separated3 = implode(",", $status_vehicle2);
		//$this->general_query_function (1,5,3,0,0,0,0,"","NOT");
		if (empty($comma_separated3)) {

			$comma_separated3 = 0;
		}

		//$returneddistrict = custom_query($this->query1,"row");

		//$userdistrict=  $returneddistrict->district_id;
		$data['seized_vechicles'] = custom_query($this->select_col . " ,tbl_fsl_report.letterno as fslletter,tbl_fsl_report.fslno,tbl_vehicle_formb.form_bno,time as fsltime,
                date as fsldate,fslcheckin "
			. $this->query3 . " JOIN `tbl_fsl_report`
                                ON `tbl_fsl_report`.`vechicle_id`=`tbl_vehicle`.`vechileid`
                                JOIN `tbl_vehicle_formb`
                                ON `tbl_vehicle_formb`.`vechicle_id`=`tbl_vehicle`.`vechileid`
                        " . $this->query7 . $comma_separated3 . $this->query4 . " and fslcheckin=1" . $this->query5, "result");
		$data['seize_category'] = custom_query("SELECT * FROM
                  tbl_vehicle_seized_categories", "result");
		echo Modules::run("Template/main", $data);

	}
	function fsl_report_dispatched_details($id) {
		$data['module'] = "Vehicles";
		$data['file'] = "warehouseviews/vehicle_fsl_dispatched_details";
		$data['name'] = "";
		$data['all_vechicle_specific'] = custom_query("SELECT mobilesquadno,username,districtname,
         seizedtype
             ,siezeddate,siezedtime,formserialno,seizedlocationlat,drivername
    ,seizedlocationlong,chasisno,engineno,vechileregistrationno,makename
     ,submakename,modelyear,vehicletype,drivercnicno
    ,drivermobileno,driveraddress,releasedhandover,registrationdistrictname,
    vechileownername,vechileownercnic,vechileownermobileno
    bodybuildname,colorname,transmission,assembely,wheelnumber,enginetype,vehicleengine_capcaity,mileage,
    vechicledescription,
     `description`, `formbdate`, `formbtime`,`form_bno`
     FROM `tbl_vehicle`
             LEFT JOIN tbl_district on tbl_district.districtid = tbl_vehicle.district_id
            LEFT JOIN tbl_vehicle_model on tbl_vehicle_model.makeid=tbl_vehicle.vehicle_make
             LEFT JOIN tbl_vehicle_model_sub on tbl_vehicle_model_sub.submakeid=tbl_vehicle.vehicle_model
             LEFT JOIN tbl_vehicle_modelyear on tbl_vehicle_modelyear.modelid = tbl_vehicle.vechiclemodelyear
             LEFT JOIN tbl_bodybuild on tbl_bodybuild.bodybuild = tbl_vehicle.build_id
             LEFT JOIN tbl_wheels on tbl_wheels.wheelid = tbl_vehicle.vechilewheels
             LEFT JOIN tbl_vehicle_formb on tbl_vehicle_formb.vechicle_id = tbl_vehicle.vechileid
             LEFT JOIN tbl_district_registration on tbl_district_registration.registrationdistrictid = tbl_vehicle.registration_id

             LEFT JOIN tbl_color on tbl_color.colorid = tbl_vehicle.color_id
             LEFT JOIN tbl_vehicle_seized_categories on tbl_vehicle_seized_categories.siezedid = tbl_vehicle.vehicleseize_category
             LEFT JOIN tbl_user on tbl_user.userid=tbl_vehicle.user_id where vechileid ={$id}", "result");
		$data['all_vechicle_images'] = custom_query("SELECT * FROM `tbl_vehicle_images`
              where vechile_id ={$id}", "result");
		$data['warehouse_images'] = custom_query("SELECT * FROM `tbl_warehouse_images`
              where vechicle_id ={$id}", "result");
		$data['fsl_report'] = custom_query("SELECT * FROM `tbl_fsl_report`
              where vechicle_id ={$id} and fslcheckin=1", "result");
		$data['fsl_report_checkout'] = custom_query("SELECT * FROM `tbl_fsl_report`
              where vechicle_id ={$id} and fslcheckout=1", "result");
		$data['all_vechicle_accesories'] = custom_query("SELECT * FROM `tbl_accesories` join tbl_vehicle_accessories on
                tbl_vehicle_accessories.accessories_id=tbl_accesories.accessoryid
                where tbl_vehicle_accessories.vehicle_id ={$id}", "result");

		$data['formb_accessories'] = custom_query("SELECT *
                FROM `tbl_accesories` join tbl_formb_accessories on
                tbl_formb_accessories.formb_accessoryid=tbl_accesories.accessoryid
                where tbl_formb_accessories.vechicle_id ={$id}", "result");
		$data['confiscation_order'] = custom_query(
			"select * from tbl_confiscated where vechicle_id={$id}", "result");
		$data['release_order'] = custom_query(
			"select * from tbl_released_vehicle where vehicle_id={$id}", "result");

		echo Modules::run("Template/main", $data);
	}

	function vehicle_received_from_fsl() {
		if (isset($_FILES['userfile'])) {
			$document = explode('.', $_FILES['userfile']['name']);
			$new_name = rand() . '.' . $document[1];
			// $destination = 'vendor_images'.$new_name;
			move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/' . $new_name);
		}
		if ($this->input->post("status") == 1) {
			$comma_separated = 0;
		} else {
			$comma_separated = implode(",", $this->input->post("seizecategories"));
		}
		$data = array(
			"letterno" => $this->input->post("letterno"),
			"vechicle_id" => $this->input->post("vechicle_id"),
			"time" => $this->input->post("time"),
			"fslno" => $this->input->post("fslno"),
			"description" => $this->input->post("description"),
			"date" => $this->input->post("date"),
			"fslcheckout" => 1,
			"seized_category" => $comma_separated,
			" upload" => $new_name,
		);
		if (insert_data("tbl_fsl_report", $data)) {
			$status_data = array(
				"vehicle_id" => $this->input->post("vechicle_id"),
				"status_id" => 13,
				"user_id" => $this->session->userdata("user_id"),
			);
			insert_data("tbl_vehicle_status", $status_data);
			$update_data = array("fslclearnotclear" => $this->input->post("status"));
			$where = array("vechileid" => $this->input->post("vechicle_id"));
			update_where("tbl_vehicle", $update_data, $where);
		}
	}

	function fsl_report_received() {
		echo Modules::run("Auth/check_login", "fsl_report_received");
		$data['module'] = "Vehicles";
		$data['file'] = "warehouseviews/fsl_report_received";
		$data['name'] = "";

		$this->general_query_function(3, 14, 0, 0, 0, 0, 0, "=", "");

		$returneddistrict = custom_query($this->query1, "row");
		$status_3 = custom_query($this->query6, "array");
		$status_vehicle = array_column($status_3, "vehicle_id");
		$comma_separated1 = implode(",", $status_vehicle);
		if (empty($comma_separated1)) {
			$comma_separated1 = 0;
		}
		$status_4 = custom_query("select vehicle_id from tbl_vehicle_status where vehicle_id
                 in($comma_separated1) and status_id =13 or status_id = 9 or status_id = 10
              or status_id =20", "array");
		$status_vehicle1 = array_column($status_4, "vehicle_id");
		$comma_separated2 = implode(",", $status_vehicle1);
		if (empty($comma_separated2)) {
			$comma_separated2 = 0;
		}
		$status_5 = custom_query("select vehicle_id from tbl_vehicle_status where vehicle_id
             NOT IN($comma_separated2)", "array");
		$status_vehicle2 = array_column($status_5, "vehicle_id");
		$comma_separated3 = implode(",", $status_vehicle2);
		//$this->general_query_function (1,5,3,0,0,0,0,"","NOT");
		if (empty($comma_separated3)) {

			$comma_separated3 = 0;
		}

		//$returneddistrict = custom_query($this->query1,"row");

		//$userdistrict=  $returneddistrict->district_id;
		$data['seized_vechicles'] = custom_query($this->select_col . " ,tbl_fsl_report.letterno as fslletter
                ,tbl_fsl_report.fslno,tbl_fsl_report.seized_category as categories,tbl_vehicle_formb.form_bno,time as fsltime,
                date as fsldate,fslcheckin,fslclearnotclear  "
			. $this->query3 . " JOIN `tbl_fsl_report`
                                ON `tbl_fsl_report`.`vechicle_id`=`tbl_vehicle`.`vechileid`
                                JOIN `tbl_vehicle_formb`
                                ON `tbl_vehicle_formb`.`vechicle_id`=`tbl_vehicle`.`vechileid`
                        " . $this->query7 . $comma_separated3 . $this->query4 . " and fslcheckout=1 group by vechileid " . $this->query5, "result");
		$data['seize_category'] = custom_query("SELECT * FROM
                  tbl_vehicle_seized_categories", "result");
		echo Modules::run("Template/main", $data);
	}

	function send_to_eto_for_confiscation() {
		if (isset($_FILES['userfile'])) {
			$document = explode('.', $_FILES['userfile']['name']);
			$new_name = rand() . '.' . $document[1];
			// $destination = 'vendor_images'.$new_name;
			move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/' . $new_name);
		}
		$data = array(
			"vechicle_id" => $this->input->post("vechicle_id"),
			"sendtoetotime" => $this->input->post("time"),
			"sendtoetodescription " => $this->input->post("description"),
			"sendtoetodate" => $this->input->post("date"),
			"upload" => $new_name,

		);

		if (insert_data("tbl_sendtoeto", $data)) {
			$status_data = array(
				"vehicle_id" => $this->input->post("vechicle_id"),
				"status_id" => 14,
				"user_id" => $this->session->userdata("user_id"),
			);
			insert_data("tbl_vehicle_status", $status_data);

		}
	}
	function warehouse_mra_parked() {
		echo Modules::run("Auth/check_login", "warehouse_mra_parked");
		$data['module'] = "Vehicles";
		$data['file'] = "warehouseviews/warehouse_mra_vehicle_parked";
		$data['name'] = "";
		$results = custom_query("SELECT vehicle_id FROM tbl_vehicle_status
          join tbl_vehicle on tbl_vehicle.vechileid = tbl_vehicle_status.vehicle_id
        WHERE vehicle_id NOT IN (
            SELECT vehicle_id FROM tbl_vehicle_status where status_id =9 or status_id = 10 or status_id =20)
            and vehicle_id IN
          ( SELECT vehicle_id FROM tbl_vehicle_status where
               status_id = 14 or status_id = 4 ) or parking = 1  group by vehicle_id
              ", "array");
		$ary = array_column($results, "vehicle_id");

		$comma_separated = implode(",", $ary);
		if (empty($comma_separated)) {
			$comma_separated = 0;
		}
		$this->general_query_function();
		$data['seized_vechicles'] = custom_query($this->select_col . " ,tbl_vehicle_formb.form_bno " . $this->query3 . "
                                JOIN `tbl_vehicle_formb`
                                ON `tbl_vehicle_formb`.`vechicle_id`=`tbl_vehicle`.`vechileid`

                                where vechileid IN ($comma_separated) ", "result");
		echo Modules::run("Template/main", $data);
	}

	function warehouse_available_list() {

		$userdistrict = 1;
		$this->load->model("Mdl_vehicles");
		$fetch_data = $this->Mdl_vehicles->make_datatables_warehouse();
		$data = array();
		foreach ($fetch_data as $key => $row) {
			$sub_array = array();

			$sub_array[] = $row->siezeddate;
			$sub_array[] = $row->formserialno;
			$sub_array[] = $row->form_bno;
			$sub_array[] = $row->makename;
			$sub_array[] = $row->submakename;
			$sub_array[] = $row->vechileregistrationno;
			$sub_array[] = $row->colorname;
			if ($row->clearnotclearstatus != 0) {$detail_fun = "complete_confication_mra_report/";} else {
				$detail_fun = "fsl_report_dispatched_details/";
			}
			$sub_array[] = '<a href="' . $detail_fun . $row->vechileid . '"

                    class="btn bg-indigo waves-effect">View Details</a>';

			$data[] = $sub_array;
		}
		$output = array(
			"draw" => intval($_POST["draw"]),
			"recordsTotal" => $this->Mdl_vehicles->get_all_data_warehouse(),
			"recordsFiltered" => $this->Mdl_vehicles->get_filtered_data_warehouse(),
			"data" => $data,
		);
		echo json_encode($output);
	}
	function warehouse_vehicles() {
		echo Modules::run("Auth/check_login", "warehouse_vehicles");
		$data['module'] = "Vehicles";
		$data['file'] = "warehouseviews/warehouse_confiscated_parked";
		$data['name'] = "";
		echo Modules::run("Template/main", $data);
	}
	function warehouse_handover_list() {

		$this->load->model("Mdl_vehicles");
		$fetch_data = $this->Mdl_vehicles->make_datatables_warehouse_handover();
		$data = array();
		foreach ($fetch_data as $row) {
			$sub_array = array();
			if (!empty($row->individualid)) {
				$sub_array[] = $row->individualauthorized;
				$sub_array[] = $row->formserialno;

				$sub_array[] = $row->makename;
				$sub_array[] = $row->submakename;
				$sub_array[] = $row->vechileregistrationno;

				$sub_array[] = '<a href="complete_allot_warehouse_details/' . $row->vechileid . '"

                    class="btn bg-indigo waves-effect">View Details</a>';
				$sub_array[] = '<a href="javascript:void(0);"
                "
                    class="btn bg-green waves-effect" id="handover2" custom="' . $row->vechileid . '"
          onclick="clicked(this);">Handover
                    </a>';

			} else {
				$sub_array[] = $row->authorisedby;
				$sub_array[] = $row->formserialno;

				$sub_array[] = $row->makename;
				$sub_array[] = $row->submakename;
				$sub_array[] = $row->vechileregistrationno;

				$sub_array[] = '<a href="complete_allot_warehouse_details/' . $row->vechileid . '"

                    class="btn bg-indigo waves-effect">View Details</a>';
				$sub_array[] = '<a href="javascript:void(0);"
                "
                    class="btn bg-green waves-effect" id="handover1" custom="' . $row->vechileid . '"
          onclick="clicked(this);">Handover
                    </a>';
			}

			$data[] = $sub_array;
		}
		$output = array(
			"draw" => intval($_POST["draw"]),
			"recordsTotal" => $this->Mdl_vehicles->get_all_data_warehouse_handover(),
			"recordsFiltered" => $this->Mdl_vehicles->get_filtered_data_warehouse_handover(),
			"data" => $data,
		);
		echo json_encode($output);
	}
	function vehicle_handover() {
		echo Modules::run("Auth/check_login", "vehicle_handover");
		$data['module'] = "Vehicles";
		$data['file'] = "warehouseviews/handover_vehicle";
		$data['name'] = "";

		echo Modules::run("Template/main", $data);
	}

	function vehicle_handover_form() {
		if (isset($_FILES['userfile'])) {
			$document = explode('.', $_FILES['userfile']['name']);
			$new_name = rand() . '.' . $document[1];
			// $destination = 'vendor_images'.$new_name;
			move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/' . $new_name);
		}
		$data = array(
			" receivercnic" => $this->input->post("cnicnumber"),
			"receivername" => $this->input->post("receiver_name"),
			"mobilenumber" => $this->input->post("mobilenumber"),
			"vehicle_id" => $this->input->post("vechicle_id"),
			"designation" => $this->input->post("designation"),
			"authorizedby" => $this->input->post("authorisedby"),
			"description" => $this->input->post("description"),
			" upload" => $new_name,
		);
		if (insert_data("tbl_warehouse_handover", $data)) {
			$status_data = array(
				"vehicle_id" => $this->input->post("vechicle_id"),
				"status_id" => 17,
				"user_id" => $this->session->userdata("user_id"),
			);
			insert_data("tbl_vehicle_status", $status_data);
			update_where("tbl_vehicle", array("handoverstatus" => 2),
				array("vechileid" => $this->input->post("vechicle_id")));
		}

	}

	function warehouse_receive_vehicle_list() {
		$this->load->model("Mdl_vehicles");
		$fetch_data = $this->Mdl_vehicles->make_datatables_warehouse_receive_handover();
		$data = array();
		foreach ($fetch_data as $row) {
			$sub_array = array();
			if (!empty($row->individualid)) {
				$sub_array[] = $row->individualauthorized;
				$sub_array[] = $row->formserialno;

				$sub_array[] = $row->makename;
				$sub_array[] = $row->submakename;
				$sub_array[] = $row->vechileregistrationno;

				$sub_array[] = '<a href="complete_allot_warehouse_details/' . $row->vechileid . '"

                    class="btn bg-indigo waves-effect">View Details</a>';

				$sub_array[] = '<a href="javascript:void(0);"
                "
                    class="btn bg-green waves-effect" id="handover2"
                    custom="' . $row->vechileid . '" onclick="clicked(this);">Receive
                    </a>';
			} else {
				$sub_array[] = $row->authorisedby;
				$sub_array[] = $row->formserialno;

				$sub_array[] = $row->makename;
				$sub_array[] = $row->submakename;
				$sub_array[] = $row->vechileregistrationno;

				$sub_array[] = '<a href="complete_allot_warehouse_details/' . $row->vechileid . '"

                    class="btn bg-indigo waves-effect">View Details</a>';
				$sub_array[] = '<a href="javascript:void(0);"
                "
                    class="btn bg-green waves-effect" id="handover1" custom="' . $row->vechileid . '"
          onclick="clicked(this);">Receive
                    </a>';
			}

			$data[] = $sub_array;
		}
		$output = array(
			"draw" => intval($_POST["draw"]),
			"recordsTotal" => $this->Mdl_vehicles->get_all_data_warehouse_receive_handover(),
			"recordsFiltered" => $this->Mdl_vehicles->get_filtered_data_warehouse_receive_handover(),
			"data" => $data,
		);
		echo json_encode($output);

	}
	function warehouse_receive_vehicle() {
		echo Modules::run("Auth/check_login", "warehouse_receive_vehicle");
		$data['module'] = "Vehicles";
		$data['file'] = "warehouseviews/receive_vehicle";
		$data['name'] = "";

		echo Modules::run("Template/main", $data);
	}
	function warehouse_receive_form() {

		if (isset($_FILES['userfile'])) {
			$document = explode('.', $_FILES['userfile']['name']);
			$new_name = rand() . '.' . $document[1];
			// $destination = 'vendor_images'.$new_name;
			move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/' . $new_name);
		}
		$data = array(
			"receivercnic" => $this->input->post("cnicnumber"),
			"receivername" => $this->input->post("receiver_name"),
			"mobilenumber" => $this->input->post("mobilenumber"),
			"vehicle_id" => $this->input->post("vechicle_id"),
			"designation" => $this->input->post("designation"),
			"authorizedby" => $this->input->post("authorisedby"),
			"description" => $this->input->post("description"),
			"letterno" => $this->input->post("letterno"),
			"warehousereceive" => 1,
			"upload" => $new_name,
		);
		if (insert_data("tbl_receive_vehicle", $data)) {

			$status_data = array(
				"vehicle_id" => $this->input->post("vechicle_id"),
				"status_id" => 19,
				"user_id" => $this->session->userdata("user_id"),
			);
			insert_data("tbl_vehicle_status", $status_data);
			update_where("tbl_vehicle", array("receivestatus" => 0, "allotstatus" => 0,
				"handoverstatus" => 0),
				array("vechileid" => $this->input->post("vechicle_id")));

		}
	}
	function release_vehicle_handover_list() {
		$this->load->model("Mdl_vehicles");
		$fetch_data = $this->Mdl_vehicles->make_datatables_release_warehouse();
		$data = array();
		foreach ($fetch_data as $row) {
			$sub_array = array();

			$sub_array[] = $row->formserialno;
			$sub_array[] = $row->form_bno;

			$sub_array[] = $row->makename;
			$sub_array[] = $row->submakename;
			$sub_array[] = $row->vechileregistrationno;
			$sub_array[] = $row->colorname;
			if ($row->clearnotclearstatus != 0) {$detail_fun = "complete_confication_mra_report/";} else {
				$detail_fun = "fsl_report_dispatched_details/";
			}

			$sub_array[] = '<a href="' . $detail_fun . $row->vechileid . '"
                    class="btn bg-indigo waves-effect">View Details</a>';

			$sub_array[] = '<a href="javascript:void(0);"
                "
                    class="btn bg-green waves-effect" id="release_handover"
                    custom="' . $row->vechileid . '" onclick="clicked(this);">Release
                    </a>';

			$data[] = $sub_array;
		}
		$output = array(
			"draw" => intval($_POST["draw"]),
			"recordsTotal" => $this->Mdl_vehicles->get_all_data_release_warehouse(),
			"recordsFiltered" => $this->Mdl_vehicles->get_filtered_data_release_warehouse(),
			"data" => $data,
		);
		echo json_encode($output);
	}
	function release_vehicle_handover() {
		echo Modules::run("Auth/check_login", "release_vehicle_handover");
		$data['module'] = "Vehicles";
		$data['file'] = "warehouseviews/release_vehicles";
		$data['name'] = "";

		echo Modules::run("Template/main", $data);

	}
	function release_form() {

		if (isset($_FILES['userfile'])) {
			$document = explode('.', $_FILES['userfile']['name']);
			$new_name = rand() . '.' . $document[1];
			// $destination = 'vendor_images'.$new_name;
			move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/' . $new_name);
		}
		$data = array(
			"letterno" => $this->input->post("letterno"),
			"vehicle_id" => $this->input->post("vechicle_id1"),
			"releasedate" => $this->input->post("time"),
			"receivername" => $this->input->post("receivername"),
			"receivercnic" => $this->input->post("receivercnic"),
			"receivermobileno" => $this->input->post("receivermobileno"),
			"description" => $this->input->post("description"),
			"releasetime" => $this->input->post("date"),
			" upload" => $new_name,
			"warehouserelease" => 1,
		);

		if (insert_data("tbl_released_vehicle", $data)) {
			$status_data = array(
				"vehicle_id" => $this->input->post("vechicle_id1"),
				"status_id" => 20,
				"user_id" => $this->session->userdata("user_id"),
			);
			insert_data("tbl_vehicle_status", $status_data);

			update_where("tbl_vehicle", array("releasedhandover" => 1),
				array("vechileid" => $this->input->post("vechicle_id1")));
		}
	}

	function fsl_vehicles_histroy_list() {
		$this->load->model("Mdl_vehicles");

		$fetch_data = $this->Mdl_vehicles->make_datatables_warehouse_fsl();
		$data = array();
		foreach ($fetch_data as $row) {
			$sub_array = array();

			$sub_array[] = $row->siezeddate;
			$sub_array[] = $row->formserialno;
			$sub_array[] = $row->form_bno;
			$sub_array[] = $row->makename;
			$sub_array[] = $row->submakename;
			$sub_array[] = $row->vechileregistrationno;
			$sub_array[] = $row->colorname;
			$sub_array[] = '<a href="fsl_report_dispatched_details/' . $row->vechileid . '"
                    class="btn bg-indigo waves-effect">View Details</a>';
			$data[] = $sub_array;
		}
		$output = array(
			"draw" => intval($_POST["draw"]),

			"recordsTotal" => $this->Mdl_vehicles->get_all_data_warehouse_fsl(),
			"recordsFiltered" => $this->Mdl_vehicles->get_filtered_warehouse_fsl(),
			"data" => $data,
		);
		echo json_encode($output);
	}
	function fsl_vehicles_reports_histroy() {
		echo Modules::run("Auth/check_login", "fsl_vehicles_reports_histroy");
		$data['module'] = "Vehicles";
		$data['file'] = "warehouseviews/history/fsl_vehicle_reports_history";
		$data['name'] = "";
		echo Modules::run("Template/main", $data);

	}
	function warehouse_checkedin_vehicles_history_list() {
		$this->load->model("Mdl_vehicles");

		$fetch_data = $this->Mdl_vehicles->make_datatables_warehouse_checkin();
		$data = array();
		foreach ($fetch_data as $row) {
			$sub_array = array();

			$sub_array[] = $row->siezeddate;
			$sub_array[] = $row->formserialno;
			$sub_array[] = $row->form_bno;
			$sub_array[] = $row->makename;
			$sub_array[] = $row->submakename;
			$sub_array[] = $row->vechileregistrationno;
			$sub_array[] = $row->colorname;
			$sub_array[] = '<a href="fsl_report_dispatched_details/' . $row->vechileid . '"
                    class="btn bg-indigo waves-effect">View Details</a>';
			$data[] = $sub_array;
		}
		$output = array(
			"draw" => intval($_POST["draw"]),

			"recordsTotal" => $this->Mdl_vehicles->get_all_data_warehouse_checkin(),
			"recordsFiltered" => $this->Mdl_vehicles->get_filtered_warehouse_checkin(),
			"data" => $data,
		);
		echo json_encode($output);
	}
	function warehouse_checkedin_vehicles_history() {
		echo Modules::run("Auth/check_login", "warehouse_checkedin_vehicles_history");
		$data['module'] = "Vehicles";
		$data['file'] = "warehouseviews/history/warehouse_checkedin_vehicles_history";
		$data['name'] = "";
		echo Modules::run("Template/main", $data);
	}

	function handover_vehicles_history_list() {
		$this->load->model("Mdl_vehicles");

		$fetch_data = $this->Mdl_vehicles->make_datatables_warehouse_handover_history();
		$data = array();
		foreach ($fetch_data as $row) {
			$sub_array = array();

			$sub_array[] = $row->siezeddate;
			$sub_array[] = $row->formserialno;
			$sub_array[] = $row->form_bno;
			$sub_array[] = $row->makename;
			$sub_array[] = $row->submakename;
			$sub_array[] = $row->vechileregistrationno;
			$sub_array[] = $row->colorname;
			$sub_array[] = '<a href="complete_allot_warehouse_details/' . $row->vechileid . '"

                    class="btn bg-indigo waves-effect">View Details</a>';
			$data[] = $sub_array;
		}
		$output = array(
			"draw" => intval($_POST["draw"]),

			"recordsTotal" => $this->Mdl_vehicles->get_all_data_warehouse_handover_history(),
			"recordsFiltered" => $this->Mdl_vehicles->get_filtered_warehouse_handover_history(),
			"data" => $data,
		);
		echo json_encode($output);
	}
	function handover_vehicles_history() {
		echo Modules::run("Auth/check_login", "handover_vehicles_history");
		$data['module'] = "Vehicles";
		$data['file'] = "warehouseviews/history/handover_history";
		$data['name'] = "";
		echo Modules::run("Template/main", $data);
	}

	function complete_allot_warehouse_details($id) {
		$data['module'] = "Vehicles";
		$data['file'] = "warehouseviews/complete_allot_warehouse_details";
		$data['name'] = "";
		$data['all_vechicle_specific'] = custom_query("SELECT mobilesquadno,username,districtname,seizedtype
             ,siezeddate,siezedtime,formserialno,seizedlocationlat,drivername
    ,seizedlocationlong,chasisno,engineno,vechileregistrationno,makename
     ,submakename,modelyear,vehicletype,drivercnicno
    ,drivermobileno,driveraddress,
    vechileownername,vechileownercnic,vechileownermobileno,registrationdistrictname,
    bodybuildname,colorname,transmission,assembely,wheelnumber,enginetype,
    vehicleengine_capcaity,mileage,vechicledescription,
    tbl_vehicle_formb.`description`, `formbdate`, `formbtime`,`form_bno`,individualallot,departmentallot
     FROM `tbl_vehicle`
             LEFT JOIN tbl_district on tbl_district.districtid = tbl_vehicle.district_id
            LEFT JOIN tbl_vehicle_model on tbl_vehicle_model.makeid=tbl_vehicle.vehicle_make
             LEFT JOIN tbl_vehicle_model_sub on tbl_vehicle_model_sub.submakeid=tbl_vehicle.vehicle_model
             LEFT JOIN tbl_vehicle_modelyear on tbl_vehicle_modelyear.modelid = tbl_vehicle.vechiclemodelyear
             LEFT JOIN tbl_bodybuild on tbl_bodybuild.bodybuild = tbl_vehicle.build_id
             LEFT JOIN tbl_vehicle_formb on tbl_vehicle_formb.vechicle_id = tbl_vehicle.vechileid
             LEFT JOIN tbl_wheels on tbl_wheels.wheelid = tbl_vehicle.vechilewheels
            LEFT JOIN tbl_district_registration on tbl_district_registration.registrationdistrictid = tbl_vehicle.registration_id
             LEFT JOIN tbl_color on tbl_color.colorid = tbl_vehicle.color_id
             LEFT JOIN tbl_vehicle_seized_categories on tbl_vehicle_seized_categories.siezedid = tbl_vehicle.vehicleseize_category
             LEFT JOIN tbl_user on tbl_user.userid=tbl_vehicle.user_id where vechileid ={$id} ", "result");

		$data['all_vechicle_images'] = custom_query("SELECT * FROM `tbl_vehicle_images`
              where vechile_id ={$id}", "result");
		$data['formb_accessories'] = custom_query("SELECT *
                FROM `tbl_accesories` join tbl_formb_accessories on
                tbl_formb_accessories.formb_accessoryid=tbl_accesories.accessoryid
                where tbl_formb_accessories.vechicle_id ={$id}", "result");
		$data['all_vechicle_accesories'] = custom_query("SELECT * FROM `tbl_accesories` join tbl_vehicle_accessories on
                tbl_vehicle_accessories.accessories_id=tbl_accesories.accessoryid
                where tbl_vehicle_accessories.vehicle_id ={$id}", "result");
		$data['warehouse_images'] = custom_query("SELECT * FROM `tbl_warehouse_images`
              where vechicle_id ={$id}", "result");
		$data['individual_allot'] = custom_query("SELECT * FROM `tbl_vehicle_allotment`

              where vechicle_id ={$id} order by vechicle_id DESC", "result");
		$data['department_allot'] = custom_query("SELECT * FROM `tbl_vehicle_allotment`

              where vechicle_id ={$id} order by allotmentid DESC", "result");
		$data['individual_allot'] = custom_query("SELECT * FROM `tbl_individual_allot`
                        where vechicle_id ={$id} order by allotmentid DESC", "result");

		echo Modules::run("Template/main", $data);

	}

	/*
		    |--------------------------------------------------------------------------
		    |Warehouse FUNTIONALITIES ENDS
		    |--------------------------------------------------------------------------
	*/

	/*
		    |--------------------------------------------------------------------------
		    |DG FUNTIONALITIES Starts
		    |--------------------------------------------------------------------------
	*/

	function Dg_allotment_list() {

		$this->load->model("Mdl_vehicles");
		$fetch_data = $this->Mdl_vehicles->make_datatables_DG();
		$data = array();
		foreach ($fetch_data as $key => $row) {
			$sub_array = array();

			$sub_array[] = $key;
			$sub_array[] = $row->siezeddate;
			$sub_array[] = $row->formserialno;
			$sub_array[] = $row->form_bno;
			$sub_array[] = $row->makename;
			$sub_array[] = $row->submakename;
			$sub_array[] = $row->vechileregistrationno;
			$sub_array[] = $row->colorname;
			if ($row->clearnotclearstatus != 0) {$detail_fun = "complete_confication_mra_report/";} else {
				$detail_fun = "fsl_report_dispatched_details/";
			}
			$sub_array[] = '<a href="' . $detail_fun . $row->vechileid . '"
                     class="btn bg-indigo waves-effect">View Details</a>';
			$sub_array[] = '<a href="javascript:void(0);"  class=" btn bg-green  waves-effect waves-block" custom="' . $row->vechileid . '"  id="allotment" onclick="clicked(this);">Allot</a>';
			$data[] = $sub_array;
		}
		$output = array(
			"draw" => intval($_POST["draw"]),
			"recordsTotal" => $this->Mdl_vehicles->get_all_data_DG(),
			"recordsFiltered" => $this->Mdl_vehicles->get_filtered_data_DG(),
			"data" => $data,
		);
		echo json_encode($output);
	}

	function warehouse_allot_vechicle() {
		//echo Modules::run("Auth/check_login","warehouse_allot_vechicle");
		$data['module'] = "Vehicles";
		$data['file'] = "Dgviews/allotment_vehicles";
		$data['name'] = "";
		echo Modules::run("Template/main", $data);
	}

	function Dg_allotment_vehicle() {
		if (isset($_FILES['userfile'])) {
			$document = explode('.', $_FILES['userfile']['name']);
			$new_name = rand() . '.' . $document[1];
			// $destination = 'vendor_images'.$new_name;
			move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/' . $new_name);
		}
		$data = array(
			"departmentname" => $this->input->post("departmentname"),
			"vechicle_id" => $this->input->post("vechicle_id"),
			"designation" => $this->input->post("designation"),
			"authorisedby" => $this->input->post("authorisedby"),
			"description" => $this->input->post("description"),
			" upload" => $new_name,
		);
		if (insert_data("tbl_vehicle_allotment", $data)) {

			$status_data = array(
				"vehicle_id" => $this->input->post("vechicle_id"),
				"status_id" => 15,
				"user_id" => $this->session->userdata("user_id"),
			);
			insert_data("tbl_vehicle_status", $status_data);
			update_where("tbl_vehicle", array("handoverstatus" => 1, "allotstatus" => 1, "departmentallot" => 1,
				"individualallot" => 0,
			),
				array("vechileid" => $this->input->post("vechicle_id")));

		}

	}
	function individualallotment() {
		//echo Modules::run("Auth/check_login","allot_vechicle_form");
		if (isset($_FILES['userfile'])) {
			$document = explode('.', $_FILES['userfile']['name']);
			$new_name = rand() . '.' . $document[1];
			// $destination = 'vendor_images'.$new_name;
			move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/' . $new_name);
		}
		$data = array(
			"receivercnic" => $this->input->post("cnicnumber"),
			"receivername" => $this->input->post("receiver_name"),
			"mobilenumber" => $this->input->post("mobilenumber"),
			"departmentname" => $this->input->post("departmentname"),
			"vechicle_id" => $this->input->post("vechicle_id1"),
			"designation" => $this->input->post("designation"),
			"authorizedby" => $this->input->post("authorisedby"),
			"description" => $this->input->post("description"),
			" upload" => $new_name,
		);
		if (insert_data("tbl_individual_allot", $data)) {
			$status_data = array(
				"vehicle_id" => $this->input->post("vechicle_id1"),
				"status_id" => 15,
				"user_id" => $this->session->userdata("user_id"),
			);
			insert_data("tbl_vehicle_status", $status_data);
			update_where("tbl_vehicle", array("handoverstatus" => 1, "allotstatus" => 1,
				"individualallot" => 1,
				"departmentallot" => 0,
			),
				array("vechileid" => $this->input->post("vechicle_id1")));
		}
	}

	function Dg_alloted_list() {

		$this->load->model("Mdl_vehicles");
		$fetch_data = $this->Mdl_vehicles->make_datatables_receive_DG();
		$data = array();
		foreach ($fetch_data as $key => $row) {
			$sub_array = array();

			$sub_array[] = $key;
			$sub_array[] = $row->siezeddate;
			$sub_array[] = $row->formserialno;
			$sub_array[] = $row->form_bno;
			$sub_array[] = $row->makename;
			$sub_array[] = $row->submakename;
			$sub_array[] = $row->vechileregistrationno;
			$sub_array[] = $row->colorname;
			$sub_array[] = '<a href="complete_allot_dg_details/' . $row->vechileid . '"
                     class="btn bg-indigo waves-effect">
                    View Details</a>';
			$sub_array[] = '<a href="javascript:void(0);"  class=" btn bg-green
                    waves-effect waves-block" custom="' . $row->vechileid . '"  id="allotment" onclick="clicked(this);">Receive</a>';
			$data[] = $sub_array;
		}
		$output = array(
			"draw" => intval($_POST["draw"]),
			"recordsTotal" => $this->Mdl_vehicles->get_all_data_receive_DG(),
			"recordsFiltered" => $this->Mdl_vehicles->get_filtered_data_receive_DG(),
			"data" => $data,
		);
		echo json_encode($output);
	}
	function alloted_vehicles() {
		echo Modules::run("Auth/check_login", "alloted_vehicles");
		$data['module'] = "Vehicles";
		$data['file'] = "Dgviews/alloted_vehicles";
		$data['name'] = "";
		echo Modules::run("Template/main", $data);

	}
	function receive_form() {
		if (isset($_FILES['userfile'])) {
			$document = explode('.', $_FILES['userfile']['name']);
			$new_name = rand() . '.' . $document[1];
			// $destination = 'vendor_images'.$new_name;
			move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/' . $new_name);
		}
		$data = array(
			"receivercnic" => $this->input->post("cnicnumber"),
			"receivername" => $this->input->post("receiver_name"),
			"mobilenumber" => $this->input->post("mobilenumber"),
			"vehicle_id" => $this->input->post("vechicle_id"),
			"designation" => $this->input->post("designation"),
			"authorizedby" => $this->input->post("authorisedby"),
			"description" => $this->input->post("description"),
			"letterno" => $this->input->post("letterno"),
			"dgreceive" => 1,
			"upload" => $new_name,
		);
		if (insert_data("tbl_receive_vehicle", $data)) {

			$status_data = array(
				"vehicle_id" => $this->input->post("vechicle_id"),
				"status_id" => 18,
				"user_id" => $this->session->userdata("user_id"),
			);
			insert_data("tbl_vehicle_status", $status_data);
			update_where("tbl_vehicle", array("receivestatus" => 1),
				array("vechileid" => $this->input->post("vechicle_id")));

		}

	}
	function complete_allot_dg_details($id) {
		$data['module'] = "Vehicles";
		$data['file'] = "Dgviews/complete_allot_dg_details";
		$data['name'] = "";
		$data['all_vechicle_specific'] = custom_query("SELECT mobilesquadno,username,districtname,seizedtype
             ,siezeddate,siezedtime,formserialno,seizedlocationlat,drivername
    ,seizedlocationlong,chasisno,engineno,vechileregistrationno,makename
     ,submakename,modelyear,vehicletype,drivercnicno
    ,drivermobileno,driveraddress,registrationdistrictname,
    vechileownername,vechileownercnic,vechileownermobileno
    bodybuildname,colorname,transmission,assembely,wheelnumber,enginetype,
    vehicleengine_capcaity,mileage,vechicledescription,
    tbl_vehicle_formb.`description`, `formbdate`, `formbtime`,`form_bno`,individualallot,departmentallot
     FROM `tbl_vehicle`
             LEFT JOIN tbl_district on tbl_district.districtid = tbl_vehicle.district_id
            LEFT JOIN tbl_vehicle_model on tbl_vehicle_model.makeid=tbl_vehicle.vehicle_make
             LEFT JOIN tbl_vehicle_model_sub on tbl_vehicle_model_sub.submakeid=tbl_vehicle.vehicle_model
             LEFT JOIN tbl_vehicle_modelyear on tbl_vehicle_modelyear.modelid = tbl_vehicle.vechiclemodelyear
             LEFT JOIN tbl_bodybuild on tbl_bodybuild.bodybuild = tbl_vehicle.build_id
             LEFT JOIN tbl_vehicle_formb on tbl_vehicle_formb.vechicle_id = tbl_vehicle.vechileid
             LEFT JOIN tbl_wheels on tbl_wheels.wheelid = tbl_vehicle.vechilewheels
LEFT JOIN tbl_district_registration on tbl_district_registration.registrationdistrictid = tbl_vehicle.registration_id
             LEFT JOIN tbl_color on tbl_color.colorid = tbl_vehicle.color_id
             LEFT JOIN tbl_vehicle_seized_categories on tbl_vehicle_seized_categories.siezedid = tbl_vehicle.vehicleseize_category
             LEFT JOIN tbl_user on tbl_user.userid=tbl_vehicle.user_id where vechileid ={$id} ", "result");

		$data['all_vechicle_images'] = custom_query("SELECT * FROM `tbl_vehicle_images`
              where vechile_id ={$id}", "result");
		$data['formb_accessories'] = custom_query("SELECT *
                FROM `tbl_accesories` join tbl_formb_accessories on
                tbl_formb_accessories.formb_accessoryid=tbl_accesories.accessoryid
                where tbl_formb_accessories.vechicle_id ={$id}", "result");
		$data['all_vechicle_accesories'] = custom_query("SELECT * FROM `tbl_accesories` join tbl_vehicle_accessories on
                tbl_vehicle_accessories.accessories_id=tbl_accesories.accessoryid
                where tbl_vehicle_accessories.vehicle_id ={$id}", "result");
		$data['warehouse_images'] = custom_query("SELECT * FROM `tbl_warehouse_images`
              where vechicle_id ={$id}", "result");
		$data['individual_allot'] = custom_query("SELECT * FROM `tbl_vehicle_allotment`

              where vechicle_id ={$id} order by vechicle_id DESC", "result");
		$data['department_allot'] = custom_query("SELECT * FROM `tbl_vehicle_allotment`

              where vechicle_id ={$id} order by allotmentid DESC", "result");
		$data['individual_allot'] = custom_query("SELECT * FROM `tbl_individual_allot`
                        where vechicle_id ={$id} order by allotmentid DESC", "result");
		$data['handover_detail'] = custom_query("SELECT * FROM `tbl_warehouse_handover`
                        where vehicle_id ={$id} order by handoverid DESC", "result");
		echo Modules::run("Template/main", $data);

	}

	function Allot_for_auction() {

		if (isset($_FILES['userfile'])) {
			$document = explode('.', $_FILES['userfile']['name']);
			$new_name = rand() . '.' . $document[1];
			// $destination = 'vendor_images'.$new_name;
			move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/' . $new_name);
		}
		$data = array(
			"departmentname" => $this->input->post("departmentname"),
			"vechicle_id" => $this->input->post("vechicle_id2"),
			"designation" => $this->input->post("designation"),
			"authorisedby" => $this->input->post("authorisedby"),
			"description" => $this->input->post("description"),
			" upload" => $new_name,
		);
		if (insert_data("tbl_vehicle_auction", $data)) {

			$status_data = array(
				"vehicle_id" => $this->input->post("vechicle_id2"),
				"status_id" => 16,
				"user_id" => $this->session->userdata("user_id"),
			);
			insert_data("tbl_vehicle_status", $status_data);
		}
		update_where("tbl_vehicle", array("handoverstatus" => 1, "allotstatus" => 1, "departmentallot" => 1,
			"individualallot" => 0,
		),
			array("vechileid" => $this->input->post("vechicle_id2")));

	}
	function dg_pending_handover_list() {
		$this->load->model("Mdl_vehicles");
		$fetch_data = $this->Mdl_vehicles->make_datatables_handover_pending_DG();
		$data = array();
		foreach ($fetch_data as $row) {
			$sub_array = array();

			$sub_array[] = $row->siezeddate;
			$sub_array[] = $row->formserialno;
			$sub_array[] = $row->form_bno;
			$sub_array[] = $row->makename;
			$sub_array[] = $row->submakename;
			$sub_array[] = $row->vechileregistrationno;
			$sub_array[] = $row->colorname;
			$sub_array[] = '<a href="complete_allot_dg_details/' . $row->vechileid . '"
                     class="btn bg-indigo waves-effect">
                    View Details</a>';
			$sub_array[] = '<a href="print_allot_report/' . $row->vechileid . '"  class=" btn bg-green
                    waves-effect waves-block" target="_blank">Download <i class="material-icons">file_download</i></a>';
			$data[] = $sub_array;
		}
		$output = array(
			"draw" => intval($_POST["draw"]),
			"recordsTotal" => $this->Mdl_vehicles->get_all_data_handover_pending_DG(),
			"recordsFiltered" => $this->Mdl_vehicles->get_filtered_data_handover_pending_DG(),
			"data" => $data,
		);
		echo json_encode($output);
	}
	function dg_pending_handover() {

		$data['module'] = "Vehicles";
		$data['file'] = "Dgviews/dg_handover_pending";

		$data['name'] = "";
		echo Modules::run("Template/main", $data);
	}
	function print_allot_report_view($id) {

		$data['all_vechicle_specific'] = custom_query("SELECT mobilesquadno,username,districtname,seizedtype
             ,siezeddate,siezedtime,formserialno,seizedlocationlat,drivername
    ,seizedlocationlong,chasisno,engineno,vechileregistrationno,makename
     ,submakename,modelyear,vehicletype,drivercnicno
    ,drivermobileno,driveraddress,
    vechileownername,vechileownercnic,vechileownermobileno
    bodybuildname,colorname,transmission,assembely,wheelnumber,enginetype,vehicleengine_capcaity,mileage,
    vechicledescription,vehicleseize_category,
     `description`, `formbdate`, `formbtime`,`form_bno`
     FROM `tbl_vehicle`
             LEFT JOIN tbl_district on tbl_district.districtid = tbl_vehicle.district_id
            LEFT JOIN tbl_vehicle_model on tbl_vehicle_model.makeid=tbl_vehicle.vehicle_make
             LEFT JOIN tbl_vehicle_model_sub on tbl_vehicle_model_sub.submakeid=tbl_vehicle.vehicle_model
             LEFT JOIN tbl_vehicle_modelyear on tbl_vehicle_modelyear.modelid = tbl_vehicle.vechiclemodelyear
             LEFT JOIN tbl_bodybuild on tbl_bodybuild.bodybuild = tbl_vehicle.build_id
             LEFT JOIN tbl_wheels on tbl_wheels.wheelid = tbl_vehicle.vechilewheels
             LEFT JOIN tbl_vehicle_formb on tbl_vehicle_formb.vechicle_id = tbl_vehicle.vechileid

             LEFT JOIN tbl_color on tbl_color.colorid = tbl_vehicle.color_id
             LEFT JOIN tbl_vehicle_seized_categories on tbl_vehicle_seized_categories.siezedid = tbl_vehicle.vehicleseize_category
             LEFT JOIN tbl_user on tbl_user.userid=tbl_vehicle.user_id where vechileid ={$id}", "row");

		$data['fsl_checkin'] = custom_query("SELECT * FROM `tbl_fsl_report`
              where vechicle_id ={$id} and fslcheckin=1", "row");
		$data['fsl_checkout'] = custom_query("SELECT * FROM `tbl_fsl_report`
              where vechicle_id ={$id} and fslcheckout=1", "row");
		$data['mra_checkin'] = custom_query("SELECT * FROM `tbl_mra_report`
              where vehicle_id ={$id} and mracheckin=1", "row");
		$data['mra_checkout'] = custom_query("SELECT * FROM `tbl_mra_report`
              where vehicle_id ={$id} and mracheckout=1", "row");
		$data['all_vechicle_accesories'] = custom_query("SELECT *
                  FROM `tbl_accesories` join tbl_vehicle_accessories on
                tbl_vehicle_accessories.accessories_id=tbl_accesories.accessoryid
                where tbl_vehicle_accessories.vehicle_id ={$id}", "result");

		$data['formb_accessories'] = custom_query("SELECT *
                FROM `tbl_accesories` join tbl_formb_accessories on
                tbl_formb_accessories.formb_accessoryid=tbl_accesories.accessoryid
                where tbl_formb_accessories.vechicle_id ={$id}", "result");
		$data['confiscation_order'] = custom_query(
			"select * from tbl_confiscated where vechicle_id={$id}", "row");
		$data['individual_allot'] = custom_query(
			"select * from tbl_individual_allot where vechicle_id={$id} order by
          vechicle_id DESC", "row");
		$data['department_allot'] = custom_query(
			"select * from tbl_vehicle_allotment
          where vechicle_id={$id} order by
          vechicle_id DESC", "row");
		$this->load->view("Dgviews/print_report_dg", $data);
	}

	function print_allot_report() {
		$id = $this->uri->segment(3);
		//$this->load->library("html2pdf");
		try {
			$html2pdf = new Html2Pdf('P', 'A4', 'fr', true, 'UTF-8', array(0, 0, 0, 0));
			$html2pdf->pdf->SetDisplayMode('default');
			ob_start();
			$this->print_allot_report_view($id);
			$content = ob_get_clean();
			$html2pdf->writeHTML($content);
			$html2pdf->output('report.pdf'); // To see the output in browser
			//$html2pdf->output('case.pdf','D');// to download
		} catch (Html2PdfException $e) {
			$html2pdf->clean();
			$formatter = new ExceptionFormatter($e);
			echo $formatter->getHtmlMessage();

		}
	}
	function Report_list() {
		$this->load->model("Mdl_reports");

		$fetch_data = $this->Mdl_reports->make_datatables_report();

		$data = array();
		foreach ($fetch_data as $key => $row) {
			$sub_array = array();

			$sub_array[] = $key;
			$sub_array[] = $row->makename;
			$sub_array[] = $row->submakename;
			$sub_array[] = $row->vechileregistrationno;
			$sub_array[] = $row->colorname;
			$sub_array[] = $row->districtname;
			$data[] = $sub_array;

		}

		$output = array(
			"draw" => intval($_POST["draw"]),
			"recordsTotal" => $this->Mdl_reports->get_all_data_report(),
			"recordsFiltered" => $this->Mdl_reports->get_filtered_data_report(),
			"data" => $data,
		);

		echo json_encode($output);
	}
	function create_report() {
		$data['module'] = "Vehicles";
		$data['file'] = "Dgviews/create_report";

		$data['name'] = "";
		$data['total_stock'] = custom_query("select count(vehicle_id) as count
                     from tbl_vehicle
                     join tbl_vehicle_status on tbl_vehicle_status.vehicle_id
                         =tbl_vehicle.vechileid
                     where
                       status_id= 9 and allotstatus = 0 ", "row");

		$data['stock_plus1'] = custom_query("SELECT vehicle_id FROM tbl_vehicle_status WHERE vehicle_id NOT IN (
                   SELECT vehicle_id FROM tbl_vehicle_status where status_id = 9 or status_id = 20 )
                   and vehicle_id IN
                   ( SELECT vehicle_id FROM tbl_vehicle_status where
                      status_id = 11 or status_id = 10) group by vehicle_id
                     ", "num_rows");
		$data['pending_fsl'] = custom_query("SELECT vehicle_id
                      FROM tbl_vehicle_status WHERE vehicle_id NOT IN (
                    SELECT vehicle_id FROM tbl_vehicle_status where status_id = 9 or status_id = 20 )
                    and vehicle_id IN
                    ( SELECT vehicle_id FROM tbl_vehicle_status where
                       status_id = 12 ) and
                       status_id = 11 group by vehicle_id
                      ", "num_rows");
		$data['pending_mra'] = custom_query("SELECT vehicle_id
                      FROM tbl_vehicle_status WHERE vehicle_id NOT IN (
                    SELECT vehicle_id FROM tbl_vehicle_status where status_id = 9 or status_id = 20 )
                    and vehicle_id IN
                    ( SELECT vehicle_id FROM tbl_vehicle_status where
                       status_id = 4 ) and status_id = 11 group by vehicle_id
                      ", "num_rows");
		$data['handoverd'] = custom_query("SELECT vehicle_id
                      FROM tbl_vehicle_status
                      WHERE vehicle_id  IN (
                    SELECT vehicle_id FROM tbl_vehicle_status where status_id = 10 )
                    and vehicle_id NOT IN
                    ( SELECT vehicle_id FROM tbl_vehicle_status where
                       status_id = 20 )  group by vehicle_id
                      ", "num_rows");
		$data['alloted_pending_handoverd'] = custom_query("SELECT `vechileid` FROM
                      `tbl_vehicle` WHERE `allotstatus`=1 and `allotstatus` != 2
                      ", "num_rows");
		$data['ready_allotment'] = custom_query("SELECT `vechileid` FROM
                      `tbl_vehicle`
                      join tbl_vehicle_status on tbl_vehicle_status.vehicle_id = tbl_vehicle.vechileid

                    WHERE  vehicle_id  IN
                    ( SELECT vehicle_id FROM tbl_vehicle_status where
                       status_id = 9 ) and

                    `allotstatus`=0 group by vehicle_id
                      ", "num_rows");

		echo Modules::run("Template/main", $data);
	}
/*  function overall_report()
{
$data['module']="Vehicles";
$data['file']="Dgviews/overall_report_view";

$data['name'] = "";
echo Modules::run("Template/main",$data);
}
 */
	function dg_eto_report_list() {
		$this->load->model("Mdl_eto_dg_reports");

		$fetch_data = $this->Mdl_eto_dg_reports->make_datatables_eto_report();

		$data = array();
		foreach ($fetch_data as $key => $row) {
			$sub_array = array();

			$sub_array[] = $key;
			$sub_array[] = $row->makename;
			$sub_array[] = $row->submakename;
			$sub_array[] = $row->vechileregistrationno;
			$sub_array[] = $row->colorname;
			$sub_array[] = $row->districtname;

			$data[] = $sub_array;

		}

		$output = array(
			"draw" => intval($_POST["draw"]),
			"recordsTotal" => $this->Mdl_eto_dg_reports->get_all_data_eto_report(),
			"recordsFiltered" => $this->Mdl_eto_dg_reports->get_filtered_data_eto_report(),
			"data" => $data,
		);

		echo json_encode($output);
	}
	function dg_eto_report() {
		$data['module'] = "Vehicles";
		$data['file'] = "Dgviews/Eto_performance_report";
		$data['all_districts'] = custom_query("
         SELECT * FROM `tbl_district` order by districtname Asc", "result");
		$data['name'] = "";
		echo Modules::run("Template/main", $data);
	}

	function pendency_report() {
		$data['module'] = "Vehicles";
		$data['file'] = "Dgviews/pendency_report";
		$data['all_districts'] = custom_query("
         SELECT * FROM `tbl_district` order by districtname Asc", "result");
		$data['name'] = "";
		echo Modules::run("Template/main", $data);
	}
}
/*
|--------------------------------------------------------------------------
|DG FUNTIONALITIES ENDS
|--------------------------------------------------------------------------
 */

?>
