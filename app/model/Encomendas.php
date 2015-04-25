<?php

class Encomendas {

    private $banco;

    const TABELA = 'encomendas';

    public function __construct() 
    {
        $this->banco = Banco::instanciar();
    }

    public function listar()
    {
        return $this->banco->listar(self::TABELA, '*');
    }

    public function pendentes() 
    {
        return $this->banco->listar(self::TABELA, '*', 'data_entrega IS NULL');
    }
    
    public function finalizados() 
    {
        return $this->banco->listar(self::TABELA, '*', 'data_entrega IS NOT NULL');
    }
        
    public function vender() 
    {
        if ($_POST) {
            $tipo_encomenda = $this->banco->ver('tipos_encomenda', '*', "id=" . $_POST['tip_id']);
            
            // Calcular prazo para entrega (DATA PREVISTA!)
            $_POST['data_prevista'] = $this->calculaPrazo($tipo_encomenda, $_POST['data_coleta']);
            // Calcular preço do serviço
            $_POST['valor'] = $this->calculaPreco($tipo_encomenda, $_POST['distancia']);

            $this->banco->inserir(self::TABELA, $_POST);

            Message::set('Encomenda incluída com sucesso!', 'success');

            header("Location: admin.php?module=encomendas&action=listar");
            exit();
        } 
        $dados['perfis'] = $this->banco->listar("perfis", '*');
        $dados['motoristas'] = $this->banco->listar("funcionarios", '*', "prf_id=" . Perfis::getId('motorista'));
        $dados['clientes'] = $this->banco->listar("clientes", '*');
        $dados['TiposEncomenda'] = $this->banco->listar("tipos_encomenda", '*');

        return $dados;
    }
    
    public function atribuir()
    {
        if($_POST) {
            // A encomenda passa a estar 'em transito' neste momento
            $_POST['transito'] = 1;
            $this->banco->editar(self::TABELA, $_POST, 'id=' . $_GET['id']);
            
            Message::set("Motorista atribuído com sucesso!", 'success');
            
            header("Location: admin.php?module=encomendas&action=pendentes");
            exit();
        }
        $dados = $this->banco->ver(self::TABELA, '*', 'id=' . $_GET['id']);
        $dados['motoristas'] = $this->banco->listar("funcionarios", '*', "prf_id=" . Perfis::getId('motorista'));
        
        $cliente = $this->banco->ver('clientes', '*', 'id=' . $dados['cli_id']);
        $dados['cliente'] = $cliente['nome_razao'];
        
        $tipo_encomenda = $this->banco->ver('tipos_encomenda', '*', 'id=' . $dados['tip_id']);
        $dados['tipo_encomenda'] = $tipo_encomenda['nome'];
        
        return $dados; 
    }
    
    public function finalizar()
    {
        if($_POST) {
            // A encomenda deixa de estar 'em transito' neste momento
            $_POST['transito'] = 0;
            $this->banco->editar(self::TABELA, $_POST, 'id=' . $_GET['id']);
            
            Message::set("Encomenda entregue com sucesso!", 'success');
            
            header("Location: admin.php?module=encomendas&action=pendentes");
            exit();
        }
        
        $dados = $this->banco->ver(self::TABELA, '*', 'id=' . $_GET['id']);
        $dados['motoristas'] = $this->banco->listar("funcionarios", '*', "prf_id=" . Perfis::getId('motorista'));
        
        $cliente = $this->banco->ver('clientes', '*', 'id=' . $dados['cli_id']);
        $dados['cliente'] = $cliente['nome_razao'];
        
        $tipo_encomenda = $this->banco->ver('tipos_encomenda', '*', 'id=' . $dados['tip_id']);
        $dados['tipo_encomenda'] = $tipo_encomenda['nome'];
        
        $funcionarios = $this->banco->ver('funcionarios', '*', 'id=' . $dados['mot_id']);
        $dados['motorista'] = $funcionarios['nome'];
        
        return $dados; 
    }

