@extends('frontEnd.app.layout')

@section('content')

    <!--============= Coming Section Starts Here =============-->
    <div class="coming-soon bg_img" data-background="{{ global_asset('assets/app/images/coming-soon.jpg') }}">
        <div class="container">
            <div class="coming-wrapper">
                <div class="row justify-content-center">
                    <div class="col-xl-9">
                        <div class="section-header mw-100">
                            <span class="mx-auto mw-540px">
                                Aumente o alcance da Igreja com um site personalizado e aplicativo para membros e-igrejas. Tenha ainda ferramentas de gestão e organize tudo.
                                <div class="contact-content">
                                    <div class="section-header">
                                        <a href="https://eigrejas.com/app/melhores-motivos">Motivos para usar o e-igrejas agora<i class="fas fa-angle-right"></i></a>
                                    </div>
                                </div>
                            </span>
                        </div>
                    </div>
                </div>
    
                <h1 class="title">TESTE GRÁTIS</h1>
                <p>por 30 dias com o formulário abaixo ou <a href="https://eigrejas.com/app/contato">fale com um de nossos especialistas</a></p>
                <script charset="utf-8" type="text/javascript" src="https://js.hsforms.net/forms/shell.js"></script>
                <script>
                hbspt.forms.create({
                    region: "na1",
                    portalId: "20283751",
                    formId: "07f57632-d207-45f2-9902-aefce08d7942"
                });
                </script>

                <h1 class="title">LANÇAREMOS EM BREVE</h1>
                <p>Em alguns dias entraremos em contato para você concluir seu cadastro</p>
                <!-- <ul class="countdown">
                    <li>
                        <h3 class="c-title"><span class="days">00</span></h3>
                        <p class="days_text">dias</p>
                    </li>
                    <li>
                        <h3 class="c-title"><span class="hours">00</span></h3>
                        <p class="hours_text">horas</p>
                    </li>
                    <li>
                        <h3 class="c-title"><span class="minutes">00</span></h3>
                        <p class="minu_text">minutos</p>
                    </li>
                    <li>
                        <h3 class="c-title"><span class="seconds">00</span></h3>
                        <p class="seco_text">segundos</p>
                    </li>
                </ul> -->
                <!-- <form class="notify-form">
                    <input type="text" placeholder="Seu email">
                    <button type="submit">Notificar-me</button>
                </form> -->
            </div>
        </div>
    </div>
    <!--============= Coming Section Ends Here =============-->

@endsection

@push('scripts')

    <!-- <script src="{{ global_asset('assets/app/js/countdown.js') }}"></script>
    <script>
        $(document).ready(function () {
            //Count Down Java Script
            $('.countdown').countdown({
                date: '08/03/2021 00:00:00',
                offset: +2,
                day: 'Dia',
                days: 'Dias',
                hours: 'Horas'
            });
        })
    </script> -->

@endpush