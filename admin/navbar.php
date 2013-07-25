<?php  // Last Updated: 23/07/2013


# =================================================================================== #
  global $op, $idcatalog, $admin_file, $module_name, $oplink, $page, $name_prefix;
		 $base_path = '<a class="toolbar" href="'.$admin_file.'.php?op='.$name_prefix.'';
		 $helppath = "onclick=\"popupWindow('includes/help/$module_name.html', 'Aiuto', 640, 480, 1)\"";
		 $nb = '';	$nc = '';	$oc = '';	$b = '>'._NAVBACK.'</a>';	$c = '>'._NAVNEW.'</a>';

// CAT
	  if (isset($_GET['query'])) { $op_clinc = ''.$base_path.'_catsearch&query='.$_GET['query'].'&page='.$page.''; } 
  elseif (isset($_GET['planguage'])) { $op_clinc = ''.$base_path.'_catlang&planguage='.$_GET['planguage'].'&page='.$page.'';}
  elseif (isset($_GET['pcid'])) { $op_clinc = ''.$base_path.'_catlang&pcid='.$_GET['pcid'].'&page='.$page.'';}
	else { $op_clinc = ''.$base_path.'_catlist&page='.$page.''; }

	  if ($op == ''.$name_prefix.'_catlist') { $nb = ''.$base_path.'_main"'.$b.''; $nc = ''.$base_path.'_catadd"'.$c.''; $oc = $helppath; }
	  if ($op == ''.$name_prefix.'_catsearch') { $nb = ''.$base_path.'_catlist"'.$b.''; $nc = ''; $oc = $helppath; }
	  if ($op == ''.$name_prefix.'_catcat') { $nb = ''.$base_path.'_catlist"'.$b.''; $nc = ''; $oc = $helppath; }
	  if ($op == ''.$name_prefix.'_catlang') { $nb = ''.$base_path.'_catlist"'.$b.''; $nc = ''; $oc = $helppath; }
	  if ($op == ''.$name_prefix.'_catadd') { $nb = ''.$base_path.'_catlist"'.$b.''; $nc = ''; $oc = $helppath; }
	  if ($op == ''.$name_prefix.'_catedit') { $nb = ''.$op_clinc.'"'.$b.''; $nc = ''; $oc = $helppath; }
	  if ($op == ''.$name_prefix.'_catdelete') { $nb = ''.$op_clinc.'"'.$b.''; $nc = ''; $oc = $helppath; }
	  if ($op == ''.$name_prefix.'_catmove') { $nb = ''.$op_clinc.'"'.$b.''; $nc = ''; $oc = $helppath; }
	  if ($op == ''.$name_prefix.'_catdouble') { $nb = ''.$op_clinc.'"'.$b.''; $nc = ''; $oc = $helppath; }

// PAGE
	  if (isset($_GET['query'])) { $op_link = ''.$base_path.'_pagesearch&query='.$_GET['query'].'&page='.$page.''; } 
  elseif (isset($_GET['planguage'])) { $op_link = ''.$base_path.'_pagelang&planguage='.$_GET['planguage'].'&page='.$page.'';}
  elseif (isset($_GET['pcid'])) { $op_link = ''.$base_path.'_pagelang&pcid='.$_GET['pcid'].'&page='.$page.'';}
	else { $op_link = ''.$base_path.'_pagelist&page='.$page.''; }
	
	  if ($op == ''.$name_prefix.'_pagelist') { $nb = ''.$base_path.'_main"'.$b.''; $nc = ''.$base_path.'_pageadd"'.$c.''; $oc = $helppath; }
	  if ($op == ''.$name_prefix.'_pagesearch') { $nb = ''.$base_path.'_pagelist"'.$b.''; $nc = ''; $oc = $helppath; }
	  if ($op == ''.$name_prefix.'_pagecat') { $nb = ''.$base_path.'_pagelist"'.$b.''; $nc = ''; $oc = $helppath; }
	  if ($op == ''.$name_prefix.'_pagelang') { $nb = ''.$base_path.'_pagelist"'.$b.''; $nc = ''; $oc = $helppath; }
	  if ($op == ''.$name_prefix.'_pageadd') { $nb = ''.$base_path.'_pagelist"'.$b.''; $nc = ''; $oc = $helppath; }
	  if ($op == ''.$name_prefix.'_pageedit') { $nb = ''.$op_link.'"'.$b.''; $nc = ''; $oc = $helppath; }
	  if ($op == ''.$name_prefix.'_pagedelete') { $nb = ''.$op_link.'"'.$b.''; $nc = ''; $oc = $helppath; }
	  if ($op == ''.$name_prefix.'_pagedouble') { $nb = ''.$op_link.'"'.$b.''; $nc = ''; $oc = $helppath; }

