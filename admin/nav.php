<?php 
global $op,$admin_file;
?>
<li class="dropdown"> <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-book icon-white"></i> Gestione Prodotti <b class="caret"></b></a>
  <ul class="dropdown-menu">
    <li><a href="<?php echo $admin_file;?>.php?op=catalog_add_product">Aggiungi Prodotto</a></li>
    <li><a href="<?php echo $admin_file;?>.php?op=catalog_add_bundling">Associa Prodotti</a></li>
    <li><a href="<?php echo $admin_file;?>.php?op=catalog_list_bundling">Lista Prodotti Associati</a></li>
    <li><a href="<?php echo $admin_file;?>.php?op=catalog_list_product">Lista Prodotti</a></li>
  </ul>
</li>
<li class="dropdown"> <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-list-alt icon-white"></i> Fornitori <b class="caret"></b></a>
  <ul class="dropdown-menu">
    <li><a href="<?php echo $admin_file;?>.php?op=catalog_add_manufacturer">Aggiungi Fornitori</a></li>
    <li><a href="<?php echo $admin_file;?>.php?op=catalog_list_manufacturer">Lista Fornitori</a></li>
  </ul>
</li>
<li class="dropdown"> <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-list-alt icon-white"></i> Categorie <b class="caret"></b></a>
  <ul class="dropdown-menu">
    <li><a href="<?php echo $admin_file;?>.php?op=catalog_list_cat">Lista Categoria</a></li>
    <li><a href="<?php echo $admin_file;?>.php?op=catalog_add_cat">Aggiungi Categoria</a></li>
  </ul>
</li>
<li class="dropdown"> <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-list-alt icon-white"></i> Camere <b class="caret"></b></a>
  <ul class="dropdown-menu">
    <li><a href="<?php echo $admin_file;?>.php?op=catalog_pages&amp;action=add">Aggiungi Camera</a></li>
    <li><a href="<?php echo $admin_file;?>.php?op=catalog_pages">Lista Camere</a></li>
  </ul>
</li>
<li class="dropdown"> <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-list-alt icon-white"></i> Newsletter <b class="caret"></b></a>
  <ul class="dropdown-menu">
    <li><a href="<?php echo $admin_file;?>.php?op=catalog_newsletter_users_list">Lista Utenti</a></li>
  </ul>
</li>
<li class="dropdown"> <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-list-alt icon-white"></i> Fidelity Card <b class="caret"></b></a>
  <ul class="dropdown-menu">
    <li><a href="<?php echo $admin_file;?>.php?op=catalog_fidelity_card_list">Lista Ordini da confermare</a></li>
    <li><a href="<?php echo $admin_file;?>.php?op=catalog_fidelity_card_user_list">Lista Utenti</a></li>
  </ul>
</li>
<!--
<li class="dropdown"> <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-list-alt icon-white"></i> Impostazioni Generali <b class="caret"></b></a>
  <ul class="dropdown-menu">
    <li><a href="<?php echo $admin_file;?>.php?op=catalog_fidelity_card">Configurazione Base</a></li>
    <li><a href="<?php echo $admin_file;?>.php?op=catalog_fidelity_card">Paypal ipn</a></li>
    <li><a href="<?php echo $admin_file;?>.php?op=catalog_fidelity_card">Gestione tipologia pagamenti</a></li>
  </ul>
</li>
-->