<?php
	ob_start();
	session_start();
	require_once 'conect/dbconnect.php';
	require_once 'conect/db.php';
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
		header("Location: index.php");
		exit;
	}
	date_default_timezone_set('America/Sao_Paulo');
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
    
    
     // Define a variável $error como falsa
	$error = false;
    // Recebendo dados via POST (Nome, Sobrenome, Contato, Email e Senha)
	if ( isset($_POST['btn-cadastrar']) ) {
	$name      = addslashes($_POST['name']);

	
	$contato_1 = addslashes($_POST['contato_1']);
	
	$contato_2 = addslashes($_POST['contato_2']);
	
	$estado = addslashes($_POST['estado']);
	
	$cidade = addslashes($_POST['cidade']);
	
	$endereco = addslashes($_POST['endereco']);
	
	$n_casa = addslashes($_POST['n_casa']);
	
	$bairro = addslashes($_POST['bairro']);
    
    // Validar campos
    if (empty($name) || (empty($contato_1)) || (empty($contato_2)) || (empty($estado)) || (empty($cidade)) || (empty($endereco))|| (empty($n_casa)) || (empty($bairro)) ) {
    $error = true;
    $errTyp = "alert-danger";
    $errMSG = "Todos os campos são obrigatórios";
    }
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
       $Gerar_id =id(10);
       $clie_id = $Gerar_id;
    // Inserir dados na tabela SQL
    if( !$error ) {
    $query = "INSERT INTO ous_clientes(id_cliente,nome,contato_1,contato_2,estado,cidade,endereco,n_casa,bairro) VALUES('$clie_id','$name','$contato_1','$contato_2','$estado','$cidade','$endereco','$n_casa','$bairro')";
    $ress = mysql_query($query);
    // Mensagens de erro e sucesso
    if ($ress) {
    $errTyp = "alert-success";
    $errMSG = "<b>$name </b> foi cadastrado com sucesso!";
    unset($name);
    unset($contato_1);
    unset($contato_2);
    unset($estado);
    unset($endereco);
    unset($n_casa);
    unset($bairro);
    } else {
    $errTyp = "alert-danger";
    $errMSG = "Ocorreu um erro interno.";	
    }	
    }
    }

    if(isset($_GET['abrir_os'])){
       $os_pag='1';
    }else{
        $os_pag='2';
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>        
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />              
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
    
     <script type='text/javascript' src='js/datatables/jquery.dataTables.min.js'></script>
     
    <script type='text/javascript' src='js/morris/raphael-min.js'></script>
    <script type='text/javascript' src='js/morris/morris.min.js'></script>    
    
    <script type='text/javascript' src='js/sparklines/jquery.sparkline.min.js'></script>    

    <script type='text/javascript' src='js/scrollup/jquery.scrollUp.min.js'></script>
    
    <script type='text/javascript' src='js/plugins.js'></script>    
    <script type='text/javascript' src='js/actions.js'></script>
    <script type='text/javascript' src='js/charts.js'></script>    
    <script src="http://cdnjs.cloudflare.com/ajax/libs/vue/1.0.25/vue.min.js"></script>
    
    
</head>
<body>    
    
    <div id="wrapper" class="sidebar_off">
        
        <div id="header">
            
            <div class="wrap">
			    <span class="logo"></span>
                <div class="buttons">
                    <div class="item">
                        <a href="login.php" class="btn btn-primary btn-xs">
                            <span class="i-user"></span>PÁGINA INICIAL
                        </a>
                                               
                    </div>                
                </div>
                
            </div>
            
        </div>
        
        <div id="layout">
        
            <div id="content">                        
                <div class="wrap">
                    
                    <div class="head">
                        <div class="head">
                        <div class="info">
                            <?php if ($os_pag=='1'){ ?>
                            <h1>ABRIR ORDEM DE SERVIÇO</h1>
                            <ul class="breadcrumb">
                                <li class="active">Página inicial</li>
                                <li class="active">Clientes</li>
                                <li class="active">Selecionar cliente</li>
                            </ul>
                            <?php }?>
                            <?php if ($os_pag=='2'){ ?>
                            <h1>CLIENTES CADASTRADOS</h1>
                            <ul class="breadcrumb">
                                <li class="active">Página inicial</li>
                                <li class="active">Clientes</li>
                            </ul>
                            <?php }?>
                        </div>
                                              
                    </div>
                        <div class="side fr">
                            <?php if ($os_pag=='1'){ ?>
                             <a href="index.php" class="btn btn-default btn-sm"><font color="#607387"><i class="i-cancel-2"></i> CANCELAR </font></a> 
                             <?php }else{?>
                             <a href="#reg" role="button" data-toggle="modal" class="btn btn-default btn-sm"><font color="#607387"><i class="i-plus-4"></i> CADASTRAR CLIENTE  </font></a>
                             <a href="index.php" class="btn btn-default btn-sm"><font color="#607387"><i class="i-reply"></i> VOLTAR </font></a> 
                             <?php }?>
                             
                        </div>                         
                    </div>                                                                    
                    
                    <div class="container">
                        
                        <div class="row">
							<div class="col-md-12">
                            <?php 
                            if (isset($_GET['detalhes'])){ 
        $det_cliente_id	 =	addslashes(@$_GET['detalhes']);
     	$det_cons = $GLOBALS['DB']->fetch("SELECT * FROM ous_clientes WHERE id_cliente = ?", $det_cliente_id); 
     	
        $_det_id_cliente                = utf8_encode($det_cons['id_cliente']);
        $_det_nome       = utf8_encode($det_cons['nome']);
        $_det_contato_1            = utf8_encode($det_cons['contato_1']);
        $_det_contato_2     = utf8_encode($det_cons['contato_2']);
        $_det_estado  = utf8_encode($det_cons['estado']);
        $_det_cidade  = utf8_encode($det_cons['cidade']);
        $_det_endereco              = utf8_encode($det_cons['endereco']);
        $_det_n_casa                 = utf8_encode($det_cons['n_casa']);
        $_det_bairro                = utf8_encode($det_cons['bairro']);
                                
     ?>
   <br>

                                        <div class="controls-row">
                                            <div class="col-md-2"><b>Nome do cliente:</b></div>
                                            <div class="col-md-9">
                                                <input type="text" name="os_nome_do_cliente" class="form-control" value="<?php echo $_det_nome?>" style="text-transform:uppercase" readonly="readonly">
                                            </div>
                                            <div class="col-md-2"><b>Telefone 1:</b></div>
                                            <div class="col-md-4">
                                                <input type="text" name="os_contato_1_do_cliente" class="form-control" value="<?php echo $_det_contato_1?>" style="text-transform:uppercase" readonly="readonly">
                                            </div>
                                            <div class="col-md-1"><b>Telefone 2:</b></div>
                                            <div class="col-md-4">
                                                <input type="text" name="os_contato_2_do_cliente" class="form-control" value="<?php echo $_det_contato_2?>" style="text-transform:uppercase" readonly="readonly">
                                            </div><br>
                                            <div class="col-md-2"><b>Estado:</b></div>
                                            <div class="col-md-4">
                                                <input type="text" name="os_contato_2_do_cliente" class="form-control" value="<?php echo $_det_estado?>" style="text-transform:uppercase" readonly="readonly">
                                            </div>
                                            <div class="col-md-1"><b>Cidade:</b></div>
                                            <div class="col-md-4">
                                                <input type="text" name="os_cidade_do_cliente" class="form-control" value="<?php echo $_det_cidade?>" style="text-transform:uppercase" readonly="readonly">
                                            </div>
                                            
                                            <div class="col-md-2"><b>Rua:</b></div>
                                            <div class="col-md-4">
                                                <input type="text" name="os_endereco_do_cliente" class="form-control" value="<?php echo $_det_endereco?>" style="text-transform:uppercase" readonly="readonly">
                                            </div>
                                            <div class="col-md-1"><b>N°:</b></div>
                                            <div class="col-md-4">
                                                <input type="text" name="os_ncasa_do_cliente" class="form-control" value="<?php echo $_det_n_casa?>" style="text-transform:uppercase" readonly="readonly">
                                            </div>
                                            <div class="col-md-2"><b>Bairro:</b></div>
                                            <div class="col-md-4">
                                                <input type="text" name="os_bairro_do_cliente" class="form-control" value="<?php echo $_det_bairro?>" style="text-transform:uppercase" readonly="readonly">
                                            </div>
                                            
                                        </div>
                                        <div class="controls-row">
                                           <a href="clientes.php"class="btn btn-primary" type="button">VOLTAR</a> 
                                        </div>
                                                      
                            
                            </div></div>                     
     <?php exit;}?>
                            
							 <?php if ($os_pag=='1'){ ?>
                              <div class="alert alert-info">            
                                  Selecione na lista abaixo um cliente e em seguida clique em <b>ABRIR O.S</b> para carregar os dados do cliente.
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                </div>
                             <?php }?>
							    
                                  
                                    <?php if ( isset($errMSG) ) {  ?>
                                    <div class="alert <?php echo ($errTyp=="alert-success") ? "alert-success" : $errTyp; ?>">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                    <?php echo $errMSG; ?>
                                    </div>
                                    <?php
                                    }
                                    ?>
                                    
                                <div class="block">
                                    <div class="content np table-sorting">
                                        <table cellpadding="0" cellspacing="0" width="100%" class="sortc">
                                            <thead>
                                                <tr>
                                                    <th width="30%"><center>Nomde do cliente</center></th>
                                                    <th width="20%"><center>Telefone</center></th>
                                                    <th width="20"><center>Cidade</center></th>
                                                    <th width="15%"><center>ID do cliente</center></th>
                                                    <?php if ($os_pag=='1'){ ?>
                                                    <th width="20%"><center>Opções</center></th>
                                                    <?php } else{ ?>
                                                    <th width="12%"><center>Opções</center></th>
                                                    <?php }?>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
	                                         $result = $conn->prepare("SELECT * FROM ous_clientes ORDER BY cod DESC  ");
	                                         $result->execute();
	                                         for($i=0; $row_list = $result-> fetch(); $i++){
	                                         $id=$row_list['cod'];
	                                         ?>
                                                <tr>
                                                    <td><?php echo utf8_encode(strtoupper($row_list['nome']));?></td>
                                                    <td><?php echo utf8_encode($row_list['contato_1']);?></td>
                                                    <td><?php echo utf8_encode($row_list['cidade'].'-'.$row_list['estado']);?></td>
                                                    <td><?php echo $row_list['id_cliente'];?></td> 
                                                    <td><center>
                                                       <?php if ($os_pag=='1'){ ?>
                 <a href="os.php?id=<?php echo $row_list['id_cliente'];?>" class="btn btn-success btn-xs" type="button"><i class="glyphicon glyphicon-plus-sign"></i> ABRIR ORDEM DE SERVIÇO</a>
                                                         <?php }else{ ?>
                 <a href="a_funcionario.php" class="btn btn-danger btn-xs" type="button"><span class="glyphicon glyphicon-trash"></span> </a>
                 <a href="?detalhes=<?php echo $row_list['id_cliente']; ?>" class="btn btn-info btn-xs" type="button"> Detalhes</a>
                                                        
                                                          <?php }?>
                                                      </center></td>
                                                </tr> 
                                                <?php } ?> 
                                            </tbody>
                                        </table>   
                                    </div>
                                </div>
                            </div>
                        </div>      
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Bootrstrap default dialog -->    
    <div class="modal fade" id="reg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="col-md-11">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="modal-title" id="myModalLabel">Registrar novo cliente</h3>
                </div>
                <div class="modal-body">
                    <form  method="post" class="login__form"  action="clientes.php" autocomplete="off">
				                <div class="col-md-4">NOME DO CLIENTE:</div>
                                <div class="col-md-8">
                                  <input type="text" class="form-control" name="name"  value=""> 
                                </div>
                                <div class="col-md-4">TELEFONE 1:</div>
                                <div class="col-md-8">
                                  <input type="text" name="contato_1" class="form-control" value="">
                                </div>
                                <div class="col-md-4">TELEFONE 2:</div>
                                <div class="col-md-8">
                                  <input type="text" name="contato_2" class="form-control" value="">
                                </div>
                          <div class="col-md-4">ESTADO:</div>
                                            <div class="col-md-8">
                                                <select class="form-control" name="estado">
                                                    <option value="">Selecione o Estado</option> 
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
                                <div class="col-md-4">CIDADE:</div>
                                <div class="col-md-8">
                                  <input type="text" name="cidade" class="form-control" value="">
                                </div>
                                <div class="col-md-4">ENDEREÇO / RUA:</div>
                                <div class="col-md-8">
                                  <input type="text" name="endereco" class="form-control" value="">
                                </div>
                                <div class="col-md-4">N° DA CASA/AP:</div>
                                <div class="col-md-8">
                                  <input type="text" name="n_casa" class="form-control" value="">
                                </div>
                                <div class="col-md-4">BAIRRO:</div>
                                <div class="col-md-8">
                                  <input type="text" name="bairro" class="form-control" value="">
                                </div>          
                          
                    <div class="col-md-12"><hr></div>
                    <button class="btn btn-success" name="btn-cadastrar" type="submit" >CADASTRAR CLIENTE</button>
                    
                    </form>
                </div>
               </div>
            </div>
        </div>
    </div> 
    </div>
    
                             
</body>
</html>
