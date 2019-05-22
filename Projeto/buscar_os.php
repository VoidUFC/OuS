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
    
    
    
</head>
<body>    
    
    <div id="wrapper" class="sidebar_off">
        
        <div id="header">
            
            <div class="wrap">
			    <span class="logo"></span>
                <div class="buttons">
                    <div class="item">
                        <a href="#" class="btn btn-primary btn-sm">
                            <span class="i-user"> SAIR </span>
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
                         <h1>BUSCAR ORDEM DE SERVIÇO</h1>
                            <ul class="breadcrumb">
                                <li class=""><a href="index.php">Página inicial</a></li>
                                <li class=""><a href="buscar_os.php">Ordem de serviço</a></li>
                                <li class="active">Buscar</li>
                            </ul>
                        </div>
                        
                        <div class="side fr"> 
                            <a href="index.php" class="btn btn-default btn-sm"><font color="#607387"><i class="i-reply"></i> VOLTAR </font></a>  
                        </div>                        
                    </div>                                                                    
                    
 <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="block">
                                    <div class="content np table-sorting">
                                        <table cellpadding="0" cellspacing="0" width="100%" class="sortc">
                                            <thead>
                                                <tr>
                                                    <th width="10%"><center>OS</center></th>
                                                    <th width="35%"><center>Cliente</center></th>
                                                    <th width="10" ><center>Aparelho</center></th>
                                                    <th width="15%"><center>Status</center></th>
                                                    <th width="15%"><center>Opções</center></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
	                                         $result = $conn->prepare("SELECT * FROM ous_os ORDER BY cod DESC  ");
	                                         $result->execute();
	                                         for($i=0; $row_list = $result->fetch(); $i++){
	                                         $id=$row_list['cod'];
	                                         ?>
                                                <tr>
                                                    <td><?php echo $row_list['os_numero'];?></td>
                                                    <td><?php echo $row_list['os_nome_do_cliente'];?></td>
                                                    <td><?php echo $row_list['os_aparelho'];?></td>
                                                    <td><?php 
                             if( utf8_encode($row_list['os_status']) == 'Aberta')    {echo('<span  class="label label-info">Aberta</span>');}
                             if(utf8_encode($row_list['os_status']) == 'Fechada')   {echo('<span  class="label label-danger">Fechada</span>');}
                             if(utf8_encode($row_list['os_status']) == 'Concluida') {echo('<span  class="label label-success">Concluida</span>');}
                             if(utf8_encode($row_list['os_status']) == 'Aguardando'){echo('<span  class="label label-warning">Aguardando</span>');}
                             if(utf8_encode($row_list['os_status']) == 'Orçamento') {echo('<span  class="label label-default">Orçamento</span>');}
                                            ?></td> 
                                                    <td><center>
                                                       <a target="_blank" href="imprimir.php?os=<?php echo $row_list['os_numero'];?>" class="btn btn-primary btn-xs" type="button"><i class="i-printer"></i> IMPRIMIR </a>
                                                        <a href="os.php?id=<?php echo $row_list['os_numero'];?>" class="btn btn-warning btn-xs" type="button"><span class="glyphicon glyphicon-pencil"></span></a>
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
        
  
      

        
    </div>
</body>
</html>
