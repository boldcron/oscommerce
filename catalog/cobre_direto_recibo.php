<?php
if (!isset($_GET['uid'])) die('<h1>Erro!</h1><p>Esta url n&atilde;o pode ser acessada diretamente.</p>');
$uid = $_GET['uid'];
include('includes/application_top.php');
$result = tep_db_query("SELECT * FROM `oscommerce_cobredireto_session` WHERE cod = '{$uid}'");
if (!mysql_num_rows($result)) die('<h1>Erro!</h1><p>UID n&atilde;o encontrado!</p>');

$row = mysql_fetch_object($result);
tep_db_query("delete FROM `oscommerce_cobredireto_session` WHERE id = '{$row->id}'");

$_SESSION = unserialize($row->session);
// Pegando de checkout_process.php

// Zerando o carrinho
$cart->reset(true);

// unregister session variables used during checkout
tep_session_unregister('sendto');
tep_session_unregister('billto');
tep_session_unregister('shipping');
tep_session_unregister('payment');
tep_session_unregister('comments');

tep_redirect(tep_href_link(FILENAME_CHECKOUT_SUCCESS, '', 'SSL'));
