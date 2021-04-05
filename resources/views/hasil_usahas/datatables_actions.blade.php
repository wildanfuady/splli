{!! Form::open(['route' => ['hasilUsahas.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('hasilUsahas.show', $id) }}" class='btn btn-success btn-xs'>
        <i class="fa fa-eye"></i>
    </a>
    <a href="{{ route('hasilUsahas.edit', $id) }}" class='btn btn-primary btn-xs'>
        <i class="fa fa-edit"></i>
    </a>
    {!! Form::button('<i class="fa fa-trash-alt"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Apakah Anda yakin ingin menghapus data ini?')"
    ]) !!}
</div>
{!! Form::close() !!}
