<?php
/**
 * Sai do sistema enviando um erro 404
 */
function sair() {
  header ('HTTP/1.0 404 Not Found');
  header ('Status: 404 Not Found');
  $_SERVER['REDIRECT_STATUS'] = 404;
  exit('<h1>404</h1>');
}

// Requisitando o OsCommerce
include('includes/application_top.php');


$dirname = DIR_FS_CATALOG.DIR_WS_MODULES.'payment/cobredireto/';
$file = $dirname.'retorno.php';

if (!file_exists($file)) sair();

/**
 * Executa a captura do retorno automático
 *
 * Esta função será chamada automáticamente pelo arquivo ~/retorno.php
 *
 */
function captura($cod_pedido, $status) {
  if ((int) $status === 0){
    tep_db_query('
      update '.TABLE_ORDERS.'
        set orders_status = 2, last_modified = now() 
        where orders_id = '.(int) $order_id
    );
  }
}

include($file);
