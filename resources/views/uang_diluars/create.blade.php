@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Tambah Uang Diluar</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::open(['route' => 'uangDiluars.store']) !!}

            <div class="card-body">

                <div class="row">
                    @include('uang_diluars.fields')
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Simpan', ['class' => 'btn btn-primary float-right']) !!}
                <a href="{{ route('uangDiluars.index') }}" class="btn btn-default">Batal</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
