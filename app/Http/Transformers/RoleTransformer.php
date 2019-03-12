<?php

namespace App\Http\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Auth\Role;


class RoleTransformer extends TransformerAbstract
{

    public function transform(Role $role)
    {
        return [
            'name' => $role->name
        ];
    }
}
