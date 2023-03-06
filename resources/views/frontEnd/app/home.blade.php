@extends('frontEnd.app.layout')

@section('content')

    <!--============= Banner Section Starts Here =============-->
    <section class="banner-20 pos-rel oh bg_img" data-background="{{ global_asset('assets/app/images/extra-2/banner/banner-bg-20.jpg') }}">
        <div class="container">
            <div class="row flex-wrap-reverse align-items-center justify-content-lg-between">
                <div class="col-lg-5">
                    <div class="banner-thumb-20 rtl">
                        <img src="{{ global_asset('assets/app/images/extra-2/banner/banner-20.png') }}" alt="extra-2/banner">
                        <a href="https://youtu.be/N4r_rNE0kt0" class="video-button popup">
                            <i class="flaticon-play"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 p-lg-0">
                    <div class="banner-content-20">
                        <h1 class="title">A Inovação
                            Chegou na sua
                            Igreja</h1>
                        <p>
                            Site, aplicativo e muita tecnologia
                        </p>
                        <a href="https://api.whatsapp.com/send?phone=5534984258410&text=Gostaria%20de%20marcar%20uma%20apresenta%C3%A7%C3%A3o%20do%20e-igrejas"
                        class="button-4">Marcar uma apresentação</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============= Banner Section Ends Here =============-->


    <!--============= Feature Section Starts Here =============-->
    <section class="feature-section ovelflow-hidden padding-bottom padding-top">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-9">
                    <div class="section-header mw-100">
                        <h5 class="cate">Alcance</h5>
                        <h2 class="title">Viemos para impulsionar a comunicação e gestão de sua Igreja, não importa o tamanho</h2>
                        <p class="mx-auto mw-540px">
                            Aumente o alcance da sua Igreja online com um site personalizado e presença no aplicativo e-igrejas, tudo integrado.
                        </p>
                        <p class="mx-auto mw-540px">
                            Sistema para Igrejas com Gestão de Células, Eventos, Membros, Financeiro e muito mais. Deixe sua igreja organizada;
                        </p>
                    </div>

                </div>
            </div>
            <div class="feature-wrapper-20">
                <div class="feature-wrapper-bg-20 bg_img" data-background="{{ global_asset('assets/app/images/extra-2/feature/feature-bg.png') }}">
                    <div class="row align-items-center">
                        <div class="col-lg-6 d-none d-lg-block">
                            <div class="feature-thumb-20 rtl">
                                <img src="{{ global_asset('assets/app/images/extra-2/feature/phone.png') }}" alt="app e-igrejas">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="feature-content-20 cl-white">
                                <div class="feature-content-slider-20 owl-theme owl-carousel">
                                    <div class="feature-content-item-20">
                                        <div class="feature-content-icon-20">
                                            <img src="{{ global_asset('assets/app/images/extra-2/feature/01.png') }}" alt="extra-2/feature">
                                        </div>
                                        <h3 class="title">
                                            Comunique-se com o mundo
                                        </h3>
                                        <p>
                                            Os convidados e membros podem acessar pelo seu link personalizado e pelo aplicativo e-igrejas.
                                            Eventos, Notícias, Estudos, Células, Vídeos, Relatórios...
                                        </p>
                                    </div>
                                    <div class="feature-content-item-20">
                                        <div class="feature-content-icon-20">
                                            <img src="{{ global_asset('assets/app/images/extra-2/feature/01.png') }}" alt="extra-2/feature">
                                        </div>
                                        <h3 class="title">
                                            Melhore a comunicação com a membresia
                                        </h3>
                                        <p>
                                            Através do seu novo site é possível acompanhar a agenda, fazer inscrições, endereços, contribuições e entrar em contato.
                                        </p>
                                    </div>
                                    <div class="feature-content-item-20">
                                        <div class="feature-content-icon-20">
                                            <img src="{{ global_asset('assets/app/images/extra-2/feature/01.png') }}" alt="extra-2/feature">
                                        </div>
                                        <h3 class="title">
                                            Recursos centralizados
                                        </h3>
                                        <p>
                                            Ao invés de usar várias ferramentas, use uma completa e que vai integrar todas suas redes sociais.
                                        </p>
                                    </div>
                                </div>
                                <div class="feat-nav mt-4">
                                    <a href="#0" class="feat-prev"><i class="flaticon-left"></i></a>
                                    <a href="#0" class="feat-next active"><i class="flaticon-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============= Feature Section Ends Here =============-->


    <!--============= How Section Starts Here =============-->
    <section class="how-section-20 ovelflow-hidden">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-lg-4 col-xl-3">
                    <div class="move-top--lg-70">
                        <div class="section-header left-style mb-olpo">
                            <h5 class="cate">Inove</h5>
                            <h2 class="title">Cadastre
                                Agora
                                Mesmo</h2>
                            <p>Teste gratuitamente</p>
                        </div>
                        <div class="how-item-wrapper-20">
                            <div class="how-item-20">
                                <h6 class="title">Crie sua conta</h6>
                                <div class="how-thumb">
                                    <img src="{{ global_asset('assets/app/images/extra-2/how/1.png') }}" alt="how">
                                </div>
                            </div>
                            <div class="how-item-20">
                                <h6 class="title">Insira os dados da Igreja</h6>
                                <div class="how-thumb">
                                    <img src="{{ global_asset('assets/app/images/extra-2/how/2.png') }}" alt="how">
                                </div>
                            </div>
                            <div class="how-item-20">
                                <h6 class="title">Divulgue</h6>
                                <div class="how-thumb">
                                    <img src="{{ global_asset('assets/app/images/extra-2/how/3.png') }}" alt="how">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-xl-9">
                    <div class="how-slider-wrapper mt-4 mt-lg-0 ml--lg-78 mr--lg-65">
                        <div class="how-slider-20 owl-theme owl-carousel">
                            <div class="thumbs">
                                <img src="{{ global_asset('assets/app/images/extra-2/feature/phone2.png') }}" alt="extra-2/feature">
                            </div>
                            <div class="thumbs">
                                <img src="{{ global_asset('assets/app/images/extra-2/feature/phone3.png') }}" alt="extra-2/feature">
                            </div>
                        </div>
                        <div class="dots-2"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============= How Section Ends Here =============-->
    

    <!--============= Pricing Section Starts Here =============-->
    <section class="apps-screenshot-section-20 padding-top padding-bottom pb-max-lg-0 overflow-hidden position-relative">
        <div class="app-screenshot-20 d-none d-lg-flex">
            <img src="{{ global_asset('assets/app/images/extra-2/screenshot/background.png') }}" alt="extra-2/screenshot">
        </div>
        <div class="container">
            <div class="row justify-content-lg-between justify-content-center align-items-center flex-wrap-reverse">
                <div class="col-md-8 col-lg-7 col-xl-8">
                    <div class="app-screenshot-slider-20 owl-theme owl-carousel">
                        <div class="thumbs">
                            <img src="{{ global_asset('assets/app/images/extra-2/screenshot/group2.png') }}" alt="extra-2/screenshot">
                        </div>
                        <div class="thumbs">
                            <img src="{{ global_asset('assets/app/images/extra-2/screenshot/group1.png') }}" alt="extra-2/screenshot">
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-xl-4">
                    <div class="mb-3 mb-lg-0">
                        <div class="section-header left-style mb-olpo">
                            <h5 class="cate">Igreja organizada</h5>
                            <h2 class="title">Nunca foi tão fácil</h2>
                            <p> divulgar seus eventos,
                                notícias, estudos... e ter a administração organizada
                            </p>
                            <p>
                                Economize e simplifique ao usar apenas um serviço completo como o e-igrejas
                            </p>
                            <div class="feat-nav mt-0">
                                <a href="#0" class="feat-prev"><i class="flaticon-left"></i></a>
                                <a href="#0" class="feat-next active"><i class="flaticon-right"></i></a>
                            </div>
                        </div>
                        <h6 class="title mb-4">Baixe Agora</h6>
                        <ul class="download-options justify-content-start download-option-20">
                            <li>
                                <a href="{{\Config::get('front.play_store')}}" class="active"><i class="fab fa-android"></i></a>
                                <span>Android</span>
                            </li>
                            <li>
                                <a href="{{\Config::get('front.apple_store')}}"><i class="fab fa-apple"></i></a>
                                <span>iOS</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============= Pricing Section Starts Here =============-->


    <!--============= Pricing Section Starts Here =============-->
    <section class="pricing-section-20 body--bg position-relative padding-bottom padding-top">
        <div class="container">
            <div class="section-header">
                <h5 class="cate">Uma lista grande de recursos incríveis</h5>
                <h2 class="title">Simples e acessível</h2>
                <p>
                    Comece agora com 15 grátis sem cadastro de cobrança.
                </p>
            </div>
            <div class="tab">
                <div class="tab-area">
                    <div class="tab-item active">
                        <div class="row mb-30-none justify-content-center">
                            <div class="col-lg-4 col-md-6 col-sm-10">
                                <div class="pricing-item-20">
                                    <div class="pricing-header">
                                        <span class="name">PLUS</span>
                                        <!-- <h2 class="price"><sup>R$</sup>400</h2> -->
                                        <h2 class="price"><sup>R$</sup>Entre em contato</h2>
                                        <!-- <span class="info">Mensal</span> -->
                                    </div>
                                    <div class="pricing-body">
                                        <ul>
                                            <li>
                                                Site personalizado e administrado pela própria igreja
                                            </li>
                                            <li>
                                                Acesso pelo celular e pelo computador
                                            </li>
                                            <li>
                                                Painel para organizar sua administração
                                            </li>
                                            <li>
                                                Suporte via ticket dentro do sistema
                                            </li>
                                            <li>
                                                Treinamento do sistema em videoaula
                                            </li>
                                            <li>
                                                Atualizações com novas funções
                                            </li>
                                            <li>
                                                Sem taxa de instalação
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="pricing-footer text-center">
                                        <a href="https://admin.eigrejas.com/set/new" class="button-4">Cadastre sua Igreja</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    <!--============= Pricing Section Ends Here =============-->


    <!--============= Apps Download Section Starts Here =============-->
    <section class="apps-download-section overflow-hidden padding-top padding-bottom body--bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-9">
                    <div class="section-header mw-100">
                        <h5 class="cate">Conheça</h5>
                        <h2 class="title">Pronto para levar sua comunicação para o próximo nível?</h2>
                        <p class="mx-auto mw-540px">
                            Baixe agora o aplicativo para iOS ou Android - é grátis para membros.
                        </p>
                        <p>
                            Pesquise pela nossa igreja demostrativa <strong>Aliança</strong> no app e veja também
                            a versão site em <a href="https://alianca.eigrejas.com">alianca.eigrejas.com</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="apps-download-buttons-20">
                <h6 class="title cl-white text-center mb-4">Baixe agora!</h6>
                <ul class="download-options">
                    <li>
                        <a href="{{\Config::get('front.play_store')}}" class="active"><i class="fab fa-android"></i></a>
                    </li>
                    <li>
                        <a href="{{\Config::get('front.apple_store')}}"><i class="fab fa-apple"></i></a>
                    </li>
                </ul>
            </div>
            <div class="apps-download-screen-20">
                <div class="apps-download-bg">
                    <img src="{{ global_asset('assets/app/images/extra-2/screenshot/mocup.png') }}" alt="extra-2/screenshot">
                </div>
                <div class="apps-download-thumb">
                    <img src="{{ global_asset('assets/app/images/extra-2/screenshot/mocup-screen.png') }}" alt="extra-2/screenshot">
                </div>
            </div>
        </div>
    </section>
    <!--============= Apps Download Section Ends Here =============-->

@endsection