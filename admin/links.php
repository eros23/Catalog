<?php
/**
 * @Author Laganà Gabriele
 * @Copyright LGNuke http://www.lgnuke.org
 * @Email info@lgnuke.org
 */
if(!defined('ADMIN_FILE')) {
   die("Access Denied");
}
global $admin_file;
adminmenu("" . $admin_file . ".php?op=catalog_main", "" . _CATALOG . "", "catalog.png");

?>