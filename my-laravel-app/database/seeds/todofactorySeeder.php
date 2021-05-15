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
        factory(App\Topic::class, 10)->create(); // 20件のデータを作成
    }
}
