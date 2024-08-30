<?php

namespace App\DTOs;

use App\Http\Requests\RegisterUserRequest;
use App\Interface\DtoInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\{User};

class UserDTO implements DtoInterface
{

    private ?int $id;

    private string $name;

    private string $email;

    private string $phone_number;

    private string $password;

    private ?string $pin;

    private Carbon $create_at;
    private Carbon $update_at;



     /**
     * @return int null
     */

     public function getId():?int{
        return $this->id;
     }

     public function setId(string $id){
        $this->id= $id;
     }
    /**
     * @return string
     */

    public function getName():string{
        return $this->name;
    } 

    public function setName(string $name){
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getPhoneNumber(): string
    {
        return $this->phone_number;
    }

    public function setPhoneNumber(string $phone_number)
    {
        $this->phone_number = $phone_number;
    }

    /**
     * @return string 
     */

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }


    /**
     * @return string 
     */

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    /**
     * @return string null
     */

    public function getPin(): ?string
    {
        return $this->pin;
    }

    public function setPin(string $pin)
    {
        $this->pin = $pin;
    }

    /**
     * @return Carbon null
     */
    public function getCreateAt(): ?Carbon
    {
        return $this->create_at;
    }

    public function setCreateAt(Carbon $create_at)
    {
        $this->create_at = $create_at;
    }

    /**
     * @return Carbon null
     */
    public function getUpdateAt(): ?Carbon
    {

        return $this->update_at;
    }

    public function setUpdateAt(?Carbon $update_at): void
    {
        $this->update_at = $update_at;
    }

    /**
     * Create a new class instance.
     */

    public function __construct()
    {
        //
    }


    public static function frmApiFormRequest(FormRequest $request): DtoInterface
    {
        $userDTO = new UserDTO();
        $userDTO->setName($request->input('name'));
        $userDTO->setEmail($request->input('email'));
        $userDTO->setPassword($request->input('password'));
        $userDTO->setPhoneNumber($request->input('phone_number'));
        
        //$userDTO->setPin($request->input('pin'));
        return $userDTO;
    }

    public static function frmModel(User|Model $model): DtoInterface
    {

        $userDTO = new UserDTO();
        $userDTO->setId($model->id);
        $userDTO->setName($model->name);
        $userDTO->setEmail($model->email);
        $userDTO->setPhoneNumber($model->phone_number);
        $userDTO->setUpdateAt($model->update_at);
        $userDTO->setCreateAt($model->created_at);
        
        //$userDTO->setPassword($model->password);
        //$userDTO->setPin($request->input('pin'));
        return $userDTO;
        return new DtoInterface;
    }

    public static function toArray(Model|User $model): array
    {
        return [
            'id'=>$model->id,
            'name'=>$model->name,
            'email'=>$model->email,
            'puone_number'=>$model->puone_number,
            'created_at'=>$model->created_at,
            'update_at'=>$model->update_at,
        ];
    }
}
