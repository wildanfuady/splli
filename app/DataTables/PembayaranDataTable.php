<?php

namespace App\DataTables;

use App\Models\Pembayaran;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class PembayaranDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'pembayarans.datatables_actions')
        ->editColumn('harga_grosir', function($data){
            return "Rp".number_format($data->harga_grosir, 0, 0, ".");
        })
        ->editColumn('harga_jual', function($data){
            return "Rp".number_format($data->harga_jual, 0, 0, ".");
        })
        ->editColumn('harga_pasang', function($data){
            return "Rp".number_format($data->harga_pasang, 0, 0, ".");
        })
        ->editColumn('jasa_service', function($data){
            return "Rp".number_format($data->jasa_service, 0, 0, ".");
        })
        ->editColumn('total_harga', function($data){
            return "Rp".number_format($data->total_harga, 0, 0, ".");
        })
        ->editColumn('selisih', function($data){
            return "Rp".number_format($data->selisih, 0, 0, ".");
        })
        ->editColumn('tanggal', function($data){
            return date('d-m-Y H:i', strtotime($data->tanggal));
        })
        ->editColumn('nama_sparepart', function($data){
            return $data->barang == null ? "" : $data->barang->nama_barang;
        });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Pembayaran $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Pembayaran $model)
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
            'id_po' => ['width' => '170px', 'searchable' => true, 'title' => 'ID PO'],
            'tanggal' => ['searchable' => true],
            'plat_motor' => ['searchable' => true],
            'nama_konsumen' => ['searchable' => true],
            'nama_sparepart' => ['searchable' => true],
            'harga_grosir' => ['searchable' => true],
            'harga_jual' => ['searchable' => true],
            'qty' => ['searchable' => true],
            'harga_pasang' => ['searchable' => true],
            'jasa_service' => ['searchable' => true],
            'total_harga' => ['searchable' => true],
            'selisih' => ['searchable' => true]
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'pembayarans_datatable_' . time();
    }
}