// OPT
	  if ($op == ''.$name_prefix.'_optlist') { $nb = ''.$op_link.'"'.$b.''; $nc = ''.$base_path.'_optadd&idcatalog='.$idcatalog.'"'.$c.''; $oc = $helppath; }
	  if ($op == ''.$name_prefix.'_optadd') { $nb = ''.$base_path.'_optlist&idcatalog='.$idcatalog.'&page='.$page.'"'.$b.''; $nc = ''; $oc = $helppath; }
	  if ($op == ''.$name_prefix.'_optedit') { $nb = ''.$base_path.'_optlist&idcatalog='.$idcatalog.'&page='.$page.'"'.$b.''; $nc = ''; $oc = $helppath; }
	  if ($op == ''.$name_prefix.'_optdel') { $nb = ''.$base_path.'_optlist&idcatalog='.$idcatalog.'&page='.$page.'"'.$b.''; $nc = ''; $oc = $helppath; }
	  if ($op == ''.$name_prefix.'_optdouble') { $nb = ''.$base_path.'_optlist&idcatalog='.$idcatalog.'&page='.$page.'"'.$b.''; $nc = ''; $oc = $helppath; }

// DESC
	  if ($op == ''.$name_prefix.'_desc') { $nb = ''.$op_link.'"'.$b.''; $nc = ''.$base_path.'_descadd&idcatalog='.$idcatalog.'"'.$c.''; $oc = $helppath; }
	  if ($op == ''.$name_prefix.'_desclang') { $nb = ''.$base_path.'_desc&idcatalog='.$idcatalog.'&page='.$page.'"'.$b.''; $nc = ''; $oc = $helppath; }
	  if ($op == ''.$name_prefix.'_descadd') { $nb = ''.$base_path.'_desc&idcatalog='.$idcatalog.'&page='.$page.'"'.$b.''; $nc = ''; $oc = $helppath; }
	  if ($op == ''.$name_prefix.'_descedit') { $nb = ''.$base_path.'_desc&idcatalog='.$idcatalog.'&page='.$page.'"'.$b.''; $nc = ''; $oc = $helppath; }
	  if ($op == ''.$name_prefix.'_descdel') { $nb = ''.$base_path.'_desc&idcatalog='.$idcatalog.'&page='.$page.'"'.$b.''; $nc = ''; $oc = $helppath; }
	  if ($op == ''.$name_prefix.'_descdouble') { $nb = ''.$base_path.'_desc&idcatalog='.$idcatalog.'&page='.$page.'"'.$b.''; $nc = ''; $oc = $helppath; }

// SERV
	  if ($op == ''.$name_prefix.'_servlist') { $nb = ''.$op_link.'"'.$b.''; $nc = ''.$base_path.'_servadd&idcatalog='.$idcatalog.'"'.$c.''; $oc = $helppath; }
	  if ($op == ''.$name_prefix.'_servlang') { $nb = ''.$base_path.'_servlist&idcatalog='.$idcatalog.'&page='.$page.'"'.$b.''; $nc = ''; $oc = $helppath; }
	  if ($op == ''.$name_prefix.'_servadd') { $nb = ''.$base_path.'_servlist&idcatalog='.$idcatalog.'&page='.$page.'"'.$b.''; $nc = ''; $oc = $helppath; }
	  if ($op == ''.$name_prefix.'_servedit') { $nb = ''.$base_path.'_servlist&idcatalog='.$idcatalog.'&page='.$page.'"'.$b.''; $nc = ''; $oc = $helppath; }
	  if ($op == ''.$name_prefix.'_servdel') { $nb = ''.$base_path.'_servlist&idcatalog='.$idcatalog.'&page='.$page.'"'.$b.''; $nc = ''; $oc = $helppath; }
	  if ($op == ''.$name_prefix.'_servdouble') { $nb = ''.$base_path.'_servlist&idcatalog='.$idcatalog.'&page='.$page.'"'.$b.''; $nc = ''; $oc = $helppath; }

// DESC
	  if ($op == ''.$name_prefix.'_treat') { $nb = ''.$op_link.'"'.$b.''; $nc = ''.$base_path.'_treatadd&idcatalog='.$idcatalog.'"'.$c.''; $oc = $helppath; }
	  if ($op == ''.$name_prefix.'_treatlang') { $nb = ''.$base_path.'_treat&idcatalog='.$idcatalog.'&page='.$page.'"'.$b.''; $nc = ''; $oc = $helppath; }
	  if ($op == ''.$name_prefix.'_treatadd') { $nb = ''.$base_path.'_treat&idcatalog='.$idcatalog.'&page='.$page.'"'.$b.''; $nc = ''; $oc = $helppath; }
	  if ($op == ''.$name_prefix.'_treatedit') { $nb = ''.$base_path.'_treat&idcatalog='.$idcatalog.'&page='.$page.'"'.$b.''; $nc = ''; $oc = $helppath; }
	  if ($op == ''.$name_prefix.'_treatdel') { $nb = ''.$base_path.'_treat&idcatalog='.$idcatalog.'&page='.$page.'"'.$b.''; $nc = ''; $oc = $helppath; }
	  if ($op == ''.$name_prefix.'_treatdouble') { $nb = ''.$base_path.'_treat&idcatalog='.$idcatalog.'&page='.$page.'"'.$b.''; $nc = ''; $oc = $helppath; }


# ################################################################################### #
		 $adminnavbar[1] = '<table class="toolbar">
		 <tr>
		   <td class="button1" id="toolbar-new">'.$nc.'</td>
		   <td class="button1" id="toolbar-new">'.$nb.'</td>
		   <td class="button1" id="toolbar-help"><a href="#" '.$oc.' class="toolbar">'._NAVHELP.'</a></td>
		 </tr>
	   </table>';
			 			 	   	   			 			  

?>