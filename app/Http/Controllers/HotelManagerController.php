<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;

use App\Levels;
use App\Rooms;
use App\Roomtypes;
use App\Hotelrooms;
use App\Reservations;

class HotelManagerController extends Controller
{
   
    public function index(){
        return view("hotel-manager.hotel-create");
    }

    public function reservelist(){
        return view("hotel-manager.hotel-reservation-list");
    }

    public function reserve(){
        return view('hotel-manager.hotel-reservation');
    }

    public function list(){
        return view("hotel-manager.room-type-list");
    }

    public function floorlist(){
        return view("hotel-manager.hotel-floor-list");
    }

    public function room(){
        return view("hotel-manager.hotel-room");
    }

    public function floorstore(Request $request){
        $request -> validate([
            'name' => "required",
        ]);
        $level = new Levels();
        $level->name = $request->name;
        $level->save();
        return redirect()->route('hotel-manager.floorlist')->with("toast",['icon'=>'success','title'=>$level->name." is added successfully"]);        
    }

    public function roomstore(Request $request){
        $request -> validate([
            'name' => "required",
        ]);
        $room = new Rooms();
        $room->name = $request->name;
        $room->save();
        return redirect()->route('hotel-manager.room')->with("toast",['icon'=>'success','title'=>$room->name." is added successfully"]);        
    }
    
    public function roomtypestore(Request $request){
        $request -> validate([
            'name' => "required",
            'price'=>"required|numeric|min:0"
        ]);
        $roomtype = new Roomtypes();
        $roomtype->name = $request->name;
        $roomtype->price = $request->price;
        $roomtype->save();
        return redirect()->route('hotel-manager.list')->with("toast",['icon'=>'success','title'=>$roomtype->name." is added successfully"]);        
    }

    public function floordestroy($id){
        $currentItem = Levels::find($id);
        $currentItem->delete();
        return redirect()->route('hotel-manager.floorlist')->with("toast",['icon'=>'success','title'=>$currentItem->name." is deleted successfully"]);
    }

    public function roomdestroy($id){
        $currentItem = Rooms::find($id);
        $currentItem->delete();
        return redirect()->route('hotel-manager.room')->with("toast",['icon'=>'success','title'=>$currentItem->name." is deleted successfully"]);
    }
    
    public function roomtypedestroy($id){
        $currentItem = Roomtypes::find($id);
        $currentItem->delete();
        return redirect()->route('hotel-manager.list')->with("toast",['icon'=>'success','title'=>$currentItem->name." is deleted successfully"]);
    }

    public function flooredit($id){
        $currentItem = Levels::find($id);
        return view('hotel-manager.level-edit',compact('currentItem'));
    }

    public function updatelevel($id, Request $request){
        $currentItem = Levels::find($id);
        $currentItem->name = $request->name;
        $currentItem -> update();
        return redirect()->route("hotel-manager.floorlist")->with("toast",['icon'=>'success','title'=>$currentItem->name." is updated successfully"]);
    }

    public function roomedit($id){
        $currentItem = Rooms::find($id);
        return view('hotel-manager.room-edit',compact('currentItem'));
    }

    public function updateroom($id, Request $request){
        $currentItem = Rooms::find($id);
        $currentItem->name = $request->name;
        $currentItem -> update();
        return redirect()->route("hotel-manager.room")->with("toast",['icon'=>'success','title'=>$currentItem->name." is updated successfully"]);
    }
    
    public function typeedit($id){
        $currentItem = Roomtypes::find($id);
        return view('hotel-manager.type-edit',compact('currentItem'));
    }

    public function updatetype($id, Request $request){
        $currentItem = Roomtypes::find($id);
        $currentItem->name = $request->name;
        $currentItem->price = $request->price;
        $currentItem -> update();
        return redirect()->route("hotel-manager.list")->with("toast",['icon'=>'success','title'=>$currentItem->name." is updated successfully"]);
    }

    public function hotelroomcreate(){
        return view("hotel-manager.hotel-room-create-form");
    }

