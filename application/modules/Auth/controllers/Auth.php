<?php
class Auth extends MX_Controller {
	function index() {

		parent::__construct();
		$this->load->view("singin");
	}
/**
 **function to check the authantication of a user
 **@param username,password
 **get_where is a function that interacts with db its defined in helpers/db_helper.php
 **/
	function auth_check() {
		$username = Encode_html($this->input->post("username"));
		$password = Encode_html($this->input->post("password"));
		if ($this->can_login($username, Encrypt($password))) {
			$redirect_fun = get_where("tbl_dashboard", array("role_id" => $this->session->userdata("user_role")), "*", "row");
			$redirect = $redirect_fun->dasboard_controller . "/" . $redirect_fun->dashboard_function;
			redirect($redirect);
		} else {
			$this->session->set_flashdata("username", $result_ar[0]['username']);
			$this->session->set_flashdata('error', '<div class="alert bg-red alert-dismissible" role="alert">
																	<button type="button" class="close"
																	data-dismiss="alert" aria-label="Close">
																	<span aria-hidden="true">×</span></button>
																  Username Or password Wrong
															</div>');
			redirect("Auth/index");
		}
	}
/**
 **function to check the authantication of a user and saving it in sessions
 **@param username,password
 **get_where is a function that interacts with db its defined in helpers/db_helper.php
 **/
	private function can_login($username, $password) {
		$result = Authentication("tbl_user", array("username" => $username, "password" => $password));

		if ($username == $result->username && $password == $result->password && $result->isactive == 1) {
			$roles = get_where("user_roles", array("user_id" => $result->userid), "*", "row");
			$roles_name = custom_query("SELECT * FROM `user_roles` JOIN roles on roles.id=
				user_roles.role_id where user_id=
				{$result->userid}", "row");
			$district = custom_query("SELECT * FROM `tbl_user_district` where user_id=
				{$result->userid} order by udid desc", "row");

			$this->session->set_userdata("username", $username);
			$this->session->set_userdata("user_id", $result->userid);
			$this->session->set_userdata("user_role", $roles->role_id);
			$this->session->set_userdata("user_rolename", $roles_name->name);
			$this->session->set_userdata("user_district", $district->district_id);
			$this->session->set_userdata('timestamp', time());
			return true;
		} else {
			return false;
		}
	}
/**
 **function to check the login user redirects them to there dashboard this function also get a function name and check whether its
assigned to that user or not acos table and acl tables contains the menus and which menu is assigned to which role
 **@param $fun_check which is the function name passed from different modules
 **/
	function check_login($fun_check) {
		$data = select_data_join("acos", "acl", "acl.aco_id=acos.id", array("role_id" => $this->session->userdata("user_role")));
		$bol = "";
		if ($this->session->userdata("user_role") == "" || $this->session->userdata("user_id") == "") {
			redirect("Auth/index");
		} else {
			foreach ($data as $a):
				if ($fun_check === $a['method']) {
					$bol = "true";
					break;
				} else {
					$bol = "false";
				}
			endforeach;
			if ($bol === "false") {
				$redirect_fun = $this->db->where(array("role_id" => $this->session->userdata("user_role")))->get("tbl_dashboard");
				$redirect_result = $redirect_fun->row();
				$redirect = $redirect_result->dasboard_controller . "/" . $redirect_result->dashboard_function;
				$this->session->set_userdata("msg", '<div class="alert bg-green alert-dismissible" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">×</span></button>
											   You are Not Authorized to access this
											</div>');
				redirect($redirect);

			}
		}
	}
	function logout() {
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('user_role');
		$this->session->sess_destroy();
		redirect("Auth/index");
	}
	function change_pass() {
		$password = $this->input->post("oldpass");
		$new_pass = $this->input->post("newpass");
		$result = $this->db->where(array("password" => $password))->get("users");
		if ($result->num_rows() > 0) {
			$this->db->where(array("password" => $password));
			$this->db->update('tbl_users', array("password" => $new_pass));
			echo "Password Change successfully";
		} else {
			echo "Password Not Available";
		}
	}
	function general_query3($status1, $status2, $status3, $status4, $status5, $user_id) {
		$status = custom_query("SELECT A.`vehicle_id`
							FROM (SELECT `vehicle_id`,user_id FROM tbl_vehicle_status WHERE status_id =$status1  )A,
							(SELECT `vehicle_id` FROM tbl_vehicle_status WHERE status_id = $status2 )B
							WHERE A.vehicle_id = B.vehicle_id  group by A.vehicle_id  ", "array");
		$ary = array_column($status, "vehicle_id");
		$comma = implode(",", $ary);
		if (empty($comma)) {
			echo $comma = 0;
		}
		$status1 = custom_query("SELECT `vehicle_id`,status_id
							from tbl_vehicle_status
							WHERE  user_id = $user_id and status_id = $status4 or status_id = $status5  group by vehicle_id  ", "array");
		$ary1 = array_column($status1, "vehicle_id");
		$comma1 = implode(",", $ary1);
		if (empty($comma1)) {
			echo $comma1 = 0;
		}
		$results = custom_query("select count(vehicle_id) as count,user_id from
							 tbl_vehicle_status
							 where
							 vehicle_id not
							in($comma)
						and  status_id=$status3   and  vehicle_id
							in($comma1)  group by vehicle_id", "row");
		return $results;
	}
	function general_query4($status1, $status2, $status3, $status4, $status5, $user_id) {
		$status = custom_query("SELECT `vehicle_id`
							 FROM tbl_vehicle_status WHERE status_id = $status2 or
							 status_id = $status3
							  group by vehicle_id  ", "array");
		$ary = array_column($status, "vehicle_id");
		$comma = implode(",", $ary);
		if (empty($comma)) {
			echo $comma = 0;
		}
		$status1 = custom_query("SELECT `vehicle_id`,status_id
							from tbl_vehicle_status
							WHERE  user_id = $user_id and status_id = $status4 or status_id = $status5  group by vehicle_id  ", "array");
		$ary1 = array_column($status1, "vehicle_id");
		$comma1 = implode(",", $ary1);
		if (empty($comma1)) {
			echo $comma1 = 0;
		}
		$results = custom_query("select count(vehicle_id) as count,user_id from
							 tbl_vehicle_status
							 where
							 vehicle_id not
							in($comma)
						and  status_id=$status3   and  vehicle_id
							in($comma1)  group by vehicle_id", "row");
		return $results;
	}

	function general_query_v1($status1, $status2) {
		$results = custom_query("SELECT vehicle_id FROM tbl_vehicle_status WHERE vehicle_id NOT IN (
						SELECT vehicle_id FROM tbl_vehicle_status where status_id ={$status1}) and vehicle_id IN
					( SELECT vehicle_id FROM tbl_vehicle_status where
							 status_id ={$status2}) group by vehicle_id
							", "num_rows");
		return $results;
	}
	function general_query_v2($status1, $status2, $status3) {
		$status = custom_query("SELECT A.`vehicle_id`
							FROM (SELECT `vehicle_id`,user_id FROM tbl_vehicle_status WHERE status_id =$status1  )
							A,
							(SELECT `vehicle_id` FROM tbl_vehicle_status WHERE status_id = $status2 )B
							WHERE A.vehicle_id = B.vehicle_id group by A.vehicle_id", "array");
		$ary = array_column($status, "vehicle_id");
		$comma = implode(",", $ary);
		if (empty($comma)) {
			echo $comma = 0;
		}
		$results = custom_query("select count(vehicle_id) as count,user_id,vehicle_id
							 from tbl_vehicle_status where
							 vehicle_id
							in($comma)
						and status_id !=$status3 group by vehicle_id ", "row");
		return $results;
	}
	function general_query($status1, $status2, $user_id) {
		$results = custom_query("SELECT vehicle_id FROM tbl_vehicle_status WHERE vehicle_id NOT IN (
						SELECT vehicle_id FROM tbl_vehicle_status where status_id = {$status1}) and vehicle_id IN
					( SELECT vehicle_id FROM tbl_vehicle_status where
							 status_id ={$status2}) and district_id = {$user_id} group by vehicle_id
							", "num_rows");
		return $results;
	}
	function Eto_dashboard() {
		$this->check_login("Eto_dashboard");
		$data['module'] = "Auth";
		$data['file'] = "Eto_dashboard";
		$data['name'] = "";

		$district_id = $this->session->userdata("user_district");
		$data['count'] = $this->general_query("7", "4", $district_id);
		$data['wh_reports'] = $this->general_query("13", "3", $district_id);
		$data['fsl_reports'] = $this->general_query("9 " . "or status_id =10 ", "14", $district_id);
		//$this->general_query3(9,10,14,3,5,$user_id);

		$data['mra_reports'] = $this->general_query("9" . " or status_id=10 ", "7", $district_id);

		$data['mra_fsl_reports'] = $this->general_query("9" . " or status_id=10 ",
			"5" . " and status_id=7 and status_id = 14 ", $district_id);
		$data['pending_receive'] = $this->general_query(2, 1, $district_id);
		$data['pending_for_action'] = $this->general_query("3 or status_id = 4
							or status_id = 5 or status_id = 6 ", " 2 ", $district_id);
		//$this->general_query4(3,5,1,1,1,$user_id);

		echo Modules::run("Template/main", $data);
	}
	function Dg_dashboard() {
		$this->check_login("Dg_dashboard");
		$data['module'] = "Auth";
		$data['file'] = "Dg_dashboard";
		$data['name'] = "";
		$user_id = $this->session->userdata("user_id");
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
		$data['total_released'] = custom_query("select count(vehicle_id) as count,user_id
							from tbl_vehicle_status where
							  status_id=6 or status_id=20", "row");
		$data['ready_allotment'] = custom_query("select count(vechileid) as count from tbl_vehicle
									join tbl_vehicle_status on tbl_vehicle_status.vehicle_id
									=tbl_vehicle.vechileid where
							allotstatus=0 and  status_id=9 ", "row");
		$data['pending_action_eto'] = custom_query("SELECT vehicle_id
							FROM tbl_vehicle_status WHERE vehicle_id NOT IN (
						SELECT vehicle_id FROM tbl_vehicle_status where status_id = 3 or status_id=4)
						and vehicle_id IN
 ( SELECT vehicle_id FROM tbl_vehicle_status where
							status_id = 2) and NOw() > DATE_ADD( date(createdat), INTERVAL 3 DAY )group by vehicle_id
							", "num_rows");
		$data['peding_wh_for_fsl'] =
			custom_query("SELECT vehicle_id
							FROM tbl_vehicle_status WHERE vehicle_id NOT IN (
						SELECT vehicle_id FROM tbl_vehicle_status where status_id = 12 )
						and vehicle_id IN
 ( SELECT vehicle_id FROM tbl_vehicle_status where
							status_id = 3) and status_id=11 group by vehicle_id
							", "num_rows");

		$data['alloted'] = custom_query("select count(vechileid)
							as count from tbl_vehicle where
							allotstatus=1 ", "row");
		$data['eto_pending_approval'] = custom_query("SELECT vehicle_id FROM tbl_vehicle_status WHERE vehicle_id NOT IN (
						SELECT vehicle_id FROM tbl_vehicle_status where status_id = 2) and vehicle_id IN
 ( SELECT vehicle_id FROM tbl_vehicle_status where
							status_id = 1) group by vehicle_id
							", "num_rows");
		$data['pending_for_checkedin'] = custom_query("SELECT vehicle_id FROM
							tbl_vehicle_status WHERE vehicle_id NOT IN (
						SELECT vehicle_id FROM tbl_vehicle_status where status_id = 11) and vehicle_id IN
 ( SELECT vehicle_id FROM tbl_vehicle_status where
							status_id = 3 or status_id = 4 or status_id =5) group by vehicle_id
							", "num_rows");
		$data['pending_for_eto_fsl'] = custom_query("SELECT vehicle_id FROM tbl_vehicle_status
							WHERE vehicle_id NOT IN (
						  SELECT vehicle_id FROM tbl_vehicle_status where status_id = 9 or status_id = 10
						  or status_id =20 or status_id = 14
						  ) and vehicle_id IN
								( SELECT vehicle_id FROM tbl_vehicle_status where
							status_id = 13 ) group by vehicle_id
							", "num_rows");
		$data['pending_mra_response'] = custom_query("SELECT vehicle_id FROM tbl_vehicle_status
							WHERE vehicle_id NOT IN (
						SELECT vehicle_id FROM tbl_vehicle_status where status_id = 7) and vehicle_id IN
 ( SELECT vehicle_id FROM tbl_vehicle_status where
							status_id = 4 or status_id =5) group by vehicle_id
							", "num_rows");
		$data['pending_fsl_report'] = custom_query("SELECT vehicle_id FROM
							tbl_vehicle_status WHERE vehicle_id NOT IN (
						SELECT vehicle_id FROM tbl_vehicle_status where status_id = 13) and vehicle_id IN
					( SELECT vehicle_id FROM tbl_vehicle_status where
							 status_id =12) group by vehicle_id
							", "num_rows");
		$data['pending_eto_decision'] = custom_query("SELECT vehicle_id FROM tbl_vehicle_status WHERE vehicle_id NOT IN (
						SELECT vehicle_id FROM tbl_vehicle_status where status_id = 9 or status_id=10) and vehicle_id IN
					( SELECT vehicle_id FROM tbl_vehicle_status where
							 status_id =7 or status_id = 14) group by vehicle_id
							", "num_rows");
		$data['pending_handover'] = custom_query("SELECT vehicle_id FROM tbl_vehicle_status WHERE vehicle_id NOT IN (
						SELECT vehicle_id FROM tbl_vehicle_status where status_id =20 or status_id=17) and vehicle_id IN
					( SELECT vehicle_id FROM tbl_vehicle_status where
							 status_id =10 or status_id = 15) group by vehicle_id
							", "num_rows");
		echo Modules::run("Template/main", $data);
	}
	function warehouse_dashboard() {
		$this->check_login("warehouse_dashboard");
		$data['module'] = "Auth";
		$data['file'] = "warehouse_dashboard";
		$data['name'] = "";
		$user_id = $this->session->userdata("user_id");
		$data['eto_received'] = $this->general_query_v1(2, 1);
		$data['ready_allotment'] = custom_query("select count(vechileid) as count from tbl_vehicle
									join tbl_vehicle_status on tbl_vehicle_status.vehicle_id
									=tbl_vehicle.vechileid where
							allotstatus=0 and  status_id=9 ", "row");
		$data['receive_back'] = custom_query("SELECT count(vechileid) as count
				FROM tbl_vehicle WHERE receivestatus = 1
	group by vechileid", "num_rows");
		$data['pending_checkin'] = $this->general_query_v1(11, " 3 or status_id = 4 or
				status_id = 5  ");
		$fsl_pending = $this->general_query_v1(9, 4, 8);
		$mra_pending = custom_query("select count(vechileid) as count from tbl_vehicle where
							parking=1", "row");

		$total_pending = $fsl_pending->count + $mra_pending->count;
		$data['mra_reports'] = $total_pending;
		$data['fsl_reports'] = $this->general_query_v1(13, 12);
		$data['pending_fsl'] = custom_query("SELECT vehicle_id FROM tbl_vehicle_status
							join tbl_vehicle on tbl_vehicle.vechileid = tbl_vehicle_status.vehicle_id
							WHERE vehicle_id NOT IN (
						SELECT vehicle_id FROM tbl_vehicle_status where status_id =12) and vehicle_id IN
					( SELECT vehicle_id FROM tbl_vehicle_status where
							 status_id =11) and parking = 0 group by vehicle_id
							", "num_rows");
		$data['fsl_report_eto'] = custom_query("SELECT vehicle_id FROM tbl_vehicle_status
							WHERE vehicle_id NOT IN (
						SELECT vehicle_id FROM tbl_vehicle_status where status_id = 9 or status_id = 10
						  or status_id =20 or status_id=14)
						and vehicle_id IN
					( SELECT vehicle_id FROM tbl_vehicle_status where
							 status_id =13) group by vehicle_id
							", "num_rows");
		$data['Release_handover_status'] = $this->general_query_v1(20, 10);
		$data['allot_handover_status'] = custom_query("SELECT count(vechileid) as count
							FROM tbl_vehicle WHERE vechileid NOT IN (
						SELECT vechileid FROM tbl_vehicle where handoverstatus = 2 )
						and vechileid IN
						( SELECT vechileid FROM tbl_vehicle where
							  handoverstatus = 1)  group by vechileid
							", "row");

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
		$data['total_released'] = custom_query("select count(vehicle_id) as count,user_id
							from tbl_vehicle_status where
							  status_id=6 or status_id=20", "row");

		echo Modules::run("Template/main", $data);
	}
	function secretary_dashboard() {
		$data['module'] = "Auth";
		$data['file'] = "secretary_dashboard";
		$data['name'] = "";
		$user_id = $this->session->userdata("user_id");
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
		$data['total_released'] = custom_query("select count(vehicle_id) as count,user_id
							from tbl_vehicle_status where
							  status_id=6 or status_id=20", "row");
		$data['ready_allotment'] = custom_query("select count(vechileid) as count from tbl_vehicle
									join tbl_vehicle_status on tbl_vehicle_status.vehicle_id
									=tbl_vehicle.vechileid where
							allotstatus=0 and  status_id=9 ", "row");
		$data['pending_action_eto'] = custom_query("SELECT vehicle_id
							FROM tbl_vehicle_status WHERE vehicle_id NOT IN (
						SELECT vehicle_id FROM tbl_vehicle_status where status_id = 3 or status_id=4)
						and vehicle_id IN
 ( SELECT vehicle_id FROM tbl_vehicle_status where
							status_id = 2) and NOw() > DATE_ADD( date(createdat), INTERVAL 3 DAY )group by vehicle_id
							", "num_rows");
		$data['peding_wh_for_fsl'] =
			custom_query("SELECT vehicle_id
							FROM tbl_vehicle_status WHERE vehicle_id NOT IN (
						SELECT vehicle_id FROM tbl_vehicle_status where status_id = 12 )
						and vehicle_id IN
 ( SELECT vehicle_id FROM tbl_vehicle_status where
							status_id = 3) and status_id=11 group by vehicle_id
							", "num_rows");

		$data['alloted'] = custom_query("select count(vechileid)
							as count from tbl_vehicle where
							allotstatus=1 ", "row");
		$data['eto_pending_approval'] = custom_query("SELECT vehicle_id FROM tbl_vehicle_status WHERE vehicle_id NOT IN (
						SELECT vehicle_id FROM tbl_vehicle_status where status_id = 2) and vehicle_id IN
 ( SELECT vehicle_id FROM tbl_vehicle_status where
							status_id = 1) group by vehicle_id
							", "num_rows");
		$data['pending_for_checkedin'] = custom_query("SELECT vehicle_id FROM tbl_vehicle_status WHERE vehicle_id NOT IN (
						SELECT vehicle_id FROM tbl_vehicle_status where status_id = 11) and vehicle_id IN
 ( SELECT vehicle_id FROM tbl_vehicle_status where
							status_id = 3 or status_id = 4 or status_id =5) group by vehicle_id
							", "num_rows");
		$data['pending_for_eto_fsl'] = custom_query("SELECT vehicle_id FROM tbl_vehicle_status
							WHERE vehicle_id NOT IN (
						  SELECT vehicle_id FROM tbl_vehicle_status where status_id = 9 or status_id = 10
						  or status_id =20 or status_id = 14
						  ) and vehicle_id IN
								( SELECT vehicle_id FROM tbl_vehicle_status where
							status_id = 13 ) group by vehicle_id
							", "num_rows");
		$data['pending_mra_response'] = custom_query("SELECT vehicle_id FROM tbl_vehicle_status WHERE vehicle_id NOT IN (
						SELECT vehicle_id FROM tbl_vehicle_status where status_id = 7) and vehicle_id IN
 ( SELECT vehicle_id FROM tbl_vehicle_status where
							status_id = 4 or status_id =5) group by vehicle_id
							", "num_rows");
		$data['pending_fsl_report'] = custom_query("SELECT vehicle_id FROM tbl_vehicle_status WHERE vehicle_id NOT IN (
						SELECT vehicle_id FROM tbl_vehicle_status where status_id = 13) and vehicle_id IN
					( SELECT vehicle_id FROM tbl_vehicle_status where
							 status_id =12) group by vehicle_id
							", "num_rows");
		$data['pending_eto_decision'] = custom_query("SELECT vehicle_id FROM tbl_vehicle_status WHERE vehicle_id NOT IN (
						SELECT vehicle_id FROM tbl_vehicle_status where status_id = 9 or status_id=10) and vehicle_id IN
					( SELECT vehicle_id FROM tbl_vehicle_status where
							 status_id =7 or status_id = 14) group by vehicle_id
							", "num_rows");
		$data['pending_handover'] = custom_query("SELECT vehicle_id FROM tbl_vehicle_status WHERE vehicle_id NOT IN (
						SELECT vehicle_id FROM tbl_vehicle_status where status_id =20 or status_id=17) and vehicle_id IN
					( SELECT vehicle_id FROM tbl_vehicle_status where
							 status_id =10 or status_id = 15) group by vehicle_id
							", "num_rows");
		echo Modules::run("Template/main", $data);
	}
	function super_admin_dashboard() {
		$data['module'] = "Auth";
		$data['file'] = "super_admin_dashboard";
		$data['name'] = "";
		echo Modules::run("Template/main", $data);
	}

	function change_password() {
		if ($this->input->post()) {
			$user_id = $this->input->post("user_id");
			$data = array(
				"password" => Encrypt($this->input->post("password")),
			);
			update_where("tbl_user", $data, array("userid" => $user_id));
			$redirect_fun = $this->db->where(array("role_id" => $this->session->userdata("user_role")))->get("tbl_dashboard");
			$redirect_result = $redirect_fun->row();
			$redirect = $redirect_result->dasboard_controller . "/" . $redirect_result->dashboard_function;
			$this->session->set_userdata("msg", '<div class="alert bg-green alert-dismissible" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">×</span></button>
											   Password updated succesfully
											</div>');
			return redirect($redirect);
		} else {
			$data['module'] = 'Auth';
			$data['file'] = 'change_pass';
			echo Modules::run("Template/main", $data);
		}

	}

}
?>
