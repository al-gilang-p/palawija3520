@extends('admin.layouts.base')

@section('dokumen_link', 'active')

@section('content')

<div class="card shadow">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Wilayah Kerja</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th></th>
                        <th>ID</th>
                        <th>Nama Kecamatan</th>
                        <th>Nama Desa</th>
                        <th>NBS</th>
                        <th>NKS</th>
                        <th>ID Segmen</th>
                        <th>Nama Lokasi</th>
                        <th>Menu</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($wilayah as $data)
                    <tr>
                        <td></td>
                        <td>{{ $data[ 'id' ] }}</td>
                        <td>{{ $data[ 'nm_kec' ] }}</td>
                        <td>{{ $data['nm_desa'] }}</td>
                        <td>{{ $data['nbs'] }}</td>
                        <td>{{ $data['nks'] }}</td>
                        <td>{{ $data['id_segmen'] }}</td>
                        <td>{{ $data['nm_lokasi'] }}</td>
                        <td>{{ $data['dokumen_id'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@section('csspage')
<!-- Custom styles for this page -->
<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('jspage')
<!-- page level plugins -->
<script src="vendor/datatables/jquery.datatables.min.js"></script>
<script src="vendor/datatables/datatables.bootstrap4.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js">
</script>

<script>
    $(document).ready(function () {
        let t = $('#dataTable').DataTable({
            'columnDefs': [{
                    'orderable': false,
                    'searchable': false,
                    'targets': 0
                },
                {
                    'targets': 1,
                    'visible': false,
                    'searchable': false
                },
                {
                    'targets': 8,
                    'orderable': false,
                    'searchable': false,
                    render: function (data, type, row) {
                        if(row[8] == false) {
                            return `
                                <div class="d-flex align-items-center justify-content-center">
                                    <a href="/dokumen/entry/${row[1]}" title="entry" class='btn btn-primary-outline p-0 text-success view'><i class="fas fa-user-edit"></i></a>
                                </div>
                            `;
                        }
                        return `
                            <div class="d-flex align-items-center justify-content-center">
                                <a href="dokumen/view/${row[8]}" title="lihat" class='btn btn-primary-outline p-0 text-primary view'><i class="far fa-eye"></i></a>
                                <a href="dokumen/edit/${row[8]}" title="perbarui" class='btn btn-warning-outline p-0 text-warning edit'><i class="far fa-edit"></i></a>
                                <form method="post" action="dokumen/${row[8]}">
                                    @csrf
                                    @method('delete')
                                    <button type="button" title="hapus" class='btn btn-danger-outline p-0 text-danger delete'><i class="far fa-trash-alt"></i></button>
                                </form>
                            </div>
                        `;
                    }
                }
            ],
            "order": [
                [2, "asc"]
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

        $('#dataTable .delete').on('click', function (e) {
            const form = $(this).parents('form');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.LoadingOverlay("show");
                    form.submit();
                }
            });
        });
    });

</script>
@endsection
