<?php

namespace App\Models;
use App\Models\User;
use App\Models\UserRole;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Role
 * @package App\Models
 * @version October 13, 2019, 4:53 am UTC
 *
 * @property string name
 * @property string description
 */
class Role extends Model
{
    use SoftDeletes;

    public $table = 'roles';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required'
    ];

    public function user()
    	{
    		return $this->belongsToMany(User::class)->using(UserRole::class);
    	}

}
