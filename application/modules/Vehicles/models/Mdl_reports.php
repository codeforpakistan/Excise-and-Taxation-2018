<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_reports extends CI_Model
{
    var $table = "tbl_vehicle";

   var $select_column = array("siezedtime","formserialno","siezeddate","submakeid",
   "submakename","color_id"
	,"colorname",
	"districtname", "mobilesquadno","allotstatus","vechileregistrationno","vechileid","vehicle_make",
	"makename",
	"tbl_vehicle_status.status_id","allotstatus","receivestatus","clearnotclearstatus",
	"handoverstatus","fslclearnotclear");
	  var $custom_query ;
	var $custom_query_result  ;
	  function make_query_report()
      {    if(empty($_POST['start_date']) && empty($_POST['end_date']) && empty($_POST['cat_val'])):
           $this->db->select($this->select_column);
           $this->db->from($this->table);

		   $this->db->join("tbl_vehicle_status","tbl_vehicle_status.vehicle_id = tbl_vehicle.vechileid");
			 $this->db->join("tbl_district","tbl_district.districtid = tbl_vehicle.district_id ");
			 $this->db->join("tbl_vehicle_model" ,"tbl_vehicle_model.makeid = tbl_vehicle.vehicle_make");
			 $this->db->join("tbl_vehicle_model_sub","tbl_vehicle_model_sub.submakeid = tbl_vehicle.vehicle_model");
			 $this->db->join("tbl_color","tbl_color.colorid = tbl_vehicle.color_id");
			/* $this->db->where_in("vehicle_id","SELECT vehicle_id FROM tbl_vehicle_status where
			status_id = 9 or status_id = 10");	 */
			 $this->db->where("`vehicle_id`  IN (SELECT vehicle_id FROM tbl_vehicle_status where
			status_id = 9 or status_id = 11)", NULL, FALSE);
			 $this->db->where("`vehicle_id` NOT IN (SELECT vehicle_id FROM tbl_vehicle_status where
			status_id = 6 or status_id = 20)", NULL, FALSE);
			/* $this->db->where_in("vehicle_id","SELECT vehicle_id FROM tbl_vehicle_status where
			status_id = 9 or status_id = 10");	 */
			//$this->db->where_not_in("vehicle_id","SELECT vehicle_id FROM tbl_vehicle_status where status_id = 20 or status_id = 6");
		 	$this->db->or_where("handoverstatus",1);
			$this->db->or_where("parking",1);
			$this->db->group_by("vechileid");

		  endif;
		  //MRa Pending
		   if(empty($_POST['start_date']) && empty($_POST['end_date'])):
		  switch($_POST['cat_val'])
		  {
			  case "mra_pending":
			  $this->db->select($this->select_column);
           $this->db->from($this->table);

		   $this->db->join("tbl_vehicle_status","tbl_vehicle_status.vehicle_id = tbl_vehicle.vechileid");
			 $this->db->join("tbl_district","tbl_district.districtid = tbl_vehicle.district_id ");
			 $this->db->join("tbl_vehicle_model" ,"tbl_vehicle_model.makeid = tbl_vehicle.vehicle_make");
			 $this->db->join("tbl_vehicle_model_sub","tbl_vehicle_model_sub.submakeid = tbl_vehicle.vehicle_model");
			 $this->db->join("tbl_color","tbl_color.colorid = tbl_vehicle.color_id");
			/* $this->db->where_in("vehicle_id","SELECT vehicle_id FROM tbl_vehicle_status where
			status_id = 9 or status_id = 10");	 */
			 $this->db->where("`vehicle_id` NOT IN (SELECT vehicle_id FROM tbl_vehicle_status where
			status_id = 9 or status_id = 10)", NULL, FALSE);
			 $this->db->where("`vehicle_id`  IN (SELECT vehicle_id FROM tbl_vehicle_status where
			status_id = 4 )", NULL, FALSE);
			$this->db->where("parking",1);
			/* $this->db->where_in("vehicle_id","SELECT vehicle_id FROM tbl_vehicle_status where
			status_id = 9 or status_id = 10");	 */
			//$this->db->where_not_in("vehicle_id","SELECT vehicle_id FROM tbl_vehicle_status where status_id = 20 or status_id = 6");
			$this->db->group_by("vechileid");
			break;
      case "All";
      $this->db->select($this->select_column);
      $this->db->from($this->table);

  $this->db->join("tbl_vehicle_status","tbl_vehicle_status.vehicle_id = tbl_vehicle.vechileid");
  $this->db->join("tbl_district","tbl_district.districtid = tbl_vehicle.district_id ");
  $this->db->join("tbl_vehicle_model" ,"tbl_vehicle_model.makeid = tbl_vehicle.vehicle_make");
  $this->db->join("tbl_vehicle_model_sub","tbl_vehicle_model_sub.submakeid = tbl_vehicle.vehicle_model");
  $this->db->join("tbl_color","tbl_color.colorid = tbl_vehicle.color_id");
 /* $this->db->where_in("vehicle_id","SELECT vehicle_id FROM tbl_vehicle_status where
 status_id = 9 or status_id = 10");	 */
  $this->db->where("`vehicle_id`  IN (SELECT vehicle_id FROM tbl_vehicle_status where
 status_id = 9 or status_id = 11)", NULL, FALSE);
  $this->db->where("`vehicle_id` NOT IN (SELECT vehicle_id FROM tbl_vehicle_status where
 status_id = 6 or status_id = 20)", NULL, FALSE);

 $this->db->or_where("handoverstatus",1);
 $this->db->or_where("parking",1);
 $this->db->group_by("vechileid");
 break;
 case "indi_allotment";
 $this->db->select($this->select_column);
 $this->db->from($this->table);

$this->db->join("tbl_vehicle_status","tbl_vehicle_status.vehicle_id = tbl_vehicle.vechileid");
$this->db->join("tbl_district","tbl_district.districtid = tbl_vehicle.district_id ");
$this->db->join("tbl_vehicle_model" ,"tbl_vehicle_model.makeid = tbl_vehicle.vehicle_make");
$this->db->join("tbl_vehicle_model_sub","tbl_vehicle_model_sub.submakeid = tbl_vehicle.vehicle_model");
$this->db->join("tbl_color","tbl_color.colorid = tbl_vehicle.color_id");
/* $this->db->where_in("vehicle_id","SELECT vehicle_id FROM tbl_vehicle_status where
status_id = 9 or status_id = 10");	 */
$this->db->where("`vehicle_id`  IN (SELECT vehicle_id FROM tbl_vehicle_status where
status_id = 9 )", NULL, FALSE);

$this->db->where("individualallot",1);
$this->db->where("handoverstatus",2);
$this->db->group_by("vechileid");
break;
			case "fsl_pending";
			    $this->db->select($this->select_column);
           $this->db->from($this->table);

		   $this->db->join("tbl_vehicle_status","tbl_vehicle_status.vehicle_id = tbl_vehicle.vechileid");
			 $this->db->join("tbl_district","tbl_district.districtid = tbl_vehicle.district_id ");
			 $this->db->join("tbl_vehicle_model" ,"tbl_vehicle_model.makeid = tbl_vehicle.vehicle_make");
			 $this->db->join("tbl_vehicle_model_sub","tbl_vehicle_model_sub.submakeid = tbl_vehicle.vehicle_model");
			 $this->db->join("tbl_color","tbl_color.colorid = tbl_vehicle.color_id");
			/* $this->db->where_in("vehicle_id","SELECT vehicle_id FROM tbl_vehicle_status where
			status_id = 9 or status_id = 10");	 */
			 $this->db->where("`vehicle_id` NOT IN (SELECT vehicle_id FROM tbl_vehicle_status where
			status_id = 9 or status_id = 10 or status_id=20)", NULL, FALSE);
			 $this->db->where("`vehicle_id`  IN (SELECT vehicle_id FROM tbl_vehicle_status where
			status_id = 12 )", NULL, FALSE);

			/* $this->db->where_in("vehicle_id","SELECT vehicle_id FROM tbl_vehicle_status where
			status_id = 9 or status_id = 10");	 */
			//$this->db->where_not_in("vehicle_id","SELECT vehicle_id FROM tbl_vehicle_status where status_id = 20 or status_id = 6");
			$this->db->group_by("vechileid");
			break;

			case "ready_allotment";
			    $this->db->select($this->select_column);
           $this->db->from($this->table);

		   $this->db->join("tbl_vehicle_status","tbl_vehicle_status.vehicle_id = tbl_vehicle.vechileid");
			 $this->db->join("tbl_district","tbl_district.districtid = tbl_vehicle.district_id ");
			 $this->db->join("tbl_vehicle_model" ,"tbl_vehicle_model.makeid = tbl_vehicle.vehicle_make");
			 $this->db->join("tbl_vehicle_model_sub","tbl_vehicle_model_sub.submakeid = tbl_vehicle.vehicle_model");
			 $this->db->join("tbl_color","tbl_color.colorid = tbl_vehicle.color_id");
			/* $this->db->where_in("vehicle_id","SELECT vehicle_id FROM tbl_vehicle_status where
			status_id = 9 or status_id = 10");	 */
			 $this->db->where("`vehicle_id`  IN (SELECT vehicle_id FROM tbl_vehicle_status where
			status_id = 9 )", NULL, FALSE);
			  $this->db->where("allotstatus",0);

			/* $this->db->where_in("vehicle_id","SELECT vehicle_id FROM tbl_vehicle_status where
			status_id = 9 or status_id = 10");	 */
			//$this->db->where_not_in("vehicle_id","SELECT vehicle_id FROM tbl_vehicle_status where status_id = 20 or status_id = 6");
			$this->db->group_by("vechileid");
			break;
			case "handover";
			    $this->db->select($this->select_column);
           $this->db->from($this->table);

		   $this->db->join("tbl_vehicle_status","tbl_vehicle_status.vehicle_id = tbl_vehicle.vechileid");
			 $this->db->join("tbl_district","tbl_district.districtid = tbl_vehicle.district_id ");
			 $this->db->join("tbl_vehicle_model" ,"tbl_vehicle_model.makeid = tbl_vehicle.vehicle_make");
			 $this->db->join("tbl_vehicle_model_sub","tbl_vehicle_model_sub.submakeid = tbl_vehicle.vehicle_model");
			 $this->db->join("tbl_color","tbl_color.colorid = tbl_vehicle.color_id");
			/* $this->db->where_in("vehicle_id","SELECT vehicle_id FROM tbl_vehicle_status where
			status_id = 9 or status_id = 10");	 */
			 $this->db->where("`vehicle_id`  IN (SELECT vehicle_id FROM tbl_vehicle_status where
			status_id = 9 )", NULL, FALSE);
			  $this->db->where("allotstatus",2);

			/* $this->db->where_in("vehicle_id","SELECT vehicle_id FROM tbl_vehicle_status where
			status_id = 9 or status_id = 10");	 */
			//$this->db->where_not_in("vehicle_id","SELECT vehicle_id FROM tbl_vehicle_status where status_id = 20 or status_id = 6");
			$this->db->group_by("vechileid");
			break;
      case "Auctioned";
          $this->db->select($this->select_column);
           $this->db->from($this->table);

       $this->db->join("tbl_vehicle_status","tbl_vehicle_status.vehicle_id = tbl_vehicle.vechileid");
       $this->db->join("tbl_district","tbl_district.districtid = tbl_vehicle.district_id ");
       $this->db->join("tbl_vehicle_model" ,"tbl_vehicle_model.makeid = tbl_vehicle.vehicle_make");
       $this->db->join("tbl_vehicle_model_sub","tbl_vehicle_model_sub.submakeid = tbl_vehicle.vehicle_model");
       $this->db->join("tbl_color","tbl_color.colorid = tbl_vehicle.color_id");
       $this->db->where("`vehicle_id`  IN (SELECT vehicle_id FROM tbl_vehicle_status where
      status_id = 16 )", NULL, FALSE);
      $this->db->group_by("vechileid");
      break;
      case "Released";
          $this->db->select($this->select_column);
           $this->db->from($this->table);

       $this->db->join("tbl_vehicle_status","tbl_vehicle_status.vehicle_id = tbl_vehicle.vechileid");
       $this->db->join("tbl_district","tbl_district.districtid = tbl_vehicle.district_id ");
       $this->db->join("tbl_vehicle_model" ,"tbl_vehicle_model.makeid = tbl_vehicle.vehicle_make");
       $this->db->join("tbl_vehicle_model_sub","tbl_vehicle_model_sub.submakeid = tbl_vehicle.vehicle_model");
       $this->db->join("tbl_color","tbl_color.colorid = tbl_vehicle.color_id");
       $this->db->where("`vehicle_id`  IN (SELECT vehicle_id FROM tbl_vehicle_status where
      status_id = 6 or status_id=10 or status_id=20 )", NULL, FALSE);
      $this->db->group_by("vechileid");
      break;
      case "dep_allotment";
      $this->db->select($this->select_column);
      $this->db->from($this->table);

     $this->db->join("tbl_vehicle_status","tbl_vehicle_status.vehicle_id = tbl_vehicle.vechileid");
     $this->db->join("tbl_district","tbl_district.districtid = tbl_vehicle.district_id ");
     $this->db->join("tbl_vehicle_model" ,"tbl_vehicle_model.makeid = tbl_vehicle.vehicle_make");
     $this->db->join("tbl_vehicle_model_sub","tbl_vehicle_model_sub.submakeid = tbl_vehicle.vehicle_model");
     $this->db->join("tbl_color","tbl_color.colorid = tbl_vehicle.color_id");
     /* $this->db->where_in("vehicle_id","SELECT vehicle_id FROM tbl_vehicle_status where
     status_id = 9 or status_id = 10");	 */
     $this->db->where("`vehicle_id`  IN (SELECT vehicle_id FROM tbl_vehicle_status where
     status_id = 9 )", NULL, FALSE);
     $this->db->where("handoverstatus",2);
         $this->db->where("departmentallot",1);
  


     $this->db->group_by("vechileid");
     break;
		  }
endif;



					  if(!empty($_POST['start_date']) && !empty($_POST['end_date'])):
		    $start_date = $_POST['start_date'];
			$end_date =$_POST['end_date'];
			$where = "date(createdat) BETWEEN '$start_date' AND '$end_date' ";
		  switch($_POST['cat_val'])
		  {
			  case "mra_pending":
			  $this->db->select($this->select_column);
           $this->db->from($this->table);

		   $this->db->join("tbl_vehicle_status","tbl_vehicle_status.vehicle_id = tbl_vehicle.vechileid");
			 $this->db->join("tbl_district","tbl_district.districtid = tbl_vehicle.district_id ");
			 $this->db->join("tbl_vehicle_model" ,"tbl_vehicle_model.makeid = tbl_vehicle.vehicle_make");
			 $this->db->join("tbl_vehicle_model_sub","tbl_vehicle_model_sub.submakeid = tbl_vehicle.vehicle_model");
			 $this->db->join("tbl_color","tbl_color.colorid = tbl_vehicle.color_id");
			/* $this->db->where_in("vehicle_id","SELECT vehicle_id FROM tbl_vehicle_status where
			status_id = 9 or status_id = 10");	 */
			 $this->db->where("`vehicle_id` NOT IN (SELECT vehicle_id FROM tbl_vehicle_status where
			status_id = 9 or status_id = 10)", NULL, FALSE);
			 $this->db->where("`vehicle_id`  IN (SELECT vehicle_id FROM tbl_vehicle_status where
			status_id = 4 )", NULL, FALSE);
			$this->db->where("parking",1);
			$this->db->where($where);
			/* $this->db->where_in("vehicle_id","SELECT vehicle_id FROM tbl_vehicle_status where
			status_id = 9 or status_id = 10");	 */
			//$this->db->where_not_in("vehicle_id","SELECT vehicle_id FROM tbl_vehicle_status where status_id = 20 or status_id = 6");
			$this->db->group_by("vechileid");
			break;
			case "fsl_pending";
			    $this->db->select($this->select_column);
           $this->db->from($this->table);

		   $this->db->join("tbl_vehicle_status","tbl_vehicle_status.vehicle_id = tbl_vehicle.vechileid");
			 $this->db->join("tbl_district","tbl_district.districtid = tbl_vehicle.district_id ");
			 $this->db->join("tbl_vehicle_model" ,"tbl_vehicle_model.makeid = tbl_vehicle.vehicle_make");
			 $this->db->join("tbl_vehicle_model_sub","tbl_vehicle_model_sub.submakeid = tbl_vehicle.vehicle_model");
			 $this->db->join("tbl_color","tbl_color.colorid = tbl_vehicle.color_id");
			/* $this->db->where_in("vehicle_id","SELECT vehicle_id FROM tbl_vehicle_status where
			status_id = 9 or status_id = 10");	 */
			 $this->db->where("`vehicle_id` NOT IN (SELECT vehicle_id FROM tbl_vehicle_status where
			status_id = 9 or status_id = 10 or status_id=20)", NULL, FALSE);
			 $this->db->where("`vehicle_id`  IN (SELECT vehicle_id FROM tbl_vehicle_status where
			status_id = 12 )", NULL, FALSE);
			$this->db->where($where);

			/* $this->db->where_in("vehicle_id","SELECT vehicle_id FROM tbl_vehicle_status where
			status_id = 9 or status_id = 10");	 */
			//$this->db->where_not_in("vehicle_id","SELECT vehicle_id FROM tbl_vehicle_status where status_id = 20 or status_id = 6");
			$this->db->group_by("vechileid");
			break;
			case "ready_allotment";
			    $this->db->select($this->select_column);
           $this->db->from($this->table);

		   $this->db->join("tbl_vehicle_status","tbl_vehicle_status.vehicle_id = tbl_vehicle.vechileid");
			 $this->db->join("tbl_district","tbl_district.districtid = tbl_vehicle.district_id ");
			 $this->db->join("tbl_vehicle_model" ,"tbl_vehicle_model.makeid = tbl_vehicle.vehicle_make");
			 $this->db->join("tbl_vehicle_model_sub","tbl_vehicle_model_sub.submakeid = tbl_vehicle.vehicle_model");
			 $this->db->join("tbl_color","tbl_color.colorid = tbl_vehicle.color_id");
			/* $this->db->where_in("vehicle_id","SELECT vehicle_id FROM tbl_vehicle_status where
			status_id = 9 or status_id = 10");	 */
			 $this->db->where("`vehicle_id`  IN (SELECT vehicle_id FROM tbl_vehicle_status where
			status_id = 9 )", NULL, FALSE);
			  $this->db->where("allotstatus",0);
			  $this->db->where($where);

			/* $this->db->where_in("vehicle_id","SELECT vehicle_id FROM tbl_vehicle_status where
			status_id = 9 or status_id = 10");	 */
			//$this->db->where_not_in("vehicle_id","SELECT vehicle_id FROM tbl_vehicle_status where status_id = 20 or status_id = 6");
			$this->db->group_by("vechileid");
			break;
      case "All";
      $this->db->select($this->select_column);
      $this->db->from($this->table);

  $this->db->join("tbl_vehicle_status","tbl_vehicle_status.vehicle_id = tbl_vehicle.vechileid");
  $this->db->join("tbl_district","tbl_district.districtid = tbl_vehicle.district_id ");
  $this->db->join("tbl_vehicle_model" ,"tbl_vehicle_model.makeid = tbl_vehicle.vehicle_make");
  $this->db->join("tbl_vehicle_model_sub","tbl_vehicle_model_sub.submakeid = tbl_vehicle.vehicle_model");
  $this->db->join("tbl_color","tbl_color.colorid = tbl_vehicle.color_id");
 /* $this->db->where_in("vehicle_id","SELECT vehicle_id FROM tbl_vehicle_status where
 status_id = 9 or status_id = 10");	 */
  $this->db->where("`vehicle_id`  IN (SELECT vehicle_id FROM tbl_vehicle_status where
 status_id = 9 or status_id = 11)", NULL, FALSE);
  $this->db->where("`vehicle_id` NOT IN (SELECT vehicle_id FROM tbl_vehicle_status where
 status_id = 6 or status_id = 20)", NULL, FALSE);
    $this->db->where($where);
 $this->db->or_where("handoverstatus",1);
 $this->db->or_where("parking",1);
 $this->db->group_by("vechileid");
 break;
			case "handover";
			    $this->db->select($this->select_column);
           $this->db->from($this->table);

		   $this->db->join("tbl_vehicle_status","tbl_vehicle_status.vehicle_id = tbl_vehicle.vechileid");
			 $this->db->join("tbl_district","tbl_district.districtid = tbl_vehicle.district_id ");
			 $this->db->join("tbl_vehicle_model" ,"tbl_vehicle_model.makeid = tbl_vehicle.vehicle_make");
			 $this->db->join("tbl_vehicle_model_sub","tbl_vehicle_model_sub.submakeid = tbl_vehicle.vehicle_model");
			 $this->db->join("tbl_color","tbl_color.colorid = tbl_vehicle.color_id");
			/* $this->db->where_in("vehicle_id","SELECT vehicle_id FROM tbl_vehicle_status where
			status_id = 9 or status_id = 10");	 */
			 $this->db->where("`vehicle_id`  IN (SELECT vehicle_id FROM tbl_vehicle_status where
			status_id = 9 )", NULL, FALSE);
              $this->db->where($where);
			  $this->db->where("allotstatus",2);

			/* $this->db->where_in("vehicle_id","SELECT vehicle_id FROM tbl_vehicle_status where
			status_id = 9 or status_id = 10");	 */
			//$this->db->where_not_in("vehicle_id","SELECT vehicle_id FROM tbl_vehicle_status where status_id = 20 or status_id = 6");
			$this->db->group_by("vechileid");
			break;
      case "Auctioned";
          $this->db->select($this->select_column);
           $this->db->from($this->table);

       $this->db->join("tbl_vehicle_status","tbl_vehicle_status.vehicle_id = tbl_vehicle.vechileid");
       $this->db->join("tbl_district","tbl_district.districtid = tbl_vehicle.district_id ");
       $this->db->join("tbl_vehicle_model" ,"tbl_vehicle_model.makeid = tbl_vehicle.vehicle_make");
       $this->db->join("tbl_vehicle_model_sub","tbl_vehicle_model_sub.submakeid = tbl_vehicle.vehicle_model");
       $this->db->join("tbl_color","tbl_color.colorid = tbl_vehicle.color_id");
      /* $this->db->where_in("vehicle_id","SELECT vehicle_id FROM tbl_vehicle_status where
      status_id = 9 or status_id = 10");	 */
       $this->db->where("`vehicle_id`  IN (SELECT vehicle_id FROM tbl_vehicle_status where
      status_id = 16 )", NULL, FALSE);
              $this->db->where($where);
      //  $this->db->where("allotstatus",2);

      /* $this->db->where_in("vehicle_id","SELECT vehicle_id FROM tbl_vehicle_status where
      status_id = 9 or status_id = 10");	 */
      //$this->db->where_not_in("vehicle_id","SELECT vehicle_id FROM tbl_vehicle_status where status_id = 20 or status_id = 6");
      $this->db->group_by("vechileid");
      break;
      case "Released";
          $this->db->select($this->select_column);
           $this->db->from($this->table);

       $this->db->join("tbl_vehicle_status","tbl_vehicle_status.vehicle_id = tbl_vehicle.vechileid");
       $this->db->join("tbl_district","tbl_district.districtid = tbl_vehicle.district_id ");
       $this->db->join("tbl_vehicle_model" ,"tbl_vehicle_model.makeid = tbl_vehicle.vehicle_make");
       $this->db->join("tbl_vehicle_model_sub","tbl_vehicle_model_sub.submakeid = tbl_vehicle.vehicle_model");
       $this->db->join("tbl_color","tbl_color.colorid = tbl_vehicle.color_id");
       $this->db->where("`vehicle_id`  IN (SELECT vehicle_id FROM tbl_vehicle_status where
      status_id = 6 or status_id=10 or status_id=20 )", NULL, FALSE);
            $this->db->where($where);
      $this->db->group_by("vechileid");
      break;
      case "indi_allotment";
      $this->db->select($this->select_column);
      $this->db->from($this->table);

     $this->db->join("tbl_vehicle_status","tbl_vehicle_status.vehicle_id = tbl_vehicle.vechileid");
     $this->db->join("tbl_district","tbl_district.districtid = tbl_vehicle.district_id ");
     $this->db->join("tbl_vehicle_model" ,"tbl_vehicle_model.makeid = tbl_vehicle.vehicle_make");
     $this->db->join("tbl_vehicle_model_sub","tbl_vehicle_model_sub.submakeid = tbl_vehicle.vehicle_model");
     $this->db->join("tbl_color","tbl_color.colorid = tbl_vehicle.color_id");
     /* $this->db->where_in("vehicle_id","SELECT vehicle_id FROM tbl_vehicle_status where
     status_id = 9 or status_id = 10");	 */
     $this->db->where("`vehicle_id`  IN (SELECT vehicle_id FROM tbl_vehicle_status where
     status_id = 9 )", NULL, FALSE);
$this->db->where("handoverstatus",2);
     $this->db->where("individualallot",1);
     $this->db->where($where);

     $this->db->group_by("vechileid");
     break;
     case "dep_allotment";
     $this->db->select($this->select_column);
     $this->db->from($this->table);

    $this->db->join("tbl_vehicle_status","tbl_vehicle_status.vehicle_id = tbl_vehicle.vechileid");
    $this->db->join("tbl_district","tbl_district.districtid = tbl_vehicle.district_id ");
    $this->db->join("tbl_vehicle_model" ,"tbl_vehicle_model.makeid = tbl_vehicle.vehicle_make");
    $this->db->join("tbl_vehicle_model_sub","tbl_vehicle_model_sub.submakeid = tbl_vehicle.vehicle_model");
    $this->db->join("tbl_color","tbl_color.colorid = tbl_vehicle.color_id");
    /* $this->db->where_in("vehicle_id","SELECT vehicle_id FROM tbl_vehicle_status where
    status_id = 9 or status_id = 10");	 */
    $this->db->where("`vehicle_id`  IN (SELECT vehicle_id FROM tbl_vehicle_status where
    status_id = 9 )", NULL, FALSE);
$this->db->where("handoverstatus",2);
    $this->db->where("departmentallot",1);
    $this->db->where($where);

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
	   function make_datatables_report(){

          $this->make_query_report();
           if($_POST["length"] != -1)
           {
                $this->db->limit($_POST['length'], $_POST['start']);
           }
           $query = $this->db->get();
           return $query->result();
      }

      function get_filtered_data_report(){
             $this->make_query_report();
           $query = $this->db->get();
           return $query->num_rows();

      }
      function get_all_data_report()
      {   $this->db->select("*");
           $this->db->from($this->table);

           return $this->db->count_all_results();
      }






}
	  ?>
