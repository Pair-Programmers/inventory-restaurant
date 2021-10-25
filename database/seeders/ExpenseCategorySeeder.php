<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ExpenseCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\ExpenseCategory::factory(10)->create();
    }
}