    public function hotelroomstore(Request $request){
        $request -> validate([
            'fid' => "required",
            'rno' => "required",
            'rtype' => "required"
        ]);
        
        $typeRow = DB::table('roomtypes')->where('id', '=', $request->rno)->get('price'); 
        $hotelroom = new Hotelrooms();
        $hotelroom->floor_id = $request->fid;
        $hotelroom->room_id = $request->rno;
        $hotelroom->room_type_id = $request->rtype;
        $hotelroom->price = $typeRow->pluck('price')[0];  
        $hotelroom->save();
        return redirect()->route('hotel-manager.index')->with("toast",['icon'=>'success','title'=>"Added successfully"]);        
    }

    public function hotelroomdestroy($id){
        $currentItem = Hotelrooms::find($id);
        $currentItem->delete();
        return redirect()->route('hotel-manager.index')->with("toast",['icon'=>'success','title'=>" Deleted successfully"]);
    }

    public function hotelroomedit($id){
        $currentItem = Hotelrooms::find($id);
        return view('hotel-manager.hotel-room-edit',compact('currentItem'));
    }

    public function updatehotel($id, Request $request){       
        $currentItem = Hotelrooms::find($id);
        $currentItem->floor_id = $request->fid;
        $currentItem->room_id = $request->rno;
        $currentItem->room_type_id = $request->rtype;
        $currentItem->price = $request->price;
        $currentItem -> update();
        return redirect()->route("hotel-manager.index")->with("toast",['icon'=>'success','title'=>"Updated successfully"]);
    }

    public function reservationstore(Request $request){
        $request -> validate([
            'fname' => "required",
            'address' => "required",
            'city' => "required",
            'email' => "required",
            'lname' => "required",
            'zcode' => "required",
            'state' => "required",
            'phone' => "required",
            'cindate' => "required|date|after_or_equal:today",
            'coutdate' => "required|date|after_or_equal:$request->cindate",
        ]);
       
        $totalAmount =0;
        if(isset($request->rType1)){
            $typeRow = DB::table('roomtypes')->where('id', '=', $request->rType1)->get();
            if(isset($request->noRooms1)){
                $totalAmount = ($typeRow->pluck('price')[0]) * ($request->noRooms1);
            }
        }
      
        if(isset($request->rType2)){
            $typeRow1 = DB::table('roomtypes')->where('id', '=', $request->rType2)->get();
            if(isset($request->noRooms2)){
                $totalAmount = $totalAmount + (($typeRow1->pluck('price')[0]) * ($request->noRooms2));
            }
        }

        $dateFrom = Carbon::create($request->cindate);
        $dateTo = Carbon::create($request->coutdate);
        $diff = $dateFrom->diffInDays($dateTo,true);
        $totalAmount = $totalAmount * ($diff+1);
        $reservation = new Reservations();
        $reservation->first_name = $request->fname;
        $reservation->address = $request->address;
        $reservation->city = $request->city;
        $reservation->email = $request->email;
        $reservation->login_email = auth()->user()->email;
        $reservation->last_name = $request->lname;
        $reservation->zipcode = $request->zcode;
        $reservation->state = $request->state;
        $reservation->phone = $request->phone;
        $reservation->cindate = $request->cindate;
        $reservation->coutdate = $request->coutdate;
        $reservation->cintime = $request->cintime;
        $reservation->adultno = $request->adultno;
        $reservation->rtype1 = $request->rType1;
        $reservation->rtype2 = $request->rType2;
        $reservation->couttime = $request->couttime;
        $reservation->norooms1 = $request->noRooms1;
        $reservation->norooms2 = $request->noRooms2;
        $reservation->instructions = $request->instructions;
        $reservation->price = $totalAmount;
        $reservation->save();
        return redirect()->route('hotel-manager.reservelist')->with("toast",['icon'=>'success','title'=>"Reservation successfully"]);        
    }

    public function export() 
    {
        $reservation = new Reservations();
        return Excel::download($reservation, 'reservation.csv');
    }
}