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

<!-- Jumlah Hutang Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jumlah_hutang', 'Jumlah Hutang:') !!}
    {!! Form::number('jumlah_hutang', null, ['class' => 'form-control', 'placeholder' => '0', 'id' => 'jumlah_hutang']) !!}
</div>

<!-- Sisa Hutang Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sisa_hutang', 'Sisa Hutang:') !!}
    <small class="text-danger">Hasil akan muncul jika jumlah tagihan dan jumlah hutang sudah diisi.</small>
    {!! Form::text('sisa_hutang', null, ['class' => 'form-control', 'placeholder' => '0', 'readonly', 'id' => 'sisa_hutang']) !!}
</div>

<!-- Jumlah Tagihan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jumlah_tagihan', 'Jumlah Tagihan 1:') !!}
    {!! Form::number('jumlah_tagihan', null, ['class' => 'form-control', 'placeholder' => '0', 'id' => 'jumlah_tagihan']) !!}
</div>

<!-- Jumlah Tagihan2 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jumlah_tagihan2', 'Jumlah Tagihan 2:') !!}
    {!! Form::number('jumlah_tagihan2', null, ['class' => 'form-control', 'placeholder' => '0', 'id' => 'jumlah_tagihan2']) !!}
</div>

<!-- Jumlah Tagihan3 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jumlah_tagihan3', 'Jumlah Tagihan 3:') !!}
    {!! Form::number('jumlah_tagihan3', null, ['class' => 'form-control', 'placeholder' => '0', 'id' => 'jumlah_tagihan3']) !!}
</div>

<!-- Jumlah Tagihan4 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jumlah_tagihan4', 'Jumlah Tagihan 4:') !!}
    {!! Form::number('jumlah_tagihan4', null, ['class' => 'form-control', 'placeholder' => '0', 'id' => 'jumlah_tagihan4']) !!}
</div>

<!-- Jumlah Tagihan5 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jumlah_tagihan5', 'Jumlah Tagihan 5:') !!}
    {!! Form::number('jumlah_tagihan5', null, ['class' => 'form-control', 'placeholder' => '0', 'id' => 'jumlah_tagihan5']) !!}
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
            var jumlahTagihan1 = 0;
            var jumlahTagihan2 = 0;
            var jumlahTagihan3 = 0;
            var jumlahTagihan4 = 0;
            var jumlahTagihan5 = 0;
            var jumlahHutang = 0;
            var sisaHutang = 0;
            $("#jumlah_tagihan").keyup(function(){
                jumlahTagihan = $("#jumlah_tagihan").val();
                jumlahTagihan2 = $("#jumlah_tagihan2").val();
                jumlahTagihan3 = $("#jumlah_tagihan3").val();
                jumlahTagihan4 = $("#jumlah_tagihan4").val();
                jumlahTagihan5 = $("#jumlah_tagihan5").val();
                jumlahHutang = $("#jumlah_hutang").val();
                sisaHutang = jumlahHutang - jumlahTagihan - jumlahTagihan2 - jumlahTagihan3 - jumlahTagihan4 - jumlahTagihan5;
                $("#sisa_hutang").val(sisaHutang);
            });
            $("#jumlah_tagihan2").keyup(function(){
                jumlahTagihan = $("#jumlah_tagihan").val();
                jumlahTagihan2 = $("#jumlah_tagihan2").val();
                jumlahTagihan3 = $("#jumlah_tagihan3").val();
                jumlahTagihan4 = $("#jumlah_tagihan4").val();
                jumlahTagihan5 = $("#jumlah_tagihan5").val();
                jumlahHutang = $("#jumlah_hutang").val();
                sisaHutang = jumlahHutang - jumlahTagihan - jumlahTagihan2 - jumlahTagihan3 - jumlahTagihan4 - jumlahTagihan5;
                console.log(jumlahTagihan2);
                $("#sisa_hutang").val(sisaHutang);
            });
            $("#jumlah_tagihan3").keyup(function(){
                jumlahTagihan = $("#jumlah_tagihan").val();
                jumlahTagihan2 = $("#jumlah_tagihan2").val();
                jumlahTagihan3 = $("#jumlah_tagihan3").val();
                jumlahTagihan4 = $("#jumlah_tagihan4").val();
                jumlahTagihan5 = $("#jumlah_tagihan5").val();
                jumlahHutang = $("#jumlah_hutang").val();
                sisaHutang = jumlahHutang - jumlahTagihan - jumlahTagihan2 - jumlahTagihan3 - jumlahTagihan4 - jumlahTagihan5;
                $("#sisa_hutang").val(sisaHutang);
            });
            $("#jumlah_tagihan4").keyup(function(){
                jumlahTagihan = $("#jumlah_tagihan").val();
                jumlahTagihan2 = $("#jumlah_tagihan2").val();
                jumlahTagihan3 = $("#jumlah_tagihan3").val();
                jumlahTagihan4 = $("#jumlah_tagihan4").val();
                jumlahTagihan5 = $("#jumlah_tagihan5").val();
                jumlahHutang = $("#jumlah_hutang").val();
                sisaHutang = jumlahHutang - jumlahTagihan - jumlahTagihan2 - jumlahTagihan3 - jumlahTagihan4 - jumlahTagihan5;
                $("#sisa_hutang").val(sisaHutang);
            });
            $("#jumlah_tagihan5").keyup(function(){
                jumlahTagihan = $("#jumlah_tagihan").val();
                jumlahTagihan2 = $("#jumlah_tagihan2").val();
                jumlahTagihan3 = $("#jumlah_tagihan3").val();
                jumlahTagihan4 = $("#jumlah_tagihan4").val();
                jumlahTagihan5 = $("#jumlah_tagihan5").val();
                jumlahHutang = $("#jumlah_hutang").val();
                sisaHutang = jumlahHutang - jumlahTagihan - jumlahTagihan2 - jumlahTagihan3 - jumlahTagihan4 - jumlahTagihan5;
                $("#sisa_hutang").val(sisaHutang);
            });
            $("#jumlah_hutang").keyup(function(){
                jumlahTagihan = $("#jumlah_tagihan").val();
                jumlahTagihan2 = $("#jumlah_tagihan2").val();
                jumlahTagihan3 = $("#jumlah_tagihan3").val();
                jumlahTagihan4 = $("#jumlah_tagihan4").val();
                jumlahTagihan5 = $("#jumlah_tagihan5").val();
                jumlahHutang = $("#jumlah_hutang").val();
                sisaHutang = jumlahHutang - jumlahTagihan - jumlahTagihan2 - jumlahTagihan3 - jumlahTagihan4 - jumlahTagihan5;
                console.log("jumlah hutang = " + jumlahHutang);
                $("#sisa_hutang").val(sisaHutang);
            });
                
            
            // $("#sisa_hutang").val(sisaHutang);
        });
    </script>
@endpush