<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

error_reporting(0);
$ci =& get_instance();

/*----------------------------------------------------------------------------------------------------
*                                      	CRUD OPERATIONS
-----------------------------------------------------------------------------------------------------*/

if ( ! function_exists('save_data')) :
	function save_data($table,$data)
	{
		$ci =& get_instance();
		$ci->db->insert($table, $data); 
		return $ci->db->insert_id();
	} 
endif;

if ( ! function_exists('save_bulk_data')) :
function save_bulk_data($table, $data)
  {
		$ci =& get_instance();
		$ci->db->insert_batch($table, $data);
		return true;
  }
endif;

if ( ! function_exists('update_data')) :
	function update_data($table,$data,$id)
	{
		$ci =& get_instance();
		$ci->db->where('id', $id);
		$ci->db->update($table, $data); 
		return true;
	} 
endif;
if ( ! function_exists('update_data_by_where')) :
	function update_data_by_where($table,$data,$where)
	{
		$ci =& get_instance();
		$ci->db->where($where);	
		$ci->db->update($table, $data); 
	} 
endif;

if ( ! function_exists('delete_data')) :
function delete_data($table, $id)
	{
		# code...
		$ci =& get_instance();
		$ci->db->where('id', $id);
		$ci->db->delete($table);
	}
endif;	

if ( ! function_exists('delete_data_by_where')) :
function delete_data_by_where($table, $where)
	{
		# code...
		$ci =& get_instance();
		$ci->db->where($where);	
		$ci->db->delete($table);
	}
endif;	

if ( ! function_exists('execute_query')) :
function execute_query($sql_query)
	{
		# code...
		$ci =& get_instance();
		$ci->db->query($sql_query);
		return true;
		
	}
endif;

if ( ! function_exists('get_query_data')) :
function get_query_data($sql_query)
	{
		# code...
		$ci =& get_instance();
		$data = $ci->db->query($sql_query);
		return $data->result();
		
	}
endif;




if ( ! function_exists('get_query_data_array')) :
function get_query_data_array($sql_query)
	{
		# code...
		$ci =& get_instance();
		$ci->db->query('SET SESSION group_concat_max_len = 1000000');
		$data = $ci->db->query($sql_query);
		return $data->result_array();
		
	}
endif;


if ( ! function_exists('get_total')) :
function get_total($index_column, $table, $where=''){
		if(!empty($where)){
			$where_clause = " WHERE $where";
		}else{
			$where_clause = "";
		}
		$ci =& get_instance();
	    $sql_query = "SELECT COUNT($index_column) AS cnt FROM $table  $where_clause";	
	    $query = $ci->db->query($sql_query);					 
		$result = $query->row();
		return $result->cnt; 
	}
endif;

if ( ! function_exists('get_total_using_query')) :
function get_total_using_query($index_column, $query){
		$ci =& get_instance();
	    $sql_query = "SELECT COUNT($index_column) AS cnt FROM $query";	
	    $query = $ci->db->query($sql_query);					 
		$result = $query->row();
		return $result->cnt; 
	}
endif;


if ( ! function_exists('get_sum')) :
function get_sum($index_colum, $table, $where=''){
		if(!empty($where)){
			$where_clause = " WHERE $where";
		}else{
			$where_clause = "";
		}
		$ci =& get_instance();
	    $sql_query = "SELECT SUM($index_colum) AS cnt FROM $table  $where_clause";	
	    $query = $ci->db->query($sql_query);					 
		$result = $query->row();
		return $result->cnt; 
	}
endif;

if ( ! function_exists('get_average')) :
function get_average($index_colum, $table, $where=''){
		if(!empty($where)){
			$where_clause = " WHERE $where";
		}else{
			$where_clause = "";
		}
		$ci =& get_instance();
	    $sql_query = "SELECT AVG($index_colum) AS cnt FROM $table  $where_clause";	
	    $query = $ci->db->query($sql_query);					 
		$result = $query->row();
		return $result->cnt; 
	}
endif;

if ( ! function_exists('select_data')) :
	function select_data($table, $where,$order='')
	{
		$ci =& get_instance();
		$ci->db->select('*');
		$ci->db->from($table);
		$ci->db->where($where);
		if( !empty($order) && isset($order) ):
		      $ci->db->order_by($order);
		endif;
		$query = $ci->db->get();
		return $query->result();
	} 
