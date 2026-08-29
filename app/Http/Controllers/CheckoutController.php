<?php

namespace App\Http\Controllers;

use App\Mail\AdminOrderNotification;
use App\Mail\OrderConfirmation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    protected $pays;

    public function __construct()
    {

        $this->pays = config('countries');

    }

    public function show()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('carrinho')->with('error', 'Tu carrito está vacío.');
        }

        // Calculer les totaux
        $totalItems = 0;
        $totalPrice = 0.00;

        foreach ($cart as $item) {
            $itemQuantity = (int) ($item['quantity'] ?? 0);
            $itemPrice = $this->cleanPrice($item['price'] ?? 0);

            $totalItems += $itemQuantity;
            $totalPrice += ($itemPrice * $itemQuantity);
        }

        return view('checkout', [
            'cart' => $cart,
            'totalItems' => $totalItems,
            'totalPrice' => $totalPrice,
            'formattedTotalPrice' => number_format($totalPrice, 2, ',', '.'),
            'isEmpty' => empty($cart),
            'pays' => $this->pays,
        ]);
    }

    public function confirmation()
    {
        $order = session()->get('last_order');

        if (! $order) {
            return redirect()->route('home');
        }

        return view('checkout.confirmation', [
            'order' => $order,
        ]);
    }

    public function store(Request $request)
    {

        //        dd($request);
        // Valider les données du formulaire
        $validated = $request->validate([
            'shipping_method' => 'required|string|max:255',
            'payment_method' => 'required|string|max:255',
            'order_notes' => 'nullable|string|max:1000',
            'email' => 'required|email',
            'shipping-country' => 'required|string|max:100',
            'shipping-first_name' => 'required|string|max:255',
            'shipping-last_name' => 'required|string|max:255',
            'shipping-address_1' => 'required|string|max:500',
            'shipping-address_2' => 'nullable|string|max:500',
            'shipping-city' => 'required|string|max:255',
            'shipping-state' => 'required|string|in:'.implode(',', config('spain.provinces')),
            'shipping-nif' => ['required', 'string', 'regex:/^([0-9]{8}[A-Za-z]|[XYZxyz][0-9]{7}[A-Za-z]|[A-HJ-NP-SUVWa-hj-np-suvw][0-9]{7}[0-9A-Ja-j])$/'],
            'shipping-postcode' => ['required', 'string', 'regex:/^(0[1-9]|[1-4][0-9]|5[0-2])[0-9]{3}$/'],
            'shipping-phone' => 'nullable|string|max:20',

            'billing-country' => 'required|string|max:100',
            'billing-first_name' => 'required|string|max:255',
            'billing-last_name' => 'required|string|max:255',
            'billing-address_1' => 'required|string|max:500',
            'billing-address_2' => 'nullable|string|max:500',
            'billing-city' => 'required|string|max:255',
            'billing-state' => 'nullable|string|in:'.implode(',', config('spain.provinces')),
            'billing-nif' => ['nullable', 'string', 'regex:/^([0-9]{8}[A-Za-z]|[XYZxyz][0-9]{7}[A-Za-z]|[A-HJ-NP-SUVWa-hj-np-suvw][0-9]{7}[0-9A-Ja-j])$/'],
            'billing-postcode' => ['required', 'string', 'regex:/^(0[1-9]|[1-4][0-9]|5[0-2])[0-9]{3}$/'],
            'billing-phone' => 'nullable|string|max:20',
        ], [
            'shipping-nif.regex' => 'Introduce un DNI/NIF español válido (p. ej. 12345678Z).',
            'billing-nif.regex' => 'Introduce un DNI/NIF español válido (p. ej. 12345678Z).',
            'shipping-postcode.regex' => 'Introduce un código postal español válido (5 dígitos).',
            'billing-postcode.regex' => 'Introduce un código postal español válido (5 dígitos).',
            'shipping-state.in' => 'Selecciona una provincia española.',
        ]);

        // Récupérer le panier
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('carrinho')->with('error', 'Tu carrito está vacío.');
        }

        // Calculer les totaux
        $totalItems = 0;
        $totalPrice = 0.00;

        foreach ($cart as $item) {
            $itemQuantity = (int) ($item['quantity'] ?? 0);
            $itemPrice = $this->cleanPrice($item['price'] ?? 0);

            $totalItems += $itemQuantity;
            $totalPrice += ($itemPrice * $itemQuantity);
        }

        // Générer un numéro de commande
        $orderNumber = rand(1000, 9999);

        // Préparer les données de la commande avec les données du formulaire
        $orderData = [
            'order_number' => $orderNumber,
            'date' => now()->format('F d, Y'),
            'shipping_method' => $validated['shipping_method'],
            'payment_method' => 'Transferencia bancaria',
            'customer' => [
                'email' => $validated['email'],
                'first_name' => $validated['shipping-first_name'],
                'last_name' => $validated['shipping-last_name'],
                'address_1' => $validated['shipping-address_1'],
                'address_2' => $validated['shipping-address_2'] ?? '',
                'city' => $validated['shipping-city'],
                'state' => $validated['shipping-state'],
                'nif' => strtoupper($validated['shipping-nif']),
                'postcode' => $validated['shipping-postcode'],
                'country' => $validated['shipping-country'],
                'phone' => $validated['shipping-phone'] ?? '',
            ],
            'billing' => [
                'first_name' => $validated['billing-first_name'],
                'last_name' => $validated['billing-last_name'],
                'address_1' => $validated['billing-address_1'],
                'address_2' => $validated['billing-address_2'] ?? '',
                'city' => $validated['billing-city'],
                'state' => $validated['billing-state'] ?? '',
                'nif' => isset($validated['billing-nif']) ? strtoupper($validated['billing-nif']) : '',
                'postcode' => $validated['billing-postcode'],
                'country' => $validated['billing-country'],
                'phone' => $validated['billing-phone'] ?? '',
            ],
            'items' => $cart,
            'total_items' => $totalItems,
            'total_price' => $totalPrice,
            'formatted_total_price' => number_format($totalPrice, 2, ',', '.'),
            'order_comments' => $validated['order_notes'] ?? '',
            'order_date' => now()->format('Y-m-d H:i:s'),
        ];

        try {
            // Envoyer l'email de confirmation au client
            Mail::to($validated['email'])->send(new OrderConfirmation($orderData));

            // Envoyer la notification à l'admin
            $adminEmail = config('mail.admin_email', 'contacto@lenhaviva.es');
            if ($adminEmail) {
                Mail::to($adminEmail)->send(new AdminOrderNotification($orderData));
            }

            // Sauvegarder la commande dans la session et localStorage
            session()->put('last_order', $orderData);

            // Vider le panier après la commande
            session()->forget('cart');

            // Rediriger vers la page de confirmation
            return redirect()->route('checkout.confirmation')->with([
                'order_data' => $orderData,
                'success' => '¡Tu pedido se ha recibido correctamente!',
            ]);

        } catch (\Exception $e) {
            \Log::error('Erro no checkout: '.$e->getMessage());

            return back()->with('error', 'Se ha producido un error al procesar tu pedido. Por favor, inténtalo de nuevo.')->withInput();
        }
    }

    private function cleanPrice($price)
    {
        if (is_numeric($price)) {
            return (float) $price;
        }

        if (empty($price)) {
            return 0.000;
        }

        if (is_string($price)) {
            // Price strings use ',' as a thousands separator and '.' as the decimal separator
            // (e.g. "2,499.00"). Strip the thousands separator before casting.
            $price = str_replace(',', '', $price);
            $price = preg_replace('/[^\d.]/', '', $price);

            return (float) $price;
        }

        return 0.000;
    }
}
