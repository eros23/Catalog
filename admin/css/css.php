<?php

/**
 * @Author Laganà Gabriele
 * @Copyright LGNuke http://www.lgnuke.org
 * @Email info@lgnuke.org
 */
if (stristr(htmlentities($_SERVER['PHP_SELF']), "css.php"))
{
    Header("Location: ../../../index.php");
    die();
}
global $module_name, $op, $nukeurl;
?>
<link rel='stylesheet' id='catalog_global_css-css' href='modules/Catalog/admin/css/global.css' type='text/css' media='all' />
<link rel='stylesheet' id='catalog_css-css' href='modules/Catalog/admin/css/admin.css' type='text/css' media='all' />
<?php


?>