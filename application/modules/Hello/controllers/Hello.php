<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hello extends MX_Controller {

	function one_col()
    {
        $data['module']="Hello";
        $data['file'] = "one_p";
        $data['name'] = "Hello";
        echo Modules::run("Template/main",$data);
    }
}
