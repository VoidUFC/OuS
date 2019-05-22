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


               
          
                           
                                
    </div>
	 </div>      
  </div>

</div>
</div>
        
        <!-- Bootrstrap default dialog -->    
    <div class="modal fade" id="ver" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="col-md-12">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="modal-title" id="myModalLabel">OS N° 12</h3>
                </div>
                <div class="modal-body">
                                    <div class="content invoice">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <h4>Cliente</h4>
                                                <address>
                                                    <strong>JOAO WESLEY SILVA MACEDO</strong><br>
                                                </address>
                                            </div>
                                            <div class="col-md-3">
                                                <h4>Aparelho</h4>
                                                <address>
                                                    <strong>Samsung J5 pro, Dourado.</strong><br>
                                                    
                                                 
                                                </address>                                
                                            </div>
                                            <div class="col-md-3"></div>
                                            <div class="col-md-3">
                                                <h4>N° OS: 124</h4>
                                                <p><strong>Entrada:</strong> 11/03/2019 ás 17:02</p>
                                                <p><strong>Recebido por:</strong> stefanne</p>
                                                <div class="highlight">
                                                    <strong>Amount Due:</strong> $2,351.50 <em>USD</em>
                                                </div>
                                            </div>
                                        </div>

                                        <h4>Description</h4>
                                        <p>Website development</p>

                                        <table cellpadding="0" cellspacing="0" width="100%" class="list">
                                            <thead>
                                                <tr>
                                                    <th width="70%">Description</th>
                                                    <th width="10%">Price</th>
                                                    <th width="10%">Quantity</th>
                                                    <th width="10%">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Web Design</td>
                                                    <td>$800</td>
                                                    <td>1</td>
                                                    <td>$800</td>
                                                </tr>
                                                <tr>
                                                    <td>Programming</td>
                                                    <td>$1,151.50</td>
                                                    <td>1</td>
                                                    <td>$1,151.50</td>
                                                </tr>                                
                                                <tr>
                                                    <td>Logo Design</td>
                                                    <td>$400</td>
                                                    <td>1</td>
                                                    <td>$400</td>
                                                </tr>                                            
                                            </tbody>
                                        </table>                                                                                
                                        <div class="row">
                                            <div class="col-md-9">
                                                <h4>Payment method: <span class="text-danger">International Transfer (SWIFT)</span></h4>
                                                <p><strong>Country:</strong> Ukraine</p>
                                                <p><strong>Holder's Name:</strong> Dmitry Ivaniuk</p>
                                                <p><strong>Number/IBAN:</strong> UA85 3996 2200 0000 0260 0123 3566 1</p>
                                                <p><strong>SWIFT Code:</strong> 1234567891</p>
                                                <p><strong>Bank Name in Full:</strong> Bank of Ukraine</p>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="total">
                                                    <p><strong><span>Subtotal:</span> $2,351.50 <em>USD</em></strong></p>
                                                    <div class="highlight">
                                                        <strong><span>Total:</span> $2,351.50 <em>USD</em></strong>
                                                    </div>
                                                </div>
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
