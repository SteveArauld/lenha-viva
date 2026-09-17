<?php

namespace App\Console\Commands\Merchant;

use App\Domain\Merchant\GoogleFeedGenerator;
use Illuminate\Console\Command;
use RuntimeException;

class GenerateGoogleFeedCommand extends Command
{
    protected $signature = 'merchant:google-feed';

    protected $description = 'Generate the Google Shopping XML feed (storage + public/feeds)';

    public function handle(GoogleFeedGenerator $generator): int
    {
        try {
            $path = $generator->writeToDisk();
        } catch (RuntimeException $e) {
            $this->error($e->getMessage());

            return self::FAILURE;
        }

        $this->info('Feed written to '.$path.' and public/feeds/google-shopping.xml');

        return self::SUCCESS;
    }
}
