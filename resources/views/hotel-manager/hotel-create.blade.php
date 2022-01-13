@extends('layouts.app')

@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item" aria-current="page" active>Hotel Rooms</li>
    </x-bread-crumb>
    @if(Auth::user()->role == 0)
    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ route('hotel-manager.hotelroomcreate') }}" class="btn btn-danger btn-sm">
            Add
        </a>
    </div>
    @endif
    <div class="row">
        <div class="col-12">
            <table class="table table-hover mb-0 table-responsive-md">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Level</th>
                    <th>Room</th>
                    <th>Room Type</th>
                    <th>Price</th>
                    <th>Control</th>
                    <th>Date & Time</th>
                </tr>
            </thead>
            <tbody>
                @foreach(\App\HotelRooms::all() as $i)
                <tr> 
                    <td>{{ $i->id }}</td>
                    <td>{{ \App\Levels::where('id', $i->floor_id)
                            ->pluck('name')[0] }}</td>
                    <td>{{ \App\Rooms::where('id', $i->room_id)
                    ->pluck('name')[0] }}</td>
                    <td>{{ \App\Roomtypes::where('id', $i->room_type_id)
                    ->pluck('name')[0] }}</td>
                    <td>{{ $i->price }}</td>
                    <th>
                        @if(Auth::user()->role == 0)
                        <a href="{{ route('hotel-manager.hotelroomdestroy',$i->id) }}" class="btn btn-danger btn-sm">
                            Delete
                        </a>
                        @endif
                        <a href="{{ route('hotel-manager.hotelroomedit',$i->id) }}" class="btn btn-info btn-sm">
                            Edit
                        </a>
                    </th>
                    <td>{{ $i->created_at->diffForHumans() }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
@endsection