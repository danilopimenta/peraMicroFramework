<div class="row">
    <div class="span12">
        <h1>Clientes</h1>
        <?php if ($dados): ?>
            <table class="table table-condensed alert alert-table">
                <thead>
                    <th>ID</th>
                    <th>Nome / Razão Social</th>
                    <th>CPF / CNPJ</th>
                    <th>E-mail</th>
                    <th>CEP</th>
                    <th>Ações</th>
                </thead>
                <tbody>
                    <?php foreach ($dados as $cliente): ?>
                        <tr>
                            <td><?php echo $cliente['id']; ?></td>
                            <td><?php echo $cliente['nome_razao']; ?></td>
                            <td><?php echo $cliente['cpf_cnpj']; ?></td>
                            <td><?php echo $cliente['email']; ?></td>
                            <td><?php echo $cliente['cep']; ?></td>
                            <td>
                                <a href="admin.php?module=clientes&action=editar&id=<?php echo $cliente['id']; ?>">Editar</a>
                                -
                                <a href="admin.php?module=clientes&action=excluir&id=<?php echo $cliente['id']; ?>">Excluir</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            Nenhum cliente cadastrado
        <?php endif; ?>
        <a href="admin.php?module=clientes&action=inserir">Novo cliente</a>
    </div>
</div>


