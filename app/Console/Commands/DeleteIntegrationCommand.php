<?php

namespace App\Console\Commands;

use App\Repository\MarketplaceRepository;
use Illuminate\Console\Command;

class DeleteIntegrationCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'integration:delete {--id=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $id = $this->option('id');
        if ((new MarketplaceRepository())->get($id)->delete()) {
            $this->line('Marketplace delete is successfully');
            return true;
        }
        $this->line('Marketplace delete is not successfully');
        return 0;
    }
}
