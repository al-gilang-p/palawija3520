@extends('admin.layouts.base')

@section('dokumen_link', 'active')

@section('content')
@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Sukses!</strong> {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if (session('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Sukses!</strong> {{ session('error') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

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
                        <th>Komoditas</th>
                        <th>Responden</th>
                        <th>Nama Lokasi</th>
                        <th>Menu</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($wilayah as $data)
                    <tr>
                        <td class="small"></td>
                        <td class="small">{{ $data[ 'id' ] }}</td>
                        <td class="small">{{ $data[ 'nm_kec' ] }}</td>
                        <td class="small">{{ $data['nm_desa'] }}</td>
                        <td class="small">{{ $data['nbs'] }}</td>
                        <td class="small">{{ $data['nks'] }}</td>
                        <td class="small">{{ $data['komoditas'] }}</td>
                        <td class="small">{{ $data['responden'] }}</td>
                        <td class="small">{{ $data['nm_lokasi'] }}</td>
                        <td class="small">{{ $data['dokumen_id'] }}</td>
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
<link href={{ asset("vendor/datatables/dataTables.bootstrap4.min.css") }} rel="stylesheet">
@endsection

@section('jspage')
<!-- page level plugins -->
<script src={{ asset("vendor/datatables/jquery.datatables.min.js") }}></script>
<script src={{ asset("vendor/datatables/datatables.bootstrap4.min.js") }}></script>
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
                    'targets': 9,
                    'orderable': false,
                    'searchable': false,
                    render: function (data, type, row) {
                        if(row[9] == false) {
                            return `
                                <div class="d-flex align-items-center justify-content-center">
                                    <a href="/dokumen/entry/${row[1]}" title="entry" class='btn btn-primary-outline p-0 text-success view'><i class="fas fa-user-edit"></i></a>
                                </div>
                            `;
                        }
                        return `
                            <div class="d-flex align-items-center justify-content-center">
                                <a href="dokumen/view/${row[9]}" title="lihat" class='btn btn-primary-outline p-0 text-primary view'><i class="far fa-eye"></i></a>
                                <a href="dokumen/edit/${row[9]}" title="perbarui" class='btn btn-warning-outline p-0 text-warning edit'><i class="far fa-edit"></i></a>
                                <form method="post" action="dokumen/${row[9]}">
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
