<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Nike Dunk Low',
                'price' => 99.99,
                'img_path' => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff',
                'description' => 'Iconic basketball-turned-streetwear sneaker with classic style.',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Air Jordan 1 Mid',
                'price' => 129.99,
                'img_path' => 'https://images.unsplash.com/photo-1552346154-21d32810aba3',
                'description' => 'Legendary basketball shoe with timeless appeal and comfort.',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Nike Air VaporMax Plus',
                'price' => 199.99,
                'img_path' => 'https://images.unsplash.com/photo-1606107557195-0e29a4b5b4aa',
                'description' => 'Revolutionary cushioning meets retro-futuristic design.',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Nike Blazer Mid',
                'price' => 109.99,
                'img_path' => 'https://images.unsplash.com/photo-1597248881519-db089d3744a5',
                'description' => 'Vintage-inspired basketball shoe with modern comfort features.',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Nike Metcon',
                'price' => 139.99,
                'img_path' => 'https://images.unsplash.com/photo-1605348532760-6753d2c43329',
                'description' => 'Ultimate training shoe for stability and durability.',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Nike Zegama',
                'price' => 159.99,
                'img_path' => 'https://images.unsplash.com/photo-1595950653106-6c9ebd614d3a',
                'description' => 'Trail running shoe with superior grip and durability.',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('products')->insertBatch($data);
    }
} 