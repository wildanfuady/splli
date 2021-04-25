<?php

namespace App\DataTables;

use App\Models\Barang;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class BarangDataTable extends DataTable
{
    protected $index = 0;

    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'barangs.datatables_actions')
        ->addColumn('no', function(){
            return ++$this->index;
        })
        ->editColumn('harga_barang', function($data){
            return "Rp".number_format($data->harga_barang, 0, 0, ".");
        });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Barang $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Barang $model)
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
            'tanggal_pembelian' => ['searchable' => true],
            'kode_barang' => ['searchable' => true],
            'nama_barang' => ['searchable' => true],
            'harga_barang' => ['searchable' => true],
            'qty_pembelian' => ['searchable' => true],
            'nama_pic' => ['searchable' => true, 'title' => 'Nama PIC']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'barangs_datatable_' . time();
    }
}
