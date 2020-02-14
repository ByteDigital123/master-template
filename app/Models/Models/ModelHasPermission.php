<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ModelHasPermission
 *
 * @property int $permission_id
 * @property string $model_type
 * @property int $model_id
 *
 * @property Permission $permission
 *
 * @package App
 */
class ModelHasPermission extends Model
{
    protected $table = 'model_has_permissions';
    public $incrementing = false;


    protected $casts = [
        'permission_id' => 'int',
        'model_id' => 'int'
    ];

    public function permission()
    {
        return $this->belongsTo(Permission::class);
    }
}
