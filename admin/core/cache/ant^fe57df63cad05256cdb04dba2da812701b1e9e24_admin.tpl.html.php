<?php
/* Smarty version 5.1.0, created on 2024-04-26 13:42:41
  from 'file:admin.tpl.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCached()->isFresh($_smarty_tpl, array (
  'version' => '5.1.0',
  'unifunc' => 'content_662b8521e0a048_23601883',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fe57df63cad05256cdb04dba2da812701b1e9e24' => 
    array (
      0 => 'admin.tpl.html',
      1 => 1714127943,
      2 => 'file',
    ),
    '875855574b8b5cd6f7d86c6091f58d475252e3e5' => 
    array (
      0 => 'admin__navbar.tpl.html',
      1 => 1714108941,
      2 => 'file',
    ),
    '97a0c496284cf7df9ffdd270900867f3ef9ac703' => 
    array (
      0 => 'admin__menu_offcanvas.tpl.html',
      1 => 1714108941,
      2 => 'file',
    ),
    '59a5b0a92c5a3417b9d176665da0fe3687470cc7' => 
    array (
      0 => 'admin__menu_accordion.tpl.html',
      1 => 1714108941,
      2 => 'file',
    ),
    '9d0ae9fdd37a81cf9441bd05c04a217e3e544701' => 
    array (
      0 => 'trade.tpl.html',
      1 => 1714128157,
      2 => 'file',
    ),
    'a64b7323318dda411ff68331c6cd8ace4c2c8583' => 
    array (
      0 => 'sub/trade_orders.tpl.html',
      1 => 1714108941,
      2 => 'file',
    ),
    '4a827bd18db284a043bd7e1a360c5277a225c881' => 
    array (
      0 => 'admin__footer.tpl.html',
      1 => 1714125195,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 3600,
))) {
function content_662b8521e0a048_23601883 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'W:\\domains\\antCMS\\admin\\tpl';
?><!DOCTYPE html>
<html class="container-xxl h-100 text-bg-secondary bg-opacity-50" lang="ru-RU">

<head>
    <base href= />
    <link rel="icon" sizes=16x16 href="/media/favicon.ico">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="title" content="admin antCMS" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <title>admin :: antCMS :: antCMS v00 alpha</title>
            <link rel="stylesheet" type="text/css" href="/vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/twbs/bootstrap-icons/font/bootstrap-icons.min.css">
</head>

<body class="d-flex flex-column h-100 shadow-lg" style="max-height: 2000px!important; overflow-y: scroll;">
    <header>
        <nav class="navbar navbar-dark navbar-expand-lg  bg-dark bg-gradient bg-opacity-75">
    <div class="container-xxl">
        <a class="navbar-brand" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample"><img alt="nix.by logo" src="/media/logo64.png" height="32" /> antCMS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <span class="navbar-text d-none d-sm-inline-block">login </span>
            <span class="navbar-text badge bg-dark mx-1 mx-lg-3" id="adminName" data-adminname=""></span>
                        <div class="navbar-nav me-auto mb-2 mb-lg-0 d-flex d-lg-none">
                <hr>
                <a class="nav-link active" aria-current="page" href="/admin/admin.php">Admin <i class="bi bi-house-gear"></i></a>
                <a class="nav-link" href="index.php">Shop <i class="bi bi-house"></i></a>
                <a class="nav-link" href="index.php?logout=yes">Log-out <i class="bi bi-door-open"></i></a>
            </div>
        </div>
        <div class="navbar-nav d-none d-lg-flex me-0 mb-2 mb-lg-0">
            <a class="nav-link fs-5 active" aria-current="page" href="/admin/admin.php"><i class="bi bi-house-gear"></i> Admin </a>
            <a class="nav-link fs-5" href="index.php"><i class="bi bi-house"></i> Shop </a>
            <a class="nav-link fs-5" href="index.php?logout=yes"><i class="bi bi-door-open"></i> Log-out </a>
        </div>
    </div>
</nav>    </header>
        <main class="flex-shrink-0" id="MainContainer"  data-tpl="admin.tpl.html">
                <div class="offcanvas offcanvas-start show" tabindex="-1" id="offcanvasExample" data-bs-scroll="true" data-bs-backdrop="false" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Меню antCMS</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div>
            Some text as placeholder. In real life you can have the elements you have chosen. Like, text, images, lists, etc.
        </div>
        
        <div class="accordion accordion-flush" id="antMenuAccordeon">
            <div class="accordion-item mt-2">
        <h2 class="accordion-header" id="heading_catalog">
            <button class="accordion-button fs-4 text-light fw-lighter text-uppercase bg-dark bg-gradient bg-opacity-75" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_catalog" aria-expanded="false" aria-controls="collapse_catalog">
                Каталог товаров <sub class="ps-2 fw-lighter text-dark text-opacity-25">catalog</sub>
            </button>
        </h2>
        <div id="collapse_catalog" class="accordion-collapse collapse" aria-labelledby="heading_catalog" data-bs-parent="#antMenuAccordeon">
            <div class="accordion-body">
                <div class="d-grid gap-1 col-12 mx-auto">
                                                                                                                                            <a class="btn btn-light text-wrap text-start text-xl-center" href="/admin/admin.php?dpt=catalog&sub=products_categories" role="button">Таблица товаров <sub class="ps-2 fw-lighter text-dark text-opacity-25">products_categories</sub></a>
                                                                                                                                            <a class="btn btn-light text-wrap text-start text-xl-center" href="/admin/admin.php?dpt=catalog&sub=tree" role="button">Дерево jsTREE <sub class="ps-2 fw-lighter text-dark text-opacity-25">tree</sub></a>
                                        </div>
            </div>
        </div>
    </div>
            <div class="accordion-item mt-2">
        <h2 class="accordion-header" id="heading_trade">
            <button class="accordion-button fs-4 text-light fw-lighter text-uppercase bg-dark bg-gradient bg-opacity-75" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_trade" aria-expanded="true" aria-controls="collapse_trade">
                Торговля <sub class="ps-2 fw-lighter text-dark text-opacity-25">trade</sub>
            </button>
        </h2>
        <div id="collapse_trade" class="accordion-collapse collapse show" aria-labelledby="heading_trade" data-bs-parent="#antMenuAccordeon">
            <div class="accordion-body">
                <div class="d-grid gap-1 col-12 mx-auto">
                                                                                                                                            <a class="btn btn-danger text-wrap text-start text-xl-center" href="/admin/admin.php?dpt=trade&sub=orders" role="button">Журнал заказов и счетов <sub class="ps-2 fw-lighter text-dark text-opacity-25">orders</sub></a>
                                                                                                                                            <a class="btn btn-light text-wrap text-start text-xl-center" href="/admin/admin.php?dpt=trade&sub=companies" role="button">Реквизиты Организаций <sub class="ps-2 fw-lighter text-dark text-opacity-25">companies</sub></a>
                                                                                                                                            <a class="btn btn-light text-wrap text-start text-xl-center" href="/admin/admin.php?dpt=trade&sub=contracts" role="button">Шаблоны договоров <sub class="ps-2 fw-lighter text-dark text-opacity-25">contracts</sub></a>
                                                                                                                                            <a class="btn btn-light text-wrap text-start text-xl-center" href="/admin/admin.php?dpt=trade&sub=custlist&groupID=0&fActState=-1&search=1" role="button">Покупатели <sub class="ps-2 fw-lighter text-dark text-opacity-25">custlist</sub></a>
                                        </div>
            </div>
        </div>
    </div>
            <div class="accordion-item mt-2">
        <h2 class="accordion-header" id="heading_conf">
            <button class="accordion-button fs-4 text-light fw-lighter text-uppercase bg-dark bg-gradient bg-opacity-75" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_conf" aria-expanded="false" aria-controls="collapse_conf">
                Настройки <sub class="ps-2 fw-lighter text-dark text-opacity-25">conf</sub>
            </button>
        </h2>
        <div id="collapse_conf" class="accordion-collapse collapse" aria-labelledby="heading_conf" data-bs-parent="#antMenuAccordeon">
            <div class="accordion-body">
                <div class="d-grid gap-1 col-12 mx-auto">
                                                                                                                                            <a class="btn btn-light text-wrap text-start text-xl-center" href="/admin/admin.php?dpt=conf&sub=currencies" role="button">Типы валют <sub class="ps-2 fw-lighter text-dark text-opacity-25">currencies</sub></a>
                                                                                                                                            <a class="btn btn-light text-wrap text-start text-xl-center" href="/admin/admin.php?dpt=conf&sub=admin_edit" role="button">Администраторы сайта <sub class="ps-2 fw-lighter text-dark text-opacity-25">admin_edit</sub></a>
                                                                                                                                            <a class="btn btn-light text-wrap text-start text-xl-center" href="/admin/admin.php?dpt=conf&sub=setting" role="button">Основные параметры <sub class="ps-2 fw-lighter text-dark text-opacity-25">setting</sub></a>
                                                                                                                                            <a class="btn btn-light text-wrap text-start text-xl-center" href="/admin/admin.php?dpt=conf&sub=shipping" role="button">Варианты доставки <sub class="ps-2 fw-lighter text-dark text-opacity-25">shipping</sub></a>
                                                                                                                                            <a class="btn btn-light text-wrap text-start text-xl-center" href="/admin/admin.php?dpt=conf&sub=payment" role="button">Варианты оплаты <sub class="ps-2 fw-lighter text-dark text-opacity-25">payment</sub></a>
                                        </div>
            </div>
        </div>
    </div>
    </div>    </div>
</div>        <div class="container-xxl">
            <div class="row">
                <nav class="my-1 d-flex flex-column-inverse flex-md-row-inverse justify-content-start justify-content-md-end" style="--bs-breadcrumb-divider: '::';" aria-label="breadcrumb">
    <ol class="my-0 px-1 breadcrumb text-small lh-1">
        <li class="breadcrumb-item"><a class="text-decoration-none" href="/admin/admin.php"><i class="bi bi-house-gear"></i></a></li>
        <li class="breadcrumb-item"><a href="/admin/admin.php">Торговля</a></li>
        <li class="breadcrumb-item active" aria-current="page">Журнал заказов и счетов</li>
    </ol>
</nav>
<h1 class="h1 fw-lighter text-primary" data-id="PageH1"  data-tpl="trade.tpl.html">
    Журнал заказов и счетов
</h1>
<div class="row">
    <div class="col">
        <hr>
            </div>
</div>
            </div>
        </div>
            </main>
    <footer class="p-0 mt-2 d-block mt-auto text-bg-secondary" id="footer">
        <div class="container-xxl">
            <div class="d-flex flex-wrap justify-content-between align-items-center py-1 px-2 px-xl-0">
        <span class="navbar-text"> 2024-04-26 13:42</span>
    <ul class="nav col-md-6 justify-content-end">
        <li class="nav-item"><a href="/" class="nav-link disabled px-2 text-muted">Home</a></li>
        <li class="nav-item dropdown">
            <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-command"></i></button>
            <ul class="dropdown-menu dropdown-menu-dark">
                <li><a class="dropdown-item" target="_blank" href="etfm.php"><i class="bi bi-house-exclamation-fill"></i> TinyFileManager</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
        </li>
        <li class="nav-item"><a href="#" class="nav-link disabled px-2 text-muted">About</a></li>
    </ul>
</div>        </div>
    </footer>
            <script src="/vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/lib/jquery/jquery-3.6.0.min.js"></script>
</body>

</html><?php }
}
