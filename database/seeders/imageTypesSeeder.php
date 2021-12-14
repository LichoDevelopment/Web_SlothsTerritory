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

        ImageType::create([ 'name_en' => 'Sloths', 'name_es' => 'Perezosos' ]);

        ImageType::create([ 'name_en' => 'Frogs', 'name_es' => 'Ranas' ]);

        ImageType::create([ 'name_en' => 'Monkeys', 'name_es' => 'Monos' ]);

        ImageType::create([ 'name_en' => 'Birds', 'name_es' => 'Aves' ]);

        ImageType::create([ 'name_en' => 'Other', 'name_es' => 'Otras' ]);
    }
}



