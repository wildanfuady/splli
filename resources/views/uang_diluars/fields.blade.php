<!-- Nama Konsumen Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_konsumen', 'Nama Konsumen:') !!}
    {!! Form::text('nama_konsumen', null, ['class' => 'form-control', 'placeholder' => 'Masukan nama konsumen']) !!}
</div>

<!-- Hp Konsumen Field -->
<div class="form-group col-sm-6">
    {!! Form::label('hp_konsumen', 'HP Konsumen:') !!}
    {!! Form::text('hp_konsumen', null, ['class' => 'form-control', 'placeholder' => 'Masukan nomor HP konsumen']) !!}
</div>

<!-- Jumlah Tagihan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jumlah_tagihan', 'Jumlah Tagihan:') !!}
    {!! Form::number('jumlah_tagihan', null, ['class' => 'form-control', 'placeholder' => '0', 'id' => 'jumlah_tagihan']) !!}
</div>

<!-- Jumlah Hutang Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jumlah_hutang', 'Jumlah Hutang:') !!}
    {!! Form::number('jumlah_hutang', null, ['class' => 'form-control', 'placeholder' => '0', 'id' => 'jumlah_hutang']) !!}
</div>

<!-- Sisa Hutang Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sisa_hutang', 'Sisa Hutang:') !!}
    <small class="text-danger">Hasil perhitungan akan muncul jika jumlah tagihan dan jumlah hutang sudah diisi.</small>
    {!! Form::text('sisa_hutang', null, ['class' => 'form-control', 'placeholder' => '0', 'readonly', 'id' => 'sisa_hutang']) !!}
</div>

<!-- Keterangan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('keterangan', 'Keterangan:') !!}
    {!! Form::textarea('keterangan', null, ['class' => 'form-control', 'rows' => 4, 'placeholder' => 'Masukan keterangan']) !!}
</div>

@push('page_scripts')
    <script>
        $(document).ready(function(){
            var jumlahTagihan = 0;
            var jumlahHutang = 0;
            var sisaHutang = 0;
            $("#jumlah_tagihan").keyup(function(){
                jumlahTagihan = $("#jumlah_tagihan").val();
                sisaHutang = jumlahHutang - jumlahTagihan;
            });
            $("#jumlah_hutang").keyup(function(){
                jumlahHutang = $("#jumlah_hutang").val();
                sisaHutang = jumlahHutang - jumlahTagihan;
                console.log("jumlah hutang = " + jumlahHutang);
                $("#sisa_hutang").val(sisaHutang);
            });
                
            
            $("#sisa_hutang").val(sisaHutang);
        });
    </script>
@endpush