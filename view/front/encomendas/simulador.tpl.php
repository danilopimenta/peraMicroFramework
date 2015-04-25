<div class="row">
    <div class="span12">
        <h1>Rastrear encomenda</h1>
        Na Dexter você sabe onde está sua encomenda. Ou não. =D
        <hr />
    </div>
</div>
<form action="" method="POST">
    <div class="row">
        <span class="span2">Data da postagem:</span>
        <input class="span6" type="text" name="nome_razao" />
    </div>
    <div class="row">
        <span class="span2">Distância a percorrer:</span>
        <input class="span4" type="text" name="cpf_cnpj" />
    </div>
    <div class="row">
        <span class="span2">Tipo de encomenda:</span>
        <input class="span4" type="text" name="cpf_cnpj" />
    </div>
    <button class="btn" type="submit">Localizar</button>
</form>
<?php if($dados): ?>
    <h1>Dados da encomenda DX<?php echo str_pad($dados['id'], 8, 0, STR_PAD_LEFT); ?></h1>
    <pre><?php print_r($dados);?></pre>
<?php endif; ?>
