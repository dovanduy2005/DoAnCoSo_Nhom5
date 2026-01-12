<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContractController extends Controller
{
    public function index()
    {
        $contracts = Auth::user()->contracts()->with('car')->latest()->get();
        return view('contracts.index', compact('contracts'));
    }

    public function create(Request $request)
    {
        $carId = $request->query('car_id');
        $carModel = \App\Models\Car::find($carId);
        
        // If not found in DB, try to find in Helper (static data)
        if (!$carModel) {
            $carData = \App\Helpers\CarHelper::getCarById($carId);
            if (!$carData) {
                abort(404);
            }
            // For the contract to work, we need a DB record. 
            // If it's static data, we might need a way to reference it or ensure all cars are in DB.
            // Let's assume for this feature, the car MUST exist in the DB.
            abort(404, 'Car not found in database. Only database cars can be ordered for now.');
        }

        return view('contracts.create', compact('carModel'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'car_id' => 'required|exists:cars,id',
            'cccd' => 'required|string',
            'phone' => 'required|string',
            'buyer_address' => 'required|string',
            'deposit_image' => 'required|image|max:2048',
        ]);

        $car = \App\Models\Car::findOrFail($request->car_id);
        
        $imagePath = $request->file('deposit_image')->store('deposits', 'public');

        $contract = Contract::create([
            'user_id' => Auth::id(),
            'car_id' => $car->id,
            'contract_number' => 'AL-2024-' . strtoupper(\Illuminate\Support\Str::random(6)),
            'cccd' => $request->cccd,
            'phone' => $request->phone,
            'buyer_address' => $request->buyer_address,
            'store_address' => 'Đại Học Phenikaa, Yên Nghĩa, Hà Đông, Hà Nội',
            'deposit_amount' => 300000000, // Fixed for now as per user request
            'deposit_image' => $imagePath,
            'status' => 'pending',
        ]);

        return redirect()->route('contracts.show', $contract->id)
            ->with('success', 'Hợp đồng đã được tạo thành công! Vui lòng chờ xác nhận.');
    }

    public function show(Contract $contract)
    {
        // Ensure the contract belongs to the user
        if ($contract->user_id !== Auth::id()) {
            abort(403);
        }

        return view('contracts.show', compact('contract'));
    }
}
