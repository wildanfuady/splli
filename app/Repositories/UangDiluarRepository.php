<?php

namespace App\Repositories;

use App\Models\UangDiluar;
use App\Repositories\BaseRepository;

/**
 * Class UangDiluarRepository
 * @package App\Repositories
 * @version March 31, 2021, 10:14 pm UTC
*/

class UangDiluarRepository extends BaseRepository
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
        return UangDiluar::class;
    }
}
