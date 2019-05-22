<?php
	ob_start();
	session_start();
	require_once 'conect/dbconnect.php';
	if ( isset($_SESSION['user'])!="" ) {
		header("Location: index.php");
		exit;
	}

	
	$error = false;
	
	if( isset($_POST['btn-login']) ) {	
	$user = trim($_POST['user']);
	$user = strip_tags($user);
	$user = htmlspecialchars($user);
		
	$pass = trim($_POST['pass']);
	$pass = strip_tags($pass);
	$pass = htmlspecialchars($pass);


    
	if (!$error) {
	$password = hash('sha256', $pass);
	$res=mysql_query("SELECT cod, id_funcionario, password FROM ous_funcionarios WHERE id_funcionario ='$user'");
	$row=mysql_fetch_array($res);
	$count = mysql_num_rows($res); 
	if( $count == 1 && $row['password']==$password ) {
	$_SESSION['user'] = $row['cod']; 
    
    
    	date_default_timezone_set('America/Sao_Paulo');
	$res=mysql_query("SELECT * FROM ous_funcionarios WHERE cod=".$_SESSION['user']);
	$userRow=mysql_fetch_array($res);
	$KEY = true;
	require_once('conect/setting.php');
	
    $user_id= $userRow['id_funcionario'];
    $user_n= $userRow['nome'];
    $user_sb= $userRow['sobrenome'];
    $user_dt= date('d/m/y').' as '. date('H:i');
    $user_c= $userRow['cargo'];
    
    $query = mysql_query("INSERT INTO ous_recent_acess(id_funcionario,nome,sobrenome,data_hora,cargo) VALUES('$user_id','$user_n','$user_sb','$user_dt','$user_c')");

    // Redirecionar para a página principal
    header("Location: index.php");
	} else {
	$errMSG = "Nome de usuário ou senha incorreta.";
	} } }
    


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
    
    <script type='text/javascript' src='js/scrollup/jquery.scrollUp.min.js'></script>
    
    <script type='text/javascript' src='js/plugins.js'></script>    
    <script type='text/javascript' src='js/actions.js'></script>
</head>
<body>        
    <div id="wrapper" class="screen_wide sidebar_off">       
        <div id="layout">
            <div id="content">                        
                <div class="wrap nm">            
                    
                    <div class="signin_block">
                        <div class="row">
                             <?php
			if ( isset($errMSG) ) {
				
				?>
				<div class="alert alert-danger" role="alert">
                <?php echo $errMSG; ?>
                </div>
                <?php
			}
			?>
                          	<form id="app" @submit="checkForm" method="post"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">  
                                    <p v-if="errors.length">
                                        <b>Por favor, corrija o(s) seguinte(s) erro(s):</b>
                                        <ul>
                                            <li v-for="error in errors">{{ error }}</li>
                                        </ul>
                                    </p>
                            <div class="block">
                                <div class="head">
                                    <h2>Entrar</h2>                           
                                </div>
                                <div class="content np">
                                    <div class="controls-row">
                                        <div class="col-md-3">Login:</div>
                                        <div class="col-md-9"><input type="text"  name="user" class="form-control"  value="ous_"v-model="name"/></div>
                                    </div>
                                    <div class="controls-row">
                                        <div class="col-md-3">Senha:</div>
                                        <div class="col-md-9"><input type="password" name="pass" class="form-control"  v-model="senha"/></div>
                                    </div>                                
                                </div>
                                <div class="footer">
                                    <div class="side fl">
                                        <a href="">Recuperar dados</a>
                                    </div>
                                    <div class="side fr">
                                        <input type="submit"  name="btn-login" value="Login" class="btn btn-primary" />
                                    </div>
                                </div>
                                
                               
                                </form>

                                <script src="http://cdnjs.cloudflare.com/ajax/libs/vue/1.0.25/vue.min.js"></script>

                                <script>
                                    const app = new Vue({
                                      el: '#app',
                                      data: {
                                        errors: [],
                                        name: null,
                                        senha: null,
                                      },
                                      methods:{
                                        checkForm: function (e) {
                                          if (this.name && this.senha) {
                                            return true;
                                          }

                                          this.errors = [];

                                          if (!this.name) {
                                            this.errors.push('O seu login é obrigatório.');
                                          }
                                          if (!this.senha) {
                                            this.errors.push('A sua senha é obrigatória.');
                                          }

                                          e.preventDefault();
                                        }
                                      }
                                    })
                                </script>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>               
        
    </div>
    
</body>
</html>
