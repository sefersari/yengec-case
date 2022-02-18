<?php
/**
 ** Created By PhpStorm
 * User: Sefer Sarı
 * Date: 18.02.2022
 * Time: 19:03
 */


namespace App\Repository;


use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class UserRepository extends AbstractBaseRepository
{
    public function __construct()
    {
        parent::__construct(new User());
    }

    public function create($data){
       return $this->model::query()->create([
            'email'    => $data['email'],
            'name'     => $data['name'],
            'password' => Hash::make($data['password'])
        ]);
    }
}
