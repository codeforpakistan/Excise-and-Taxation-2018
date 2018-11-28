<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permissions extends MX_Controller 
{
  
  function show_all_permissions()
  {  echo Modules::run("Auth/check_login","show_all_permissions");
  	
  	 $data['module']="Permissions";
   	 $data['file']="show_all_permissions";
   	 $data['name'] = "Show Permissions";
   	 $data['all_permissions'] = get_all("acos");

   	 echo Modules::run("Template/main",$data);
   	
  }
  function add_permissions()
  {  
  	if($this->input->post())
  	{
  		$data=array(
  			"class"=>$this->input->post("class"),
  			"method"=>$this->input->post("method"),
  			"display_name"=>$this->input->post("display_name"),
  			"icons"=>$this->input->post("icon"),
  			"displaystatus"=>$this->input->post("position"),
  			"parent_menu"=>$this->input->post("parent_menu"),
  		);
  		insert_data("acos",$data);

  	}else{
     $data['module']="Permissions";
   	 $data['file']="add_permissions";
   	 $data['name'] = "Add Permissions";
	 $data['parent_menu'] = get_all("tbl_parent_menu");
   	 
 echo Modules::run("Template/main",$data);
  	}

  }
  function edit_permissions()
  {   echo Modules::run("Auth/check_login","edit_permissions");
  		if($this->input->post())
  	{
  		$data=array(
  			"class"=>$this->input->post("class"),
  			"method"=>$this->input->post("method"),
  			"display_name"=>$this->input->post("display_name"),
  			"icons"=>$this->input->post("icon"),
  			"displaystatus"=>$this->input->post("position"),
  		);
  		$id=$this->input->post("id");
  		update_where("acos",$data,"id",$id);

  	}else{
  		$id=$this->uri->segment(3);
     $data['module']="Permissions";
   	 $data['file']="edit_permissions";
   	 $data['name'] = "Add Permissions";
   	 $data['edit_permissions'] = get_where_both("acos","id",$id,"object");
     echo Modules::run("Template/main",$data);
  	}
  }


}


?>