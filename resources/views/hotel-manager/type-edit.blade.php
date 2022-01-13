@extends('layouts.app')

@section('content')

    <x-bread-crumb>
        <li class="breadcrumb-item active" aria-current="page">Room Type</li>
    </x-bread-crumb>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <form action="{{ route('hotel-manager.updatetype',$currentItem->id) }}" method="post">
            @csrf
            <div class="form-group">
                <label for="name" class="mr-2">Room Type</label>
                <input type="text" name="name" id="name" class="form-control mr-2" value="{{ $currentItem->name }}">
                @error('name')
                    <small class="text-danger fw-fold">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="price" class="mr-2">Price</label>
                <input type="text" name="price" id="price" class="form-control mr-2" value="{{ $currentItem->price }}">
                @error('price')
                    <small class="text-danger fw-fold">{{ $message }}</small>
                @enderror
              
            </div>
            <button class="btn btn-danger" name="levelupdate">Update Room Type</button>
        </form>
    </div>
@endsection