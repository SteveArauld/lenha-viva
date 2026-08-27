@extends('layouts.app')

@section('title', __('Avisos legales'))

@push('styles')
@endpush

@section('content')
    @include('layouts.partials.navbar.public-show')
    <div id="tbay-main-content">
        <section id="tbay-breadcrumb" class="tbay-breadcrumb  breadcrumbs-text active-nav-right show-title">
            <div class="container">
                <div class="breadscrumb-inner">
                    <ol class="breadcrumb">
                        <li><a href="{{ route('home') }}" class="active">Inicio</a> </li>
                        <li class="active">Página</li>
                    </ol>
                </div>
            </div>
        </section>
        <div class="title-not-breadcrumbs">
            <div class="container">
                <h1 class="page-title">Avisos legales</h1>
            </div>
        </div>
        <section id="main-container" class="container">
            <div class="row ">
                <div id="main-content" class="main-page col-12">
                    <div id="main" class="site-main">

                        <p>Divulgación de acuerdo con la Sección 5 de la Ley de Comercio Electrónico</p>



                        <p>Lenha Viva, Unipessoal Lda<br>Mayorista de Madera<br><strong>Dirección:</strong> Rua Da
                            Graça Nr. 19 Corga 3550-243 PINDO Portugal</p>



                        <p><strong>Correo electrónico:</strong> contactlehnaviva@gmail.com <br>WhatsApp: +34 683 5735 16</p>



                        <p><strong>NIF:</strong> 516429655</p>



                        <p><strong>IVA:</strong> PT516429655</p>



                        <p>La empresa <strong>LENHA VIVA UNIPESSOAL LDA</strong> es una Sociedad Limitada
                            Unipersonal, <strong>constituida</strong> el <strong>miércoles, 28 de
                                abril de 2021</strong>, con domicilio social en el municipio de PENALVA DO CASTELO.<br>Objeto
                            Comercial: Comercio, explotación forestal<br>Rama Profesional: Comercio de madera<br>
                        </p>



                        <p>El contenido de estas páginas ha sido elaborado con el máximo cuidado. No obstante, no
                            asumimos responsabilidad alguna por la exactitud, integridad o actualidad de este contenido.</p>



                        <p>Derechos de Autor</p>



                        <p>El contenido de este sitio (texto e imágenes) se pone a disposición de los internautas
                            exclusivamente para su uso privado. Cualquier uso comercial del contenido requiere la
                            autorización por escrito de Lenha Viva, Unipessoal Lda. El operador de este sitio se
                            reserva el derecho exclusivo de utilización del texto y de las imágenes. Quedan
                            excluidas las imágenes no modificadas y libres de derechos.</p>



                        <p>Propiedad Intelectual:</p>



                        <p>Todo el contenido de este sitio, incluyendo, entre otros, textos, imágenes, gráficos,
                            logotipos, vídeos y todos los demás elementos que contiene, está protegido por las leyes
                            de propiedad intelectual y pertenece exclusivamente a LENHA VIVA, salvo indicación en
                            contrario.</p>



                        <p>Cualquier reproducción, representación, modificación, publicación o adaptación de la
                            totalidad o parte de los elementos del sitio, por cualquier medio o procedimiento, está
                            prohibida sin la autorización previa por escrito de LENHA VIVA. Cualquier uso no
                            autorizado del sitio o de sus elementos constituye una infracción y será perseguido de
                            acuerdo con la legislación aplicable.</p>



                        <p>Hiperenlaces:</p>



                        <p>El sitio puede contener hiperenlaces a sitios de terceros. LENHA VIVA no tiene ningún
                            control sobre estos sitios y declina cualquier responsabilidad por su contenido y
                            políticas de privacidad.</p>



                        <p>Datos de contacto:</p>



                        <p>Dirección postal: LENHA VIVA Niederlassung im Lenha Viva, Unipessoal Lda</p>



                        <p>Correo electrónico: contactlehnaviva@gmail.com </p>



                        <p>WhatsApp: +34 683 5735 16</p>



                        <figure class="wp-block-image size-large is-resized"><a
                                href="../wp-content/uploads/2025/10/er-01-1-scaled.png"><img loading="lazy" decoding="async"
                                    width="770" height="361" src="../wp-content/uploads/2025/10/er-01-1-770x361.png"
                                    alt="" class="wp-image-6024" style="width:273px;height:auto" /></a></figure>
                    </div><!-- .site-main -->

                </div><!-- .content-area -->
            </div>
        </section>

    </div>


    @include('layouts.partials.footer.public')
@endsection

@push('scripts')
@endpush
