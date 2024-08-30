<?php

namespace App\Interface;

use App\Http\Requests\{RegisterUserRequest};
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;

interface DtoInterface
{
    //
    public static function frmApiFormRequest(FormRequest $request): self;

    public static function frmModel(Model $model): self;

    public static function toArray(Model $model): array;
}
