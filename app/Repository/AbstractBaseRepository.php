<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

abstract class AbstractBaseRepository implements ContractRepository
{
    protected Model $model;
    /**
     * @var \Illuminate\Database\Eloquent\Builder
     */
    protected $query;

    public function __construct(Model $model)
    {
        $this->model = $model;
        $this->query = $this->model::query();
    }

    public function create(array $data)
    {
       return $this->model::query()
            ->create($data);
    }

    public function update(int $id,array $data){
        $modelX = $this->model::query()
            ->findOrFail($id);
        $modelX->update($data);
        $modelX->touch();
        return $modelX->refresh();
    }

    public function getAllByPaginate(){

         return $this->query->paginate(10);
    }

    public function get(int $id){
        return $this->query->findOrFail($id);
    }


    public function withCount(array|string $withCounts){
        $this->query->withCount($withCounts);
        return $this;
    }

    public function with(array|string $with){
        $this->query->with($with);
        return $this;
    }
}
