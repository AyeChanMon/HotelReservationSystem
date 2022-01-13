@extends('layouts.app')

@section('content')

    <x-bread-crumb>
        <li class="breadcrumb-item active" aria-current="page">Floor Level</li>
    </x-bread-crumb>

    @if(Auth::user()->role == 0)
    <div class="d-flex justify-content-between align-items-center mb-3">
        <form action="{{ route('hotel-manager.floorstore') }}" method="post">
            @csrf
            <div class="form-inline">
                <input type="text" class="form-control mr-2" id="name" name="name" value="{{ old('name') }}" required>
                @error('name')
                    <small class="text-danger fw-fold">{{ $message }}</small>
                @enderror
                <button class="btn btn-danger" name="addCat">Add</button>
            </div>
        </form>
    </div>
    @endif
<table class="table table-hover mb-0">
    <thead>
        <tr>
            <th>#</th>
            <th>Floor Name</th>
            <th>Control</th>
            <th>Date & Time</th>
        </tr>
    </thead>
    <tbody>
        @foreach(\App\Levels::all() as $i)
        <tr>
            <td>{{ $i->id }}</td>
            <td>{{ $i->name }}</td>
            <td>
                @if(Auth::user()->role == 0)
                <a href="{{ route('hotel-manager.floordestroy',$i->id) }}" class="btn btn-danger btn-sm">
                    Delete
                </a>
                @endif
                <a href="{{ route('hotel-manager.flooredit',$i->id) }}" class="btn btn-info btn-sm">
                    Edit
                </a>
            </td>
            <td>{{ $i->updated_at->diffForHumans() }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection