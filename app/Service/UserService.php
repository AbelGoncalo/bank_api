<?php

namespace App\Service;

use App\DTOs\UserDTO;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class UserService{
 
    public function creatUser(UserDTO $userDto): Builder|Model{

       
        return User::query()->create([
            'name'=>$userDto->getName(),
            'email'=>$userDto->getEmail(),
            'password'=>$userDto->getPassword(),
            'phone_number'=>$userDto->getPhoneNumber(),
        ]);
    }
}