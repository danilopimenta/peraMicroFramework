<div class="row">
    <div class="span12">
        <h1>Funcionários</h1>
        <?php if ($dados): ?>
            <table class="table table-condensed alert alert-table">
                <thead>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Perfil</th>
                    <th>E-mail</th>
                    <th>Senha</th>
                    <th>Ações</th>
                </thead>
                <tbody>
                    <?php foreach($dados as $funcionario): ?>
                        <tr>
                            <td><?php echo $funcionario['id']; ?></td>
                            <td><?php echo $funcionario['nome']; ?></td>
                            <td><?php echo Perfis::getNome($funcionario['prf_id']); ?></td>
                            <td><?php echo $funcionario['email']; ?></td>
                            <td><?php echo $funcionario['senha']; ?></td>
                            <td>
                                <a href="admin.php?module=funcionarios&action=editar&id=<?php echo $funcionario['id']; ?>">Editar</a>
                                -
                                <a href="admin.php?module=funcionarios&action=excluir&id=<?php echo $funcionario['id']; ?>">Excluir</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            Nenhum funcionário cadastrado
        <?php endif; ?>
        <a href="admin.php?module=funcionarios&action=inserir">Novo funcionário</a>
    </div>
</div>