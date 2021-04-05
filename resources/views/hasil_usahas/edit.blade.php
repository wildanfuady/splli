@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Edit Hasil Usaha</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($hasilUsaha, ['route' => ['hasilUsahas.update', $hasilUsaha->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('hasil_usahas.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Update', ['class' => 'btn btn-primary float-right']) !!}
                <a href="{{ route('hasilUsahas.index') }}" class="btn btn-default">Batal</a>
            </div>

           {!! Form::close() !!}

        </div>
    </div>
@endsection
