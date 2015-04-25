<?php

class Perfis
{
	const TABELA = 'perfis';
	
	public static function getNome($id)
	{
		$perfil = Banco::instanciar()->ver(self::TABELA, 'nome', "id=$id");
		
		return $perfil['nome'];
	}
	
	public static function getId($nome)
	{
		$perfil = Banco::instanciar()->ver(self::TABELA, 'id', "nome='$nome'");
	
		return $perfil['id'];
	}
	
}