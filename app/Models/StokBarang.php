<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class StokBarang
 * @package App\Models
 * @version March 31, 2021, 9:07 pm UTC
 *
 * @property \App\Models\Barang $barang
 * @property integer $barang_id
 * @property integer $harga_jual
 * @property string $qty
 */
class StokBarang extends Model
{
    use SoftDeletes;

    public $table = 'stok_barangs';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'barang_id',
        'harga_jual',
        'qty',
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
        'barang_id' => 'integer',
        'harga_jual' => 'integer',
        'qty' => 'string',
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
        'barang_id' => 'required|numeric|unique:barang_id',
        'harga_jual' => 'required|numeric',
        'qty' => 'required|numeric'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function barang()
    {
        return $this->belongsTo(\App\Models\Barang::class, 'barang_id', 'id');
    }

    public function cekStok($stok = null)
    {
        $color = "";
        if($stok <= 20){
            $color = "warning";
        } else if($stok <= 10){
            $color = "danger";
        } else {
            $color = "success";
        }

        return "<span class='text-".$color."'><strong>".$stok."</strong></span>";
    }
}
