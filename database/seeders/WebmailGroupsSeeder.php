<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\WebmailsGroup;

class WebmailGroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $WebmailsGroup = new WebmailsGroup();
        $WebmailsGroup->name = "Contato";
        $WebmailsGroup->color = "#202342";
        $WebmailsGroup->created_by = 1;
        $WebmailsGroup->save();

        $WebmailsGroup = new WebmailsGroup();
        $WebmailsGroup->name = "Oração";
        $WebmailsGroup->color = "#00bcd4";
        $WebmailsGroup->created_by = 1;
        $WebmailsGroup->save();

        $WebmailsGroup = new WebmailsGroup();
        $WebmailsGroup->name = "Eventos";
        $WebmailsGroup->color = "#f44336";
        $WebmailsGroup->created_by = 1;
        $WebmailsGroup->save();

    }
}
