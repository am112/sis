<?php

namespace Database\Factories;

use App\Models\Sale;
use Illuminate\Database\Eloquent\Factories\Factory;

class SaleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Sale::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'SalesDate' => today()->addDays(mt_rand(1, 10)),
            'SalesDay' => today()->addDays(mt_rand(1, 10))->format('l'),
            'TotalQuantitySold' => mt_rand(20, 400)
        ];
    }
}
