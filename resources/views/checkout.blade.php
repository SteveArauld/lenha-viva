@extends('layouts.app')

@section('title', __('Finalización de compra'))

@section('content')
    @include('layouts.partials.navbar.public-show')

    <div id="tbay-main-content" class="mm-page mm-slideout lv-checkout">
        <div class="lv-checkout__intro">
            <div class="lv-container">
                <h1 class="lv-checkout__intro-title">Finalización de compra</h1>
            </div>
        </div>

        <div class="lv-container lv-checkout__body">

            @if (session('success'))
                <div class="lv-alert lv-alert--success">{{ session('success') }}</div>
            @endif

            @if (session('error'))
                <div class="lv-alert lv-alert--error">{{ session('error') }}</div>
            @endif

            @if ($errors->any())
                <div class="lv-alert lv-alert--error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if ($isEmpty)
                <div class="lv-checkout__empty">
                    <h2>Tu carrito está vacío</h2>
                    <p>Añade productos a tu carrito antes de finalizar la compra.</p>
                    <a href="{{ route('home') }}" class="lv-btn lv-btn--primary">Seguir comprando</a>
                </div>
            @else
                <form method="POST" action="{{ route('checkout.store') }}" id="checkout-form"
                    class="lv-checkout__grid" aria-label="Finalizar compra">
                    @csrf

                    <input type="hidden" name="shipping_method" id="shipping_method" value="free_shipping:3">
                    <input type="hidden" name="payment_method" id="payment_method" value="bacs">
                    <input type="hidden" name="order_notes" id="order_notes">

                    <div class="lv-checkout__main">

                        <section class="lv-card" id="contact-fields">
                            <h2 class="lv-card__title"><span class="lv-step-num">1</span> Información de contacto</h2>
                            <p class="lv-card__desc">Usaremos este email para enviarte los detalles y actualizaciones de
                                tu pedido.</p>
                            <div class="lv-field">
                                <label for="email">Dirección de email</label>
                                <input type="email" id="email" name="email" autocomplete="email"
                                    class="lv-input @error('email') is-invalid @enderror"
                                    value="{{ old('email') }}" @error('email') aria-describedby="email-error" @enderror required>
                                @error('email')
                                    <span class="lv-field-error" id="email-error">{{ $message }}</span>
                                @enderror
                            </div>
                            <p class="lv-card__note">Estás finalizando el pedido como invitado.</p>
                        </section>

                        <section class="lv-card" id="shipping-fields">
                            <h2 class="lv-card__title"><span class="lv-step-num">2</span> Dirección de envío</h2>
                            <p class="lv-card__desc">Introduce la dirección donde deseas que se entregue tu pedido.</p>

                            <div class="lv-field-grid">
                                <div class="lv-field lv-field--full">
                                    <label for="shipping-country">País/Región</label>
                                    <select id="shipping-country" name="shipping-country" autocomplete="country"
                                        class="lv-input lv-select @error('shipping-country') is-invalid @enderror"
                                        @error('shipping-country') aria-describedby="shipping-country-error" @enderror
                                        required>
                                        <option value="" disabled {{ old('shipping-country') ? '' : 'selected' }}>
                                            Selecciona un país/región</option>
                                        @foreach ($pays as $code => $nom)
                                            <option value="{{ $code }}"
                                                {{ old('shipping-country') == $code ? 'selected' : '' }}>{{ $nom }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('shipping-country')
                                        <span class="lv-field-error" id="shipping-country-error">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="lv-field">
                                    <label for="shipping-first_name">Nombre</label>
                                    <input type="text" id="shipping-first_name" name="shipping-first_name"
                                        autocomplete="given-name"
                                        class="lv-input @error('shipping-first_name') is-invalid @enderror"
                                        value="{{ old('shipping-first_name') }}" @error('shipping-first_name') aria-describedby="shipping-first_name-error" @enderror required>
                                    @error('shipping-first_name')
                                        <span class="lv-field-error" id="shipping-first_name-error">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="lv-field">
                                    <label for="shipping-last_name">Apellidos</label>
                                    <input type="text" id="shipping-last_name" name="shipping-last_name"
                                        autocomplete="family-name"
                                        class="lv-input @error('shipping-last_name') is-invalid @enderror"
                                        value="{{ old('shipping-last_name') }}" @error('shipping-last_name') aria-describedby="shipping-last_name-error" @enderror required>
                                    @error('shipping-last_name')
                                        <span class="lv-field-error" id="shipping-last_name-error">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="lv-field lv-field--full">
                                    <label for="shipping-address_1">Dirección</label>
                                    <input type="text" id="shipping-address_1" name="shipping-address_1"
                                        autocomplete="address-line1"
                                        class="lv-input @error('shipping-address_1') is-invalid @enderror"
                                        value="{{ old('shipping-address_1') }}" @error('shipping-address_1') aria-describedby="shipping-address_1-error" @enderror required>
                                    @error('shipping-address_1')
                                        <span class="lv-field-error" id="shipping-address_1-error">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="lv-field lv-field--full">
                                    <label for="shipping-address_2">Dirección (línea 2, opcional)</label>
                                    <input type="text" id="shipping-address_2" name="shipping-address_2"
                                        autocomplete="address-line2" class="lv-input"
                                        value="{{ old('shipping-address_2') }}">
                                </div>

                                <div class="lv-field">
                                    <label for="shipping-city">Ciudad</label>
                                    <input type="text" id="shipping-city" name="shipping-city"
                                        autocomplete="address-level2"
                                        class="lv-input @error('shipping-city') is-invalid @enderror"
                                        value="{{ old('shipping-city') }}" @error('shipping-city') aria-describedby="shipping-city-error" @enderror required>
                                    @error('shipping-city')
                                        <span class="lv-field-error" id="shipping-city-error">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="lv-field">
                                    <label for="shipping-postcode">Código postal</label>
                                    <input type="text" id="shipping-postcode" name="shipping-postcode"
                                        autocomplete="postal-code"
                                        class="lv-input @error('shipping-postcode') is-invalid @enderror"
                                        value="{{ old('shipping-postcode') }}" @error('shipping-postcode') aria-describedby="shipping-postcode-error" @enderror required>
                                    @error('shipping-postcode')
                                        <span class="lv-field-error" id="shipping-postcode-error">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="lv-field lv-field--full">
                                    <label for="shipping-phone">Teléfono (opcional)</label>
                                    <input type="tel" id="shipping-phone" name="shipping-phone" autocomplete="tel"
                                        class="lv-input" value="{{ old('shipping-phone') }}">
                                </div>
                            </div>
                        </section>

                        <section class="lv-card" id="billing-fields">
                            <h2 class="lv-card__title"><span class="lv-step-num">3</span> Dirección de facturación</h2>

                            <label class="lv-checkbox">
                                <input type="checkbox" id="same-address-checkbox" checked>
                                <span>Usar la misma dirección para la facturación</span>
                            </label>

                            <div class="lv-field-grid" id="billing-address-wrapper" style="display:none;">
                                <div class="lv-field lv-field--full">
                                    <label for="billing-country">País/Región</label>
                                    <select id="billing-country" name="billing-country" autocomplete="country"
                                        class="lv-input lv-select @error('billing-country') is-invalid @enderror"
                                        @error('billing-country') aria-describedby="billing-country-error" @enderror>
                                        <option value="" disabled {{ old('billing-country') ? '' : 'selected' }}>
                                            Selecciona un país/región</option>
                                        @foreach ($pays as $code => $nom)
                                            <option value="{{ $code }}"
                                                {{ old('billing-country') == $code ? 'selected' : '' }}>{{ $nom }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('billing-country')
                                        <span class="lv-field-error" id="billing-country-error">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="lv-field">
                                    <label for="billing-first_name">Nombre</label>
                                    <input type="text" id="billing-first_name" name="billing-first_name"
                                        autocomplete="given-name"
                                        class="lv-input @error('billing-first_name') is-invalid @enderror"
                                        value="{{ old('billing-first_name') }}" @error('billing-first_name') aria-describedby="billing-first_name-error" @enderror>
                                    @error('billing-first_name')
                                        <span class="lv-field-error" id="billing-first_name-error">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="lv-field">
                                    <label for="billing-last_name">Apellidos</label>
                                    <input type="text" id="billing-last_name" name="billing-last_name"
                                        autocomplete="family-name"
                                        class="lv-input @error('billing-last_name') is-invalid @enderror"
                                        value="{{ old('billing-last_name') }}" @error('billing-last_name') aria-describedby="billing-last_name-error" @enderror>
                                    @error('billing-last_name')
                                        <span class="lv-field-error" id="billing-last_name-error">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="lv-field lv-field--full">
                                    <label for="billing-address_1">Dirección</label>
                                    <input type="text" id="billing-address_1" name="billing-address_1"
                                        autocomplete="address-line1"
                                        class="lv-input @error('billing-address_1') is-invalid @enderror"
                                        value="{{ old('billing-address_1') }}" @error('billing-address_1') aria-describedby="billing-address_1-error" @enderror>
                                    @error('billing-address_1')
                                        <span class="lv-field-error" id="billing-address_1-error">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="lv-field lv-field--full">
                                    <label for="billing-address_2">Dirección (línea 2, opcional)</label>
                                    <input type="text" id="billing-address_2" name="billing-address_2"
                                        autocomplete="address-line2" class="lv-input"
                                        value="{{ old('billing-address_2') }}">
                                </div>

                                <div class="lv-field">
                                    <label for="billing-city">Ciudad</label>
                                    <input type="text" id="billing-city" name="billing-city"
                                        autocomplete="address-level2"
                                        class="lv-input @error('billing-city') is-invalid @enderror"
                                        value="{{ old('billing-city') }}" @error('billing-city') aria-describedby="billing-city-error" @enderror>
                                    @error('billing-city')
                                        <span class="lv-field-error" id="billing-city-error">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="lv-field">
                                    <label for="billing-postcode">Código postal</label>
                                    <input type="text" id="billing-postcode" name="billing-postcode"
                                        autocomplete="postal-code"
                                        class="lv-input @error('billing-postcode') is-invalid @enderror"
                                        value="{{ old('billing-postcode') }}" @error('billing-postcode') aria-describedby="billing-postcode-error" @enderror>
                                    @error('billing-postcode')
                                        <span class="lv-field-error" id="billing-postcode-error">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="lv-field lv-field--full">
                                    <label for="billing-phone">Teléfono (opcional)</label>
                                    <input type="tel" id="billing-phone" name="billing-phone" autocomplete="tel"
                                        class="lv-input" value="{{ old('billing-phone') }}">
                                </div>
                            </div>
                        </section>

                        <section class="lv-card">
                            <h2 class="lv-card__title"><span class="lv-step-num">4</span> Envío y pago</h2>

                            <div class="lv-readonly-option">
                                <span>Envío gratis</span>
                                <strong>Gratis</strong>
                            </div>

                            <div class="lv-readonly-option lv-readonly-option--stacked">
                                <span>Transferencia bancaria</span>
                                <p>Realiza el pago directamente desde tu cuenta bancaria. Utiliza tu NIF como
                                    referencia del pago. Tu pedido no se enviará hasta que se reciban los
                                    fondos.</p>
                            </div>
                        </section>

                        <section class="lv-card">
                            <label class="lv-checkbox">
                                <input type="checkbox" id="add-note-checkbox">
                                <span>Añadir una nota a tu pedido</span>
                            </label>
                            <textarea id="order-notes-textarea" class="lv-textarea" style="display:none;" rows="3"
                                placeholder="Notas sobre tu pedido (por ejemplo, información especial sobre la entrega).">{{ old('order_notes') }}</textarea>
                        </section>

                        <section class="lv-card">
                            <label class="lv-checkbox">
                                <input type="checkbox" id="terms-checkbox" name="terms_checkbox"
                                    {{ old('terms_checkbox') ? 'checked' : '' }}>
                                <span>
                                    Al continuar con la compra, aceptas nuestros
                                    <a href="{{ route('condicoes-gerais-de-venda-cgv') }}" target="_blank">Términos y
                                        condiciones</a>
                                    y nuestra
                                    <a href="{{ route('politica-de-privacidade') }}" target="_blank">Política de
                                        privacidad</a>
                                </span>
                            </label>
                            @error('terms')
                                <span class="lv-field-error">{{ $message }}</span>
                            @enderror
                        </section>
                    </div>

                    <aside class="lv-checkout__summary">
                        <div class="lv-card lv-summary-card">
                            <h2 class="lv-card__title">Resumen del pedido</h2>

                            <ul class="lv-summary-items">
                                @foreach ($cart as $productId => $item)
                                    @php
                                        $itemPrice = $item['price'] ?? 0;
                                        $itemQuantity = (int) ($item['quantity'] ?? 0);
                                        $itemTotal = $itemPrice * $itemQuantity;
                                    @endphp
                                    <li class="lv-summary-item">
                                        <div class="lv-summary-item__image">
                                            @if (!empty($item['image']))
                                                <img src="{{ asset($item['image']) }}"
                                                    alt="{{ $item['title'] }}" width="56" height="56">
                                            @endif
                                            <span class="lv-summary-item__qty">{{ $itemQuantity }}</span>
                                        </div>
                                        <div class="lv-summary-item__body">
                                            <p class="lv-summary-item__title">{{ $item['title'] }}</p>
                                            <p class="lv-summary-item__desc">
                                                {{ Str::limit($item['short_description'] ?? '', 70) }}</p>
                                        </div>
                                        <div class="lv-summary-item__total">
                                            {{ number_format($itemTotal, 2, ',', ' ') }} €
                                        </div>
                                    </li>
                                @endforeach
                            </ul>

                            <div class="lv-summary-totals">
                                <div class="lv-summary-totals__row">
                                    <span>Subtotal</span>
                                    <span>{{ $formattedTotalPrice }} €</span>
                                </div>
                                <div class="lv-summary-totals__row">
                                    <span>Envío</span>
                                    <span class="lv-summary-totals__free">Gratis</span>
                                </div>
                                <div class="lv-summary-totals__row lv-summary-totals__row--total">
                                    <span>Total</span>
                                    <span>{{ $formattedTotalPrice }} €</span>
                                </div>
                            </div>

                            <button type="submit" id="submit-order" class="lv-btn lv-btn--primary lv-btn--block">
                                <span class="lv-btn__text">Finalizar pedido</span>
                            </button>
                            <a href="{{ route('carrinho') }}" class="lv-btn lv-btn--ghost lv-btn--block">Volver al
                                carrito</a>
                        </div>
                    </aside>
                </form>
            @endif
        </div>
    </div>

    @include('layouts.partials.footer.public')
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            const $form = $('#checkout-form');
            if (!$form.length) {
                return;
            }

            const $sameAddress = $('#same-address-checkbox');
            const $billingWrapper = $('#billing-address-wrapper');
            const $addNote = $('#add-note-checkbox');
            const $notesTextarea = $('#order-notes-textarea');
            const $submitBtn = $('#submit-order');

            // Show/hide the billing address block based on the "same address" checkbox
            function toggleBillingAddress() {
                if ($sameAddress.is(':checked')) {
                    $billingWrapper.slideUp(150);
                    copyShippingToBilling();
                } else {
                    $billingWrapper.slideDown(150);
                }
            }

            function copyShippingToBilling() {
                const fields = ['first_name', 'last_name', 'address_1', 'address_2', 'city', 'postcode',
                    'country', 'phone'
                ];
                fields.forEach(field => {
                    $(`#billing-${field}`).val($(`#shipping-${field}`).val());
                });
            }

            $sameAddress.on('change', toggleBillingAddress);
            toggleBillingAddress();

            // Show/hide the order-notes textarea
            $addNote.on('change', function() {
                $notesTextarea.slideToggle(150, function() {
                    if (!$notesTextarea.is(':visible')) {
                        return;
                    }
                    $notesTextarea.trigger('focus');
                });
            });

            if ($notesTextarea.val().trim() !== '') {
                $addNote.prop('checked', true);
                $notesTextarea.show();
            }

            // Field validation on submit
            $form.on('submit', function(e) {
                $submitBtn.prop('disabled', true);
                $submitBtn.find('.lv-btn__text').text('Procesando...');

                let isValid = true;
                const requiredFields = [
                    'email', 'shipping-first_name', 'shipping-last_name', 'shipping-address_1',
                    'shipping-city', 'shipping-postcode', 'shipping-country',
                ];

                if (!$sameAddress.is(':checked')) {
                    requiredFields.push('billing-first_name', 'billing-last_name',
                        'billing-address_1', 'billing-city', 'billing-postcode', 'billing-country');
                }

                $('.lv-field-error').remove();
                $('.is-invalid').removeClass('is-invalid');

                requiredFields.forEach(field => {
                    const $el = $(`[name="${field}"]`);
                    if ($el.length && !$el.val().trim()) {
                        isValid = false;
                        $el.addClass('is-invalid');
                        $el.closest('.lv-field').append(
                            '<span class="lv-field-error">Este campo es obligatorio</span>');
                    }
                });

                const email = $('#email').val();
                if (email && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                    isValid = false;
                    $('#email').addClass('is-invalid');
                    if (!$('#email').closest('.lv-field').find('.lv-field-error').length) {
                        $('#email').closest('.lv-field').append(
                            '<span class="lv-field-error">Por favor, introduce un email válido</span>');
                    }
                }

                if (!$('#terms-checkbox').is(':checked')) {
                    isValid = false;
                    $('#terms-checkbox').addClass('is-invalid');
                    if (!$('#terms-checkbox').closest('.lv-checkbox').next('.lv-field-error').length) {
                        $('#terms-checkbox').closest('.lv-checkbox').after(
                            '<span class="lv-field-error">Debes aceptar los términos y condiciones</span>'
                        );
                    }
                }

                if (!isValid) {
                    e.preventDefault();
                    $submitBtn.prop('disabled', false);
                    $submitBtn.find('.lv-btn__text').text('Finalizar pedido');

                    const $firstError = $('.is-invalid').first();
                    if ($firstError.length) {
                        $('html, body').animate({
                            scrollTop: $firstError.offset().top - 120
                        }, 400);
                    }
                    return false;
                }

                if ($sameAddress.is(':checked')) {
                    copyShippingToBilling();
                }
                $('#order_notes').val($addNote.is(':checked') ? $notesTextarea.val() : '');

                localStorage.removeItem('checkout_form_data');
            });

            // Persist form input locally so users don't lose their progress
            function saveFormData() {
                const formData = {};
                const excluded = ['_token'];
                $form.find('input, select, textarea').each(function() {
                    const name = $(this).attr('name');
                    if (!name || excluded.includes(name)) {
                        return;
                    }
                    if ($(this).attr('type') === 'checkbox') {
                        formData[name] = $(this).is(':checked') ? '1' : '0';
                    } else {
                        const value = $(this).val();
                        if (value && value.trim() !== '') {
                            formData[name] = value;
                        }
                    }
                });
                if (Object.keys(formData).length > 0) {
                    localStorage.setItem('checkout_form_data', JSON.stringify(formData));
                }
            }

            function loadSavedData() {
                const saved = localStorage.getItem('checkout_form_data');
                if (!saved) {
                    return;
                }
                try {
                    const data = JSON.parse(saved);
                    const hasOldData = @json(old() ? true : false);
                    if (hasOldData) {
                        return;
                    }
                    Object.keys(data).forEach(key => {
                        const $el = $(`[name="${key}"]`);
                        if (!$el.length) {
                            return;
                        }
                        if ($el.attr('type') === 'checkbox') {
                            $el.prop('checked', data[key] === '1').trigger('change');
                        } else if (!$el.val()) {
                            $el.val(data[key]);
                        }
                    });
                } catch (e) {
                    localStorage.removeItem('checkout_form_data');
                }
            }

            loadSavedData();

            let saveTimeout;
            $form.on('input change', 'input, select, textarea', function() {
                clearTimeout(saveTimeout);
                saveTimeout = setTimeout(saveFormData, 500);
            });

            @if (session('success'))
                localStorage.removeItem('checkout_form_data');
            @endif

            // Refresh the CSRF token periodically in case the checkout page is left open for a while
            setInterval(function() {
                if ($submitBtn.prop('disabled')) {
                    return;
                }
                $.get('{{ route('refresh') }}', function(data) {
                    $('input[name="_token"]').val(data.token);
                    $('meta[name="csrf-token"]').attr('content', data.token);
                });
            }, 15 * 60 * 1000);
        });
    </script>
@endpush
