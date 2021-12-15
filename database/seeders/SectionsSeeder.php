<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Section;

class SectionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Section = new Section();
        $Section->title_pt = "Estudos";
        $Section->title_en = "Studies";
        $Section->title_es = "Estudios";
        $Section->photo = null;
        $Section->icon = null;
        $Section->status = 1;
        $Section->visits = 0;
        $Section->webmaster_id = 3;
        $Section->father_id = 0;
        $Section->row_no = 1;
        $Section->seo_title_pt = "Estudos";
        $Section->seo_title_en = "Studies";
        $Section->seo_title_es = "Estudios";
        $Section->seo_description_pt = "Estudos";
        $Section->seo_description_en = "Studies";
        $Section->seo_description_es = "Estudios";
        $Section->seo_keywords_pt = null;
        $Section->seo_keywords_en = null;
        $Section->seo_keywords_es = null;
        $Section->seo_url_slug_pt = "estudos";
        $Section->seo_url_slug_en = "studies";
        $Section->seo_url_slug_es = "estudios";
        $Section->save();
    }
}
