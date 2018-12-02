<?php

use Illuminate\Database\Seeder;
use App\Models\Food;

class CreateFoodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Food::truncate();

        Food::create([
            'name' => 'あがり',
            'img' => 'storage/foods/agari_yunomi.png',
            'description' => '静岡県産です。',
            'price' => 0,
        ]);

        Food::create([
            'name' => 'ガリ',
            'img' => 'storage/foods/gari.png',
            'description' => '僕は苦手です。',
            'price' => 0,
        ]);

        Food::create([
            'name' => 'いなり寿司',
            'img' => 'storage/foods/inarizushi.png',
            'description' => '甘い。',
            'price' => 100,
        ]);

        Food::create([
            'name' => 'かつお',
            'img' => 'storage/foods/sushi_katsuo.png',
            'description' => '磯野',
            'price' => 100,
        ]);

        Food::create([
            'name' => '納豆巻き',
            'img' => 'storage/foods/sushi_makimono_nattou.png',
            'description' => 'ネバネバ。',
            'price' => 100,
        ]);

        Food::create([
            'name' => '芽ネギ',
            'img' => 'storage/foods/sushi_menegi.png',
            'description' => '食べたことない。',
            'price' => 100,
        ]);

        Food::create([
            'name' => 'ネギトロ',
            'img' => 'storage/foods/sushi_negitoro.png',
            'description' => 'ネギのトロ。',
            'price' => 100,
        ]);

        Food::create([
            'name' => '大トロ',
            'img' => 'storage/foods/sushi_ootoro.png',
            'description' => '強そう。',
            'price' => 200,
        ]);

        Food::create([
            'name' => 'サーモン',
            'img' => 'storage/foods/sushi_salmon.png',
            'description' => 'クロワッサンに挟むと美味しいよ。',
            'price' => 100,
        ]);

        Food::create([
            'name' => 'しらす',
            'img' => 'storage/foods/sushi_shirasu.png',
            'description' => 'ちりめんじゃこじゃないよ。',
            'price' => 100,
        ]);

        Food::create([
            'name' => 'タイ',
            'img' => 'storage/foods/sushi_tai.png',
            'description' => 'めでタイ！',
            'price' => 200,
        ]);

        Food::create([
            'name' => 'ウニ',
            'img' => 'storage/foods/sushi_uni.png',
            'description' => 'うにうに。',
            'price' => 100,
        ]);
    }
}
