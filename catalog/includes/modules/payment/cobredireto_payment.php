<?php
require (dirname(__FILE__).'/cobredireto/pagamento.php');

class cobredireto_payment {
  var $code         							= 'cobredireto_payment';
  var $title        							= MODULE_PAYMENT_COBREDIRETO_TEXT_TITLE;
  var $public_title 							= MODULE_PAYMENT_COBREDIRETO_TEXT_PUBLIC_TITLE;
  var $description  							= MODULE_PAYMENT_COBREDIRETO_TEXT_DESCRIPTION;
  var $sort_order   							= MODULE_PAYMENT_COBREDIRETO_SORT_ORDER;
  var $enabled     							= MODULE_PAYMENT_COBREDIRETO_STATUS;
  var $ambiente     							= MODULE_PAYMENT_COBREDIRETO_AMBIENTE;
  var $loja         							= MODULE_PAYMENT_COBREDIRETO_LOJA;
  var $usuario     							= MODULE_PAYMENT_COBREDIRETO_USUARIO;
  var $senha        							= MODULE_PAYMENT_COBREDIRETO_SENHA;  
  var $habilita_visa_credito     					= MODULE_PAYMENT_COBREDIRETO_VISA_CREDITO;
  var $habilita_master_credito      					= MODULE_PAYMENT_COBREDIRETO_MASTER_CREDITO;
  var $habilita_diners_credito		        			= MODULE_PAYMENT_COBREDIRETO_DINER_CREDITO;
  var $habilita_amex_credito						= MODULE_PAYMENT_COBREDIRETO_AMEX_CREDITO;  
  var $habilita_bradesco_debito     					= MODULE_PAYMENT_COBREDIRETO_BRADESCO_DEBITO;
  var $habilita_itau_debito 			        		= MODULE_PAYMENT_COBREDIRETO_ITAU_DEBITO;
  var $habilita_banco_brasil_debito     				= MODULE_PAYMENT_COBREDIRETO_BANCO_BRASIL_DEBITO;
  var $habilita_unibanco_debito     					= MODULE_PAYMENT_COBREDIRETO_UNIBANCO_DEBITO;
  var $habilita_real_debito     					= MODULE_PAYMENT_COBREDIRETO_REAL_DEBITO;
  var $habilita_banrisul_debito     					= MODULE_PAYMENT_COBREDIRETO_BANRISUL_DEBITO;
  var $habilita_bradesco_boleto     					= MODULE_PAYMENT_COBREDIRETO_BRADESCO_BOLETO;
  var $habilita_itau_boleto     					= MODULE_PAYMENT_COBREDIRETO_ITAU_BOLETO;
  var $habilita_banco_brasil_boleto 					= MODULE_PAYMENT_COBREDIRETO_BANCO_BRASIL_BOLETO;
  var $habilita_unibanco_boleto     					= MODULE_PAYMENT_COBREDIRETO_UNIBANCO_BOLETO;
  var $habilita_real_boleto     					= MODULE_PAYMENT_COBREDIRETO_REAL_BOLETO;

  // class constructor
  function cobredireto() {
    global $order;
    $this->enabled = (bool) $this->check();
    if (is_object($order)) $this->update_status();
  }

  // class methods
  function update_status() { }

