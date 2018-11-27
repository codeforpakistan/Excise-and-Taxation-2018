<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_vehicles extends CI_Model
{
    var $table = "tbl_vehicle";  
	
    
	var $select_column1 = array("username","siezedtime","formserialno","siezeddate","submakeid","submakename","color_id",
	"colorname",
	"districtname", "mobilesquadno","allotstatus","vechileregistrationno","vechileid","vehicle_make","makename",
	"tbl_vehicle_status.status_id","allotstatus","form_bno","handoverstatus","receivestatus",
	"tbl_individual_allot.allotmentid as individualid","tbl_individual_allot.authorizedby as individualauthorized",
	"tbl_vehicle_allotment.allotmentid","tbl_vehicle_allotment.authorisedby");  
var $select_column2 = array("username","siezedtime","formserialno","siezeddate","submakeid","submakename","color_id",
	"colorname",
	"districtname", "mobilesquadno","allotstatus","vechileregistrationno","vechileid","vehicle_make","makename",
	"tbl_vehicle_status.status_id","allotstatus","form_bno","handoverstatus","receivestatus"); 
    var $order_column = array(null, "username", "siezeddate", null, null);   

	
    


var $userdistrict = "" ;

 var $user_id="";
	  

	  function make_query_warehouse()  
      {  
           $this->db->select($this->select_column);  
           $this->db->from($this->table);     
           $this->db->join('tbl_vehicle_status','tbl_vehicle_status.vehicle_id = tbl_vehicle.vechileid');
		     $this->db->join('tbl_user','tbl_user.userid = tbl_vehicle.user_id ');
			 $this->db->join('tbl_district','tbl_district.districtid = tbl_vehicle.district_id ');
			 $this->db->join('tbl_vehicle_formb','tbl_vehicle_formb.vechicle_id = tbl_vehicle.vechileid ');
			 $this->db->join('tbl_vehicle_model','tbl_vehicle_model.makeid = tbl_vehicle.vehicle_make ');
			 $this->db->join('tbl_vehicle_model_sub','tbl_vehicle_model_sub.submakeid = tbl_vehicle.vehicle_model');
			 $this->db->join('tbl_color','tbl_color.colorid = tbl_vehicle.color_id ');
                     
		   $this->db->where(array("status_id"=>9));
		       
		   $this->db->group_by("vechileid"); 
            if(isset($_POST["search"]["value"]) and !empty($_POST["search"]["value"]))  
           {  
                $this->db->like("username", $_POST["search"]["value"]);  
                $this->db->or_like("vechileregistrationno", $_POST["search"]["value"]);  
           }  
          
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], 
				$_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('vechileid', 'DESC');  
           }  
      }  
      
	  //warehouse datatables
      function make_datatables_warehouse(){  
	
           $this->make_query_warehouse();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }  
	
      function get_filtered_data_warehouse(){  
           $this->make_query_warehouse();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }       
      function get_all_data_warehouse()  
      {  
           $this->db->select("*");  
           $this->db->from($this->table); 

           return $this->db->count_all_results();  
      }
	  
	  
	  
	  function make_query_warehouse_handover()  
      {  
           $this->db->select($this->select_column1);  
           $this->db->from($this->table);
           $this->db->join('tbl_vehicle_status','tbl_vehicle_status.vehicle_id = tbl_vehicle.vechileid');
		     $this->db->join('tbl_user','tbl_user.userid = tbl_vehicle.user_id ');
			 $this->db->join('tbl_district','tbl_district.districtid = tbl_vehicle.district_id ');
			 $this->db->join('tbl_vehicle_formb','tbl_vehicle_formb.vechicle_id = tbl_vehicle.vechileid ','left');
			 $this->db->join('tbl_individual_allot','tbl_individual_allot.vechicle_id = tbl_vehicle.vechileid ',"LEFT");
			 $this->db->join('tbl_vehicle_allotment','tbl_vehicle_allotment.vechicle_id = 
			 tbl_vehicle.vechileid ','left');
			 $this->db->join('tbl_vehicle_model','tbl_vehicle_model.makeid = tbl_vehicle.vehicle_make ');
			 $this->db->join('tbl_vehicle_model_sub','tbl_vehicle_model_sub.submakeid = tbl_vehicle.vehicle_model');
			 $this->db->join('tbl_color','tbl_color.colorid = tbl_vehicle.color_id ');
          
				$this->db->where(array("handoverstatus"=>1));
				$this->db->group_by('vechileid'); 
            if(isset($_POST["search"]["value"]) and !empty($_POST["search"]["value"]))  
           {  
                $this->db->like("username", $_POST["search"]["value"]);  
                $this->db->or_like("vechileregistrationno", $_POST["search"]["value"]);  
           }  
          
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('vechileid', 'DESC');  
           }  
      }  
      
	  //warehouse datatables
      function make_datatables_warehouse_handover(){  
	
           $this->make_query_warehouse_handover();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }  
	
      function get_filtered_data_warehouse_handover(){  
           $this->make_query_warehouse_handover();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }       
      function get_all_data_warehouse_handover()  
      {  
           $this->db->select("*");  
           $this->db->from($this->table); 

           return $this->db->count_all_results();  
      }
	  
	  function make_query_warehouse_receive_handover()  
      {  
           $this->db->select($this->select_column1);  
           $this->db->from($this->table);
           $this->db->join('tbl_vehicle_status','tbl_vehicle_status.vehicle_id = tbl_vehicle.vechileid');
		     $this->db->join('tbl_user','tbl_user.userid = tbl_vehicle.user_id ');
			 $this->db->join('tbl_district','tbl_district.districtid = tbl_vehicle.district_id ');
			 $this->db->join('tbl_vehicle_formb','tbl_vehicle_formb.vechicle_id = tbl_vehicle.vechileid ');
			 $this->db->join('tbl_individual_allot','tbl_individual_allot.vechicle_id = tbl_vehicle.vechileid ',"LEFT");
			 $this->db->join('tbl_vehicle_allotment','tbl_vehicle_allotment.vechicle_id = tbl_vehicle.vechileid ',"LEFT");
			 $this->db->join('tbl_vehicle_model','tbl_vehicle_model.makeid = tbl_vehicle.vehicle_make ');
			 $this->db->join('tbl_vehicle_model_sub','tbl_vehicle_model_sub.submakeid = tbl_vehicle.vehicle_model');
			 $this->db->join('tbl_color','tbl_color.colorid = tbl_vehicle.color_id ');
          
		   $this->db->where(array("receivestatus"=>1));
		   $this->db->group_by('vechileid'); 
            if(isset($_POST["search"]["value"]) and !empty($_POST["search"]["value"]))  
           {  
                $this->db->like("username", $_POST["search"]["value"]);  
                $this->db->or_like("vechileregistrationno", $_POST["search"]["value"]);  
           }  
          
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('vechileid', 'DESC');  
           }  
      }  
      
	  //warehouse datatables
      function make_datatables_warehouse_receive_handover(){  
	
           $this->make_query_warehouse_receive_handover();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }  
	
      function get_filtered_data_warehouse_receive_handover()
	  {  
           $this->make_query_warehouse_receive_handover();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }       
      function get_all_data_warehouse_receive_handover()  
      {  
           $this->db->select("*");  
           $this->db->from($this->table); 

           return $this->db->count_all_results();  
      }
	  
	  
	  
	  function make_query_release_warehouse()  
      {  
        $this->db->select($this->select_column2);  
           $this->db->from($this->table);
           $this->db->join('tbl_vehicle_status','tbl_vehicle_status.vehicle_id = tbl_vehicle.vechileid');
		     $this->db->join('tbl_user','tbl_user.userid = tbl_vehicle.user_id ');
			 $this->db->join('tbl_district','tbl_district.districtid = tbl_vehicle.district_id ');
			 $this->db->join('tbl_vehicle_formb','tbl_vehicle_formb.vechicle_id = tbl_vehicle.vechileid ');
		
			 $this->db->join('tbl_vehicle_model','tbl_vehicle_model.makeid = tbl_vehicle.vehicle_make ');
			 $this->db->join('tbl_vehicle_model_sub','tbl_vehicle_model_sub.submakeid = tbl_vehicle.vehicle_model');
			 $this->db->join('tbl_color','tbl_color.colorid = tbl_vehicle.color_id ');
          
		   $this->db->where(array("status_id"=>10,"releasedhandover"=>0));
		   $this->db->group_by('vechileid'); 
            if(isset($_POST["search"]["value"]) and !empty($_POST["search"]["value"]))  
           {  
                $this->db->like("username", $_POST["search"]["value"]);  
                $this->db->or_like("vechileregistrationno", $_POST["search"]["value"]);  
           }  
          
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('vechileid', 'DESC');  
           }  
      }  
      
	  //warehouse datatables
      function make_datatables_release_warehouse(){  
	
           $this->make_query_release_warehouse();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }  
	   
      function get_filtered_data_release_warehouse(){  
           $this->make_query_warehouse();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }       
      function get_all_data_release_warehouse()  
      {  
           $this->db->select("*");  
           $this->db->from($this->table); 

           return $this->db->count_all_results();  
      }
	  
	  
	   function make_query_warehouse_fsl()  
      {  
        $this->db->select($this->select_column);  
           $this->db->from($this->table);
           $this->db->join('tbl_vehicle_status','tbl_vehicle_status.vehicle_id = tbl_vehicle.vechileid');
		     $this->db->join('tbl_user','tbl_user.userid = tbl_vehicle.user_id ');
			 $this->db->join('tbl_district','tbl_district.districtid = tbl_vehicle.district_id ');
			 $this->db->join('tbl_vehicle_formb','tbl_vehicle_formb.vechicle_id = tbl_vehicle.vechileid ');
			
			 $this->db->join('tbl_vehicle_model','tbl_vehicle_model.makeid = tbl_vehicle.vehicle_make ');
			 $this->db->join('tbl_vehicle_model_sub','tbl_vehicle_model_sub.submakeid = tbl_vehicle.vehicle_model');
			 $this->db->join('tbl_color','tbl_color.colorid = tbl_vehicle.color_id ');
          
		   $this->db->where(array("status_id"=>12));       
		   $this->db->group_by('vechileid'); 
            if(isset($_POST["search"]["value"]) and !empty($_POST["search"]["value"]))  
           {  
                $this->db->like("username", $_POST["search"]["value"]);  
                $this->db->or_like("vechileregistrationno", $_POST["search"]["value"]);  
           }  
          
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('vechileid', 'DESC');  
           }  
      }  
      
	 
      function make_datatables_warehouse_fsl()
	  {  
	
           $this->make_query_warehouse_fsl();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }  
	   
      function get_filtered_warehouse_fsl()
	  {  
           $this->make_query_warehouse_fsl();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }       
      function get_all_data_warehouse_fsl()  
      {  
           $this->db->select("*");  
           $this->db->from($this->table); 

           return $this->db->count_all_results();  
      }
	  
	  
	 
	  function make_query_warehouse_checkin()  
      {  
        $this->db->select($this->select_column);  
           $this->db->from($this->table);
           $this->db->join('tbl_vehicle_status','tbl_vehicle_status.vehicle_id = tbl_vehicle.vechileid');
		     $this->db->join('tbl_user','tbl_user.userid = tbl_vehicle.user_id ');
			 $this->db->join('tbl_district','tbl_district.districtid = tbl_vehicle.district_id ');
			 $this->db->join('tbl_vehicle_formb','tbl_vehicle_formb.vechicle_id = tbl_vehicle.vechileid ');
			
			 $this->db->join('tbl_vehicle_model','tbl_vehicle_model.makeid = tbl_vehicle.vehicle_make ');
			 $this->db->join('tbl_vehicle_model_sub','tbl_vehicle_model_sub.submakeid = tbl_vehicle.vehicle_model');
			 $this->db->join('tbl_color','tbl_color.colorid = tbl_vehicle.color_id ');
          
		   $this->db->where(array("status_id"=>3));   
          	   
		   $this->db->group_by('vechileid'); 
            if(isset($_POST["search"]["value"]) and !empty($_POST["search"]["value"]))  
           {  
                $this->db->like("username", $_POST["search"]["value"]);  
                $this->db->or_like("vechileregistrationno", $_POST["search"]["value"]);  
           }  
          
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('vechileid', 'DESC');  
           }  
      }  
      
	 
      function make_datatables_warehouse_checkin()
	  {  
	
           $this->make_query_warehouse_checkin();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }  
	   
      function get_filtered_warehouse_checkin()
	  {  
           $this->make_query_warehouse_checkin();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }       
      function get_all_data_warehouse_checkin()  
      {  
           $this->db->select("*");  
           $this->db->from($this->table); 

           return $this->db->count_all_results();  
      }
	  
	  
	  function make_query_warehouse_handover_history()  
      {  
        $this->db->select($this->select_column1	);  
           $this->db->from($this->table);
           $this->db->join('tbl_vehicle_status','tbl_vehicle_status.vehicle_id = tbl_vehicle.vechileid');
		     $this->db->join('tbl_user','tbl_user.userid = tbl_vehicle.user_id ');
			 $this->db->join('tbl_district','tbl_district.districtid = tbl_vehicle.district_id ');
			 $this->db->join('tbl_vehicle_formb','tbl_vehicle_formb.vechicle_id = tbl_vehicle.vechileid ');
			 $this->db->join('tbl_individual_allot','tbl_individual_allot.vechicle_id = tbl_vehicle.vechileid ',"LEFT");
			 $this->db->join('tbl_vehicle_allotment','tbl_vehicle_allotment.vechicle_id = tbl_vehicle.vechileid ');
			 $this->db->join('tbl_vehicle_model','tbl_vehicle_model.makeid = tbl_vehicle.vehicle_make ');
			 $this->db->join('tbl_vehicle_model_sub','tbl_vehicle_model_sub.submakeid = tbl_vehicle.vehicle_model');
			 $this->db->join('tbl_color','tbl_color.colorid = tbl_vehicle.color_id ');
          
		   $this->db->where(array("handoverstatus"=>2));       
		   $this->db->group_by('vechileid'); 
            if(isset($_POST["search"]["value"]) and !empty($_POST["search"]["value"]))  
           {  
                $this->db->like("username", $_POST["search"]["value"]);  
                $this->db->or_like("vechileregistrationno", $_POST["search"]["value"]);  
           }  
          
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('vechileid', 'DESC');  
           }  
      }  
      
	 
      function make_datatables_warehouse_handover_history()
	  {  
	
           $this->make_query_warehouse_handover_history();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }  
	   
      function get_filtered_warehouse_handover_history()
	  {  
           $this->make_query_warehouse_handover_history();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }       
      function get_all_data_warehouse_handover_history()  
      {  
           $this->db->select("*");  
           $this->db->from($this->table); 

           return $this->db->count_all_results();  
      }
	 
	  
	  	  /*
	  |-------------------------------------------------------------------------------------------------------------
		|											Warehouse DATAtables Ends
		|-----------------------------------------------------------------------------------------------------------
		----------------------------*/
		
	  /*
	  |-------------------------------------------------------------------------------------------------------------
		|											DG DATAtables
		|-----------------------------------------------------------------------------------------------------------
		----------------------------*/
	  function make_query_DG()  
      {  
           $this->db->select($this->select_column);  
		     
           $this->db->from($this->table);
          $this->db->join('tbl_vehicle_status','tbl_vehicle_status.vehicle_id = tbl_vehicle.vechileid');
		     $this->db->join('tbl_user','tbl_user.userid = tbl_vehicle.user_id ');
			 $this->db->join('tbl_district','tbl_district.districtid = tbl_vehicle.district_id ');
			$this->db->join('tbl_vehicle_formb','tbl_vehicle_formb.vechicle_id = tbl_vehicle.vechileid ');
			 $this->db->join('tbl_vehicle_model','tbl_vehicle_model.makeid = tbl_vehicle.vehicle_make ');
			 $this->db->join('tbl_vehicle_model_sub','tbl_vehicle_model_sub.submakeid = tbl_vehicle.vehicle_model');
			 $this->db->join('tbl_color','tbl_color.colorid = tbl_vehicle.color_id ');
			  $this->db->where(array("allotstatus"=>0,"status_id"=>9));
		
		           $this->db->group_by('vechileid');          
            if(isset($_POST["search"]["value"]) and !empty($_POST["search"]["value"]))    
           {      
                $this->db->like("submakename", $_POST["search"]["value"]);  
                $this->db->or_like("vechileregistrationno", $_POST["search"]["value"]);  
           }     
          
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('vechileid', 'DESC');  
           }  
      }  
      
	  
      function make_datatables_DG()
	  {  
	
           $this->make_query_DG();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }  
	
      function get_filtered_data_DG(){  
           $this->make_query_DG();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }       
      function get_all_data_DG()  
      {  
           $this->db->select("*");  
           $this->db->from($this->table); 

           return $this->db->count_all_results();  
      }
	  
	  
	  
	   function make_query_receive_DG()  
      {  
           $this->db->select($this->select_column);  
		     
           $this->db->from($this->table);
          $this->db->join('tbl_vehicle_status','tbl_vehicle_status.vehicle_id = tbl_vehicle.vechileid');
		     $this->db->join('tbl_user','tbl_user.userid = tbl_vehicle.user_id ');
			 $this->db->join('tbl_district','tbl_district.districtid = tbl_vehicle.district_id ');
			$this->db->join('tbl_vehicle_formb','tbl_vehicle_formb.vechicle_id = tbl_vehicle.vechileid ');
			 $this->db->join('tbl_vehicle_model','tbl_vehicle_model.makeid = tbl_vehicle.vehicle_make ');
			 $this->db->join('tbl_vehicle_model_sub','tbl_vehicle_model_sub.submakeid = tbl_vehicle.vehicle_model');
			 $this->db->join('tbl_color','tbl_color.colorid = tbl_vehicle.color_id ');
			  $this->db->where(array("allotstatus"=>1,"handoverstatus"=>2,"receivestatus"=>0));
		
		           $this->db->group_by('vechileid');          
            if(isset($_POST["search"]["value"]) and !empty($_POST["search"]["value"]))    
           {      
                $this->db->like("submakename", $_POST["search"]["value"]);  
                $this->db->or_like("vechileregistrationno", $_POST["search"]["value"]);  
           }     
          
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('vechileid', 'DESC');  
           }  
      }  
      
	  
      function make_datatables_receive_DG()
	  {  
	
           $this->make_query_receive_DG();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }  
	
      function get_filtered_data_receive_DG(){  
           $this->make_query_receive_DG();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }       
      function get_all_data_receive_DG()  
      {  
           $this->db->select("*");  
           $this->db->from($this->table); 

           return $this->db->count_all_results();  
      }

	  
	  
	  function make_query_handover_pending_DG()  
      {  
           $this->db->select($this->select_column);  
		     
           $this->db->from($this->table);
          $this->db->join('tbl_vehicle_status','tbl_vehicle_status.vehicle_id = tbl_vehicle.vechileid');
		     $this->db->join('tbl_user','tbl_user.userid = tbl_vehicle.user_id ');
			 $this->db->join('tbl_district','tbl_district.districtid = tbl_vehicle.district_id ');
			$this->db->join('tbl_vehicle_formb','tbl_vehicle_formb.vechicle_id = tbl_vehicle.vechileid ');
			 $this->db->join('tbl_vehicle_model','tbl_vehicle_model.makeid = tbl_vehicle.vehicle_make ');
			 $this->db->join('tbl_vehicle_model_sub','tbl_vehicle_model_sub.submakeid = tbl_vehicle.vehicle_model');
			 $this->db->join('tbl_color','tbl_color.colorid = tbl_vehicle.color_id ');
			  $this->db->where(array("allotstatus"=>1,"status_id"=>9,
			  "handoverstatus"=>1));
		
		           $this->db->group_by('vechileid');          
            if(isset($_POST["search"]["value"]) and !empty($_POST["search"]["value"]))    
           {      
                $this->db->like("submakename", $_POST["search"]["value"]);  
                $this->db->or_like("vechileregistrationno", $_POST["search"]["value"]);  
           }     
          
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('vechileid', 'DESC');  
           }  
      }  
    
	  
      function make_datatables_handover_pending_DG()
	  {  
	
           $this->make_query_handover_pending_DG();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }  
	
      function get_filtered_data_handover_pending_DG(){  
           $this->make_query_handover_pending_DG();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }       
      function get_all_data_handover_pending_DG()  
      {  
           $this->db->select("*");  
           $this->db->from($this->table); 

           return $this->db->count_all_results();  
      }
 /*
	  |-------------------------------------------------------------------------------------------------------------
		|											DG DATAtables Ends
		|-----------------------------------------------------------------------------------------------------------
		----------------------------*/
		
 /*
	  |-------------------------------------------------------------------------------------------------------------
		|											Eto DATAtables Starts
		|-----------------------------------------------------------------------------------------------------------
		----------------------------*/
		
		 

	  
	  
	  
	  //vehicle sent to warehouse
	    function make_query_eto_send_wh()  
      {  
           $this->db->select($this->select_column);  
		     
       
           $this->db->from($this->table);
           $this->db->join('tbl_vehicle_status','tbl_vehicle_status.vehicle_id = tbl_vehicle.vechileid');
		     $this->db->join('tbl_user','tbl_user.userid = tbl_vehicle.user_id ');
			 $this->db->join('tbl_district','tbl_district.districtid = tbl_vehicle.district_id ');
			 $this->db->join('tbl_vehicle_formb','tbl_vehicle_formb.vechicle_id = tbl_vehicle.vechileid ');
			 $this->db->join('tbl_vehicle_model','tbl_vehicle_model.makeid = tbl_vehicle.vehicle_make ');
			 $this->db->join('tbl_vehicle_model_sub','tbl_vehicle_model_sub.submakeid = tbl_vehicle.vehicle_model');
			 $this->db->join('tbl_color','tbl_color.colorid = tbl_vehicle.color_id ');
			 $this->db->where(array("status_id"=>3));
			  $this->db->where(array("tbl_vehicle.district_id"=>$this->session->userdata("user_district")));	
			$this->db->or_where("parking",1);
			    
		
		           $this->db->group_by('vechileid');          
            if(isset($_POST["search"]["value"]) and !empty($_POST["search"]["value"]))    
           {      
                $this->db->like("submakename", $_POST["search"]["value"]);  
                $this->db->or_like("vechileregistrationno", $_POST["search"]["value"]);  
           }     
          
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('vechileid', 'DESC');  
           }  
      }  
      
	  
      function make_datatables_eto_send_wh()
	  {  
	
           $this->make_query_eto_send_wh();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }  
	
      function get_filtered_data_eto_send_wh(){  
           $this->make_query_eto_send_wh();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }       
      function get_all_data_eto_send_wh()  
      {  
           $this->db->select("*");  
           $this->db->from($this->table); 

           return $this->db->count_all_results();  
      }
	  
	  
	  
	  
	   //vehicle sent to warehouse after confiscation
	    function make_query_eto_send_confiscated()  
      {  
           $this->db->select($this->select_column);  
		     
       
           $this->db->from($this->table);
           $this->db->join('tbl_vehicle_status','tbl_vehicle_status.vehicle_id = tbl_vehicle.vechileid');
		     $this->db->join('tbl_user','tbl_user.userid = tbl_vehicle.user_id ');
			 $this->db->join('tbl_district','tbl_district.districtid = tbl_vehicle.district_id ');
			 $this->db->join('tbl_vehicle_formb','tbl_vehicle_formb.vechicle_id = tbl_vehicle.vechileid ');
			 $this->db->join('tbl_vehicle_model','tbl_vehicle_model.makeid = tbl_vehicle.vehicle_make ');
			 $this->db->join('tbl_vehicle_model_sub','tbl_vehicle_model_sub.submakeid = tbl_vehicle.vehicle_model');
			 $this->db->join('tbl_color','tbl_color.colorid = tbl_vehicle.color_id ');
			 $this->db->where(array("status_id"=>9));
			 $this->db->where(array("tbl_vehicle.district_id"=>$this->session->userdata("user_district")));
		
			
		
		           $this->db->group_by('vechileid');          
            if(isset($_POST["search"]["value"]) and !empty($_POST["search"]["value"]))    
           {      
                $this->db->like("submakename", $_POST["search"]["value"]);  
                $this->db->or_like("vechileregistrationno", $_POST["search"]["value"]);  
           }     
          
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('vechileid', 'DESC');  
           }  
      }  
      
	  
      function make_datatables_eto_send_confiscated()
	  {  
	
           $this->make_query_eto_send_confiscated();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }  
	
      function get_filtered_data_eto_send_confiscated(){  
           $this->make_query_eto_send_confiscated();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }       
      function get_all_data_eto_send_confiscated()  
      {  
           $this->db->select("*");  
           $this->db->from($this->table); 

           return $this->db->count_all_results();  
      }
	  
	  
	  
	    //vehicle sent to MRa 
	    function make_query_eto_send_mra()  
      {  
           $this->db->select($this->select_column);  
		     
       
           $this->db->from($this->table);
           $this->db->join('tbl_vehicle_status','tbl_vehicle_status.vehicle_id = tbl_vehicle.vechileid');
		     $this->db->join('tbl_user','tbl_user.userid = tbl_vehicle.user_id ');
			 $this->db->join('tbl_district','tbl_district.districtid = tbl_vehicle.district_id ');
			 $this->db->join('tbl_vehicle_formb','tbl_vehicle_formb.vechicle_id = tbl_vehicle.vechileid ');
			 $this->db->join('tbl_vehicle_model','tbl_vehicle_model.makeid = tbl_vehicle.vehicle_make ');
			 $this->db->join('tbl_vehicle_model_sub','tbl_vehicle_model_sub.submakeid = tbl_vehicle.vehicle_model');
			 $this->db->join('tbl_color','tbl_color.colorid = tbl_vehicle.color_id ');
			 $this->db->where(array("status_id"=>4));
			 $this->db->where(array("tbl_vehicle.district_id"=>$this->session->userdata("user_district")));
		
			
		
		           $this->db->group_by('vechileid');          
            if(isset($_POST["search"]["value"]) and !empty($_POST["search"]["value"]))    
           {      
                $this->db->like("submakename", $_POST["search"]["value"]);  
                $this->db->or_like("vechileregistrationno", $_POST["search"]["value"]);  
           }     
          
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('vechileid', 'DESC');  
           }  
      }  
      
	  
      function make_datatables_eto_send_mra()
	  {  
	
           $this->make_query_eto_send_mra();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }  
	
      function get_filtered_data_eto_send_mra(){  
           $this->make_query_eto_send_mra();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }       
      function get_all_data_eto_send_mra()  
      {  
           $this->db->select("*");  
           $this->db->from($this->table); 

           return $this->db->count_all_results();  
      }
	  
	   //vehicle sent to both 
	    function make_query_eto_send_both()  
      {  
           $this->db->select($this->select_column);  
		     
       
           $this->db->from($this->table);
           $this->db->join('tbl_vehicle_status','tbl_vehicle_status.vehicle_id = tbl_vehicle.vechileid');
		     $this->db->join('tbl_user','tbl_user.userid = tbl_vehicle.user_id ');
			 $this->db->join('tbl_district','tbl_district.districtid = tbl_vehicle.district_id ');
			 $this->db->join('tbl_vehicle_formb',' tbl_vehicle_formb.vechicle_id = tbl_vehicle.vechileid ','left');
			 $this->db->join('tbl_vehicle_model','tbl_vehicle_model.makeid = tbl_vehicle.vehicle_make ');
			 $this->db->join('tbl_vehicle_model_sub','tbl_vehicle_model_sub.submakeid = tbl_vehicle.vehicle_model');
			 $this->db->join('tbl_color','tbl_color.colorid = tbl_vehicle.color_id ');
			 $this->db->where(array("status_id"=>5));
		$this->db->where(array("tbl_vehicle.district_id"=>$this->session->userdata("user_district")));
			  
		
		           $this->db->group_by('vechileid');          
            if(isset($_POST["search"]["value"]) and !empty($_POST["search"]["value"]))    
           {      
                $this->db->like("submakename", $_POST["search"]["value"]);  
                $this->db->or_like("vechileregistrationno", $_POST["search"]["value"]);  
           }     
          
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('vechileid', 'DESC');  
           }  
      }  
      
	  
      function make_datatables_eto_send_both()
	  {  
	
           $this->make_query_eto_send_both();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }  
	
      function get_filtered_data_eto_send_both(){  
           $this->make_query_eto_send_both();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }       
      function get_all_data_eto_send_both()  
      {  
           $this->db->select("*");  
           $this->db->from($this->table); 

           return $this->db->count_all_results();  
      }
	  
	  
	  
	   //vehicle Release direct and handoverd
	    function make_query_eto_release_vehicle()  
      {  
           $this->db->select($this->select_column);  
		     
       
           $this->db->from($this->table);
           $this->db->join('tbl_vehicle_status','tbl_vehicle_status.vehicle_id = tbl_vehicle.vechileid');
		     $this->db->join('tbl_user','tbl_user.userid = tbl_vehicle.user_id ');
			 $this->db->join('tbl_district','tbl_district.districtid = tbl_vehicle.district_id ');
			 $this->db->join('tbl_vehicle_formb','tbl_vehicle_formb.vechicle_id = tbl_vehicle.vechileid ');
			 $this->db->join('tbl_vehicle_model','tbl_vehicle_model.makeid = tbl_vehicle.vehicle_make ');
			 $this->db->join('tbl_vehicle_model_sub','tbl_vehicle_model_sub.submakeid = tbl_vehicle.vehicle_model');
			 $this->db->join('tbl_color','tbl_color.colorid = tbl_vehicle.color_id ');
			 $this->db->where(array("status_id"=>6));
		 $this->db->or_where(array("status_id"=>20));  
$this->db->where(array("tbl_vehicle.district_id"=>$this->session->userdata("user_district")));		 
			                                    
		             
		           $this->db->group_by('vechileid');          
            if(isset($_POST["search"]["value"]) and !empty($_POST["search"]["value"]))    
           {      
                $this->db->like("submakename", $_POST["search"]["value"]);  
                $this->db->or_like("vechileregistrationno", $_POST["search"]["value"]);  
           }     
          
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('vechileid', 'DESC');  
           }  
      }  
      
	  
      function make_datatables_eto_release_vehicle()
	  {  
	
           $this->make_query_eto_release_vehicle();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }  
	
      function get_filtered_data_eto_release_vehicle(){  
           $this->make_query_eto_release_vehicle();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }       
      function get_all_data_eto_release_vehicle()  
      {  
           $this->db->select("*");  
           $this->db->from($this->table); 

           return $this->db->count_all_results();  
      }
		
		 /*
	  |-------------------------------------------------------------------------------------------------------------
		|											Eto DATAtables Ends
		|-----------------------------------------------------------------------------------------------------------
		----------------------------*/
	 

	 
	 
}	 ?>