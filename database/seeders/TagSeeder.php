<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    public function run()
    {
        DB::table('tags')->insert([
        [
            'title' => 'банкоматы',
        ],
        [
            'title' => 'аксессуары, бижутерия',
        ],
        [
            'title' => 'детская обувь',
        ],
        [
            'title' => 'детская одежда',
        ],
        [
            'title' => 'женская обувь',
        ],
        [
            'title' => 'женская одежда',
        ],
        [
            'title' => 'игрушки',
        ],
        [
            'title' => 'косметика и парфюмерия',
        ],
        [
            'title' => 'мобильные телефоны и аксесуары',
        ],
        [
            'title' => 'мужская обувь',
        ],
        [
            'title' => 'мужская одежда',
        ],
        [
            'title' => 'нижнее белье',
        ],
        [
            'title' => 'продукты питания',
        ],
        [
            'title' => 'развлечения',
        ],
        [
            'title' => 'рестораны, кафе и быстрое питание',
        ],
        [
            'title' => 'связь и мобильные телефоны',
        ],
        [
            'title' => 'товары для детей',
        ],
        [
            'title' => 'товары для дома',
        ],
        [
            'title' => 'товары для дома и спорта',
        ],
        [
            'title' => 'товары для животных',
        ],
        [
            'title' => 'товары для здоровья',
        ],
        [
            'title' => 'услуги',
        ],
        [
            'title' => 'электроника',
        ],
        [
            'title' => 'ювелирные изделия и часы',
        ],
        [
            'title' => 'цветы и праздничная упаковка',
        ],
        [
            'title' => 'табак, электронные сигареты, кальяны',
        ],
        ]);
    }
}
