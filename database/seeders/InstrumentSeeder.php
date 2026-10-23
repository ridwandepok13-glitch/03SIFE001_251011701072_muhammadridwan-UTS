<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Instrument;

class InstrumentSeeder extends Seeder
{
    public function run(): void
    {
        $instruments = [
            [
                'name' => 'Yamaha F310',
                'brand' => 'Yamaha',
                'type' => 'Gitar Akustik',
                'price' => 2199000,
                'description' => 'Gitar akustik berkualitas untuk pemula dan musisi.',
                'image' => 'instruments/yamaha-f310.jpg',
            ],
            [
                'name' => 'Yamaha PSR-E373',
                'brand' => 'Yamaha',
                'type' => 'Keyboard',
                'price' => 3500000,
                'description' => 'Keyboard dengan berbagai pilihan suara.',
                'image' => 'instruments/yamaha-psr-e373.jpg',
            ],
            [
                'name' => 'Pearl Drum Set',
                'brand' => 'Pearl',
                'type' => 'Drum',
                'price' => 4500000,
                'description' => 'Set drum untuk latihan dan pertunjukan.',
                'image' => 'instruments/pearl-drum.jpg',
            ],
            [
                'name' => 'Fender Squier Bass',
                'brand' => 'Squier',
                'type' => 'Bass',
                'price' => 3200000,
                'description' => 'Gitar bass untuk berbagai genre musik.',
                'image' => 'instruments/squier-bass.jpg',
            ],
        ];

        foreach ($instruments as $instrument) {
            Instrument::updateOrCreate(
                ['name' => $instrument['name']],
                $instrument
            );
        }
    }
}