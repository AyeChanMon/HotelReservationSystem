@extends('layouts.app')

@section('content')

    <x-bread-crumb>
        <li class="breadcrumb-item active" aria-current="page">Room</li>
    </x-bread-crumb>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <form action="{{ route('hotel-manager.updateroom',$currentItem->id) }}" method="post">
            @csrf
            <div class="form-inline">
                <label for="name" class="mr-2">Room Name</label>
                <input type="text" name="name" id="name" class="form-control mr-2" value="{{ $currentItem->name }}">
                @error('name')
                    <small class="text-danger fw-fold">{{ $message }}</small>
                @enderror
                <button class="btn btn-danger" name="levelupdate">Update Room</button>
            </div>
        </form>
    </div>

@endsection