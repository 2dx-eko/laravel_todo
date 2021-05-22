<?php
use App\User;
use Illuminate\Database\Seeder;

class TodosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $id = User::inRandomOrder()->first();
        DB::table('todos')->insert([
            [
                'id' => $id,
                'user_id' => rand(),
                'title' => Str::random(10),
                'detail' => Str::random(10),
                'status' => '1',
                //'completed_at' => date('Y-m-d H:i:s'),
                //'deleted_at' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
             ]
        ]);
    }
}

