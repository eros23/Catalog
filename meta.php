<?php

/**
 * @Author Laganà Gabriele
 * @Copyright LGNuke http://www.lgnuke.org
 * @Email info@lgnuke.org
 */
if (stristr(htmlentities($_SERVER['PHP_SELF']), "meta.php"))
{
    Header("Location: ../../index.php");
    die();
}
global $op, $id, $db, $prefix, $module_name;

?>