<?php  // Last Updated: 25/07/2013

/* @Author Lagan� Gabriele
 * @Copyright LGNuke http://www.lgnuke.org
 * @Email info@lgnuke.org */

	  if (!defined('ADMIN_FILE')) 
	  	 { die( include('../../../error_file/alert.php') ); }


# =================================================================================== #
		 $module_name = basename(dirname(dirname(__FILE__)));
// include_once ('modules/'.$module_name.'/admin/language/lang-italian.php');

  switch ($op)
         {

    case 'catalog_main':
 include_once('modules/'.$module_name.'/admin/index.php');
   break;
         }


?>