<?php
/**
 ** Created By PhpStorm
 * User: Sefer Sarı
 * Date: 19.02.2022
 * Time: 01:51
 */


namespace App\Repository;



use App\Models\Marketplace;

class MarketplaceRepository extends AbstractBaseRepository
{
    public function __construct()
    {
        parent::__construct(new Marketplace());
    }
}
