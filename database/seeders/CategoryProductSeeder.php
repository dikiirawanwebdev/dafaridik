<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class CategoryProductSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Kemeja', 'slug' => 'kemeja', 'description' => 'Koleksi kemeja pria formal dan kasual'],
            ['name' => 'Kaos', 'slug' => 'kaos', 'description' => 'Koleksi kaos pria nyaman dan stylish'],
            ['name' => 'Celana', 'slug' => 'celana', 'description' => 'Koleksi celana pria berbagai model'],
            ['name' => 'Jaket', 'slug' => 'jaket', 'description' => 'Koleksi jaket pria hangat dan trendi'],
        ];

        foreach ($categories as $data) {
            Category::create($data);
        }

        $products = [
            [
                'category_id' => 1,
                'name' => 'Kemeja Oxford Premium',
                'slug' => 'kemeja-oxford-premium',
                'description' => 'Kemeja Oxford dengan bahan katun premium, nyaman dipakai sehari-hari. Tersedia dalam berbagai warna klasik. Cocok untuk acara formal maupun semi-formal.',
                'price' => 189000,
                'image' => 'https://images.unsplash.com/photo-1596755094514-f87e34085b2c?w=600&q=88',
                'is_best_seller' => true,
                'is_new_arrival' => false,
            ],
            [
                'category_id' => 1,
                'name' => 'Kemeja Flanel Modern',
                'slug' => 'kemeja-flanel-modern',
                'description' => 'Kemeja flanel motif kotak-kotak dengan bahan lembut. Cocok untuk gaya kasual yang tetap rapi. Padukan dengan jeans favoritmu.',
                'price' => 159000,
                'image' => 'https://images.unsplash.com/photo-1594938298603-c8148c4dae35?w=600&q=88',
                'is_best_seller' => true,
                'is_new_arrival' => true,
            ],
            [
                'category_id' => 1,
                'name' => 'Kemeja Putih Slim Fit',
                'slug' => 'kemeja-putih-slim-fit',
                'description' => 'Kemeja putih slim fit dengan potongan modern. Bahan stretch anti kusut. Wajib punya di lemari setiap pria.',
                'price' => 175000,
                'image' => 'https://images.unsplash.com/photo-1593030761757-71fae45fa0e7?w=600&q=88',
                'is_best_seller' => false,
                'is_new_arrival' => false,
            ],
            [
                'category_id' => 2,
                'name' => 'Kaos Oblong Cotton Combed',
                'slug' => 'kaos-oblong-cotton-combed',
                'description' => 'Kaos oblong 30s cotton combed, adem dan nyaman. Tersedia 8 warna pilihan. Basic item yang wajib dimiliki.',
                'price' => 89000,
                'image' => 'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?w=600&q=88',
                'is_best_seller' => true,
                'is_new_arrival' => false,
            ],
            [
                'category_id' => 2,
                'name' => 'Kaos Polo Striped',
                'slug' => 'kaos-polo-striped',
                'description' => 'Kaos polo dengan motif stripe klasik. Bahan pique premium. Cocok untuk hangout atau ke kantor kasual.',
                'price' => 129000,
                'image' => 'https://images.unsplash.com/photo-1576566588028-4147f3842f27?w=600&q=88',
                'is_best_seller' => false,
                'is_new_arrival' => true,
            ],
            [
                'category_id' => 2,
                'name' => 'Kaos Graphic Vintage',
                'slug' => 'kaos-graphic-vintage',
                'description' => 'Kaos dengan desain graphic vintage eksklusif. Bahan heavy cotton untuk kesan lebih kokoh. Tersedia edisi terbatas.',
                'price' => 109000,
                'image' => 'https://images.unsplash.com/photo-1583743814966-8936f5b7be1a?w=600&q=88',
                'is_best_seller' => true,
                'is_new_arrival' => false,
            ],
            [
                'category_id' => 3,
                'name' => 'Celana Chino Slim',
                'slug' => 'celana-chino-slim',
                'description' => 'Celana chino slim fit dengan bahan twill stretch. Nyaman dipakai seharian. Cocok untuk work and weekend.',
                'price' => 199000,
                'image' => 'https://images.unsplash.com/photo-1542272454315-4c01d7abdf4a?w=600&q=88',
                'is_best_seller' => true,
                'is_new_arrival' => false,
            ],
            [
                'category_id' => 3,
                'name' => 'Celana Jeans Straight',
                'slug' => 'celana-jeans-straight',
                'description' => 'Celana jeans straight leg classic. Denim berkualitas dengan comfort stretch. Model timeless yang tidak pernah ketinggalan zaman.',
                'price' => 249000,
                'image' => 'https://images.unsplash.com/photo-1604176354204-9268737828e4?w=600&q=88',
                'is_best_seller' => false,
                'is_new_arrival' => true,
            ],
            [
                'category_id' => 3,
                'name' => 'Celana Pendek Chino',
                'slug' => 'celana-pendek-chino',
                'description' => 'Celana pendek chino dengan panjang di atas lutut. Bahan ringan dan adem. Cocok untuk cuaca tropis.',
                'price' => 139000,
                'image' => 'https://images.unsplash.com/photo-1591195853828-11db59a44f6b?w=600&q=88',
                'is_best_seller' => false,
                'is_new_arrival' => false,
            ],
            [
                'category_id' => 4,
                'name' => 'Jaket Bomber Premium',
                'slug' => 'jaket-bomber-premium',
                'description' => 'Jaket bomber dengan bahan nylon water-resistant. Lapisan dalam fleece hangat. Cocok untuk cuaca dingin dan travelling.',
                'price' => 299000,
                'image' => 'https://images.unsplash.com/photo-1591047139829-d91aecb6caea?w=600&q=88',
                'is_best_seller' => true,
                'is_new_arrival' => false,
            ],
            [
                'category_id' => 4,
                'name' => 'Jaket Hoodie Sweater',
                'slug' => 'jaket-hoodie-sweater',
                'description' => 'Hoodie sweatshirt dengan bahan fleece tebal dan lembut. Ada kantong kanguru di depan. Hoodie casual favorit.',
                'price' => 219000,
                'image' => 'https://images.unsplash.com/photo-1556821840-3a63f95609a7?w=600&q=88',
                'is_best_seller' => false,
                'is_new_arrival' => true,
            ],
            [
                'category_id' => 4,
                'name' => 'Jaket Denim Classic',
                'slug' => 'jaket-denim-classic',
                'description' => 'Jaket denim classic dengan desain timeless. Bahan denim tebal berkualitas. Cocok dipadukan dengan outfit apa pun.',
                'price' => 279000,
                'image' => 'https://images.unsplash.com/photo-1576995853123-5a10305d93c0?w=600&q=88',
                'is_best_seller' => false,
                'is_new_arrival' => false,
            ],
            [
                'category_id' => 1,
                'name' => 'Kemeja Batik Modern',
                'slug' => 'kemeja-batik-modern',
                'description' => 'Kemeja batik dengan motif kontemporer. Bahan katun halus. Tampil stylish dengan sentuhan budaya Indonesia.',
                'price' => 199000,
                'image' => 'https://images.unsplash.com/photo-1596755094514-f87e34085b2c?w=600&q=88',
                'is_best_seller' => false,
                'is_new_arrival' => true,
            ],
            [
                'category_id' => 2,
                'name' => 'Kaos Raglan 3/4',
                'slug' => 'kaos-raglan-3-4',
                'description' => 'Kaos raglan dengan lengan 3/4. Desain sporty kasual. Nyaman untuk aktivitas sehari-hari.',
                'price' => 119000,
                'image' => 'https://images.unsplash.com/photo-1586363104862-3a5e2ab60d99?w=600&q=88',
                'is_best_seller' => false,
                'is_new_arrival' => true,
            ],
        ];

        foreach ($products as $data) {
            Product::create($data);
        }
    }
}
