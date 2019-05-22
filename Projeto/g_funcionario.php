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
    
    <script type='text/javascript' src='js/datatables/jquery.dataTables.min.js'></script>
    <script type='text/javascript' src='js/scrollup/jquery.scrollUp.min.js'></script>

    <script type='text/javascript' src='js/plugins.js'></script>    
    <script type='text/javascript' src='js/actions.js'></script>
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
                            <li class="">
                                <a href="c_funcionario.php">Cadastrar funcionário</a>
                            </li>
                            <li class="active">
                                <a href="g_funcionario.php">Funcionários registrados</a>
                            </li>
                        </ul>
                    </li>
                                                       
                                     
                                            
                </ul>

            </div>

            <div id="content">                        
                <div class="wrap">
                    
                                                                                      
                    
                    <div class="container">
                        
                        <div class="row">
                            <div class="col-md-12">
                              <div class="block">
                                    <div class="head">                                  
                                    </div>
                                    <div class="content np table-sorting">
                                        
                                        <table cellpadding="0" cellspacing="0" width="100%" class="sortc">
                                            <thead>
                                                <tr>
                                                    <th width="5%">ID</th>
                                                    <th width="20%">Nome</th>
                                                    <th width="20%">Telefone</th>
                                                    <th width="20%">Senha</th>
                                                    <th width="15%">#</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Wesley</td>
                                                    <td>(88) 9 9217-5376</td>
                                                    <td>87554404</td>  
                                                    <td>
                                                        <button class="btn btn-danger btn-xs" type="button"><span class="glyphicon glyphicon-trash"></span> </button>
                                                        <a href="a_funcionario.php" class="btn btn-primary btn-xs" type="button"><span class="glyphicon glyphicon-pencil"></span> Alterar</a>
                                                    </td>
                                                    </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Wesley2</td>
                                                    <td>(88) 9 9217-5376</td>
                                                    <td>87554404</td> 
                                                    <td>
                                                        <button class="btn btn-danger btn-xs" type="button"><span class="glyphicon glyphicon-trash"></span> </button>
                                                        <a href="a_funcionario.php" class="btn btn-primary btn-xs" type="button"><span class="glyphicon glyphicon-pencil"></span> Alterar</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Wesley3</td>
                                                    <td>(88) 9 9217-5376</td>
                                                    <td>87554404</td>
                                                    <td>
                                                        <button class="btn btn-danger btn-xs" type="button"><span class="glyphicon glyphicon-trash"></span> </button>
                                                        <a href="a_funcionario.php" class="btn btn-primary btn-xs" type="button"><span class="glyphicon glyphicon-pencil"></span> Alterar</a>
                                                    </td>
                                                    </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Wesley4</td>
                                                    <td>(88) 9 9217-5376</td>
                                                    <td>87554404</td> 
                                                    <td>
                                                        <button class="btn btn-danger btn-xs" type="button"><span class="glyphicon glyphicon-trash"></span> </button>
                                                        <a href="a_funcionario.php" class="btn btn-primary btn-xs" type="button"><span class="glyphicon glyphicon-pencil"></span> Alterar</a>
                                                    </td>
                                                    </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Wesley</td>
                                                    <td>(88) 9 9217-5376</td>
                                                    <td>87554404</td> 
                                                    <td>
                                                        <button class="btn btn-danger btn-xs" type="button"><span class="glyphicon glyphicon-trash"></span> </button>
                                                        <button class="btn btn-primary btn-xs" type="button"><span class="glyphicon glyphicon-pencil"></span> Alterar</button>
                                                    </td>
                                                    </tr>                               
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
