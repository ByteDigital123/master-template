<?php

namespace App\Services;

use App\Models\Permission;
use Illuminate\Support\Str;

class PermissionService
{
    protected $permission;

    public function __construct(Permission $permission)
    {
        $this->permission = $permission;
    }

    /**
     * kick up the standard permissions
     * for a given model
     */
    public function createStaticPermissions($model)
    {
        $permissions = [
            'list',
            'create',
            'view',
            'update',
            'delete'
        ];

        foreach ($permissions as $permission) {
            $this->permission->create([
                'name' => $permission . '_' . Str::snake($model),
                'label' => ucwords(str_replace('_', ' ', $permission . '_' . Str::snake($model))),
                'model' => ucwords(str_replace('_', ' ', Str::snake($model))),
                'guard_name' => 'admin_api'
            ]);
        }
    }
}
