@extends('layouts.app')

@section('content')

    <x-bread-crumb>
        <li class="breadcrumb-item" aria-current="page"><a href="{{ route('hotel-manager.index') }}">Hotel Rooms</a></li>
        <li class="breadcrumb-item" aria-current="page" active>Create</li>
    </x-bread-crumb>
    
    <form action="{{ route('hotel-manager.hotelroomstore') }}" method="POST">
        @csrf
        <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="fid">Level<span class="text-danger">*</span></label>
                        <select class="form-control" required id="fid" name="fid">
                            <option value="option_select" disabled selected>-</option>
                                @foreach(\App\Levels::all() as $i)
                                <option value="{{ $i->id }}" {{ old("fid") == $i->id  ? 'selected' : ''}}>{{ $i->name}}</option>
                                @endforeach
                        </select>
                        @error('fid')
                            <small class="text-danger fw-fold">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="rno">Room No<span class="text-danger">*</span></label>
                        <select class="form-control" required id="rno" name="rno">
                            <option value="option_select" disabled selected>-</option>
                                @foreach(\App\Rooms::all() as $i)
                                <option value="{{ $i->id }}" {{ old("rno") == $i->id  ? 'selected' : ''}}>{{ $i->name}}</option>
                                @endforeach
                        </select>
                        @error('rno')
                            <small class="text-danger fw-fold">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="rtype">Room Type<span class="text-danger">*</span></label>
                        <select class="form-control" required id="rtype" name="rtype">
                            <option value="option_select" disabled selected>-</option>
                                @foreach(\App\Roomtypes::all() as $i)
                                <option value="{{ $i->id }}" {{ old("rtype") == $i->id  ? 'selected' : ''}}>{{ $i->name}}</option>
                                @endforeach
                        </select>
                        @error('rtype')
                            <small class="text-danger fw-fold">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
        </div>
        <hr>
        <button class="btn btn-danger" type="submit">Save</button>
    </form>

@endsection




