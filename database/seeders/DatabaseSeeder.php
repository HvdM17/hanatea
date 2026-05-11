<?php

namespace Database\Seeders;

use App\Models\Banner;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@hanatea.com'],
            [
                'name' => 'AdminHanaTea',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ]
        );

        Setting::query()->firstOrCreate([], [
            'instagram' => 'https://instagram.com/hanatea.bkl',
            'tiktok' => 'https://tiktok.com/@hanatea.bkl',
            'whatsapp' => '6282374436884',
            'address' => 'https://maps.app.goo.gl/Ubg1umGTQuBcR1ob7?g_st=aw',
            'open_hours' => '09.00 - 21.00',
            'about' => 'HanaTea adalah UMKM minuman yang baru berdiri dan siap jadi teman segar harianmu.',
        ]);

        $items = [
            ['Jamine Tea', 'cat-tea', 'Tea', 3000],
            ['Vanila Tea', 'cat-tea', 'Tea', 3000],
            ['Leci Tea', 'cat-tea', 'Tea', 5000],
            ['Green Tea Original', 'cat-tea', 'Tea', 5000],
            ['Apel Tea', 'cat-tea', 'Tea', 5000],
            ['Melon Tea', 'cat-tea', 'Tea', 5000],
            ['Blackcurrant Tea', 'cat-tea', 'Tea', 5000],
            ['Grape Tea', 'cat-tea', 'Tea', 5000],
            ['Lemon Tea', 'cat-tea', 'Tea', 5000],
            ['Strawberry Tea', 'cat-tea', 'Tea', 5000],
            ['Pasion Tea', 'cat-tea', 'Tea', 5000],
            ['Teh Tarik Aceh', 'cat-tea', 'Tea', 8000],
            ['Thai Tea Green Tea', 'cat-tea', 'Tea', 10000],
            ['Yakult Melon', 'cat-yakult', 'Yakult', 8000],
            ['Yakult Orange', 'cat-yakult', 'Yakult', 8000],
            ['Yakult Leci', 'cat-yakult', 'Yakult', 8000],
            ['Yakult Mangga', 'cat-yakult', 'Yakult', 8000],
            ['Yakult Strawberry', 'cat-yakult', 'Yakult', 8000],
            ['Yakult Lemon', 'cat-yakult', 'Yakult', 8000],
            ['Cendol Original', 'cat-cendol', 'Cendol', 10000],
            ['Cendol Brown Sugar', 'cat-cendol', 'Cendol', 10000],
            ['Cendol Pandan', 'cat-cendol', 'Cendol', 10000],
        ];

        foreach ($items as [$name, $image, $cat, $price]) {
            Product::create([
                'name' => $name,
                'image' => $image.'.png',
                'slug' => Str::slug($name),
                'category' => $cat,
                'description' => 'Segar, manis pas, dan cocok untuk semua suasana.',
                'price' => $price,
                'status' => true,
                'sold_count' => random_int(0, 50),
            ]);
        }

        Banner::create([
            'title' => 'Promo Opening! Beli 2 Lebih Hemat',
            'image' => 'banners/sample.jpg',
            'description' => 'Rayakan awal perjalanan HanaTea. Cek menu dan pesan via WhatsApp.',
            'is_active' => true,
        ]);

        foreach ([
            ['Nadia', 'Enak dan seger banget! Harga pelajar.', 5],
            ['Rafi', 'Green tea-nya creamy, suka.', 5],
            ['Salsa', 'Fast response, bisa QRIS juga.', 5],
        ] as [$n,$m,$r]) {
            Testimonial::create(['customer_name'=>$n,'message'=>$m,'rating'=>$r]);
        }
    }
}