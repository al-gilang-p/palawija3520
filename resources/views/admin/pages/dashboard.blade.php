@extends('admin.layouts.base')

@section('content')
@if(session('role') == 'admin')
<div class="row">

    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Wilayah Tugas</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $wilayah ?? '0' }}</div>
                    </div>
                    <div class="col-auto">
                        <a href="{{ route('admin.template_wilayah') }}" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                            class="fas fa-layer-group fa-sm text-white-50"></i> | Wilayah</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Petugas Lapangan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $petugas ?? '0' }}</div>
                    </div>
                    <div class="col-auto">
                        <a href="{{ route('admin.template_petugas') }}" class="d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                            class="fas fa-user fa-sm text-white-50"></i> | Petugas</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endif

<div class="row">

    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-secondary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                            Jumlah Dokumen</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlahDokumen ?? '0' }}</div>
                    </div>
                    <div class="col-auto">
                        <a href="{{ route('admin.dokumen') }}" class="d-sm-inline-block btn btn-sm btn-secondary shadow-sm"><i
                            class="fas fa-folder fa-sm text-white-50"></i> | Dokumen</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Dokumen Terisi</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $entriDokumen ?? '0' }}</div>
                    </div>
                    <div class="col-auto">
                        <a href="{{ route('admin.dokumen') }}" class="d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i
                            class="fas fa-folder fa-sm text-white-50"></i> | Dokumen</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection

