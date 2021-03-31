<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Barang
 * @package App\Models
 * @version March 31, 2021, 8:57 pm UTC
 *
 * @property string $tanggal_pembelian
 * @property string $kode_barang
 * @property string $nama_barang
 * @property integer $harga_barang
 * @property integer $qty_pembalian
 * @property string $nama_pic
 */
class Barang extends Model
{
    use SoftDeletes;

    public $table = 'barangs';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'tanggal_pembelian',
        'kode_barang',
        'nama_barang',
        'harga_barang',
        'qty_pembalian',
        'nama_pic'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'tanggal_pembelian' => 'string',
        'kode_barang' => 'string',
        'nama_barang' => 'string',
        'harga_barang' => 'integer',
        'qty_pembalian' => 'integer',
        'nama_pic' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
