<!-- Tanggal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tanggal', 'Tanggal:') !!}
    {!! Form::text('tanggal', null, ['class' => 'form-control tanggal', 'placeholder' => 'dd-mm-yyyy hh:mm']) !!}
</div>

<!-- Uang Masuk Field -->
<div class="form-group col-sm-6">
    {!! Form::label('uang_masuk', 'Uang Masuk:') !!}
    {!! Form::number('uang_masuk', null, ['class' => 'form-control', 'placeholder' => 0, 'id' => 'uang_masuk']) !!}
</div>

<!-- Uang Keluar Field -->
<div class="form-group col-sm-6">
    {!! Form::label('uang_keluar', 'Uang Keluar:') !!}
    {!! Form::number('uang_keluar', null, ['class' => 'form-control', 'placeholder' => 0, 'id' => 'uang_keluar']) !!}
</div>

<!-- Total Saldo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_saldo', 'Total Saldo:') !!}
    <small class="text-danger">Hasil = Uang Masuk - Uang Keluar</small>
    {!! Form::number('total_saldo', null, ['class' => 'form-control', 'placeholder' => 0, 'id' => 'total_saldo','readonly']) !!}
</div>

<!-- Keterangan Field -->
<div class="form-group col-sm-12">
    {!! Form::label('keterangan', 'Keterangan:') !!}
    {!! Form::textarea('keterangan', null, ['class' => 'form-control', 'placeholder' => 'Masukan keterangan','rows' => 4]) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $('.tanggal').datetimepicker({
                format: 'DD-MM-YYYY hh:mm',
                useCurrent: true,
                sideBySide: true
            });
            var uangMasuk = 0;
            var uangKeluar = 0;
            var totalSaldo = 0;
            $("#uang_masuk").keyup(function(){
                uangMasuk = $("#uang_masuk").val();
                uangKeluar = $("#uang_keluar").val();
                totalSaldo = uangMasuk - uangKeluar;
                // $("#total_saldo").val(totalSaldo);
            });
            $("#uang_keluar").keyup(function(){
                uangMasuk = $("#uang_masuk").val();
                uangKeluar = $("#uang_keluar").val();
                totalSaldo = uangMasuk - uangKeluar;
                $("#total_saldo").val(totalSaldo);
            });
        });
        
    </script>
@endpush