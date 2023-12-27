<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Driver;

class DriverController extends Controller
{
    public function setDriverData(Request $request){
        try{
            $driverData = new Driver();
            $driverData->year = $request->carYear;
            $driverData->make = $request->brand;
            $driverData->model = $request->model;
            $driverData->color = $request->color;
            $driverData->license_plate = $request->plateNumber;
            $driverData->save();    
        }catch(\Exception $e){
            return response()->json(['error' => $e->getMessage()],500);
        }
        return response()->json(['message' => 'Driver set'],200);
    } 
}
