<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class UangKeluar
 * @package App\Models
 * @version March 31, 2021, 9:06 pm UTC
 *
 * @property string $tanggal
 * @property integer $qty
 * @property qty $harga
 * @property integer $total_harga
 */
class UangKeluar extends Model
{
    use SoftDeletes;

    public $table = 'uang_keluars';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'tanggal',
        // 'tanggal_akhir',
        'qty',
        'harga',
        'total_harga',
        'keterangan',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'tanggal' => 'string',
        // 'tanggal_akhir' => 'string',
        'qty' => 'integer',
        'harga' => 'integer',
        'total_harga' => 'integer',
        'keterangan' => 'string',
        'created_by' => 'integer',
        'updated_by' => 'integer',
        'deleted_by' => 'integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
