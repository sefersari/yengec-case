<?php

namespace App\Repository;

interface ContractRepository
{

    public function get(int $id);

    public function create(array $data);

    public function update(int $id,array $data);

    public function getAllByPaginate();

    public function withCount(array|string $withCounts);

    public function with(array|string $with);

}
