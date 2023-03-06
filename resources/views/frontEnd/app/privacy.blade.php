@extends('frontEnd.app.layout')

@section('content')

    <!--============= Header Section Ends Here =============-->
    <section class="page-header bg_img oh" data-background="{{ global_asset('assets/app/images/page-header.png') }}">
        <div class="bottom-shape d-none d-md-block">
            <img src="{{ global_asset('assets/app/css/img/page-header.png') }}" alt="css">
        </div>
        <div class="page-left-thumb">
            <img src="{{ global_asset('assets/app/images/bg/privacy-header.png') }}" alt="bg">
        </div>
        <div class="container">
            <div class="page-header-content cl-white">
                <h2 class="title">Nossa Política de Privacidade</h2>
                <ul class="breadcrumb">
                    <li>
                        <a href="/">Home</a>
                    </li>
                    <li>
                        Privacidade
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!--============= Header Section Ends Here =============-->


    
    <!--============= Privacy Section Starts Here =============-->
    <section class="privacy-section padding-top padding-bottom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-header">
                        <h2 class="title">Política de privacidade</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-between">
                <div class="col-lg-4">
                    <aside class="sticky-menu">
                        <div class="faq-menu bg_img" data-background="{{ global_asset('assets/app/images/faq/faq-menu.png') }}">
                            <ul id="faq-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="#captura">Captura de dados automáticos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#dados">Uso dos dados</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#dados-igrejas">Dados para igrejas</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#links">Links Externos</a>
                                </li>
                            </ul>
                        </div>
                    </aside>
                </div>
                <div class="col-lg-8 col-xl-7">
                    <article class="mt-70 mt-lg-0">
                        <div class="privacy-item" id="captura">
                            <h3 class="title">Captura de dados automáticos</h3>
                            <p>São capturados dados demográficos, igrejas acessadas e conteúdo visualizado, tipo e versão do navegador, dispositivo, IP e sistema operacional;
                            <br>as suas visitas e uso do site, bem como a duração e frequência da visita, jornada de navegação e visualização de páginas, entre outros dados semelhantes.</p>
                        </div>
                        <div class="privacy-item" id="dados">
                            <h3 class="title">Uso dos dados</h3>
                            <p>e-igrejas é nosso sistema. Igrejas são as instituições cadastradas e usuários são as pessoas que acessam as informações das igrejas;</p>
                            <p>Ao se cadastrar você concorda em disponibilizar para a igreja os dados informados;</p>
                            <p>O cadastro de usuário é por igreja;</p>
                            <p>Os dados de usuários são disponibilizados às igrejas acessadas pelo mesmo;</p>
                            <p>Os dados podem ser disponibilizados a terceiros por ordem emitida por autoridade judicial ou administrativa (incluindo a ANPD).</p>
                        </div>
                        <div class="privacy-item" id="dados-igrejas">
                            <h3 class="title">Dados para Igrejas</h3>
                            <p>Quando o usuário realizar uma ação na página da igreja, a mesma pode ter acesso a dados de identificação, dados de autenticação, dados de contato, dados cadastrados e ações realizadas.</p>
                            <p>Dados de autenticação são dados usados para entrar no sistema, como e-mail e telefone. Dados de contato são endereço e demais informações disponibilizados no cadastro. Ações realizadas são páginas abertas e formulários preenchidos.</p>
                        </div>
                        <div class="privacy-item" id="links">
                            <h3 class="title">Links Externos</h3>
                            <p>O nosso aplicativo possui links e recursos para sites externos que não são operados por nós.</p>
                            <p>Esteja ciente de que não temos controle sobre o conteúdo e práticas desses sites e não podemos aceitar responsabilidade por suas respectivas políticas de privacidade.</p>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>
    <!--============= Privacy Section Ends Here =============-->

@endsection