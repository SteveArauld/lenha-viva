@php
    $lvCategories = [];
    if (config()->has('loja_products')) {
        $lvAllProducts = collect(config('loja_products'));
        $lvCategoryCounts = $lvAllProducts->groupBy('category')->map->count();
        $lvCategories = $lvAllProducts
            ->pluck('category')
            ->unique()
            ->mapWithKeys(function ($slug) use ($lvCategoryCounts) {
                return [
                    $slug => [
                        'name' => ucwords(str_replace('-', ' ', $slug)),
                        'count' => $lvCategoryCounts[$slug] ?? 0,
                    ],
                ];
            })
            ->sortBy('name')
            ->toArray();
    }
@endphp

<header class="lv-navbar" id="lv-navbar">
    <div class="lv-navbar__topbar">
        <div class="lv-container lv-navbar__topbar-inner">
            <span class="lv-navbar__topbar-item">🚚 Envio grátis para Espanha e Europa</span>
            <a href="tel:+34683573516" class="lv-navbar__topbar-item lv-navbar__topbar-link">📞 +34 683 5735 16</a>
        </div>
    </div>

    <div class="lv-navbar__main">
        <div class="lv-container lv-navbar__main-inner">
            <button type="button" class="lv-navbar__burger" data-bs-toggle="offcanvas"
                data-bs-target="#lvMobileMenu" aria-controls="lvMobileMenu" aria-label="Abrir menu">
                <span></span><span></span><span></span>
            </button>

            <a href="{{ route('home') }}" class="lv-navbar__logo">
                <img src="{{ asset('wp-content/uploads/2022/01/er-01-scaled.png') }}" alt="Lenha Viva" width="44"
                    height="44" loading="eager">
                <span>Lenha Viva</span>
            </a>

            <nav class="lv-navbar__nav">
                <a href="{{ route('home') }}"
                    class="lv-navbar__link {{ request()->routeIs('home') ? 'is-active' : '' }}">
                    <i class="tb-icon tb-icon-home3"></i>
                    <span>Início</span>
                </a>
                <a href="{{ route('loja') }}"
                    class="lv-navbar__link {{ request()->routeIs('loja') ? 'is-active' : '' }}">
                    <i class="tb-icon tb-icon-store"></i>
                    <span>Loja</span>
                </a>

                <div class="lv-navbar__dropdown dropdown">
                    <button type="button" class="lv-navbar__link lv-navbar__dropdown-toggle"
                        data-bs-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
                        <i class="tb-icon tb-icon-grid"></i>
                        <span>Categorias</span>
                        <svg class="lv-navbar__chevron" width="10" height="6" viewBox="0 0 10 6" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1L5 5L9 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </button>
                    <div class="dropdown-menu lv-navbar__dropdown-menu">
                        @forelse($lvCategories as $categorySlug => $categoryData)
                            <a class="dropdown-item lv-navbar__dropdown-item"
                                href="{{ route('category', ['category' => $categorySlug]) }}">
                                <span>{{ $categoryData['name'] }}</span>
                                <span class="lv-navbar__dropdown-count">{{ $categoryData['count'] }}</span>
                            </a>
                        @empty
                            <span class="dropdown-item lv-navbar__dropdown-item text-muted">Sem categorias</span>
                        @endforelse
                    </div>
                </div>

                <a href="{{ route('sobre-nos') }}"
                    class="lv-navbar__link {{ request()->routeIs('sobre-nos') ? 'is-active' : '' }}">
                    <i class="tb-icon tb-icon-info"></i>
                    <span>Sobre nós</span>
                </a>
                <a href="{{ route('contacto') }}"
                    class="lv-navbar__link {{ request()->routeIs('contacto') ? 'is-active' : '' }}">
                    <i class="tb-icon tb-icon-envelope"></i>
                    <span>Contacto</span>
                </a>
            </nav>

            <form action="{{ route('loja') }}" method="get" class="lv-navbar__search">
                <select name="product_cat" class="lv-navbar__search-select" aria-label="Categoria de produtos">
                    <option value="" {{ !request('product_cat') ? 'selected' : '' }}>Todas as categorias</option>
                    @foreach ($lvCategories as $categorySlug => $categoryData)
                        <option value="{{ $categorySlug }}"
                            {{ request('product_cat') == $categorySlug ? 'selected' : '' }}>
                            {{ $categoryData['name'] }} ({{ $categoryData['count'] }})
                        </option>
                    @endforeach
                </select>
                <input type="text" name="s" value="{{ request('s') }}" minlength="2" required
                    placeholder="Pesquisar produtos..." class="lv-navbar__search-input"
                    oninvalid="this.setCustomValidity('Introduza pelo menos 2 caracteres')"
                    oninput="this.setCustomValidity('')">
                <input type="hidden" name="post_type" value="product">
                @if (request('min_price'))
                    <input type="hidden" name="min_price" value="{{ request('min_price') }}">
                @endif
                @if (request('max_price'))
                    <input type="hidden" name="max_price" value="{{ request('max_price') }}">
                @endif
                @if (request('stock'))
                    <input type="hidden" name="stock" value="{{ request('stock') }}">
                @endif
                @if (request('orderby'))
                    <input type="hidden" name="orderby" value="{{ request('orderby') }}">
                @endif
                <button type="submit" class="lv-navbar__search-btn" aria-label="Pesquisar">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M11 19C15.4183 19 19 15.4183 19 11C19 6.58172 15.4183 3 11 3C6.58172 3 3 6.58172 3 11C3 15.4183 6.58172 19 11 19Z"
                            stroke="currentColor" stroke-width="2" />
                        <path d="M21 21L16.65 16.65" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                    </svg>
                </button>
            </form>

            <div class="lv-navbar__actions">
                <a href="{{ route('wishlist.index') }}" class="lv-navbar__icon-btn" title="Lista de desejos"
                    aria-label="Lista de desejos">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M12.001 19.6935L11.0129 18.7961C7.55236 15.6541 5.25098 13.5651 5.25098 10.9814C5.25098 8.89239 6.87611 7.25 8.94824 7.25C10.1268 7.25 11.2603 7.80243 12.001 8.66634C12.7417 7.80243 13.8752 7.25 15.0537 7.25C17.1259 7.25 18.751 8.89239 18.751 10.9814C18.751 13.5651 16.4496 15.6541 12.9891 18.7998L12.001 19.6935Z"
                            stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                    </svg>
                    <span class="lv-badge wishlist-count">0</span>
                </a>

                <button type="button" class="lv-navbar__icon-btn lv-navbar__cart-btn" title="Carrinho" aria-label="Carrinho"
                    data-bs-toggle="offcanvas" data-bs-target="#cart-offcanvas-mobile"
                    aria-controls="cart-offcanvas-mobile">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6 8H18L17 21H7L6 8Z" stroke="currentColor" stroke-width="1.5"
                            stroke-linejoin="round" />
                        <path d="M9 8V6C9 4.34315 10.3431 3 12 3C13.6569 3 15 4.34315 15 6V8" stroke="currentColor"
                            stroke-width="1.5" stroke-linecap="round" />
                    </svg>
                    <span class="lv-badge mini-cart-items">0</span>
                </button>
            </div>
        </div>
    </div>
