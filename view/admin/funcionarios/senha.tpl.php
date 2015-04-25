<div class="row">
    <div class="span12">
        <h1>Alterar senha para <?php echo $dados['nome']; ?></h1>
        <hr />
    </div>
</div>
<form action="" method="POST">
    <div class="row">
        <span class="span2">Nova senha:</span>
        <input class="span2" type="password" name="senha" />
    </div>
    <div class="row">
        <span class="span2">Confirme a senha:</span>
        <input class="span2" type="password" name="conf_senha" />
    </div>
    <div class="row">
        <button type="submit">Enviar</button>
    </div>  
</form>
