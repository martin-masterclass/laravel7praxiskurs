<?php

use Illuminate\Database\Seeder;

use App\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            'Sport' => 'primary', // blau
            'Entspannung' => 'secondary', // grau-grau
            'Fun' => 'warning', // gelb
            'Natur' => 'success', // grün
            'Inspiration' => 'light', // weiß-grau
            'Freunde' => 'info', // türkis
            'Liebe' => 'danger', // rot
            'Interesse' => 'dark' // schwarz-weiss
        ];

        foreach ($tags as $key => $value) {
            $tag = new Tag(
                [
                    'name' => $key,
                    'style' => $value
                ]
            );
            $tag->save();
        }

    }
}
