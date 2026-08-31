<?php

namespace App\Http\Controllers;

use App\Support\CategoryLabels;

class SitemapController extends Controller
{
    /**
     * Dynamic XML sitemap: static pages + category pages + product pages.
     */
    public function index()
    {
        $urls = [];

        // Home
        $urls[] = ['loc' => url('/'), 'priority' => '1.0', 'changefreq' => 'daily'];

        // Static informational pages
        foreach ([
            'loja' => 'weekly',
            'sobre-nos' => 'monthly',
            'contacto' => 'monthly',
            'certificaciones' => 'monthly',
            'avisos-legais' => 'yearly',
            'politica-de-privacidade' => 'yearly',
            'condicoes-gerais-de-venda-cgv' => 'yearly',
            'termos-e-condicoes-gerais-de-utilizacao-tcg' => 'yearly',
            'politica-de-entrega' => 'yearly',
            'politica-de-reembolso' => 'yearly',
            'politica-de-pagamento' => 'yearly',
        ] as $path => $freq) {
            $urls[] = ['loc' => url($path), 'priority' => '0.5', 'changefreq' => $freq];
        }

        // Category pages (canonical ES slugs only)
        foreach (array_keys(CategoryLabels::all()) as $slug) {
            $urls[] = ['loc' => url('categoria/'.$slug), 'priority' => '0.8', 'changefreq' => 'weekly'];
        }

        // SEO landing pages
        foreach (array_keys(config('landing_pages', [])) as $slug) {
            $urls[] = ['loc' => url($slug), 'priority' => '0.8', 'changefreq' => 'weekly'];
        }

        // Product pages
        foreach (config('loja_products', []) as $product) {
            if (! empty($product['slug'])) {
                $urls[] = [
                    'loc' => url('producto/'.$product['slug']),
                    'priority' => '0.7',
                    'changefreq' => 'weekly',
                ];
            }
        }

        $xml = '<?xml version="1.0" encoding="UTF-8"?>'."\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">'."\n";
        foreach ($urls as $u) {
            $xml .= '  <url>'."\n";
            $xml .= '    <loc>'.htmlspecialchars($u['loc'], ENT_XML1).'</loc>'."\n";
            $xml .= '    <changefreq>'.$u['changefreq'].'</changefreq>'."\n";
            $xml .= '    <priority>'.$u['priority'].'</priority>'."\n";
            $xml .= '  </url>'."\n";
        }
        $xml .= '</urlset>'."\n";

        return response($xml, 200, ['Content-Type' => 'application/xml; charset=UTF-8']);
    }
}
