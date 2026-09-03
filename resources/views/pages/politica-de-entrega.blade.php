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

                        <p>En Casacuberta Trias S.L., hacemos todo lo posible para garantizar que sus productos de
                            calefacción se entreguen de forma rápida y segura. Entregamos en su domicilio tras el
                            prepago.</p>



                        <ol class="wp-block-list">
                            <li>Zonas de Entrega</li>
                        </ol>



                        <p>Realizamos entregas en:</p>



                        <p>España (Península e Islas Baleares)</p>



                        <p>Resto de Europa (zonas disponibles indicadas en el momento del pedido)</p>



                        <ol start="2" class="wp-block-list">
                            <li>Plazos de Entrega</li>
                        </ol>



                        <p><strong>España (Península e Islas Baleares)</strong></p>

                        <p>Plazo de preparación: de 0 a 1 día hábil</p>

                        <p>Plazo de transporte: de 2 a 3 días hábiles</p>

                        <p><strong>Plazo total estimado: de 2 a 4 días hábiles</strong> tras la confirmación del pago.</p>



                        <p><strong>Resto de Europa</strong>: de 5 a 10 días hábiles</p>



                        <p>Estos plazos se ofrecen como referencia y pueden variar en función del transportista y
                            de los periodos de mayor volumen.</p>



                        <p>Plazo de preparación: preparamos los pedidos en un plazo de 0 a 1 día hábil. Los
                            pedidos realizados antes de las 17:00 pueden prepararse el mismo día; los realizados
                            después de las 17:00 se preparan al día siguiente.</p>



                        <ol start="3" class="wp-block-list">
                            <li>Costes de Entrega</li>
                        </ol>



                        <p>En https://casacubertatrias.es, la entrega de todos los productos adquiridos es gratuita en
                            España y en el resto de Europa.</p>



                        <p>También es importante indicar la dirección correcta al realizar la compra en nuestro sitio.</p>



                        <ol start="4" class="wp-block-list">
                            <li>Seguimiento del Pedido</li>
                        </ol>



                        <p>En cuanto se envíe su paquete, recibirá un correo electrónico de confirmación con un
                            número de seguimiento que le permitirá seguir su entrega en tiempo real.</p>



                        <ol start="5" class="wp-block-list">
                            <li>Entrega de Palés y Cargas Voluminosas</li>
                        </ol>



                        <p>La leña, los pellets y los equipos pesados se entregan sobre palé mediante transporte de
                            mercancías. Antes de realizar el pedido, tenga en cuenta las siguientes condiciones:</p>



                        <p>El domicilio de entrega debe ser accesible para un camión de gran tonelaje. Si el acceso
                            es restringido (calle estrecha, zona peatonal, altura limitada), indíquelo en las
                            observaciones del pedido para organizar un vehículo adaptado.</p>



                        <p>La entrega se realiza a pie de calle, en el punto accesible más cercano al domicilio.
                            El transportista dispone de camión con plataforma elevadora (hayón) y transpaleta para
                            depositar el palé en el suelo.</p>



                        <p>El desplazamiento del palé hasta el interior de la vivienda, garaje o sótano corre a
                            cargo del cliente. Recomendamos prever la ayuda de una segunda persona el día de la
                            entrega.</p>



                        <p>El cliente debe estar presente en la franja horaria acordada con el transportista y
                            comprobar el estado del palé antes de firmar el albarán de entrega. Cualquier daño
                            aparente debe anotarse en el albarán y comunicarse en un plazo de 48 horas.</p>



                        <ol start="6" class="wp-block-list">
                            <li>Embalaje</li>
                        </ol>



                        <p>Sus productos de calefacción se embalan cuidadosamente para garantizar su protección
                            durante el transporte.</p>



                        <ol start="7" class="wp-block-list">
                            <li>Paquete Dañado o Perdido</li>
                        </ol>



                        <p>Si su paquete llega dañado o no llega a su destino:</p>



                        <p>Contacte con nuestro servicio de atención al cliente a través del correo electrónico
                            contacto@casacubertatrias.es en un plazo de 48 horas tras la entrega.</p>



                        <p>Facilite fotografías del embalaje y de los productos (si están dañados).</p>



                        <p>Tomaremos las medidas necesarias para reenviar o reembolsar su pedido.</p>



                        <ol start="8" class="wp-block-list">
                            <li>Devoluciones y Cambios</li>
                        </ol>



                        <p>Para cualquier devolución o cambio, consulte nuestra Política de Devoluciones, disponible
                            en la página dedicada de nuestro sitio web.</p>



                        <figure class="wp-block-image size-large is-resized"><a
                                href="/wp-content/uploads/2022/01/er-01-scaled.png"><img loading="lazy" decoding="async"
                                    width="658" height="379" src="/wp-content/uploads/2022/01/er-01-scaled.png"
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
