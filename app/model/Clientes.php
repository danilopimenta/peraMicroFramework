<?php

class Clientes
{
    private $banco;
    const TABELA = 'clientes';
    
    public $nome_razao;
    public $email;	
    
    public function __construct()
    {
        $this->banco = Banco::instanciar();
    }
    
    public static function getNome($id)
    {
    	$cliente = Banco::instanciar()->ver(self::TABELA, 'nome_razao', "id=$id");
    	
    	return $cliente['nome_razao'];
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
    	if($_POST) {
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

                header("Location: admin.php?module=clientes&action=listar");
                exit();
            }
    	}
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

                header("Location: admin.php?module=clientes&action=listar");
                exit();
            }
        } else {
            return $this->banco->ver(self::TABELA, '*', "id=$id");
        }
    }

    public function excluir($id)
    {
    	$this->banco->excluir(self::TABELA, "id=$id");

    	Message::set("Registro excluído com sucesso!", 'success');
    		
    	header("Location: admin.php?module=clientes&action=listar");
    	exit();
    }
    
    public function cadastro()
    {
    	if($_POST) {
            if(empty($_POST['senha'])) {
                Message::set("A senha não foi preenchida!", 'error');
            } elseif($_POST['senha'] != $_POST['conf_senha']) {
                Message::set("As senhas não conferem!", 'error');
            } else {
                unset($_POST['conf_senha']);
                $this->banco->inserir(self::TABELA, $_POST);
                
                Message::set("Cadastro efetuado com sucesso para '{$_POST['email']}'", 'success');

                header("Location: index.php");
                exit(); // sempre finalizar o script para persistir variaveis de sessao
            }
    	}
    }
    
    public function sobre()
    {
    }
    
    public function logar()
    {
    	if($_POST) {
    		if($this->validar()) {
    			$_SESSION['clientes'] = serialize($this);
    		} else {
    			Message::set("E-mail e/ou senha inválidos!", 'error');
    		}
   			header("Location: {$_SERVER['HTTP_REFERER']}");
   			exit();
    	}
    }
    
    public function deslogar() 
    {
    	unset($_SESSION['clientes']);
    	header("Location: {$_SERVER['HTTP_REFERER']}");
    }
    
    private function validar()
    {
    	$cliente = $this->ver('*', "email='{$_POST['email']}' AND senha='{$_POST['senha']}'");
    	
    	if(empty($cliente)) 
    		return false;
    	else {
    		$this->nome_razao  = $cliente['nome_razao'];
    		$this->email       = $cliente['email'];
    		return true;
    	}
    }
    
    private function __sleep()
    {
    	return array('nome_razao', 'email');
    }
}