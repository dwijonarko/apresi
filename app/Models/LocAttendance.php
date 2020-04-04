<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class LocAttendance
 * @package App\Models
 * @version April 4, 2020, 3:20 pm UTC
 *
 * @property integer user_id
 * @property string latitude
 * @property string longitude
 * @property boolean type
 */
class LocAttendance extends Model
{
    use SoftDeletes;

    public $table = 'loc_attendances';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'latitude',
        'longitude',
        'type'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'latitude' => 'string',
        'longitude' => 'string',
        'type' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
        'latitude' => 'required',
        'longitude' => 'required',
        'type' => 'required'
    ];

    
}
