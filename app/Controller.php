<?php
	class Controller{
		private $classe;
		private $view;
		private $dados;
		private $model;
		public function __construct( $tipo ){
			try{
				if( $tipo != 'front' && $tipo != 'admin' ){
					throw new Exception (" Tipo informado é inválido!! ");
				}
				//index.php?module=funcionarios&action=cadastrar
				$this->view = new View();
				$action = 'index';
				
				if( isset( $_GET['module'] ) ){
					$this->model = ucfirst( $_GET['module'] );
					$this->classe = new $this->model();
				}
			
				if( isset( $_GET['action'] ) ){
					$action = $_GET['action'];
					if( isset( $_GET['id'] ) ){
						$this->dados = $this->classe->$action( $_GET['id'] );
					}else{
						$this->dados = $this->classe->$action();
					}
				}
					
				if( ( $tipo == 'admin' ) && ( !$this->model ) ){
					$this->model = 'Encomendas';
					$this->classe = new $this->model();
					$action = 'listar';
					
				}else{
					$this->view->$tipo( "{$this->model}/$action", $this->dados );
               					
					exit();
				}				
				
			
				$this->dados = $this->classe->$action();
				$this->view->$tipo( "{$this->model}/$action", $this->dados );
				
			}catch( EXCEPTION $erro ){
				echo "<h1> Um erro muito sério ocorreu {$erro->getMessage()} ";
			}
		}
	}
