<?php
include "../models/usuarios.php";
$myuser = new usuarios();
$myuser->setSenha(md5($_POST['f_senha']));
$myuser->setId($_POST['f_id']);
$myuser->updateSenha($_POST['f_id'],md5($_POST['f_senha']));
Header( "Location: ../index.php" );




?>