  function javascript_validation() { return false; }
  
    
  /**
	    * Função que monta um array de todos os meios de pagamento habilitados no painel de administrativo
    	*
	    * @author VISIE Padrões Web - RZamana <zamana@visie.com.br>
    	* @date 08/18/2010
  **/     
  function monta_array_pagamentos()
  {
	  global $opcoes_pagamento;	  
	  $opcoes_pagamento = array ( array('id' => '0', 'text' => ' ') );

  	  if($this->habilita_visa_credito=="Sim")
	  	  array_push( $opcoes_pagamento  , array(  'id' => 'visa3dc' , 'text' => 'Cartão de Crédito Visa' ));
		  
  	  if($this->habilita_master_credito=="Sim")
	  	  array_push( $opcoes_pagamento  , array(  'id' => 'redecard_mastercard' , 'text' => 'Cartão de Crédito Mastercard' ));

  	  if($this->habilita_diners_credito=="Sim")
	  	  array_push( $opcoes_pagamento  , array(  'id' => 'redecard_diners' , 'text' => 'Cartão de Crédito Diners' ));

  	  if($this->habilita_amex_credito=="Sim")
	  	  array_push( $opcoes_pagamento  , array(  'id' => 'amex_webpos2p' , 'text' => 'Cartão de Crédito Amex' ));

  	  if($this->habilita_bradesco_debito=="Sim")
	  	  array_push( $opcoes_pagamento  , array(  'id' => 'bradesco' , 'text' => 'Débito / Transferência Bradesco' ));

  	  if($this->habilita_itau_debito=="Sim")
	  	  array_push( $opcoes_pagamento  , array(  'id' => 'itau' , 'text' => 'Débito / Transferência Banco Itaú' ));

  	  if($this->habilita_banco_brasil_debito=="Sim")
	  	  array_push( $opcoes_pagamento  , array(  'id' => 'bb' , 'text' => 'Débito / Transferência Banco do Brasil' ));

  	  if($this->habilita_unibanco_debito=="Sim")
	  	  array_push( $opcoes_pagamento  , array(  'id' => 'unibanco' , 'text' => 'Débito / Transferência Unibanco' ));

  	  if($this->habilita_real_debito=="Sim")
	  	  array_push( $opcoes_pagamento  , array(  'id' => 'real' , 'text' => 'Débito / Transferência Banco Real' ));

  	  if($this->habilita_banrisul_debito=="Sim")
	  	  array_push( $opcoes_pagamento  , array(  'id' => 'banrisul_pgta' , 'text' => 'Débito / Transferência Banrisul' ));

  	  if($this->habilita_bradesco_boleto=="Sim")
	  	  array_push( $opcoes_pagamento  , array(  'id' => 'boleto_bradesco' , 'text' => 'Boleto Bradesco' ));

  	  if($this->habilita_itau_boleto=="Sim")
	  	  array_push( $opcoes_pagamento  , array(  'id' => 'boleto_itau' , 'text' => 'Boleto Banco Itaú' ));

  	  if($this->habilita_banco_brasil_boleto=="Sim")
	  	  array_push( $opcoes_pagamento  , array(  'id' => 'boleto_bb' , 'text' => 'Boleto Banco do Brasil' ));

  	  if($this->habilita_unibanco_boleto=="Sim")
	  	  array_push( $opcoes_pagamento  , array(  'id' => 'boleto_unibanco' , 'text' => 'Boleto Unibanco' ));

  	  if($this->habilita_real_boleto=="Sim")
	  	  array_push( $opcoes_pagamento  , array(  'id' => 'boleto_real' , 'text' => 'Boleto Banco Real' ));    
  }
  
  function selection() 
  { 
	  /**
	    * Função responsável por exibir um dropdown ao cliente para escolher uma forma de pagamento 
    	*
	    * @author VISIE Padrões Web - RZamana <zamana@visie.com.br>
    	* @date 08/18/2010
	  **/    
	  global $order;  
	  global $opcoes_pagamento;	  	  
	  $this->monta_array_pagamentos();
      $selection = array('id' => $this->code,
                           'module' => $this->public_title,
                           'fields' => array(array('title' => 'Selecione a forma de pagamento:',
                                                    'field' => tep_draw_pull_down_menu('combobox_selecao', $opcoes_pagamento ))));
	  $opcoes_pagamento = array();
	  return $selection;
  }

  function confirmation() {
	    /**
	    * Informa o pagamento selecionado pelo cliente, na tela de confirmação de compra
    	*
	    * @author VISIE Padrões Web - RZamana <zamana@visie.com.br>
    	* @date 08/18/2010
	    **/  		
        global $HTTP_POST_VARS, $order;
		global $opcoes_pagamento;	  
		$this->monta_array_pagamentos();

    	for ($i=0, $n=sizeof($opcoes_pagamento); $i<$n; $i++) 
		{
	    		if($opcoes_pagamento[$i]['id']==$HTTP_POST_VARS['combobox_selecao'])
				{
					$descricao_combo        = $opcoes_pagamento[$i]['text'];
					$descricao_combo_codigo = $opcoes_pagamento[$i]['id'];
				}
    	}	


        $confirmation =  array('fields' => array( 
		                                         array('title' => 'Forma de pagamento:','field' => $descricao_combo ), 
		                                         array('title' => '','field' => tep_draw_hidden_field('valor_combo', $HTTP_POST_VARS['combobox_selecao']))));

		
	    $opcoes_pagamento = array();
        return $confirmation;
  
  }

  function pre_confirmation_check() { return false; }

  function process_button() { return false; }

  function before_process() { return false; }

  function _configura_produtos($order) {
    $produtos = array();
    foreach ($order->products as $item) {
      $produtos[] = array(
          'descricao' => $item['name'],
          'valor' => $item['final_price'],
          'quantidade' => $item['qty'],
          'id' => $item['id'],
          );
    }
    return $produtos;
  }

  function _configura_enderecos(&$pg, $order) {
    foreach (array ('customer'=>'CONSUMIDOR', 'billing'=>'COBRANCA', 'delivery'=>'ENTREGA') as $k=>$v) {
      $telefone = preg_replace('@[^\d]@', '', $order->customer['telephone']);
      $telefone = str_pad($telefone, 10, "0", STR_PAD_LEFT);
      $dados = array(
          'primeiro_nome' => $order->$k['firstname'],
          'ultimo_nome' => $order->$k['lastname'],
          'email' => $order->customer['email_address'],
          'tel_casa' => array(
            'area' => substr($telefone, 0, -8),
            'numero' => substr($telefone, -8),
            ),
          'cep' => $order->$k['postcode'],
          );
      $pg->endereco($dados, $v);
    }
  }

