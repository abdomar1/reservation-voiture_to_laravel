<?php

namespace App\Http\Controllers;

use App\Models\car;
use App\Models\reservation;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class indexController extends Controller
{
    public function index(Request $request){


        $query = car::query();
        $marque = null;
    
        if ($request->has('marque')) {
            $marque = $request->input('marque');
            $query->where('marque', 'like', "%$marque%");
        }
    
        $cars = $query->get();

        $today = Carbon::now();

        foreach ($cars as $car) {
            $reservation = reservation::where('car_id', $car->id)
            ->where('dateR', '>=', $today)
            ->orWhere('dateL', $today)
            ->first();

            if ($reservation) {
               if ($reservation->dateL = $today) {
                   $car->disponible = 0;
               } 
               elseif ($reservation->dateL > $today && $reservation->dateR > $today) {
                   $car->disponible = 0;
               } 
               elseif ($reservation->dateR = $today) {
                   $car->disponible = 1;
               }
           }else {
               $car->disponible = 1;
           }
           $car->save();
        }
         return view('index', compact('cars','marque'));
    }
}
