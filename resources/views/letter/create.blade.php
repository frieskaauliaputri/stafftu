{{-- mengimpor template --}}
@extends('admin.layout.admin')

{{-- mengisi yield --}}
@section('content')
    <form action="{{ route('letter.store') }}" method="post" class="card bg-light mt-5 p-5">
        {{-- sebagai token akses database --}}
        @csrf
        {{-- jika terjadi error, tampilkan bagian errornya --}}
        @if ($errors->any())
            <ul class="alert alert-danger p-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        @if (Session::get('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        <div class="mb-3 row">
            <label for="letter_type_id" class="col-sm-2 col-form-label">Nomor Surat :</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="letter_type_id" name="letter_type_id">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="letter_perihal" class="col-sm-2 col-form-label">Perihal Surat :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="letter_perihal" name="letter_perihal">
            </div>
            <div class="mb-3 row">
            <label for="recipients" class="col-sm-2 col-form-label">Penerima Surat :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="recipients" name="recipients">
            </div>
            <div class="mb-3 row">
            <label for="notulis" class="col-sm-2 col-form-label">Notulis :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="notulis" name="notulis">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Data</button>
    </form>

@endsection
