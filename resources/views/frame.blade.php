@extends('layouts.app')

@section("title") Frame @endsection

@section('content')

    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{ route('profile') }}">Profile</a></li>
        <li class="breadcrumb-item active" aria-current="page">Update Info</li>
    </x-bread-crumb>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>


@endsection
@section('foot')
    <script>

    </script>
@endsection
