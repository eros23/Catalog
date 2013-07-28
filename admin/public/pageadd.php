<?php  // Last Updated: 28/07/2013

	  if (!defined('ADMIN_FILE')) 
	  	 { die( include('../../../error_file/alert.php') ); }


# =================================================================================== #
function catalog_pageadd($ok=false) {
  global $db, $prefix, $admin, $admin_file, $module_name, $language, $querylang, $multilingual, $name_prefix;
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
  </div>
  <div class="span3">
    <h3 class="heading">Impostazioni</h3>
  </div>
  <div class="span3">
    <h3 class="heading">SEO</h3>
  </div>
</div>
<div class="row-fluid">
  <div class="span3">
    <div class="formSep">
    <label><?php echo _CATALOG_TYPOLOGY; ?></label>
    <select name="typology" class="span8">
      <option value="0" selected><?php echo ''._NO.''; ?></option>
      <option value="1"><?php echo ''._YES.''; ?></option>
    </select>
    <label><?php echo _CATALOG_TYPOCAT; ?></label>
    <select name="id_category" class="span8">
      <option value="0" selected="selected"><?php echo '--- '._CATALOG_SELECT.' ---'; ?></option>
      <?php
      $rescat = $db->sql_query('SELECT id_category,title,parentid 
						        FROM '.$prefix.'_categories 
							    WHERE modules=\''.$module_name.'\' AND active=1 
							    ORDER by parentid,title ASC');
	while ($row_cat = $db->sql_fetchrow($rescat,MYSQL_ASSOC)) 
		  {
          $cid = intval($row_cat['id_category']);
          $ctitle = stripslashes(check_html($row_cat['title'], "nohtml"));
          $parentid = intval($row_cat['parentid']);
//     if ($parentid2 != 0) $ctitle2 = getparent($parentid2,$ctitle2);
    echo '<option value="'.$cid.'">'.$ctitle.'</option>';
     	 }
		 ?>
      </select>
    </div>
  </div>
  <div class="span3">
    <div class="formSep">
    <label><?php echo _CATALOG_TYPOQUOTA; ?></label>
    <select name="tipoquota" class="span8">
      <option value="0" selected="selected"><?php echo '--- '._CATALOG_SELECT.' ---'; ?></option>
      <option value="1"><?php echo ''._CATALOG_QUOTAORG.''; ?></option>
      <option value="2"><?php echo ''._CATALOG_QUOTAINT.''; ?></option>
    </select>
    <label><?php echo _CATALOG_PARENT; ?></label>
    <select name="id_category" class="span8">
      <option value="0" selected="selected"><?php echo '--- '._CATALOG_SELECT.' ---'; ?></option>
             <?php
			 $pag = $db->sql_query('SELECT id_catalog,title,parentid 
			 						FROM '.$prefix.'_catalog_products 
									WHERE status > 0 
									ORDER by parentid,title ASC');
    	while($row_pag = $db->sql_fetchrow($pag)) 
			 {
        	 $idcatalog2 = intval($row_pag['id_catalog']);
             $stitle2 = stripslashes(check_html($row_pag['title'], "nohtml"));
        	 $sparentid2 = intval($row_pag['parentid']);
//          if ($sparentid2 != 0) $stitle2 = getpageparent($sarentid2,$stitle2);
        echo '<option value="'.$idcatalog2.'">'.$stitle2.'</option>';
    		 }
			 ?>
      </select>
    </div>
  </div>
  <div class="span3">
           <?php
		if ($multilingual == 1) 
		   {
 		   ?>
    <label><?php echo _CATALOG_LANGUAGE; ?></label>
    <select class="span8" name="xlanguage">
		     <?php
             $languageslist = '';
        	 $handle=opendir('language');
       while ($file = readdir($handle)) 
	   	 	 {
          if (preg_match('/^lang\-(.+)\.php/', $file, $matches)) 
		  	 {
             $langFound = $matches[1];
			 $languageslist .= ''.$langFound.' ';
             }
        	 }
     closedir($handle);
        	 $languageslist = explode(" ", $languageslist);
         sort($languageslist);
         for ($i=0; $i < sizeof($languageslist); $i++) 
		 	 {
          if (!empty($languageslist[$i])) 
		  	 {
        echo '<option value="'.$languageslist[$i].'" ';
          if ($languageslist[$i]==$language) echo 'selected="selected"';
        echo '>'.ucfirst($languageslist[$i]).'</option>'."\n";
             }
        	 }
		     ?>
			 </select></td>
           </tr>
           <?php
           } 
	  else { echo '<input type="hidden" name="xlanguage" value="'.$language.'" />'; }
	       ?>
    <label><?php echo _CATALOG_SELECTTEMPLATE; ?></label>
    <select class="span8" name="id">
      <option value="0" selected="selected"><?php echo '--- '._CATALOG_SELECT.' ---'; ?></option>
             <?php
			 $restem = $db->sql_query('SELECT id_template,title 
			 						   FROM '.$prefix.'_templates 
									   WHERE modules=\''.$module_name.'\' AND active=1 
									   ORDER by title ASC');
    	while($rowtem = $db->sql_fetchrow($restem)) 
			 {
        	 $id2 = intval($rowtem['id_template']);
        	 $ttitle2 = stripslashes(check_html($rowtem['title'], "nohtml"));
        echo '<option value="'.$id2.'">'.$ttitle2.'</option>';
    		 }
			 ?>
      </select>
    <label><?php echo _CATALOG_BLKSHOW; ?></label>
    <select class="span8" name="pageblock">
      <option value="0" selected="selected"><?php echo '--- '._CATALOG_SELECT.' ---'; ?></option>
      <option value="1"><?php echo ''._CATALOG_BLKLEFT.''; ?></option>
      <option value="2"><?php echo ''._CATALOG_BLKRIGHT.''; ?></option>
      <option value="3"><?php echo ''._CATALOG_BLKBOTH.''; ?></option>
    </select>
    <label><?php echo ''._CATALOG_PRIVATE.' :'; ?></label>
    <select name="private" class="span8">
      <option value="0" selected><?php echo ''._NO.''; ?></option>
      <option value="1"><?php echo ''._YES.''; ?></option>
    </select>
    <label><?php echo _CATALOG_VIEWPRIV; ?></label>
    <select class="span8" name="view">
      <option value="0"><?php echo ''._CATALOG_MVALL.''; ?></option>
      <option value="1"><?php echo ''._CATALOG_MVUSERS.''; ?></option>
      <option value="2"><?php echo ''._CATALOG_MVADMIN.''; ?></option>
      <option value="3"><?php echo ''._CATALOG_MVANON.''; ?></option>
      <option value="4"><?php echo ''._CATALOG_MVGROUPS.''; ?></option>
    </select>
  </div>
  <div class="span3">
    <div class="formSep">
    <label><?php echo ''._CATALOG_TAGS.' :'; ?></label>
      <input id="input_limit_meta_title_chars" class="span11" type="text" name="xmeta_title" value="Scrivere il titolo, categoria e destinazione" maxlength="160" />
    </div>
    <div class="formSep">
    <label><?php echo ''._CATALOG_METADESCRIPTION.' :'; ?></label>
      <textarea id="txtarea_limit_meta_desc_chars" class="span12" rows="4" cols="1" name="metadesc"><?php echo _CATALOG_HELPMETADESC; ?></textarea>
    </div>
    <div class="formSep">
    <label><?php echo ''._CATALOG_METAKEYS.' :'; ?></label>
      <textarea id="txtarea_limit_meta_tags_words" class="span12" rows="4" cols="1" name="metakey"><?php echo _CATALOG_HELPMETAKEY; ?></textarea>
    </div>
  </div>
</div>
</form>    
         <?php
 include_once('footer.php');
         }


?>