endif;

if ( ! function_exists('select_columns')) :
function select_columns($colulmns,$table, $where,$order='')
      {
	      	$ci =& get_instance();
	      	$ci->db->select($colulmns);
			$ci->db->from($table);
			$ci->db->where($where);
			if( !empty($order) && isset($order) ):
		      $ci->db->order_by($order);
		    endif;
			$query = $ci->db->get();
			return $query->result();
      }
endif;

if ( ! function_exists('select_columns_array')) :
function select_columns_array($colulmns,$table, $where,$order='')
      {
	      	$ci =& get_instance();
	      	$ci->db->select($colulmns);
			$ci->db->from($table);
			$ci->db->where($where);
			if( !empty($order) && isset($order) ):
		      $ci->db->order_by($order);
		    endif;
			$query = $ci->db->get();
			return $query->result_array();
      }
endif;


if ( ! function_exists('select_column_name')) :
 function select_column_name($col,$table,$id){
	        $ci =& get_instance();
            $ci->db->select($col);
		    $ci->db->from($table);
			$ci->db->where('id', $id);
	return	$get_col =  $ci->db->get()->row()->$col;	
}
endif;

if ( ! function_exists('select_column_name_by_where')) :
 function select_column_name_by_where($col,$table,$where){
	        $ci =& get_instance();
            $ci->db->select($col);
		    $ci->db->from($table);
			$ci->db->where($where);
	return	$get_col =  $ci->db->get()->row()->$col;	
}
endif;

if ( ! function_exists('send_email')) :
 function send_email($to_email, $subject, $message, $type='', $attachment='',$cc_to=''){
	   if(!empty($type) && isset($type)){
		   $mail_type = $type;
	   }else{
		  $mail_type = 'html';   
	   }
		$config['protocol'] = 'sendmail';
		$config['mailpath'] = '/usr/sbin/sendmail';
		$config['charset'] = 'utf-8';
		$config['wordwrap'] = TRUE;
		$config['mailtype'] = $mail_type;
		$ci =& get_instance();
		$ci->load->library('email');
		$ci->email->initialize($config);
		$ci->email->from(SITE_EMAIL, SITE_NAME);
		$ci->email->to($to_email);
		if(!empty($cc_to) && isset($cc_to)){
			$ci->email->cc($to_email);
		}
		$ci->email->subject($subject);
		$ci->email->message($message);
		if(!empty($attachment) && isset($attachment)){
			$ci->email->attach($attachment);

		}
		$ci->email->send();
		return true;
	}
endif;

if ( ! function_exists('get_lat_lng')) :
function get_lat_lng($location){
	   $formattedAddrFrom = str_replace(' ','+',$location);
	   $geocode_location=  file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$formattedAddrFrom.'&sensor=false');
	   $output_location = json_decode($geocode_location);
	   $lat = $output_location->results[0]->geometry->location->lat;
	   $lng = $output_location->results[0]->geometry->location->lng;  
	   return array('loc_lat' => $lat, 'loc_lng' => $lng);
  }
endif;

if ( ! function_exists('meridian_time')) :
function meridian_time($datetime){
	   return date('j F Y - H:i', strtotime($datetime));
  }
endif;

if ( ! function_exists('hr_datetime')) :
function hr_datetime($datetime){
	   
	   return date('d/m/Y g:i a', strtotime($datetime));
  }
endif;

if ( ! function_exists('hr_time')) :
function hr_time($datetime){
	   
	   return date('g:i A', strtotime($datetime));
	  
  }
endif;

if ( ! function_exists('sys_datetime')) :
function sys_datetime($datetime){
	   
	   return date('d/m/Y H:i', strtotime($datetime));
  }
endif;

if ( ! function_exists('datemont_year_time')) :
function datemont_year_time($datetime){
	   return date('d M Y (H:i)', strtotime($datetime));
  }
endif;


if ( ! function_exists('hr_date')) :
function hr_date($date){
	   
	   return date('d/m/Y', strtotime($date));
  }
endif;
if ( ! function_exists('mysql_date')) :
function mysql_date($start_date) {
if( empty($start_date)){
			$start_date = date('Y-m-d');
		}else{
			$date_format = explode('/', $start_date);
			$start_date = $date_format[2].'-'.$date_format[1].'-'.$date_format[0];  
	}
	return $start_date;
 }	
