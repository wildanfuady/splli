<!-- Tanggal Field -->
<div class="form-group col-sm-12">
    {!! Form::label('tanggal', 'Tanggal:') !!}
    <div class="input-group">
    {!! Form::text('tanggal', null, ['class' => 'form-control tanggal', 'placeholder' => 'dd-mm-yyyy', 'autosave' => 'false', 'autocomplete' => 'off']) !!}
    <div class="input-group-append">
        <button class="btn btn-success" id="cekUang" type="button">Cek Uang Masuk dan Keluar</button>
    </div>
</div>
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
                format: 'DD-MM-YYYY',
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
            $("#cekUang").on('click', function(){
                var i = $("#tanggal").val();
                if(i == null || i == ""){
                    alert("Pilih tanggal terlebih dahulu.");
                }
                var url1 = "{{ url('api/hasil_usaha/get_uang_masuk_by_tanggal/') }}";
                var url2 = "{{ url('api/hasil_usaha/get_uang_keluar_by_tanggal/') }}";
                console.log(url1);
                console.log(url2);
                var uangMasuk = 0;
                var uangKeluar = 0;
                $.ajax({
                    type: 'GET',
                    url: url1 + '/' + i,
                    success: function (data) {
                        console.log(data);

                        if(data != null){
                            // clear data
                            $('#uang_masuk').val(' ');

                            // change data
                            $('#uang_masuk').val(data);
                            uangMasuk = data;
                            uangKeluar = $("#uang_keluar").val();
                            totalSaldo = uangMasuk - uangKeluar;
                            $("#total_saldo").val(totalSaldo);
                        } else {
                            $('#uang_masuk').val(' ');
                        }
                    }
                });
                $.ajax({
                    type: 'GET',
                    url: url2 + '/' + i,
                    success: function (data) {
                        console.log(data);

                        if(data != null){
                            // clear data
                            $('#uang_keluar').val(' ');

                            // change data
                            $('#uang_keluar').val(data);
                            uangKeluar = data;
                            uangMasuk = $("#uang_masuk").val();
                            totalSaldo = uangMasuk - uangKeluar;
                            $("#total_saldo").val(totalSaldo);
                        } else {
                            $('#uang_keluar').val(' ');
                        }
                    }
                });
                totalSaldo = uangMasuk - uangKeluar;
                $("#total_saldo").val(totalSaldo);
            });
        });
        
    </script>
@endpush