<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_eto_dg_reports extends CI_Model
{
    var $table = "tbl_vehicle";

   var $select_column = array("siezedtime","formserialno","siezeddate","submakeid",
   "submakename","color_id","usercnic"
	,"colorname","username",
	"districtname", "mobilesquadno","allotstatus","vechileregistrationno","vechileid","vehicle_make",
	"makename","allotstatus","receivestatus","clearnotclearstatus",
	"handoverstatus","fslclearnotclear");
	  var $custom_query ;
	var $custom_query_result  ;
	  function make_query_eto_report()
      {

        if(empty($_POST['start_date']) && empty($_POST['end_date']) && empty($_POST['cat_val'])):
           $this->db->select($this->select_column);
           $this->db->from($this->table);


			 $this->db->join("tbl_district","tbl_district.districtid = tbl_vehicle.district_id ");
       $this->db->join("tbl_user","tbl_user.userid = tbl_vehicle.user_id ");
			 $this->db->join("tbl_vehicle_model" ,"tbl_vehicle_model.makeid = tbl_vehicle.vehicle_make");
			 $this->db->join("tbl_vehicle_model_sub","tbl_vehicle_model_sub.submakeid = tbl_vehicle.vehicle_model");
			 $this->db->join("tbl_color","tbl_color.colorid = tbl_vehicle.color_id");
        //$this->db->where("tbl_vehicle.district_id",$userdata);
        $this->db->group_by("vechileid");
		  endif;
		  //MRa Pending
		   if(empty($_POST['start_date']) && empty($_POST['end_date'])):
         if( !empty($_POST['cat_val']))
         {
           $districtid= $_POST['cat_val'];

         }else{$districtid=0.1;}
		  switch($_POST['cat_val'])
		  {
			  case "All":
        $this->db->select($this->select_column);
        $this->db->from($this->table);


    $this->db->join("tbl_district","tbl_district.districtid = tbl_vehicle.district_id ");
    $this->db->join("tbl_user","tbl_user.userid = tbl_vehicle.user_id ");
    $this->db->join("tbl_vehicle_model" ,"tbl_vehicle_model.makeid = tbl_vehicle.vehicle_make");
    $this->db->join("tbl_vehicle_model_sub","tbl_vehicle_model_sub.submakeid = tbl_vehicle.vehicle_model");
    $this->db->join("tbl_color","tbl_color.colorid = tbl_vehicle.color_id");
    // $this->db->where("tbl_vehicle.district_id",$districtid);
     $this->db->group_by("vechileid");
		break;
      case $districtid:
      $this->db->select($this->select_column);
      $this->db->from($this->table);
      $this->db->join("tbl_district","tbl_district.districtid = tbl_vehicle.district_id ");
      $this->db->join("tbl_user","tbl_user.userid = tbl_vehicle.user_id ");
      $this->db->join("tbl_vehicle_model" ,"tbl_vehicle_model.makeid = tbl_vehicle.vehicle_make");
      $this->db->join("tbl_vehicle_model_sub","tbl_vehicle_model_sub.submakeid = tbl_vehicle.vehicle_model");
      $this->db->join("tbl_color","tbl_color.colorid = tbl_vehicle.color_id");
       //$this->db->where("tbl_vehicle.district_id",$userdata);
      $this->db->where("tbl_vehicle.district_id",$districtid);
       $this->db->group_by("vechileid");
      break;

		  }
endif;
if(!empty($_POST['start_date']) && !empty($_POST['end_date'])):
$start_date = $_POST['start_date'];
$end_date =$_POST['end_date'];
$where = "date(seizedat) BETWEEN '$start_date' AND '$end_date' ";
if( !empty($_POST['cat_val']))
{
  $districtid= $_POST['cat_val'];

}else{$districtid=0.1;}
switch($_POST['cat_val'])
{
case "All":
$this->db->select($this->select_column);
$this->db->from($this->table);


$this->db->join("tbl_district","tbl_district.districtid = tbl_vehicle.district_id ");
$this->db->join("tbl_user","tbl_user.userid = tbl_vehicle.user_id ");
$this->db->join("tbl_vehicle_model" ,"tbl_vehicle_model.makeid = tbl_vehicle.vehicle_make");
$this->db->join("tbl_vehicle_model_sub","tbl_vehicle_model_sub.submakeid = tbl_vehicle.vehicle_model");
$this->db->join("tbl_color","tbl_color.colorid = tbl_vehicle.color_id");
$this->db->where($where);
$this->db->group_by("vechileid");
break;
case $districtid:
$this->db->select($this->select_column);
$this->db->from($this->table);
$this->db->join("tbl_district","tbl_district.districtid = tbl_vehicle.district_id ");
$this->db->join("tbl_user","tbl_user.userid = tbl_vehicle.user_id ");
$this->db->join("tbl_vehicle_model" ,"tbl_vehicle_model.makeid = tbl_vehicle.vehicle_make");
$this->db->join("tbl_vehicle_model_sub","tbl_vehicle_model_sub.submakeid = tbl_vehicle.vehicle_model");
$this->db->join("tbl_color","tbl_color.colorid = tbl_vehicle.color_id");
$this->db->where($where);
$this->db->where("tbl_vehicle.district_id",$districtid);
$this->db->group_by("vechileid");
break;

}
endif;


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
	   function make_datatables_eto_report(){

          $this->make_query_eto_report();
           if($_POST["length"] != -1)
           {
                $this->db->limit($_POST['length'], $_POST['start']);
           }
           $query = $this->db->get();
           return $query->result();
      }

      function get_filtered_data_eto_report(){
             $this->make_query_eto_report();
           $query = $this->db->get();
           return $query->num_rows();

      }
      function get_all_data_eto_report()
      {   $this->db->select("*");
           $this->db->from($this->table);

           return $this->db->count_all_results();
      }






}
	  ?>
