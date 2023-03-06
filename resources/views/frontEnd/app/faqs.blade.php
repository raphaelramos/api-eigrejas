@extends('frontEnd.app.layout')

@section('content')

    <!--============= Header Section Ends Here =============-->
    <section class="page-header bg_img" data-background="{{ global_asset('assets/app/images/page-header.png') }}">
        <div class="bottom-shape d-none d-md-block">
            <img src="{{ global_asset('assets/app/css/img/page-header.png') }}" alt="css">
        </div>
        <div class="container">
            <div class="page-header-content cl-white">
                <h2 class="title">Perguntas e Respostas</h2>
                <ul class="breadcrumb">
                    <li>
                        <a href="/">Home</a>
                    </li>
                    <li>
                        Dúvidas
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!--============= Header Section Ends Here =============-->


    
    <!--============= Faqs Section Starts Here =============-->
    <section class="faq-section padding-top padding-bottom">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-4">
                    <aside class="sticky-menu">
                        <div class="faq-menu bg_img mb-30" data-background="{{ global_asset('assets/app/images/faq/faq-menu.png') }}">
                            <ul id="faq-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="#get">Começando</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#how">Já utilizo</a>
                                </li>
                            </ul>
                        </div>
                        <!-- <div class="faq-video">
                            <a href="https://www.youtube.com/watch?v=ObZwFExwzOo" class="video-area popup">
                                <img src="{{ global_asset('assets/app/images/faq/video.png') }}" alt="faq">
                                <div class="video-button-2">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <i class="flaticon-play"></i>
                                </div>
                            </a>
                            <h5 class="title">Veja o vídeo de introdução</h5>
                        </div> -->
                    </aside>
                </div>
                <div class="col-lg-8 col-xl-7">
                    <article class="mt-70 mt-lg-0">
                        <div class="faq--wrapper" id="get">
                            <h3 class="main-title">Começando</h3>
                            <div class="faq--area">
                                <div class="faq--item">
                                    <div class="faq-title">
                                        <h6 class="title">Quem pode cadastrar uma igreja?</h6>
                                        <span class="icon"></span>
                                    </div>
                                    <div class="faq-content">
                                        <p>Qualquer pessoa desde que ela seja a responsável oficial pela comunicação da igreja. O sistema pode solicitar verificações.</p>
                                    </div>
                                </div>
                                <div class="faq--item">
                                    <div class="faq-title">
                                        <h6 class="title">Qual os recursos?</h6>
                                        <span class="icon"></span>
                                    </div>
                                    <div class="faq-content">
                                        <p>Site personalizado, aplicativo e-igrejas e várias ferramentas de comunicação e gestão, como
                                            cadastro de membros, eventos, relatórios de células, financeiros, banco de dados isolado, etc.
                                        </p>
                                        <p>Confira <a href="https://eigrejas.com/app/melhores-motivos">10 motivos para começar a usar agora</a></p>
                                    </div>
                                </div>
                                <div class="faq--item">
                                    <div class="faq-title">
                                        <h6 class="title">Planos</h6>
                                        <span class="icon"></span>
                                    </div>
                                    <div class="faq-content">
                                        <p>Não é necessária uma forma de pagamento para cadastrar uma igreja.</p>
                                        <p>Após o cadastro você receberá alguns dias gratuitos. Depois é necessário assinar um plano.</p>
                                        <p>Entre em <a href="/app/contato">contato</a> para receber uma proposta de valor.</p>
                                    </div>
                                </div>
                                <div class="faq--item">
                                    <div class="faq-title">
                                        <h6 class="title">Formas de pagamento</h6>
                                        <span class="icon"></span>
                                    </div>
                                    <div class="faq-content">
                                        <p>Recorrente por cartão ou boleto, mensal ou trimestral.</p>
                                        <p>É possível cancelar, a qualquer momento, novas cobranças, seguindo as regras do termo de adesão.</p>
                                        <p>Ao assinar um plano são necessários o CNPJ da igreja e os dados pessoais de um representante (nome, CPF) para assinatura do contrato e termo de adesão.</p>
                                    </div>
                                </div>
                                <div class="faq--item">
                                    <div class="faq-title">
                                        <h6 class="title">Podemos mudar o nome Células?</h6>
                                        <span class="icon"></span>
                                    </div>
                                    <div class="faq-content">
                                        <p>O nome padrão, ao se cadastrar, é célula. Entretanto, ele pode ser mudado para "Pequenos Grupos", "PGs" ou para qualquer outro.</p>
                                    </div>
                                </div>
                                <div class="faq--item">
                                    <div class="faq-title">
                                        <h6 class="title">Termos de uso</h6>
                                        <span class="icon"></span>
                                    </div>
                                    <div class="faq-content">
                                        <p>Ao usar a plataforma você concorda com nossos termos de uso.</p>
                                        <p><a href="/app/termos">Acessar os termos</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="faq--wrapper" id="how">
                            <h3 class="main-title">Já utilizo</h3>
                            <div class="faq--area">
                                <div class="faq--item">
                                    <div class="faq-title">
                                        <h6 class="title">Como usar?</h6>
                                        <span class="icon"></span>
                                    </div>
                                    <div class="faq-content">
                                        <p>No e-igrejas você mesmo insere e atualiza todo o conteúdo.</p>
                                        <p>Oferecemos um treinamento rápido e fácil no qual em pouco tempo irá te certificar para usar a plataforma.</p>
                                        <p>Acesse admin.eigrejas.com ou faça login no app e acesse o painel.</p>
                                        <p>No menu <strong>Meu App</strong>, entre em Como Usar.</p>
                                    </div>
                                </div>
                                <div class="faq--item">
                                    <div class="faq-title">
                                        <h6 class="title">Suporte</h6>
                                        <span class="icon"></span>
                                    </div>
                                    <div class="faq-content">
                                        <p>Precisa de ajuda e não encontrou no treinamento? Nosso time de especialistas em tecnologias para igrejas está disponível através do <strong>Suporte</strong>, no menu meu app.</p>
                                        <p>Suporte exclusivo a uma pessoa por igreja.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>
    <!--============= Faqs Section Ends Here =============-->

@endsection
