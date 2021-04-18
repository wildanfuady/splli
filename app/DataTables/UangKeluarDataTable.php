<?php

namespace App\DataTables;

use App\Models\UangKeluar;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class UangKeluarDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'uang_keluars.datatables_actions')
        ->editColumn('harga', function($data){
            return "Rp".number_format($data->harga, 0, 0, ".");
        })
        ->editColumn('total_harga', function($data){
            return "Rp".number_format($data->total_harga, 0, 0, ".");
        });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\UangKeluar $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(UangKeluar $model)
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
            'tanggal' => ['searchable' => true],
            'qty' => ['searchable' => true],
            'harga' => ['searchable' => true],
            'total_harga' => ['searchable' => true],
            'keterangan' => ['searchable' => true]
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'uang_keluars_datatable_' . time();
    }
}
