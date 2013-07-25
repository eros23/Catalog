<?php  // Last Updated: 22/07/2013

	  if (!defined('ADMIN_FILE')) 
	  	 { die( include('../../../error_file/alert.php') ); }


# =================================================================================== #
function catalog_pagelist() {
  global $db, $prefix, $admin, $admin_file, $language, $module_name, $querylang, $multilingual, $name_prefix, $page;
 include_once('header.php');
    	 $ofsppg = 10; // Items per page
    	 $ofsbgn = ($page * $ofsppg) - $ofsppg;
         ?>
<div class="ls-icon-layers"></div>
  <h2><?php echo ''._CATALOG_PAGELIST.''; ?><span class="pull-right"><a href="#" class="add-new-h2"></a></span></h2>

  <!-- Main menu bar -->
  <div id="ls-main-nav-bar">
    <a href="<?php echo ''.$admin_file.'.php?op='.$name_prefix.'_pageadd' ;?>" class="layers active">Aggiungi Prodotto</a>
    <a href="<?php echo ''.$admin_file.'.php?op='.$name_prefix.'_main&daynum=10' ;?>" class="callbacks">Torna elenco</a>
    <a href="#" class="support unselectable">Documentazione</a>
    <a href="#" class="clear unselectable"></a>
  </div>
    
        
<div class="row-fluid">
  <div class="span12">
    <table class="table table-striped table-bordered mediaTable">
      <thead>
      <tr>
        <th class="optional">#</span></th>
        <th class="optional"><?php echo ''._ICON.''; ?></th>
        <th class="essential persist"><?php echo ''._TITLE.''; ?></th>
        <th class="optional"><?php echo ''._WEIGHT.''; ?></th>
        <th class="optional"><?php echo ''._CATALOG_CODE.''; ?></th>
        <th class="optional"><?php echo ''._DATEINS.''; ?></th>
        <th class="optional"><?php echo ''._CATEGORY.''; ?></th>
        <th class="optional"><?php echo ''._LANGUAGE.''; ?></th>
        <th class="optional"><?php echo ''._STATUS.''; ?></th>
        <th class="optional"><?php echo ''._HITS.''; ?></th>
        <th class="essential"><?php echo ''._FUNCTIONS.''; ?></th>
      </tr>
      </thead>
      <tbody>
		   <?php
  		   $res = $db->sql_query('SELECT *,DATE_FORMAT(date_add, "%d/%m/%Y %H:%i:%s") as date_it 
                                  FROM '.$prefix.'_catalog_products 
                                  ORDER BY weight DESC 
                                  LIMIT '.$ofsbgn.','.$ofsppg.'');
    	   $numrows = $db->sql_numrows($res);
     while ($row = $db->sql_fetchrow($res)) 
   	       {
		   $id_catalog = intval($row['id_catalog']);
		   $id_category = intval($row['id_category']);
		   $id_partner = intval($row['id_partner']);
           $aid = stripslashes(check_html($row['aid'], "nohtml"));
           $title = stripslashes(check_html($row['title'], "nohtml"));
           $uname = stripslashes(check_html($row['aid'], "nohtml"));
           $codepro = stripslashes(check_html($row['codepro'], "nohtml"));
		   $mydate = $row['date_it'];
		   $stars = stripslashes($row['stars']);
           $alanguage = stripslashes($row['language']);
           $counter = intval($row['counter']);
		   $mystatus = intval($row['status']);
		   $weight = intval($row['weight']);
		   $rowcat = $db->sql_fetchrow($db->sql_query('SELECT title,parentid 
		   											   FROM '.$prefix.'_categories 
													   WHERE id_category='.$id_category.''));
           $ctitle = stripslashes(check_html($rowcat['title'], "nohtml"));
		   $rowpat = $db->sql_fetchrow($db->sql_query('SELECT title 
		   											   FROM '.$prefix.'_partners 
													   WHERE id_partner='.$id_partner.''));
           $partners = stripslashes(check_html($rowpat['title'], "nohtml"));
        if (empty($partners)) { $partners = $aid; }
		   $rowserv = $db->sql_fetchrow($db->sql_query('SELECT imgfile,attachfile 
		   											   FROM '.$prefix.'_catalog_service 
													   WHERE id_catalog='.$id_catalog.''));
           $imgfile = $rowserv['imgfile'];
           $codehtl = intval($rowserv['attachfile']);
		   $weight1 = $weight - 1;
		   $weight3 = $weight + 1;
		   $row_res = $db->sql_fetchrow($db->sql_query('SELECT id_catalog 
                                                        FROM '.$prefix.'_catalog_products  
                                                        WHERE weight='.$weight1.''));
		   $bid1 = intval($row_res['id_catalog']);
		   $con1 = ''.$bid1.'';
		   $row_res2 = $db->sql_fetchrow($db->sql_query('SELECT id_catalog 
                                                         FROM '.$prefix.'_catalog_products  
                                                         WHERE weight='.$weight3.''));
		   $bid2 = intval($row_res2['id_catalog']);
		   $con2 = ''.$bid2.'';
		   $oplink = ''.$name_prefix.'_pagelist';
 		   $pag_edit    = '<a href="'.$admin_file.'.php?op='.$name_prefix.'_pageedit&id_catalog='.$id_catalog.'&oplink='.$oplink.'&page='.$page.'">'._IMG_EDIT.'</a>';
		   $pag_double  = '<a href="'.$admin_file.'.php?op='.$name_prefix.'_pagedouble&id_catalog='.$id_catalog.'&oplink='.$oplink.'&page='.$page.'">'._IMG_DOUBLE.'</a>';
		   $pag_delete  = '<a href="'.$admin_file.'.php?op='.$name_prefix.'_pagedelete&id_catalog='.$id_catalog.'&oplink='.$oplink.'&page='.$page.'">'._IMG_DELETE.'</a>';
		   $pag_desc    = '<a href="'.$admin_file.'.php?op='.$name_prefix.'_desc&id_catalog='.$id_catalog.'&oplink='.$oplink.'&page='.$page.'">'._IMG_DESC.'</a>';
		   $pag_service = '<a href="'.$admin_file.'.php?op='.$name_prefix.'_servlist&id_catalog='.$id_catalog.'&oplink='.$oplink.'&page='.$page.'">'._IMG_SERVICE.'</a>';
		   $pag_option  = '<a href="'.$admin_file.'.php?op='.$name_prefix.'_optlist&id_catalog='.$id_catalog.'&oplink='.$oplink.'&page='.$page.'">'._IMG_OPTION.'</a>';
//		   $pag_gallery = '<a href="'.$admin_file.'.php?op='.$name_prefix.'_gallist&id_catalog='.$id_catalog.'&oplink='.$oplink.'&page='.$page.'">'._IMG_GALLERY.'</a>';
		   $link_url = 'modules.php?name='.$module_name.'&amp;op=catalog_product&amp;id_catalog='.$id_catalog.'';
		   ?>
           <tr>
		     <td align="center"><span class="atiny"><?php echo ''.$weight.''; ?></span></td>
		 	 <td align="center" class="thumbnail">
			 <?php
			 if (empty($codehtl)) { $newimage = ''.$id_catalog.'/'.$imgfile.''; } else { $newimage = ''.$codehtl.'/'.$imgfile.''; }
			 $image_path = 'uploads/images/products/'.$newimage.'';
             $thumb_path = '<img src="'.image_cache('uploads/images/products/'.$newimage,180,135).'" />';		
             $mini_path = '<img src="'.image_cache('uploads/images/products/'.$newimage,30,23).'" rel="#photo'.$id_catalog.'" />';		
          if ($imgfile != '' && file_exists($image_path)) 
             { echo '<a href="'.$image_path.'" title="Image_4 title long title long title long">'.$thumb_path.'</a>'; } 
        else { echo '<img src="images/no_images.jpg" border="0" width="30" height="20" />'; }
			 ?>
             </td>
		 	 <td><?php echo '<span class="atitlinkblu"><a href="'.$link_url.'">'.$title.'<br />';
			 for ( $i=0; $i < $stars; $i++ ) { echo '<img src="images/articles/stars.gif" alt="Stars" border="0" style="position:relative; top:2px" />'; }
			 echo '</a></span><span class="atiny">&nbsp;-&nbsp;'.$partners.'</span>'; ?></td>
             <td align="center">
             <?php
	      if ($con1) { echo '<a href="'.$admin_file.'.php?op='.$name_prefix.'_pagechgorder&weight='.$weight.'&bidori='.$id_catalog.'&weightrep='.$weight1.'&bidrep='.$con1.'&oplink='.$oplink.'&page='.$page.'">'._IMG_BLOCKDOWN.'</a>'; }
	      if ($con2) { echo '<a href="'.$admin_file.'.php?op='.$name_prefix.'_pagechgorder&weight='.$weight.'&bidori='.$id_catalog.'&weightrep='.$weight3.'&bidrep='.$con2.'&oplink='.$oplink.'&page='.$page.'">'._IMG_BLOCKUP.'</a>'; }
	         ?>
             </td>
		     <td align="center"><span class="atiny"><?php echo ''.$codepro.''; ?></span></td>
		     <td align="center"><span class="atiny"><?php echo ''.$mydate.''; ?></span></td>
		     <td align="center"><span class="atiny"><?php echo ''.$ctitle.'';?></span></td>
		     <td align="center"><span class="atiny"><?php echo ''.$alanguage.''; ?></span></td>
		     <td align="center" class="atiny">
			 <?php
          if ($mystatus == 0) { echo '<span class="label label-danger sl_status">'._CATALOG_NOACTIVE.'</span>'; }
	  elseif ($mystatus == 1) { echo '<span class="label label-success sl_status">'._CATALOG_ACTIVE.'</span>'; }
      elseif ($mystatus == 2) { echo '<span class="label label-info sl_status">'._CATALOG_ONSALE.'</span>'; }
      elseif ($mystatus == 3) { echo '<span class="label label-warning sl_status">'._CATALOG_SUSPENDED.'</span>'; }
      elseif ($mystatus == 4) { echo '<span class="label label-gebo sl_status">'._CATALOG_SOLDOUT.'</span>'; }
	    else {}
			 ?>
             </td>
		 	 <td align="center"><span class="atiny"><?php echo ''.$counter.''; ?></span></td>
		 	 <td align="center"><?php echo ''.$pag_edit.'&nbsp;'.$pag_double.'&nbsp;'.$pag_delete.'&nbsp;'.$pag_option.'&nbsp;'.$pag_desc.'&nbsp;'.$pag_service.''; ?></td>
	 	   </tr> 
		   <?php
		   }
		   ?>
      </tbody>
    </table>
  </div>
</div>
         <?php
 include_once('footer.php');
         }


?>