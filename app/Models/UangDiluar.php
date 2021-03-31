<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class UangDiluar
 * @package App\Models
 * @version March 31, 2021, 10:14 pm UTC
 *
 * @property string $nama_konsumen
 * @property integer $hp_konsumen
 * @property integer $jumlah_tagihan
 * @property integer $jumlah_hutang
 * @property integer $sisa_hutang
 * @property string $keterangan
 */
class UangDiluar extends Model
{
    use SoftDeletes;

    public $table = 'uang_diluars';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nama_konsumen',
        'hp_konsumen',
        'jumlah_tagihan',
        'jumlah_hutang',
        'sisa_hutang',
        'keterangan'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nama_konsumen' => 'string',
        'hp_konsumen' => 'integer',
        'jumlah_tagihan' => 'integer',
        'jumlah_hutang' => 'integer',
        'sisa_hutang' => 'integer',
        'keterangan' => 'string',
        'created_by' => 'integer',
        'updated_by' => 'integer',
        'deleted_by' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
