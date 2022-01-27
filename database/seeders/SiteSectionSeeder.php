<?php

namespace Database\Seeders;

use App\Models\SiteSection;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use File;
class SiteSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SiteSection::truncate();
        
        $enFile = File::get(public_path('en.json'));
        $esFile = File::get(public_path('es.json'));
        $enJson = json_decode($enFile, true);
        $esJson = json_decode($esFile, true);
        
        foreach ($esJson as $key => $item) {
            $uuid    = Str::uuid()->toString();

            $en = [
                'uuid' => $uuid,
                'title' => $key,
                'content' => $enJson[$key],
                'language' => 'en',
            ];

            $es = [
                'uuid' => $uuid,
                'title' => $key,
                'content' => $item,
                'language' => 'es',
            ];

            SiteSection::create($en);
            SiteSection::create($es);
        
        }
    }
}
