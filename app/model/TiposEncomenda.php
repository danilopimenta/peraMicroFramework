<?php

class TiposEncomenda {

    private $banco;

    const TABELA = 'tipos_encomenda';

    public function __construct() {
        $this->banco = Banco::instanciar();
    }

    public static function getNome($id) {
        $tipo_encomenda = Banco::instanciar()->ver(self::TABELA, 'nome', "id=$id");

        return $tipo_encomenda['nome'];
    }

    public function listar() {
        return $this->banco->listar(self::TABELA, '*');
    }

    public function inserir() {
        if ($_POST) {
            $this->banco->inserir(self::TABELA, $_POST);

            Message::set("Registro incluído com sucesso!", 'success');

            header("Location: admin.php?module=TiposEncomenda&action=listar");
            exit();
        }
    }

    public function editar($id) {
        if ($_POST) {
            $this->banco->editar(self::TABELA, $_POST, "id=$id");

            Message::set("Registro alterado com sucesso!", 'success');

            header("Location: admin.php?module=TiposEncomenda&action=listar");
            exit();
        }
        return $this->banco->ver(self::TABELA, '*', "id=$id");
    }

    public function excluir($id) 
    {
        $this->banco->excluir(self::TABELA, "id=$id");

        Message::set("Registro excluído com sucesso!", 'success');

        header("Location: admin.php?module=TiposEncomenda&action=listar");
        exit();
    }

}
