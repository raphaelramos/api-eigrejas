<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Permissions;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $Permissions = new Permissions();
        $Permissions->name = "Completo";
        $Permissions->view_status = false;
        $Permissions->add_status = true;
        $Permissions->edit_status = true;
        $Permissions->delete_status = true;
        $Permissions->active_status = true;
        $Permissions->analytics_status = true;
        $Permissions->inbox_status = true;
        $Permissions->newsletter_status = true;
        $Permissions->calendar_status = true;
        $Permissions->banners_status = true;
        $Permissions->settings_status = true;
        $Permissions->webmaster_status = true;
        $Permissions->data_sections = "1,2,3,4,5,6,7,8,9";
        $Permissions->content_status = true;
        $Permissions->panel_status = true;
        $Permissions->panel_sections = "0";
        $Permissions->status = true;
        $Permissions->created_by = 1;
        $Permissions->save();

        $Permissions = new Permissions();
        $Permissions->name = "Pastor";
        $Permissions->view_status = false;
        $Permissions->add_status = true;
        $Permissions->edit_status = true;
        $Permissions->delete_status = true;
        $Permissions->active_status = true;
        $Permissions->analytics_status = true;
        $Permissions->inbox_status = true;
        $Permissions->newsletter_status = true;
        $Permissions->calendar_status = true;
        $Permissions->banners_status = true;
        $Permissions->settings_status = true;
        $Permissions->webmaster_status = false;
        $Permissions->data_sections = "0";
        $Permissions->content_status = true;
        $Permissions->panel_status = true;
        $Permissions->panel_sections = "0";
        $Permissions->status = true;
        $Permissions->created_by = 1;
        $Permissions->save();

        $Permissions = new Permissions();
        $Permissions->name = "Líder";
        $Permissions->view_status = true;
        $Permissions->add_status = false;
        $Permissions->edit_status = false;
        $Permissions->delete_status = false;
        $Permissions->active_status = false;
        $Permissions->analytics_status = false;
        $Permissions->inbox_status = false;
        $Permissions->newsletter_status = false;
        $Permissions->calendar_status = false;
        $Permissions->banners_status = false;
        $Permissions->settings_status = false;
        $Permissions->webmaster_status = false;
        $Permissions->data_sections = "";
        $Permissions->content_status = false;
        $Permissions->panel_status = true;
        $Permissions->panel_sections = "4";
        $Permissions->only_assigned = true;
        $Permissions->status = true;
        $Permissions->created_by = 1;
        $Permissions->save();

        $Permissions = new Permissions();
        $Permissions->name = "Conteúdo";
        $Permissions->view_status = false;
        $Permissions->add_status = true;
        $Permissions->edit_status = true;
        $Permissions->delete_status = true;
        $Permissions->active_status = true;
        $Permissions->analytics_status = true;
        $Permissions->inbox_status = true;
        $Permissions->newsletter_status = true;
        $Permissions->calendar_status = true;
        $Permissions->banners_status = true;
        $Permissions->settings_status = false;
        $Permissions->webmaster_status = false;
        $Permissions->data_sections = "";
        $Permissions->content_status = true;
        $Permissions->panel_status = false;
        $Permissions->status = true;
        $Permissions->created_by = 1;
        $Permissions->save();


        $Permissions = new Permissions();
        $Permissions->name = "Usuário Limitado";
        $Permissions->view_status = false;
        $Permissions->add_status = false;
        $Permissions->edit_status = false;
        $Permissions->delete_status = false;
        $Permissions->active_status = false;
        $Permissions->analytics_status = false;
        $Permissions->inbox_status = false;
        $Permissions->newsletter_status = false;
        $Permissions->calendar_status = false;
        $Permissions->banners_status = false;
        $Permissions->settings_status = false;
        $Permissions->webmaster_status = false;
        $Permissions->data_sections = "";
        $Permissions->content_status = false;
        $Permissions->status = true;
        $Permissions->created_by = 1;
        $Permissions->save();

    }
}
