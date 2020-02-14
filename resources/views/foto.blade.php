@extends('template/layouts')

@section('content')
<div class="text-center">
    <h3>Data Pengumpulan Foto Guru</h3>
    <h5>Qiraati Pondok Gede</h5>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table table-striped table-bordered" width="100%" id="users-table">
            <thead>
                <tr>
                    <th>No Induk</th>
                    <th>Nama Guru</th>
                    <th>Lembaga</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@stop

@push('scripts')
<script>
    $(document).ready(function () {
        $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: 'guru/json',
            columns: [{
                    data: 'id_guru',
                    name: 'id_guru'
                },
                {
                    data: 'nama_guru',
                    name: 'nama_guru'
                },
                {
                    data: 'lembaga',
                    name: 'lembaga'
                },
                {
                    data: 'foto',
                    name: 'foto',
                    render: function (data, type, full, meta) {
                        return "<img src=\"/images/" + data + "\" height=\"50\" />";
                    }
                },
                {
                    data: 'id_guru',
                    render: function (data) {
                        var edit_button = '<a href="edit/' + data +
                            '" class="btn btn-primary" role="button" aria-pressed="true">Ubah Gambar</a>';
                        return edit_button;
                    }
                },
            ]
        });
    });

</script>
@endpush
