@extends('admin.layouts.base')

@section('page_heading', 'Petugas')

@section('template_link', 'active')

@section('template_arrow', 'active')

@section('template_collapse', 'show')

@section('template_petugas_link', 'active')

@section('content')
<div class="card shadow mb-3">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Assign Username Petugas</h6>
    </div>
    <div class="card-body p-4">
        <h6 class="text-success">Total Petugas dengan username: <strong>0</strong> Petugas</h6>
        <h6 class="text-danger"><strong>0</strong> Petugas belum memiliki Username!</h6>
        <form class="form-inline">
            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Petugas</label>
            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three dkdjflsl</option>
            </select>

            <label class="sr-only" for="username">Username</label>
            <input type="text" class="form-control my-1 mr-sm-2" placeholder="username_3520">

            <button type="submit" class="btn btn-primary my-1">Submit</button>
          </form>
    </div>
</div>

<div class="card shadow mb-3">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Petugas</h6>
    </div>
    <div class="card-body p-4">
    </div>
</div>
@endsection

@section('jspage')
@endsection
