<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            FoodSeeder::class,
            WarehouseSeeder::class,
            IngredientSeeder::class,
            RankSeeder::class,
            RoleSeeder::class,
            FunctionSeeder::class,
            TypeSeeder::class,
            TableSeeder::class,
            SaleSeeder::class,
            UserSeeder::class,
            CustomerSeeder::class,
            BookingSeeder::class,
            CartSeeder::class,
            CategorySeeder::class,
            EvaluateSeeder::class,
            InvoiceSeeder::class,
            EvaluateManagerSeeder::class,
            WarehouseInvoiceSeeder::class,
            RoleFunctionSeeder::class,
            BookingFoodSeeder::class,
            InvoiceFoodSeeder::class,
            CategoryFoodSeeder::class,
        ]);
    }
}
