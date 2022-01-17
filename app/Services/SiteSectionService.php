<?php

namespace App\Services;

use App\Models\SiteSection;

class SiteSectionService
{
    public function getAll()
    {
        return SiteSection::all()->where('language','en')->groupBy('title');
    }

    public function getOne($id)
    {
        return SiteSection::where('uuid', $id)->get();
    }

    public function create($data)
    {
        return SiteSection::create($data);
    }

    public function update($id, $data, $language)
    {
        $siteSection = SiteSection::where('uuid', $id)->where('language', $language)->first();
        $siteSection->update($data);
        return $siteSection;
    }

    public function delete($id)
    {
        $siteSections = SiteSection::where('uuid',$id)->get();

        foreach ($siteSections as $siteSection) {
            $siteSection->delete();
        }
    }

}