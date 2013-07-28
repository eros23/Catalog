<?php  // Last Updated: 25/07/2013

/* @Author Laganà Gabriele
 * @Copyright LGNuke http://www.lgnuke.org
 * @Email info@lgnuke.org */

	  if (!defined('ADMIN_FILE')) 
	  	 { die( include('../../../error_file/alert.php') ); }


# =================================================================================== #
  global $admin_file,$navbar;
         adminmenu(''.$admin_file.'.php?op=catalog_main&daynum=30', ''._CATALOG_LINK.'', 'catalog.png',$navbar);


?>