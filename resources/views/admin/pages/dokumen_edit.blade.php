
@extends('admin.layouts.base')

@section('dokumen_link', 'active')

@section('content')

<div class="card shadow">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Dokumen</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.update_dokumen', ["id" => $dokumen['id']]) }}" method="post">
            @csrf
            @method('put')
            <div class="form-group">
                <div class="form-group">
                    <label for="jum_petak">201. Jumlah Petak</label>
                    <input value="{{ $dokumen['jum_petak'] }}" type="number" min="0" class="form-control" name="jum_petak" required>
                </div>
            </div>
            <div class="form-row">
                <label class="col-12">401. Panjang Sisi</label>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                        <small class="form-text text-muted">
                            Barat-Timur (X)
                        </small>
                    <input value="{{ $dokumen['pjgsisi_bt'] }}" type="number" min="0" class="form-control" name="pjgsisi_bt" required>
                </div>
                <div class="form-group col-md-6">
                        <small class="form-text text-muted">
                            Utara-Selatan (Y)
                        </small>
                    <input value="{{ $dokumen['pjgsisi_us'] }}" type="number" min="0" class="form-control" name="pjgsisi_us" required>
                </div>
            </div>
            <div class="form-row">
                <label class="col-12">403. Nomor Random Awal</label>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <small class="form-text text-muted">
                        Halaman 
                    </small>
                    <input value="{{ $dokumen['rand_hal'] }}" type="number" min="0" max="2" step="1" class="form-control" name="rand_hal" required>
                </div>
                <div class="form-group col-md-4">
                    <small class="form-text text-muted">
                        Baris 
                    </small>
                    <input value="{{ $dokumen['rand_bar'] }}" type="number" min="0" class="form-control" name="rand_bar" required>
                </div>
                <div class="form-group col-md-4">
                    <small class="form-text text-muted">
                        Kolom 
                    </small>
                    <input value="{{ $dokumen['rand_kol'] }}" type="number" min="0" class="form-control" name="rand_kol" required>
                </div>
            </div>
            <div class="form-row">
                <label class="col-12">404. Nomor Random Terpilih</label>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <small class="form-text text-muted">
                        Barat-Timur (X)
                    </small>
                    <input value="{{ $dokumen['randterpilih_bt'] }}" type="number" min="0" class="form-control" name="randterpilih_bt" required>
                </div>
                <div class="form-group col-md-6">
                    <small class="form-text text-muted">
                        Utara-Selatan (Y)
                    </small>
                    <input value="{{ $dokumen['randterpilih_us'] }}" type="number" min="0" class="form-control" name="randterpilih_us" required>
                </div>
            </div>
            <div class="form-group">
                <label for="tgl_ubin">502. Tanggal Pencacahan</label>
                <input value="{{ $dokumen['tgl_ubin'] }}" type="date" class="form-control" name="tgl_ubin" required>
            </div>
            <div class="form-group">
                <label for="jenis_lahan">601. Jenis Lahan</label>
                <select value="{{ $dokumen['jenis_lahan'] }}" class="custom-select" name="jenis_lahan" required>
                    <option disabled selected>Pilih Jenis Lahan</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                    <option value="4">Four</option>
                    <option value="5">Five</option>
                </select>
            </div>
            <div class="form-group">
                <label for="luas_ubin">604. Luas Ubin</label>
                <input value="{{ $dokumen['luas_ubin'] }}" type="text" class="form-control" name="luas_ubin" required>
            </div>
            <div class="form-group">
                <label for="ar">608. Benih</label>
                <input value="{{ $dokumen['benih'] }}" type="number" class="form-control" name="benih" required>
            </div>
            <div class="form-row">
                <label class="col-12">610. Banyak Pupuk yang Digunakan</label>
            </div>
            <div class="form-group row">
                <small class="form-text text-muted col-md-2">
                    1. Urea
                </small>
                <div class="col-md-10">
                    <input value="{{ $dokumen['pupuk_urea'] }}" type="text" class="form-control" name="pupuk_urea" required>
                </div>
            </div>
            <div class="form-group row">
                <small class="form-text text-muted col-md-2">
                    2. TSP/SP36
                </small>
                <div class="col-md-10">
                    <input value="{{ $dokumen['pupuk_tsp'] }}" type="text" class="form-control" name="pupuk_tsp" required>
                </div>
            </div>
            <div class="form-group row">
                <small class="form-text text-muted col-md-2">
                    3. KCL 
                </small>
                <div class="col-md-10">
                    <input value="{{ $dokumen['pupuk_kcl'] }}" type="text" class="form-control" name="pupuk_kcl" required>
                </div>
            </div>
            <div class="form-group row">
                <small class="form-text text-muted col-md-2">
                    4. NPK/Pupuk Majemuk 
                </small>
                <div class="col-md-10">
                    <input value="{{ $dokumen['pupuk_npk'] }}" type="text" class="form-control" name="pupuk_npk" required>
                </div>
            </div>
            <div class="form-group row">
                <small class="form-text text-muted col-md-2">
                    5. Pupuk Organik Padat/Kompos 
                </small>
                <div class="col-md-10">
                    <input value="{{ $dokumen['pupuk_padat'] }}" type="text" class="form-control" name="pupuk_padat" required>
                </div>
            </div>
            <div class="form-group row">
                <small class="form-text text-muted col-md-2">
                    6. Pupuk Organik Cair 
                </small>
                <div class="col-md-10">
                    <input value="{{ $dokumen['pupuk_cair'] }}" type="text" class="form-control" name="pupuk_cair" required>
                </div>
            </div>
            <div class="form-group row">
                <small class="form-text text-muted col-md-2">
                    7. Pupuk ZA 
                </small>
                <div class="col-md-10">
                    <input value="{{ $dokumen['pupuk_za'] }}" type="text" class="form-control" name="pupuk_za" required>
                </div>
            </div>
            <div class="form-group">
                <label for="berat_ubin">701. Berat Hasil Ubinan</label>
                <input value="{{ $dokumen['berat_ubin'] }}" type="text" class="form-control" name="berat_ubin" required>
            </div>
            <div class="form-group">
                <label for="rumpun">702. Rumpun</label>
                <input value="{{ $dokumen['rumpun'] }}" type="text" class="form-control" name="rumpun" required>
            </div>
            <div class="form-group">
                <label for="opt_thnini">804. Serangan OPT Tahun Ini</label>
                <select value="{{ $dokumen['opt_thnini'] }}" class="custom-select" name="opt_thnini" required>
                    <option disabled selected>Pilih OPT</option>
                    <option value="1">Berat</option>
                    <option value="2">Sedang</option>
                    <option value="3">Ringan</option>
                    <option value="4">Four</option>
                </select>
            </div>
            <div class="form-group">
                <label for="alas_perontokan">808. Alas Perontokan</label>
                <select value="{{ $dokumen['alas_perontokan'] }}" class="custom-select" name="alas_perontokan" required>
                    <option disabled selected>Pilih Alas Perontokan</option>
                    <option value="1">&lt 4,0</option>
                    <option value="2">4,0-15,99</option>
                    <option value="3">16,0-35,99</option>
                    <option value="4">&gt 36,0</option>
                    <option value="5">Tidak Menggunakan</option>
                </select>
            </div>

            <hr>
            <a href="{{ route('admin.dokumen') }}" class="btn btn-sm shadow-sm btn-secondary btn-icon-split">
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
                    <span class="text">Simpan</span>
                </button>
            </div>
        </form>
    </div>
</div>

@endsection

@section('csspage')
@endsection

@section('jspage')
<!-- page level plugins -->
<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js">
</script>
<script>
    $('document').ready(function() {
        let jenis_lahan = {!! json_encode($dokumen['jenis_lahan']) !!};
        let opt_thnini = {!! json_encode($dokumen['opt_thnini']) !!};
        let alas_perontokan = {!! json_encode($dokumen['alas_perontokan']) !!};

        $(`select[name='jenis_lahan'] option[value=${jenis_lahan}]`).attr("selected","selected");
        $(`select[name='opt_thnini'] option[value=${opt_thnini}]`).attr("selected","selected");
        $(`select[name='alas_perontokan'] option[value=${alas_perontokan}]`).attr("selected","selected");
    });
</script>
@endsection
