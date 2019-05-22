<!DOCTYPE html>
<html lang="en">

<head>        
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />    
             
    <title>OuSystem</title>
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
    
    <div id="wrapper">
        
        <div id="header">
            
        <div class="wrap">
			    <span class="logo"></span>
                <div class="buttons">
                    <div class="item">
                        <a href="index.php" class="btn btn-primary btn-sm">
                            <span class="i-forward"> VOLTAR </span>
                        </a>
                                               
                    </div>                
                </div>
                
            </div>
            
        </div>
        
        <div id="layout">
        
            <div id="sidebar">

              

                <ul class="navigation">
                    <li class="openable open">
                        <a href="#">PAINEL DE CONTROLE</a>
                        <ul>
                            <li class="">
                                <a href="admin.php">Página Inicial</a>
                            </li>
                            <li class="active">
                                <a href="c_funcionario.php">Cadastrar Funcionário</a>
                            </li>
                            <li class="">
                                <a href="g_funcionario.php">Gerenciar Funcionários</a>
                            </li>
                      
                        </ul>
                    </li>
                                                       
                                     
                                            
                </ul>

            </div>

            <div id="content">                        
                <div class="wrap">
                    
                                                                                      
                    
                    <div class="container">
                        
                        <div class="row">
                            <div class="col-md-10">
                               <div class="block">
                                    <div class="head"> 
                                    <h5><center><font color="#5378a0">ALTERAR DADOS CADASTRADOS</font></center></h5>
                                    </div>
                                    <form action="" method="post">
                                    <div class="content np">
                                        
                                        <div class="controls-row">
                                            <div class="col-md-3">Nome:</div>
                                            <div class="col-md-5"><input type="text" name="nfuncionario" class="form-control"></div>
                                            <div class="col-md-4"><span class="help-inline">* Como gosta de ser chamado</span></div>
                                        </div>
                                        <div class="controls-row">
                                            <div class="col-md-3">Nome completo:</div>
                                            <div class="col-md-5"><input type="text" name="ncfuncionario" class="form-control"></div>
                                        </div>
                                        <div class="controls-row">
                                            <div class="col-md-3">Senha:</div>
                                            <div class="col-md-5"><input type="password" name="pass" class="form-control"></div>
                                            <div class="col-md-4"><span class="help-inline">*Necessária para acessar o sistema</span></div>
                                        </div>
                                        <div class="controls-row">
                                            <div class="col-md-3">RG / CPF:</div>
                                            <div class="col-md-5"><input type="text" name="ncfuncionario" class="form-control"></div>
                                        </div>
                                        <div class="controls-row">
                                            <div class="col-md-3">Telefone:</div>
                                            <div class="col-md-5"><input type="text" name="ncfuncionario" class="form-control"></div>
                                        </div>
                                        <div class="controls-row">
                                            <div class="col-md-3">Endereço:</div>
                                            <div class="col-md-5"><input type="text" name="ncfuncionario" class="form-control"></div>
                                        </div>
                                        <div class="controls-row">
                                            <div class="col-md-3">Cargo:</div>
                                            <div class="col-md-9">
                                               <select class="form-control">
                                               <option>Selecione</option>
                                               <option>Vendedor</option>
                                               <option>Recepcionista</option>
                                               <option>Técnico</option>
                                               <option>Gerente</option>
                                               <option>Administrador ( Acesso total ao sistema )</option>
                                               </select>
                                            </div>
                                        </div>
                                      
                                        
                                        </div>
                                    </form></div>
                            </div>
                            <div class="col-md-2">
                                <br>
                              <center>
                              <button class="btn btn-primary" type="button">SALVAR AS ALTERAÇÕES</button>
                              <a href="g_funcionario.php" class="btn btn-danger" type="button">CANCELAR / DESCARTAR</a>
                              </center>
                            </div>
                            
                        </div>

                    </div>
                </div>
            </div>
            
        </div>

    </div>
    
</body>


</html>
