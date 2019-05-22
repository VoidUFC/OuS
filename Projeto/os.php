<?php
	ob_start();
	session_start();
	require_once 'conect/dbconnect.php';
	// Verificar se existe alguma sessão ativa, se não tiver vai redirecionar para a página de login
	if( !isset($_SESSION['user']) ) {
		header("Location: login.php");
		exit;
	}
	// Fazer LogOut do sistema / Destruir sessão
     if (isset($_GET['logout'])) {
		unset($_SESSION['user']);
		session_unset();
		session_destroy();
		header("Location: login.php");
		exit;
	}
	date_default_timezone_set('America/Sao_Paulo');
    $data_hora = date('d/m/y ás h:i');

	$res=mysql_query("SELECT * FROM ous_funcionarios WHERE cod=".$_SESSION['user']);
	$userRow=mysql_fetch_array($res);
	$KEY = true;
	require_once('conect/setting.php');
    // Obter dados funcionario da tabela SQL
    $user_id= $userRow['id_funcionario'];
    $user_n= $userRow['nome'];
    $user_sb= $userRow['sobrenome'];
    $user_dt= date('d/m/y').' as '. date('H:i');
    $user_c= $userRow['cargo'];
     
    if (isset($_GET['id'])){ 
        $PagActive='1';
        $os_id	 =	addslashes(@$_GET['id']);
     	$os_cons = $GLOBALS['DB']->fetch("SELECT * FROM ous_clientes WHERE id_cliente = ?", $os_id); 
     	
     	$os_nome         = $os_cons['nome'];
     	$os_contato_1    = $os_cons['contato_1'];
     	$os_contato_2    = $os_cons['contato_2'];
     	$os_estado       = $os_cons['estado'];
     	$os_cidade       = $os_cons['cidade'];
     	$os_endereco     = $os_cons['endereco'];
     	$os_ncasa        = $os_cons['n_casa'];
     	$os_bairro       = $os_cons['bairro'];
    }
  
    if(isset($_GET['novo'])){
        $PagActive='2';
    } 
    // Define a variável $error como falsa
	$error = false;
    // Recebendo dados via POST 
	if ( isset($_POST['btn-cadastrar']) ) {
    	// dados do cliente    
	$os_nome_do_cliente      = addslashes($_POST['os_nome_do_cliente']);
	$os_contato_1_do_cliente = addslashes($_POST['os_contato_1_do_cliente']);
	$os_contato_2_do_cliente = addslashes($_POST['os_contato_2_do_cliente']);
    $os_estado_do_cliente    = addslashes($_POST['os_estado_do_cliente']);
	$os_cidade_do_cliente    = addslashes($_POST['os_cidade_do_cliente']); 
	$os_endereco_do_cliente  = addslashes($_POST['os_endereco_do_cliente']); 
	$os_ncasa_do_cliente     = addslashes($_POST['os_ncasa_do_cliente']); 
	$os_bairro_do_cliente    = addslashes($_POST['os_bairro_do_cliente']); 
    	// dados do aparelho
	$os_aparelho             = addslashes($_POST['os_aparelho']); 
	$os_marca                = addslashes($_POST['os_marca']); 
	$os_cor_do_aparelho      = addslashes($_POST['os_cor_do_aparelho']); 
	$os_modelo               = addslashes($_POST['os_modelo']); 
    $os_status               = addslashes($_POST['os_status']); 
	$os_defeito              = addslashes($_POST['os_defeito']); 
	$os_itens                = addslashes($_POST['os_itens_1']).($_POST['os_itens_2']).($_POST['os_itens_3']).($_POST['os_itens_4']); 
	$os_servico              = addslashes($_POST['os_servico']); 
	$os_valor                = addslashes($_POST['os_valor']); 
    $os_id_cliente           = $os_id;
    // Gerar uma ID para o cliente
    function id($qtd){
       $Caracteres = '0123456789ABCDEFGHIJKLMNOPQRSTUVXYWZ';
       $QuantidadeCaracteres = strlen($Caracteres);
       $QuantidadeCaracteres--;

       $Hash=NULL;
       for($x=1;$x<=$qtd;$x++){
        $Posicao = rand(0,$QuantidadeCaracteres);
        $Hash .= substr($Caracteres,$Posicao,1);
       }
       return $Hash;
       }
       $gerar_id =id(10);
       $os_numero = $gerar_id;
       $clie_id = $gerar_id;
       // Inserir dados na tabela SQL
    if( !$error ) {
    if($PagActive=='2'){
       $query = "INSERT INTO ous_clientes(id_cliente,nome,contato_1,contato_2,estado,cidade,endereco,n_casa,bairro) VALUES('$clie_id','$os_nome_do_cliente','$os_contato_1_do_cliente','$os_contato_2_do_cliente','$os_estado_do_cliente','$os_cidade_do_cliente','$os_endereco_do_cliente','$os_ncasa_do_cliente','$os_bairro_do_cliente')";
       $ress = mysql_query($query);
       $os_id_cliente = $clie_id;
       $query = "INSERT INTO ous_os (os_numero,os_id_cliente,os_nome_do_cliente,os_contato_1_do_cliente,os_contato_2_do_cliente,os_cidade_do_cliente,os_aparelho,os_marca,os_cor_do_aparelho,os_modelo,os_status,os_defeito,os_itens,os_servico,os_valor,os_data_entrada) VALUES ('$os_numero','$os_id_cliente','$os_nome_do_cliente','$os_contato_1_do_cliente','$os_contato_2_do_cliente','$os_cidade_do_cliente','$os_aparelho','$os_marca','$os_cor_do_aparelho','$os_modelo','$os_status','$os_defeito','$os_itens','$os_servico','$os_valor','$data_hora')";
       $ress = mysql_query($query);   
     // Mensagens de erro e sucesso
    if ($ress) {
    $PagActive='3';
    $errTyp = "alert-success";
    $errMSG = '<b>Ordem de serviços e cliente cadastrado com sucesso!</b><br> Gerando documento para impressão...';
    $gerar_os_2 ='true';
    } else {
    $errTyp = "alert-danger";
    $errMSG = "Erro interno: 0x2.";	
    }
    }
    else if($PagActive=='1'){

       $query = "INSERT INTO ous_os (os_numero,os_id_cliente,os_nome_do_cliente,os_contato_1_do_cliente,os_contato_2_do_cliente,os_cidade_do_cliente,os_aparelho,os_marca,os_cor_do_aparelho,os_modelo,os_status,os_defeito,os_itens,os_servico,os_valor,os_data_entrada) VALUES ('$os_numero','$os_id_cliente','$os_nome_do_cliente','$os_contato_1_do_cliente','$os_contato_2_do_cliente','$os_cidade_do_cliente','$os_aparelho','$os_marca','$os_cor_do_aparelho','$os_modelo','$os_status','$os_defeito','$os_itens','$os_servico','$os_valor','$data_hora')";
       $ress = mysql_query($query);   
    // Mensagens de erro e sucesso
    if ($ress) {
    $PagActive='3';
    $errTyp = "alert-success";
    $errMSG = '<b>Ordem de serviços aberta com sucesso!</b><br> Gerando documento para impressão...';
    $gerar_os_1 ='true';
    } else {
    $errTyp = "alert-danger";
    $errMSG = 'Erro interno: 0x2.';	
    }
    
    }else{
    $errTyp = "alert-danger";
    $errMSG = 'Erro interno: 0x1.';	
    }
    
    	
    }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>        
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">              
    <title>OuS System</title>
    <link rel="icon" type="image/ico" href="favicon.ico"/>
    <link href="css/stylesheets.css" rel="stylesheet" type="text/css" />        
    <script type='text/javascript' src='js/jquery/jquery.min.js'></script>
    <script type='text/javascript' src='js/jquery/jquery-ui-1.10.3.custom.min.js'></script>
    <script type='text/javascript' src='js/jquery/jquery-migrate.min.js'></script>
    <script type='text/javascript' src='js/jquery/globalize.js'></script>
    
    <script type='text/javascript' src='js/bootstrap/bootstrap.min.js'></script>
    <script type='text/javascript' src='js/cookies/jquery.cookies.2.2.0.min.js'></script>
    
    <script type='text/javascript' src='js/mcustomscrollbar/jquery.mCustomScrollbar.concat.min.js'></script>
    <script type='text/javascript' src='js/charts/excanvas.min.js'></script>    
    <script type='text/javascript' src='js/charts/jquery.flot.js'></script>    
    <script type='text/javascript' src='js/charts/jquery.flot.stack.js'></script>    
    <script type='text/javascript' src='js/charts/jquery.flot.pie.js'></script>
    <script type='text/javascript' src='js/charts/jquery.flot.resize.js'></script>    
    
    <script type='text/javascript' src='js/morris/raphael-min.js'></script>
    <script type='text/javascript' src='js/morris/morris.min.js'></script>    
    
    <script type='text/javascript' src='js/sparklines/jquery.sparkline.min.js'></script>    

    <script type='text/javascript' src='js/scrollup/jquery.scrollUp.min.js'></script>
    
    <script type='text/javascript' src='js/plugins.js'></script>    
    <script type='text/javascript' src='js/actions.js'></script>
    <script type='text/javascript' src='js/charts.js'></script>    
    
    
    
</head>
    

    
<body>    
    
    <div id="wrapper" class="sidebar_off">
        <div id="header">
            <div class="wrap">
			    <span class="logo"></span>
                <div class="buttons">
                    <div class="item">
                        <a href="index.php" class="btn btn-primary btn-xs">
                            <i class="glyphicon glyphicon-home"></i> PÁGINA INICIAL 
                        </a>
                    </div>                
                </div>
            </div>
        </div>
        
        <div id="layout">
            <div id="content">                        
                <div class="wrap">
                    <div class="head">
                        <div class="info">
                        <h1>ABRIR ORDEM DE SERVIÇO</h1>
                            <ul class="breadcrumb">
                                <li class=""><a href="index.php">Página inicial</a></li>
                                <li class=""><a href="os.php">Ordem de serviço</a></li>
                                <li class="active">Abrir </li>
                            </ul>
                        </div> 
                        <div class="side fr">
                            <a href="index.php" class="btn btn-default btn-sm"><font color="#607387"><i class="i-reply"></i>CANCELAR </font> </a> 
                         </div>                        
                    </div>
         
                                                                                        
                    
 <div class="container">
    <div class="row">
      <div class="col-md-12">
          
          <?php
          if ( isset($errMSG) ){  ?>
              <div class="alert <?php echo ($errTyp=="alert-success") ? "alert-success" : $errTyp; ?>">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <?php echo $errMSG; ?>
              </div>
              <?php
          }
          // GERAR A ORDEM DE SERVIÇO
          if ($PagActive=='3'){
             if($gerar_os_1=='true'){
                 MessageRedir('', 4, 'imprimir.php?os='.$os_numero); 
                 }
              if($gerar_os_2=='true'){
                 MessageRedir('', 4, 'imprimir.php?os='.$os_numero); 
                 }
            }else if ($PagActive=='2'){
                 ?>
          <div class="block">  
             <form method="post"   action="?novo" autocomplete="off"> 
                                    
                                    <div class="head">
                                        <h2>ABRIR ORDEM DE SERVIÇO </h2>
                                    </div>
                                    <div class="content np"> 
                                        <div class="controls-row">
                                            <div class="col-md-2"><b>Nome do cliente:</b></div>
                                            <div class="col-md-9">
                                                <input type="text" name="os_nome_do_cliente" class="form-control" value=""  style="text-transform:uppercase">
                                            </div>
                                            <div class="col-md-2"><b>Telefone 1:</b></div>
                                            <div class="col-md-4">
                                                <input type="text" name="os_contato_1_do_cliente" class="form-control" value="" style="text-transform:uppercase">
                                            </div>
                                            <div class="col-md-1"><b>Telefone 2:</b></div>
                                            <div class="col-md-4">
                                                <input type="text" name="os_contato_2_do_cliente" class="form-control" value="" style="text-transform:uppercase">
                                            </div><br>
                                            <div class="col-md-2"><b>Estado:</b></div>
                                            <div class="col-md-4">
                                                <select class="form-control" name="os_estado_do_cliente" style="text-transform:uppercase">
                                                    <option value="">Selecione</option> 
                                                    <option value="AC">Acre</option> 
                                                    <option value="AL">Alagoas</option> 
                                                    <option value="AM">Amazonas</option>  
                                                    <option value="AP">Amapá</option> 
                                                    <option value="BA">Bahia</option> 
                                                    <option value="CE">Ceará</option> 
                                                    <option value="DF">Distrito Federal</option> 
                                                    <option value="ES">Espírito Santo</option> 
                                                    <option value="GO">Goiás</option> 
                                                    <option value="MA">Maranhão</option> 
                                                    <option value="MT">Mato Grosso</option> 
                                                    <option value="MS">Mato Grosso do Sul</option> 
                                                    <option value="MG">Minas Gerais</option> 
                                                    <option value="PA">Pará</option> 
                                                    <option value="PB">Paraíba</option> 
                                                    <option value="PR">Paraná</option> 
                                                    <option value="PE">Pernambuco</option> 
                                                    <option value="PI">Piauí</option> 
                                                    <option value="RJ">Rio de Janeiro</option> 
                                                    <option value="RN">Rio Grande do Norte</option> 
                                                    <option value="RO">Rondônia</option> 
                                                    <option value="RS">Rio Grande do Sul</option> 
                                                    <option value="RR">Roraima</option> 
                                                    <option value="SC">Santa Catarina</option> 
                                                    <option value="SE">Sergipe</option> 
                                                    <option value="SP">São Paulo</option> 
                                                    <option value="TO">Tocantins</option>  
                                                </select>
                                            </div>
                                            <div class="col-md-1"><b>Cidade:</b></div>
                                            <div class="col-md-4">
                                                <input type="text" name="os_cidade_do_cliente" class="form-control" value="" style="text-transform:uppercase">
                                            </div>
                                            
                                            <div class="col-md-2"><b>Rua:</b></div>
                                            <div class="col-md-4">
                                                <input type="text" name="os_endereco_do_cliente" class="form-control" value="" style="text-transform:uppercase">
                                            </div>
                                            <div class="col-md-1"><b>N°:</b></div>
                                            <div class="col-md-4">
                                                <input type="text" name="os_ncasa_do_cliente" class="form-control" value="" style="text-transform:uppercase">
                                            </div>
                                            <div class="col-md-2"><b>Bairro:</b></div>
                                            <div class="col-md-4">
                                                <input type="text" name="os_bairro_do_cliente" class="form-control" value="" style="text-transform:uppercase">
                                            </div>
                                            
                                        </div>
                                        <div class="controls-row">
                                            
                                        </div>
                                          <div class="controls-row">
                                            <div class="col-md-2"><b>Aparelho:</b></div>
                                            <div class="col-md-2">
                                                 <select class="form-control" name="os_aparelho" style="text-transform:uppercase">
                                                    <option>Selecione...</option>
                                                    <option value="Computador">Computador</option>
                                                    <option value="Notebook">Notebook</option>
                                                    <option value="Celular">Celular</option>
                                                    <option value="Tablet">Tablet</option>
                                                    <option value="Telefone rural">Telefone rural</option>
                                                    <option value="Outro">Outro</option>
                                                </select>
                                            </div>
                                            <div class="col-md-1"><b>Marca:</b></div>
                                            <div class="col-md-2">
                                                 <select class="form-control" name="os_marca" style="text-transform:uppercase">
                                                    <option>Selecione...</option>
                                                    <option value="Apple">Apple</option>
                                                    <option value="Asus">Asus</option>
                                                    <option value="Acer">Acer</option>
                                                    <option value="Alcatel">Alcatel</option>
                                                    <option value="Samsung">Samsung</option>
                                                    <option value="LG">LG</option>
                                                    <option value="Motorola">Motorola</option>
                                                    <option value="Multilaser">Multilaser</option>
                                                    <option value="Microsoft">Microsoft</option>
                                                    <option value="Xiaomi">Xiaomi</option>
                                                    <option value="Outro">Outro</option>
                                                </select>
                                            </div>
                                            <div class="col-md-2"><b>Cor do aparelho:</b></div>
                                            <div class="col-md-2">
                                                <select class="form-control" name="os_cor_do_aparelho" style="text-transform:uppercase">
                                                    <option>Selecione...</option>
                                                    <option value="Preto">Preto</option>
                                                    <option value="Branco">Branco</option>
                                                    <option value="Prata">Prata</option>
                                                    <option value="Dourado">Dourado</option>
                                                    <option value="Rose">Rose</option>
                                                    <option value="Roxo">Roxo</option>
                                                    <option value="Outro">Outro</option>
                                                </select>
                                            </div>
                                            
                                            
                                            <div class="col-md-2"><b>Modelo:</b></div>
                                            <div class="col-md-4">
                                                    <input type="text" name="os_modelo" class="form-control" value="" style="text-transform:uppercase">
                                            </div>
                                            
                                            
                                         <div class="col-md-1"><b>Status:</b></div>
                                            <div class="col-md-4">
                                                <select class="form-control" name="os_status" style="text-transform:uppercase">
                                                    <option>Selecione...</option>
                                                    <option value="Orçamento">Orçamento</option>
                                                    <option value="Aberta">Aberta ( O cliente já autorizou o conserto )</option>
                                                </select>
                                            </div>
                                            
                                            <div class="col-md-2"><b>Descrição do defeito:</b></div>
                                            <div class="col-md-9">
                                                    <input type="text" name="os_defeito" class="form-control" value="" style="text-transform:uppercase">
                                            </div>
                                            
                                              <div class="col-md-2"><b>Itens inclusos:</b></div>
                                            <div class="col-md-2">
                                                <select class="form-control" name="os_itens_1" style="text-transform:uppercase">
                                                    <option value="">(0) Chip</option>
                                                    <option value="(01) Chip ">(01) Chip</option>
                                                    <option value="(02) Chips ">(02) Chips</option>
                                                    <option value="(03) Chips ">(03) Chips</option>
                                                    <option value="(04) Chips ">(04) Chips</option>
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <select class="form-control" name="os_itens_2" style="text-transform:uppercase">
                                                    <option value="">(0) SD card</option>
                                                    <option value="(01) SD card ">(01) SD card</option>
                                                    <option value="(02) SD cards ">(02) SD card</option>
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <select class="form-control" name="os_itens_3" style="text-transform:uppercase">
                                                    <option value="">(0) Carregador</option>
                                                    <option value="(01) Carregador ">(01) Carregador</option>
                                                    <option value="(02) Carregadores ">(02) Carregadores</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <select class="form-control" name="os_itens_4" style="text-transform:uppercase">
                                                    <option value="">(0) Fone de ouvido</option>
                                                    <option value="(01) Fone de ouvido ">(01) Fone de ouvido</option>
                                                    <option value="(02) Fones de ouvidos ">(02) Fone de ouvido</option>
                                                </select>
                                            </div>
                                            <div class="controls-row"> </div> 
                                        <div class="col-md-2"><b>Serviço a ser realizado:</b></div>
                                        <div class="col-md-6">
                                                <input type="text" name="os_servico" class="form-control" value="" style="text-transform:uppercase">
                                        </div>
                                        <div class="col-md-1"><b>VALOR R$</b> </div>
                                        <div class="col-md-2">
                                                <input type="text" name="os_valor" class="form-control" value="0,00" style="text-transform:uppercase">
                                        </div>
                                        
                                        </div>                     
                                    </div>
                                    <div class="footer">
                                        <div class="side fr">
                                            <button class="btn btn-primary" name="btn-cadastrar">ABRIR ORDEM DE SERVIÇO</button>
                                        </div>
                                    </div> 
                                    </form>
                                </div>
                 <?php
          }else if ($PagActive=='1'){
                 ?>
                 <div class="block">  
             <form method="post"   action="?id=<?php echo $os_id?>" autocomplete="off"> 
                                    
                                    <div class="head">
                                        <h2>ORDEM DE SERVIÇO</h2>
                                    </div>
                                    <div class="content np"> 
                                        <div class="controls-row">
                                            <div class="col-md-2"><b>Nome do cliente:</b></div>
                                            <div class="col-md-9">
                                                <input type="text" name="os_nome_do_cliente" class="form-control" value="<?php echo utf8_encode($os_nome)?>"  style="text-transform:uppercase">
                                            </div>
                                            <div class="col-md-2"><b>Telefone 1:</b></div>
                                            <div class="col-md-4">
                                                <input type="text" name="os_contato_1_do_cliente" class="form-control" value="<?php echo $os_contato_1?>" style="text-transform:uppercase">
                                            </div>
                                            <div class="col-md-1"><b>Telefone 2:</b></div>
                                            <div class="col-md-4">
                                                <input type="text" name="os_contato_2_do_cliente" class="form-control" value="<?php echo $os_contato_2?>" style="text-transform:uppercase">
                                            </div><br>
                                            <div class="col-md-2"><b>Estado:</b></div>
                                            <div class="col-md-4">
                                                <select class="form-control" name="os_estado_do_cliente" style="text-transform:uppercase">
                                                    <option value="<?php echo utf8_encode($os_estado)?>"><?php echo utf8_encode($os_estado)?></option> 
                                                    <option value="AC">Acre</option> 
                                                    <option value="AL">Alagoas</option> 
                                                    <option value="AM">Amazonas</option>  
                                                    <option value="AP">Amapá</option> 
                                                    <option value="BA">Bahia</option> 
                                                    <option value="CE">Ceará</option> 
                                                    <option value="DF">Distrito Federal</option> 
                                                    <option value="ES">Espírito Santo</option> 
                                                    <option value="GO">Goiás</option> 
                                                    <option value="MA">Maranhão</option> 
                                                    <option value="MT">Mato Grosso</option> 
                                                    <option value="MS">Mato Grosso do Sul</option> 
                                                    <option value="MG">Minas Gerais</option> 
                                                    <option value="PA">Pará</option> 
                                                    <option value="PB">Paraíba</option> 
                                                    <option value="PR">Paraná</option> 
                                                    <option value="PE">Pernambuco</option> 
                                                    <option value="PI">Piauí</option> 
                                                    <option value="RJ">Rio de Janeiro</option> 
                                                    <option value="RN">Rio Grande do Norte</option> 
                                                    <option value="RO">Rondônia</option> 
                                                    <option value="RS">Rio Grande do Sul</option> 
                                                    <option value="RR">Roraima</option> 
                                                    <option value="SC">Santa Catarina</option> 
                                                    <option value="SE">Sergipe</option> 
                                                    <option value="SP">São Paulo</option> 
                                                    <option value="TO">Tocantins</option>  
                                                </select>
                                            </div>
                                            <div class="col-md-1"><b>Cidade:</b></div>
                                            <div class="col-md-4">
                                                <input type="text" name="os_cidade_do_cliente" class="form-control" value="<?php echo utf8_encode($os_cidade)?>" style="text-transform:uppercase">
                                            </div>
                                            
                                            <div class="col-md-2"><b>Rua:</b></div>
                                            <div class="col-md-4">
                                                <input type="text" name="os_endereco_do_cliente" class="form-control" value="<?php echo utf8_encode($os_endereco)?>" style="text-transform:uppercase">
                                            </div>
                                            <div class="col-md-1"><b>N°:</b></div>
                                            <div class="col-md-4">
                                                <input type="text" name="os_ncasa_do_cliente" class="form-control" value="<?php echo $os_ncasa?>" style="text-transform:uppercase">
                                            </div>
                                            <div class="col-md-2"><b>Bairro:</b></div>
                                            <div class="col-md-4">
                                                <input type="text" name="os_bairro_do_cliente" class="form-control" value="<?php echo utf8_encode($os_bairro)?>" style="text-transform:uppercase">
                                            </div>
                                            
                                        </div>
                                        <div class="controls-row">
                                            
                                        </div>
                                          <div class="controls-row">
                                            <div class="col-md-2"><b>Aparelho:</b></div>
                                            <div class="col-md-2">
                                                 <select class="form-control" name="os_aparelho" style="text-transform:uppercase">
                                                    <option>Selecione...</option>
                                                    <option value="Computador">Computador</option>
                                                    <option value="Notebook">Notebook</option>
                                                    <option value="Celular">Celular</option>
                                                    <option value="Tablet">Tablet</option>
                                                    <option value="Telefone rural">Telefone rural</option>
                                                    <option value="Outro">Outro</option>
                                                </select>
                                            </div>
                                            <div class="col-md-1"><b>Marca:</b></div>
                                            <div class="col-md-2">
                                                 <select class="form-control" name="os_marca" style="text-transform:uppercase">
                                                    <option>Selecione...</option>
                                                    <option value="Apple">Apple</option>
                                                    <option value="Asus">Asus</option>
                                                    <option value="Acer">Acer</option>
                                                    <option value="Alcatel">Alcatel</option>
                                                    <option value="Samsung">Samsung</option>
                                                    <option value="LG">LG</option>
                                                    <option value="Motorola">Motorola</option>
                                                    <option value="Multilaser">Multilaser</option>
                                                    <option value="Microsoft">Microsoft</option>
                                                    <option value="Xiaomi">Xiaomi</option>
                                                    <option value="Outro">Outro</option>
                                                </select>
                                            </div>
                                            <div class="col-md-2"><b>Cor do aparelho:</b></div>
                                            <div class="col-md-2">
                                                <select class="form-control" name="os_cor_do_aparelho" style="text-transform:uppercase">
                                                    <option>Selecione...</option>
                                                    <option value="Preto">Preto</option>
                                                    <option value="Branco">Branco</option>
                                                    <option value="Prata">Prata</option>
                                                    <option value="Dourado">Dourado</option>
                                                    <option value="Rose">Rose</option>
                                                    <option value="Roxo">Roxo</option>
                                                    <option value="Outro">Outro</option>
                                                </select>
                                            </div>
                                            
                                            
                                            <div class="col-md-2"><b>Modelo:</b></div>
                                            <div class="col-md-4">
                                                    <input type="text" name="os_modelo" class="form-control" value="" style="text-transform:uppercase">
                                            </div>
                                            
                                            
                                         <div class="col-md-1"><b>Status:</b></div>
                                            <div class="col-md-4">
                                                <select class="form-control" name="os_status" style="text-transform:uppercase">
                                                    <option value="Orçamento">Selecione...</option>
                                                    <option value="Orçamento">Orçamento</option>
                                                    <option value="Aberta">Aberta ( O cliente já autorizou o conserto )</option>
                                                </select>
                                            </div>
                                            
                                            <div class="col-md-2"><b>Descrição do defeito:</b></div>
                                            <div class="col-md-9">
                                                    <input type="text" name="os_defeito" class="form-control" value="" style="text-transform:uppercase">
                                            </div>
                                            
                                              <div class="col-md-2"><b>Itens inclusos:</b></div>
                                            <div class="col-md-2">
                                                <select class="form-control" name="os_itens_1" style="text-transform:uppercase">
                                                    <option value="">(0) Chip</option>
                                                    <option value="(01) Chip ">(01) Chip</option>
                                                    <option value="(02) Chips ">(02) Chips</option>
                                                    <option value="(03) Chips ">(03) Chips</option>
                                                    <option value="(04) Chips ">(04) Chips</option>
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <select class="form-control" name="os_itens_2" style="text-transform:uppercase">
                                                    <option value="">(0) SD card</option>
                                                    <option value="(01) SD card ">(01) SD card</option>
                                                    <option value="(02) SD cards ">(02) SD card</option>
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <select class="form-control" name="os_itens_3" style="text-transform:uppercase">
                                                    <option value="">(0) Carregador</option>
                                                    <option value="(01) Carregador ">(01) Carregador</option>
                                                    <option value="(02) Carregadores ">(02) Carregadores</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <select class="form-control" name="os_itens_4" style="text-transform:uppercase">
                                                    <option value="">(0) Fone de ouvido</option>
                                                    <option value="(01) Fone de ouvido ">(01) Fone de ouvido</option>
                                                    <option value="(02) Fones de ouvidos ">(02) Fone de ouvido</option>
                                                </select>
                                            </div>
                                            <div class="controls-row"> </div> 
                                        <div class="col-md-2"><b>Serviço a ser realizado:</b></div>
                                        <div class="col-md-6">
                                                <input type="text" name="os_servico" class="form-control" value="" style="text-transform:uppercase">
                                        </div>
                                        <div class="col-md-1"><b>VALOR R$</b> </div>
                                        <div class="col-md-2">
                                                <input type="text" name="os_valor" class="form-control" value="0,00" style="text-transform:uppercase">
                                        </div>
                                        
                                        </div>                     
                                    </div>
                                    <div class="footer">
                                        <div class="side fr">
                                            <button class="btn btn-primary" name="btn-cadastrar">ABRIR ORDEM DE SERVIÇO</button>
                                        </div>
                                    </div> 
                                    </form>
                                </div>
             <?php
          }else{
              echo'Ocorreu um erro ao solicitar a página.';
          }
          ?>
          
      
         </div>
	 </div>      
  </div>
</div>
</div>
</div>
        
  
      

        
    </div>
</body>
</html>
