@extends('admin.layouts.base')

@section('page_heading', 'Petugas')

@section('template_link', 'active')

@section('template_arrow', 'active')

@section('template_collapse', 'show')

@section('template_petugas_link', 'active')

@section('content')
<div class="card shadow mb-3">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Assign Username Petugas</h6>
    </div>
    <div class="card-body p-4">
        <h6 class="text-success">Total Petugas dengan username: <strong>{{ $assigned_petugas }}</strong> Petugas</h6>
        <h6 class="text-danger">Total Petugas tanpa username: <strong>{{ $unassigned_petugas }}</strong> Petugas</h6>
        <form class="form-inline" action="{{ route('admin.store_petugas') }}" method="POST">
            @csrf
            <label class="my-1 mr-2" for="select_petugas">Petugas</label>
            <select class="custom-select my-1 mr-sm-2" id="select_petugas" name="kd_pcl" required>
                @if (count($distinct_petugas) == 0)
                <option value="" disabled selected>No Data</option>
                @endif
                @foreach ($distinct_petugas as $data)
                <option value="{{ $data['kd_pcl'] }}">{{ $data['nm_pcl'] }}</option>
                @endforeach
            </select>

            <label class="sr-only" for="username">Username</label>
            <input type="text" class="form-control my-1 mr-sm-2" placeholder="username" name="username" required />

            <button type="submit" class="btn btn-primary my-1">Simpan</button>
        </form>
    </div>
</div>

<div class="card shadow mb-3">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Petugas</h6>
    </div>
    <div class="card-body p-4">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th></th>
                        <th>Kode Petugas</th>
                        <th>Nama Petugas</th>
                        <th>Username</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($petugas as $data)
                    <tr>
                        <td></td>
                        <td>{{ $data[ 'kd_pcl' ] }}</td>
                        <td>{{ $data['nm_pcl'] }}</td>
                        <td>{{ $data['username'] }}</td>
                        <td>{{ $data['id'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('csspage')
<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('jspage')
<script src="vendor/datatables/jquery.datatables.min.js"></script>
<script src="vendor/datatables/datatables.bootstrap4.min.js"></script>

<script>
    let t = $('#dataTable').DataTable({
        'columnDefs': [{
                'orderable': false,
                'searchable': false,
                'targets': 0
            },
            {
                'targets': 4,
                'orderable': false,
                'searchable': false,
                render: function (data, type, row) {
                    return `
                    <div class="d-flex align-items-center justify-content-center">
                            <a href="" title="lihat" class='btn btn-primary-outline text-primary p-0 view'><i class="far fa-eye"></i></a>
                            <a href="" title="perbarui" class='btn btn-warning-outline text-warning p-0 edit'><i class="far fa-edit"></i></a>
                            <form method="post" action="">
                                @csrf
                                @method('delete')
                                <button type="button" title="hapus" class='btn btn-danger-outline text-danger p-0 delete'><i class="far fa-trash-alt"></i></button>
                            </form>
                            </div>
                        `;
                }
            }
        ],
        "order": [
            [1, "asc"]
        ]
    });

    t.on('order.dt search.dt', function () {
        t.column(0, {
            search: 'applied',
            order: 'applied'
        }).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();

</script>
@endsection
