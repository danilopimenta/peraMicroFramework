<?php

class Funcionarios {

    private $banco;

    const TABELA = 'funcionarios';

    public $id;
    public $nome;

    public function __construct() 
    {
        $this->banco = Banco::instanciar();
    }

    public static function getNome($id) 
    {
        if(!$id) return "Não atribuído";
        
        $funcionario = Banco::instanciar()->ver('funcionarios', 'nome', "id=$id");
        
        return $funcionario['nome'];
    }

    public function listar() 
    {
        return $this->banco->listar(self::TABELA, '*');
    }

    public function ver($campos, $condicao) 
    {
        return $this->banco->ver(self::TABELA, $campos, $condicao);
    }

    public function inserir() 
    {
        if ($_POST) {
            if(empty($_POST['senha'])) {
                Message::set("A senha não foi preenchida!", 'error');
                $error = true;
            } elseif($_POST['senha'] != $_POST['conf_senha']) {
                Message::set("As senhas não conferem!", 'error');
                $error = true;
            }
            
            if(!isset($error)) {
                unset($_POST['conf_senha']);
                $this->banco->inserir(self::TABELA, $_POST);

                Message::set("Registro incluído com sucesso!", 'success');

                header("Location: admin.php?module=funcionarios&action=listar");
                exit();
            }
        }
        return $this->banco->listar('perfis', '*');
    }

    public function editar($id) 
    {
        if ($_POST) {
            if(empty($_POST['senha'])) {
                Message::set("A senha não foi preenchida!", 'error');
                $error = true;
            } elseif($_POST['senha'] != $_POST['conf_senha']) {
                Message::set("As senhas não conferem!", 'error');
                $error = true;
            }
            
            if(isset($error)) {
                header("Location: admin.php?module=clientes&action=editar&id=" . $_GET['id']);
                exit();
            } else {
                unset($_POST['conf_senha']);
                $this->banco->editar(self::TABELA, $_POST, "id=$id");

                Message::set("Registro alterado com sucesso!", 'success');

                header("Location: admin.php?module=funcionarios&action=listar");
                exit();
            }
        } 
        $dados = $this->banco->ver(self::TABELA, '*', "id=$id");
        $dados['perfis'] = $this->banco->listar('perfis', '*');

        return $dados;
    }

    public function excluir($id) 
    {
        $this->banco->excluir(self::TABELA, "id=$id");

        Message::set("Registro excluído com sucesso!", 'success');

        header("Location: admin.php?module=funcionarios&action=listar");
        exit();
    }

    public function dados()
    {
        $funcionario = unserialize($_SESSION['funcionarios']);
        
        $dados = $this->banco->ver(self::TABELA, '*', $funcionario->id);
        $dados['perfil'] = $this->banco->ver('perfis', 'nome', $dados['prf_id']);
        
        return $dados;
    }
    
    public function senha()
    {
        $funcionario = unserialize($_SESSION['funcionarios']);
        
        if($_POST) {
            if(empty($_POST['senha'])) {
                Message::set("A senha não foi preenchida!", 'error');
                $error = true;
            } elseif($_POST['senha'] != $_POST['conf_senha']) {
                Message::set("As senhas não conferem!", 'error');
                $error = true;
            }
            
            if(isset($error)) {
                header("Location: admin.php?module=funcionarios&action=senha&id=" . $_GET['id']);
                exit();
            } else {
                unset($_POST['conf_senha']);
        
                $this->banco->editar(self::TABELA, array('senha' => $_POST['senha']), 'id=' . $funcionario->id);

                Message::set("Senha alterada com sucesso!", 'success');

                header("Location: admin.php");
                exit();
            }
        }
        
        return $this->banco->ver(self::TABELA, '*', $funcionario->id);
    }
    
    public function logar() 
    {
        if ($_POST) {
            if ($this->validar()) {
                $_SESSION['funcionarios'] = serialize($this);
    
                header("Location: admin.php");
                exit();
            } else {
                Message::set("E-mail e/ou senha inválidos!", 'error');
            }
        }
    }

    public function deslogar() 
    {
        unset($_SESSION['funcionarios']);

        header("Location: admin.php");
    }

    private function validar() 
    {
        $funcionarios = $this->ver('*', "email='{$_POST['email']}' AND senha='{$_POST['senha']}' AND prf_id=1");

        if (empty($funcionarios))
            return false;
        else {
            $this->id = $funcionarios['id'];
            $this->nome = $funcionarios['nome'];
            return true;
        }
    }

    private function __sleep() 
    {
        return array('id', 'nome');
    }
}