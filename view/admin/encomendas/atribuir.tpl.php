<div class="row">
    <div class="span12">
        <h1>Editar Encomenda DX<?php echo str_pad($dados['id'], 8, 0, STR_PAD_LEFT); ?></h1>
        <hr />
    </div>
</div>
<fieldset>
    <legend>Origem</legend>
    <div class="row">
        <span class="span2">Cliente:</span>
        <span class="span2"><?php echo $dados['cliente']; ?></span>
    </div>
    <div class="row">
        <span class="span2">CEP:</span>
        <span class="span2"><?php echo $dados['ori_cep']; ?></span>
    </div>
    <div class="row">
        <span class="span2">Endereço:</span>
        <span class="span6"><?php echo $dados['ori_endereco']; ?></span>
    </div>
    <div class="row">
        <span class="span2">Bairro:</span>
        <span class="span4"><?php echo $dados['ori_bairro']; ?></span>
    </div>
    <div class="row">
        <span class="span2">Cidade:</span>
        <span class="span4"><?php echo $dados['ori_cidade']; ?></span>
    </div>
    <div class="row">
        <span class="span2">Estado:</span>
        <span class="span1"><?php echo $dados['ori_estado']; ?></span>
    </div>
</fieldset>
<!--
<fieldset>
    <legend>Dados do Pacote</legend>
    <div class="row">
        <div class="offset1 span3">
            Largura: <input class="span1" type="text" name="l_pac" size="5" /> cm
        </div>
        <div class="span3">
            Altura: <input class="span1" type="text" name="a_pac" size="5" /> cm
        </div>
        <div class="span3">
            Profundidade: <input class="span1" type="text" name="p_pac" size="5" /> cm
        </div>
    </div>
</fieldset>
-->
<fieldset>
    <legend>Destinatário</legend>
    <div class="row">
        <span class="span2">Nome:</span>
        <span class="span6"><?php echo $dados['dst_nome']; ?></span>
    </div>
    <div class="row">
        <span class="span2">CEP:</span>
        <span class="span2"><?php echo $dados['dst_cep']; ?></span>
    </div>
    <div class="row">
        <span class="span2">Endereço:</span>
        <span class="span6"><?php echo $dados['dst_endereco']; ?></span>
    </div>
    <div class="row">
        <span class="span2">Bairro:</span>
        <span class="span4"><?php echo $dados['dst_bairro']; ?></span>
    </div>
    <div class="row">
        <span class="span2">Cidade:</span>
        <span class="span4"><?php echo $dados['dst_cidade']; ?></span>
    </div>
    <div class="row">
        <span class="span2">Estado:</span>
        <span class="span1"><?php echo $dados['dst_estado']; ?></span>
    </div>
</fieldset>
<fieldset>
    <legend>Encomenda</legend>
    <div class="row">
        <span class="span2">Tipo da encomenda:</span>
        <span class="span1"><?php echo $dados['tipo_encomenda']; ?></span>
    </div>
    <div class="row">
        <span class="span2">Distância:</span>
        <span class="span2"><?php echo $dados['distancia']; ?> Km</span>
    </div>
    <div class="row">
        <span class="span2">Data da Coleta:</span>
        <span class="span2"><?php echo $dados['data_coleta']; ?></span>
    </div>
    <div class="row">
        <span class="span2">Previsão de entrega:</span>
        <span class="span2"><?php echo $dados['data_prevista']; ?></span>
    </div>
</fieldset>
<form action="" method="POST">
    <fieldset>
        <legend>Transporte</legend>
        <div class="row">
            <span class="span2">Motorista:</span>
            <select name="mot_id">
                <option value="">Não atribuído...</option>
                <?php foreach ($dados['motoristas'] as $motorista): ?>
                    <option value="<?php echo $motorista['id']; ?>"<?php if($motorista['id'] == $dados['mot_id']) echo ' selected="selected"'; ?>><?php echo $motorista['nome']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </fieldset>
    <button class="btn" type="submit">Enviar</button>
</form>