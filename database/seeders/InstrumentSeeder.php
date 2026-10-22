<?php

namespace Database\Seeders;

use App\Models\Instrument;
use Illuminate\Database\Seeder;

class InstrumentSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'name' => 'Gitar Akustik',
                'brand' => 'Yamaha',
                'price' => 1250000,
                'description' => 'Gitar akustik dengan suara hangat, cocok untuk pemula maupun pemain berpengalaman.',
                'image' => 'guitar.svg',
                'type' => 'Gitar',
            ],
            [
                'name' => 'Keyboard Elektrik',
                'brand' => 'Casio',
                'price' => 1850000,
                'description' => 'Keyboard elektrik dengan beragam suara instrumen dan fitur latihan untuk belajar musik.',
                'image' => 'keyboard.svg',
                'type' => 'Keyboard',
            ],
            [
                'name' => 'Drum Akustik',
                'brand' => 'Pearl',
                'price' => 4250000,
                'description' => 'Set drum untuk latihan dan pertunjukan dengan karakter suara yang kuat.',
                'image' => 'drums.svg',
                'type' => 'Drum',
            ],
            [
                'name' => 'Biola Pemula',
                'brand' => 'Stentor',
                'price' => 980000,
                'description' => 'Biola untuk pemula yang ingin mempelajari teknik dasar permainan gesek.',
                'image' => 'violin.svg',
                'type' => 'Biola',
            ],
            [
                'name' => 'Ukulele',
                'brand' => 'Kala',
                'price' => 450000,
                'description' => 'Ukulele berukuran ringkas, mudah dibawa, dan cocok dimainkan saat bersantai.',
                'image' => 'ukulele.svg',
                'type' => 'Senar',
            ],
            [
                'name' => 'Gitar Elektrik',
                'brand' => 'Squier',
                'price' => 2750000,
                'description' => 'Gitar elektrik dengan desain klasik untuk berbagai genre musik.',
                'image' => 'electric-guitar.svg',
                'type' => 'Gitar',
            ],
        ]

        ;

        foreach ($items as $item) {
            Instrument::updateOrCreate(
                ['name' => $item['name']],
                $item
            );
        }
    }
}
