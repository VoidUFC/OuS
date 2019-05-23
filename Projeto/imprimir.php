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

    $KEY = true;
	require_once('conect/setting.php');

    if (isset($_GET['os'])){ 
        $os_numero	 =	addslashes(@$_GET['os']);
     	$os_cons = $GLOBALS['DB']->fetch("SELECT * FROM ous_os WHERE os_numero = ?", $os_numero); 
     	
        $os_numero                = utf8_encode($os_cons['os_numero']);
        $os_nome_do_cliente       = utf8_encode($os_cons['os_nome_do_cliente']);
        $os_id_cliente            = utf8_encode($os_cons['os_id_cliente']);
        $os_cidade_do_cliente     = utf8_encode($os_cons['os_cidade_do_cliente']);
        $os_contato_1_do_cliente  = utf8_encode($os_cons['os_contato_1_do_cliente']);
        $os_contato_2_do_cliente  = utf8_encode($os_cons['os_contato_2_do_cliente']);
        $os_aparelho              = utf8_encode($os_cons['os_aparelho']);
        $os_marca                 = utf8_encode($os_cons['os_marca']);
        $os_modelo                = utf8_encode($os_cons['os_modelo']);
        $os_cor_do_aparelho       = utf8_encode($os_cons['os_cor_do_aparelho']);
        $os_defeito               = utf8_encode($os_cons['os_defeito']);
        $os_status                = utf8_encode($os_cons['os_status']);
        $os_itens                 = utf8_encode($os_cons['os_itens']);
        $os_servico               = utf8_encode($os_cons['os_servico']);
        $os_valor                 = utf8_encode($os_cons['os_valor']);
        $os_data_entrada          = utf8_encode($os_cons['os_data_entrada']);
    }



?>
<!DOCTYPE html>
<html lang="pt-br">
<head>        
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />              
    <title>OS-<?php echo $os_numero?></title>
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
    <script>
    window.print()
    </script>
    
</head>

  
    
<style>
table, th, td {
  border: 1px solid #DCDCDC;
  border-collapse: collapse;
    padding: 5px;
}   
table.ass, th.ass, td.ass {
  border: 0px solid #DCDCDC;
  border-collapse: collapse;
    padding: 13px;
}
</style>
<body>  
    <div id="wrapper" class="sidebar_off">
        <div id="layout">
            <div id="content">       
 <div class="container">
    <div class="row">
        <div class="col-md-12">
            <br>
  <table style="width:100%">
  <td>
      <img src="img/logomarca.jpg" width="140">
      <div class="side fr">
       <font size="2px">
       Rua da empresa, N° 00<br>
       (88) 8 8888-8888 <br>
       emaildaempresa@email.com <br>
       www.empresa.com  <br></font>
      </div>
  </td>
  </table>
                  <br>
                  <table style="width:100%" >
                  <td bgcolor="#DCDCDC">
                  <center><h5>ORDEM DE SERVIÇO  <div class="side fr">N° <?php echo $os_numero?></div></h5></center>
                  </td>
                  </table>
          <br>
  <table style="width:100%" >
  <td bgcolor="#DCDCDC">
      <b>DADOS DO CLIENTE</b>
   </td>
  </table>
            
  <table style="width:100%">
  <tr>
    <td width="130px"><b>NOME DO CLIENTE:</b></td>
    <td><?php echo strtoupper($os_nome_do_cliente);?></td>
    <td width="130px"><b>CÓDIGO DO CLIENTE:</b></td>
    <td><?php echo strtoupper($os_id_cliente);?></td>
  </tr>
</table>
  <table style="width:100%" >
  <td bgcolor="#DCDCDC">
      <b>DADOS DO APARELHO</b>
   </td>
  </table>
           
<table style="width:100%">
  <tr>
    <td width="25%"><b>APARELHO:</b><br><?php echo strtoupper($os_aparelho); ?></td>
    <td width="25%"><b>MARCA:</b><br><?php echo strtoupper($os_marca); ?> </td>
    <td width="25%"><b>MODELO:</b><br><?php echo strtoupper($os_modelo); ?> </td>
    <td width="25%"><b>COR:</b><br><?php echo strtoupper($os_cor_do_aparelho); ?></td>
  </tr>
</table>

 <table style="width:100%">
  <tr>
    <td><b>Descrição do defeito/problema do aparelho (informado pelo cliente):</b><br><?php echo strtoupper($os_defeito); ?></td>
  </tr>
  <tr>
    <td><b>Itens deixado(s) com o aparelho:</b><br><?php echo strtoupper($os_itens); ?></td>
  </tr>
  <tr>
    <td><b>Serviço a ser realizado:</b><br><?php echo strtoupper($os_servico); ?></td>
  </tr>
     <tr>
    <td><b>Valor:</b><br><?php echo strtoupper($os_valor); ?></td>
  </tr>
     <tr>
    <td><b>Data de entrada:</b><br><?php echo $os_data_entrada; ?></td>
  </tr>
</table>
<br> 
            <a href="index.php"class="btn btn-default" type="button">PÁGINA INICIAL</a>
                               
    </div>
	 </div>      
  </div>

</div>
</div> 
    </div>
</body>
</html>
