@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Edit Stok Barang</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($stokBarang, ['route' => ['stokBarangs.update', $stokBarang->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('stok_barangs.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Update', ['class' => 'btn btn-primary float-right']) !!}
                <a href="{{ route('stokBarangs.index') }}" class="btn btn-default">Batal</a>
            </div>

           {!! Form::close() !!}

        </div>
    </div>
@endsection
