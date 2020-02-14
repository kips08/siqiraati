@extends('template/layouts')

@section('content')

<h3 class="text-center">Edit Foto Guru</h3>



<br />
<br />
<div class="row">
    <div class="col-lg-4"></div>
    <div class="col-lg-4">
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
        @endif

        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif


        <a class="btn btn-danger" href="/guru"> Kembali</a>
        @foreach($guru as $p)
        <form action="{{route('img.upload.post')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $p->id_guru }}"> <br />
            <div class="row mb-2">
                <div class="col-md-7 border">
                    <h5>{{ $p->id_guru }}</h5>
                    <h5>{{ $p->nama_guru }}</h5>
                    <h6>{{ $p->lembaga }}</h6>
                </div>
                <div class="col-lg-5 border">
                    <?php 
                    if($p->foto == ''){
                        echo "<p class='text-center mt-4'>Foto belum di upload</p>";
                    } else { ?>
                    <img src="{{asset('/images/').'/'.$p->foto}}" class="img-fluid">
                    <?php } ?>
                </div>
            </div>
            <p class="text-center">Ubah Foto</p>
            <input type="file" name="image" class="form-control">
            <br>
            <input type="submit" value="Kirim Foto">
        </form>
        @endforeach

    </div>
    <div class="col-md-4"></div>

</div>

@endsection
