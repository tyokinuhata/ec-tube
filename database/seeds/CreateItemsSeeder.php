<?php

use Illuminate\Database\Seeder;
use App\Item;

class CreateItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Item::create([
            'name' => 'トマト',
            'img' => 'http://placehold.it/200x200&text=tomato',
            'description' => 'みずみずしいトマトです。',
            'price' => 200,
        ]);

        Item::create([
            'name' => 'レタス',
            'img' => 'http://placehold.it/200x200&text=lettuce',
            'description' => 'しゃきしゃきしたレタスです。',
            'price' => 150,
        ]);
    }
}
