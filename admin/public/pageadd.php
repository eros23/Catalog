<?php  // Last Updated: 25/07/2013

	  if (!defined('ADMIN_FILE')) 
	  	 { die( include('../../../error_file/alert.php') ); }


# =================================================================================== #
function catalog_pageadd($ok=false) {
  global $db, $prefix, $admin, $admin_file, $language, $module_name, $querylang, $multilingual, $name_prefix;
 include_once('header.php');
         ?>
<div class="ls-icon-layers"></div>
  <h2><?php echo ''._CATALOG_PAGEADD.''; ?><span class="pull-right"><a href="#" class="add-new-h2"></a></span></h2>

  <!-- Main menu bar -->
  <div id="ls-main-nav-bar">
    <a href="<?php echo ''.$admin_file.'.php?op='.$name_prefix.'_pagelist' ;?>" class="callbacks">Torna elenco</a>
    <a href="#" class="support unselectable">Documentazione</a>
    <a href="#" class="clear unselectable"></a>
  </div>
<form id="settingsForm" method="post">
  <div class="row-fluid">
    <div class="span12" style="text-align: center;">
      <input class="btn" type="submit" value="Salva Modifiche" />
    </div>
  </div>

  <div class="row-fluid">
    <div class="span6">
      <h3 class="heading">Configurazione</h3>            
      <div class="formSep">
        <label>Sito Offline?</label>
        <select name="xoffline" class="span6">
        <option value="0" selected>No</option>
        <option value="1">Si</option>
        </select>
        <label>Messaggio sito offline:</label>
        <textarea class="span6" rows="4" cols="1"  name="xoffline_message">Sito Off line! Si prega di tornare piÃ¹ tardi</textarea>
      </div>
    </div>
    <div class="span6">
      <h3 class="heading">SEO</h3>
    </div>
</form>    
        
         <?php
 include_once('footer.php');
         }


?>