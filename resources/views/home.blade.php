@extends('layouts.app')

@section('title', 'Leña y pellets a domicilio en España')
@section('meta_description', 'Compra leña de encina seca, leña para chimenea y estufa, pellets de madera certificados y madera densificada con entrega a domicilio en España. Pago seguro y envío en 2-4 días laborables.')
@section('canonical', url('/'))

@push('styles')
    @vite(['resources/css/home.css'])
@endpush

@section('content')
    @include('layouts.partials.navbar.public')
    <div id="wrapper-container" class="wrapper-container">
        @include('section.slide')

        <div id="tbay-main-content">
            <section>
                <div class="row ">
                    <div id="main-content" class="main-page col-12">
                        <div id="main" class="site-main">
                            <div data-elementor-type="wp-page" data-elementor-id="145" class="elementor elementor-145">

                                <section
                                    class="elementor-section elementor-top-section elementor-element elementor-element-297be64 elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                    data-id="297be64" data-element_type="section"
                                    data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
                                    <div class="elementor-container elementor-column-gap-default">
                                        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-7f4161d"
                                            data-id="7f4161d" data-element_type="column">
                                            <div class="elementor-widget-wrap elementor-element-populated">
                                                <div class="elementor-element elementor-element-383a96d elementor-widget__width-initial elementor-widget elementor-widget-tbay-banner"
                                                    data-id="383a96d" data-element_type="widget"
                                                    data-widget_type="tbay-banner.default">
                                                    <div class="elementor-widget-container">
                                                        <div class="tbay-element tbay-element-banner cursor-pointer"
                                                            onclick="window.location.href=&#039;{{ route('loja') }}&#039;">
                                                            <div class="main-wrapp-img">
                                                                <div class="banner-image">
                                                                    <img loading="lazy" decoding="async" width="1248"
                                                                        height="832"
                                                                        src="{{ asset('wp-content/uploads/2025/10/765424359870807610.jpeg') }}"
                                                                        class="attachment-full size-full wp-image-5734"
                                                                        alt="Leña y pellets de madera de calidad — Casacuberta Trias S.L." />
                                                                </div>
                                                            </div>
                                                            <div class="wrapper-content-banner">
                                                                <div class="content-banner">
                                                                    <h3 class="banner-tbay-title">
                                                                        <span class="title">Casacuberta Trias S.L.</span>

                                                                        <span class="subtitle">Especialista en pellets de
                                                                            madera, leña y troncos comprimidos</span>
                                                                    </h3>


                                                                    <div class="banner-label"><span>Tienda</span></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-1c16cf0"
                                            data-id="1c16cf0" data-element_type="column">
                                            <div class="elementor-widget-wrap elementor-element-populated">
                                                <div class="elementor-element elementor-element-d01fa10 elementor-widget elementor-widget-tbay-banner"
                                                    data-id="d01fa10" data-element_type="widget"
                                                    data-widget_type="tbay-banner.default">
                                                    <div class="elementor-widget-container">
                                                        <div class="tbay-element tbay-element-banner cursor-pointer"
                                                            onclick="window.location.href=&#039;{{ route('contacto') }}&#039;">
                                                            <div class="main-wrapp-img">
                                                                <div class="banner-image">
                                                                    <img loading="lazy" decoding="async" width="1280"
                                                                        height="800"
                                                                        src="{{ asset('wp-content/uploads/2025/10/765424359870807621.jpg') }}"
                                                                        class="attachment-full size-full wp-image-5736"
                                                                        alt="Leña y pellets de madera de calidad — Casacuberta Trias S.L." />
                                                                </div>
                                                            </div>
                                                            <div class="wrapper-content-banner">
                                                                <div class="content-banner">
                                                                    <h3 class="banner-tbay-title">
                                                                        <span class="title">Casacuberta Trias S.L.</span>

                                                                        <span class="subtitle">La mejor experiencia de
                                                                            calefacción a leña.</span>
                                                                    </h3>

                                                                    <div class="banner-label"><span>¡Contáctenos!</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>


                                @if (isset($nuevosPelletsProducts) && count($nuevosPelletsProducts) > 0)
                                    <section class="lv-home-estufas">
                                        <div class="container">
                                            <div class="lv-home-estufas__head">
                                                <span class="lv-home-estufas__subtitle">Novedades</span>
                                                <h2 class="lv-home-estufas__title">Nuevos pellets</h2>
                                            </div>
                                            <div class="lv-product-grid">
                                                @foreach ($nuevosPelletsProducts as $pellet)
                                                    <x-product-card :product="$pellet" />
                                                @endforeach
                                            </div>
                                            <div class="lv-home-estufas__cta">
                                                <a class="lv-btn lv-btn--primary"
                                                    href="{{ route('category', ['category' => 'pellets-de-madera']) }}">Ver
                                                    todos los pellets</a>
                                            </div>
                                        </div>
                                    </section>
                                @endif


                                <section
                                    class="elementor-section elementor-top-section elementor-element elementor-element-82b5d97 elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                    data-id="82b5d97" data-element_type="section"
                                    data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
                                    <div class="elementor-container elementor-column-gap-default">
                                        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-e39c852"
                                            data-id="e39c852" data-element_type="column">
                                            <div class="elementor-widget-wrap elementor-element-populated">
                                                <div class="elementor-element elementor-element-b7b13ba elementor-product-v1 heading-tab-style-block elementor-widget elementor-widget-tbay-product-tabs"
                                                    data-id="b7b13ba" data-element_type="widget"
                                                    data-widget_type="tbay-product-tabs.default">
                                                    <div class="elementor-widget-container">

                                                        <div class="tbay-element tbay-element-product-tabs ajax-active">

                                                            <div class="wrapper-heading-tab">
                                                                <ul class="product-tabs-title tabs-list nav nav-tabs"
                                                                    data-atts="{&quot;categories&quot;:[&quot;pellets-de-madera&quot;],&quot;cat_operator&quot;:&quot;IN&quot;,&quot;limit&quot;:16,&quot;orderby&quot;:&quot;date&quot;,&quot;order&quot;:&quot;asc&quot;,&quot;product_style&quot;:&quot;v1&quot;,&quot;attr_row&quot;:&quot;class=\&quot;product-tabs row grid products\&quot; data-xlgdesktop=\&quot;4\&quot; data-desktop=\&quot;4\&quot; data-desktopsmall=\&quot;4\&quot; data-tablet=\&quot;3\&quot; data-landscape=\&quot;2\&quot; data-mobile=\&quot;2\&quot;&quot;}">
                                                                    <li>
                                                                        <a href="javascript:void(0)" data-bs-toggle="pill"
                                                                            data-bs-target="#best_selling-7t9jG-c11dc16"
                                                                            data-value="best_selling" class="active">PELLETS
                                                                            DE MADERA</a>
                                                                    </li>

                                                                </ul>
                                                            </div>

                                                            <div class="tbay-addon-content tab-content woocommerce">
                                                                <div class="tab-pane active active-content current"
                                                                    id="best_selling-7t9jG-c11dc16">


                                                                    <div class="product-tabs row grid products product-tabs products"
                                                                        data-xlgdesktop="4" data-desktop="4"
                                                                        data-desktopsmall="4" data-tablet="3"
                                                                        data-landscape="2" data-mobile="2">

                                                                        @foreach ($pelletProducts as $product)
                                                                            <div class="item">
                                                                                <div
                                                                                    class="products-grid product type-product post-{{ $product['id'] }} status-publish instock product_cat-pellets-de-madera has-post-thumbnail sale taxable shipping-taxable purchasable product-type-simple">
                                                                                    <div class="product-block grid product v1"
                                                                                        data-product-id="{{ $product['id'] }}">
                                                                                        <div class="product-content">

                                                                                            <div class="block-inner">
                                                                                                <figure class="image ">
                                                                                                    <a title="{{ $product['title'] }}"
                                                                                                        href="{{ route('product.show', ['slug' => $product['slug']]) }}"
                                                                                                        class="product-image">
                                                                                                        <img loading="lazy"
                                                                                                            decoding="async"
                                                                                                            width="480"
                                                                                                            height="480"
                                                                                                            src="{{ asset($product['images'][0]) }}"
                                                                                                            class="@if(empty($product['hover_image'])) image-no-effect @else image-effect attachment-shop_catalog @endif"
                                                                                                            alt="{{ $product['title'] }}" />
                                                                                                        @if ($product['hover_image'])
                                                                                                            <img loading="lazy"
                                                                                                                decoding="async"
                                                                                                                width="480"
                                                                                                                height="480"
                                                                                                                src="{{ asset($product['hover_image']) }}"
                                                                                                                class="image-hover"
                                                                                                                alt="" />
                                                                                                        @endif
                                                                                                    </a>
                                                                                                </figure>

                                                                                                <div class="group-buttons">
                                                                                                    <div class="add-cart"
                                                                                                        title="Añadir">
                                                                                                        <a href="javascript:void(0);"
                                                                                                            data-product-id="{{ $product['id'] ?? '' }}"
                                                                                                            class="wp-block-button__link add_to_cart_button ajax_add_to_cart"
                                                                                                            aria-label="Añadir al carrito: &ldquo;{{ $product['title'] ?? 'Producto' }}&rdquo;">
                                                                                                            <span
                                                                                                                class="title-cart">Añadir</span>
                                                                                                            <i
                                                                                                                class="tb-icon tb-icon-bag-2"></i>
                                                                                                        </a>
                                                                                                        <span
                                                                                                            id="woocommerce_loop_add_to_cart_link_describedby_{{ $product['id'] }}"
                                                                                                            class="screen-reader-text"></span>
                                                                                                    </div>
                                                                                                    <div class="button-wishlist shown-mobile"
                                                                                                        title="Lista de deseos">
                                                                                                        <div class="yith-add-to-wishlist-button-block yith-add-to-wishlist-button-block--initialized"
                                                                                                            data-attributes="{&quot;kind&quot;:&quot;button&quot;}">
                                                                                                            <a class="yith-wcwl-add-to-wishlist-button yith-wcwl-add-to-wishlist-button--anchor wishlist-button
            {{ in_array($product['id'], array_keys(Session::get('wishlist', []))) ? 'wishlist-added' : '' }}"
                                                                                                                aria-label="Add To Wishlist: &ldquo;{{ $product['title'] }}&rdquo;"
                                                                                                                data-product-id="{{ $product['id'] }}"
                                                                                                                data-product-title="{{ $product['title'] }}"
                                                                                                                data-product-price="{{ $product['price'] }}"
                                                                                                                data-product-image="{{ asset($product['images'][0]) }}"
                                                                                                                data-product-slug="{{ $product['slug'] }}"
                                                                                                                href="#">
                                                                                                                <svg class="yith-wcwl-icon yith-wcwl-icon-svg yith-wcwl-add-to-wishlist-button-icon"
                                                                                                                    id="yith-wcwl-icon-heart-outline"
                                                                                                                    fill="{{ in_array($product['id'], array_keys(Session::get('wishlist', []))) ? 'red' : 'none' }}"
                                                                                                                    stroke-width="1.5"
                                                                                                                    stroke="currentColor"
                                                                                                                    viewBox="0 0 24 24"
                                                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                                                    <path
                                                                                                                        stroke-linecap="round"
                                                                                                                        stroke-linejoin="round"
                                                                                                                        d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z">
                                                                                                                    </path>
                                                                                                                </svg>
                                                                                                                <span
                                                                                                                    class="yith-wcwl-add-to-wishlist-button__label">
                                                                                                                    {{ in_array($product['id'], array_keys(Session::get('wishlist', []))) ? 'En la lista' : 'Añadir a favoritos' }}
                                                                                                                </span>
                                                                                                            </a>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="tbay-quick-view">
                                                                                                        <a href="#"
                                                                                                            class="qview-button"
                                                                                                            title="Vista rápida"
                                                                                                            data-effect="mfp-move-from-top"
                                                                                                            data-product-id="{{ $product['id'] }}">
                                                                                                            <i
                                                                                                                class="tb-icon tb-icon-eye"></i>
                                                                                                            <span>Vista
                                                                                                                rápida</span>
                                                                                                        </a>
                                                                                                    </div>
                                                                                                </div>

                                                                                            </div>

                                                                                            <span class="onsale"><span
                                                                                                    class="saled">Oferta</span></span>

                                                                                            <div class="caption">
                                                                                                <span class="price">
                                                                                                    <del
                                                                                                        aria-hidden="true">
                                                                                                        <span
                                                                                                            class="woocommerce-Price-amount amount">
                                                                                                            <bdi>{{ \App\Support\Money::format($product['old_price']) }}&nbsp;<span
                                                                                                                    class="woocommerce-Price-currencySymbol">&euro;</span></bdi>
                                                                                                        </span>
                                                                                                    </del>
                                                                                                    <span
                                                                                                        class="screen-reader-text">El
                                                                                                        precio original era:
                                                                                                        {{ \App\Support\Money::format($product['old_price']) }}&nbsp;&euro;.</span>
                                                                                                    <ins
                                                                                                        aria-hidden="true">
                                                                                                        <span
                                                                                                            class="woocommerce-Price-amount amount">
                                                                                                            <bdi>{{ \App\Support\Money::format($product['price']) }}&nbsp;<span
                                                                                                                    class="woocommerce-Price-currencySymbol">&euro;</span></bdi>
                                                                                                        </span>
                                                                                                    </ins>
                                                                                                    <span
                                                                                                        class="screen-reader-text">El
                                                                                                        precio actual es:
                                                                                                        {{ \App\Support\Money::format($product['price']) }}&nbsp;&euro;.</span>
                                                                                                    <small
                                                                                                        class="woocommerce-price-suffix">IVA
                                                                                                        incluido</small>
                                                                                                </span>

                                                                                                <h3 class="name">
                                                                                                    <a
                                                                                                        href="{{ route('product.show', ['slug' => $product['slug']]) }}">{{ $product['title'] }}</a>
                                                                                                </h3>

                                                                                                <div class="group-content">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        @endforeach

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="elementor-element elementor-element-b6e20e7 elementor-align-center elementor-widget elementor-widget-button"
                                                    data-id="b6e20e7" data-element_type="widget"
                                                    data-widget_type="button.default">
                                                    <a class="elementor-button elementor-button-link elementor-size-sm"
                                                        href="{{ route('category', ['category' => 'pellets-de-madera']) }}">
                                                        <span class="elementor-button-content-wrapper">
                                                            <span class="elementor-button-text">Ver todo</span>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>


                                <section
                                    class="elementor-section elementor-top-section elementor-element elementor-element-231a483 elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                    data-id="231a483" data-element_type="section"
                                    data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
                                    <div class="elementor-container elementor-column-gap-default">
                                        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-1164bba"
                                            data-id="1164bba" data-element_type="column">
                                            <div class="elementor-widget-wrap elementor-element-populated">
                                                <div class="elementor-element elementor-element-73dc688 elementor-product-v1 heading-tab-style-block elementor-widget elementor-widget-tbay-product-tabs"
                                                    data-id="73dc688" data-element_type="widget"
                                                    data-widget_type="tbay-product-tabs.default">
                                                    <div class="elementor-widget-container">

                                                        <div class="tbay-element tbay-element-product-tabs ajax-active">

                                                            <div class="wrapper-heading-tab">
                                                                <ul class="product-tabs-title tabs-list nav nav-tabs"
                                                                    data-atts="{&quot;categories&quot;:[&quot;lenha&quot;],&quot;cat_operator&quot;:&quot;IN&quot;,&quot;limit&quot;:16,&quot;orderby&quot;:&quot;date&quot;,&quot;order&quot;:&quot;asc&quot;,&quot;product_style&quot;:&quot;v1&quot;,&quot;attr_row&quot;:&quot;class=\&quot;product-tabs row grid products\&quot; data-xlgdesktop=\&quot;4\&quot; data-desktop=\&quot;4\&quot; data-desktopsmall=\&quot;4\&quot; data-tablet=\&quot;3\&quot; data-landscape=\&quot;2\&quot; data-mobile=\&quot;2\&quot;&quot;}">
                                                                    <li>
                                                                        <a href="javascript:void(0)" data-bs-toggle="pill"
                                                                            data-bs-target="#best_selling-LkjyJ-c11dc16"
                                                                            data-value="best_selling"
                                                                            class="active">LEÑA</a>
                                                                    </li>
                                                                </ul>
                                                            </div>

                                                            <div class="tbay-addon-content tab-content woocommerce">
                                                                <div class="tab-pane active active-content current"
                                                                    id="best_selling-LkjyJ-c11dc16">
                                                                    <div class="product-tabs row grid products product-tabs products"
                                                                        data-xlgdesktop="4" data-desktop="4"
                                                                        data-desktopsmall="4" data-tablet="3"
                                                                        data-landscape="2" data-mobile="2">

                                                                        @foreach ($lenhaProducts as $product)
                                                                            <div class="item">
                                                                                <div
                                                                                    class="products-grid product type-product post-{{ $product['id'] }} status-publish instock product_cat-lenha has-post-thumbnail sale taxable shipping-taxable purchasable product-type-simple">
                                                                                    <div class="product-block grid product v1"
                                                                                        data-product-id="{{ $product['id'] }}">
                                                                                        <div class="product-content">
                                                                                            <div class="block-inner">
                                                                                                <figure class="image ">
                                                                                                    <a title="{{ $product['title'] }}"
                                                                                                        href="{{ route('product.show', ['slug' => $product['slug']]) }}"
                                                                                                        class="product-image">
                                                                                                        <img loading="lazy"
                                                                                                            decoding="async"
                                                                                                            width="480"
                                                                                                            height="480"
                                                                                                            src="{{ asset($product['images'][0]) }}"
                                                                                                            class="{image-effect"
                                                                                                            alt="" />
                                                                                                        @if ($product['hover_image'])
                                                                                                            <img loading="lazy"
                                                                                                                decoding="async"
                                                                                                                width="225"
                                                                                                                height="225"
                                                                                                                src="{{ asset($product['hover_image']) }}"
                                                                                                                class="image-hover"
                                                                                                                alt="" />
                                                                                                        @endif
                                                                                                    </a>
                                                                                                </figure>

                                                                                                <div class="group-buttons">
                                                                                                    <div class="add-cart"
                                                                                                        title="Añadir">
                                                                                                        <a href="javascript:void(0);"
                                                                                                            data-product-id="{{ $product['id'] ?? '' }}"
                                                                                                            class="wp-block-button__link add_to_cart_button ajax_add_to_cart"
                                                                                                            aria-label="Añadir al carrito: &ldquo;{{ $product['title'] ?? 'Producto' }}&rdquo;">
                                                                                                            <span
                                                                                                                class="title-cart">Añadir</span>
                                                                                                            <i
                                                                                                                class="tb-icon tb-icon-bag-2"></i>
                                                                                                        </a>
                                                                                                        <span
                                                                                                            id="woocommerce_loop_add_to_cart_link_describedby_{{ $product['id'] }}"
                                                                                                            class="screen-reader-text"></span>
                                                                                                    </div>
                                                                                                    <div class="button-wishlist shown-mobile"
                                                                                                        title="Lista de deseos">
                                                                                                        <div class="yith-add-to-wishlist-button-block yith-add-to-wishlist-button-block--initialized"
                                                                                                            data-attributes="{&quot;kind&quot;:&quot;button&quot;}">
                                                                                                            <a class="yith-wcwl-add-to-wishlist-button yith-wcwl-add-to-wishlist-button--anchor wishlist-button
            {{ in_array($product['id'], array_keys(Session::get('wishlist', []))) ? 'wishlist-added' : '' }}"
                                                                                                                aria-label="Add To Wishlist: &ldquo;{{ $product['title'] }}&rdquo;"
                                                                                                                data-product-id="{{ $product['id'] }}"
                                                                                                                data-product-title="{{ $product['title'] }}"
                                                                                                                data-product-price="{{ $product['price'] }}"
                                                                                                                data-product-image="{{ asset($product['images'][0]) }}"
                                                                                                                data-product-slug="{{ $product['slug'] }}"
                                                                                                                href="#">
                                                                                                                <svg class="yith-wcwl-icon yith-wcwl-icon-svg yith-wcwl-add-to-wishlist-button-icon"
                                                                                                                    id="yith-wcwl-icon-heart-outline"
                                                                                                                    fill="{{ in_array($product['id'], array_keys(Session::get('wishlist', []))) ? 'red' : 'none' }}"
                                                                                                                    stroke-width="1.5"
                                                                                                                    stroke="currentColor"
                                                                                                                    viewBox="0 0 24 24"
                                                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                                                    <path
                                                                                                                        stroke-linecap="round"
                                                                                                                        stroke-linejoin="round"
                                                                                                                        d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z">
                                                                                                                    </path>
                                                                                                                </svg>
                                                                                                                <span
                                                                                                                    class="yith-wcwl-add-to-wishlist-button__label">
                                                                                                                    {{ in_array($product['id'], array_keys(Session::get('wishlist', []))) ? 'En la lista' : 'Añadir a favoritos' }}
                                                                                                                </span>
                                                                                                            </a>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="tbay-quick-view">
                                                                                                        <a href="#"
                                                                                                            class="qview-button"
                                                                                                            title="Vista rápida"
                                                                                                            data-effect="mfp-move-from-top"
                                                                                                            data-product-id="{{ $product['id'] }}">
                                                                                                            <i
                                                                                                                class="tb-icon tb-icon-eye"></i>
                                                                                                            <span>Vista
                                                                                                                rápida</span>
                                                                                                        </a>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>

                                                                                            <span class="onsale"><span
                                                                                                    class="saled">Oferta</span></span>

                                                                                            <div class="caption">
                                                                                                <span class="price">
                                                                                                    <del
                                                                                                        aria-hidden="true">
                                                                                                        <span
                                                                                                            class="woocommerce-Price-amount amount">
                                                                                                            <bdi>{{ \App\Support\Money::format($product['old_price']) }}&nbsp;<span
                                                                                                                    class="woocommerce-Price-currencySymbol">&euro;</span></bdi>
                                                                                                        </span>
                                                                                                    </del>
                                                                                                    <span
                                                                                                        class="screen-reader-text">El
                                                                                                        precio original era:
                                                                                                        {{ \App\Support\Money::format($product['old_price']) }}&nbsp;&euro;.</span>
                                                                                                    <ins
                                                                                                        aria-hidden="true">
                                                                                                        <span
                                                                                                            class="woocommerce-Price-amount amount">
                                                                                                            <bdi>{{ \App\Support\Money::format($product['price']) }}&nbsp;<span
                                                                                                                    class="woocommerce-Price-currencySymbol">&euro;</span></bdi>
                                                                                                        </span>
                                                                                                    </ins>
                                                                                                    <span
                                                                                                        class="screen-reader-text">El
                                                                                                        precio actual es:
                                                                                                        {{ \App\Support\Money::format($product['price']) }}&nbsp;&euro;.</span>
                                                                                                    <small
                                                                                                        class="woocommerce-price-suffix">IVA
                                                                                                        incluido</small>
                                                                                                </span>

                                                                                                <h3 class="name">
                                                                                                    <a
                                                                                                        href="{{ route('product.show', ['slug' => $product['slug']]) }}">{{ $product['title'] }}</a>
                                                                                                </h3>

                                                                                                <div class="group-content">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        @endforeach

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="elementor-element elementor-element-ec242d1 elementor-align-center elementor-widget elementor-widget-button"
                                                    data-id="ec242d1" data-element_type="widget"
                                                    data-widget_type="button.default">
                                                    <a class="elementor-button elementor-button-link elementor-size-sm"
                                                        href="{{ route('category', ['category' => 'lena']) }}">
                                                        <span class="elementor-button-content-wrapper">
                                                            <span class="elementor-button-text">Ver todo</span>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>


                                <section
                                    class="elementor-section elementor-top-section elementor-element elementor-element-5d0e347b elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                    data-id="5d0e347b" data-element_type="section"
                                    data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;,&quot;background_background&quot;:&quot;classic&quot;}">
                                    <div class="elementor-container elementor-column-gap-default">
                                        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-46cfa7ea"
                                            data-id="46cfa7ea" data-element_type="column">
                                            <div class="elementor-widget-wrap elementor-element-populated">
                                                <div class="elementor-element elementor-element-184e2302 elementor-align-center elementor-widget elementor-widget-button"
                                                    data-id="184e2302" data-element_type="widget"
                                                    data-widget_type="button.default">
                                                    <a class="elementor-button elementor-button-link elementor-size-sm"
                                                        href="{{ route('loja') }}">
                                                        <span class="elementor-button-content-wrapper">
                                                            <span class="elementor-button-text">Tienda</span>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>


                                <section
                                    class="elementor-section elementor-top-section elementor-element elementor-element-7cdc75f elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                    data-id="7cdc75f" data-element_type="section"
                                    data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
                                    <div class="elementor-container elementor-column-gap-default">
                                        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-331df95"
                                            data-id="331df95" data-element_type="column">
                                            <div class="elementor-widget-wrap elementor-element-populated">
                                                <div class="elementor-element elementor-element-118f1cb elementor-product-v1 heading-tab-style-block elementor-widget elementor-widget-tbay-product-tabs"
                                                    data-id="118f1cb" data-element_type="widget"
                                                    data-widget_type="tbay-product-tabs.default">
                                                    <div class="elementor-widget-container">

                                                        <div class="tbay-element tbay-element-product-tabs ajax-active">

                                                            <div class="wrapper-heading-tab">
                                                                <ul class="product-tabs-title tabs-list nav nav-tabs"
                                                                    data-atts="{&quot;categories&quot;:[&quot;cocinas-de-lena&quot;],&quot;cat_operator&quot;:&quot;IN&quot;,&quot;limit&quot;:12,&quot;orderby&quot;:&quot;date&quot;,&quot;order&quot;:&quot;asc&quot;,&quot;product_style&quot;:&quot;v1&quot;,&quot;attr_row&quot;:&quot;class=\&quot;product-tabs row grid products\&quot; data-xlgdesktop=\&quot;4\&quot; data-desktop=\&quot;4\&quot; data-desktopsmall=\&quot;4\&quot; data-tablet=\&quot;3\&quot; data-landscape=\&quot;2\&quot; data-mobile=\&quot;2\&quot;&quot;}">
                                                                    <li>
                                                                        <a href="javascript:void(0)" data-bs-toggle="pill"
                                                                            data-bs-target="#best_selling-kAljt-c11dc16"
                                                                            data-value="best_selling" class="active">COCINAS
                                                                            DE LEÑA</a>
                                                                    </li>
                                                                </ul>
                                                            </div>

                                                            <div class="tbay-addon-content tab-content woocommerce">
                                                                <div class="tab-pane active active-content current"
                                                                    id="best_selling-kAljt-c11dc16">
                                                                    <div class="product-tabs row grid products product-tabs products"
                                                                        data-xlgdesktop="4" data-desktop="4"
                                                                        data-desktopsmall="4" data-tablet="3"
                                                                        data-landscape="2" data-mobile="2">

                                                                        @foreach ($chefProducts as $product)
                                                                            <div class="item">
                                                                                <div
                                                                                    class="products-grid product type-product post-{{ $product['id'] }} status-publish instock product_cat-cocinas-de-lena has-post-thumbnail sale taxable shipping-taxable purchasable product-type-simple">
                                                                                    <div class="product-block grid product v1"
                                                                                        data-product-id="{{ $product['id'] }}">
                                                                                        <div class="product-content">
                                                                                            <div class="block-inner">
                                                                                                <figure class="image ">
                                                                                                    <a title="{{ $product['title'] }}"
                                                                                                        href="{{ route('product.show', ['slug' => $product['slug']]) }}"
                                                                                                        class="product-image">
                                                                                                        <img loading="lazy"
                                                                                                            decoding="async"
                                                                                                            width="480"
                                                                                                            height="480"
                                                                                                            src="{{ asset($product['images'][0]) }}"
                                                                                                            class="@if(empty($product['hover_image'])) image-no-effect @else image-effect attachment-shop_catalog @endif"
                                                                                                            alt="{{ $product['title'] }}" />
                                                                                                        @if ($product['hover_image'])
                                                                                                            <img loading="lazy"
                                                                                                                decoding="async"
                                                                                                                width="480"
                                                                                                                height="480"
                                                                                                                src="{{ asset($product['hover_image']) }}"
                                                                                                                class="image-hover"
                                                                                                                alt="" />
                                                                                                        @endif
                                                                                                    </a>
                                                                                                </figure>

                                                                                                <div class="group-buttons">
                                                                                                    <div class="add-cart"
                                                                                                        title="Añadir">
                                                                                                        <a href="javascript:void(0);"
                                                                                                            data-product-id="{{ $product['id'] ?? '' }}"
                                                                                                            class="wp-block-button__link add_to_cart_button ajax_add_to_cart"
                                                                                                            aria-label="Añadir al carrito: &ldquo;{{ $product['title'] ?? 'Producto' }}&rdquo;">
                                                                                                            <span
                                                                                                                class="title-cart">Añadir</span>
                                                                                                            <i
                                                                                                                class="tb-icon tb-icon-bag-2"></i>
                                                                                                        </a>
                                                                                                        <span
                                                                                                            id="woocommerce_loop_add_to_cart_link_describedby_{{ $product['id'] }}"
                                                                                                            class="screen-reader-text"></span>
                                                                                                    </div>
                                                                                                    <div class="button-wishlist shown-mobile"
                                                                                                        title="Lista de deseos">
                                                                                                        <div class="yith-add-to-wishlist-button-block yith-add-to-wishlist-button-block--initialized"
                                                                                                            data-attributes="{&quot;kind&quot;:&quot;button&quot;}">
                                                                                                            <a class="yith-wcwl-add-to-wishlist-button yith-wcwl-add-to-wishlist-button--anchor wishlist-button
            {{ in_array($product['id'], array_keys(Session::get('wishlist', []))) ? 'wishlist-added' : '' }}"
                                                                                                                aria-label="Add To Wishlist: &ldquo;{{ $product['title'] }}&rdquo;"
                                                                                                                data-product-id="{{ $product['id'] }}"
                                                                                                                data-product-title="{{ $product['title'] }}"
                                                                                                                data-product-price="{{ $product['price'] }}"
                                                                                                                data-product-image="{{ asset($product['images'][0]) }}"
                                                                                                                data-product-slug="{{ $product['slug'] }}"
                                                                                                                href="#">
                                                                                                                <svg class="yith-wcwl-icon yith-wcwl-icon-svg yith-wcwl-add-to-wishlist-button-icon"
                                                                                                                    id="yith-wcwl-icon-heart-outline"
                                                                                                                    fill="{{ in_array($product['id'], array_keys(Session::get('wishlist', []))) ? 'red' : 'none' }}"
                                                                                                                    stroke-width="1.5"
                                                                                                                    stroke="currentColor"
                                                                                                                    viewBox="0 0 24 24"
                                                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                                                    <path
                                                                                                                        stroke-linecap="round"
                                                                                                                        stroke-linejoin="round"
                                                                                                                        d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z">
                                                                                                                    </path>
                                                                                                                </svg>
                                                                                                                <span
                                                                                                                    class="yith-wcwl-add-to-wishlist-button__label">
                                                                                                                    {{ in_array($product['id'], array_keys(Session::get('wishlist', []))) ? 'En la lista' : 'Añadir a favoritos' }}
                                                                                                                </span>
                                                                                                            </a>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="tbay-quick-view">
                                                                                                        <a href="#"
                                                                                                            class="qview-button"
                                                                                                            title="Vista rápida"
                                                                                                            data-effect="mfp-move-from-top"
                                                                                                            data-product-id="{{ $product['id'] }}">
                                                                                                            <i
                                                                                                                class="tb-icon tb-icon-eye"></i>
                                                                                                            <span>Vista
                                                                                                                rápida</span>
                                                                                                        </a>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>

                                                                                            <span class="onsale"><span
                                                                                                    class="saled">Oferta</span></span>

                                                                                            <div class="caption">
                                                                                                <span class="price">
                                                                                                    <del
                                                                                                        aria-hidden="true">
                                                                                                        <span
                                                                                                            class="woocommerce-Price-amount amount">
                                                                                                            <bdi>{{ \App\Support\Money::format($product['old_price']) }}&nbsp;<span
                                                                                                                    class="woocommerce-Price-currencySymbol">&euro;</span></bdi>
                                                                                                        </span>
                                                                                                    </del>
                                                                                                    <span
                                                                                                        class="screen-reader-text">El
                                                                                                        precio original era:
                                                                                                        {{ \App\Support\Money::format($product['old_price']) }}&nbsp;&euro;.</span>
                                                                                                    <ins
                                                                                                        aria-hidden="true">
                                                                                                        <span
                                                                                                            class="woocommerce-Price-amount amount">
                                                                                                            <bdi>{{ \App\Support\Money::format($product['price']) }}&nbsp;<span
                                                                                                                    class="woocommerce-Price-currencySymbol">&euro;</span></bdi>
                                                                                                        </span>
                                                                                                    </ins>
                                                                                                    <span
                                                                                                        class="screen-reader-text">El
                                                                                                        precio actual es:
                                                                                                        {{ \App\Support\Money::format($product['price']) }}&nbsp;&euro;.</span>
                                                                                                    <small
                                                                                                        class="woocommerce-price-suffix">IVA
                                                                                                        incluido</small>
                                                                                                </span>

                                                                                                <h3 class="name">
                                                                                                    <a
                                                                                                        href="{{ route('product.show', ['slug' => $product['slug']]) }}">{{ $product['title'] }}</a>
                                                                                                </h3>

                                                                                                <div class="group-content">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        @endforeach

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="elementor-element elementor-element-4a52e6d elementor-align-center elementor-widget elementor-widget-button"
                                                    data-id="4a52e6d" data-element_type="widget"
                                                    data-widget_type="button.default">
                                                    <a class="elementor-button elementor-button-link elementor-size-sm"
                                                        href="{{ route('category', ['category' => 'cocinas-de-lena']) }}">
                                                        <span class="elementor-button-content-wrapper">
                                                            <span class="elementor-button-text">Ver todo</span>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>


                                <section
                                    class="elementor-section elementor-top-section elementor-element elementor-element-8b9e869 elementor-section-full_width elementor-section-stretched elementor-section-height-default elementor-section-height-default"
                                    data-id="8b9e869" data-element_type="section"
                                    data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;,&quot;background_background&quot;:&quot;classic&quot;}">
                                    <div class="elementor-container elementor-column-gap-default">
                                        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-65ed9c0"
                                            data-id="65ed9c0" data-element_type="column">
                                            <div class="elementor-widget-wrap elementor-element-populated">
                                                <div class="elementor-element elementor-element-1e44416 elementor-widget elementor-widget-text-editor"
                                                    data-id="1e44416" data-element_type="widget"
                                                    data-widget_type="text-editor.default">
                                                    <p>Estamos aqui para si</p>
                                                </div>
                                                <section
                                                    class="elementor-section elementor-inner-section elementor-element elementor-element-fea20bc elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                                    data-id="fea20bc" data-element_type="section">
                                                    <div class="elementor-container elementor-column-gap-default">
                                                        <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-9be4837"
                                                            data-id="9be4837" data-element_type="column">
                                                            <div class="elementor-widget-wrap elementor-element-populated">
                                                                <div class="elementor-element elementor-element-5b0472d elementor-widget elementor-widget-tbay-banner"
                                                                    data-id="5b0472d" data-element_type="widget"
                                                                    data-widget_type="tbay-banner.default">
                                                                    <div class="elementor-widget-container">
                                                                        <div class="tbay-element tbay-element-banner cursor-pointer"
                                                                            onclick="window.location.href=&#039;{{ route('contacto') }}m//&#039;">
                                                                            <div class="main-wrapp-img">
                                                                                <div class="banner-image">
                                                                                    <img loading="lazy" decoding="async"
                                                                                        width="1280" height="800"
                                                                                        src="wp-content/uploads/2025/10/765424359870807617.jpg"
                                                                                        class="attachment-full size-full wp-image-5738"
                                                                                        alt="Leña y pellets de madera de calidad — Casacuberta Trias S.L." />
                                                                                </div>
                                                                            </div>
                                                                            <div class="wrapper-content-banner">
                                                                                <div class="content-banner">
                                                                                    <h3 class="banner-tbay-title">
                                                                                        <span class="title">LENHA
                                                                                            VIVA</span>

                                                                                        <span class="subtitle">¿Buscas un
                                                                                            proveedor de PELLETS?</span>
                                                                                    </h3>


                                                                                    <div class="banner-label">
                                                                                        <span>¡CONTÁCTANOS!</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </section>
                                            </div>
                                        </div>
                                    </div>
                                </section>


                                <div class="elementor-element elementor-element-4406292 e-flex e-con-boxed e-con e-parent"
                                    data-id="4406292" data-element_type="container">
                                    <div class="e-con-inner">
                                        <div class="elementor-element elementor-element-535d3b6 elementor-widget elementor-widget-spacer"
                                            data-id="535d3b6" data-element_type="widget"
                                            data-widget_type="spacer.default">
                                            <div class="elementor-spacer">
                                                <div class="elementor-spacer-inner"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <section
                                    class="elementor-section elementor-top-section elementor-element elementor-element-a01035d elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                    data-id="a01035d" data-element_type="section"
                                    data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
                                    <div class="elementor-container elementor-column-gap-default">
                                        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-5191e22"
                                            data-id="5191e22" data-element_type="column">
                                            <div class="elementor-widget-wrap elementor-element-populated">
                                                <div class="elementor-element elementor-element-98a464d elementor-product-v1 heading-tab-style-block elementor-widget elementor-widget-tbay-product-tabs"
                                                    data-id="98a464d" data-element_type="widget"
                                                    data-widget_type="tbay-product-tabs.default">
                                                    <div class="elementor-widget-container">

                                                        <div class="tbay-element tbay-element-product-tabs ajax-active">

                                                            <div class="wrapper-heading-tab">
                                                                <ul class="product-tabs-title tabs-list nav nav-tabs"
                                                                    data-atts="{&quot;categories&quot;:[&quot;madera-densificada&quot;],&quot;cat_operator&quot;:&quot;IN&quot;,&quot;limit&quot;:4,&quot;orderby&quot;:&quot;date&quot;,&quot;order&quot;:&quot;asc&quot;,&quot;product_style&quot;:&quot;v1&quot;,&quot;attr_row&quot;:&quot;class=\&quot;product-tabs row grid products\&quot; data-xlgdesktop=\&quot;4\&quot; data-desktop=\&quot;4\&quot; data-desktopsmall=\&quot;4\&quot; data-tablet=\&quot;3\&quot; data-landscape=\&quot;2\&quot; data-mobile=\&quot;2\&quot;&quot;}">
                                                                    <li>
                                                                        <a href="javascript:void(0)" data-bs-toggle="pill"
                                                                            data-bs-target="#best_selling-ktTFY-c11dc16"
                                                                            data-value="best_selling"
                                                                            class="active">MADERA
                                                                            DENSIFICADA</a>
                                                                    </li>
                                                                </ul>
                                                            </div>

                                                            <div class="tbay-addon-content tab-content woocommerce">
                                                                <div class="tab-pane active active-content current"
                                                                    id="best_selling-ktTFY-c11dc16">
                                                                    <div class="product-tabs row grid products product-tabs products"
                                                                        data-xlgdesktop="4" data-desktop="4"
                                                                        data-desktopsmall="4" data-tablet="3"
                                                                        data-landscape="2" data-mobile="2">

                                                                        @foreach ($compactadaProducts as $product)
                                                                            <div class="item">
                                                                                <div
                                                                                    class="products-grid product type-product post-{{ $product['id'] }} status-publish instock product_cat-madera-densificada has-post-thumbnail sale taxable shipping-taxable purchasable product-type-simple">
                                                                                    <div class="product-block grid product v1"
                                                                                        data-product-id="{{ $product['id'] }}">
                                                                                        <div class="product-content">
                                                                                            <div class="block-inner">
                                                                                                <figure class="image ">
                                                                                                    <a title="{{ html_entity_decode($product['title'], ENT_QUOTES, 'UTF-8') }}"
                                                                                                        href="{{ route('product.show', ['slug' => $product['slug']]) }}"
                                                                                                        class="product-image">
                                                                                                        <img loading="lazy"
                                                                                                            decoding="async"
                                                                                                            width="480"
                                                                                                            height="480"
                                                                                                            src="{{ asset($product['images'][0]) }}"
                                                                                                            class="@if(empty($product['hover_image'])) image-no-effect @else image-effect attachment-shop_catalog @endif"
                                                                                                            alt="{{ $product['title'] }}" />
                                                                                                        @if ($product['hover_image'])
                                                                                                            <img loading="lazy"
                                                                                                                decoding="async"
                                                                                                                width="480"
                                                                                                                height="480"
                                                                                                                src="{{ asset($product['hover_image']) }}"
                                                                                                                class="image-hover"
                                                                                                                alt="" />
                                                                                                        @endif
                                                                                                    </a>
                                                                                                </figure>

                                                                                                <div class="group-buttons">
                                                                                                    <div class="add-cart"
                                                                                                        title="Añadir">
                                                                                                        <a href="javascript:void(0);"
                                                                                                            data-product-id="{{ $product['id'] ?? '' }}"
                                                                                                            class="wp-block-button__link add_to_cart_button ajax_add_to_cart"
                                                                                                            aria-label="Añadir al carrito: &ldquo;{{ $product['title'] ?? 'Producto' }}&rdquo;">
                                                                                                            <span
                                                                                                                class="title-cart">Añadir</span>
                                                                                                            <i
                                                                                                                class="tb-icon tb-icon-bag-2"></i>
                                                                                                        </a>
                                                                                                        <span
                                                                                                            id="woocommerce_loop_add_to_cart_link_describedby_{{ $product['id'] }}"
                                                                                                            class="screen-reader-text"></span>
                                                                                                    </div>
                                                                                                    <div class="button-wishlist shown-mobile"
                                                                                                        title="Lista de deseos">
                                                                                                        <div class="yith-add-to-wishlist-button-block yith-add-to-wishlist-button-block--initialized"
                                                                                                            data-attributes="{&quot;kind&quot;:&quot;button&quot;}">
                                                                                                            <a class="yith-wcwl-add-to-wishlist-button yith-wcwl-add-to-wishlist-button--anchor wishlist-button
            {{ in_array($product['id'], array_keys(Session::get('wishlist', []))) ? 'wishlist-added' : '' }}"
                                                                                                                aria-label="Add To Wishlist: &ldquo;{{ $product['title'] }}&rdquo;"
                                                                                                                data-product-id="{{ $product['id'] }}"
                                                                                                                data-product-title="{{ $product['title'] }}"
                                                                                                                data-product-price="{{ $product['price'] }}"
                                                                                                                data-product-image="{{ asset($product['images'][0]) }}"
                                                                                                                data-product-slug="{{ $product['slug'] }}"
                                                                                                                href="#">
                                                                                                                <svg class="yith-wcwl-icon yith-wcwl-icon-svg yith-wcwl-add-to-wishlist-button-icon"
                                                                                                                    id="yith-wcwl-icon-heart-outline"
                                                                                                                    fill="{{ in_array($product['id'], array_keys(Session::get('wishlist', []))) ? 'red' : 'none' }}"
                                                                                                                    stroke-width="1.5"
                                                                                                                    stroke="currentColor"
                                                                                                                    viewBox="0 0 24 24"
                                                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                                                    <path
                                                                                                                        stroke-linecap="round"
                                                                                                                        stroke-linejoin="round"
                                                                                                                        d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z">
                                                                                                                    </path>
                                                                                                                </svg>
                                                                                                                <span
                                                                                                                    class="yith-wcwl-add-to-wishlist-button__label">
                                                                                                                    {{ in_array($product['id'], array_keys(Session::get('wishlist', []))) ? 'En la lista' : 'Añadir a favoritos' }}
                                                                                                                </span>
                                                                                                            </a>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="tbay-quick-view">
                                                                                                        <a href="#"
                                                                                                            class="qview-button"
                                                                                                            title="Vista rápida"
                                                                                                            data-effect="mfp-move-from-top"
                                                                                                            data-product-id="{{ $product['id'] }}">
                                                                                                            <i
                                                                                                                class="tb-icon tb-icon-eye"></i>
                                                                                                            <span>Vista
                                                                                                                rápida</span>
                                                                                                        </a>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>

                                                                                            <span class="onsale"><span
                                                                                                    class="saled">Oferta</span></span>

                                                                                            <div class="caption">
                                                                                                <span class="price">
                                                                                                    <del
                                                                                                        aria-hidden="true">
                                                                                                        <span
                                                                                                            class="woocommerce-Price-amount amount">
                                                                                                            <bdi>{{ \App\Support\Money::format($product['old_price']) }}&nbsp;<span
                                                                                                                    class="woocommerce-Price-currencySymbol">&euro;</span></bdi>
                                                                                                        </span>
                                                                                                    </del>
                                                                                                    <span
                                                                                                        class="screen-reader-text">El
                                                                                                        precio original era:
                                                                                                        {{ \App\Support\Money::format($product['old_price']) }}&nbsp;&euro;.</span>
                                                                                                    <ins
                                                                                                        aria-hidden="true">
                                                                                                        <span
                                                                                                            class="woocommerce-Price-amount amount">
                                                                                                            <bdi>{{ \App\Support\Money::format($product['price']) }}&nbsp;<span
                                                                                                                    class="woocommerce-Price-currencySymbol">&euro;</span></bdi>
                                                                                                        </span>
                                                                                                    </ins>
                                                                                                    <span
                                                                                                        class="screen-reader-text">El
                                                                                                        precio actual es:
                                                                                                        {{ \App\Support\Money::format($product['price']) }}&nbsp;&euro;.</span>
                                                                                                    <small
                                                                                                        class="woocommerce-price-suffix">IVA
                                                                                                        incluido</small>
                                                                                                </span>

                                                                                                <h3 class="name">
                                                                                                    <a
                                                                                                        href="{{ route('product.show', ['slug' => $product['slug']]) }}">{{ html_entity_decode($product['title'], ENT_QUOTES, 'UTF-8') }}</a>
                                                                                                </h3>

                                                                                                <div class="group-content">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        @endforeach

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="elementor-element elementor-element-cb12240 elementor-align-center elementor-widget elementor-widget-button"
                                                    data-id="cb12240" data-element_type="widget"
                                                    data-widget_type="button.default">
                                                    <a class="elementor-button elementor-button-link elementor-size-sm"
                                                        href="{{ route('category', ['category' => 'madera-densificada']) }}">
                                                        <span class="elementor-button-content-wrapper">
                                                            <span class="elementor-button-text">Ver todo</span>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                                <section
                                    class="elementor-section elementor-top-section elementor-element elementor-element-5f22068 elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                    data-id="5f22068" data-element_type="section"
                                    data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
                                    <div class="elementor-container elementor-column-gap-default">
                                        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-edf00f8"
                                            data-id="edf00f8" data-element_type="column">
                                            <div class="elementor-widget-wrap elementor-element-populated">
                                                <div class="elementor-element elementor-element-1a64f95 elementor-product-v1 heading-tab-style-block elementor-widget elementor-widget-tbay-product-tabs"
                                                    data-id="1a64f95" data-element_type="widget"
                                                    data-widget_type="tbay-product-tabs.default">
                                                    <div class="elementor-widget-container">

                                                        <div class="tbay-element tbay-element-product-tabs ajax-active">

                                                            <div class="wrapper-heading-tab">
                                                                <ul class="product-tabs-title tabs-list nav nav-tabs"
                                                                    data-atts="{&quot;categories&quot;:[&quot;calderas-de-lena&quot;],&quot;cat_operator&quot;:&quot;IN&quot;,&quot;limit&quot;:4,&quot;orderby&quot;:&quot;date&quot;,&quot;order&quot;:&quot;asc&quot;,&quot;product_style&quot;:&quot;v1&quot;,&quot;attr_row&quot;:&quot;class=\&quot;product-tabs row grid products\&quot; data-xlgdesktop=\&quot;4\&quot; data-desktop=\&quot;4\&quot; data-desktopsmall=\&quot;4\&quot; data-tablet=\&quot;3\&quot; data-landscape=\&quot;2\&quot; data-mobile=\&quot;2\&quot;&quot;}">
                                                                    <li>
                                                                        <a href="javascript:void(0)" data-bs-toggle="pill"
                                                                            data-bs-target="#best_selling-P94n5-c11dc16"
                                                                            data-value="best_selling"
                                                                            class="active">CALDERAS
                                                                            DE LEÑA</a>
                                                                    </li>
                                                                </ul>
                                                            </div>

                                                            <div class="tbay-addon-content tab-content woocommerce">
                                                                <div class="tab-pane active active-content current"
                                                                    id="best_selling-P94n5-c11dc16">
                                                                    <div class="product-tabs row grid products product-tabs products"
                                                                        data-xlgdesktop="4" data-desktop="4"
                                                                        data-desktopsmall="4" data-tablet="3"
                                                                        data-landscape="2" data-mobile="2">

                                                                        @foreach ($caldeiraProducts as $product)
                                                                            <div class="item">
                                                                                <div
                                                                                    class="products-grid product type-product post-{{ $product['id'] }} status-publish instock product_cat-calderas-de-lena has-post-thumbnail sale taxable shipping-taxable purchasable product-type-simple">
                                                                                    <div class="product-block grid product v1"
                                                                                        data-product-id="{{ $product['id'] }}">
                                                                                        <div class="product-content">
                                                                                            <div class="block-inner">
                                                                                                <figure class="image ">
                                                                                                    <a title="{{ $product['title'] }}"
                                                                                                        href="{{ route('product.show', ['slug' => $product['slug']]) }}"
                                                                                                        class="product-image">
                                                                                                        <img loading="lazy"
                                                                                                            decoding="async"
                                                                                                            width="480"
                                                                                                            height="480"
                                                                                                            src="{{ asset($product['images'][0]) }}"
                                                                                                            class="@if(empty($product['hover_image'])) image-no-effect @else image-effect attachment-shop_catalog @endif"
                                                                                                            alt="{{ $product['title'] }}" />
                                                                                                        @if ($product['hover_image'])
                                                                                                            <img loading="lazy"
                                                                                                                decoding="async"
                                                                                                                width="480"
                                                                                                                height="480"
                                                                                                                src="{{ asset($product['hover_image']) }}"
                                                                                                                class="image-hover"
                                                                                                                alt="" />
                                                                                                        @endif
                                                                                                    </a>
                                                                                                </figure>

                                                                                                <div class="group-buttons">
                                                                                                    <div class="add-cart"
                                                                                                        title="Añadir">
                                                                                                        <a href="javascript:void(0);"
                                                                                                            data-product-id="{{ $product['id'] ?? '' }}"
                                                                                                            class="wp-block-button__link add_to_cart_button ajax_add_to_cart"
                                                                                                            aria-label="Añadir al carrito: &ldquo;{{ $product['title'] ?? 'Producto' }}&rdquo;">
                                                                                                            <span
                                                                                                                class="title-cart">Añadir</span>
                                                                                                            <i
                                                                                                                class="tb-icon tb-icon-bag-2"></i>
                                                                                                        </a>
                                                                                                        <span
                                                                                                            id="woocommerce_loop_add_to_cart_link_describedby_{{ $product['id'] }}"
                                                                                                            class="screen-reader-text"></span>
                                                                                                    </div>
                                                                                                    <div class="button-wishlist shown-mobile"
                                                                                                        title="Lista de deseos">
                                                                                                        <div class="yith-add-to-wishlist-button-block yith-add-to-wishlist-button-block--initialized"
                                                                                                            data-attributes="{&quot;kind&quot;:&quot;button&quot;}">
                                                                                                            <a class="yith-wcwl-add-to-wishlist-button yith-wcwl-add-to-wishlist-button--anchor wishlist-button
            {{ in_array($product['id'], array_keys(Session::get('wishlist', []))) ? 'wishlist-added' : '' }}"
                                                                                                                aria-label="Add To Wishlist: &ldquo;{{ $product['title'] }}&rdquo;"
                                                                                                                data-product-id="{{ $product['id'] }}"
                                                                                                                data-product-title="{{ $product['title'] }}"
                                                                                                                data-product-price="{{ $product['price'] }}"
                                                                                                                data-product-image="{{ asset($product['images'][0]) }}"
                                                                                                                data-product-slug="{{ $product['slug'] }}"
                                                                                                                href="#">
                                                                                                                <svg class="yith-wcwl-icon yith-wcwl-icon-svg yith-wcwl-add-to-wishlist-button-icon"
                                                                                                                    id="yith-wcwl-icon-heart-outline"
                                                                                                                    fill="{{ in_array($product['id'], array_keys(Session::get('wishlist', []))) ? 'red' : 'none' }}"
                                                                                                                    stroke-width="1.5"
                                                                                                                    stroke="currentColor"
                                                                                                                    viewBox="0 0 24 24"
                                                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                                                    <path
                                                                                                                        stroke-linecap="round"
                                                                                                                        stroke-linejoin="round"
                                                                                                                        d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z">
                                                                                                                    </path>
                                                                                                                </svg>
                                                                                                                <span
                                                                                                                    class="yith-wcwl-add-to-wishlist-button__label">
                                                                                                                    {{ in_array($product['id'], array_keys(Session::get('wishlist', []))) ? 'En la lista' : 'Añadir a favoritos' }}
                                                                                                                </span>
                                                                                                            </a>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="tbay-quick-view">
                                                                                                        <a href="#"
                                                                                                            class="qview-button"
                                                                                                            title="Vista rápida"
                                                                                                            data-effect="mfp-move-from-top"
                                                                                                            data-product-id="{{ $product['id'] }}">
                                                                                                            <i
                                                                                                                class="tb-icon tb-icon-eye"></i>
                                                                                                            <span>Vista
                                                                                                                rápida</span>
                                                                                                        </a>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>

                                                                                            <span class="onsale"><span
                                                                                                    class="saled">Oferta</span></span>

                                                                                            <div class="caption">
                                                                                                <span class="price">
                                                                                                    <del
                                                                                                        aria-hidden="true">
                                                                                                        <span
                                                                                                            class="woocommerce-Price-amount amount">
                                                                                                            <bdi>{{ \App\Support\Money::format($product['old_price']) }}&nbsp;<span
                                                                                                                    class="woocommerce-Price-currencySymbol">&euro;</span></bdi>
                                                                                                        </span>
                                                                                                    </del>
                                                                                                    <span
                                                                                                        class="screen-reader-text">El
                                                                                                        precio original era:
                                                                                                        {{ \App\Support\Money::format($product['old_price']) }}&nbsp;&euro;.</span>
                                                                                                    <ins
                                                                                                        aria-hidden="true">
                                                                                                        <span
                                                                                                            class="woocommerce-Price-amount amount">
                                                                                                            <bdi>{{ \App\Support\Money::format($product['price']) }}&nbsp;<span
                                                                                                                    class="woocommerce-Price-currencySymbol">&euro;</span></bdi>
                                                                                                        </span>
                                                                                                    </ins>
                                                                                                    <span
                                                                                                        class="screen-reader-text">El
                                                                                                        precio actual es:
                                                                                                        {{ \App\Support\Money::format($product['price']) }}&nbsp;&euro;.</span>
                                                                                                    <small
                                                                                                        class="woocommerce-price-suffix">IVA
                                                                                                        incluido</small>
                                                                                                </span>

                                                                                                <h3 class="name">
                                                                                                    <a
                                                                                                        href="{{ route('product.show', ['slug' => $product['slug']]) }}">{{ $product['title'] }}</a>
                                                                                                </h3>

                                                                                                <div class="group-content">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        @endforeach

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="elementor-element elementor-element-6f53353 elementor-align-center elementor-widget elementor-widget-button"
                                                    data-id="6f53353" data-element_type="widget"
                                                    data-widget_type="button.default">
                                                    <a class="elementor-button elementor-button-link elementor-size-sm"
                                                        href="{{ route('category', ['category' => 'calderas-de-lena']) }}">
                                                        <span class="elementor-button-content-wrapper">
                                                            <span class="elementor-button-text">Ver todo</span>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>


                                <section
                                    class="elementor-section elementor-top-section elementor-element elementor-element-cbfc30e elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                    data-id="cbfc30e" data-element_type="section"
                                    data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
                                    <div class="elementor-container elementor-column-gap-default">
                                        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-104d36d"
                                            data-id="104d36d" data-element_type="column">
                                            <div class="elementor-widget-wrap elementor-element-populated">
                                                <div class="elementor-element elementor-element-1d0cd78 elementor-product-v1 heading-tab-style-block elementor-widget elementor-widget-tbay-product-tabs"
                                                    data-id="1d0cd78" data-element_type="widget"
                                                    data-widget_type="tbay-product-tabs.default">
                                                    <div class="elementor-widget-container">

                                                        <div class="tbay-element tbay-element-product-tabs ajax-active">

                                                            <div class="wrapper-heading-tab">
                                                                <ul class="product-tabs-title tabs-list nav nav-tabs"
                                                                    data-atts="{&quot;categories&quot;:[&quot;a-granel&quot;],&quot;cat_operator&quot;:&quot;IN&quot;,&quot;limit&quot;:8,&quot;orderby&quot;:&quot;date&quot;,&quot;order&quot;:&quot;asc&quot;,&quot;product_style&quot;:&quot;v1&quot;,&quot;attr_row&quot;:&quot;class=\&quot;product-tabs row grid products\&quot; data-xlgdesktop=\&quot;4\&quot; data-desktop=\&quot;4\&quot; data-desktopsmall=\&quot;4\&quot; data-tablet=\&quot;3\&quot; data-landscape=\&quot;2\&quot; data-mobile=\&quot;2\&quot;&quot;}">
                                                                    <li>
                                                                        <a href="javascript:void(0)" data-bs-toggle="pill"
                                                                            data-bs-target="#best_selling-VEIMf-c11dc16"
                                                                            data-value="best_selling" class="active">A
                                                                            GRANEL</a>
                                                                    </li>
                                                                </ul>
                                                            </div>

                                                            <div class="tbay-addon-content tab-content woocommerce">
                                                                <div class="tab-pane active active-content current"
                                                                    id="best_selling-VEIMf-c11dc16">
                                                                    <div class="product-tabs row grid products product-tabs products"
                                                                        data-xlgdesktop="4" data-desktop="4"
                                                                        data-desktopsmall="4" data-tablet="3"
                                                                        data-landscape="2" data-mobile="2">

                                                                        @foreach ($granelProducts as $product)
                                                                            <div class="item">
                                                                                <div
                                                                                    class="products-grid product type-product post-{{ $product['id'] }} status-publish instock product_cat-a-granel has-post-thumbnail sale taxable shipping-taxable purchasable product-type-simple">
                                                                                    <div class="product-block grid product v1"
                                                                                        data-product-id="{{ $product['id'] }}">
                                                                                        <div class="product-content">
                                                                                            <div class="block-inner">
                                                                                                <figure class="image ">
                                                                                                    <a title="{{ html_entity_decode($product['title'], ENT_QUOTES, 'UTF-8') }}"
                                                                                                        href="{{ route('product.show', ['slug' => $product['slug']]) }}"
                                                                                                        class="product-image">
                                                                                                        <img loading="lazy"
                                                                                                            decoding="async"
                                                                                                            width="480"
                                                                                                            height="480"
                                                                                                            src="{{ asset($product['images'][0]) }}"
                                                                                                            class="@if(empty($product['hover_image'])) image-no-effect @else image-effect attachment-shop_catalog @endif"
                                                                                                            alt="{{ $product['title'] }}" />
                                                                                                        @if ($product['hover_image'])
                                                                                                            <img loading="lazy"
                                                                                                                decoding="async"
                                                                                                                width="480"
                                                                                                                height="480"
                                                                                                                src="{{ assset($product['hover_image']) }}"
                                                                                                                class="image-hover"
                                                                                                                alt="" />
                                                                                                        @endif
                                                                                                    </a>
                                                                                                </figure>

                                                                                                <div class="group-buttons">
                                                                                                    <div class="add-cart"
                                                                                                        title="Añadir">
                                                                                                        <a href="javascript:void(0);"
                                                                                                            data-product-id="{{ $product['id'] ?? '' }}"
                                                                                                            class="wp-block-button__link add_to_cart_button ajax_add_to_cart"
                                                                                                            aria-label="Añadir al carrito: &ldquo;{{ $product['title'] ?? 'Producto' }}&rdquo;">
                                                                                                            <span
                                                                                                                class="title-cart">Añadir</span>
                                                                                                            <i
                                                                                                                class="tb-icon tb-icon-bag-2"></i>
                                                                                                        </a>
                                                                                                        <span
                                                                                                            id="woocommerce_loop_add_to_cart_link_describedby_{{ $product['id'] }}"
                                                                                                            class="screen-reader-text"></span>
                                                                                                    </div>
                                                                                                    <div class="button-wishlist shown-mobile"
                                                                                                        title="Lista de deseos">
                                                                                                        <div class="yith-add-to-wishlist-button-block yith-add-to-wishlist-button-block--initialized"
                                                                                                            data-attributes="{&quot;kind&quot;:&quot;button&quot;}">
                                                                                                            <a class="yith-wcwl-add-to-wishlist-button yith-wcwl-add-to-wishlist-button--anchor wishlist-button
            {{ in_array($product['id'], array_keys(Session::get('wishlist', []))) ? 'wishlist-added' : '' }}"
                                                                                                                aria-label="Add To Wishlist: &ldquo;{{ $product['title'] }}&rdquo;"
                                                                                                                data-product-id="{{ $product['id'] }}"
                                                                                                                data-product-title="{{ $product['title'] }}"
                                                                                                                data-product-price="{{ $product['price'] }}"
                                                                                                                data-product-image="{{ asset($product['images'][0]) }}"
                                                                                                                data-product-slug="{{ $product['slug'] }}"
                                                                                                                href="#">
                                                                                                                <svg class="yith-wcwl-icon yith-wcwl-icon-svg yith-wcwl-add-to-wishlist-button-icon"
                                                                                                                    id="yith-wcwl-icon-heart-outline"
                                                                                                                    fill="{{ in_array($product['id'], array_keys(Session::get('wishlist', []))) ? 'red' : 'none' }}"
                                                                                                                    stroke-width="1.5"
                                                                                                                    stroke="currentColor"
                                                                                                                    viewBox="0 0 24 24"
                                                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                                                    <path
                                                                                                                        stroke-linecap="round"
                                                                                                                        stroke-linejoin="round"
                                                                                                                        d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z">
                                                                                                                    </path>
                                                                                                                </svg>
                                                                                                                <span
                                                                                                                    class="yith-wcwl-add-to-wishlist-button__label">
                                                                                                                    {{ in_array($product['id'], array_keys(Session::get('wishlist', []))) ? 'En la lista' : 'Añadir a favoritos' }}
                                                                                                                </span>
                                                                                                            </a>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="tbay-quick-view">
                                                                                                        <a href="#"
                                                                                                            class="qview-button"
                                                                                                            title="Vista rápida"
                                                                                                            data-effect="mfp-move-from-top"
                                                                                                            data-product-id="{{ $product['id'] }}">
                                                                                                            <i
                                                                                                                class="tb-icon tb-icon-eye"></i>
                                                                                                            <span>Vista
                                                                                                                rápida</span>
                                                                                                        </a>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>

                                                                                            <span class="onsale"><span
                                                                                                    class="saled">Oferta</span></span>

                                                                                            <div class="caption">
                                                                                                <span class="price">
                                                                                                    <del
                                                                                                        aria-hidden="true">
                                                                                                        <span
                                                                                                            class="woocommerce-Price-amount amount">
                                                                                                            <bdi>{{ \App\Support\Money::format($product['old_price']) }}&nbsp;<span
                                                                                                                    class="woocommerce-Price-currencySymbol">&euro;</span></bdi>
                                                                                                        </span>
                                                                                                    </del>
                                                                                                    <span
                                                                                                        class="screen-reader-text">El
                                                                                                        precio original era:
                                                                                                        {{ \App\Support\Money::format($product['old_price']) }}&nbsp;&euro;.</span>
                                                                                                    <ins
                                                                                                        aria-hidden="true">
                                                                                                        <span
                                                                                                            class="woocommerce-Price-amount amount">
                                                                                                            <bdi>{{ \App\Support\Money::format($product['price']) }}&nbsp;<span
                                                                                                                    class="woocommerce-Price-currencySymbol">&euro;</span></bdi>
                                                                                                        </span>
                                                                                                    </ins>
                                                                                                    <span
                                                                                                        class="screen-reader-text">El
                                                                                                        precio actual es:
                                                                                                        {{ \App\Support\Money::format($product['price']) }}&nbsp;&euro;.</span>
                                                                                                    <small
                                                                                                        class="woocommerce-price-suffix">IVA
                                                                                                        incluido</small>
                                                                                                </span>

                                                                                                <h3 class="name">
                                                                                                    <a
                                                                                                        href="{{ route('product.show', ['slug' => $product['slug']]) }}">{{ html_entity_decode($product['title'], ENT_QUOTES, 'UTF-8') }}</a>
                                                                                                </h3>

                                                                                                <div class="group-content">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        @endforeach

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="elementor-element elementor-element-e19d51d elementor-align-center elementor-widget elementor-widget-button"
                                                    data-id="e19d51d" data-element_type="widget"
                                                    data-widget_type="button.default">
                                                    <a class="elementor-button elementor-button-link elementor-size-sm"
                                                        href="{{ route('category', ['category' => 'a-granel']) }}">
                                                        <span class="elementor-button-content-wrapper">
                                                            <span class="elementor-button-text">Ver todo</span>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>


                                <section
                                    class="elementor-section elementor-top-section elementor-element elementor-element-8a52b07 elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                    data-id="8a52b07" data-element_type="section"
                                    data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
                                    <div class="elementor-container elementor-column-gap-default">
                                        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-06d766a"
                                            data-id="06d766a" data-element_type="column">
                                            <div class="elementor-widget-wrap elementor-element-populated">
                                                <div class="elementor-element elementor-element-119a993 elementor-product-v1 heading-tab-style-block elementor-widget elementor-widget-tbay-product-tabs"
                                                    data-id="119a993" data-element_type="widget"
                                                    data-widget_type="tbay-product-tabs.default">
                                                    <div class="elementor-widget-container">

                                                        <div class="tbay-element tbay-element-product-tabs ajax-active">

                                                            <div class="wrapper-heading-tab">
                                                                <ul class="product-tabs-title tabs-list nav nav-tabs"
                                                                    data-atts="{&quot;categories&quot;:[&quot;lena&quot;],&quot;cat_operator&quot;:&quot;IN&quot;,&quot;limit&quot;:8,&quot;orderby&quot;:&quot;date&quot;,&quot;order&quot;:&quot;asc&quot;,&quot;product_style&quot;:&quot;v1&quot;,&quot;attr_row&quot;:&quot;class=\&quot;product-tabs row grid products\&quot; data-xlgdesktop=\&quot;4\&quot; data-desktop=\&quot;4\&quot; data-desktopsmall=\&quot;4\&quot; data-tablet=\&quot;3\&quot; data-landscape=\&quot;2\&quot; data-mobile=\&quot;2\&quot;&quot;}">
                                                                    <li>
                                                                        <a href="javascript:void(0)" data-bs-toggle="pill"
                                                                            data-bs-target="#best_selling-2Rht9-c11dc16"
                                                                            data-value="best_selling"
                                                                            class="active">LEÑA
                                                                            PARA CHIMENEA</a>
                                                                    </li>
                                                                </ul>
                                                            </div>

                                                            <div class="tbay-addon-content tab-content woocommerce">
                                                                <div class="tab-pane active active-content current"
                                                                    id="best_selling-2Rht9-c11dc16">
                                                                    <div class="product-tabs row grid products product-tabs products"
                                                                        data-xlgdesktop="4" data-desktop="4"
                                                                        data-desktopsmall="4" data-tablet="3"
                                                                        data-landscape="2" data-mobile="2">

                                                                        @foreach ($madeiraFogoProducts as $product)
                                                                            <div class="item">
                                                                                <div
                                                                                    class="products-grid product type-product post-{{ $product['id'] }} status-publish instock product_cat-lena has-post-thumbnail sale taxable shipping-taxable purchasable product-type-simple">
                                                                                    <div class="product-block grid product v1"
                                                                                        data-product-id="{{ $product['id'] }}">
                                                                                        <div class="product-content">
                                                                                            <div class="block-inner">
                                                                                                <figure class="image ">
                                                                                                    <a title="{{ html_entity_decode($product['title'], ENT_QUOTES, 'UTF-8') }}"
                                                                                                        href="{{ route('product.show', ['slug' => $product['slug']]) }}"
                                                                                                        class="product-image">
                                                                                                        <img loading="lazy"
                                                                                                            decoding="async"
                                                                                                            width="480"
                                                                                                            height="480"
                                                                                                            src="{{ asset($product['images'][0]) }}"
                                                                                                            class="@if(empty($product['hover_image'])) image-no-effect @else image-effect attachment-shop_catalog @endif"
                                                                                                            alt="{{ $product['title'] }}" />
                                                                                                        @if ($product['hover_image'])
                                                                                                            <img loading="lazy"
                                                                                                                decoding="async"
                                                                                                                width="480"
                                                                                                                height="480"
                                                                                                                src="{{ asset($product['hover_image']) }}"
                                                                                                                class="image-hover"
                                                                                                                alt="" />
                                                                                                        @endif
                                                                                                    </a>
                                                                                                </figure>

                                                                                                <div class="group-buttons">
                                                                                                    <div class="add-cart"
                                                                                                        title="Añadir">
                                                                                                        <a href="javascript:void(0);"
                                                                                                            data-product-id="{{ $product['id'] ?? '' }}"
                                                                                                            class="wp-block-button__link add_to_cart_button ajax_add_to_cart"
                                                                                                            aria-label="Añadir al carrito: &ldquo;{{ $product['title'] ?? 'Producto' }}&rdquo;">
                                                                                                            <span
                                                                                                                class="title-cart">Añadir</span>
                                                                                                            <i
                                                                                                                class="tb-icon tb-icon-bag-2"></i>
                                                                                                        </a>
                                                                                                        <span
                                                                                                            id="woocommerce_loop_add_to_cart_link_describedby_{{ $product['id'] }}"
                                                                                                            class="screen-reader-text"></span>
                                                                                                    </div>
                                                                                                    <div class="button-wishlist shown-mobile"
                                                                                                        title="Lista de deseos">
                                                                                                        <div class="yith-add-to-wishlist-button-block yith-add-to-wishlist-button-block--initialized"
                                                                                                            data-attributes="{&quot;kind&quot;:&quot;button&quot;}">
                                                                                                            <a class="yith-wcwl-add-to-wishlist-button yith-wcwl-add-to-wishlist-button--anchor wishlist-button
            {{ in_array($product['id'], array_keys(Session::get('wishlist', []))) ? 'wishlist-added' : '' }}"
                                                                                                                aria-label="Add To Wishlist: &ldquo;{{ $product['title'] }}&rdquo;"
                                                                                                                data-product-id="{{ $product['id'] }}"
                                                                                                                data-product-title="{{ $product['title'] }}"
                                                                                                                data-product-price="{{ $product['price'] }}"
                                                                                                                data-product-image="{{ asset($product['images'][0]) }}"
                                                                                                                data-product-slug="{{ $product['slug'] }}"
                                                                                                                href="#">
                                                                                                                <svg class="yith-wcwl-icon yith-wcwl-icon-svg yith-wcwl-add-to-wishlist-button-icon"
                                                                                                                    id="yith-wcwl-icon-heart-outline"
                                                                                                                    fill="{{ in_array($product['id'], array_keys(Session::get('wishlist', []))) ? 'red' : 'none' }}"
                                                                                                                    stroke-width="1.5"
                                                                                                                    stroke="currentColor"
                                                                                                                    viewBox="0 0 24 24"
                                                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                                                    <path
                                                                                                                        stroke-linecap="round"
                                                                                                                        stroke-linejoin="round"
                                                                                                                        d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z">
                                                                                                                    </path>
                                                                                                                </svg>
                                                                                                                <span
                                                                                                                    class="yith-wcwl-add-to-wishlist-button__label">
                                                                                                                    {{ in_array($product['id'], array_keys(Session::get('wishlist', []))) ? 'En la lista' : 'Añadir a favoritos' }}
                                                                                                                </span>
                                                                                                            </a>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="tbay-quick-view">
                                                                                                        <a href="#"
                                                                                                            class="qview-button"
                                                                                                            title="Vista rápida"
                                                                                                            data-effect="mfp-move-from-top"
                                                                                                            data-product-id="{{ $product['id'] }}">
                                                                                                            <i
                                                                                                                class="tb-icon tb-icon-eye"></i>
                                                                                                            <span>Vista
                                                                                                                rápida</span>
                                                                                                        </a>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>

                                                                                            <span class="onsale"><span
                                                                                                    class="saled">Oferta</span></span>

                                                                                            <div class="caption">
                                                                                                <span class="price">
                                                                                                    <del
                                                                                                        aria-hidden="true">
                                                                                                        <span
                                                                                                            class="woocommerce-Price-amount amount">
                                                                                                            <bdi>{{ \App\Support\Money::format($product['old_price']) }}&nbsp;<span
                                                                                                                    class="woocommerce-Price-currencySymbol">&euro;</span></bdi>
                                                                                                        </span>
                                                                                                    </del>
                                                                                                    <span
                                                                                                        class="screen-reader-text">El
                                                                                                        precio original era:
                                                                                                        {{ \App\Support\Money::format($product['old_price']) }}&nbsp;&euro;.</span>
                                                                                                    <ins
                                                                                                        aria-hidden="true">
                                                                                                        <span
                                                                                                            class="woocommerce-Price-amount amount">
                                                                                                            <bdi>{{ \App\Support\Money::format($product['price']) }}&nbsp;<span
                                                                                                                    class="woocommerce-Price-currencySymbol">&euro;</span></bdi>
                                                                                                        </span>
                                                                                                    </ins>
                                                                                                    <span
                                                                                                        class="screen-reader-text">El
                                                                                                        precio actual es:
                                                                                                        {{ \App\Support\Money::format($product['price']) }}&nbsp;&euro;.</span>
                                                                                                    <small
                                                                                                        class="woocommerce-price-suffix">IVA
                                                                                                        incluido</small>
                                                                                                </span>

                                                                                                <h3 class="name">
                                                                                                    <a
                                                                                                        href="{{ route('product.show', ['slug' => $product['slug']]) }}">{{ html_entity_decode($product['title'], ENT_QUOTES, 'UTF-8') }}</a>
                                                                                                </h3>

                                                                                                <div class="group-content">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        @endforeach

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="elementor-element elementor-element-deef3b9 elementor-align-center elementor-widget elementor-widget-button"
                                                    data-id="deef3b9" data-element_type="widget"
                                                    data-widget_type="button.default">
                                                    <a class="elementor-button elementor-button-link elementor-size-sm"
                                                        href="{{ route('category', ['category' => 'lena']) }}">
                                                        <span class="elementor-button-content-wrapper">
                                                            <span class="elementor-button-text">Ver todo</span>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>


                                @if (isset($estufasPelletsProducts) && count($estufasPelletsProducts) > 0)
                                    <section class="lv-home-estufas">
                                        <div class="container">
                                            <div class="lv-home-estufas__head">
                                                <span class="lv-home-estufas__subtitle">Calefacción eficiente</span>
                                                <h2 class="lv-home-estufas__title">Estufas de pellets</h2>
                                            </div>
                                            <div class="lv-product-grid">
                                                @foreach ($estufasPelletsProducts as $estufa)
                                                    <x-product-card :product="$estufa" />
                                                @endforeach
                                            </div>
                                            <div class="lv-home-estufas__cta">
                                                <a class="lv-btn lv-btn--primary"
                                                    href="{{ route('category', ['category' => 'estufas-de-pellets']) }}">Ver
                                                    todas las estufas de pellets</a>
                                            </div>
                                        </div>
                                    </section>
                                @endif


                                {{-- Avis clients masqués à la demande du client --}}
                                {{-- @include('section.avant-footer') --}}
                            </div>
                        </div>

                    </div>
                </div>
            </section>

        </div>

    </div>

    <section class="lv-seo-home">
        <div class="container">
            <h1 class="lv-seo-home__h1">Leña y pellets a domicilio en España</h1>
            <p class="lv-seo-home__lead">
                En <strong>Casacuberta Trias S.L.</strong> somos especialistas en la venta online de <strong>leña</strong>,
                <strong>leña de encina</strong>, <strong>leña seca</strong> para chimenea y estufa,
                <strong>pellets de madera</strong> certificados y <strong>madera densificada</strong>.
                También ofrecemos estufas de leña, cocinas de leña, calderas de leña y estufas de pellets.
                Compra leña barata de calidad y recíbela cómodamente con <strong>entrega a domicilio</strong>.
            </p>

            <h2>Compra leña de calidad para chimenea y estufa</h2>
            <p>
                Nuestra leña está <strong>seca y lista para arder</strong>: baja humedad, alto poder calorífico
                y una combustión limpia con menos humo y menos residuos. Es ideal tanto para
                <a href="{{ route('category', ['category' => 'lena']) }}">leña para chimenea</a> como para
                leña para estufa, y también para cocinas y calderas de leña.
            </p>

            <h2>Tipos de leña disponibles</h2>
            <ul>
                <li><a href="{{ route('category', ['category' => 'lena']) }}">Leña de encina seca</a>: la más demandada por su densidad y su larga duración de brasa.</li>
                <li>Leña seca de maderas duras, cortada en tamaños aptos para chimeneas y estufas.</li>
                <li><a href="{{ route('category', ['category' => 'madera-densificada']) }}">Madera densificada</a>: briquetas y troncos compactados de alto rendimiento y baja humedad.</li>
            </ul>

            <h2>Pellets de madera</h2>
            <p>
                Vendemos <a href="{{ route('category', ['category' => 'pellets-de-madera']) }}">pellets de madera</a>
                certificados para estufas y calderas de biomasa, con alto poder calorífico y bajo nivel de cenizas.
                Disponibles por saco y por palé, con <strong>pellets a domicilio</strong> en toda España.
                Descubre también nuestras
                <a href="{{ route('category', ['category' => 'estufas-de-pellets']) }}">estufas de pellets</a>,
                <a href="{{ route('category', ['category' => 'cocinas-de-lena']) }}">cocinas de leña</a> y
                <a href="{{ route('category', ['category' => 'calderas-de-lena']) }}">calderas de leña</a>.
            </p>

            <h2>Leña y pellets con entrega a domicilio</h2>
            <p>
                Realizamos <strong>entrega a domicilio</strong> de leña y pellets en España. Preparamos cada pedido
                y lo enviamos en 2-4 días laborables. Si tienes dudas sobre la cobertura de reparto en tu zona,
                <a href="{{ route('contacto') }}">contáctanos</a> antes de comprar y te confirmamos plazos y condiciones.
            </p>

            <h2>¿Por qué comprar en Casacuberta Trias S.L.?</h2>
            <ul>
                <li>Especialistas en leña, pellets y calefacción con biomasa.</li>
                <li>Leña seca de alto poder calorífico y pellets certificados.</li>
                <li>Entrega a domicilio y atención al cliente por teléfono, email y WhatsApp.</li>
                <li>Compra online con pago seguro.</li>
            </ul>

            <h2>Preguntas frecuentes sobre la leña y los pellets</h2>
            <div class="lv-seo-home__faq">
                <details>
                    <summary>¿Dónde comprar leña a domicilio?</summary>
                    <p>Puedes comprar leña a domicilio online en Casacuberta Trias S.L. Añade los productos al carrito, finaliza la compra e indícanos tu dirección de entrega en España.</p>
                </details>
                <details>
                    <summary>¿Qué tipo de leña es mejor para una chimenea?</summary>
                    <p>Las maderas duras como la encina son las más recomendables: arden despacio, generan mucha brasa y aportan calor durante más tiempo. Siempre debe usarse leña seca.</p>
                </details>
                <details>
                    <summary>¿La leña de encina está seca?</summary>
                    <p>Sí. Nuestra leña de encina se comercializa seca y lista para usar, con baja humedad para una combustión eficiente y limpia.</p>
                </details>
                <details>
                    <summary>¿Qué tamaño de leña necesito para mi estufa?</summary>
                    <p>Depende de la cámara de combustión de tu estufa. Consulta la longitud indicada en cada ficha de producto y, si tienes dudas, escríbenos y te asesoramos.</p>
                </details>
                <details>
                    <summary>¿Cuánto tarda la entrega de la leña?</summary>
                    <p>Preparamos y enviamos los pedidos normalmente en 2-4 días laborables. El plazo final depende de la zona de entrega.</p>
                </details>
                <details>
                    <summary>¿Cuál es la diferencia entre leña y pellets?</summary>
                    <p>La leña son troncos de madera natural para chimeneas, estufas y calderas de leña. Los pellets son cilindros de serrín prensado para estufas y calderas de pellets, con dosificación automática y almacenamiento más cómodo.</p>
                </details>
            </div>
        </div>
    </section>

    @include('layouts.partials.footer.public')

