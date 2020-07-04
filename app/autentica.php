<?php
include "../models/usuarios.php";

$myuser = new usuarios();
if(isset($_POST['f_mail']) and isset($_POST['f_senha']))
{
    $myuser->setEmail($_POST['f_mail']);
    $myuser->setSenha(md5($_POST['f_senha']));
    $resultado = $myuser->login();

    if($resultado > 0)
    {
        if($myuser->getSenha() == 'e10adc3949ba59abbe56e057f20f883e')
        {
            $resultado = $myuser->busca($_POST['f_mail'], md5($_POST['f_senha']));
            foreach($resultado as $key=>$value):
                $id = $value->id;
            endforeach;
            session_start();
            $_SESSION["id"] = $id;
            echo '<script>window.top.location.href = "../actions/novaSenha.php";</script>';
        }
        else
        {
            echo '<script>window.top.location.href = "../actions/cadastro.php";</script>';
        }
    }
    else
    {
        echo '<script>window.top.location.href = "../index.php?mensagem=falha";</script>';
    }
}
else
{
    echo '<script>window.top.location.href = "index.php?mensagem=falha";</script>';
}