<?php

namespace Tests\Feature;

use App\Models\Marketplace;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IntegrationTest extends TestCase
{

    private function getMarketPlaceId(){
        return  Marketplace::all()->last()->id;
    }

    public function test_integration_create_via_api()
    {
        $user = User::findOrFail(1);
        $this->actingAs($user,'api');
        $this->post('api/integrations',[
            'marketplace' => 'n11',
            'username'    => 'test username',
            'password'    => '1233321'
        ])->assertOk();
    }

    public function test_integration_update_via_api()
    {
        $user = User::findOrFail(1);
        $this->actingAs($user,'api');
        $this->patch('api/integrations/'.$this->getMarketPlaceId(),[
            'marketplace' => 'n11',
            'username'    => 'test username',
            'password'    => '1233321'
        ])->assertOk();
    }

    public function test_integration_delete_via_api()
    {
        $user = User::findOrFail(1);
        $this->actingAs($user,'api');
        $this->delete('api/integrations/'.$this->getMarketPlaceId())->assertOk();
    }

    public function test_integration_create_via_command()
    {
        $this->artisan('integration:create')
            ->expectsQuestion('Choose a marketplace','n11')
            ->expectsQuestion('username?','test username')
            ->expectsQuestion('password','123321')
            ->expectsOutput('Marketplace create is successfully')
            ->doesntExpectOutput('Marketplace create is not successfully');
    }

    public function test_integration_update_via_command()
    {
        $this->artisan('integration:update --id='.$this->getMarketPlaceId())
            ->expectsQuestion('Choose a marketplace','trendyol')
            ->expectsQuestion('username?','test command update username')
            ->expectsQuestion('password','123321')
            ->expectsOutput('Marketplace update is successfully')
            ->doesntExpectOutput('Marketplace update is not successfully');
    }

    public function test_integration_delete_via_command()
    {
        $this->artisan('integration:delete --id='.$this->getMarketPlaceId())
            ->expectsOutput('Marketplace delete is successfully')
            ->doesntExpectOutput('Marketplace delete is not successfully');
    }
}
