<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends MX_Controller {

	function main($data) {
		$data['result'] = select_data_join_order("acos", "acl", "acl.aco_id=acos.id", array("role_id" => $this->session->userdata("user_role")), "sort_order", "Desc");
		$data['parent_menu'] = get_all("tbl_parent_menu");
		$this->load->view("main", $data);
	}

}
