<div class="row">
    <div class="span12">
        <h1>Nova Encomenda</h1>
        <hr />
    </div>
</div>
<form action="" method="POST">
    <input type="hidden" name="fun_id" value="<?php echo $id; ?>" />
    <div class="row">
        <span class="span2">Cliente:</span>
        <select name="cli_id">
            <?php foreach ($dados['clientes'] as $cliente): ?>
                <option value="<?php echo $cliente['id']; ?>"><?php echo $cliente['nome_razao']; ?></option>
            <?php endforeach; ?>
        </select><br />
    </div>
    <fieldset>
        <legend>Origem</legend>
        <div class="row">
            <span class="span2">CEP:</span>
            <input type="text" name="ori_cep" />
        </div>
        <div class="row">
            <span class="span2">Endereço:</span>
            <input class="span6" type="text" name="ori_endereco" />
        </div>
        <div class="row">
            <span class="span2">Bairro:</span>
            <input class="span4" type="text" name="ori_bairro" />
        </div>
        <div class="row">
            <span class="span2">Cidade:</span>
            <input class="span4" type="text" name="ori_cidade" />
        </div>
        <div class="row">
            <span class="span2">Estado:</span>
            <input class="span1" type="text" size="2" name="ori_estado" />
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
            <input class="span6" type="text" name="dst_nome" />
        </div>
        <div class="row">
            <span class="span2">CEP:</span>
            <input type="text" name="dst_cep" />
        </div>
        <div class="row">
            <span class="span2">Endereço:</span>
            <input class="span6" type="text" name="dst_endereco" />
        </div>
        <div class="row">
            <span class="span2">Bairro:</span>
            <input class="span4" type="text" name="dst_bairro" />
        </div>
        <div class="row">
            <span class="span2">Cidade:</span>
            <input class="span4" type="text" name="dst_cidade" />
        </div>
        <div class="row">
            <span class="span2">Estado:</span>
            <input class="span1" type="text" size="2" name="dst_estado" />
        </div>
    </fieldset>
    <fieldset>
        <legend>Encomenda</legend>
        <div class="row">
            <span class="span2">Tipo da encomenda:</span>
            <select name="tip_id">
                <?php foreach ($dados['TiposEncomenda'] as $tipo_encomenda): ?>
                    <option value="<?php echo $tipo_encomenda['id']; ?>"><?php echo $tipo_encomenda['nome']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="row">
            <span class="span2">Distância:</span>
            <input class="span1" type="text" name="distancia" size="5" /> Km
        </div>
        <div class="row">
            <span class="span2">Data Coleta:</span>
            <input class="span2" type="text" name="data_coleta" />
        </div>
    </fieldset>
    <button class="btn" type="submit">Enviar</button>
</form>