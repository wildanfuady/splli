<?php

namespace App\DataTables;

use App\Models\HasilUsaha;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class HasilUsahaDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'hasil_usahas.datatables_actions')
        ->editColumn('tanggal', function($data){
            return date('d-m-Y', strtotime($data->tanggal));
        })
        ->editColumn('uang_masuk', function($data){
            return "Rp".number_format($data->uang_masuk, 0, 0, ".");
        })
        ->editColumn('uang_keluar', function($data){
            return "Rp".number_format($data->uang_keluar, 0, 0, ".");
        })
        ->editColumn('total_saldo', function($data){
            return "Rp".number_format($data->total_saldo, 0, 0, ".");
        });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\HasilUsaha $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(HasilUsaha $model)
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
            'uang_masuk' => ['searchable' => true],
            'uang_keluar' => ['searchable' => true],
            'total_saldo' => ['searchable' => true],
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
        return 'hasil_usahas_datatable_' . time();
    }
}
