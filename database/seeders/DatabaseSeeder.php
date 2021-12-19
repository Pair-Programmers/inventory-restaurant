<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Admin::create(['name' => 'Hamza Saqib',
                        'email' => 'admin@gmail.com',
                        'role' => 'Super Admin',
                        'phone' => '03239991999',
                        'profile_image' => 'admin_profile.jpg',
                        'password' => Hash::make('admin123')]);

        Account::create(['name'=>'Cash Counter', 'type'=>'Cash', 'as_off_date'=>date('Y-m-d'), 'opening_balance'=>0, 'balance'=>0, 'created_by'=>1]);
        Account::create(['name'=>'Al Rafay Bank Account', 'type'=>'Bank', 'as_off_date'=>date('Y-m-d'), 'opening_balance'=>0, 'balance'=>0, 'created_by'=>1]);

        $rows = 10;
        //\App\Models\User::factory($rows)->create();
        \App\Models\Admin::factory($rows)->create();
        \App\Models\Customer::factory($rows)->create();
        \App\Models\Vendor::factory($rows)->create();
        \App\Models\Account::factory($rows)->create();
        \App\Models\ExpenseCategory::factory($rows)->create();
        \App\Models\Expense::factory($rows + $rows)->create();
        \App\Models\ProductCategory::factory($rows)->create();
        \App\Models\ProductSubCategory::factory($rows)->create();
        \App\Models\Product::factory($rows + $rows)->create();
        \App\Models\Invoice::factory($rows)->create();
        \App\Models\InvoiceDetail::factory($rows + $rows)->create();
        \App\Models\Employee::factory($rows)->create();
        \App\Models\Payment::factory($rows + $rows)->create();

        //we can also use this one call
        // $this->call([
        //     AdminSeeder::class,
        //     UserSeeder::class,
        //     CustomerSeeder::class,
        // ]);
    }
}
