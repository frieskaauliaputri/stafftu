@extends('admin.layout.admin')

@section('content')
    @if (Session::get('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
    @if (Session::get('deleted'))
        <div class="alert alert-warning">{{ Session::get('deleted') }}</div>
    @endif
    <h1>Data Staff TU</h1>
    <br>
    <a href="{{ route('users.create')  }}" class="btn btn-success mb-4">Tambah</a>
    <table class="table table-striped table-bordered table-hovered">

        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Aksi</th>
                
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach ($staff  as $item)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item['name'] }}</td>
                    <td>{{ $item['email'] }}</td>
                    <td>{{ $item['role'] }}</td>
        
                
                    <td class="d-flex">
                       
                        <a href="{{ route('users.edit', $item['id']) }}" class="btn btn-success">Edit</a>
                        <button type="button" class="btn btn-danger delete-button" data-toggle="modal"
                        data-target="#deleteModal" data-id="{{ $item['id'] }}">
                        Hapus
                    </button>
                    </td>
                </tr>
                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    {{-- <span aria-hidden="true">&times;</span> --}}
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus Data ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <form id="deleteForm" method="Post" action="{{ route('users.destroy', $item->id) }}">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
            @endforeach
        </tbody>
    </table>
    <!-- Bootstrap Delete Confirmation Modal -->
<script>
    // JavaScript to handle the delete button click event
    $(document).ready(function () {
        $(".delete-button").click(function () {
            var id = $(this).data('id');
            
        });
    });
</script>
@endsection
