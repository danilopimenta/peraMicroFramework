<div class="row">
    <div class="span12">
        <h1>Editar cliente ID <?php echo $dados['id']; ?></h1>
        <hr />
    </div>
</div>
<form action="" method="POST">
    <div class="row">
        <span class="span2 offset1">Nome / Razão Social:</span>
        <input class="span6" type="text" name="nome_razao" value="<?php echo $dados['nome_razao']; ?>" />
    </div>
    <div class="row">
        <span class="span2 offset1">CPF / CNPJ:</span>
        <input class="span4" type="text" name="cpf_cnpj" value="<?php echo $dados['cpf_cnpj']; ?>" />
    </div>
    <div class="row">
        <span class="span2 offset1">E-mail:</span>
        <input class="span4" type="text" name="email" value="<?php echo $dados['email']; ?>" /><br />
    </div>
    <div class="row">
        <span class="span2 offset1">Senha:</span>
        <input class="span4" type="password" name="senha" />
    </div>
    <div class="row">
        <span class="span2 offset1">Confirme a senha:</span>
        <input class="span4" type="password" name="conf_senha" />
    </div>
    <div class="row">
        <span class="span2 offset1">Telefone:</span>
        <input class="span2" type="text" name="telefone" value="<?php echo $dados['telefone']; ?>" />
    </div>
    <div class="row">
        <span class="span2 offset1">Celular:</span>
        <input class="span2" type="text" name="celular" value="<?php echo $dados['celular']; ?>" />
    </div>
    <div class="row">
        <span class="span2 offset1">CEP:</span>
        <input class="span2" type="text" name="cep" value="<?php echo $dados['cep']; ?>" />
    </div>
    <div class="row">
        <span class="span2 offset1">Endereço:</span>
        <textarea class="span6" name="endereco"><?php echo $dados['endereco']; ?></textarea>
    </div>
    <div class="row">
        <span class="span2 offset1">Bairro:</span>
        <input type="text" name="bairro" value="<?php echo $dados['bairro']; ?>" />
    </div>
    <div class="row">
        <span class="span2 offset1">Cidade:</span>
        <input type="text" name="cidade" value="<?php echo $dados['cidade']; ?>" />
    </div>
    <div class="row">
        <span class="span2 offset1">Estado:</span>
        <input class="span1" type="text" name="estado" value="<?php echo $dados['estado']; ?>" />
    </div>
    <div class="row">
        <button class="btn" type="submit">Enviar</button>
    </div>
</form>