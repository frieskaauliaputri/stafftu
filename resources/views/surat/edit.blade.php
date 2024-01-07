@extends('admin.layout.admin')

@section('content')
    <form action="{{ route('surat.update', ['id' => $surat['id']]) }}" method="post" class="card bg-light mt-5 p-5">
       
        @csrf
 
        @method('PATCH')
       
        @if ($errors->any())
            <ul class="alert alert-danger p-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <div class="mb-3 row">
            <label for="letter_code" class="col-sm-2 col-form-label">Kode Surat :</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="letter_code" name="letter_code" value="{{ $surat['letter_code'] }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="name_type" class="col-sm-2 col-form-label">Klasifikasi Surat :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name_type" name="name_type" value="{{ $surat['name_type'] }}">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Ubah Data</button>
    </form>

@endsection
