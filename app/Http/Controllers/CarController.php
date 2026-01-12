<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\CarHelper;

class CarController extends Controller
{
    public function index(Request $request)
    {
        $cars = CarHelper::getCars();
        
        $search = $request->query('search');
        $brand = $request->query('brand', 'all');
        $type = $request->query('type', 'all');
        $year = $request->query('year', 'all');
        $minPrice = $request->query('min_price', 0);
        $maxPrice = $request->query('max_price', 10000000000);
        $sort = $request->query('sort', 'default');

        $filteredCars = array_filter($cars, function($car) use ($search, $brand, $type, $year, $minPrice, $maxPrice) {
            $matchesSearch = empty($search) || 
                            stripos($car['name'], $search) !== false || 
                            stripos($car['brand'], $search) !== false;
            
            $matchesBrand = $brand === 'all' || $car['brand'] === $brand;
            $matchesType = $type === 'all' || $car['type'] === $type;
            $matchesYear = $year === 'all' || (int)$car['year'] === (int)$year;
            $matchesPrice = $car['price'] >= $minPrice && $car['price'] <= $maxPrice;

            return $matchesSearch && $matchesBrand && $matchesType && $matchesYear && $matchesPrice;
        });

        if ($sort === 'price-asc') {
            usort($filteredCars, fn($a, $b) => $a['price'] <=> $b['price']);
        } elseif ($sort === 'price-desc') {
            usort($filteredCars, fn($a, $b) => $b['price'] <=> $a['price']);
        } elseif ($sort === 'year-desc') {
            usort($filteredCars, fn($a, $b) => $b['year'] <=> $a['year']);
        }

        return view('cars.index', [
            'cars' => $filteredCars,
            'brands' => ['Mercedes-Benz', 'BMW', 'Audi', 'Lexus', 'Toyota', 'Honda', 'VinFast', 'Hyundai'],
            'carTypes' => ['Sedan', 'SUV', 'Hatchback', 'Coupe', 'Crossover', 'MPV'],
            'years' => [2024, 2023, 2022, 2021, 2020],
            'filters' => [
                'search' => $search,
                'brand' => $brand,
                'type' => $type,
                'year' => $year,
                'min_price' => $minPrice,
                'max_price' => $maxPrice,
                'sort' => $sort,
            ]
        ]);
    }

    public function show($id)
    {
        $cars = CarHelper::getCars();
        $car = collect($cars)->firstWhere('id', $id);

        if (!$car) {
            abort(404);
        }

        return view('cars.show', ['car' => $car]);
    }
}
