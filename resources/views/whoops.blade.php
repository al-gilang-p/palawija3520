@extends('admin.layouts.base')

@section('content')
<div class="container-fluid">
    <!-- 404 Error Text -->
    <div class="text-center">
        <div class="error mx-auto" data-text="{{ $code }}">{{ $code }}</div>
        <p class="lead text-gray-800 mb-5">{{ $message }}</p>
        <p class="text-gray-500 mb-0">Hati-hati pakenya Om...</p>
        <a href="{{ route('dashboard') }}">&larr; Back to Dashboard</a>
    </div>

</div>
@endsection
