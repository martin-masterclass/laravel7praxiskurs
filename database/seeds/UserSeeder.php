<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 100)->create()
        ->each(function ($user){
            factory(App\Hobby::class, rand(1,8))->create(
                [
                    'user_id' => $user->id
                ]
            )
            ->each(function ($hobby){
                $tag_ids = range(1,8);
                shuffle($tag_ids);
                $verknuepfungen = array_slice($tag_ids, 0, rand(0,8)); // z.B: [4,6,7]
                foreach ($verknuepfungen as $value) {
                    DB::table('hobby_tag')
                        ->insert(
                            [
                                'hobby_id' => $hobby->id,
                                'tag_id' => $value,
                                'created_at' => Now(),
                                'updated_at' => Now()
                            ]
                        );
                }
            });
        });
    }
}
