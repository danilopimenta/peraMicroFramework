<div class="row">
    <div class="span12">
        <h1>Editar funcionário ID <?php echo $dados['id']; ?></h1>
        <hr />
    </div>
</div>
<form action="" method="POST">
    <div class="row">
        <span class="span2 offset1">Nome:</span>
	<input class="span6" type="text" name="nome" value="<?php echo $dados['nome']; ?>" />
    </div>
    <div class="row">    
	<span class="span2 offset1">Perfil:</span>
	<select class="span2" name="prf_id">
            <?php foreach($dados['perfis'] as $perfil): ?>
                <option value="<?php echo $perfil['id']; ?>"<?php echo $perfil['id'] == $dados['prf_id'] ? ' selected' : ''; ?>><?php echo $perfil['nome']; ?></option>
            <?php endforeach; ?>
	</select>
    </div>
    <div class="row">
	<span class="span2 offset1">E-mail:</span>
	<input class="span4" type="text" name="email" value="<?php echo $dados['email']; ?>" />
    </div>
    <div class="row">
        <span class="span2 offset1">Senha:</span>
	<input class="span2" type="password" name="senha" />
    </div>
    <div class="row">
	<span class="span2 offset1">Confirme a senha:</span>
	<input  class="span2" type="password" name="conf_senha" />
    </div>
    <div class="row">
        <button class="btn" type="submit">Enviar</button>
    </div>
</form>