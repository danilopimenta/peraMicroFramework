<div class="row">
    <div class="span12">
        <h1>Calcular Preços e Prazos</h1>
        <hr />
    </div>
</div>
<form action="" method="POST">
    <div class="row">
        <span class="span2">Tipo da encomenda</span>
        <select name="tip_id">
            <?php foreach($dados['TiposEncomenda'] as $tipo_encomenda): ?>
                <option value="<?php echo $tipo_encomenda['id']; ?>"><?php echo $tipo_encomenda['nome']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="row">
        <span class="span2">Distância:</span>
        <input class="span1" type="text" name="distancia" /> Km
    </div>
    <div class="row">
        <button class="btn" type="submit">Calcular</button>
    </div>
</form>
<?php if(isset($dados['resultado'])): ?>
    <hr />
    <div class="row alert-table">
        <h3>Tipo de encomenda: <?php echo $dados['tipo_encomenda']; ?></h3>
    </div>
    <div class="row alert-info">
        <h5>Distância: <?php echo $dados['distancia']; ?> Km</h5>
    </div>
    <div class="row alert-info">
        <h5>Valor por Km: <?php echo $dados['valor_km']; ?> R$/Km</h5>
    </div>
    <div class="row alert-info">
        <h5>Data da coleta: <?php echo $dados['data_coleta']; ?></h5>
    </div>
    <div class="row alert-success">
        <h4>Data da entrega: <?php echo $dados['data_entrega']; ?></h4>
    </div>
    <div class="row alert-success">
        <h4>Preço do serviço: R$ <?php echo $dados['preco_final']; ?></h4>
    </div>
<?php endif; ?>