endif;


if ( ! function_exists('get_member_email_template')) :
function get_member_email_template($template_id, $user_id,$password=''){
	   $where = "id=".$user_id." ";
	   $customer_data = select_data('members', $where,'');
	   // Get template data
	   $where_template = " id=".$template_id." ";
	   $template_data = select_data('email_templates', $where_template,'');
	   // Set email body from email template for sending in email
	   $email_subject = $template_data[0]->email_subject;
	   $template_body = $template_data[0]->email_body;
	   $email_message_body = '';
	   $email_message_body = str_replace('$MEMBER_NAME', $customer_data[0]->full_name, $template_body);
	   $email_message_body = str_replace('$MEMBER_LOGIN_ID', $customer_data[0]->login_id, $email_message_body);
	   $email_message_body = str_replace('$MEMBER_LOGIN_PASSWORD', $password , $email_message_body);
	   $email_message_body = str_replace('$MEMBER_EMAIL', $customer_data[0]->email , $email_message_body);
	   $email_message_body = str_replace('SITE_NAME', SITE_NAME , $email_message_body);
	   $email_message_body = str_replace('$MEMBER_LOGIN_LINK', '<a href='.ADMIN_URL.' target="_blank">'.ADMIN_URL.'</a>' , $email_message_body);
	   $message = $email_message_body;
	   send_email($customer_data[0]->email, $customer_data[0]->full_name, $email_subject, $message);
	   
	  
  }
endif;


if ( ! function_exists('get_user_email_template')) :
function get_user_email_template($template_id, $user_id,$password=''){
	   $where = "id=".$user_id." ";
	   $customer_data = select_data('users', $where,'');
	   // Get template data
	   $where_template = " id=".$template_id." ";
	   $template_data = select_data('email_templates', $where_template,'');
	   // Set email body from email template for sending in email
	   $email_subject = $template_data[0]->email_subject;
	   $template_body = $template_data[0]->email_body;
	   $email_message_body = '';
	   $email_message_body = str_replace('$MEMBER_NAME', $customer_data[0]->full_name, $template_body);
	   $email_message_body = str_replace('$MEMBER_LOGIN_ID', $customer_data[0]->login_id, $email_message_body);
	   $email_message_body = str_replace('$MEMBER_LOGIN_PASSWORD', $password , $email_message_body);
	   $email_message_body = str_replace('$MEMBER_EMAIL', $customer_data[0]->email , $email_message_body);
	   $email_message_body = str_replace('SITE_NAME', SITE_NAME , $email_message_body);
	   $email_message_body = str_replace('$MEMBER_LOGIN_LINK', '<a href='.ADMIN_URL.' target="_blank">'.ADMIN_URL.'</a>' , $email_message_body);
	   $message = $email_message_body;
	   send_email($customer_data[0]->email, $customer_data[0]->full_name, $email_subject, $message);
	   
	  
  }
endif;


if ( ! function_exists('get_customer_email_template')) :
function get_customer_email_template($template_id, $user_id,$password=''){
	   $where = "id=".$user_id." ";
	   $customer_data = select_data('customers', $where,'');
	   // Get template data
	   $where_template = " id=".$template_id." ";
	   $template_data = select_data('email_templates', $where_template,'');
	   // Set email body from email template for sending in email
	   $email_subject = $template_data[0]->email_subject;
	   $template_body = $template_data[0]->email_body;
	   $email_message_body = '';
	   $email_message_body = str_replace('$CUSTOMER_NAME', $customer_data[0]->name, $template_body);
	   $email_message_body = str_replace('$CUSTOMER_EMAIL', $customer_data[0]->email, $email_message_body);
	   $email_message_body = str_replace('$CUSTOMER_MOBILE', $customer_data[0]->mobile , $email_message_body);
	   $email_message_body = str_replace('$CUSTOMER_LOGIN_ID', $customer_data[0]->login_id , $email_message_body);
	   $email_message_body = str_replace('$CUSTOMER_LOGIN_PASSWORD', $password , $email_message_body);
	   $email_message_body = str_replace('SITE_NAME', SITE_NAME , $email_message_body);
	  
	   $message = $email_message_body;
	   send_email($customer_data[0]->email, $customer_data[0]->full_name, $email_subject, $message);
	   
	  
  }
