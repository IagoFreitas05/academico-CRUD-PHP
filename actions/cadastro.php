<?php
include "../models/usuarios.php";
use Dompdf\Dompdf;
require __DIR__."/../vendor/autoload.php";
error_reporting(0);
?>
<html>
<head>
	<title>Cadastrar usuário</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" href="../assets/css/style.css">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
	<section>
		<div class="container-fluid">
			<div class="row bg-info">
				<div class="col-md-6 p-5">
					<div class="card border-0 shadow p-5" >
						<h5>Olá, seja bem vindo!</h5>
							<p style="font-size:14px;">Este projeto, é um trabalho escolar desenvolvido por mim! <a href="https://devfactor.com.br">Iago freitas</a>. Que tem por objetivo instruir os alunos ao CRUD básico utilizando a linguagem PHP(<i style="color:red" class="fa fa-heart"></i>)<a href="https://github.com/IagoFreitas05"><i class="fa fa-github"> </i> IagoFreitas05</a></p>
							<p style="font-size:14px;">Este projeto utiliza a arquitetura ensinada pela professora <a target="blank" href="http://buscatextual.cnpq.br/buscatextual/visualizacv.do?metodo=apresentar&id=K4710011P9">Mariangela Ferreira Fuentes Molina</a></p>

							<a href="https://devfactor.com.br" target="blank">
								<img width="200px" height="200px" src="https://devfactor.com.br/images/logo-dark.png" class="img-fluid thumbnail" alt="">
							</a>
						</div>
					</div>
					<div class="col-md-6 p-5">
						<?php
						$user = new usuarios();
						if(isset($_POST['f_nome']) and isset($_POST['f_mail']) and isset($_POST['f_senha']) and isset($_POST['f_id']))
						{
							?>
							<form method="POST" action="alterar.php" class="shadow p-5 bg-white rounded">
								<div class="form-group">
									<p>Nome: <input class='form-control form-custom' type=text name=f_nome value="<?=$_POST['f_nome'] ?>"></p>
								</div>
								<div class="form-group">
									<p>Email: <input class='form-control form-custom' type=text name=f_mail value="<?= $_POST['f_mail'] ?>"></p>
								</div>
								<div class="form-group">
									<p>Senha: <input class='form-control form-custom' type=password name=f_senha value="<?= $_POST['f_senha']?>" readonly=“true”></p>
								</div>
								<div class="">
									<input type=hidden name=f_id value="<?= $_POST['f_id'] ?>">
									<input class='btn btn-info btn-block' type='submit' value='Enviar'>
								</div>
							</form>
							<?php
						}
						elseif (isset($_POST['f_nome']) and isset($_POST['f_mail']) and isset($_POST['f_senha']))
						{
							$user->setNome($_POST['f_nome']);
							$user->setEmail($_POST['f_mail']);
							$user->setSenha(md5($_POST['f_senha']));
							$user->insert();
							?>
							<form method="POST" action="#" class="shadow p-5 bg-white rounded">
								<div class="form-group">
									<p>nome: <input class='form-control form-custom' type=text name=f_nome></p>
								</div>
								<div class="form-group">
									<p>email: <input class='form-control form-custom' type=text name=f_mail></p>
								</div>
								<div class="form-group">
									<p>senha: <input class='form-control form-custom' type=password name=f_senha></p>
								</div>
								<div class="form-group">
									<input class='btn btn-info btn-block' type=submit value=Enviar>
								</div>
							</form>
							<?php
						}

						elseif(isset($_POST['f_id']))
						{
							if(isset($_POST['f_id']) and ($_POST['btncomando']=='resetar')){
								$user->setSenha(md5(123456));
								$user->reset($_POST['f_id']);
								?>
								<form method='POST' action="#" class="shadow p-5 bg-white rounded">
									<div class="form-group">
										<p>Nome: <input class='form-control form-custom' type="text" name="f_nome"></p>
									</div>
									<div class="form-group">
										<p>Email: <input class='form-control form-custom' type=text name=f_mail></p>
									</div>
									<div class="form-group">
										<p>Senha: <input  class='form-control form-custom' type=password name=f_senha></p>
									</div>
									<div class="form-group">
										<input class='btn btn-info btn-block' type=submit value=Enviar>
									</div>
								</form>
								<div class="alert alert-success">senha resetada com sucesso<div>
									<?php
								}
								else
								{
									$user->setId($_POST['f_id']);
									$user->delete($_POST['f_id']);
									?>
									<form method="POST" action="#" class="shadow p-5 bg-white rounded">
										<div class="form-group">
											<p>Nome: <input class='form-control form-custom' type=text name=f_nome></p>
										</div>
										<div class="form-group">
											<p>Email: <input  class='form-control form-custom' type=text name=f_mail></p>
										</div>
										<div class="form-group">
											<p>Senha: <input class='form-control form-custom' type=password name=f_senha></p>
										</div>
										<div class="form-group">
											<input class='btn btn-info btn-blcok' type=submit value=Enviar>
										</div>
									</form>
									<?php
								}
							}
							else
							{
								?>
								<form method="POST" action="#" class="shadow p-5 bg-white rounded">
									<p>nome: <input class='form-control form-custom' type=text name=f_nome placeholder="seu nome"></p>
									<br/>
									<p>email: <input class='form-control form-custom' type=text name=f_mail placeholder="seu melhor email"></p>
									<br/>
									<p>senha: <input  class='form-control form-custom' type=password name=f_senha placeholder="sua melhor senha"></p>
									<br/>
									<input class='btn btn-info btn-block' type=submit value=Enviar>
								</form>
								<?php
							}
							?>
						</div>
					</div>
				</div>
			</section>
			<div class="container-fluid light">
				<div class="row">
					<div class="col-md-12 shadow p-5 mx-auto">
                        <a href="../actions/gerarRelatorio.php" class="btn btn-success"><i class="fa fa-file"></i> gerar pdf</a>
                        <br>
                        <br>
                        <?php
                            require __DIR__."/../views/user.php";
                        ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>

