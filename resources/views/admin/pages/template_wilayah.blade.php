@extends('admin.layouts.base')

@section('wilayah_link', 'active')

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
    <strong>Gagal!</strong> {{ session('error') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong>
    @foreach ($errors->all() as $error)
    <p class="m-0">{{ $error }}</p>
    @endforeach
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<div class="card shadow mb-3">
    <div class="card-header py-3 d-flex justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Input Template Wilayah Kerja</h6>
        <a href="{{ route('admin.download_wilayah') }}" class="btn btn-success btn-xs">Download Template</a>
    </div>
    <div class="card-body">
        <form method="post" action="{{ route('admin.store_wilayah') }}" id="form_import_excel" class="p-2"
            enctype="multipart/form-data">
            <div class="form-group m-0">
                <div class="custom-file mb-2">
                    @csrf
                    <input type="file" class="custom-file-input" id="temp_file" aria-describedby="temp_file"
                        name="temp_file" required>
                    <label class="custom-file-label" for="inputGroupFile01">Pilih File</label>
                </div>
                <input type="submit" name="import_button" id="import_button" class="btn btn-primary shadow-sm"
                    value="Import" />
            </div>
        </form>
    </div>
</div>

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
                        <th>Nama Kecamatan</th>
                        <th>Nama Desa</th>
                        <th>NBS</th>
                        <th>NKS</th>
                        <th>Komoditas</th>
                        <th>Responden</th>
                        <th>Nama Lokasi</th>
                        <th>Nama PML</th>
                        <th>Nama PCL</th>
                        <th>Menu</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($wilayah as $data)
                    <tr>
                        <td class="small"></td>
                        <td><small>{{ $data['nm_kec'] }}</small></td>
                        <td><small>{{ $data['nm_desa'] }}</small></td>
                        <td><small>{{ $data['nbs'] }}</small></td>
                        <td><small>{{ $data['nks'] }}</small></td>
                        <td><small>{{ $data['komoditas'] }}</small></td>
                        <td><small>{{ $data['responden'] }}</small></td>
                        <td><small>{{ $data['nm_lokasi'] }}</small></td>
                        <td><small>{{ $data['nm_pml'] }}</small></td>
                        <td><small>{{ $data['nm_pcl'] }}</small></td>
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
<!-- Custom styles for this page -->
<link href={{ asset("vendor/datatables/dataTables.bootstrap4.min.css"); }} rel="stylesheet">
@endsection

@section('jspage')
<!-- page level plugins -->
<script src={{ asset("vendor/datatables/jquery.datatables.min.js"); }}></script>
<script src={{ asset("vendor/datatables/datatables.bootstrap4.min.js"); }}></script>
<script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js">
</script>

<script>
    $(document).ready(function () {
        bsCustomFileInput.init();

        $('#form_import_excel').on('submit', function () {
            $.LoadingOverlay("show");
        });

        let t = $('#dataTable').DataTable({
            'columnDefs': [{
                    'orderable': false,
                    'searchable': false,
                    'targets': 0
                },
                {
                    'targets': 10,
                    'orderable': false,
                    'searchable': false,
                    render: function (data, type, row) {
                        return `
                        <div class="d-flex align-items-center justify-content-center">
                            <a href="wilayah/view/${row[10]}" title="lihat" class='btn btn-primary-outline p-0 text-primary view'><i class="far fa-eye"></i></a>
                            <a href="wilayah/edit/${row[10]}" title="perbarui" class='btn btn-warning-outline p-0 text-warning edit'><i class="far fa-edit"></i></a>
                            <form method="post" action="wilayah/${row[10]}">
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
