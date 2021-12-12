<?php

namespace Database\Seeders;

use App\Models\ImageType;
use Illuminate\Database\Seeder;

class imageTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ImageType::create([ 'name' => 'sloths' ]);
        ImageType::create([ 'name' => 'ranas' ]);
        ImageType::create([ 'name' => 'monos' ]);
        ImageType::create([ 'name' => 'aves' ]);
        ImageType::create([ 'name' => 'otras' ]);
    }
}
