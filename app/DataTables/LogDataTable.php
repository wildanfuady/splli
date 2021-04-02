<?php

namespace App\DataTables;

use App\Models\Log;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class LogDataTable extends DataTable
{
    protected $index = 0;

    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable
        ->addColumn('no', function(){
            return ++$this->index;
        })
        ->editColumn('user_id', function($data){
            return $data->user->name;
        })
        ->editColumn('created_at', function($data){
            // $date = \Carbon\Carbon::createFromFormat('d-m-Y H:i', $data);
            return $data->created_at->format('d-m-Y H:i');
        });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Log $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Log $model)
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
            // ->parameters([
            //     'dom'       => 'Bfrtip',
            //     'stateSave' => true,
            //     'order'     => [[0, 'desc']],
            //     'buttons'   => [
            //         ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
            //         ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
            //         ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
            //         ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
            //         ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
            //     ],
            // ]);
            ;
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'no' => ['searchable' => false, 'title' => 'No'],
            'user_id' => ['searchable' => false, 'title' => 'Nama User'],
            'ip' => ['searchable' => false, 'title' => 'IP Address'],
            'created_at' => ['searchable' => false, 'title' => 'Tanggal Login'],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'logs_datatable_' . time();
    }
}
