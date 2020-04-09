<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class LocAttendance
 * @package App\Models
 * @version April 5, 2020, 6:48 am UTC
 *
 * @property \App\Models\User user
 * @property integer user_id
 * @property string latitude
 * @property string longitude
 * @property boolean type
 */
class LocAttendance extends Model
{
    use SoftDeletes;

    public $table = 'loc_attendances';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'latitude',
        'longitude',
        'type',
        'image_front',
        'image_back'
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
        'type' => 'boolean',
        'image_front'=>'string',
        'image_back'=>'string'
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }
}
