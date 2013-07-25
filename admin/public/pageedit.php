<?php  // Last Updated: 25/07/2013

	  if (!defined('ADMIN_FILE')) 
	  	 { die( include('../../../error_file/alert.php') ); }


# =================================================================================== #
function catalog_pageedit($id_catalog,$ok=false) {
  global $db, $prefix, $admin, $admin_file, $language, $module_name, $querylang, $multilingual, $name_prefix;
 include_once('header.php');
         ?>
<div class="ls-icon-layers"></div>
  <h2><?php echo ''._CATALOG_PAGEEDIT.''; ?><span class="pull-right"><a href="#" class="add-new-h2"></a></span></h2>

  <!-- Main menu bar -->
  <div id="ls-main-nav-bar">
    <a href="<?php echo ''.$admin_file.'.php?op='.$name_prefix.'_pagelist' ;?>" class="callbacks">Torna elenco</a>
    <a href="#" class="support unselectable">Documentazione</a>
    <a href="#" class="clear unselectable"></a>
  </div>
    
        
         <?php
 include_once('footer.php');
         }


?>