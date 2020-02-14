<?php

/**
 * Created by Reliese Model.
 */

namespace App;

use App\Models\Role;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ModelHasRole
 *
 * @property int $role_id
 * @property string $model_type
 * @property int $model_id
 *
 * @property Role $role
 *
 * @package App
 */
class ModelHasRole extends Model
{
    protected $table = 'model_has_roles';
    public $incrementing = false;


    protected $casts = [
        'role_id' => 'int',
        'model_id' => 'int'
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
