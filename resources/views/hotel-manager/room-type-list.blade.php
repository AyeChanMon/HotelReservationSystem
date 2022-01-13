@extends('layouts.app')

@section('content')

    <x-bread-crumb>
        <li class="breadcrumb-item active" aria-current="page">Room Types</li>
    </x-bread-crumb>
    @if(Auth::user()->role == 0)
    <div class="d-flex justify-content-between align-items-center mb-3">
        <form action="{{ route('hotel-manager.roomtypestore') }}" method="post">
            @csrf
            <div class="form-inline">
                <label for="name" class="mr-2">Room Type</label>
                <input type="text" class="form-control mr-2" id="name" name="name" value="{{ old('name') }}" required>
                @error('name')
                    <small class="text-danger fw-fold">{{ $message }}</small>
                @enderror
                <label for="price" class="mr-2">Price</label>
                <input type="number" class="form-control mr-2" id="price" name="price" value="{{ old('price') }}" required>
                @error('price')
                    <small class="text-danger fw-fold">{{ $message }}</small>
                @enderror
                <button class="btn btn-danger" name="roomtypeAdd">Add</button>
            </div>
        </form>
    </div>
    @endif
<table class="table table-hover mb-0">
    <thead>
        <tr>
            <th>#</th>
            <th>Type Name</th>
            <th>Price</th>
            <th>Control</th>
            <th>Date & Time</th>
        </tr>
    </thead>
    <tbody>
        @foreach(\App\Roomtypes::all() as $i)
        <tr>
            <td>{{ $i->id }}</td>
            <td>{{ $i->name }}</td>
            <td>{{ $i->price }}</td>
            <td>
                @if(Auth::user()->role == 0)
                <a href="{{ route('hotel-manager.roomtypedestroy',$i->id) }}" class="btn btn-danger btn-sm">
                    Delete
                </a>
                @endif
                <a href="{{ route('hotel-manager.typeedit',$i->id) }}" class="btn btn-info btn-sm">
                    Edit
                </a>
            </td>
            <td>{{ $i->updated_at->diffForHumans() }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection