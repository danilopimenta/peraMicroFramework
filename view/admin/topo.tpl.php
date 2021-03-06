<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PeraLOG&TRADE;: Admin</title>
        <link href="inc/bootstrap/css/bootstrap.css" type="text/css" rel="stylesheet" />
        <link href="inc/bootstrap/css/bootstrap-responsive.css" type="text/css" rel="stylesheet" />
    </head>
    <body>
        <?php if (isset($_SESSION['funcionarios'])): ?>
            <div class="navbar">
                <div class="navbar-inner">
                    <div class="container">
                        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </a>
                        <div class="admbrand">DexterLOG&TRADE;</div>
                        <div class="nav-collapse collapse">
                            <ul class="nav">
                                <li><a href="admin.php"><i class="icon-home"></i> Início</a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-list-alt"></i> Cadastros<b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="admin.php?module=clientes&action=listar"><i class="icon-list-alt"></i> Clientes</a></li>
                                        <li><a href="admin.php?module=funcionarios&action=listar"><i class="icon-list-alt"></i> Funcionários</a></li>
                                        <li class="divider"><a href="#">&nbsp;</a></li>
                                        <li><a href="admin.php?module=TiposEncomenda&action=listar"><i class="icon-list-alt"></i> Tipos de encomenda</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-star"></i> Operações<b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="admin.php?module=encomendas&action=vender"><i class="icon-shopping-cart"></i> Vender Serviço</a></li>
                                        <li class="divider"><a href="#">&nbsp;</a></li>
                                        <li><a href="admin.php?module=encomendas&action=pendentes"><i class="icon-list-alt"></i> Serviços Pendentes</a></li>
                                        <li><a href="admin.php?module=encomendas&action=finalizados"><i class="icon-list-alt"></i> Serviços Finalizados</a></li>
                                        <li class="divider"><a href="#">&nbsp;</a></li>
                                        <li><a href="admin.php?module=encomendas&action=rastrear"><i class="icon-search"></i> Rastreio</a></li>
                                        <li><a href="admin.php?module=encomendas&action=calcular"><i class="icon-asterisk"></i> Calcular preço e prazo</a></li>
                                        
                                        
                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav pull-right">
                               <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user"></i> <?php echo $nome; ?><b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="admin.php?module=funcionarios&action=dados"><i class="icon-user"></i> Meus Dados</a></li>
                                        <li><a href="admin.php?module=funcionarios&action=senha"><i class="icon-lock"></i> Alterar Senha</a></li>
                                    </ul>
                                </li>
                                <!--<li><a href="admin.php?module=home&action=vender"><i class="icon-info-sign"></i> Sobre</a></li>-->
                                <li><a href="admin.php?module=funcionarios&action=deslogar"><i class="icon-off"></i> Sair</a></li>
                            </ul>
                        </div>          
                    </div>
                </div>
            </div>
            <div class="container">
        <?php else: ?>
            <div class="container">
                <div class="row">
                    <div class="span6 offset3">
                        <div class="hero-unit">
                           <h1>PeraLOG&TRADE;</h1>
                           <h3>Acesso ao Sistema</h3>
                        </div>
                    </div>
                </div>
        <?php endif; ?>
        <div class="row">
            <?php if(Message::exists()) echo Message::out(); ?>
        </div>
            
