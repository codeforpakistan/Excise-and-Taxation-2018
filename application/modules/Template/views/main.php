<?php echo $this->load->view("header"); ?>
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
           
            
            <!-- Menu -->
            <div class="menu">
                <ul class="list" id="menu" >
                    <li class="header"></li>
                    <?php 
                    $a=100;
					$b="";
foreach ($result as  $key=>$value) :
    ?>
   <li   class="">
                     <?php if($value['parent_menu'] == 0){?>
                        <a href="<?php echo base_url().$value['class'].'/'.$value['method'];?>">
                           <?php echo $value['icons'];  ?>
                            <span><?php echo $value['display_name'];  ?></span> 
                        </a>
                    </li>
					 <?php }
$b = $value['method'];	  
				   
					 endforeach;
	
  ?>
			<?php foreach($parent_menu as $key=>$parent):
		
			$a = explode(",",$parent->role_id);
 

if($this->session->userdata("user_role") === $a || in_array($this->session->userdata("user_role"),$a)){		?>
			 <li onclick="add_class(this);" id="dropdown<?php echo $key;?>"> 
					 
						
                        <a href="javascript:void(0);"  class="menu-toggle">
                            <i class="material-icons"><?php echo $parent->menuicon;?></i>
                            <span><?php echo $parent->menuname;?></span>
                        </a>
						
                    <ul class="ml-menu"> 
			
			 <?php $result= select_data_join("acos","acl","acl.aco_id=acos.id",array("role_id"=>$this->session->userdata("user_role"),"acos.parent_menu"=>$parent->menuid));
		
			foreach ($result as  $key=>$value) : if($value['parent_menu'] != 0){?>
					 <a href="<?php echo base_url().$value['class'].'/'.$value['method'];?>">
                           <?php echo $value['icons'];  ?>
                            <span><?php echo $value['display_name'];  ?></span> 
                        </a> 
			 <?php } endforeach;?> 
			 
  
                     </ul> 
          </li> 
 <?php  }else{  } endforeach; ?>
					 
					    
                   
                    
                   
                    
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; <?php echo date('o'); ?> <a href="javascript:void(0);">Excise</a>.
                </div>
                <div class="version">
                    
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
     
                
   
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2><?php echo $name;?></h2>
            </div>
            <div>
              <?php  $this->load->view($module.'/'.$file);?>
            </div>
        </div>
        
    </section>

    <?php  $this->load->view("footer");?>