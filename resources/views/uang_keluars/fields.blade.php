<!-- Tanggal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tanggal', 'Tanggal:') !!}
    {!! Form::text('tanggal', null, ['class' => 'form-control', 'id' => 'tanggal', 'placeholder' => 'dd-mm-yyyy', 'autosave' => 'false', 'autocomplete' => 'off']) !!}
</div>

<!-- Tanggal Field -->
{{-- <div class="form-group col-sm-4">
    {!! Form::label('tanggal_akhir', 'Tanggal Akhir:') !!}
    {!! Form::text('tanggal_akhir', null, ['class' => 'form-control', 'id' => 'tanggal_akhir', 'placeholder' => 'dd-mm-yyyy', 'autosave' => 'false', 'autocomplete' => 'off']) !!}
</div> --}}

<!-- Qty Field -->
<div class="form-group col-sm-6">
    {!! Form::label('qty', 'Qty:') !!}
    {!! Form::number('qty', null, ['class' => 'form-control', 'placeholder' => 0, 'id' => 'quantity']) !!}
</div>

<!-- Harga Field -->
<div class="form-group col-sm-6">
    {!! Form::label('harga', 'Harga:') !!}
    {!! Form::number('harga', null, ['class' => 'form-control', 'placeholder' => 0, 'id' => 'harga']) !!}
</div>

<!-- Total Harga Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_harga', 'Total Harga:') !!}
    <small class="text-danger">Total harga akan muncul setelah quantity dan harga di isi.</small>
    {!! Form::number('total_harga', null, ['class' => 'form-control', 'placeholder' => 0, 'readonly', 'id' => 'total_harga']) !!}
</div>

<!-- Total Keterangan Field -->
<div class="form-group col-sm-12">
    {!! Form::label('keterangan', 'Keterangan:') !!}
    {!! Form::textarea('keterangan', null, ['class' => 'form-control', 'placeholder' => 'Masukan keterangan', 'rows' => 4]) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $('#tanggal').datetimepicker({
                format: 'DD-MM-YYYY',
                useCurrent: true,
                sideBySide: true
            });
            // $('#tanggal_akhir').datetimepicker({
            //     format: 'DD-MM-YYYY',
            //     useCurrent: true,
            //     sideBySide: true
            // });
            var quantity = 0;
            var harga = 0;
            var totalHarga = 0;
            $("#quantity").keyup(function(){
                quantity = $("#quantity").val();
                totalHarga = quantity * harga;
            });
            $("#harga").keyup(function(){
                harga = $("#harga").val();
                totalHarga = quantity * harga;
                $("#total_harga").val(totalHarga);
            });
        });
    </script>
@endpush