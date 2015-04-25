<div class="row">
    <div class="span12">
        <h1>Serviços vendidos</h1>
        <?php if($dados): ?>
            <table class="table table-condensed alert alert-table">
                <thead>
                    <th>Código / Cliente</th>
                    <th>Data Coleta</th>
                    <th>Tipo</th>
                    <th>Data Prevista</th>
                    <th>Distância</th>
                    <th>Preço</th>
                    <th>Motorista</th>
                    <th>Status</th>
                    <th>Data Entrega</th>
                </thead>
                <tbody>
                    <?php foreach($dados as $encomenda): ?>
                        <tr>
                            <td>
                                <a href="admin.php?module=encomendas&action=editar&id=<?php echo $encomenda['id']; ?>">
                                    DX<?php echo str_pad($encomenda['id'], 8, 0, STR_PAD_LEFT); ?>
                                </a><br />
                                <?php echo Clientes::getNome($encomenda['cli_id']); ?>
                            </td>
                            <td><?php echo $encomenda['data_coleta']; ?></td>
                            <td><?php echo $encomenda['tip_id'] ? TiposEncomenda::getNome($encomenda['tip_id']) : ''; ?></td>
                            <td><?php echo $encomenda['data_prevista']; ?></td>
                            <td><?php echo $encomenda['distancia']; ?> Km</td>
                            <td>R$ <?php echo $encomenda['valor']; ?></td>
                            <td><?php echo Funcionarios::getNome($encomenda['mot_id']); ?></td>
                            <td><?php echo Encomendas::defineStatus($encomenda['id']); ?></td>
                            <td><?php echo $encomenda['data_entrega']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            Nenhum serviço foi vendido até o momento.
        <?php endif; ?>
    </div>
</div>