@endsection

@push('head')
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'FAQPage',
    'mainEntity' => collect([
        ['¿Dónde comprar leña a domicilio?', 'Puedes comprar leña a domicilio online en Casacuberta Trias S.L. Añade los productos al carrito, finaliza la compra e indícanos tu dirección de entrega en España.'],
        ['¿Qué tipo de leña es mejor para una chimenea?', 'Las maderas duras como la encina son las más recomendables: arden despacio, generan mucha brasa y aportan calor durante más tiempo. Siempre debe usarse leña seca.'],
        ['¿La leña de encina está seca?', 'Sí. Nuestra leña de encina se comercializa seca y lista para usar, con baja humedad para una combustión eficiente y limpia.'],
        ['¿Qué tamaño de leña necesito para mi estufa?', 'Depende de la cámara de combustión de tu estufa. Consulta la longitud indicada en cada ficha de producto y, si tienes dudas, escríbenos y te asesoramos.'],
        ['¿Cuánto tarda la entrega de la leña?', 'Preparamos y enviamos los pedidos normalmente en 2-4 días laborables. El plazo final depende de la zona de entrega.'],
        ['¿Cuál es la diferencia entre leña y pellets?', 'La leña son troncos de madera natural para chimeneas, estufas y calderas de leña. Los pellets son cilindros de serrín prensado para estufas y calderas de pellets, con dosificación automática y almacenamiento más cómodo.'],
    ])->map(fn ($q) => [
        '@type' => 'Question',
        'name' => $q[0],
        'acceptedAnswer' => ['@type' => 'Answer', 'text' => $q[1]],
    ])->all(),
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
</script>
@endpush

@push('styles')
<style>
    .lv-seo-home { padding: 48px 0; background: #fafafa; border-top: 1px solid #ececec; }
    .lv-seo-home .container { max-width: 1000px; margin: 0 auto; padding: 0 20px; }
    .lv-seo-home__h1 { font-size: 1.9rem; line-height: 1.25; margin: 0 0 16px; }
    .lv-seo-home__lead { font-size: 1.05rem; }
    .lv-seo-home h2 { font-size: 1.3rem; margin: 32px 0 10px; }
    .lv-seo-home p, .lv-seo-home li { line-height: 1.7; color: #333; }
    .lv-seo-home a { color: #F55F1E; text-decoration: underline; }
    .lv-seo-home__faq details { border-bottom: 1px solid #e2e2e2; padding: 12px 0; }
    .lv-seo-home__faq summary { cursor: pointer; font-weight: 600; }
    .lv-seo-home__faq details p { margin: 10px 0 0; }
    @media (max-width: 600px) { .lv-seo-home__h1 { font-size: 1.5rem; } }
</style>
@endpush

@push('scripts')
    @include('section.modeldetail');
@endpush
