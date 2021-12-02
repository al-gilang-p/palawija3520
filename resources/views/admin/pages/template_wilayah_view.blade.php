@extends('admin.layouts.base')

@section('page_heading', 'Wilayah')

@section('template_link', 'active')

@section('template_arrow', 'active')

@section('template_collapse', 'show')

@section('template_wilayah_link', 'active')

@section('content')
<div class="card shadow mb-3">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Wilayah Kerja</h6>
    </div>
    <form>
        <div class="card-body p-2">
            <div class="form-group">
                <div class="form-group">
                    <label for="sr">Subround</label>
                    <input type="number" class="form-control" placeholder="010" name="sr" value="{{ $wilayah['sr'] }}"
                        readonly>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="kd_kec">Kode kecamatan</label>
                    <input type="text" class="form-control" placeholder="010" name="kd_kec"
                        value="{{ $wilayah['kd_kec'] }}" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label for="nm_kec">Nama kecamatan</label>
                    <input type="text" class="form-control" placeholder="PONCOL" name="nm_kec"
                        value="{{ $wilayah['nm_kec'] }}" readonly>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="kd_desa">Kode Desa</label>
                    <input type="text" class="form-control" placeholder="001" name="kd_desa"
                        value="{{ $wilayah['kd_desa'] }}" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label for="nm_kec">Nama Desa</label>
                    <input type="text" class="form-control" placeholder="GENILANGIT" name="nm_desa"
                        value="{{ $wilayah['nm_desa'] }}" readonly>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="nbs">Nomor Blok Sensus</label>
                    <input type="text" class="form-control" placeholder="001B" name="nbs" value="{{ $wilayah['nbs'] }}"
                        readonly>
                </div>
                <div class="form-group col-md-4">
                    <label for="nks">Nomor Kode Sampel</label>
                    <input type="text" class="form-control" placeholder="21701074" name="nks"
                        value="{{ $wilayah['nks'] }}" readonly>
                </div>
                <div class="form-group col-md-4">
                    <label for="id_segmen">ID Segmen</label>
                    <input type="text" class="form-control" placeholder="3520010001" name="id_segmen"
                        value="{{ $wilayah['id_segmen'] }}" readonly>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="ar">Angka Random</label>
                    <input type="number" class="form-control" placeholder="0.1" name="ar" value="{{ $wilayah['ar'] }}"
                        readonly>
                </div>
                <div class="form-group col-md-4">
                    <label for="subsegmen">Subsegmen</label>
                    <input type="text" class="form-control" placeholder="A3" name="subsegmen"
                        value="{{ $wilayah['subsegmen'] }}" readonly>
                </div>
                <div class="form-group col-md-4">
                    <label for="bln_panen">Bulan Panen</label>
                    <input type="text" class="form-control" placeholder="A3" name="bln_panen"
                        value="{{ $wilayah['bln_panen'] }}" readonly>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="kd_pml">Kode PML</label>
                    <input type="text" class="form-control" placeholder="001" name="kd_pml"
                        value="{{ $wilayah['kd_pml'] }}" readonly>
                </div>
                <div class="form-group col-md-3">
                    <label for="nm_pml">Nama PML</label>
                    <input type="text" class="form-control" placeholder="Hello" name="nm_pml"
                        value="{{ $wilayah['nm_pml'] }}" readonly>
                </div>
                <div class="form-group col-md-3">
                    <label for="kd_pcl">Kode PCL</label>
                    <input type="text" class="form-control" placeholder="002" name="kd_pcl"
                        value="{{ $wilayah['kd_pcl'] }}" readonly>
                </div>
                <div class="form-group col-md-3">
                    <label for="nm_pcl">Nama PCL</label>
                    <input type="text" class="form-control" placeholder="World" name="nm_pcl"
                        value="{{ $wilayah['nm_pcl'] }}" readonly>
                </div>
            </div>
            <hr>
            <button type="button" class="btn mt-auto btn-secondary shadow-sm">Kembali</button>
            <div class="float-right">
            <button type="button" class="btn mt-auto btn-danger shadow-sm">Hapus</button>
            <button type="button" class="btn mt-auto btn-warning shadow-sm">Ubah</button>
            </div>
        </div>
    </form>
</div>
@endsection