  function _get_cobre_direto_class() {
    if (class_exists('CobreDireto')) return;
  }

  function _efetua_compre_direto($insert_id, $order, $cart, $uid) {
	global $HTTP_POST_VARS, $order;
	    $this->_get_cobre_direto_class();
	    $base_url = HTTP_SERVER . DIR_WS_CATALOG;
	    $produtos = $this->_configura_produtos($order);
	    $pg = new Pg($insert_id);
	    $pg->set_usuario($this->usuario);
	    $pg->set_senha($this->senha);
    	$pg->set_loja($this->loja);
	    $pg->set_ambiente($this->ambiente);
    	$pg->url_recibo($base_url."cobre_direto_recibo.php?uid=$uid");
	    $pg->url_retorno($base_url.'cobre_direto_retorno.php');
    	$pg->url_erro($base_url."cobre_direto_recibo.php?uid=$uid");
	    $pg->frete(number_format($order->info['shipping_cost'], 2, '', ''));
	    $this->_configura_enderecos($pg, $order);

	    /**
	    * Envio de meio de pagamento selecionado pelo cliente para o sistema da cobre direto
    	*
	    * @author VISIE Padrões Web - RZamana <zamana@visie.com.br>
    	* @date 08/18/2010
	    **/  
		if( ($HTTP_POST_VARS['valor_combo'] != '0') && ($HTTP_POST_VARS['valor_combo'] != '') )
			$pg->pagamento($HTTP_POST_VARS['valor_combo']);
		
	    $pg->adicionar($produtos);
    	$pg->pagar();
  }	

  function after_process() {
    global $insert_id, $order, $cart;
    $uid = md5(uniqid()) . md5($insert_id);
    $this->_efetua_compre_direto($insert_id, $order, $cart, $uid);

    $data = array(
      'cod' => $uid,
      'session' => serialize($_SESSION),
    );

    $this->_insert_sql($data, 'oscommerce_cobredireto_session');
    
    // Limpa o carrinho
    $cart->reset(true);
    
    exit();
  }

  function get_error() { }

  function check() {
    if (gettype($this->enabled)!='bool') {
      $check_query = tep_db_query("select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_PAYMENT_COBREDIRETO_STATUS'");
      $this->enabled = (bool) tep_db_num_rows($check_query);
    }
    return $this->enabled;
  }

  function _insert_sql($dados, $table = TABLE_CONFIGURATION) {
    $values = array();
    foreach ($dados as $k=>$v)
      $values[] = in_array(strtoupper($v), array('NOW()', 'NOW ()')) ? 'NOW()' : "'".mysql_real_escape_string($v)."'";
    $sql = sprintf('INSERT INTO %s (%s) VALUES (%s)', $table, implode (', ', array_keys($dados)), implode (', ', $values));
    tep_db_query($sql);
  }

  function _easy_insert($campo, $data) {
    $campo = strtoupper("MODULE_PAYMENT_COBREDIRETO_$campo");
    $dados = array('configuration_key'=>$campo);
    foreach ($data as $key=>$value) {
      if ($key=='desc') $key = 'description';
      if ($key=='group') $key = 'group_id';
      if ($key=='func') $key = 'set_function';

      if (in_array($key, array('title', 'key', 'value', 'description', 'group_id')))
        $key = "configuration_$key";
      $dados[$key]=$value;
    }
    $dados += array(
      'configuration_value' => '',
      'set_function' => '',
      'configuration_group_id' => 6,
      'sort_order' => $this->_order++,
      'date_added' => 'now()',
    );
    self::_insert_sql($dados);
  }



