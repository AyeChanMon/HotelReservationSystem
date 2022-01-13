@extends('layouts.app')

@section('content')
    <x-bread-crumb>
    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('hotel-manager.reservelist') }}">Reservation Lists</a></li>
        <li class="breadcrumb-item" aria-current="page" active>Reservation Form</li>
    </x-bread-crumb>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <form action="{{ route('hotel-manager.reservationstore') }}" method="POST">
                @csrf    
                        <fieldset class="form-group border p-3">
                        <legend class="w-auto px-2 bg-danger">Reservation Details</legend>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                        <label name="fname">First Name<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="fname" name="fname" value="{{ old('fname') }}" required autofocus>
                                        @error('fname')
                                                <small class="text-danger fw-fold">{{ $message }}</small>
                                        @enderror
                                </div>
                                <div class="form-group">
                                        <label name="address">Address<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}" required>
                                        @error('address')
                                                <small class="text-danger fw-fold">{{ $message }}</small>
                                        @enderror
                                </div>
                                <div class="form-group">
                                        <label name="city">City<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="city" name="city" value="{{ old('city') }}" required>
                                        @error('city')
                                                <small class="text-danger fw-fold">{{ $message }}</small>
                                        @enderror
                                </div>
                                <div class="form-group">
                                        <label name="email">Email Address<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" required>
                                        @error('email')
                                                <small class="text-danger fw-fold">{{ $message }}</small>
                                        @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                        <label name="lname">Last Name<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="lname" name="lname" value="{{ old('lname') }}" required>
                                        @error('lname')
                                                <small class="text-danger fw-fold">{{ $message }}</small>
                                        @enderror
                                </div>
                                <div class="form-group">
                                        <label name="zcode">Zip Code<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="zcode" name="zcode" value="{{ old('zcode') }}" required>
                                        @error('zcode')
                                                <small class="text-danger fw-fold">{{ $message }}</small>
                                        @enderror
                                </div>
                                <div class="form-group">
                                        <label name="state">State<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="state" name="state" value="{{ old('state') }}" required>
                                        @error('state')
                                                <small class="text-danger fw-fold">{{ $message }}</small>
                                        @enderror
                                </div>
                                <div class="form-group">
                                        <label name="phone">Phone<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required>
                                        @error('phone')
                                                <small class="text-danger fw-fold">{{ $message }}</small>
                                        @enderror
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset class="form-group border p-3">
                        <legend class="w-auto px-2 bg-danger">Dates</legend>
                        <div class="row">
                                <div class="col-12 col-md-6">
                                        <div class="form-group">
                                                <label name="cindate">Check-in Date<span class="text-danger">*</span></label>
                                                <input type="date" class="form-control" id="cindate" name="cindate" value="{{ old('cindate') }}" required>
                                                @error('cindate')
                                                <small class="text-danger fw-fold">{{ $message }}</small>
                                                @enderror
                                        </div>                               
                                        <div class="form-group">
                                                <label name="cintime" class="form-label">Check-in Time</label>
                                                <select class="form-control" aria-label="Default select example" name="cintime" id="cintime" value="{{ old('cintime') }}">
                                                        <option value="" selected>Select time</option>
                                                        <option value="Morning">Morning</option>
                                                        <option value="Afternoon">Afternoon</option>
                                                        <option value="Evening">Evening</option>
                                                </select> 
                                                
                                        </div>
                                        <div class="form-group">
                                                <label name="ano">How many adults are coming?</label>
                                                <select class="form-control" id="ano" name="ano" value="{{ old('ano') }}">
                                                        <option value="0" selected>Number of adults are coming</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                </select>
                                        </div>
                                        <div class="form-group">
                                                <label name="rType1">Room 1 type</label>
                                                <select class="form-control" required id="rType1" name="rType1">
                                                        <option value="option_select" disabled selected>-</option>
                                                                @foreach(\App\Roomtypes::all() as $i)
                                                                        <option value="{{ $i->id }}" {{ old("rType1") == $i->id  ? 'selected' : ''}}>{{ $i->name}}</option>
                                                                @endforeach
                                                </select>
                                        </div>
                                        <div class="form-group">
                                                <label name="rType2">Room 2 type</label>
                                                <select class="form-control" required id="rType2" name="rType2">
                                                        <option value="option_select" disabled selected>-</option>
                                                                @foreach(\App\Roomtypes::all() as $i)
                                                                        <option value="{{ $i->id }}" {{ old("rType2") == $i->id  ? 'selected' : ''}}>{{ $i->name}}</option>
                                                                @endforeach
                                                </select>
                                        </div>
                                </div>
                                <div class="col-12 col-md-6">
                                        <div class="form-group">
                                                <label name="coutdate">Check-out Date<span class="text-danger">*</span></label>
                                                <input type="date" class="form-control" id="coutdate" name="coutdate" value="{{ old('coutdate') }}" required>
                                                @error('coutdate')
                                                <small class="text-danger fw-fold">{{ $message }}</small>
                                                @enderror
                                        </div>                               
                                        <div class="form-group">
                                                <label name="couttime">Check-out Time</label>
                                                <select class="form-control" aria-label="Default select example" name="couttime" id="couttime"  value="{{ old('couttime') }}">
                                                        <option value="" selected>Select time</option>
                                                        <option value="Morning">Morning</option>
                                                        <option value="Afternoon">Afternoon</option>
                                                        <option value="Evening">Evening</option>
                                                </select>
                                        </div>
                                        <div class="form-group">
                                                <label name="cno">How many children are coming?</label>
                                                <select class="form-control" aria-label="Default select example" id="cno" name="cno" value="{{ old('cno') }}">
                                                        <option value="0" selected>Number of children</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                </select>
                                        </div>
                                        <div class="form-group">
                                                <label name="noRooms1">Number of rooms for Type1</label>
                                                <input type="number" class="form-control" id="noRooms1" name="noRooms1" value="{{ old('noRooms1') }}">
                                        </div>
                                        <div class="form-group">
                                                <label name="noRooms2">Number of rooms for Type2</label>
                                                <input type="number" class="form-control" id="noRooms1" name="noRooms2" value="{{ old('noRooms2') }}">
                                        </div>
                                </div>
                                <div class="col-12">
                                        <div class="form-group">
                                                <label for="instructions" class="form-label">Special Instructions</label>
                                                <textarea class="form-control" id="instructions" rows="3" name="instructions"></textarea>
                                        </div>
                                </div>
                        </div>
                    </fieldset>
                    <div class="d-flex justify-content-center align-items-center">
                            <button class="btn btn-danger">Submit</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('foot')
   
@endsection
