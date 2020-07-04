<table class="table table-hover table-responsive table-borderless">
    <tr>
        <th width="20%">nome</th>
        <th width="40%">email</th>
        <th width="10%">editar</th>
        <th width="10%">alterar</th>
        <th width="10%">resetar senha</th>
    </tr>
    <?php
    foreach ($user->findAll() as $key => $value): ?>
        <tr>
            <td><?= $value->nome ?></td>
            <td><?= $value->email ?></td>
            <td>
                <form method="POST" action="../actions/cadastro.php" class="table ">
                    <input type="hidden" name="f_nome" value="<?= $value->nome ?>">
                    <input type="hidden" name="f_mail" value="<?= $value->email ?>">
                    <input type="hidden" name="f_senha" value="<?= $value->senha ?>">
                    <input type="hidden" name="f_id" value="<?= $value->id ?>">
                    <input type="submit" class="btn btn-info btn-sm" value="alterar">
                </form>

            </td>
            <td>
                <form method="POST" action="../actions/cadastro.php">
                    <input type="hidden" name="f_id" value="<?= $value->id ?>">
                    <input type="submit" class="btn btn-info btn-sm" value="excluir">
                </form>

            </td>
            <td>
                <form method="POST" action="../actions/cadastro.php">
                    <input type="hidden" name="f_id" value="<?= $value->id ?>">
                    <button type="submit" class="btn btn-info btn-sm" name="btncomando" id="btncomando" value="resetar">
                        resetar senha
                    </button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>