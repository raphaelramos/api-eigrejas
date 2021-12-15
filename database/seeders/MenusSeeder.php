<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Main Menu
        $Menu1 = new Menu();
        $Menu1->row_no = 1;
        $Menu1->father_id = 0;
        $Menu1->title_pt = "Menu Topo";
        $Menu1->title_en = "Main Menu";
        $Menu1->title_es = "Menu Topo";
        $Menu1->status = 1;
        $Menu1->type = 0;
        $Menu1->cat_id = 0;
        $Menu1->link = "";
        $Menu1->created_by = 1;
        $Menu1->save();

        // Footer Menu
        $Menu2 = new Menu();
        $Menu2->row_no = 2;
        $Menu2->father_id = 0;
        $Menu2->title_pt = "Links";
        $Menu2->title_en = "Links";
        $Menu2->title_es = "Links";
        $Menu2->status = 1;
        $Menu2->type = 0;
        $Menu2->cat_id = 0;
        $Menu2->link = "";
        $Menu2->created_by = 1;
        $Menu2->save();

        // Social Menu
        $Menu3 = new Menu();
        $Menu3->row_no = 3;
        $Menu3->father_id = 0;
        $Menu3->title_pt = "Social Links";
        $Menu3->title_en = "Social Links";
        $Menu3->title_es = "Social Links";
        $Menu3->status = 1;
        $Menu3->type = 0;
        $Menu3->cat_id = 0;
        $Menu3->link = "links";
        $Menu3->created_by = 1;
        $Menu3->save();

        // Home
        $Menu = new Menu();
        $Menu->row_no = 1;
        $Menu->father_id = $Menu1->id;
        $Menu->title_pt = "Home";
        $Menu->title_en = "Home";
        $Menu->title_es = "Home";
        $Menu->status = 1;
        $Menu->type = 1;
        $Menu->cat_id = 0;
        $Menu->link = "home";
        $Menu->created_by = 1;
        $Menu->save();
        // About
        $Menu = new Menu();
        $Menu->row_no = 2;
        $Menu->father_id = $Menu1->id;
        $Menu->title_pt = "Nossa Igreja";
        $Menu->title_en = "About";
        $Menu->title_es = "acerca de";
        $Menu->status = 1;
        $Menu->type = 1;
        $Menu->cat_id = 0;
        $Menu->link = "sobre";
        $Menu->created_by = 1;
        $Menu->save();
        // News
        $Menu = new Menu();
        $Menu->row_no = 3;
        $Menu->father_id = $Menu1->id;
        $Menu->title_pt = "Notícias";
        $Menu->title_en = "News";
        $Menu->title_es = "noticias";
        $Menu->status = 1;
        $Menu->type = 2;
        $Menu->cat_id = 2;
        $Menu->link = "";
        $Menu->created_by = 1;
        $Menu->save();
        // Blog
        $Menu = new Menu();
        $Menu->row_no = 4;
        $Menu->father_id = $Menu1->id;
        $Menu->title_pt = "Blog";
        $Menu->title_en = "Blog";
        $Menu->title_es = "Blog";
        $Menu->status = 1;
        $Menu->type = 2;
        $Menu->cat_id = 3;
        $Menu->link = "";
        $Menu->created_by = 1;
        $Menu->save();
        // Donations
        $Menu = new Menu();
        $Menu->row_no = 5;
        $Menu->father_id = $Menu1->id;
        $Menu->title_pt = "Contribuições";
        $Menu->title_en = "Donations";
        $Menu->title_es = "Donaciones";
        $Menu->status = 1;
        $Menu->type = 1;
        $Menu->cat_id = 0;
        $Menu->link = "contribuicoes";
        $Menu->created_by = 1;
        $Menu->save();
        // Contact
        $Menu = new Menu();
        $Menu->row_no = 6;
        $Menu->father_id = $Menu1->id;
        $Menu->title_pt = "Contato";
        $Menu->title_en = "Contact";
        $Menu->title_es = "Contacto";
        $Menu->status = 1;
        $Menu->type = 1;
        $Menu->cat_id = 0;
        $Menu->link = "fale-conosco";
        $Menu->created_by = 1;
        $Menu->save();


        // Footer Menu Sub links
        // Home
        $Menu = new Menu();
        $Menu->row_no = 1;
        $Menu->father_id = $Menu2->id;
        $Menu->title_pt = "Home";
        $Menu->title_en = "Home";
        $Menu->title_es = "Home";
        $Menu->status = 1;
        $Menu->type = 1;
        $Menu->cat_id = 0;
        $Menu->link = "home";
        $Menu->created_by = 1;
        $Menu->save();
        // About
        $Menu = new Menu();
        $Menu->row_no = 2;
        $Menu->father_id = $Menu2->id;
        $Menu->title_pt = "Sobre";
        $Menu->title_en = "About Us";
        $Menu->title_es = "Acerca de";
        $Menu->status = 1;
        $Menu->type = 1;
        $Menu->cat_id = 0;
        $Menu->link = "sobre";
        $Menu->created_by = 1;
        $Menu->save();
        // Blog
        $Menu = new Menu();
        $Menu->row_no = 3;
        $Menu->father_id = $Menu2->id;
        $Menu->title_pt = "Conteúdo";
        $Menu->title_en = "Blog";
        $Menu->title_es = "Blog";
        $Menu->status = 1;
        $Menu->type = 2;
        $Menu->cat_id = 3;
        $Menu->link = "";
        $Menu->created_by = 1;
        $Menu->save();
        // Contact
        $Menu = new Menu();
        $Menu->row_no = 4;
        $Menu->father_id = $Menu2->id;
        $Menu->title_pt = "Fale Conosco";
        $Menu->title_en = "Contact Us";
        $Menu->title_en = "Contacto";
        $Menu->status = 1;
        $Menu->type = 1;
        $Menu->cat_id = 0;
        $Menu->link = "fale-conosco";
        $Menu->created_by = 1;
        $Menu->save();
    }
}
