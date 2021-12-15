<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //  Default Site Settings

        $settings = new Setting();
        $settings->site_title_pt = "e-igrejas";
        $settings->site_title_en = "e-igrejas";
        $settings->site_title_es = "e-igrejas";
        $settings->site_desc_pt = "Site da Igreja";
        $settings->site_desc_en = "Site da Igreja";
        $settings->site_desc_es = "Site da Igreja";
        $settings->site_keywords_pt = "";
        $settings->site_keywords_en = "";
        $settings->site_webmails = "contato@dominio.com";
        $settings->site_app_banner = "1";
        $settings->notify_messages_status = "1";
        $settings->notify_comments_status = "1";
        $settings->notify_orders_status = "1";
        $settings->site_url = "http://eigrejas.com/";
        $settings->site_status = "1";
        $settings->close_msg = "Site em mantenção. \n<h1>Voltamos em breve</h1>";
        $settings->contact_t1_pt = "Endereço, Cidade";
        // $settings->contact_t1_en = "";
        // $settings->contact_t1_es = "";
        // $settings->contact_t3 = "(xx) xxxx-xxxx";
        // $settings->contact_t4 = "(xx) xxxx-xxxx";
        // $settings->contact_t5 = "(xx) xxxx-xxxx";
        $settings->contact_t6 = "contato@meudominio.com";
        $settings->contact_t7_pt = "Segunda a Sexta 08h às 18h";
        // $settings->contact_t7_en = "";
        // $settings->contact_t7_es = "";

        $settings->style_color1 = "#202342";
        $settings->style_color2 = "#2f2f2f";
        $settings->style_color3 = "#3494c8";
        $settings->style_type = "0";
        $settings->style_bg_type = "0";
        $settings->style_subscribe = "0";
        $settings->style_footer = "1";
        $settings->style_header = "0";
        $settings->style_preload = "0";
        $settings->created_by = 1;

        $settings->save();
    }
}
