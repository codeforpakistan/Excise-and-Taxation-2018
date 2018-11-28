<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Roles extends MX_Controller {

	function roles_all() {
		if ($this->input->post()) {

		} else {
			$data['module'] = "Roles";
			$data['file'] = "show_all_roles";
			$data['name'] = "Roles";
			$data['all_roles'] = get_all("roles");
			echo Modules::run("Template/main", $data);
		}
	}

	function add_role() {
		if ($this->input->post()) {
			$data['name'] = $this->input->post("rolename");
			$last_insert_id = get_last_insert("roles", $data);
			foreach ($this->input->post("check_list") as $check_list) {
				insert_data("acl", array("role_id" => $last_insert_id, "aco_id" => $check_list));
			}
		} else {
			$data['module'] = "Roles";
			$data['file'] = "add_role";
			$data['name'] = "Add Roles";
			$data['all_menus'] = get_all("acos");
			echo Modules::run("Template/main", $data);
		}
	}
	function role_edit() {
		if ($this->input->post()) {
			$rolename = $this->input->post("rolename");
			$roleid = $this->input->post("roleid");

			update_where("roles", array("name" => $rolename), "id", $roleid);
			if (delete_where("acl", "role_id", $roleid)) {
				foreach ($this->input->post("check_list") as $check_list) {
					insert_data("acl", array("role_id" => $roleid, "aco_id" => $check_list));
				}
				$this->session->set_flashdata('success', 'Successfully Role Updated');

				return redirect("Roles/roles_all");
			}
		} else {
			$role_id = $this->uri->segment(3);
			$data['module'] = "Roles";
			$data['file'] = "edit_role";
			$data['name'] = "Edit Roles";

			$data['all_acos'] = get_all("acos");

			$data['role_name'] = get_where("roles", array("id" => $role_id), "*", "row");
			// $data['specific_acos'] =select_data_join("acos","acl","acl.aco_id=acos.id","role_id",$role_id);
			$data['specific_acos'] = get_where_both("acl", "role_id", $role_id, "object");

			echo Modules::run("Template/main", $data);
		}
	}

}

?>