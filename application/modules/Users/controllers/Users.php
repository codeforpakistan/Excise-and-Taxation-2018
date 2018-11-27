<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MX_Controller {

	function show_users($id = 0) {

		$data['module'] = "Users";
		$data['file'] = "show_all_users";
		$data['name'] = "All Users";
		if ($id != 0) {
			$offset = $this->uri->segment(3, 0);
		} else {
			$offset = $id;
		}
		$per_page = 10;
		$function_name = __FUNCTION__;

		$number_of_rows = custom_query("select * from tbl_user
   	 	join user_roles on user_roles.user_id = tbl_user.userid
   	 	join roles on  roles.id = user_roles.role_id ", "num_rows");

		$data['all_users'] = custom_query("select * from tbl_user
   	 	join user_roles on user_roles.user_id = tbl_user.userid
   	 	join roles on  roles.id = user_roles.role_id  LIMIT $per_page OFFSET $offset ", "result");
		$this->paginations_for_fun($number_of_rows, $per_page, $function_name);

		echo Modules::run("Template/main", $data);

	}

	function add_users() {
		if ($this->input->post()) {
			$data = array("username" => $this->input->post("username"),
				"password" => Encrypt($this->input->post("password")),
				"usermobile" => $this->input->post("usermobile"),
				"usercnic" => $this->input->post("usercnic"),

			);
			//print_r($data);

			$last_id = get_last_insert("tbl_user", $data);

			insert_data("user_roles", array("user_id" => $last_id, "role_id" => $this->input->post("userrole")));
			insert_data("tbl_user_district", array("user_id" => $last_id, "district_id" => $this->input->post("userdistrict")));

			$this->session->set_flashdata('success', 'Successfully User Created');

			return redirect("Users/show_users");
		} else {
			$data['module'] = "Users";
			$data['file'] = "add_users";
			$data['name'] = "Add Users";
			$data['all_roles'] = get_all("roles");
			$data['all_districts'] = get_all("tbl_district");

			echo Modules::run("Template/main", $data);
		}
	}

	function edit_user($user_id) {

		if ($this->input->post()) {
			$data = array("usermobile" => $this->input->post("usermobile"),
				"usercnic" => $this->input->post("usercnic"),
				"username" => $this->input->post("username"),
				"isactive" => $this->input->post("isactive"));
			//print_r($this->input->post());

			//$last_id=get_last_insert("tbl_user",$data);
			update_where("tbl_user", $data, array("userid" => $user_id));
			update_where("user_roles", array("user_id" => $user_id, "role_id" => $this->input->post("userrole")),
				array("user_id" => $user_id));
			insert_data("tbl_user_district", array("user_id" => $user_id, "district_id" => $this->input->post("userdistrict")));
			$this->session->set_flashdata('success', 'Successfully User Updated');

			return redirect("Users/show_users");
		} else {
			$data['module'] = "Users";
			$data['file'] = "edit_users";
			$data['name'] = "Edit Users";
			$data['all_roles'] = get_all("roles");
			$data['specific_user'] = get_where("tbl_user", array("userid" => $user_id), "*", "row");
			$data['user_role'] = get_where("user_roles", array("user_id" => $user_id), "*", "row");
			$data['all_districts'] = get_all("tbl_district");
			$data['user_district'] = custom_query("select * from tbl_user_district where
	 user_id={$user_id} order by udid DESC limit 0,1", "result");
			echo Modules::run("Template/main", $data);
		}
	}

	private function paginations_for_fun($number_of_rows, $per_page, $function_name) {

		// pagination code is executed and dispaly pagination in view
		$this->load->library('pagination');
		$config = [
			'base_url' => base_url('Users/') . $function_name,
			'per_page' => $per_page,
			'total_rows' => $number_of_rows,
			'full_tag_open' => '<ul class="pagination ">',
			'full_tag_close' => '</ul>',
			'first_tag_open' => '<li>',
			'first_tag_close' => '</li>',
			'last_tag_open' => '<li>',
			'last_tag_close' => '</li>',
			'next_tag_open' => '<li>',
			'next_tag_close' => '</li>',
			'prev_tag_open' => '<li>',
			'prev_tag_close' => '</li>',
			'num_tag_open' => '<li>',
			'num_tag_close' => '</li>',
			'cur_tag_open' => '<li class="active"><a>',
			'cur_tag_close' => '</a></li>',
		];

		$this->pagination->initialize($config);
	}
	function change_password() {
		if ($this->input->post()) {
			$user_id = $this->input->post("user_id");
			$data = array(
				"password" => Encrypt($this->input->post("password")),
			);
			update_where("tbl_user", $data, array("userid" => $user_id));
			$this->session->set_flashdata('success', 'Successfully Password Updated');
			return redirect("Users/show_users");
		} else {
			$data['module'] = 'Users';
			$data['file'] = 'change_pass';
			echo Modules::run("Template/main", $data);
		}
	}

}

?>