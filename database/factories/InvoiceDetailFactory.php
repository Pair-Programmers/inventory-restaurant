<?php

namespace Database\Factories;

use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = InvoiceDetail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id' => Product::pluck('id')->random(),
            'quantity' => $this->faker->numberBetween($min = 10, $max = 50),
            'unit_price' => $this->faker->numberBetween($min = 10, $max = 5000),
            'total_ammount' => $this->faker->numberBetween($min = 10, $max = 5000),
            'invoice_id' => Invoice::pluck('id')->random(),
        ];
    }
}
