@extends('layouts.app')

@section('title', __('Política de entrega'))

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
                <h1 class="page-title">Política de entrega</h1>
            </div>
        </div>
        <section id="main-container" class="container">
            <div class="row ">
                <div id="main-content" class="main-page col-12">
                    <div id="main" class="site-main">

                        <p>En LENHA VIVA, hacemos todo lo posible para garantizar que sus productos de
                            calefacción se entreguen de forma rápida y segura. Entregamos en su domicilio tras el
                            prepago.</p>



                        <ol class="wp-block-list">
                            <li>Zonas de Entrega</li>
                        </ol>



                        <p>Realizamos entregas en:</p>



                        <p>Portugal</p>



                        <p>Europa (zonas disponibles indicadas en el momento del pedido)</p>



                        <ol start="2" class="wp-block-list">
                            <li>Plazos de Entrega</li>
                        </ol>



                        <p><strong>Portugal</strong>: de 3 a 5 días hábiles tras la confirmación del pedido</p>



                        <p><strong>Europa</strong>: de 5 a 10 días hábiles</p>



                        <p>Estos plazos se ofrecen como referencia y pueden variar en función del transportista y
                            de los periodos de mayor volumen.</p>



                        <p>Plazo de Procesamiento: Procesamos los pedidos en un plazo de 24 horas (1 día). Los
                            pedidos realizados antes de las 17:00 se procesarán el mismo día. Los pedidos
                            realizados después de las 17:00 se procesarán al día siguiente.</p>



                        <ol start="3" class="wp-block-list">
                            <li>Costes de Entrega</li>
                        </ol>



                        <p>En https://lenhaviva.com, la entrega de todos los productos adquiridos es gratuita en
                            Portugal y en Europa.</p>



                        <p>También es importante indicar la dirección correcta al realizar la compra en nuestro sitio.</p>



                        <ol start="4" class="wp-block-list">
                            <li>Seguimiento del Pedido</li>
                        </ol>



                        <p>En cuanto se envíe su paquete, recibirá un correo electrónico de confirmación con un
                            número de seguimiento que le permitirá seguir su entrega en tiempo real.</p>



                        <ol start="5" class="wp-block-list">
                            <li>Embalaje</li>
                        </ol>



                        <p>Sus productos de calefacción se embalan cuidadosamente para garantizar su protección
                            durante el transporte y ofrecer una presentación ideal como regalo.</p>



                        <ol start="6" class="wp-block-list">
                            <li>Paquete Dañado o Perdido</li>
                        </ol>



                        <p>Si su paquete llega dañado o no llega a su destino:</p>



                        <p>Contacte con nuestro servicio de atención al cliente a través del correo electrónico
                            contactlehnaviva@gmail.com en un plazo de 48 horas tras la entrega.</p>



                        <p>Facilite fotografías del embalaje y de los productos (si están dañados).</p>



                        <p>Tomaremos las medidas necesarias para reenviar o reembolsar su pedido.</p>



                        <ol start="7" class="wp-block-list">
                            <li>Devoluciones y Cambios</li>
                        </ol>



                        <p>Para cualquier devolución o cambio, consulte nuestra Política de Devoluciones, disponible
                            en la página dedicada de nuestro sitio web.</p>



                        <figure class="wp-block-image size-large is-resized"><a
                                href="../wp-content/uploads/2025/10/er-01-1-scaled.png"><img loading="lazy" decoding="async"
                                    width="770" height="361" src="../wp-content/uploads/2025/10/er-01-1-770x361.png"
                                    alt="" class="wp-image-6024" style="width:342px;height:auto" /></a></figure>
                    </div><!-- .site-main -->

                </div><!-- .content-area -->
            </div>
        </section>

    </div>

    @include('layouts.partials.footer.public')
@endsection

@push('scripts')
@endpush
