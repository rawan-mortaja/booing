<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function createBooking()
    {
        $roomdetails = Room::all();
        return view('frontend.room.room_details', compact('roomdetails'));
    }

    public function BookingStore(Request $request)
    {
        Booking::create([
            'rooms_id' => $request->input('room_id'),
            'user_id' => Auth::id(),
            'day' => now(),
            'check_in' => $request->input('check_in'),
            'check_out' => $request->input('check_out'),
            'person' => $request->input('person'),
        ]);

        $notification = array(
            'message' => 'Booking Created Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('user.booking')->with($notification);
    }

    public function UserBooking()
    {
        dd('test');
    }
}
