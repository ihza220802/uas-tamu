@extends('app')
@section('content')
<form action="{{ route('Tamus.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Id tamu:</strong>
                <input type="text" name="id_tamu" class="form-control" placeholder="ID tamu">
                @error('name')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tanggal:</strong>
                <input type="date" name="tanggal" class="form-control" placeholder="tanggal tamu">
                @error('tanggal')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Alamat:</strong>
                <input type="text" name="nama_alamat" class="form-control" placeholder="nama_alamat">
                @error('name')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama:</strong>
                <select name="nama" id="nama" class="form-select">
                    <option value="">Pilih</option>
                    @foreach($managers as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                @error('alias')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row col-xs-12 col-sm-12 col-md-12 mt-3">
            <div class="col-md-10 form-group">
                <input type="text" name="search" id="search" class="form-control" placeholder="Masukan Acara">
                @error('acara')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-2 form-group text-center">
                <button class="btn btn-secondary" type="button" name="btnAdd" id="btnAdd"><i class="fa fa-plus"></i>Tambah</button>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Acara</th>
                        <th scope="col">Tempat</th>
                        <th scope="col">panitia</th>
                        <th scope="col">tamu</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody id="detail">
                </tbody>
            </table>
            <!-- <div class="row col-xs-12 col-sm-12 col-md-12 mt-3">
                <div class="col-md-10 form-group">
                    <strong> Grand Total :</strong>
                    <input type="text" name="jml" class="form-control" placeholder="Masukan Acara">
                    @error('tanggal')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3 ml-3">Submit</button>
        </div> -->
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Jumlah Acara :</strong>
                    <input type="text" name="jml" class="form-control" placeholder="Jumlah Data">
                    @error('tanggal')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3 ml-3">Submit</button>
        </div>
</form>
@endsection
@section('js')
<script type="text/javascript">
    var path = "{{ route('search.acara') }}";
    $("#search").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: path,
                type: 'GET',
                dataType: "json",
                data: {
                    search: request.term
                },
                success: function(data) {
                    response(data);
                }
            });
        },
        select: function(event, ui) {
            $('#search').val(ui.item.label);
           console.log($("input[name=jml]").val());
            if($("input[name=jml]").val() > 0){
                for (let i = 1; i <=  $("input[name=jml]").val(); i++) {
                    id = $("input[name=id_acara"+i+"]").val();
                    if(id==ui.item.id){
                        alert(ui.item.value+' sudah ada!');
                        break;
                    }else{
                        add(ui.item.id);
                    }
                }
            }else{
                add(ui.item.id);
            } 
            return false;
        }
    });

    function add(id) {
        const path = "{{ route('acaras.index') }}/" + id;
        var html = "";
        var no = 0;
        if ($('#detail tr').length > 0) {
            var html = $('#detail').html();
            no = no + $('#detail tr').length;
        }

        $.ajax({
            url: path,
            type: 'GET',
            dataType: "json",
            success: function(data) {
                console.log(data);
                no++;
                html += '<tr>' +
                    '<td>' + no + '<input type="hidden" name="id_acara' + no + '" class="form-control" value="' + data.id + '"></td>' +
                    '<td><input type="text" name="acara' + no + '" class="form-control" value="' + data.acara + '"></td>' +
                    '<td><input type="text" name="tempat' + no + '" class="form-control" value="' + data.tempat + '"></td>' +
                    '<td><input type="text" name="panitia' + no + '" class="form-control" value="' + data.panitia + '"></td>' +
                    '<td><input type="text" name="tamu' + no + '" class="form-control"></td>' +
                    '<td><input type="text" name="keterangan' + no + '" class="form-control"></td>' +
                    '<td><a href="#" class="btn btn-sm btn-danger">Delete</a></td>' +
                    '</tr>';
                $('#detail').html(html);
                $("input[name=jml]").val(no);
            }
        });
    }

    // function sumQty(no, q){
    //     var price = $("input[name=price]"+no+"]").val() ;
    //     var subtotal = q*parseInt(price);
    //     $("input[name=sub_total"+no+"]").val(subtotal);
    //     console.log(q+"*"+price+"="+subtotal);
    //     subTotal();
    // }

    // function sumTotal(){
    //     var total = 0 ;
    //     for (let i = 1; i<= $("input[name]").val(); i++){
    //         var sub = $("input[name=sub_total"+i+"]").val();
    //         total = total + parseInt(sub);
    //     }
    //     $("input[name=jumlah]").val(total);
    // // }
</script>
@endsection