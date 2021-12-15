<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\WebmasterSection;

class WebmasterSectionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Site pages
        $sections = new WebmasterSection();
        $sections->row_no = 1;
        $sections->title_pt = "Páginas";
        $sections->title_en = "Site pages";
        $sections->title_es = "Paginas";
        $sections->seo_title_pt = "Páginas";
        $sections->seo_title_en = "Site pages";
        $sections->seo_title_es = "Paginas";
        $sections->seo_url_slug_pt = "page";
        $sections->seo_url_slug_en = "page";
        $sections->seo_url_slug_es = "page";
        $sections->type = 0;
        $sections->sections_status = 0;
        $sections->comments_status = 0;
        $sections->date_status = 0;
        $sections->longtext_status = 1;
        $sections->editor_status = 1;
        $sections->attach_file_status = 1;
        $sections->multi_images_status = 0;
        $sections->section_icon_status = 1;
        $sections->icon_status = 0;
        $sections->maps_status = 1;
        $sections->order_status = 0;
        $sections->related_status = 0;
        $sections->expire_date_status = 0;
        $sections->extra_attach_file_status = 0;
        $sections->status = 1;
        $sections->created_by = 1;
        $sections->save();

        // News
        $sections = new WebmasterSection();
        $sections->row_no = 2;
        $sections->title_pt = "Notícias";
        $sections->title_en = "News";
        $sections->title_es = "Noticias";
        $sections->seo_title_pt = "Notícias";
        $sections->seo_title_en = "News";
        $sections->seo_title_es = "Noticias";
        $sections->seo_url_slug_pt = "noticias";
        $sections->seo_url_slug_en = "news";
        $sections->seo_url_slug_es = "noticias";
        $sections->type = 0;
        $sections->sections_status = 0;
        $sections->comments_status = 0;
        $sections->date_status = 1;
        $sections->longtext_status = 1;
        $sections->editor_status = 1;
        $sections->attach_file_status = 0;
        $sections->multi_images_status = 0;
        $sections->section_icon_status = 1;
        $sections->icon_status = 0;
        $sections->maps_status = 0;
        $sections->order_status = 0;
        $sections->related_status = 1;
        $sections->expire_date_status = 0;
        $sections->extra_attach_file_status = 0;
        $sections->status = 1;
        $sections->created_by = 1;
        $sections->save();

        // Articles
        $sections = new WebmasterSection();
        $sections->row_no = 3;
        $sections->title_pt = "Blog";
        $sections->title_en = "Blog";
        $sections->title_es = "Blog";
        $sections->seo_title_pt = "Blog";
        $sections->seo_title_en = "Blog";
        $sections->seo_title_es = "Blog";
        $sections->seo_url_slug_pt = "blog";
        $sections->seo_url_slug_en = "blog";
        $sections->seo_url_slug_es = "blog";
        $sections->type = 0;
        $sections->sections_status = 1;
        $sections->comments_status = 0;
        $sections->date_status = 1;
        $sections->longtext_status = 1;
        $sections->editor_status = 1;
        $sections->attach_file_status = 0;
        $sections->multi_images_status = 0;
        $sections->section_icon_status = 1;
        $sections->icon_status = 0;
        $sections->maps_status = 0;
        $sections->order_status = 0;
        $sections->related_status = 1;
        $sections->expire_date_status = 0;
        $sections->extra_attach_file_status = 0;
        $sections->status = 1;
        $sections->created_by = 1;
        $sections->save();

        // Channel
        $sections = new WebmasterSection();
        $sections->row_no = 4;
        $sections->title_pt = "Canal Youtube";
        $sections->title_en = "Youtube Channel";
        $sections->title_es = "Youtube Channel";
        $sections->seo_title_pt = "Canal Youtube";
        $sections->seo_title_en = "Youtube Channel";
        $sections->seo_title_es = "Youtube Channel";
        $sections->seo_url_slug_pt = "canal-youtube";
        $sections->seo_url_slug_en = "youtube-channel";
        $sections->seo_url_slug_es = "youtube-channel";
        $sections->type = 6;
        $sections->photo_status = 0;
        $sections->sections_status = 0;
        $sections->comments_status = 0;
        $sections->date_status = 0;
        $sections->longtext_status = 0;
        $sections->editor_status = 0;
        $sections->attach_file_status = 0;
        $sections->multi_images_status = 0;
        $sections->section_icon_status = 0;
        $sections->icon_status = 0;
        $sections->maps_status = 0;
        $sections->order_status = 0;
        $sections->related_status = 0;
        $sections->expire_date_status = 0;
        $sections->extra_attach_file_status = 0;
        $sections->status = 1;
        $sections->created_by = 1;
        $sections->save();

        // Videos
        $sections = new WebmasterSection();
        $sections->row_no = 5;
        $sections->title_pt = "Vídeos";
        $sections->title_en = "Videos";
        $sections->title_es = "Videos";
        $sections->seo_title_pt = "Vídeos";
        $sections->seo_title_en = "Videos";
        $sections->seo_title_es = "Videos";
        $sections->seo_url_slug_pt = "videos";
        $sections->seo_url_slug_en = "videos";
        $sections->seo_url_slug_es = "videos";
        $sections->type = 2;
        $sections->sections_status = 1;
        $sections->comments_status = 0;
        $sections->date_status = 0;
        $sections->longtext_status = 0;
        $sections->editor_status = 0;
        $sections->attach_file_status = 0;
        $sections->multi_images_status = 0;
        $sections->section_icon_status = 1;
        $sections->icon_status = 0;
        $sections->maps_status = 0;
        $sections->order_status = 0;
        $sections->related_status = 1;
        $sections->expire_date_status = 0;
        $sections->extra_attach_file_status = 0;
        $sections->status = 1;
        $sections->created_by = 1;
        $sections->save();

        // Photos
        $sections = new WebmasterSection();
        $sections->row_no = 6;
        $sections->title_pt = "Fotos";
        $sections->title_en = "Photos";
        $sections->title_es = "Fotos";
        $sections->seo_title_pt = "Fotos";
        $sections->seo_title_en = "Photos";
        $sections->seo_title_es = "Fotos";
        $sections->seo_url_slug_pt = "fotos";
        $sections->seo_url_slug_en = "photos";
        $sections->seo_url_slug_es = "Fotos";
        $sections->type = 1;
        $sections->sections_status = 0;
        $sections->comments_status = 1;
        $sections->date_status = 0;
        $sections->longtext_status = 0;
        $sections->editor_status = 0;
        $sections->attach_file_status = 0;
        $sections->multi_images_status = 1;
        $sections->section_icon_status = 1;
        $sections->icon_status = 0;
        $sections->maps_status = 0;
        $sections->order_status = 0;
        $sections->related_status = 0;
        $sections->expire_date_status = 0;
        $sections->extra_attach_file_status = 0;
        $sections->status = 1;
        $sections->created_by = 1;
        $sections->save();

    }
}
