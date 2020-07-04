<?php
$user = new usuarios();
?>
<html>
    <head>
        <title>relatorio</title>

        <style>
            body{
                background-color: #17A2B8;
            }
            *{
                margin:0px;
                padding:0px;
                font-family: 'consolas';
            }
            td, th {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
                }

                tr:nth-child(even) {
                background-color: #dddddd;
                }
            table
            {
                border: 1px solid #17A2B8;
                border-radius:10px;
                padding:15px;
                margin: 0 auto;
                background-color:white;
            }
            div{

                border-radius:9px;
                background-color: white;
                margin: 0 auto;
                width:70%;
                margin-top: 10vh;
            }
        </style>
    </head>
    <body>
    <div>
        <h2 style="text-align: center;color: #17A2B8;margin:15px;padding:10px;">Relatório de usuarios</h2>
    </div>
        <table class="table table-hover table-responsive table-borderless" style="text-align: left">
            <tr style="color:#17A2B8">
                <th width="50%">nome</th>
                <th width="50%">email</th>
            </tr>
            <?php

            foreach ($user->findAll() as $key => $value): ?>
                <tr>
                    <td><?= $value->nome ?></td>
                    <td><?= $value->email ?></td>

                </tr>
            <?php endforeach; ?>
        </table>
    </body>
</html>
