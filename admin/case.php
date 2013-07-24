<?php

/**
 * @Author Laganà Gabriele
 * @Copyright LGNuke http://www.lgnuke.org
 * @Email info@lgnuke.org
 */

if (!defined('ADMIN_FILE'))
{
    die("Access Denied");
}
$module_name = "Catalog";


switch ($op)
{

    case "catalog_main":

        include ("modules/$module_name/admin/index.php");
        break;

}

?>
