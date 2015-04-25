<div class="row">
    <div class="span8">
        <h1>Tipo de Encomenda</h1>
        <?php if ($dados): ?>
            <table  class="table table-condensed alert alert-table">
                <thead>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Valor KM</th>
                    <th>Prazo Máximo</th>
                    <th>Ações</th>
                </thead>
                <tbody>
                    <?php foreach ($dados as $TiposEncomenda): ?>
                        <tr>
                            <td><?php echo $TiposEncomenda['id']; ?></td>
                            <td><?php echo $TiposEncomenda['nome']; ?></td>
                            <td><?php echo $TiposEncomenda['valor_km']; ?></td>
                            <td><?php echo $TiposEncomenda['prazo_maximo']; ?> dias</td>
                            <td>
                                <a href="admin.php?module=TiposEncomenda&action=editar&id=<?php echo $TiposEncomenda['id']; ?>">Editar</a>
                                -
                                <a href="admin.php?module=TiposEncomenda&action=excluir&id=<?php echo $TiposEncomenda['id']; ?>">Excluir</td>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            Nenhum tipo de encomenda cadastrado
        <?php endif; ?>
        <a href="admin.php?module=TiposEncomenda&action=inserir">Novo tipo de encomenda</a>
    </div>
</div>