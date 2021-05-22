<?php

use Illuminate\Database\Seeder;

class todofactorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Todo::class, 10)->create(); // 20件のデータを作成
    }
}
//$ php artisan db:seed --class=TodosTableSeeder
//$ php artisan db:seed --class=todofactorySeeder