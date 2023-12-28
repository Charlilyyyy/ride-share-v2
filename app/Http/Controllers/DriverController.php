<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Driver;

class DriverController extends Controller
{
    public function setDriverData(Request $request){

        return $request;

        $validatedData = $request->validate([
            'carYear' => 'required|numeric|between:1990,2022',
            'brand' => 'required',
            'model' => 'required',
            'color' => 'required',
            'plateNumber' => 'required',
        ]);

        // Driver::create($validatedData);

            $driverData = new Driver();
            $driverData->user_id = 1;
            $driverData->year = $request->carYear;
            $driverData->brand = $request->brand;
            $driverData->model = $request->model;
            $driverData->color = $request->color;
            $driverData->plate_number = $request->plateNumber;
            $driverData->save(); 

        return response()->json(['message' => 'Driver set'],200);
    } 
}
