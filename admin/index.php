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
define("_LOAD_PAGE_CONFIG_", true);
global $prefix, $db, $admin_file, $module_name, $aid;
$aid = substr("$aid", 0, 25);
$row = $db->sql_fetchrow($db->sql_query("SELECT title, admins FROM " . $prefix . "_modules WHERE title='Shop'"));
$row2 = $db->sql_fetchrow($db->sql_query("SELECT name, radminsuper FROM " . $prefix . "_authors WHERE aid='$aid'"));
$admins = explode(",", $row['admins']);
$auth_user = 0;
for ($i = 0; $i < sizeof($admins); $i++)
{
    if ($row2['name'] == "$admins[$i]" and !empty($row['admins']))
    {
        $auth_user = 1;
    }
}
if ($row2['radminsuper'] == 1 || $auth_user == 1)
{


    switch ($op)
    {

        case "shop_add_cat":
            shop_add_cat($ok);
            break;

        default:
            catalog_main();
            break;
    }

} else
{
    include ("header.php");
    //GraphicAdmin();
    OpenTable();
    echo "<center><b>" . _ERROR . "</b><br><br>You do not have administration permission for module \"$module_name\"</center>";
    CloseTable();
    include ("footer.php");
}


function catalog_main() {
echo "Ciao";
	
}
?>