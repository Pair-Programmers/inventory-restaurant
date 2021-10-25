<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\Admin;
use App\Models\Customer;
use App\Models\Payment;
use App\Models\Vendor;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Payment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'amount' => $this->faker->numberBetween($min = -2000000, $max = 2000000),
            'date' => $this->faker->date($format = 'Y-m-d', $max = '2010-01-01'),
            'group' => $this->faker->randomElement(['In', 'Out']),
            'type' => $this->faker->randomElement(['Sale Invoice', 'Purchase Invoice', 'Sale Return']),
            'note' => $this->faker->paragraph(),
            'customer_id' => Customer::pluck('id')->random(),
            'vendor_id' => Vendor::pluck('id')->random(),
            'account_id' => Account::pluck('id')->random(),
            'created_by' => Admin::pluck('id')->random(),
        ];
    }
}
