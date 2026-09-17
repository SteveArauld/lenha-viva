<?php

namespace App\Http\Controllers\Merchant;

use App\Domain\Merchant\GoogleFeedGenerator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use RuntimeException;

class GoogleFeedController extends Controller
{
    /**
     * Browser preview: XML displayed inline (no download prompt).
     */
    public function view(Request $request, GoogleFeedGenerator $generator): Response
    {
        return $this->xmlResponse($request, $generator, download: false);
    }

    /**
     * File download: same XML with Content-Disposition attachment.
     */
    public function download(Request $request, GoogleFeedGenerator $generator): Response
    {
        return $this->xmlResponse($request, $generator, download: true);
    }

    private function xmlResponse(Request $request, GoogleFeedGenerator $generator, bool $download): Response
    {
        $token = (string) config('merchant.feed_token', '');

        if ($token !== '' && $request->query('token') !== $token) {
            abort(403, 'Feed token inválido');
        }

        try {
            $xml = $generator->rss();
        } catch (RuntimeException $e) {
            report($e);
            abort(500, 'Flux invalide');
        }

        $headers = [
            'Content-Type' => 'application/xml; charset=UTF-8',
            'Cache-Control' => 'public, max-age=600',
            'Content-Disposition' => $download
                ? 'attachment; filename="google-shopping.xml"'
                : 'inline; filename="google-shopping.xml"',
        ];

        return response($xml, 200, $headers);
    }
}
