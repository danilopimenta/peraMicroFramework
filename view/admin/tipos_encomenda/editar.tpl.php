<div class="row">
    <div class="span12">
        <h1>Editar tipo de encomenda ID <?php echo $dados['id']; ?></h1>
        <hr />
    </div>
</div>
<form action="" method="POST">
    <div class="row">
	<span class="span2 offset1">Nome:</span>
	<input class="span4" type="text" name="nome" value="<?php echo $dados['nome']; ?>" />
    </div>
    <div class="row">    
	<span class="span2 offset1">Valor KM:</span>
	<input class="span1" type="text" name="valor_km" value="<?php echo $dados['valor_km']; ?>" /> reais
    </div>
    <div class="row">    
	<span class="span2 offset1">Prazo Máximo:</span>
	<input class="span1" type="text" name="prazo_maximo" value="<?php echo $dados['prazo_maximo']; ?>" /> dias
    </div>
    <div class="row">    
        <button class="btn" type="submit">Enviar</button>
    </div>
</form>