@extends('admin.layouts.base')

@section('template_link', 'active')

@section('template_arrow', 'active')

@section('template_collapse', 'show')

@section('template_wilayah_link', 'active')

@section('content')
<div class="card shadow mb-3">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Wilayah Kerja</h6>
    </div>
    <div class="card-body p-4">
        <div class="form-row">
            <div class="form-group col-md-2">
                <label for="kd_pcl">Kode Petugas</label>
                <input type="number" class="form-control" placeholder="010" name="kd_pcl" value="{{ $petugas['kd_pcl'] }}"
                    readonly>
            </div>
            <div class="form-group col-md-5">
                <label for="nm_pcl">Nama Petugas</label>
                <input type="text" class="form-control" placeholder="010" name="nm_pcl" value="{{ $petugas['nm_pcl'] }}"
                    readonly>
            </div>
            <div class="form-group col-md-5">
                <label for="username">Username</label>
                <input type="text" class="form-control" placeholder="010" name="username" value="{{ $petugas['username'] }}"
                    readonly>
            </div>
        </div>
        <hr>
        <a href="{{ route('admin.template_wilayah') }}" class="btn btn-sm shadow-sm btn-secondary btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-arrow-left"></i>
            </span>
            <span class="text">kembali</span>
        </a>
        <div class="float-right d-flex">
            <form method="post" action="{{ route('admin.destroy_wilayah', [ "id" => $petugas['id'] ] ) }}">
                @csrf
                @method('delete')
                <button type="button" id="btn-delete" class="mx-1 btn btn-sm shadow-sm btn-danger btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-trash"></i>
                    </span>
                    <span class="text">Hapus</span>
                </button>
            </form>
            <a href="{{ route('admin.template_wilayah_edit', [ "id" => $petugas['id'] ] ) }}" class="btn btn-sm shadow-sm btn-warning btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-pen"></i>
                </span>
                <span class="text">Ubah</span>
            </a>
        </div>
    </div>
</div>
@endsection

@section('jspage')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js">
</script>

<script>
    $('button#btn-delete').on('click', function (e) {
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

</script>
@endsection
