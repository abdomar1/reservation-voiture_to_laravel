<?php

namespace App\Http\Controllers;

use App\Models\car;
use App\Models\categorie;
use App\Models\reservation;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class carController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function index(Request $request)
     {

         $query = Car::query();
         $categories = Categorie::all(); 
     
         if ($request->has('categorie')) {
             $category = Categorie::findOrFail($request->categorie);
             $query->where('categorie_id', $category->id);
         }
     
         if ($request->has('marque')) {
             $marque = $request->input('marque');
             $query->where('marque', 'like', "%$marque%");
         }
     
         $cars = $query->get();
     
         // Mettre à jour la disponibilité des voitures
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
     
         $categories = Categorie::all();
     
         return view('cars.index', compact('cars', 'categories'));
     }
    
    
    
    
        /**
         * Show the form for creating a new resource.
         */
        public function create()
        {
            $categories = Categorie::all(); 
            $user = Auth::user();
            return view('admin.ajouteCar',compact('user','categories'));
        }
    
        /**
         * Store a newly created resource in storage.
         */
        public function store(Request $request)
        {

            // Validate the request data
            $customErrorMessages = [
                'marque.required' => 'Le champ marque est requis.',
                'model.required' => 'Le champ modèle est requis.',
                'kilomtrage.required' => 'Le champ kilométrage est requis.',
                'kilomtrage.numeric' => 'Le champ kilométrage doit être un nombre.',
                'Transmission.required' => 'Le champ transmission est requis.',
                'Transmission.in' => 'Le champ transmission doit être soit "automatique" ou "manuelle".',
                'type.required' => 'Le champ type est requis.',
                'type.in' => 'Le champ type doit être soit "essence" ou "diesel".',
                'prixJ.required' => 'Le champ prix par jour est requis.',
                'prixJ.numeric' => 'Le champ prix par jour doit être un nombre.',
                'Seats.required' => 'Le champ nombre de sièges est requis.',
                'Seats.numeric' => 'Le champ nombre de sièges doit être un nombre.',
                'Luggage.required' => 'Le champ capacité du coffre est requis.',
                'Luggage.numeric' => 'Le champ capacité du coffre doit être un nombre.',
                'Luggage.max' => 'La capacité du coffre ne doit pas dépasser 5.',
            ];
        
            // Validate the request data with custom error messages

            $validatedData = $request->validate([
                'marque' => 'required',
                'model' => 'required',
                'kilomtrage' => 'required|numeric',
                'Transmission' => 'required|in:automatique,manuelle',
                'type' => 'required|in:essence,diesel',
                'prixJ' => 'required|numeric',
                'Seats' => 'required|numeric',
                'image' => 'required|image',
                'Luggage' => 'required|numeric|max:5',
                'categorie_id' => 'required|exists:categories,id',
            ],$customErrorMessages);
        
            // Save the car data
            $car = new Car();
            $car->marque = $validatedData['marque'];
            $car->model = $validatedData['model'];
            $car->kilomtrage = $validatedData['kilomtrage'];
            $car->Transmission = $validatedData['Transmission'];
            $car->type = $validatedData['type'];
            $car->prixJ = $validatedData['prixJ'];
            $car->Seats = $validatedData['Seats'];
            $car->Luggage = $validatedData['Luggage'];
            $car->categorie_id = $validatedData['categorie_id'];
        
            // Handle the car image
            if ($request->hasFile('image')) {

                $imagePath =$request->file('image')->getClientOriginalName();
                $path = $request->file('image')->storeAs('cars', $imagePath, 'ahmad');
                $car->image = $path;
            }
        
            $car->save();
        
            // Redirect to the desired route
            return redirect()->route('admin.index')->with('success', 'Car added successfully.');
        }
        /**
         * Display the specified resource.
         */
        public function show(car $car)
        {
            $categorie = $car->categorie; // Assuming the relationship is defined correctly
    
            if (isset($car) && isset($categorie)) {
                return view('cars.show', compact('car', 'categorie'));
        }}



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user =Auth::user();
        $car = Car::find($id); 
        return view('admin.updateCar',compact('user','car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $customErrorMessages =[
            'marque.required' => 'Le champ marque est requis.',
            'model.required' => 'Le champ modèle est requis.',
            'kilomtrage.required' => 'Le champ kilométrage est requis.',
            'kilomtrage.numeric' => 'Le champ kilométrage doit être un nombre.',
            'Transmission.required' => 'Le champ transmission est requis.',
            'Transmission.in' => 'Le champ transmission doit être soit "automatique" ou "manuelle".',
            'type.required' => 'Le champ type est requis.',
            'type.in' => 'Le champ type doit être soit "essence" ou "diesel".',
            'prixJ.required' => 'Le champ prix par jour est requis.',
            'prixJ.numeric' => 'Le champ prix par jour doit être un nombre.',
            'Seats.required' => 'Le champ nombre de sièges est requis.',
            'Seats.numeric' => 'Le champ nombre de sièges doit être un nombre.',
            'Luggage.required' => 'Le champ capacité du coffre est requis.',
            'Luggage.numeric' => 'Le champ capacité du coffre doit être un nombre.',
            'Luggage.max' => 'La capacité du coffre ne doit pas dépasser 5.',
        ];
    
        // Validate the request data with custom error messages
        $validatedData = $request->validate([
            'marque' => 'required',
            'model' => 'required',
            'kilomtrage' => 'required|numeric',
            'Transmission' => 'required|in:automatique,manuelle',
            'type' => 'required|in:essence,diesel',
            'prixJ' => 'required|numeric',
            'Seats' => 'required|numeric',
            'Luggage' => 'required|numeric|max:5',
        ], $customErrorMessages);
    
        // Retrieve the car instance
        $car = Car::findOrFail($id);
    
        // Update the car data
        $data = $request->all();
    
        // Handle the car image if provided
        if ($request->hasFile('image')) {
            Storage::disk('ahmad')->delete($car->image);

            $imagePath = $request->file('image')->getClientOriginalName();
                    // Store the new image file
            $path = $request->file('image')->storeAs('cars', $imagePath, 'ahmad');
            $data['image'] = $path;
        }

        $car->update($data); 


    
        // Redirect to the desired route
        return redirect()->route('admin.index')->with('success', 'Car updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $car = Car::findOrFail($id);

        // Delete the car image from the storage disk
        Storage::disk('ahmad')->delete($car->image);
    
        // Delete the car record from the database
        $car->delete();

        return redirect()->route('admin.index')->with('success', "La suppression de voiture a bien réussi!");
    }
}