    public function calcular() 
    {
        $dados['TiposEncomenda'] = $this->banco->listar('tipos_encomenda', '*');
        
        if($_POST) {
            if(!$_POST['distancia']) {
                Message::set('Preencha a distância para calcular o frete!', 'error');
            } else {
                $dados['resultado'] = true;

                $tipo_encomenda = $this->banco->ver('tipos_encomenda', '*', 'id=' . $_POST['tip_id']);
                $dados['tipo_encomenda'] = $tipo_encomenda['nome'];

                $dados['distancia'] = $_POST['distancia'];

                $dados['prazo_maximo'] = $tipo_encomenda['prazo_maximo'];

                $dados['valor_km'] = str_replace('.', ',', $tipo_encomenda['valor_km']);

                $dados['data_coleta'] = date('d/m/Y');

                // Calcula o prazo de entrega
                $dados['data_entrega'] = $this->calculaPrazo($tipo_encomenda, date('Y-m-d'));

                // Calcula o preco final
                $dados['preco_final'] = $this->calculaPreco($tipo_encomenda, $_POST['distancia']);
            }
        }
        
        return $dados;
    }

    public function rastrear()
    {
        // Verifica se o ID da encomenda foi informado por POST ou GET
        $enc_id = false;
        if($_POST) {
            $enc_id = $_POST['enc_id'];
        } elseif(isset($_GET['enc_id'])) {
            $enc_id = $_GET['enc_id']; 
        }
        // Se houver um ID da encomenda, tenta localizar
        if ($enc_id) {
            // O código deve ser no modelo 'DX99999999'
            if (strlen($enc_id) < 10 || substr($enc_id, 0, 2) != 'DX') {
                Message::set("Código de rastreamento $enc_id não é válido!", 'error');
                return false;
            }

            // Se for válido, localiza a encomenda
            $id = (int) substr($enc_id, 2);
            $encomenda = $this->banco->ver(self::TABELA, '*', "id=$id");

            if (empty($encomenda)) {
                Message::set("Encomenda $enc_id não foi localizada!", 'error');
                return false;
            } else {
                return $encomenda;
            }
        }
    }
    
    public function simulador()
    {
        // Verifica se o ID da encomenda foi informado por POST ou GET
        $enc_id = false;
        if($_POST) {
            $enc_id = $_POST['enc_id'];
        } elseif(isset($_GET['enc_id'])) {
            $enc_id = $_GET['enc_id']; 
        }
        // Se houver um ID da encomenda, tenta localizar
        if ($enc_id) {
            // O código deve ser no modelo 'DX99999999'
            if (strlen($enc_id) < 10 || substr($enc_id, 0, 2) != 'DX') {
                Message::set("Código de rastreamento $enc_id não é válido!", 'error');
                return false;
            }

            // Se for válido, localiza a encomenda
            $id = (int) substr($enc_id, 2);
            $encomenda = $this->banco->ver(self::TABELA, '*', "id=$id");

            if (empty($encomenda)) {
                Message::set("Encomenda $enc_id não foi localizada!", 'error');
                return false;
            } else {
                return $encomenda;
            }
        }
    }
    
    private function calculaPrazo($tipo_encomenda, $data)
    {
        $prazo = new DateInterval('P' . $tipo_encomenda['prazo_maximo'] . 'D');
        
        $data_entrega = new DateTime($data);
        $data_entrega->add($prazo);
        
        return $data_entrega->format('Y-m-d');
    }
    
    private function calculaPreco($tipo_encomenda, $distancia)
    {
        $preco = (int) $distancia * $tipo_encomenda['valor_km'];
        $preco_final = number_format($preco, 2, '.');
        
        return $preco_final;
    }
    public function editar(){
		
	 }
    public static function defineStatus($id)
    {
        $encomenda = Banco::instanciar()->ver(self::TABELA, '*', 'id=' . $id);
        
        if($encomenda['data_entrega']) {
            return "ENTREGUE";
        } elseif($encomenda['data_prevista'] < date('Y-m-d')) {
            return "ENTREGA ATRASADA";
        } elseif($encomenda['transito']) {
            return "EM TRÂNSITO";
        } 
        return "PENDENTE";
    }
}
