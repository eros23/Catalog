<?php  // Last Updated: 25/07/2013

if (!defined('ADMIN_FILE'))
	  	 { die( include('../../../error_file/alert.php') ); }


# =================================================================================== #
		 $module_name = basename(dirname(dirname(__FILE__)));
  global $prefix, $db, $admin_file, $multilingual, $currentlang;
		 $aid = substr("$aid", 0,25);
		 $row = $db->sql_fetchrow($db->sql_query('SELECT title, admins FROM '.$prefix.'_modules WHERE title="'.$module_name.'"'));
		 $row2 = $db->sql_fetchrow($db->sql_query("SELECT name, radminsuper FROM ".$prefix."_authors WHERE aid='$aid'"));
		 $admins = explode(",", $row['admins']);
		 $auth_user = 0;
	 for ($i=0; $i < sizeof($admins); $i++) { if ($row2['name'] == "$admins[$i]" AND !empty($row['admins'])) { $auth_user = 1;	} }
	  if ($row2['radminsuper'] == 1 || $auth_user == 1) 
	     {
         $name_prefix = 'catalog';
	  if ($multilingual == 1) { $querylang = 'AND (language=\''.$currentlang.'\' OR language=\'\')'; } 
	else { $querylang = ''; }
	  if (isset($_GET['daynum'])) { $daynum = addslashes($_GET['daynum']); } else { $daynum = ''; }
	  if (isset($_GET['page'])) { $page = intval($_GET['page']); } else { $page = 1; }


# =================================================================================== #
function catalog_main($daynum) {
  global $db, $prefix, $admin, $admin_file, $language, $module_name, $multilingual, $name_prefix, $page;
 include_once('header.php');
		 $ofsppg = 10; // Items per page
		 $ofsbgn = ($page*$ofsppg)-$ofsppg;
	     $Realdate = mktime();
    	 $olddate = $Realdate - $daynum*24*60*60;
    	 $d = date("Ymd", $olddate);
		 $result = $db->sql_query('SELECT * 
		 						   FROM '.$prefix.'_catalog_orders 
								   WHERE date > '.$d.' 
								   ORDER BY date,order_number DESC 
								   LIMIT '.$ofsbgn.','.$ofsppg.'');
    	 $numrows = $db->sql_numrows($result);
         ?>
<div class="row-fluid">
  <div class="span12">
    <h3 class="heading"><?php echo _CATALOG_ADMIN; ?></h3>
  </div>
</div>
<div class="row-fluid">
  <div class="span8">
    <div class="heading clearfix">
      <h3 class="pull-left"><?php echo ''._CATALOG_ORDERLIST.' '._CATALOG_FORLAST.' '.$daynum.' '._CATALOG_DAYS.''; ?></h3>
      <span class="pull-right label label-important"><?php echo ''.$numrows.' '._CATALOG_ORDERS.''; ?></span>
    </div>
    <table class="table table-striped table-bordered mediaTable">
      <thead>
      <tr>
        <th class="optional">#</th>
        <th class="optional"><?php echo ''._CATALOG_ORDERNUMBER.''; ?></th>
        <th class="essential persist"><?php echo ''._NAME.''; ?></th>
        <th class="optional"><?php echo 'Memo'; ?></th>
        <th class="optional"><?php echo ''._TOTAL.''; ?></th>
        <th class="optional"><?php echo ''._CATALOG_PAYD.''; ?></th>
        <th class="essential"><?php echo ''._CATALOG_ORDERED.''; ?></th>
        <th class="essential"><?php echo ''._CATALOG_SHIPPED.''; ?></th>
        <th class="essential"><?php echo ''._FUNCTIONS.''; ?></th>
      </tr>
      </thead>
      <tbody>
           <?php
//        if ($numrows > 0) 
//		   {
	  while(list($lid, $date, $order_number, $ip, $uname, $order_description, $ship_info, $total_description, $partecipant_order, $comment_desc, $ship_date, $paid, $ordered, $order_status, $memo)=$db->sql_fetchrow($result))
	  	   {
		   $date_it = ConvertitoreData($date);
		   $ord_ship   = '<a href="'.$admin_file.'.php?op=catalog_orderconferm&amp;date='.$date.'&amp;order_number='.$order_number.'&amp;daynum='.$daynum.'">';
		   $ord_edit = '<a href="'.$admin_file.'.php?op=catalog_orderedit&amp;lid='.$lid.'">';
		   $ord_delete = '<a href="'.$admin_file.'.php?op=catalog_orderdelete&amp;lid='.$lid.'&amp;daynum='.$daynum.'">';
	    if ($uname == '0') $uname = 'Guest';
		   $memo_view = ''.$admin_file.'.php?op=catalog_memoshow&amp;lid='.$lid.'';
           $click_memo = "onclick=\"popupWindow('".$memo_view."', 'Aiuto', 440, 450, 1)\"";
		   $ord_view = ''.$admin_file.'.php?op=catalog_ordershow&amp;date='.$date.'&amp;order_number='.$order_number.'';
           $click_ord = "onclick=\"popupWindow('".$ord_view."', 'Aiuto', 440, 450, 1)\"";
		   $resuser = $db->sql_fetchrow($db->sql_query('SELECT * FROM '.$prefix.'_users WHERE user_id='.$uname.''));
           $user_id = $resuser['user_id'];
           $realname = $resuser['realname'];
           $familyname = $resuser['familyname'];
		   $link_user = '<a href="'.$admin_file.'.php?op=YAdetailsUser&amp;chng_uid='.$user_id.'">';
		   $memo_edit = '<a href="'.$admin_file.'.php?op=catalog_memoedit&amp;lid='.$lid.'">';
		   ?>
           <tr>
 	         <td align="center"><span class="atiny"><?php echo ''.$lid.''; ?></span></td>
 	         <td align="center"><?php echo '<a href="#" '.$click_ord.'>'.$date_it.'-'.$order_number.'</a>'; ?></td>
 	         <td><span class="atiny"><?php echo ''.$link_user.''.$realname.' '.$familyname.'</a>'; ?></span></td>
 	         <td align="center"><span class="atiny"><?php echo '<a href="#" '.$click_memo.'>Memo</a>'; ?></span></td>
 	         <td align="center"><span class="atiny"><?php echo ''.$total.''; ?></span></td>
 	         <td align="center"><span class="atiny">
			 <?php 
		  if ($paid == 1) { echo '<a href="'.$admin_file.'.php?op=catalog_paidchg&amp;lid='.$lid.'&amp;paid=1"><font color="#FF0000"><strong>'._YES.'</strong></font></a>'; } 
      elseif ($paid == 0) { echo '<a href="'.$admin_file.'.php?op=catalog_paidchg&amp;lid='.$lid.'&amp;paid=0"><strong>'._NO.'</strong></a>'; }
			 ?>
             </span></td>
 	         <td align="center"><span class="atiny">
			 <?php 
		  if ($ordered == 1) { echo '<a href="'.$admin_file.'.php?op=catalog_orderchg&amp;lid='.$lid.'&amp;ordered=1"><font color="#FF0000"><strong>'._YES.'</strong></font></a>'; } 
      elseif ($ordered == 0) { echo '<a href="'.$admin_file.'.php?op=catalog_orderchg&amp;lid='.$lid.'&amp;ordered=0"><strong>'._NO.'</strong></a>'; }
			 ?>
             </span></td>
			 <?php 
		  if ($order_status == 0) 
		  	 { 
		echo '<td align="center" width="8%"><span class="atiny">'.$ord_ship.'<strong>'._NO.'</strong></a></span></td>'; 
		echo '<td align="center" width="15%">'.$ord_edit.''._IMG_EDIT.'</a>&nbsp;&nbsp;'.$ord_delete.''._IMG_DELETE.'</a>&nbsp;&nbsp;'.$memo_edit.''._IMG_MEMO.'</a></td>'; 
			 } 
        else 
		     { 
		     $ship_date = strftime("%m/%d/%y", strtotime($ship_date));	   
		echo '<td align="center" colspan="2" width="20%"><span class="atiny">'._SHIPPEDOF.' '.$ship_date.'</span>&nbsp;&nbsp;'.$ord_edit.''._IMG_EDIT.'</a></td>'; 
		     }
			 ?>
           </tr>
           <?php
    	   }
		   ?>
      </tbody>
    </table>
  </div>
  <div class="span4" id="user-list">
    <h3 class="heading"><?php echo ''._CATALOG_CLIENTS.''; ?> <small><?php echo ''._CATALOG_FROMLAST.' 24 '._CATALOG_HOURS.''; ?></small></h3>
    <div class="row-fluid">
      <div class="input-prepend">
        <span class="add-on ad-on-icon"><i class="icon-user"></i></span><input type="text" class="user-list-search search" placeholder="<?php echo ''._CATALOG_SEARCHCLIENT.''; ?>" />
      </div>
	  <ul class="nav nav-pills line_sep">
	    <li class="dropdown">
		  <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo ''._CATALOG_ORDERBY.''; ?> <b class="caret"></b></a>
		  <ul class="dropdown-menu sort-by">
            <li><a href="javascript:void(0)" class="sort" data-sort="sl_name"><?php echo ''._CATALOG_ORDBYNAME.''; ?></a></li>
		    <li><a href="javascript:void(0)" class="sort" data-sort="sl_status"><?php echo ''._CATALOG_ORDBYSTATUS.''; ?></a></li>
		  </ul>
		</li>
		<li class="dropdown">
		  <a class="dropdown-toggle" data-toggle="dropdown" href="#">Show <b class="caret"></b></a>
		  <ul class="dropdown-menu filter">
		    <li class="active"><a href="javascript:void(0)" id="filter-none">All</a></li>
			<li><a href="javascript:void(0)" id="filter-online">Online</a></li>
			<li><a href="javascript:void(0)" id="filter-offline">Offline</a></li>
	      </ul>
		</li>
	  </ul>
	</div>
    <?php
    $resuser = $db->sql_query('SELECT uid,first_name,last_name,user_email,verified,DATE_FORMAT(registered, "%d/%m/%Y %H:%i:%s") as date_it 
		   					   FROM '.$prefix.'_utenti
							   WHERE verified=1 
							   ORDER BY uid DESC 
							   LIMIT '.$ofsbgn.','.$ofsppg.'');
	?>
	<ul class="list user_list">
      <?php
      while($rowuser = $db->sql_fetchrow($resuser)) 
	 	   {
		   $uid = intval($rowuser['uid']);
           $first_name = trim(stripslashes(check_html($rowuser['first_name'], "nohtml")));
           $last_name = trim(stripslashes(check_html($rowuser['last_name'], "nohtml")));
           $user_email = trim(stripslashes(check_html($rowuser['user_email'], "nohtml")));
		   $verified = intval($rowuser['verified']);
	  ?>
	  <li>
        <?php 
     if ($verified == 1) { echo '<span class="label label-success pull-right sl_status">online</span>'; } 
 elseif ($verified == 0) { echo '<span class="label label-success pull-right sl_status">offline</span>'; }
	    ?>
		<a href="#" class="sl_name"><?php echo ''.$first_name.' '.$last_name.''; ?></a><br />
		<small class="s_color sl_email"><?php echo ''.$user_email.''; ?></small>
	  </li>
	  <?php
	  }
	  ?>
	</ul>
	<div class="pagination"><ul class="paging bottomPaging"></ul></div>
  </div>
</div>
         <?php
 include_once('footer.php');
	     }


# =================================================================================== #
  switch ($op) 
         {
 default: 									catalog_main($daynum);												                                    	break;
		 }
		 } 
	else 
		 {
 include_once('header.php');
		 OpenTable();
	echo '<strong>'._WORNING.'</strong><br /><br />You do not have administration permissions for module '.$module_name.'!';
		 CloseTable();
 include_once('footer.php');
		 }
	  die();


?>