@extends('admin.layouts.base')

@section('wilayah_link', 'active')

@section('content')
<div class="card shadow mb-3">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Wilayah Kerja</h6>
    </div>
    <form action="{{ route('admin.update_wilayah', [ "id" => $wilayah['id'] ]) }}" method="POST" class="card-body p-4">
        @csrf
        @method('put')
        <div class="form-group">
            <div class="form-group">
                <label for="sr">Subround</label>
                <input type="number" class="form-control" name="sr" value="{{ $wilayah['sr'] }}" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="kd_kec">Kode kecamatan</label>
                <input type="text" class="form-control" name="kd_kec"
                    value="{{ $wilayah['kd_kec'] }}" required>
            </div>
            <div class="form-group col-md-6">
                <label for="nm_kec">Nama kecamatan</label>
                <input type="text" class="form-control" name="nm_kec"
                    value="{{ $wilayah['nm_kec'] }}" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="kd_desa">Kode Desa</label>
                <input type="text" class="form-control" name="kd_desa"
                    value="{{ $wilayah['kd_desa'] }}" required>
            </div>
            <div class="form-group col-md-6">
                <label for="nm_kec">Nama Desa</label>
                <input type="text" class="form-control" name="nm_desa"
                    value="{{ $wilayah['nm_desa'] }}" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="nbs">Nomor Blok Sensus (NBS)</label>
                <input type="text" class="form-control" name="nbs" value="{{ $wilayah['nbs'] }}" required>
            </div>
            <div class="form-group col-md-3">
                <label for="nks">Nomor Kode Sampel (NKS)</label>
                <input type="number" class="form-control" name="nks" value="{{ $wilayah['nks'] }}" required>
            </div>
            <div class="form-group col-md-3">
                <label for="id_segmen">ID Segmen</label>
                <input type="numbert" class="form-control" name="id_segmen"
                    value="{{ $wilayah['id_segmen'] }}">
            </div>
            <div class="form-group col-md-3">
                <label for="subsegmen">Subsegmen</label>
                <input type="text" class="form-control" name="subsegmen"
                    value="{{ $wilayah['subsegmen'] }}">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="komoditas">Komoditas</label>
                <select class="custom-select" name="komoditas" required>
                    <option disabled selected>Pilih Komoditas</option>
                    <option value="Ubi Kayu">Ubi Kayu</option>
                    <option value="Ubi Jalar">Ubi Jalar</option>
                    <option value="Jagung">Jagung</option>
                    <option value="Kacang Tanah">Kacang Tanah</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="responden">Responden</label>
                <input type="text" class="form-control" name="responden"
                    value="{{ $wilayah['responden'] }}" required>
            </div>
            <div class="form-group col-md-4">
                <label for="nm_lokasi">Nama Lokasi</label>
                <input type="text" class="form-control" name="nm_lokasi"
                    value="{{ $wilayah['nm_lokasi'] }}" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="ar">Angka Random</label>
                <input type="number" class="form-control" name="ar" value="{{ $wilayah['ar'] }}" step="any" required>
            </div>
            <div class="form-group col-md-6">
                <label for="bln_panen">Bulan Panen</label>
                <input type="number" min="1" max="12" class="form-control" name="bln_panen"
                    value="{{ $wilayah['bln_panen'] }}" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="kd_pml">Kode PML</label>
                <input type="text" class="form-control" name="kd_pml"
                    value="{{ $wilayah['kd_pml'] }}" required>
            </div>
            <div class="form-group col-md-3">
                <label for="nm_pml">Nama PML</label>
                <input type="text" class="form-control" name="nm_pml"
                    value="{{ $wilayah['nm_pml'] }}" required>
            </div>
            <div class="form-group col-md-3">
                <label for="kd_pcl">Kode PCL</label>
                <input type="text" class="form-control" name="kd_pcl"
                    value="{{ $wilayah['kd_pcl'] }}" required>
            </div>
            <div class="form-group col-md-3">
                <label for="nm_pcl">Nama PCL</label>
                <input type="text" class="form-control" name="nm_pcl"
                    value="{{ $wilayah['nm_pcl'] }}" required>
            </div>
        </div>
        <hr>
        <a href="{{ route('admin.template_wilayah') }}" class="btn btn-sm shadow-sm btn-secondary btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-arrow-left"></i>
            </span>
            <span class="text">Batal</span>
        </a>
        <div class="float-right d-flex">
            <button type="submit" class="btn btn-sm shadow-sm btn-primary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-pen"></i>
                </span>
                <span class="text">Simpan</span>
            </button>
        </div>
    </form>
</div>
@endsection

@section('jspage')
<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js">
</script>

<script>
    $('document').ready(function() {
        let komoditas = {!! json_encode($wilayah['komoditas']) !!};
        $(`select[name='komoditas'] option[value='${komoditas}']`).attr("selected","selected");
    });
</script>
@endsection
