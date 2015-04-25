<?php

class Message 
{
    public static function exists() 
    {
        if (isset($_SESSION['mensagem']))
            return true;
        else
            return false;
    }

    public static function set($mensagem, $tipo) 
    {
        $_SESSION['mensagem']['tipo']  = $tipo;
        $_SESSION['mensagem']['valor'] = $mensagem;
    }

    public static function out() 
    {
        $tipo  = $_SESSION['mensagem']['tipo'];
        $valor = $_SESSION['mensagem']['valor'];
        
        unset($_SESSION['mensagem']);

        return "<div class=\"alert alert-$tipo\">$valor</div>";
    }

}