endif;


if ( ! function_exists('job_alert_email')) :
function job_alert_email($order_id){
	   $where = "id=".$user_id." ";
	   $customer_data = select_data('users', $where,'');
	   // Get template data
	   $template_id = 11;
	   $where_template = " id=".$template_id." ";
	   $template_data = select_data('email_templates', $where_template,'');
	   // Set email body from email template for sending in email
	   $email_subject = $template_data[0]->email_subject;
	   $template_body = $template_data[0]->email_body;
	   $email_message_body = '';
	   $email_message_body = str_replace('$MEMBER_NAME', $customer_data[0]->full_name, $template_body);
	   $email_message_body = str_replace('$MEMBER_LOGIN_ID', $customer_data[0]->login_id, $email_message_body);
	   $email_message_body = str_replace('$MEMBER_LOGIN_PASSWORD', $password , $email_message_body);
	   $email_message_body = str_replace('$MEMBER_EMAIL', $customer_data[0]->email , $email_message_body);
	   $email_message_body = str_replace('SITE_NAME', SITE_NAME , $email_message_body);
	   $email_message_body = str_replace('$MEMBER_LOGIN_LINK', '<a href='.ADMIN_URL.' target="_blank">'.ADMIN_URL.'</a>' , $email_message_body);
	   $message = $email_message_body;
	   send_email($customer_data[0]->email, $customer_data[0]->full_name, $email_subject, $message);
	   
	  
  }
endif;

if ( ! function_exists('with_selected_options')) :
function with_selected_options($array = array(),$check_box_class, $table_name,$datatable_id){
	
	 $option  = '<input type="hidden" name="check_box_class" id="check_box_class" value="'.$check_box_class.'"  />';
	 $option .= '<input type="hidden" name="table_name" id="table_name" value="'.$table_name.'"  />';
	 $option .= '<select class="bs-select form-control drop_down_options" name="selected_fields_edit" onchange="edit_selected_rows_fields((this.value))"  id="selected_fields_edit">';
	 $option .= '<option value="">Select Option</option>';
	 foreach($array as $arr){
		 $option .= '<option value="'.str_replace(' ', '_',strtolower($arr)).'">'.$arr.'</option>';
	 }
	 $option .= '</select>';
	 return $option;
  }
endif;


if ( ! function_exists('get_segment')) :
function get_segment($number)
      {
	      	$ci =& get_instance();
	      	return $ci->uri->segment($number);
      }
endif;

if ( ! function_exists('format_money')) :
function format_money($n) {
        $n = (0+str_replace(",","",$n));
        // is this a number?
        if(!is_numeric($n)) return false;
        // now filter it;
        return STORE_CURRENCY.number_format($n,2);
 }	
endif;

if ( ! function_exists('get_stars')) :
function get_stars($number)
      {
	      	$stars = '';
	      switch($number){
			  case 1:
			   $stars .= '<i class="fa fa-star" aria-hidden="true" style="color:yellow"></i>';
			   $stars .= '<i class="fa fa-star-o" aria-hidden="true"></i>';
			   $stars .= '<i class="fa fa-star-o" aria-hidden="true"></i>';
			   $stars .= '<i class="fa fa-star-o" aria-hidden="true"></i>';
			   $stars .= '<i class="fa fa-star-o" aria-hidden="true"></i>';
			  break;
			  case 2:
			   $stars .= '<i class="fa fa-star" aria-hidden="true" style="color:yellow"></i>';
			   $stars .= '<i class="fa fa-star" aria-hidden="true" style="color:yellow"></i>';
			   $stars .= '<i class="fa fa-star-o" aria-hidden="true"></i>';
			   $stars .= '<i class="fa fa-star-o" aria-hidden="true"></i>';
			   $stars .= '<i class="fa fa-star-o" aria-hidden="true"></i>';
			  break;
			  case 3:
			   $stars .= '<i class="fa fa-star" aria-hidden="true" style="color:yellow"></i>';
			   $stars .= '<i class="fa fa-star" aria-hidden="true" style="color:yellow"></i>';
			   $stars .= '<i class="fa fa-star" aria-hidden="true" style="color:yellow"></i>';
			   $stars .= '<i class="fa fa-star-o" aria-hidden="true"></i>';
			   $stars .= '<i class="fa fa-star-o" aria-hidden="true"></i>';
			  break;
			  case 4:
			   $stars .= '<i class="fa fa-star" aria-hidden="true" style="color:yellow"></i>';
			   $stars .= '<i class="fa fa-star" aria-hidden="true" style="color:yellow"></i>';
			   $stars .= '<i class="fa fa-star" aria-hidden="true" style="color:yellow"></i>';
			   $stars .= '<i class="fa fa-star" aria-hidden="true" style="color:yellow"></i>';
			   $stars .= '<i class="fa fa-star-o" aria-hidden="true"></i>';
			  break;
			  case 5:
			   $stars .= '<i class="fa fa-star" aria-hidden="true" style="color:yellow"></i>';
			   $stars .= '<i class="fa fa-star" aria-hidden="true" style="color:yellow"></i>';
			   $stars .= '<i class="fa fa-star" aria-hidden="true" style="color:yellow"></i>';
			   $stars .= '<i class="fa fa-star" aria-hidden="true" style="color:yellow"></i>';
			   $stars .= '<i class="fa fa-star" aria-hidden="true" style="color:yellow"></i>';
			  break;
		  }
		  return $stars;
      }
