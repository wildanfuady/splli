<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
        'qty_pembelian',
        'nama_pic',
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
        'tanggal_pembelian' => 'string',
        'kode_barang' => 'string',
        'nama_barang' => 'string',
        'harga_barang' => 'integer',
        'qty_pembelian' => 'integer',
        'nama_pic' => 'string',
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
        'tanggal_pembelian' => 'required|date',
        'kode_barang' => 'required|string',
        'nama_barang' => 'required|string',
        'harga_barang' => 'required|numeric',
        'qty_pembelian' => 'required|numeric',
        'nama_pic' => 'required|string',
    ];

}
