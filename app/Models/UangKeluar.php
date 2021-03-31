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
        'qty',
        'harga',
        'total_harga'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'tanggal' => 'string',
        'qty' => 'integer',
        'total_harga' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
