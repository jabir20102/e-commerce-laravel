<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;

class LocaleController extends Controller
{
    public function setLocale($locale='en'){
       
        
        if (! in_array($locale, ['en', 'ur', 'fr'])) {
            abort(404);
        }
        App::setLocale($locale);
        $data = App::getLocale();
        echo '<pre>';
        print_r($data);
        // Session::put('locale', $locale);
        // return redirect('/login');
        
    }
    public function bookAnOrder(Request $request)
    {
        echo '<pre>';
        print_r($request->all());
        // $booking = new Booking;
        // $booking->name = $request->name;
        // $booking->email = $request->email;
        // $booking->number = $request->number;
        // $booking->date = $request->date;
        // $booking->time = $request->time;
        // $booking->people = $request->people;
        // $booking->save();
        return redirect('/')->with('status', 'Your Booking has been entered');
    }
}
