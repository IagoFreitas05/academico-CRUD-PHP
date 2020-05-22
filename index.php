<?php include "models/usuarios.php";
$myuser = new usuarios();
if(isset($_POST['f_mail']) and isset($_POST['f_senha'])){
	$myuser->setEmail($_POST['f_mail']);
	$myuser->setSenha(md5($_POST['f_senha']));
	$resultado = $myuser->login();
	if($resultado > 0){
		if($myuser->getSenha() == 'e10adc3949ba59abbe56e057f20f883e')
		{
			$resultado = $myuser->busca($_POST['f_mail'], md5($_POST['f_senha']));
			foreach($resultado as $key=>$value):
				$id = $value->id;
			endforeach;
			session_start();
			$_SESSION["id"] = $id;
			Header("Location:actions/novaSenha.php");
		}
		else
		{
			Header("Location:actions/cadastro.php");
		}
	}
	else
	{
		exibe_pagina('<div class="alert alert-warning">Login ou senha incorreto</div> ');
	}
}
else
{
	exibe_pagina('');
}

function exibe_pagina($mensagem){
	?>

	<!DOCTYPE html>
	<html lang="en">
	<head>
		<title>Login</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="assets/css/style.css">
		<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	</head>
	<body>
		<div class="container-fluid" style="height: 100%;">
			<div class="row " style="height:100%;">
				<div class="col-md-6" style="background: url('assets/image/fundo.png');background-position:center	">
				</div>
				<div class="col-md-6 p-5 bg-info" style="height:100vh;">
					<?= $mensagem ?>
					<form class='form-signin align-middle mt-5 shadow-lg p-5 bg-white' method=POST action="#">
						<div class="form-group">
							<label for="txtUsuario">usuário</label>
							<input type="text" placeholder="digite seu email" name="f_mail" id="f_mail" class="form-control form-custom"  required="" />
						</div>

						<div class="form-group">
							<label for="txtSenha">senha</label>
							<input type="password" placeholder="digite sua senha" name="f_senha" id="f_senha" class="form-control form-custom"  required=""/>
						</div>

						<div class="form-group">
								<button type="submit" class="btn btn-md btn-info btn-block shadow"  name="btnComando" type="btnComando" value="LOGIN" >Entrar</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
<?php
}
?>
