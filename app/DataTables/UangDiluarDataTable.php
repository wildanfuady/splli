<?php

namespace App\DataTables;

use App\Models\UangDiluar;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class UangDiluarDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'uang_diluars.datatables_actions')
        ->editColumn('jumlah_tagihan', function($data){
            return "Rp".number_format($data->jumlah_tagihan, 0, 0, ".");
        })
        ->editColumn('jumlah_tagihan2', function($data){
            return "Rp".number_format($data->jumlah_tagihan2, 0, 0, ".");
        })
        ->editColumn('jumlah_tagihan3', function($data){
            return "Rp".number_format($data->jumlah_tagihan3, 0, 0, ".");
        })
        ->editColumn('jumlah_tagihan4', function($data){
            return "Rp".number_format($data->jumlah_tagihan4, 0, 0, ".");
        })
        ->editColumn('jumlah_tagihan5', function($data){
            return "Rp".number_format($data->jumlah_tagihan5, 0, 0, ".");
        })
        ->editColumn('jumlah_hutang', function($data){
            return "Rp".number_format($data->jumlah_hutang, 0, 0, ".");
        })
        ->editColumn('sisa_hutang', function($data){
            return "Rp".number_format($data->sisa_hutang, 0, 0, ".");
        });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\UangDiluar $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(UangDiluar $model)
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
                    // ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
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
            'nama_konsumen' => ['searchable' => true],
            'hp_konsumen' => ['searchable' => true, 'title' => 'HP Konsumen'],
            'jumlah_tagihan' => ['searchable' => true, 'title' => 'Jumlah Tagihan 1'],
            'jumlah_tagihan2' => ['searchable' => true, 'title' => 'Jumlah Tagihan 2'],
            'jumlah_tagihan3' => ['searchable' => true, 'title' => 'Jumlah Tagihan 3'],
            'jumlah_tagihan4' => ['searchable' => true, 'title' => 'Jumlah Tagihan 4'],
            'jumlah_tagihan5' => ['searchable' => true, 'title' => 'Jumlah Tagihan 5'],
            'jumlah_hutang' => ['searchable' => true],
            'sisa_hutang' => ['searchable' => true],
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
        return 'uang_diluars_datatable_' . time();
    }
}
