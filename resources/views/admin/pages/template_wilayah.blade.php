@extends('admin.layouts.base')

@section('page_heading', 'Wilayah')

@section('template_link', 'active')

@section('template_collapse', 'show')

@section('template_wilayah_link', 'active')

@section('content')
{{-- @if ($status == 'ok')
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Sukses!</strong> {{ content }}
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button>
</div>
@elseif($status == 'error')
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong> {{ content }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif --}}

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
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Input Template Wilayah Kerja</h6>
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
                        <th>ID Segmen</th>
                        <th>Nama Lokasi</th>
                        <th>Nama PML</th>
                        <th>Nama PCL</th>
                        <th>Menu</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($wilayah as $data)
                    <tr>
                        <td></td>
                        <td>{{ data.nm_kec }}</td>
                    <td>{{ data.nm_desa }}</td>
                    <td>{{ data.nbs }}</td>
                    <td>{{ data.nks }}</td>
                    <td>{{ data.id_segmen }}</td>
                    <td>{{ data.nm_lokasi }}</td>
                    <td>{{ data.nm_pml }}</td>
                    <td>{{ data.nm_pcl }}</td>
                    <td>{{ data.id }}</td>
                    </tr>
                    @endforeach --}}
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
                    'targets': 9,
                    'orderable': false,
                    'searchable': false,
                    render: function (data, type, row) {
                        return `
                            <a href="" title="lihat" class='btn btn-primary-outline btn-sm text-primary p-0 view'><i class="far fa-eye"></i></a>
                            <button title="perbarui" class='btn btn-warning-outline btn-sm text-warning p-0 edit'><i class="far fa-edit"></i></button>
                            <form method="post" action="wilayah/${row[9]}">
                                <input type="hidden" name="_METHOD" value="DELETE" />
                                <button type="button" title="hapus" class='btn btn-danger-outline btn-sm text-danger p-0 delete'><i class="far fa-trash-alt"></i></button>
                            </form>
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

        $('#dataTable .view').on('click', function () {
            console.log('view works!');
        });

        $('#dataTable .edit').on('click', function () {
            console.log('edit works!');
        });

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
