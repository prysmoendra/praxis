<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CleanEmptyStoreDomains extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:clean-empty-store-domains';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $affected = \App\Models\User::whereNull('store_domain')
            ->orWhereRaw('TRIM(store_domain) = ""')
            ->update(['store_domain' => null]);

        $this->info("Cleaned $affected user(s) with empty or whitespace-only store_domain.");
        return 0;
    }
}
