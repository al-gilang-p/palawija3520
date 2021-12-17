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
                    {{-- @foreach ($wilayah as $data)
                    <tr>
                        <td></td>
                        <td>{{ $data[ 'nm_kec' ] }}</td>
                        <td>{{ $data['nm_desa'] }}</td>
                        <td>{{ $data['nbs'] }}</td>
                        <td>{{ $data['nks'] }}</td>
                        <td>{{ $data['id_segmen'] }}</td>
                        <td>{{ $data['nm_lokasi'] }}</td>
                        <td>{{ $data['nm_pml'] }}</td>
                        <td>{{ $data['nm_pcl'] }}</td>
                        <td>{{ $data['id'] }}</td>
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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js">
</script>

<script>
    $(document).ready(function () {
        let t = $('#dataTable').DataTable({});
    });
</script>
@endsection
