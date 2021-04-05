<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Pembayaran
 * @package App\Models
 * @version March 31, 2021, 10:23 pm UTC
 *
 * @property string $id_po
 * @property timestamps $tanggal
 * @property string $plat_motor
 * @property string $nama_konsumen
 * @property string $nama_sparepart
 * @property integer $harga_grosir
 * @property integer $harga_jual
 * @property integer $qty
 * @property integer $harga_pasang
 * @property integer $jasa_service
 * @property integer $total_harga
 * @property integer $selisih
 */
class Pembayaran extends Model
{
    use SoftDeletes;

    public $table = 'pembayarans';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'id_po',
        'tanggal',
        'plat_motor',
        'nama_konsumen',
        'nama_sparepart',
        'harga_grosir',
        'harga_jual',
        'qty',
        'harga_pasang',
        'jasa_service',
        'total_harga',
        'selisih',
        'barang_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_po' => 'string',
        'tanggal' => 'string',
        'plat_motor' => 'string',
        'nama_konsumen' => 'string',
        'nama_sparepart' => 'string',
        'harga_grosir' => 'integer',
        'harga_jual' => 'integer',
        'qty' => 'integer',
        'harga_pasang' => 'integer',
        'jasa_service' => 'integer',
        'total_harga' => 'integer',
        'selisih' => 'integer',
        'barang_id' => 'integer',
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

    public function barang()
    {
        return $this->belongsTo(\App\Models\Barang::class, 'barang_id', 'id');
    }

    
}