endif;

if(!function_exists('one_time_bulk_invoice') ):
	function one_time_bulk_invoice($condo_id){
		$ci =& get_instance();
		// Get all units of this condo
		$sql = "SELECT U.name AS unit_name FROM units AS U WHERE U.condo_id=".$condo_id." ";
		$query = $ci->db->query($sql);
		$filename = "e-Pay_Templates_ot.xlsx"; // File Name
		// Download file
		/*
        header("Content-Disposition: attachment; filename=\"$filename\"");
        header("Content-Type: application/vnd.ms-excel");*/
		header("Content-Type: application/xls");    
header("Content-Disposition: attachment; filename=filename.xls");  
header("Pragma: no-cache"); 
header("Expires: 0");
		foreach($query->result() as $row):
		   
		endforeach;
	}
endif;

//========================================================================================

if ( ! function_exists('sendPushNotification_rider')) :

function sendPushNotification_rider($gcm_id,$post_id,$title,$message){

    define( 'API_ACCESS_KEY', 'AAAAeLvH9Lw:APA91bFNkMyFZKkz60Yri12OgHq3X_8Ojmt17JAJ7-j1NllWO4pp5T6ldPmrDD73C38yTI38dvT38I1XjQvnHHImyEf7Mrcmj1olNOb_7BY6dLomkR00nfXIdCuEvT-3vpIOVo40XxB1' );
   $msg = array

          (

    'body'  => $message,

    'title' => $title,

    'post_id' => $post_id,

    //'icon'  => 'myicon',/*Default Icon*/

  //  'sound' => 'mySound'/*Default sound*/

          );

  $fields = array

      (

        'to'    => $gcm_id,

        'data'  => $msg

      );

    

  

  $headers = array

      (

        'Authorization: key=' . API_ACCESS_KEY,

        'Content-Type: application/json'

      );

  #Send Reponse To FireBase Server  

  $ch = curl_init();

  curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );

  curl_setopt( $ch,CURLOPT_POST, true );

  curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );

  curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );

  curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );

  curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );

  $result = curl_exec($ch );

  curl_close( $ch );

  #Echo Result Of FireBase Server

  return $result;

}

endif;
//========================================================================================





if ( ! function_exists('get_all'))
{
     function get_all($table)
     {
         $ci=& get_instance();
		
         $result = $ci->db->get($table);
         return $result->result();
         
     }
}
 function getaddress($lat,$lng)
  {
     $url = 'http://maps.googleapis.com/maps/api/geocode/json?latlng='
	 .trim($lat).','.trim($lng).'&sensor=false';
     $json = @file_get_contents($url);
     $data=json_decode($json);
     $status = $data->status;
     if($status=="OK")
     {
       return $data->results[0]->formatted_address;
     }
     else
     {
       return false;
     }  
  }
