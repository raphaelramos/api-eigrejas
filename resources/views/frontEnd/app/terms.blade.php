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
                <h2 class="title">Termos de Uso</h2>
                <ul class="breadcrumb">
                    <li>
                        <a href="/">Home</a>
                    </li>
                    <li>
                        Termos de Uso
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
                        <h2 class="title">Termos de uso e-igrejas</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-between">
                <div class="col-lg-4">
                    <aside class="sticky-menu">
                        <div class="faq-menu bg_img" data-background="{{ global_asset('assets/app/images/faq/faq-menu.png') }}">
                            <ul id="faq-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="#termos">Termos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#licenca">Uso de licença</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#responsabilidades">Responsabilidades</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#planos">Assinatura e Cancelamento</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#modificacoes">Modificações</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#legislacao">Legislação Aplicável</a>
                                </li>
                            </ul>
                        </div>
                    </aside>
                </div>
                <div class="col-lg-8 col-xl-7">
                    <article class="mt-70 mt-lg-0">
                        <div class="privacy-item" id="termos">
                            <h3 class="title">Termos</h3>
                            <p>Ao acessar o site egrejas.com e o app e-igrejas, você concorda com os termos de uso, obrigando-se ao seu cumprimento, 
                                bem como das leis e regulamentos aplicáveis. É imprescindível a concordância para acesso e utilização dos serviços fornecidos. 
                                Caso não concorde com algum de seus termos, é vedado o uso e o acesso ao site e ao aplicativo. Os materiais contidos neste site são protegidos 
                                pelas leis de direitos autorais e marcas comerciais aplicáveis.</p>
                        </div>
                        <div class="privacy-item" id="licenca">
                            <h3 class="title">Uso dos dados</h3>
                            <p>1.	É concedida permissão de uso do software e-igrejas no formato SaaS (Software as a Service). Nesse caso, o contratante utiliza um software que é único para toda uma base de clientes. </p>
                            <p>2.	Esta é a concessão de uma licença, não uma transferência de título e, sob esta licença, não é permitido:
                                <br>2.1. Falar em nome do e-igrejas; 
                                <br>2.2. Fazer publicações de conteúdo ofensivo, violar propriedade intelectual ou violar qualquer outro direito.
                                <br>2.3. Tentar descompilar ou fazer engenharia reversa de qualquer software contido no e-igrejas; 
                                <br>2.4. Remover quaisquer direitos autorais ou outras notações de propriedade dos materiais; ou 
                                <br>2.5. Transferir os materiais para outra pessoa ou espelhar os materiais em qualquer outro servidor.
                            </p>
                            <p>3.	A licença será automaticamente rescindida caso haja a violação de alguma das restrições aqui descritas;</p>
                            <p>4.	O e-igrejas reserva-se no direito de rescindir a presente licença a qualquer momento, independentemente de justificativa e prévio aviso;</p>
                            <p>5.	Ao término de sua licença, o conteúdo do usuário ficará oculto na plataforma até a renovação ou adequação dos termos, e poderá ser excluído definitivamente após 2 meses de inatividade.</p>
                        </div>
                        <div class="privacy-item" id="responsabilidades">
                            <h3 class="title">Responsabilidades</h3>
                            <p>1.	A plataforma visa licenciar o uso de seu software, e é responsabilidade do usuário dispor de um dispositivo compatível e conectado à Internet para o uso.</p>
                            <p>2.	Além disso, o e-igrejas não garante ou faz qualquer representação relativa à precisão, aos resultados prováveis ou à confiabilidade do uso dos materiais em seu site ou de outra forma relacionado a esses materiais ou em sites vinculados a este site.</p>
                            <p>3.	O e-igrejas não se responsabiliza pelo conteúdo postado por seus usuários, tampouco por links externos contidos em seu site;</p>
                            <p>4.	O usuário é totalmente responsável por todo o conteúdo por ele postado através do e-igrejas, sendo seu dever respeitar à legislação aplicável em suas publicações.</p>
                            <p>5.	É também de responsabilidade do usuário:
                                <br>5.1	A correta utilização da plataforma e dos serviços oferecidos;
                                <br>5.2	Cumprir as regras dispostas nestes Termos de Uso, e legislação pertinente;
                                <br>5.3	Não informar seus dados de acesso (usuário e senha) a terceiros, responsabilizando-se integralmente pelo uso feito deles.
                            </p>
                            <p>6.	Possuímos programa de segurança de dados, que contempla medidas adequadas do ponto de vista técnico, e que tem por objetivo proteger os Dados Pessoais contra Incidentes. Porém, em nenhum caso o e-igrejas ou seus fornecedores serão responsáveis por quaisquer 
                                incidentes que possam ocorrer (incluindo, mas sem limitação, acesso não autorizado e situação acidental ou ilícita de destruição, perda de dados ou lucro, alteração, comunicação ou qualquer forma de Tratamento inadequado ou ilícito; ou devido à interrupção dos negócios), mesmo que o e-igrejas ou um representante autorizado do e-igrejas tenha sido notificado oralmente ou por escrito da possibilidade de tais danos.</p>
                            <p>7.   O e-igrejas não realiza transações financeiras e fornece serviços de terceiros para isso. Portando não temos responsabilidade sobre valores transferidos pelos serviços de terceiros disponibilizados.</p>
                        </div>
                        <div class="privacy-item" id="planos">
                            <h3 class="title">Assinatura e Cancelamento</h3>
                            <p>1.	Nós do e-igrejas fornecemos a assinatura de planos de serviço onerosa, como definido abaixo.</p>
                            <p>2.	A subscrição ao(s) plano(s) pago(s) requer o pagamento antecipado. Dessa forma, você estará pagando hoje pelo acesso durante o próximo mês corrente.</p>
                            <p>3.	O cancelamento pode ser realizado a qualquer momento pelo usuário e será entendido como manifestação expressa de que não pretende renovar a licença no próximo 
                                período ainda não contabilizado para fins de cobrança. O cancelamento não enseja qualquer dever ao e-igrejas de realizar a devolução do pagamento do mês no qual o usuário optou por não renovar a relação contratual.<p>
                            <p>4.	O atendimento para suporte é realizado dentro da própria plataforma por meio de tickets.</p>
                            <p>5.   O e-igrejas não oferece atendimento para todos os membros da igreja, apenas para um predefinido.</p>
                        </div>
                        <div class="privacy-item" id="modificacoes">
                            <h3 class="title">Modificações</h3>
                            <p>O e-igrejas pode revisar estes termos de serviço a qualquer momento, sem aviso prévio. Ao usar este site ou aplicativo, você concorda em ficar vinculado à versão atual desses termos de serviço.</p>
                        </div>
                        <div class="privacy-item" id="legislacao">
                            <h3 class="title">Legislação Aplicável</h3>
                            <p>Estes termos e condições são regidos e interpretados de acordo com a legislação brasileira. Eventuais litígios decorrentes da utilização dos serviços regulados por este Termo devem ser solucionados no foro da Comarca em que se situa a sede da R2Company.</p>
                            <p>e-igrejas é um produto da <a href="https://r2company.com.br">R2Company</p>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>
    <!--============= Privacy Section Ends Here =============-->

@endsection