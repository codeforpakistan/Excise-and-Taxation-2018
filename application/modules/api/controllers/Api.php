	<?php
	class APi extends MX_Controller{
	/**
	** @param usercnic,password
	**@return api_token,userid,account status
	**/
	/*
	|--------------------------------------------------------------------------
	|Login Api STARTS
	|--------------------------------------------------------------------------
	*/
	//implode('-', str_split(substr(strtolower(md5(microtime().rand(1000, 9999))), 0, 30), 6)); for genearting key for api

	
	
	/*
	|--------------------------------------------------------------------------
	|USer api Starts
	|--------------------------------------------------------------------------
	*/
	function register_user()
	{
		$api_key = implode('-', str_split(substr(strtolower(md5(microtime().rand(1000, 9999))), 0, 30), 6));
		$data=array(
				"username"=>$this->input->post("username"),
				"password"=>Encrypt($this->input->post("password")),
				"usermobile"=>$this->input->post("usermobile"),
				"usercnic"=>$this->input->post("usercnic"),
				"api_token"=>$api_key,
				"isactive"=>1,
				"is_citizen"=>1);
				$cnic =$this->input->post('usercnic');
			$user_cnic = custom_query("select * from tbl_user where usercnic= {$cnic}","row");	
			if($user_cnic->usercnic == $cnic)
			{
				echo json_encode(array("success"=>0,"message"=>"Cnic Already Exists Please Login"));
			}
			elseif(get_last_insert("tbl_user",$data))
			{
				echo json_encode(array("success"=>1,"message"=>"Your have Successfully Registered"));
			}else{
				echo json_encode(array("success"=>0,"message"=>"Some Issue with registration"));
			}
		
	}
	function user_login()
	{
		$data=array("usercnic"=>$this->input->post("usercnic"),
						"password"=>Encrypt($this->input->post("password")),
						"is_citizen"=>1
						);
					$api_key = $this->input->post("api_key");
			$data_select="usercnic,api_token";
			$login_status =get_num("tbl_user",$data,$data_select);
			if(!empty($this->input->post("usercnic")) && !empty($this->input->post("password")))
			{
				if( $login_status > 0 && $this->auth_key_check($api_key) == $api_key )
				{
						echo json_encode(array("success"=>1,"message"=>"Your have succesfully Loggedin"));
				}else{
					echo json_encode(array("success"=>0,"message"=>"password or usercnic wrong"));
				}
		
	}
	}
	function user_report_vehicles()
	{
					
					
					 if(isset($_FILES['files'])){
					   $path = './uploads';
					   $files = $_FILES['files'];
					   $uploads = $this->upload_files($path,$files);
					   // end upload process
					   $data = array( 
					"chasisno"=>$this->input->post("chasisno"),
					"engineno"=>$this->input->post("engineno"),
					"regno"=>$this->input->post("regno"),
					"make"=>$this->input->post("make"),
					"model"=>$this->input->post("model"),
					"modelyear"=>$this->input->post("modelyear"),
					"details"=>$this->input->post("description"),
					"reprotedat"=>$this->input->post("reprotedat"),
					"user_id"=>$this->input->post("user_id"),
					"image1"=>$uploads[0],
					"image2"=>$uploads[1],
					"image3"=>$uploads[2]
					);
					   if(insert_data("tbl_vcr",$data))
					{
						echo json_encode(array("success"=>1,"message"=>"Vehicle Reported Succesfully"));
					}else{
						echo json_encode(array("success"=>0,"message"=>"Some Issue with Reporting Vehicles"));
					}
			  }else{
				  $data = array( 
						"chasisno"=>$this->input->post("chasisno"),
					"engineno"=>$this->input->post("engineno"),
					"regno"=>$this->input->post("regno"),
					"make"=>$this->input->post("make"),
					"model"=>$this->input->post("model"),
					"reprotedat"=>$this->input->post("reprotedat"),
					"user_id"=>$this->input->post("user_id"),
					);
					if(insert_data("tbl_vcr",$data))
					{
						echo json_encode(array("success"=>1,"message"=>"Vehicle Reported Succesfully"));
					}else{
						echo json_encode(array("success"=>0,"message"=>"Some Issue with Reporting Vehicles"));
					}
					
			  }
		
	}
	
	
	
	/*
	|--------------------------------------------------------------------------
	|USer api ends
	|--------------------------------------------------------------------------
	*/
	function auth_key_check($key)
	{

			$cutom_query =custom_query("SELECT `api_token` FROM `tbl_user` WHERE `api_token`='{$key}'","row");
			return $cutom_query->api_token;

	}
		function login()
		{
			$data=array("usercnic"=>$this->input->post("usercnic"),
						"password"=>Encrypt($this->input->post("password")));
			$data_select="*";
			$login_status =get_num("tbl_user",$data,$data_select);
			if(!empty($this->input->post("usercnic")) && !empty($this->input->post("password")))
			{
				if( $login_status > 0 )
				{
						$selected_data = "api_token,userid,isactive,usermobile,username,special_squad";
						$select_data= "role_id";
						$result = get_where("tbl_user",$data,$selected_data,"array");
						$user_id =$result[0]['userid'];
						$role = get_where("user_roles",array("user_id"=>$user_id),$select_data,"array");
						$returneddistrict = custom_query("select * from tbl_user_district 
						where user_id={$user_id} order by udid DESC limit 0,1","row");
						 $userdistrict=$returneddistrict->district_id;
						if($result[0]['isactive'] == 1)
						{
							echo json_encode(array("success"=>1,"logindata"=>$result,"role"=>$role[0]['role_id'],"district_id"=>$userdistrict));
							}
							else
							{
								echo json_encode(array("success"=>2,"message"=>"Your Account is Disabled"));
								}
				}
				else
				{
				echo json_encode(array("success"=>0,"message"=>"Password or Username Wrong"));
				}
			}
			else
			{
					echo json_encode(array("success"=>0,"message"=>"Password or Username Should not be Empty"));
			}
		}
	/*
	|--------------------------------------------------------------------------
	|Login api ends
	|--------------------------------------------------------------------------
	*/
	/*
	|--------------------------------------------------------------------------
	|Inspector formA API Starts the apis is called when inspector fill form A in
	mobile app
	|--------------------------------------------------------------------------
	*/
	function registration_districts()
	{
	    $tbl_registration_district =get_all("tbl_district_registration");
		echo json_encode(array("success"=>1,"registation_district"=>$tbl_registration_district));
	}
	function post_seized_vehicle()
		{  date_default_timezone_set("Asia/Karachi");
			$auth_keys = $this->input->post("auth_key");
			  $key  = $this->auth_key_check($auth_keys);
			  if($key == $auth_keys ){
		$comma_separated = implode(",",$this->input->post("seizecat"));
			 $data=array(
					"formserialno"=>$this->input->post("formserialno"),
					"vehicleseize_category"=>$comma_separated,
					"district_id"=>$this->input->post("district_id"),
					"drivername"=>$this->input->post("drivername"),
					"drivercnicno"=>$this->input->post("drivercnicno"),
					"drivermobileno"=>$this->input->post("drivermobileno"),
					"driveraddress"=>$this->input->post("driveraddress"),
					"seize_address"=>$this->input->post("seize_address"),
					"vechileownername"=>$this->input->post("vechileownername"),
					"vechileownercnic"=>$this->input->post("vechileownercnic"),
					"vechileownermobileno"=>$this->input->post("vechileownermobileno"),
					"mobilesquadno"=>$this->input->post("mobilesquadno"),
					"chasisno"=>$this->input->post("chasisno"),
					"engineno"=>$this->input->post("engineno"),
					"vechileregistrationno"=>$this->input->post("vechileregistrationno"),
					"vehicle_make"=>$this->input->post("vehicle_make"),
					"vehicle_model"=>$this->input->post("vehicle_model"),
					"vechiclemodelyear"=>$this->input->post("vechiclemodelyear"),
					"vehicletype"=>$this->input->post("vehicletype"),
					"registration_id"=>$this->input->post("registration_district"),
					"build_id"=>$this->input->post("build_id"),
					"color_id"=>$this->input->post("color_id"),
					"transmission"=>$this->input->post("transmission"),
					"assembely"=>$this->input->post("assembely"),
					"vechilewheels"=>$this->input->post("vechilewheels"),
					"enginetype"=>$this->input->post("enginetype"),
					"siezedtime"=>$this->input->post("siezedtime"),
					"user_id"=>$this->input->post("user_id"),
					"siezeddate"=>$this->input->post("siezeddate"),
					"vehicleengine_capcaity"=>$this->input->post("vehicleengine_capcaity"),
					"mileage"=>$this->input->post("mileage"),
					"vechicledescription"=>$this->input->post("vechicledescription"),
					"seizedlocationlong"=>$this->input->post("seizedlocationlong"),
					"seizedlocationlat"=>$this->input->post("seizedlocationlat")
					);
					$last_vechile_id = get_last_insert("tbl_vehicle",$data);
				if($last_vechile_id){
				foreach($this->input->post("access") as $access)
				{
					insert_data("tbl_vehicle_accessories",array("vehicle_id"=>$last_vechile_id,"accessories_id"=>$access));
				}
			 if(isset($_FILES['files'])){
					   $path = './uploads';
					   $files = $_FILES['files'];
					   $uploads = $this->upload_files($path,$files);
					   // end upload process
					   foreach($uploads as $upload => $value){
						   insert_data("tbl_vehicle_images",array("vechile_id"=>$last_vechile_id,"imagepath"=>$value));
					   }
			  }
			   insert_data("tbl_vehicle_status",array(
													"vehicle_id"=>$last_vechile_id,
													"user_id"=>$this->input->post("user_id"),
													"status_id"=>1,
													"district_id"=>$this->input->post("district_id")
			   ));
			 echo json_encode(array(array("success"=>1)));
				}
			  else{
				  echo json_encode(array(array("success"=>0)));
			  }
			  }else{
				   echo json_encode(array(array("success"=>2)));
			  }
		}
	/*
	|--------------------------------------------------------------------------
	|Inspector formA API ENds
	|--------------------------------------------------------------------------
	*/
	/*
	|--------------------------------------------------------------------------
	|ALL the Get Apis giving all the tables data to Apps
	|--------------------------------------------------------------------------
	*/
	function get_districts()
	{
			$districts =get_all_order("tbl_district","districtname","ASC");
			echo json_encode(array("success"=>1,"districts"=>$districts));
	}
	function get_seized_vechicle()
	{
		$seized_vechicle =get_all("tbl_vehicle_seized_categories");
			echo json_encode(array("success"=>1,"seized_vechicle"=>$seized_vechicle));
	}
	function get_engine_capacity()
	{
		$tbl_engine_type =get_all("tbl_engine_capacity");
		echo json_encode(array("success"=>1,"engine_type"=>$tbl_engine_type));
	}
	function get_color()
	{
		$tbl_color =get_all("tbl_color");
		echo json_encode(array("success"=>1,"colors"=>$tbl_color));
	}
	function get_body_build()
	{
		$tbl_bodybuild =get_all("tbl_bodybuild");
		echo json_encode(array("success"=>1,"bodybuild"=>$tbl_bodybuild));
	}
	 function get_assecories()
	 {
			$assecories=custom_query("SELECT accessoryname,accessoryid FROM tbl_accesories","result");
		   if($assecories)
		   {
			   echo json_encode(array("assecories"=>$assecories,'success'=>1));
		   }
	 }
	 function get_make()
	{
		   $make=get_all("tbl_vehicle_model");
		   if($make)
		   {
			   echo json_encode(array("make"=>$make,"success"=>1));
		   }
	 }
	function get_model()
	{
		   $model=get_all("tbl_vehicle_model_sub");
		   if($model)
		   {
			   echo json_encode(array("model"=>$model,"success"=>1));
		   }
	}
	function get_model_year()
	{
		   $model_year=get_all("tbl_vehicle_modelyear");
		   if($model_year)
		   {
			   echo json_encode(array("model_year"=>$model_year,"success"=>1));
		   }
	}
	function get_wheels()
	{
		   $wheels=get_all("tbl_wheels");
		   if($wheels)
		   {
			   echo json_encode(array("wheel_number"=>$wheels,"success"=>1));

		   }
	   }
	/*
	|--------------------------------------------------------------------------
	|ALL the Get Apis Ends
	|--------------------------------------------------------------------------
	*/
		function seized_vechicle_user()
		{
			$tbl_seized =get_where("tbl_vehicle",array("user_id"=>$this->input->post("user_id")),"*","array");
		echo json_encode(array("seized_vechile"=>$tbl_seized,"success"=>1));
		}
		public function upload_files($path,$files)
	   {
		   $config = array(
			   'upload_path'   => $path,
			   'allowed_types' => 'jpg|gif|png',
			   'overwrite'     => 1,
		   );
		   $this->load->library('upload', $config);
		   $images = array();
		   foreach ($files['name'] as $key => $image) {
			   $_FILES['images[]']['name']= $files['name'][$key];
			   $_FILES['images[]']['type']= $files['type'][$key];
			   $_FILES['images[]']['tmp_name']= $files['tmp_name'][$key];
			   $_FILES['images[]']['error']= $files['error'][$key];
			   $_FILES['images[]']['size']= $files['size'][$key];
	 $fileName = $image;
			   $images[] = $fileName;
			   $config['file_name'] = $fileName;
			   $this->upload->initialize($config);
			   if ($this->upload->do_upload('images[]')) {
				   $this->upload->data();
			   } else {
				   return false;
			   }
		   }
		   return $images;
	   }

	   function get_proceeded_vechicles()
	   {
		   $proceeded_vechicles = custom_query("SELECT * FROM `tbl_vehicle` JOIN tbl_district on tbl_district.districtid = tbl_vehicle.district_id
	JOIN tbl_user on tbl_user.userid=tbl_vehicle.user_id where vechiclestatus = 1 order by vechileid DESC;");
	if($proceeded_vechicles)
	{
		echo json_encode(array("proceeded_vechicles"=>$proceeded_vechicles,"success"=>1));
	}else{
		echo json_encode(array("success"=>0));
	}
	   }

	   function post_formb()
	   {
		   $vechicle_id=$this->input->post("vechicle_id");
		   $data=array("description"=>$this->input->post("description"),
					"formbdate"=>$this->input->post("date"),
					"formbtime"=>$this->input->post("time"),
					"lat"=>$this->input->post("lat"),
					"long"=>$this->input->post("long"),
					"user_id"=>$this->input->post("user_id"),
					"vechicle_id"=>$vechicle_id,
					"form_bno"=>$this->input->post("form_bno"));
					 $status_data = array(
		"vehicle_id"=>$vechicle_id,
		"status_id"=>11,
		"user_id" => $this->input->post("user_id")
	   );
	   				insert_data("tbl_vehicle_status",$status_data);
					 update_where("tbl_vehicle",array("formbstatus"=>1),array("vechileid"=>$vechicle_id));
					 if(isset($_FILES['files'])){
					   $path = './uploads';
					   $files = $_FILES['files'];
					   $uploads = $this->upload_files($path,$files);
					   if(insert_data("tbl_vehicle_formb",$data))
					   {
					   // end upload process
					   foreach($uploads as $upload => $value){
						   insert_data("tbl_warehouse_images",array("vechicle_id"=>$vechicle_id,"imagepath"=>$value));
					   }
				foreach($this->input->post("formbaccess") as $access)
				{
					insert_data("tbl_formb_accessories",array("vechicle_id"=>$vechicle_id,"formb_accessoryid"=>$access));
				}

					   echo json_encode(array(array("success"=>1)));
					   }
					 }else{
					echo json_encode(array(array("success"=>0)));
					}
	}
	function Eto_approved_vechicles()
	{
			  $result = $this->db->query("SELECT  mobilesquadno,username,districtname,GROUP_CONCAT(seizedtype)as
			  seizedtype,registrationdistrictname
			 ,siezeddate,siezedtime,formserialno,seizedlocationlat,drivername
	,seizedlocationlong,chasisno,engineno,vechileregistrationno,makename
	 ,submakename,modelyear,vehicletype,drivercnicno
	,drivermobileno,driveraddress,
    (
    CASE
        WHEN parking =1 THEN ' MRA Parking'
         WHEN sendtowhforfsl =1 and sendtoboth =0  THEN 'FSL'
				 WHEN sendtoboth =1 and sendtowhforfsl =1 THEN 'FSL + MRA'
    END) AS vehicle_status,
	vechileownername,vechileownercnic, vechileownermobileno,vechileid,
	bodybuildname,colorname,transmission,assembely,wheelnumber,enginetype,vehicleengine_capcaity,
	mileage,vechicledescription,
parking,sendtowhforfsl,date_format(createdat,'%d-%M-%y') as approved_date,
TIME_FORMAT(createdat,'%H:%i %p') as approved_time,seize_address
	 FROM `tbl_vehicle`
			 LEFT JOIN tbl_district on tbl_district.districtid = tbl_vehicle.district_id
			LEFT JOIN tbl_vehicle_model on tbl_vehicle_model.makeid=tbl_vehicle.vehicle_make
			 LEFT JOIN tbl_vehicle_model_sub on tbl_vehicle_model_sub.submakeid=tbl_vehicle.vehicle_model
			 LEFT JOIN tbl_vehicle_modelyear on tbl_vehicle_modelyear.modelid = tbl_vehicle.vechiclemodelyear
			 LEFT JOIN tbl_bodybuild on tbl_bodybuild.bodybuild = tbl_vehicle.build_id
			 LEFT JOIN tbl_wheels on tbl_wheels.wheelid = tbl_vehicle.vechilewheels
			 LEFT JOIN tbl_color on tbl_color.colorid = tbl_vehicle.color_id
			 JOIN tbl_vehicle_status on tbl_vehicle_status.vehicle_id=tbl_vehicle.vechileid
			 LEFT JOIN tbl_district_registration on  tbl_district_registration.registrationdistrictid = 
			 tbl_vehicle.registration_id 
			JOIN tbl_vehicle_seized_categories on FIND_IN_SET(tbl_vehicle_seized_categories.siezedid,
			  tbl_vehicle.vehicleseize_category)
				 LEFT JOIN tbl_user on tbl_user.userid=tbl_vehicle.user_id where ( formbstatus=0 and
				 status_id=2)
			 and (parking=1 or sendtowhforfsl=1)  
			 group by vechileid order by vechileid DESC
			  ");
			 $seized_vechicles_data= $result->result();
			 $id=0;
			  $data=array();
			foreach($seized_vechicles_data as $seized){
				  $id=$seized->vechileid;
					$results =  $this->db->query("SELECT * FROM `tbl_vehicle_images`
			  where vechile_id ={$id}");
			  $all_images=$results->result();
			  $seized->vehicle_images=$all_images;


						$data =  $this->db->query("SELECT accessoryname,accessories_id FROM `tbl_accesories`
			 join tbl_vehicle_accessories on tbl_vehicle_accessories.accessories_id=tbl_accesories.accessoryid
			 where tbl_vehicle_accessories.vehicle_id ={$id}");
			 $vehicle_accessories= $data->result();
			 $seized->vehicle_accessories= $vehicle_accessories;
			 }
			   /* $all_data=array_merge(array("seized_data"=>$seized_vechicles_data,"vechicle_image"=>$all_images,"accessories"=>$all_accessories)); */
			 if(empty($seized_vechicles_data))
			 {
			  echo json_encode(array("seized_data"=>$seized_vechicles_data,"success"=>0));
			 }else{
			 echo json_encode(array("seized_vechicles_data"=> $seized_vechicles_data ,"success"=>1));
			 }
	}
	function inspector_seized_vechicles()
	{
		$result = $this->db->query("SELECT mobilesquadno,username,districtname,GROUP_CONCAT(seizedtype)as
 seizedtype,siezeddate,siezedtime,formserialno,seizedlocationlat,drivername
	,seizedlocationlong,chasisno,engineno,vechileregistrationno,makename
	 ,submakename,modelyear,vehicletype,drivercnicno
	,drivermobileno,driveraddress,
	vechileownername,vechileownercnic, vechileownermobileno,vechileid,
	bodybuildname,colorname,transmission,assembely,wheelnumber,enginetype,vehicleengine_capcaity,mileage,vechicledescription,
parking,sendtowhforfsl
	 FROM `tbl_vehicle`
			 LEFT JOIN tbl_district on tbl_district.districtid = tbl_vehicle.district_id
			LEFT JOIN tbl_vehicle_model on tbl_vehicle_model.makeid=tbl_vehicle.vehicle_make
			 LEFT JOIN tbl_vehicle_model_sub on tbl_vehicle_model_sub.submakeid=tbl_vehicle.vehicle_model
			 LEFT JOIN tbl_vehicle_modelyear on tbl_vehicle_modelyear.modelid = tbl_vehicle.vechiclemodelyear
			 LEFT JOIN tbl_bodybuild on tbl_bodybuild.bodybuild = tbl_vehicle.build_id
			 LEFT JOIN tbl_wheels on tbl_wheels.wheelid = tbl_vehicle.vechilewheels
			 LEFT JOIN tbl_vehicle_status on tbl_vehicle_status.vehicle_id = tbl_vehicle.vechileid
			 LEFT JOIN tbl_color on tbl_color.colorid = tbl_vehicle.color_id
			  JOIN tbl_vehicle_seized_categories on  FIND_IN_SET(tbl_vehicle_seized_categories.siezedid,
			 tbl_vehicle.vehicleseize_category)
			 LEFT JOIN tbl_user on tbl_user.userid=tbl_vehicle.user_id where vechileid Not IN(
			 select vehicle_id from tbl_vehicle_status where status_id=2) and
			 vechileid  IN(
			 select vehicle_id from tbl_vehicle_status where status_id=1) 
		 group by vechileid order by tbl_vehicle.vechileid DESC
			 ");
			 $seized_vechicles_data= $result->result();
			 $id=0;
			  $data=array();
			foreach($seized_vechicles_data as $seized){
				  $id=$seized->vechileid;
					$results =  $this->db->query("SELECT * FROM `tbl_vehicle_images`
			  where vechile_id ={$id}");
			  $all_images=$results->result();
			  $seized->vehicle_images= $all_images;
						$data =  $this->db->query("SELECT * FROM `tbl_accesories`
			 join tbl_vehicle_accessories on tbl_vehicle_accessories.accessories_id=tbl_accesories.accessoryid
			 where tbl_vehicle_accessories.vehicle_id ={$id}");
			 $vehicle_accessories= $data->result();
			 $seized->vehicle_accessories= $vehicle_accessories;
			}
			 if(empty($seized_vechicles_data))
			 {
				   echo json_encode(array("seized_data"=>$seized_vechicles_data,"success"=>0));
			 }else{
			 echo json_encode(array("seized_data"=>$seized_vechicles_data,"success"=>1));
			 }
	}
	function get_formb_accesories()
	{
	$data=array();
	$data2=array();
	$data3=array();
	$data1=array();
	$id =$this->input->post("vehicle_id");
	$assesory_id =0;
		  $assecories=custom_query("SELECT accessoryname,accessoryid FROM tbl_accesories order by accessoryid DESC","result");
		  foreach($assecories as $assecory)
		  {
			  $selected_acce=custom_query("SELECT * FROM tbl_vehicle_accessories where accessories_id ={$assecory->accessoryid}
			  and vehicle_id={$id } order by accessories_id DESC","result");
	 ksort($data1);
			 foreach($selected_acce as $selected)
			  { if( $assecory->accessoryid == $selected->accessories_id  )
				  {
					  $data["id"]=$assecory->accessoryid;
					  $data["name"] = $assecory->accessoryname;
					   $data["status"] = 1;
					   $data1[]=$data;
				  }
				  $assesory_id=$selected->accessories_id;
			  }
			  if($assesory_id != $assecory->accessoryid )
			  {
						$data2["id"]=$assecory->accessoryid;
						$data2["name"] = $assecory->accessoryname;
						$data2['status'] = 0;
						$data3[]=$data2;
				  }
		  }
	echo json_encode(array("accessories_checked"=>$data1,"accessories_unchecked"=>$data3,"success"=>1));
	}
	function total_stock()
	{
		$total_stock = custom_query("select count(vehicle_id) as count
				 from tbl_vehicle
				 join tbl_vehicle_status on tbl_vehicle_status.vehicle_id
						 =tbl_vehicle.vechileid
				 where
					 status_id= 9 and allotstatus = 0 ","row");

 $stock_plus1 = custom_query("SELECT vehicle_id FROM tbl_vehicle_status WHERE vehicle_id NOT IN (
	 SELECT vehicle_id FROM tbl_vehicle_status where status_id = 9 or status_id = 20 )
			 and vehicle_id IN
			 ( SELECT vehicle_id FROM tbl_vehicle_status where
					status_id = 11 or status_id = 10) group by vehicle_id","num_rows");
					$total = $total_stock->count + $stock_plus1;
					if(empty($total))
					{
						echo json_encode(array("stock"=>$total,"success"=>0));
					}else{
							echo json_encode(array("stock"=>$total,"success"=>1));
					}
	}
	}
	?>
