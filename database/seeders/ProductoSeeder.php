<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Producto;


class ProductoSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

$productos = [
            [
                'name' => 'Fesh milk 500ML',
                'img' => 'https://cdn.pixabay.com/photo/2016/12/06/18/27/milk-1887234__340.jpg',
                'price' => 250,
                'description' => 'lorem ipsum'
            ],
            [
                'name' => '20 EGGS',
                'img' => 'https://cdn.pixabay.com/photo/2016/07/23/15/24/egg-1536990__340.jpg',
                'price' => 6,
                'description' => 'lorem ipsum'
            ],
            [
                'name' => 'WINE 700ML',
                'img' => 'https://cdn.pixabay.com/photo/2015/11/07/12/00/alcohol-1031713__340.png',
                'price' => 50,
                'description' => 'lorem ipsum'
            ],
            [
                'name' => 'SPEAKER',
                'img' => 'https://cdn.pixabay.com/photo/2017/01/06/17/49/honey-1958464__340.jpg',
                'price' => 12,
                'description' => 'lorem ipsum'
            ]
        ];
        Producto::insert($productos);
    }
}