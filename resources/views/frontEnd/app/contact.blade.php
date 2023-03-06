@extends('frontEnd.app.layout')

@section('content')

    <!--============= Header Section Ends Here =============-->
    <section class="page-header single-header bg_img oh" data-background="{{ global_asset('assets/app/images/page-header.png') }}">
        <div class="bottom-shape d-none d-md-block">
            <img src="{{ global_asset('assets/app/css/img/page-header.png') }}" alt="css">
        </div>
    </section>
    <!--============= Header Section Ends Here =============-->
    
    <!--============= Contact Section Starts Here =============-->
    <section class="contact-section padding-top padding-bottom">
        <div class="container">
            <div class="section-header mw-100 cl-white">
                <h2 class="title">Fale Conosco</h2>
                <p>Se você está procurando uma demonstração, uma pergunta ou uma consulta comercial, entre em contato.</p>
            </div>
            <div class="row justify-content-center justify-content-lg-between">
                <div class="col-lg-7">
                    <div class="contact-wrapper">
                        <h4 class="title text-center mb-30">Entrar em contato</h4>
                        <form class="contact-form" id="contact_form_submit">
                            <div class="form-group">
                                <label for="igreja">Igreja</label>
                                <input type="text" placeholder="Nome da Igreja " id="igreja">
                            </div>
                            <div class="form-group">
                                <label for="name">Nome</label>
                                <input type="text" placeholder="Nome " id="name" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Telefone</label>
                                <input type="text" placeholder="Telefone " id="phone">
                            </div>
                            <div class="form-group">
                                <label for="email">Email </label>
                                <input type="text" placeholder="Email " id="email" required>
                            </div>
                            <div class="form-group">
                                <label for="membros">Quantidade de Membros </label>
                                <input type="number" placeholder="Quantidade de Membros " id="membros">
                            </div>
                            <div class="form-group">
                                <label for="subject">Assunto</label>
                                <input type="text" placeholder="Assunto " id="subject" required>
                            </div>
                            <div class="form-group mb-0">
                                <label for="message">Mensagem </label>
                                <textarea id="message" placeholder="Mensagem" required></textarea>
                                <!-- <div class="form-check">
                                    <input type="checkbox" id="check" checked><label for="check">I agree to receive emails, newsletters and promotional messages</label>
                                </div> -->
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Enviar Mensagem">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contact-content">
                        <div class="man d-lg-block d-none">
                            <img src="{{ global_asset('assets/app/images/contact/man.png') }}" alt="bg">
                        </div>
                        <div class="section-header left-style">
                            <h3 class="title">Tem dúvidas?</h3>
                            <a href="/app/duvidas">Leia nosso F.A.Q <i class="fas fa-angle-right"></i></a>
                            <p></p>
                            <a href="https://eigrejas.com/app/melhores-motivos">Motivos para usar o e-igrejas agora<i class="fas fa-angle-right"></i></a>
                        </div>
                        <div class="contact-area">
                            <!-- <div class="contact-item">
                                <div class="contact-thumb">
                                    <img src="{{ global_asset('assets/app/images/contact/contact1.png') }}" alt="contact">
                                </div>
                                <div class="contact-contact">
                                    <h5 class="subtitle">Email</h5>
                                    <a href="Mailto:dev.eigrejas@gmail.com">dev.eigrejas@gmail.com</a>
                                </div>
                            </div> -->
                            <div class="contact-item">
                                <div class="contact-thumb">
                                    <img src="{{ global_asset('assets/app/images/cate.png') }}" alt="contact">
                                </div>
                                <div class="contact-contact">
                                    <h5 class="subtitle">Chama a gente</h5>
                                    <a href="https://api.whatsapp.com/send?phone=5534984258410">+55 (34) 98425-8410</a>
                                </div>
                            </div>
                            <!-- <div class="contact-item">
                                <div class="contact-thumb">
                                    <img src="{{ global_asset('assets/app/images/contact/contact3.png') }}" alt="contact">
                                </div>
                                <div class="contact-contact">
                                    <h5 class="subtitle">Visite-nos</h5>
                                    <p>Uberlândia/MG</p>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============= Contact Section Ends Here =============-->
    
@endsection

@push('scripts')

    <script async src="{{ global_asset('assets/app/js/contact.js') }}"></script>

@endpush