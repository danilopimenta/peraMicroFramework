<div class="row">
    <div class="span12">
        <h1>Rastrear encomenda</h1>
        <hr />
    </div>
</div>
<form action="" method="POST">
    <strong>Código da encomenda:</strong>
    <input class="span4" type="text" name="enc_id" />
    <button class="btn" type="submit">Localizar</button>
</form>
<?php if($dados): ?>
    <h1>Dados da encomenda DX<?php echo str_pad($dados['id'], 8, 0, STR_PAD_LEFT); ?></h1>
    <pre><?php print_r($dados);?></pre>
<?php endif; ?>