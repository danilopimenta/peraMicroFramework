<?php
//carregar vendor twig
require_once 'vendor/autoload.php';


//os arquivos .yml
$loader = new Twig_Loader_Filesystem('twig');
$twig = new Twig_Environment($loader);
echo $twig->render('twig.yml', array('name' => 'Fabi'));
