<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class HasilUsaha
 * @package App\Models
 * @version March 31, 2021, 10:40 pm UTC
 *
 * @property \App\Models\Pembayaran $pembayaran
 * @property \App\Models\UangKeluar $uangKeluar
 * @property integer $pembayaran_id
 * @property integer $uang_keluar_id
 * @property string $tanggal
 * @property string $keterangan
 * @property integer $total_saldo
 */
class HasilUsaha extends Model
{
    use SoftDeletes;

    public $table = 'hasil_usahas';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'uang_masuk',
        'uang_keluar',
        'tanggal',
        'keterangan',
        'total_saldo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'uang_masuk' => 'integer',
        'uang_keluar' => 'integer',
        'tanggal' => 'string',
        'keterangan' => 'string',
        'total_saldo' => 'integer',
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
        'uang_masuk' => 'required|numeric',
        'uang_keluar' => 'required|numeric',
        'tanggal' => 'required|string',
        'keterangan' => 'required|string',
        'total_saldo' => 'required|numeric',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function pembayaran()
    {
        return $this->belongsTo(\App\Models\Pembayaran::class, 'pembayaran_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function uangKeluar()
    {
        return $this->belongsTo(\App\Models\UangKeluar::class, 'uang_keluar_id', 'id');
    }
}
