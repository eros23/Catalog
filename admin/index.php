<?php /**
 * @Author Laganà Gabriele
 * @Copyright LGNuke http://www.lgnuke.org
 * @Email info@lgnuke.org
 */
if (!defined('ADMIN_FILE')) {
  die("Access Denied");
}
define("_LOAD_PAGE_CONFIG_", true);
global $prefix, $db, $admin_file, $module_name, $aid, $multilingual, $currentlang;
$aid = substr("$aid", 0, 25);
$row = $db->sql_fetchrow($db->sql_query("SELECT title, admins FROM " . $prefix . "_modules WHERE title='$module_name'"));
$row2 = $db->sql_fetchrow($db->sql_query("SELECT name, radminsuper FROM " . $prefix . "_authors WHERE aid='$aid'"));
$admins = explode(",", $row['admins']);
$auth_user = 0;
for ($i = 0; $i < sizeof($admins); $i++) {
  if ($row2['name'] == "$admins[$i]" and !empty($row['admins'])) {
    $auth_user = 1;
  }
}
$name_prefix = 'catalog';
if ($multilingual == 1) {
  $querylang = 'AND (language=\'' . $currentlang . '\' OR language=\'\')';
} else {
  $querylang = '';
}
if (isset($_GET['daynum'])) {
  $daynum = intval($_GET['daynum']);
} else {
  $daynum = 10;
}
if (isset($_GET['page'])) {
  $page = intval($_GET['page']);
} else {
  $page = 1;
}
	  if (empty($_GET['ok'])) { $ok = false; }
	  if (isset($_GET['id_catalog'])){ $id_catalog = intval($_GET['id_catalog']); } else { $id_catalog = 0; }

if ($row2['radminsuper'] == 1 || $auth_user == 1) {



# =================================================================================== #
  switch ($op) 
         {
 default: 							    	require_once('public/main.php');		catalog_main($daynum);	                                   			break;
 	case ''.$name_prefix.'_pagelist':    	require_once('public/pagelist.php'); 	catalog_pagelist(); 												break;
 	case ''.$name_prefix.'_pageadd':    	require_once('public/pageadd.php'); 	catalog_pageadd($ok);												break;
 	case ''.$name_prefix.'_pageedit':    	require_once('public/pageedit.php'); 	catalog_pageedit($id_catalog,$ok);									break;
 	case ''.$name_prefix.'_pagedel':    	require_once('public/pagedel.php'); 	catalog_pagedel($id_catalog,$ok);  									break;
 	case ''.$name_prefix.'_pagedouble':    	require_once('public/pagedouble.php'); 	catalog_pagedouble($id_catalog,$ok);								break;
         }
} else {
  include ("header.php");
  //GraphicAdmin();
  OpenTable();
  echo "<center><b>" . _ERROR . "</b><br><br>You do not have administration permission for module \"$module_name\"</center>";
  CloseTable();
  include ("footer.php");
} 


?>