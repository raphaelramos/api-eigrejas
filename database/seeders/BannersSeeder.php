<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Banner;

class BannersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $Banner = new Banner();
        $Banner->row_no = 1;
        $Banner->section_id = 1;
        $Banner->title_pt = "Bem-vindo";
        $Banner->title_en = "Welcome";
        $Banner->title_es = "Bienvenido";
        $Banner->details_pt = "";
        $Banner->details_en = "";
        $Banner->details_es = "";
        $Banner->file_pt = "uploads/banners/welcome-pt.jpg";
        $Banner->file_en = "uploads/banners/welcome.jpg";
        $Banner->file_es = "uploads/banners/welcome-es.jpg";
        $Banner->link_url = "";
        $Banner->expire_date = null;
        $Banner->status = 1;
        $Banner->visits = 0;
        $Banner->created_by = 1;
        $Banner->save();

    }
}