if ( ! function_exists('convert_to_address'))
{
     function convert_to_address($lat,$lng){
     $url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($lat).','.
	 trim($lng).'&key=AIzaSyCO78LKT42tZE-MgQUQBP-hrOvaGgxayYs&sensor=false';
     $json = @file_get_contents($url);  
     $data=json_decode($json);
     $status = $data->status; 
     if($status=="OK")      
     {
       return $data->results[0]->formatted_address;
     }
     else
     {
       return false;
     }
  }
}
if ( ! function_exists('get_all_order'))
{
     function get_all_order($table,$order_col,$order)
     {
         $ci=& get_instance();
		 $ci->db->order_by($order_col,$order);
         $result = $ci->db->get($table);
         return $result->result();
         
     }
}
if ( ! function_exists('get_last_insert'))
{//$table='comment',$table_join='blog',$column_join='comment.id=blog.id'
     function get_last_insert($table,$data)
     {
         $ci=& get_instance();
      $ci->db->insert($table,$data);
        return $ci->db->insert_id();
     }
}
if ( ! function_exists('insert_data'))
{
     function insert_data($table,$data)
     {
         $ci=& get_instance();
         $result = $ci->db->insert($table,$data);
         return true;
         
     }
}
if ( ! function_exists('select_data_join')):
//$table='comment',$table_join='blog',$column_join='comment.id=blog.id'
     function select_data_join($table,$table_join,$column_join,$where)
     {
         $ci=& get_instance();
      $ci->db->select('*');
$ci->db->from($table);
$ci->db->join($table_join,$column_join);

$ci->db->where($where);


$result=$ci->db->get();
         return $result->result_array();
         
     }
endif;
	 if ( ! function_exists('select_data_join_order')):
//$table='comment',$table_join='blog',$column_join='comment.id=blog.id'
     function select_data_join_order($table,$table_join,$column_join,$where,$order,$order_type)
     {
         $ci=& get_instance();
      $ci->db->select('*');
$ci->db->from($table);
$ci->db->join($table_join,$column_join);
$ci->db->order_by($order,$order_type);
$ci->db->where($where);


$result=$ci->db->get();
         return $result->result_array();
         
     }
endif;
if ( ! function_exists('get_where')):
//$table='comment',$table_join='blog',$column_join='comment.id=blog.id'
     function get_where($table="",$where,$select="",$type)
     {
         $ci=& get_instance();
      $ci->db->select($select);
	  if( $where != "" ){
$ci->db->where($where); 
	  }

	  
$result=$ci->db->get($table);
	  if($type=="row"){
		   return $result->row();
	  }
	   if($type=="array"){
		   return $result->result_array();
	  }
	  if($type=="result"){
		   return $result->result();
	  }
        
         
     }
	  endif;
if ( ! function_exists('get_num'))
{//$table='comment',$table_join='blog',$column_join='comment.id=blog.id'
     function get_num($table,$where,$select)
     {
         $ci=& get_instance();
      $ci->db->select($select);
if($where != "" ){ $ci->db->where($where); }
$result=$ci->db->get($table);
         return $result->num_rows();
         
     }
}

if ( ! function_exists('get_where_both'))
{
     function get_where_both($table,$where,$value,$array)
     {
         $ci=& get_instance();
     $ci->db->where($where,$value);
     $result=$ci->db->get($table);
        if($array=="array"){return $result->result_array();}
        if($array="object"){return $result->result();}
         
     }
        }

if ( ! function_exists('get_like_where'))
{

function get_like_where($col1="",$val1="",$col2="",$val2="",$col3="",$val3="",$col4="",$val4="",$col5="",$val5="",$table,$table_join="",$column_join="",$table_join1="",$column_join1="")
    {
        $ci=& get_instance();
         if($table_join !=" " & $column_join !=""){
        $ci->db->join($table_join,$column_join);
    }
       if($table_join1 !=" " & $column_join1 !=""){
        $ci->db->join($table_join1,$column_join1);
    }
        if($col1 !=" " & $val1 !=""){
        $ci->db->like($col1, $val1);
    }
        if($col2 !=" " & $val2 !=""){
        $ci->db->like($col2, $val2); 
    } if($col3 !=" " & $val3 !=""){
        $ci->db->like($col3, $val3);
        } if($col4 !=" " & $val4 !=""){
        $ci->db->like($col4, $val4);
        } 
         if($col5 !=" " & $val5 !=""){

        $ci->db->like($col5, $val5); 
    }
        $result = $ci->db->get($table); 
        return $result->result_array();

    }

}

