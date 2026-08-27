@extends('layouts.app')

@section('title', __($product['title'] . ' - ' . $product['category']))

@section('content')
    @include('layouts.partials.navbar.public-show')

    <div class="lv-product">
        <div class="lv-container">

            <div class="lv-product__breadcrumb">
                <a href="{{ route('home') }}">Inicio</a>
                &rsaquo;
                <a href="{{ route('category', ['category' => $product['category']]) }}">{{ \App\Support\CategoryLabels::label($product['category']) }}</a>
                @if($prevProduct || $nextProduct)
                    <span style="float:right;">
                        @if($prevProduct)
                            <a href="{{ route('product.show', $prevProduct['slug']) }}">&laquo; Anterior</a>
                        @endif
                        @if($prevProduct && $nextProduct) &nbsp;|&nbsp; @endif
                        @if($nextProduct)
                            <a href="{{ route('product.show', $nextProduct['slug']) }}">Siguiente &raquo;</a>
                        @endif
                    </span>
                @endif
            </div>

            <div class="lv-product__layout">

                {{-- Gallery --}}
                <div class="lv-gallery">
                    <div class="lv-gallery__main">
                        @if(count($product['images']) > 1)
                            <button type="button" class="lv-gallery__arrow lv-gallery__arrow--prev" aria-label="Imagen anterior">
                                <i class="tb-icon tb-icon-angle-left"></i>
                            </button>
                        @endif
                        <img id="lv-gallery-main-img" src="{{ asset($product['images'][0]) }}" alt="{{ $product['title'] }}">
                        @if(count($product['images']) > 1)
                            <button type="button" class="lv-gallery__arrow lv-gallery__arrow--next" aria-label="Imagen siguiente">
                                <i class="tb-icon tb-icon-angle-right"></i>
                            </button>
                        @endif
                    </div>
                    @if(count($product['images']) > 1)
                        <div class="lv-gallery__thumbs">
                            @foreach($product['images'] as $index => $image)
                                <button type="button" class="lv-gallery__thumb {{ $index === 0 ? 'is-active' : '' }}" data-src="{{ asset($image) }}">
                                    <img src="{{ asset($image) }}" alt="{{ $product['title'] }} - {{ $index + 1 }}">
                                </button>
                            @endforeach
                        </div>
                    @endif
                </div>

                {{-- Info panel --}}
                <div class="lv-product__info">
                    <h1 class="lv-product__title">{{ $product['title'] }}</h1>

                    <div class="lv-product__price-row">
                        @if($product['old_price'] && floatval(str_replace(',', '', $product['old_price'])) > floatval(str_replace(',', '', $product['price'])))
                            <span class="lv-product__price-old">{{ $product['old_price'] }} €</span>
                        @endif
                        <span class="lv-product__price">{{ $product['price'] }} €</span>
                        <span class="lv-product__price-note">(IVA incluido)</span>
                    </div>

                    <div class="lv-product__stock {{ $product['in_stock'] ? 'lv-product__stock--in' : 'lv-product__stock--out' }}">
                        <i class="tb-icon {{ $product['in_stock'] ? 'tb-icon-check-circle' : 'tb-icon-close-01' }}"></i>
                        {{ $product['in_stock'] ? 'En stock - Listo para enviar' : 'Agotado' }}
                    </div>

                    <ul class="lv-product__benefits">
                        <li><i class="tb-icon tb-icon-check-circle"></i> Envío gratis a España y Europa</li>
                        <li><i class="tb-icon tb-icon-check-circle"></i> Pago seguro por transferencia bancaria</li>
                        <li><i class="tb-icon tb-icon-check-circle"></i> Devolución en un plazo de 14 días</li>
                    </ul>

                    @if(!empty($product['short_description']))
                        <p class="lv-product__desc">{{ $product['short_description'] }}</p>
                    @endif

                    <form class="cart" action="{{ route('cart.add') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product['id'] }}">

                        <div class="lv-product__actions">
                            <div class="lv-product__qty">
                                <label class="screen-reader-text" for="quantity_{{ $product['id'] }}">Cantidad de {{ $product['title'] }}</label>
                                <div class="quantity-selector" style="display:flex; align-items:stretch; width:100%;">
                                    <button type="button" class="quantity-m">&minus;</button>
                                    <input type="number" id="quantity_{{ $product['id'] }}" class="quantity-add" value="1" aria-label="Cantidad del producto">
                                    <button type="button" class="quantity-p">&plus;</button>
                                </div>
                            </div>

                            <a href="javascript:void(0);" name="add-to-cart"
                               data-product-id="{{ $product['id'] ?? '' }}"
                               aria-label="Añadir al carrito: &ldquo;{{ $product['title'] ?? 'Producto' }}&rdquo;"
                               class="lv-btn lv-btn--primary lv-product__cta single_add_to_cart_button ajax_add_to_cart {{ !$product['in_stock'] ? 'disabled' : '' }}"
                               {{ !$product['in_stock'] ? 'disabled' : '' }}>
                                {{ $product['in_stock'] ? 'Añadir al carrito' : 'Agotado' }}
                            </a>

                            <button type="button"
                               class="lv-product__wishlist-btn wishlist-button {{ in_array($product['id'], array_keys(Session::get('wishlist', []))) ? 'wishlist-added' : '' }}"
                               data-product-id="{{ $product['id'] }}"
                               data-product-title="{{ $product['title'] }}"
                               data-product-price="{{ $product['price'] }}"
                               data-product-image="{{ asset($product['images'][0]) }}"
                               data-product-slug="{{ $product['slug'] }}"
                               aria-label="Añadir a la lista de deseos">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="{{ in_array($product['id'], array_keys(Session::get('wishlist', []))) ? 'currentColor' : 'none' }}" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z"></path>
                                </svg>
                                <span class="yith-wcwl-add-to-wishlist-button__label screen-reader-text">{{ in_array($product['id'], array_keys(Session::get('wishlist', []))) ? 'En la lista' : 'Añadir a la lista de deseos' }}</span>
                            </button>
                        </div>
                    </form>

                    @if($product['in_stock'])
                        <a href="javascript:void(0);" class="lv-btn lv-btn--ghost lv-product__buy-now" id="lv-buy-now">Comprar ahora</a>
                    @endif

                    <div class="lv-product__meta">
                        <span><strong>REF:</strong> {{ $product['ref'] }}</span>
                        <span><strong>Categoría:</strong> <a href="{{ route('category', ['category' => $product['category']]) }}">{{ \App\Support\CategoryLabels::label($product['category']) }}</a></span>
                        @if(!empty($product['color']))
                            <span><strong>Color:</strong> {{ $product['color'] }}</span>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Specs table --}}
            <div class="lv-product__section">
                <h2 class="lv-product__section-title">Especificaciones técnicas</h2>
                <div class="lv-product__section-rule"></div>
                <table class="lv-specs">
                    <tr>
                        <th>Referencia</th>
                        <td>{{ $product['ref'] }}</td>
                    </tr>
                    <tr>
                        <th>Categoría</th>
                        <td>{{ \App\Support\CategoryLabels::label($product['category']) }}</td>
                    </tr>
                    @if(!empty($product['color']))
                        <tr>
                            <th>Color</th>
                            <td>{{ $product['color'] }}</td>
                        </tr>
                    @endif
                    <tr>
                        <th>Disponibilidad</th>
                        <td>{{ $product['in_stock'] ? 'En stock' : 'Agotado' }}</td>
                    </tr>
                </table>
            </div>

            {{-- Full description --}}
            @if(!empty($product['description']))
                <div class="lv-product__description">
                    {!! nl2br(e($product['description'])) !!}
                </div>
            @endif

            {{-- Related products --}}
            @if($relatedProducts->count() > 0)
                <div class="lv-related">
                    <h2 class="lv-related__title">Productos relacionados</h2>
                    <div class="products-grid">
                        @foreach($relatedProducts as $relatedProduct)
                            <div class="item">
                                <figure>
                                    <a href="{{ route('product.show', $relatedProduct['slug']) }}">
                                        <img src="{{ asset($relatedProduct['images'][0]) }}" alt="{{ $relatedProduct['title'] ?? '' }}" loading="lazy">
                                    </a>
                                </figure>
                                <div class="caption">
                                    <span class="price">
                                        @if (!empty($relatedProduct['old_price']) && (float) str_replace(',', '', $relatedProduct['old_price']) > (float) str_replace(',', '', $relatedProduct['price']))
                                            <del aria-hidden="true">{{ $relatedProduct['old_price'] }}&nbsp;&euro;</del>
                                        @endif
                                        {{ $relatedProduct['price'] }}&nbsp;&euro;
                                    </span>
                                    <h3 class="name">
                                        <a href="{{ route('product.show', $relatedProduct['slug']) }}">{{ $relatedProduct['title'] }}</a>
                                    </h3>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

        </div>
    </div>

    @include('layouts.partials.footer.public')
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Quantity selector
            const selector = document.querySelector('.quantity-selector');
            if (selector) {
                const input = selector.querySelector('.quantity-add');
                const minusBtn = selector.querySelector('.quantity-m');
                const plusBtn = selector.querySelector('.quantity-p');

                plusBtn.addEventListener('click', function () {
                    let value = parseInt(input.value, 10) || 1;
                    input.value = value + 1;
                });

                minusBtn.addEventListener('click', function () {
                    let value = parseInt(input.value, 10) || 1;
                    input.value = value > 1 ? value - 1 : 1;
                });

                input.addEventListener('input', function () {
                    let value = parseInt(input.value, 10);
                    if (isNaN(value) || value < 1) {
                        input.value = 1;
                    }
                });
            }

            // Gallery: thumbnail click + prev/next arrows
            const mainImg = document.getElementById('lv-gallery-main-img');
            const thumbs = document.querySelectorAll('.lv-gallery__thumb');
            let currentIndex = 0;

            function setActiveImage(index) {
                if (!thumbs.length) return;
                index = (index + thumbs.length) % thumbs.length;
                currentIndex = index;
                const thumb = thumbs[index];
                mainImg.src = thumb.dataset.src;
                thumbs.forEach(t => t.classList.remove('is-active'));
                thumb.classList.add('is-active');
            }

            thumbs.forEach((thumb, index) => {
                thumb.addEventListener('click', () => setActiveImage(index));
            });

            const prevArrow = document.querySelector('.lv-gallery__arrow--prev');
            const nextArrow = document.querySelector('.lv-gallery__arrow--next');
            if (prevArrow) prevArrow.addEventListener('click', () => setActiveImage(currentIndex - 1));
            if (nextArrow) nextArrow.addEventListener('click', () => setActiveImage(currentIndex + 1));

            // Buy now: add to cart then redirect to checkout
            const buyNowBtn = document.getElementById('lv-buy-now');
            if (buyNowBtn) {
                buyNowBtn.addEventListener('click', function () {
                    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
                    const quantity = document.querySelector('.quantity-add')?.value || 1;
                    buyNowBtn.textContent = 'Procesando...';

                    fetch("{{ route('cart.add') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': csrfToken
                        },
                        body: JSON.stringify({
                            product_id: '{{ $product['id'] }}',
                            quantity: quantity
                        })
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                window.location.href = "{{ route('checkout') }}";
                            } else {
                                buyNowBtn.textContent = 'Comprar ahora';
                                alert(data.message || 'No se ha podido añadir el producto al carrito.');
                            }
                        })
                        .catch(() => {
                            buyNowBtn.textContent = 'Comprar ahora';
                            alert('Error de conexión.');
                        });
                });
            }
        });
    </script>
@endpush
