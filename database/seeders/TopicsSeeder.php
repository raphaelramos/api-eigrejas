<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Topic;

class TopicsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // About
        $Topic = new Topic();
        $Topic->row_no = 1;
        $Topic->webmaster_id = 1;
        $Topic->title_pt = "Sobre nós";
        $Topic->title_en = "About Us";
        $Topic->title_es = "Sobre nosotras";
        $Topic->details_pt = "Coloque aqui um texto falando mais sobre sua igreja.";
        $Topic->details_en = "Put a text here talking more about your church.";
        $Topic->details_es = "Pon un texto aquí hablando más sobre tu iglesia.";
        $Topic->seo_url_slug_pt = "sobre";
        $Topic->date = date('Y-m-d');
        $Topic->status = 1;
        $Topic->visits = 0;
        $Topic->section_id = 0;
        $Topic->created_by = 1;
        $Topic->save();


        // Contact
        $Topic = new Topic();
        $Topic->row_no = 2;
        $Topic->webmaster_id = 1;
        $Topic->title_pt = "Fale Conosco";
        $Topic->title_en = "Contact Us";
        $Topic->title_es = "Contacta con nosotras";
        $Topic->details_pt ="";
        $Topic->details_en = "";
        $Topic->details_es = "";
        $Topic->seo_url_slug_pt = "fale-conosco";
        $Topic->seo_url_slug_en = "contact";
        $Topic->seo_url_slug_es = "contacto";
        $Topic->date = date('Y-m-d');
        $Topic->status = 1;
        $Topic->visits = 0;
        $Topic->section_id = 0;
        $Topic->created_by = 1;
        $Topic->save();

        // home
        $Topic = new Topic();
        $Topic->row_no = 3;
        $Topic->webmaster_id = 1;
        $Topic->title_pt = "Home";
        $Topic->title_en = "Home";
        $Topic->title_es = "Home";
        $Topic->details_pt = "<h4 style='text-align: center'>Confira as informações da nossa Igreja. Será uma alegria ter você conosco!</h4>";
        $Topic->details_en = "<h4 style='text-align: center'>Check out our Church information. It will be a joy to have you with us!</h4>";
        $Topic->details_es = "<h4 style='text-align: center'>Consulte la información de nuestra Iglesia. ¡Será un placer tenerte con nosotros!</h4>";
        $Topic->seo_url_slug_pt = "bemvindo";
        $Topic->date = date('Y-m-d');
        $Topic->status = 1;
        $Topic->visits = 0;
        $Topic->section_id = 0;
        $Topic->created_by = 1;
        $Topic->save();

        // donate
        $Topic = new Topic();
        $Topic->row_no = 4;
        $Topic->webmaster_id = 1;
        $Topic->title_pt = "Contribuição";
        $Topic->title_en = "Donations";
        $Topic->title_es = "Donaciones";
        $Topic->details_pt = '<h3>Formas de contribuir</h3><h3><img src="https://eigrejas.com/assets/frontend/img/logo_pix.png" style="width: 259.089px; height: 91.161px;"><br><br>Chave Pix:&nbsp;</h3>';
        $Topic->seo_url_slug_pt = "contribuicoes";
        $Topic->date = date('Y-m-d');
        $Topic->status = 1;
        $Topic->visits = 0;
        $Topic->section_id = 0;
        $Topic->created_by = 1;
        $Topic->save();

    }
}