  function install() {  
    /**
    * function install()
    * Nesta função install estão todas as opções de configuração, e escolha de formas de pagamentos no sistema  
    *
    * @author VISIE Padrões Web - RZamana <zamana@visie.com.br>
    * @date 08/18/2010
    **/  
    $this->_order = 0;
    $opcao[] = array('id' => '1', 'text' => '2');	
    self::_easy_insert('status', array(
      'title' => 'Habilitar M&oacute;dulo CobreDireto',
      'value' => 'Sim',
      'desc' => 'Voc&ecirc; gostaria de permitir pagamentos via Cobre Direto?',
      'set_function' => "tep_cfg_select_option(array('Sim', 'N&atilde;o'), ",
    ));
    self::_easy_insert('ambiente', array(
      'title' => 'Ambiente',
      'value' => 'teste',
      'desc' => 'Ambiente de trabalho do Cobre Direto (n&atilde;o esque&ccedil;a de configur&aacute;-lo no seu painel de controle)',
      'set_function' => "tep_cfg_select_option(array('teste', 'producao'), ",
    ));
    self::_easy_insert('loja', array(
      'title' => 'Loja',
      'desc' => 'Loja cadastrada no Cobre Direto',
    ));
    self::_easy_insert('usuario', array(
      'title' => 'Usu&aacute;rio',
      'desc' => 'Usu&aacute;rio cadastrado no Cobre Direto',
    ));
    self::_easy_insert('senha', array(
      'title' => 'Senha',
      'desc' => 'Senha cadastrada no Cobre Direto',
    ));
    self::_easy_insert('sort_order', array(
      'title' => 'Ordem',
      'value' => 0,
      'desc' => 'Ordem de prioridade',
    ));
    $selection = array('id' => $this->code,
                           'module' => $this->public_title,
                           'fields' => array(array('title' => 'Selecione a forma de pagamento:',
                                                    'field' => tep_draw_pull_down_menu('combobox_selecao', $opcoes_pagamento ))));
    
    self::_easy_insert('visa_credito', array(
		'title' => 'Habilitar Cartão de Crédito Visa: ',
		'value' => 'Não',
		'set_function' =>  "tep_cfg_select_option(array('Sim', 'Não'), ",
	));
    self::_easy_insert('master_credito', array(
		'title' => 'Habilitar Cartão de Crédito Master: ',
		'value' => 'Não',
		'set_function' =>  "tep_cfg_select_option(array('Sim', 'Não'), ",
	));
    self::_easy_insert('diner_credito', array(
		'title' => 'Habilitar Cartão de Crédito Diners: ',
		'value' => 'Não',
		'set_function' =>  "tep_cfg_select_option(array('Sim', 'Não'), ",
	));
    self::_easy_insert('amex_credito', array(
		'title' => 'Habilitar Cartão de Crédito Amex: ',
		'value' => 'Não',
		'set_function' =>  "tep_cfg_select_option(array('Sim', 'Não'), ",
	));
    self::_easy_insert('bradesco_debito', array(
		'title' => 'Habilitar Débito Automático Bradesco: ',
		'value' => 'Não',
		'set_function' =>  "tep_cfg_select_option(array('Sim', 'Não'), ",
	));
    self::_easy_insert('itau_debito', array(
		'title' => 'Habilitar Débito Automático Banco Itaú: ',
		'value' => 'Não',
		'set_function' =>  "tep_cfg_select_option(array('Sim', 'Não'), ",
	));
    self::_easy_insert('banco_brasil_debito', array(
		'title' => 'Habilitar Débito Automático Banco do Brasil: ',
		'value' => 'Não',
		'set_function' =>  "tep_cfg_select_option(array('Sim', 'Não'), ",
	));    
    self::_easy_insert('bradesco_boleto', array(
		'title' => 'Habilitar Boleto Bradesco: ',
		'value' => 'Não',
		'set_function' =>  "tep_cfg_select_option(array('Sim', 'Não'), ",
	));
    self::_easy_insert('itau_boleto', array(
		'title' => 'Habilitar Boleto Banco Itaú: ',
		'value' => 'Não',
		'set_function' =>  "tep_cfg_select_option(array('Sim', 'Não'), ",
	));
    self::_easy_insert('banco_brasil_boleto', array(
		'title' => 'Habilitar Boleto Banco do Brasil: ',
		'value' => 'Não',
		'set_function' =>  "tep_cfg_select_option(array('Sim', 'Não'), ",
	));        
    tep_db_query("
      CREATE TABLE IF NOT EXISTS `oscommerce_cobredireto_session` (
        id int not null auto_increment primary key,
        cod char(64),
        session text
      );
    ");


  }

  function remove() {
    tep_db_query("delete from " . TABLE_CONFIGURATION . " where configuration_key LIKE 'MODULE_PAYMENT_COBREDIRETO_%'");
    tep_db_query("drop table if exists `oscommerce_cobredireto_session`");
  }

  function keys() {
    $campos = array( 'STATUS', 'AMBIENTE', 'LOJA', 'USUARIO', 'SENHA', 'SORT_ORDER', 'VISA_CREDITO' , 'MASTER_CREDITO' , 'DINER_CREDITO' , 'AMEX_CREDITO' , 
	                 'BRADESCO_DEBITO' , 'ITAU_DEBITO' , 'BANCO_BRASIL_DEBITO', 'BRADESCO_BOLETO' , 
					 'ITAU_BOLETO' , 'BANCO_BRASIL_BOLETO');
    array_walk($campos, create_function('&$i', '$i = "MODULE_PAYMENT_COBREDIRETO_{$i}";'));
    return $campos;
  }

  
}
