@extends('layouts.app')

@section("title") Hotel Room Edit @endsection

@section('content')

    <x-bread-crumb>
        <li class="breadcrumb-item active" aria-current="page">Hotel Room</li>
    </x-bread-crumb>
    
    <form action="{{ route('hotel-manager.updatehotel',$currentItem->id) }}" method="POST">
        @csrf
        <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="fid">Level</label>
                        <select class="form-control" required id="fid" name="fid">
                            @foreach(\App\Levels::all() as $i)
                                <option value="{{ $i->id }}" {{ $currentItem->floor_id == $i->id  ? 'selected' : ''}}>{{ $i->name }}</option>
                            @endforeach
                        </select>
                        @error('fid')
                            <small class="text-danger fw-fold">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="rno">Room No</label>
                        <select class="form-control" required id="rno" name="rno">
                            <option value="option_select" disabled selected>-</option>
                                @foreach(\App\Rooms::all() as $i)
                                <option value="{{ $i->id }}" {{ $currentItem->room_id == $i->id  ? 'selected' : ''}}>{{ $i->name }}</option>
                                @endforeach
                        </select>
                        @error('rno')
                            <small class="text-danger fw-fold">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="rtype">Room Type</label>
                        <select class="form-control" required id="rtype" name="rtype">
                            <option value="option_select" disabled selected>-</option>
                                @foreach(\App\Roomtypes::all() as $i)
                                <option value="{{ $i->id }}" {{ $currentItem->room_type_id == $i->id  ? 'selected' : ''}}>{{ $i->name}}</option>
                                @endforeach
                        </select>
                        @error('rtype')
                            <small class="text-danger fw-fold">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" class="form-control" name="price" id="price" value="{{ $currentItem->price }}">
                        @error('price')
                            <small class="text-danger fw-fold">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
        </div>
        
        
        <hr>
        <button class="btn btn-primary" type="submit">Update</button>
    </form>

@endsection




