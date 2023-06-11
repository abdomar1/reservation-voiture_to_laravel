<?php

namespace App\Http\Controllers;

use App\Mail\ContactMessage;
use App\Models\car;
use App\Models\reservation;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Stripe\Charge;
use Stripe\Customer;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Stripe\Refund;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservation= reservation::all();
        return view('reservation.index',compact('reservation'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $car = car::findOrFail($id);
        return  view('reservation.create',compact('car'));
    }

    public function store(Request $request)
{
        $request->validate([
            'dateL' => 'required|date',
            'dateR' => 'required|date|after:dateL',
            'car_id' => 'required|exists:cars,id',
            'payment_method_id' => 'required',
        ]);

        // Get the selected car
        $car = Car::findOrFail($request->car_id);

        // Calculate the total price
        $startDate = Carbon::parse($request->dateL);
        $endDate = Carbon::parse($request->dateR);
        $totalDays = $endDate->diffInDays($startDate);
        $totalPrice = $totalDays * $car->prixJ;     

        // Check if the car is available
    if ($car->disponible) {

        // Check if the selected dates are available for reservation
        $reservedDates = Reservation::where('car_id', $car->id)
            ->where(function ($query) use ($startDate, $endDate) {
                $query->whereBetween('dateL', [$startDate, $endDate])
                    ->orWhereBetween('dateR', [$startDate, $endDate])
                    ->orWhere(function ($q) use ($startDate, $endDate) {
                        $q->where('dateL', '<=', $startDate)
                            ->where('dateR', '>=', $endDate);
                    });
            })
            ->pluck('dateL', 'dateR')
            ->toArray();

        if (count($reservedDates) > 0) {
            return redirect()->back()->withErrors(['The car is not available for the selected dates.']);
        }
        // Create a reservation
        $reservation = new Reservation();
        $reservation->user_id = auth()->user()->id; // Assuming the authenticated user is making the reservation
        $reservation->car_id = $car->id;
        $reservation->dateL = $startDate;
        $reservation->dateR = $endDate;
        $reservation->prixTTC = $totalPrice;
        $reservation->save();

    
        // Update car availability
        if($startDate->isToday()){
            $car->disponible = 0;
            $car->save();
        }
    
    // Process payment with Stripe
     Stripe::setApiKey(env('STRIPE_SECRET'));
     $paymentIntent = PaymentIntent::create([
        'amount' => $totalPrice*1 , // Stripe uses amounts in cents
        'currency' => 'mad', // Adjust as per your currency requirement
        'payment_method' => $request->payment_method_id,
        'off_session' => true,
        'confirm' => true,
     ]);

    // Check if the payment was successful
     if ($paymentIntent->status !== 'succeeded') {
        return redirect()->back()->withErrors(['Payment failed. Please try again.']);
     }
     

    }else{
    return redirect()->back()->withErrors(['The car is not available for the selected dates. or not disponible']);
    }


        // // Send reservation confirmation email to the client
        // Mail::to(auth()->user()->email)->send(new ContactMessage($reservation));
    
        // Check if the reservation end date is today or in the past
        $today = Carbon::now();
        if ($endDate->lessThanOrEqualTo($today)) {
            $car->disponible = 1;
            $car->save();
            
        }
        return redirect()->route('user.show',auth()->user()->id)->with('success', 'Commande ajoutée.');
}




    /**
     * Display the specified resource.
     */
    public function show(reservation $reservation)
    {
        $reservation=reservation::findorFail($reservation);
        return view('reservation.show',compact('reservation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id){
        
    }
}