if ( ! function_exists('update_where'))
{
    function update_where($table,$data,$where)
    {$ci=& get_instance();
    $ci->db->where($where);
    $ci->db->update($table, $data); 
    return true;
    }
 
    }
if ( ! function_exists('delete_where'))
{
    function delete_where($table,$where,$value)
    {$ci=& get_instance();
    $ci->db->delete($table,array($where => $value)); 
    return true;
    }
 
    }
     if ( ! function_exists('custom_query'))
{
    function custom_query($query,$return_type)
    {  $ci=& get_instance();
    
      $result = $ci->db->query($query);
switch($return_type)
{
      case "result" : return $result->result();  
	  break;
	  case "row" : return $result->row();
	  break;
	   case "array" : return $result->result_array();
	  break;
	  case "num_rows" :  if($result->num_rows()>0){
		   return $result->num_rows();
	  }else{ return 0;}
	  break;
	  
	  
	} }
    }
	if ( ! function_exists('DJoin')):
	function DJoin($field,$tbl,$jointbl1,$Joinone,$jointbl3='',$Where='',$order='',$groupy = '',$limit = '',$like = '',$wherenotin='',$wherenotcol='')
    {$ci=& get_instance();
        $ci->db->select($field);
		
       $ci->db->from($tbl);
        $ci->db->join($jointbl1,$Joinone,"INNER");
        if (!empty($jointbl3)):
            foreach ($jointbl3 as $Table => $On):
                $ci->db->join($Table,$On);
            endforeach;
        endif;
        // if Group
		if (!empty($groupy)):
			$ci->db->group_by($groupy);
		endif;
		if (!empty($wherenotin)):
			$ci->db->group_by($groupy);
			$ci->db->where_not_in($wherenotcol, $wherenotin);
		endif;
        if(!empty($order)):
            $ci->db->order_by($order);
        endif;
        if(!empty($Where)):
            $ci->db->where($Where);
        endif;
        if(!empty($limit)):
            $ci->db->limit($limit);
        endif;
        
        if(!empty($like)):
            $ci->db->like('title', $like);
        endif;

        $query=$ci->db->get();
        return $query->result();
			
    }
	endif;
	
	function Encode_html($str) {
    return trim(stripslashes(htmlentities($str)));
	}

	function Encode($str) {
	    return trim(  htmlentities( $str, ENT_QUOTES ) ) ;
	}

	function Decode($str) {
	    return html_entity_decode(stripslashes($str));
	}

	function Encrypt($password) {
	    return crypt(md5($password), md5($password));
	}
	
	function fileUpload($param,$temp,$location)
	{
	  	$allow_ext = array("png","jpg","jpeg","gif");
        $uploadPath = 'assets/uploads/'.$location.'/';
        $FileReturn = '';
		if(!empty($param))
        {
            if($param !=''){
				$Ext = end(explode(".", $param));
                $ext = strtolower($Ext);
		        $temps = explode(".",$param);
				$newfilename = rand(1,100).date("Yis").round(microtime(true)) . '.' . end($temps);
                if(in_array($ext, $allow_ext)){
                    move_uploaded_file($temp,$uploadPath.$newfilename);
                    $FileReturn = $newfilename;
                    return $FileReturn;
                }
                else{
                    $data['error_msg'] = "Please upload valid File";
                }
            }
        }
	}
	function fileUploads($param,$temp,$location)
	{
        $uploadPath = 'assets/uploads/'.$location.'/';
        $FileReturn = '';
				if(!empty($param))
        {
            if($param !=''){
							$Ext = end(explode(".", $param));
                $ext = strtolower($Ext);
		        $temps = explode(".",$param);
						$newfilename = rand(1,100).date("Yis").round(microtime(true)) . '.' . end($temps);
          move_uploaded_file($temp,$uploadPath.$newfilename);
          $FileReturn = $newfilename;
          return $FileReturn;
            }
        }
	}
	
	
	
	function Authentication($table,$data)
	{ $ci=& get_instance();
		$ci->db->where($data);
		$query = $ci->db->get($table);
		if ($query) {
			return $query->row();
		}
		else
		{
			return false;
		}
	}
	
	
	

	
   

    
?>