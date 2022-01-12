@extends('layouts.app')

@section("title") Room @endsection

@section('content')

    <x-bread-crumb>
        <li class="breadcrumb-item active" aria-current="page">Room</li>
    </x-bread-crumb>
    @if(Auth::user()->role == 0)
    <div class="d-flex justify-content-between align-items-center mb-3">
        <form action="{{ route('hotel-manager.roomstore') }}" method="post">
            @csrf
            <div class="form-inline">
                <input type="text" class="form-control mr-2" id="name" name="name" value="{{ old('name') }}" required>
                @error('name')
                    <small class="text-danger fw-fold">{{ $message }}</small>
                @enderror
                <button class="btn btn-danger" name="roomAdd">Add</button>
            </div>
        </form>
    </div>
    @endif
<table class="table table-hover mb-0">
    <thead>
        <tr>
            <th>#</th>
            <th>Room</th>
            <th>Control</th>
            <th>Date & Time</th>
        </tr>
    </thead>
    <tbody>
        @foreach(\App\Rooms::all() as $i)
        <tr>
            <td>{{ $i->id }}</td>
            <td>{{ $i->name }}</td>
            <td>
                @if(Auth::user()->role == 0)
                <a href="{{ route('hotel-manager.roomdestroy',$i->id) }}" class="btn btn-danger btn-sm">
                    Delete
                </a>
                @endif
                <a href="{{ route('hotel-manager.roomedit',$i->id) }}" class="btn btn-info btn-sm">
                    Edit
                </a>
            </td>
            <td>{{ $i->created_at->diffForHumans() }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection




