<?php

namespace App\Http\Controllers\Api;

use App\Helper\ApiHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\MarketplaceRequest;
use App\Models\Marketplace;
use App\Repository\MarketplaceRepository;
use Illuminate\Http\Request;

class MarketplaceController extends Controller
{
    private MarketplaceRepository $marketplaceRepository;

    public function __construct()
    {
        $this->marketplaceRepository = new MarketplaceRepository();
    }

    public function store(MarketplaceRequest $request)
    {
        $data = $request->validated();
        $marketplace = $this->marketplaceRepository->create($data);
        return ApiHelper::successResponse($marketplace);
    }

    public function update(MarketplaceRequest $request, $id)
    {
        $data = $request->validated();
        $update = $this->marketplaceRepository->update($id,$data);
        return ApiHelper::successResponse($update);
    }


    public function destroy($id)
    {
        $marketplace = $this->marketplaceRepository->get($id)->delete();
        return ApiHelper::successResponse($marketplace);
    }
}
