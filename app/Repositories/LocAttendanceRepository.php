<?php

namespace App\Repositories;

use App\Models\LocAttendance;
use App\Repositories\BaseRepository;

/**
 * Class LocAttendanceRepository
 * @package App\Repositories
 * @version April 5, 2020, 6:48 am UTC
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
