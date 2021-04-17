{!! Form::open(['route' => ['barangs.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('barangs.show', $id) }}" class='btn btn-success btn-xs'>
        <i class="fa fa-eye"></i>
    </a>
    <a href="{{ route('barangs.edit', $id) }}" class='btn btn-primary btn-xs'>
        <i class="fa fa-edit"></i>
    </a>
    {!! Form::button('<i class="fa fa-trash-alt"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Menghapus data barang berarti akan menghapus data stok barang. Apakah Anda yakin ingin menghapus pembelian barang ini?')"
    ]) !!}
</div>
{!! Form::close() !!}
