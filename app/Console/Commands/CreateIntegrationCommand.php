<?php

namespace App\Console\Commands;

use App\Http\Requests\MarketplaceRequest;
use App\Models\Marketplace;
use App\Repository\MarketplaceRepository;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;

class CreateIntegrationCommand extends Command
{

    private $rules;

    private $data;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'integration:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command is new create integration data';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->rules = (new MarketplaceRequest())->rules();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->data['marketplace'] = $this->choice('Choose a marketplace',Marketplace::$marketPlaces);
        $this->data['username']    = $this->ask('username?');
        $this->data['password']    = $this->ask('password');
        if($this->validate()){
            if ((new MarketplaceRepository())->create($this->data)->save()) {
                $this->line('Marketplace create is successfully');
                return true;
            }
            $this->line('Marketplace create is not successfully');
            return false;
        }
        return 0;
    }

    private function validate(){

        $validator = Validator::make($this->data, $this->rules);
        if (!$validator->passes()) {
            $this->warn($validator->messages());
            return false;
        }

        return true;

    }
}
