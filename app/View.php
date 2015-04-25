<?php
	class View{
		public $twig;
		public $loader;
		
		
		public function __construct(){
			$this->loader = new Twig_Loader_Filesystem('twig');
			$this->twig = new Twig_Environment($this->loader);
		}
		
		public function admin( $classe, $dados = null ){
			
			$arquivo = lcfirst( $classe );
			
			if(isset($_SESSION['funcionarios'])) {
	            $funcionarios = unserialize($_SESSION['funcionarios']);
	            $id = $funcionarios->id;
	            $nome = $funcionarios->nome;
	        } else {
	            $arquivo = 'funcionarios/logar';
	        }
	        
	        include("view/admin/topo.tpl.php");
	        include("view/admin/$arquivo.tpl.php");
	        include("view/admin/rodape.tpl.php");
		}
		
		public function front( $classe, $dados = null ){
			
			$classe = lcfirst( $classe );
			if(isset($_SESSION['clientes'])) {
	            $clientes = unserialize($_SESSION['clientes']);
	            $nome = $clientes->nome_razao;
	        }
	        
	        echo $this->twig->render('twig.yml', array('name' => $nome));
	        
	        include("view/front/topo.tpl.php");
	        include("view/front/$classe.tpl.php");
	        include("view/front/rodape.tpl.php");
			
		}

	}