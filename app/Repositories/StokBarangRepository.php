<?php

namespace App\Repositories;

use App\Models\StokBarang;
use App\Repositories\BaseRepository;

/**
 * Class StokBarangRepository
 * @package App\Repositories
 * @version March 31, 2021, 9:07 pm UTC
*/

class StokBarangRepository extends BaseRepository
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
        return StokBarang::class;
    }
}
