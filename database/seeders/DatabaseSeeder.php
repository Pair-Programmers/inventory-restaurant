<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $rows = 20;
        \App\Models\User::factory($rows)->create();
        \App\Models\Admin::factory($rows)->create();
        \App\Models\Customer::factory($rows)->create();
        \App\Models\Vendor::factory($rows)->create();
        \App\Models\ExpenseCategory::factory($rows)->create();
        \App\Models\Expense::factory($rows + $rows)->create();
        \App\Models\ProductCategory::factory($rows)->create();
        \App\Models\ProductSubCategory::factory($rows)->create();
        \App\Models\Product::factory($rows + $rows)->create();
        \App\Models\Invoice::factory($rows)->create();
        \App\Models\InvoiceDetail::factory($rows + $rows)->create();
        \App\Models\Account::factory($rows)->create();
        \App\Models\Payment::factory($rows + $rows)->create();

        //we can also use this one call
        // $this->call([
        //     AdminSeeder::class,
        //     UserSeeder::class,
        //     CustomerSeeder::class,
        // ]);
    }
}
