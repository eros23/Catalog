<?php  // Last Updated: 28/07/2013

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
    <div class="span6">
      <h3 class="heading">Scheda Tecnica</h3>            
      <div class="formSep">
        <label><?php echo _CATALOG_TYPOLOGY; ?></label>
        <select name="typology" class="span6">
        <option value="0" selected>No</option>
        <option value="1">Si</option>
        </select>
        <label><?php echo _CATALOG_TYPOQUOTA; ?></label>
        <select name="tipoquota" class="span6">
        <option value="0"><?php echo '--- '._CATALOG_SELECT.' ---'; ?></option>
        <option value="1"><?php echo ''._CATALOG_QUOTAORG.''; ?></option>
        <option value="2"><?php echo ''._CATALOG_QUOTAINT.''; ?></option>
        </select>
        <label><?php echo _CATALOG_TYPOCAT; ?></label>
        <select name="id_category" class="span6">
        <?php
		echo '<option value="0" selected="selected">--- '._CATALOG_SELECT.' ---</option>';
			 $rescat = $db->sql_query('SELECT id_category,title,parentid 
			 						   FROM '.$prefix.'_categories 
									   WHERE modules=\''.$module_name.'\' AND active=1 
									   ORDER by parentid,title ASC');
	   while ($row_cat = $db->sql_fetchrow($rescat,MYSQL_ASSOC)) 
			 {
        	 $cid = intval($row_cat['id_category']);
        	 $ctitle = stripslashes(check_html($row_cat['title'], "nohtml"));
        	 $parentid = intval($row_cat['parentid']);
//          if ($parentid2 != 0) $ctitle2 = getparent($parentid2,$ctitle2);
        echo '<option value="'.$cid.'">'.$ctitle.'</option>';
    		 }
			 ?>
        </select>
      </div>
    </div>
    <div class="span6">
      <h3 class="heading">SEO</h3>
      <div class="formSep">
        <label><?php echo ''._CATALOG_TAGS.' :'; ?></label>
        <input id="input_limit_meta_title_chars" class="span6" type="text" name="xmeta_title" value="Scrivere il titolo, categoria e destinazione" maxlength="160" />
      </div>
      <div class="formSep">
        <label><?php echo ''._CATALOG_METADESCRIPTION.' :'; ?></label>
        <textarea id="txtarea_limit_meta_desc_chars" class="span6" rows="4" cols="1" name="metadesc"><?php echo _CATALOG_HELPMETADESC; ?></textarea>                                
      </div>
      <div class="formSep">
        <label><?php echo ''._CATALOG_METAKEYS.' :'; ?></label>
        <textarea id="txtarea_limit_meta_tags_words" class="span6" rows="4" cols="1" name="metakey"><?php echo _CATALOG_HELPMETAKEY; ?></textarea>
      </div>

    </div>
</form>    
        
         <?php
 include_once('footer.php');
         }


?>