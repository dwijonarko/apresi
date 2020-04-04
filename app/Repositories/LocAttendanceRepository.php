<?php

namespace App\Repositories;

use App\Models\LocAttendance;
use App\Repositories\BaseRepository;

/**
 * Class LocAttendanceRepository
 * @package App\Repositories
 * @version April 4, 2020, 3:20 pm UTC
*/

class LocAttendanceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'latitude',
        'longitude',
        'type'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return LocAttendance::class;
    }
}
