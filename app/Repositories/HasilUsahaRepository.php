<?php

namespace App\Repositories;

use App\Models\HasilUsaha;
use App\Repositories\BaseRepository;

/**
 * Class HasilUsahaRepository
 * @package App\Repositories
 * @version March 31, 2021, 10:40 pm UTC
*/

class HasilUsahaRepository extends BaseRepository
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
        return HasilUsaha::class;
    }
}