</header>

{{-- Mobile navigation drawer --}}
<div class="offcanvas offcanvas-start lv-drawer" tabindex="-1" id="lvMobileMenu" aria-labelledby="lvMobileMenuLabel">
    <div class="offcanvas-header lv-drawer__header">
        <a href="{{ route('home') }}" class="lv-navbar__logo" id="lvMobileMenuLabel">
            <img src="{{ asset('wp-content/uploads/2022/01/er-01-scaled.png') }}" alt="Lenha Viva" width="38"
                height="38">
            <span>Lenha Viva</span>
        </a>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Fechar"></button>
    </div>
    <div class="offcanvas-body lv-drawer__body">
        <form action="{{ route('loja') }}" method="get" class="lv-mobile-search">
            <input type="text" name="s" value="{{ request('s') }}" minlength="2" required
                placeholder="Pesquisar produtos..." class="lv-navbar__search-input">
            <input type="hidden" name="post_type" value="product">
            <button type="submit" class="lv-navbar__search-btn" aria-label="Pesquisar">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M11 19C15.4183 19 19 15.4183 19 11C19 6.58172 15.4183 3 11 3C6.58172 3 3 6.58172 3 11C3 15.4183 6.58172 19 11 19Z"
                        stroke="currentColor" stroke-width="2" />
                    <path d="M21 21L16.65 16.65" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                </svg>
            </button>
        </form>

        <nav class="lv-mobile-nav">
            <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'is-active' : '' }}">Início</a>
            <a href="{{ route('loja') }}" class="{{ request()->routeIs('loja') ? 'is-active' : '' }}">Loja</a>
            <a href="{{ route('sobre-nos') }}"
                class="{{ request()->routeIs('sobre-nos') ? 'is-active' : '' }}">Sobre nós</a>
            <a href="{{ route('contacto') }}"
                class="{{ request()->routeIs('contacto') ? 'is-active' : '' }}">Contacto</a>
            <a href="{{ route('wishlist.index') }}">Lista de desejos <span
                    class="lv-badge wishlist-count">0</span></a>
            <a href="{{ route('carrinho') }}">Carrinho <span class="lv-badge mini-cart-items">0</span></a>
        </nav>

        <div class="lv-mobile-categories">
            <h3>Categorias</h3>
            @forelse($lvCategories as $categorySlug => $categoryData)
                <a href="{{ route('category', ['category' => $categorySlug]) }}">
                    <span>{{ $categoryData['name'] }}</span>
                    <span class="lv-navbar__dropdown-count">{{ $categoryData['count'] }}</span>
                </a>
            @empty
                <p class="text-muted">Sem categorias</p>
            @endforelse
        </div>
    </div>
</div>

{{-- Cart drawer (id kept as 'cart-offcanvas-mobile' for compatibility with existing cart AJAX scripts) --}}
<div class="offcanvas offcanvas-end lv-drawer lv-cart-drawer" tabindex="-1" id="cart-offcanvas-mobile"
    aria-labelledby="lvCartDrawerLabel">
    <div class="offcanvas-header lv-drawer__header">
        <h3 class="offcanvas-title lv-drawer__title" id="lvCartDrawerLabel">Carrinho de compras</h3>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Fechar"></button>
    </div>
    <div class="offcanvas-body widget_shopping_cart_content">
        <div class="mini_cart_content">
            <div class="mini_cart_inner">
                <p class="lv-cart-loading">A carregar carrinho...</p>
            </div>
        </div>
    </div>
</div>
