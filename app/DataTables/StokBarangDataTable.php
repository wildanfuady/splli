<?php

namespace App\DataTables;

use App\Models\StokBarang;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class StokBarangDataTable extends DataTable
{
    protected $index = 0;

    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'stok_barangs.datatables_actions')
        ->addColumn('no', function(){
            return ++$this->index;
        })
        ->addColumn('kode_barang', function($data){
            return $data->barang->nama_barang;
        })
        ->addColumn('nama_barang', function($data){
            return $data->barang->nama_barang;
        })
        ->addColumn('harga_beli', function($data){
            return "Rp".number_format($data->barang->harga_barang, 0, 0, ".");
        })
        ->addColumn('harga_jual', function($data){
            return "Rp".number_format($data->harga_jual, 0, 0, ".");
        });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\StokBarang $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(StokBarang $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            // ->addAction(['width' => '120px', 'printable' => false])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
                ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'action' => ['width' => '120px', 'printable' => false],
            'kode_barang' => ['searchable' => true],
            'nama_barang' => ['searchable' => true],
            'harga_beli' => ['searchable' => true],
            'harga_jual' => ['searchable' => true],
            'qty' => ['searchable' => true]
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'stok_barangs_datatable_' . time();
    }
}
