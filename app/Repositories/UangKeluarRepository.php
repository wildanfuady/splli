<?php

namespace App\Repositories;

use App\Models\UangKeluar;
use App\Repositories\BaseRepository;

/**
 * Class UangKeluarRepository
 * @package App\Repositories
 * @version March 31, 2021, 9:06 pm UTC
*/

class UangKeluarRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
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
        return UangKeluar::class;
    }
}
