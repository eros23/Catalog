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