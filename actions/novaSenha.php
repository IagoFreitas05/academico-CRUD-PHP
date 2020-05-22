<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Nova senha</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

</head>
<body>
  <div class="container-fluid bg-info" style="height:100vh">
    <div class="row">
      <div class="col-md-4 mt-5 mx-auto">
        <form  method="POST" action="salvarNovaSenha.php" class="p-5 bg-white shadow">
          <div class="form-group">
            <div style="color:#888;">Insira uma nova senha</div><br>
            <label for="txtSenha">nova senha</label>
            <input type='hidden' name='f_id' value="<?= $_SESSION["id"] ?>">
            <input type="password" placeholder="Senha" name="f_senha" id="f_senha" class="form-control form-custom"  required=""/>
          </div>
          <button type="submit" class="btn  btn-info btn-block"  name="btnComando" type="btnComando" value="Alterar_senha" >Salvar</button>
        </div>
      </form>
    </div>
  </div>
</div>

</body>
</html>
