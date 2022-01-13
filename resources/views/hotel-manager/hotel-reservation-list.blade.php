@extends('layouts.app')
@section('content')

    <x-bread-crumb>
        <li class="breadcrumb-item active" aria-current="page">Reservation Lists</li>
    </x-bread-crumb>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ route('hotel-manager.reserve') }}" class="btn btn-danger btn-sm">
            Add
        </a>
        @if (Auth::user()->role==0)
            <a class="btn btn-danger" href="{{ route('export') }}">Export User Data</a>
        @endif
    </div>
    <div class="row">
        <div class="col-12">
        <table class="table table-hover table-responsive-md table-responsive-lg table-responsive-xl mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Price</th>
                    <th>Check-in Date</th>
                    <th>Check-out Date</th>
                    <th>Address</th>
                </tr>
            </thead>
            <tbody>
                @if (Auth::user()->role==0 || Auth::user()->role==2)
                    @foreach(\App\Reservations::all() as $i)
                    <tr>
                        <td>{{ $i->id }}</td>
                        <td>{{ $i->first_name }}&nbsp;{{ $i->last_name }}</td>
                        <td>{{ $i->phone }}</td>
                        <td>{{ $i->email }}</td>
                        <td>{{ $i->price }}</td>
                        <td>{{ $i->cindate }}</td>
                        <td>{{ $i->coutdate }}</td>
                        <td>{{ $i->address }}</td>
                    </tr>
                    @endforeach
                @else
                    @foreach(\App\Reservations::all() as $i)
                        @if ($i->login_email== Auth::user()->email)
                            <tr>
                                <td>{{ $i->id }}</td>
                                <td>{{ $i->first_name }}&nbsp;{{ $i->last_name }}</td>
                                <td>{{ $i->phone }}</td>
                                <td>{{ $i->email }}</td>
                                <td>{{ $i->price }}</td>
                                <td>{{ $i->cindate }}</td>
                                <td>{{ $i->coutdate }}</td>
                                <td>{{ $i->address }}</td>
                            </tr>
                        @endif       
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection