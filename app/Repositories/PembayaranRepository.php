<?php

namespace App\Repositories;

use App\Models\Pembayaran;
use App\Repositories\BaseRepository;

/**
 * Class PembayaranRepository
 * @package App\Repositories
 * @version March 31, 2021, 10:23 pm UTC
*/

class PembayaranRepository extends BaseRepository
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
        return Pembayaran::class;
    }
}
