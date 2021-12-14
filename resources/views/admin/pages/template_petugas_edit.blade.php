@extends('admin.layouts.base')

@section('petugas_link', 'active')

@section('content')
<div class="card shadow mb-3">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Petugas</h6>
    </div>
    <div class="card-body p-4">
        <form action="{{ route('admin.update_petugas', ['id' => $petugas['id']]) }}" method="post">
            @csrf
            @method('put')
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="kd_pcl">Kode Petugas</label>
                    <input type="number" class="form-control" placeholder="001" name="kd_pcl"
                        value="{{ $petugas['kd_pcl'] }}" readonly>
                </div>
                <div class="form-group col-md-5">
                    <label for="nm_pcl">Nama Petugas</label>
                    <input type="text" class="form-control" placeholder="Nama" name="nm_pcl"
                        value="{{ $petugas['nm_pcl'] }}" readonly>
                </div>
                <div class="form-group col-md-5">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" placeholder="username" name="username"
                        value="{{ $petugas['username'] }}">
                </div>
            </div>
            <hr>
            <a href="{{ route('admin.template_petugas') }}" class="btn btn-sm shadow-sm btn-secondary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-arrow-left"></i>
                </span>
                <span class="text">Kembali</span>
            </a>
            <div class="float-right d-flex">
                <button type="submit" class="btn btn-sm shadow-sm btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-pen"></i>
                    </span>
                    <span class="text">Submit</span>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('jspage')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js">
</script>

<script>
    $(document).ready(function () {

        $('input').keypress(function (e) {
            if (e.which === 32)
                return false;
        })

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
   });

</script>
@endsection
