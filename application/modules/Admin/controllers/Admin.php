<?php
class Admin extends MX_Controller {

	function __construct() {
		parent::__construct();
	}
	function user_districts() {
		echo Modules::run("Auth/check_login", "user_districts");
		$this->load->model("Admin_model");
		if ($this->input->post()) {
			$data = array("districtname" => $this->input->post("name"),
			);
			if ($this->Admin_model->InsertData("tbl_district", $data)) {
				$this->session->set_flashdata('success', 'Successfully Added District');
				return redirect("Admin/user_districts");
			}
		} else {
			$data['module'] = "Admin";
			$data['file'] = "user_districts";
			$this->load->model("Admin_model");
			$data['all_districts'] = $this->Admin_model->getAllData("tbl_district");
			echo Modules::run("Template/main", $data);

		}
	}
	function add_districts() {
		$data['module'] = "Admin";
		$data['file'] = "add_user_district";
		$this->load->model("Admin_model");
		echo Modules::run("Template/main", $data);
	}
	function delete_district() {
		$this->load->model("Admin_model");
		if ($this->Admin_model->DeleteDB("tbl_district", array("districtid" => $this->uri->segment(3)))) {
			$this->session->set_flashdata('success', 'Successfully Deleted District');
			return redirect("Admin/user_districts");
		}

	}
	function edit_district() {
		$this->load->model("Admin_model");
		if ($this->input->post()) {
			$data = array("districtname" => $this->input->post("name"));
			if ($this->Admin_model->UpdateDB("tbl_district", array(
				"districtid" => $this->input->post("district_id")), $data)) {
				$this->session->set_flashdata('success', 'Successfully Updated District');
				return redirect("Admin/user_districts");
			}
		} else {
			$data['module'] = "Admin";
			$data['file'] = "edit_districts";

			$data['single_district'] = $this->Admin_model->getrow("tbl_district", '', array("districtid" => $this->uri->segment(3)));
			echo Modules::run("Template/main", $data);

		}
	}

}

?>