<?php

namespace Database\Seeders;
use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Language = new Language;
        $Language->title = "Português";
        $Language->code = "pt";
        $Language->direction = "ltr";
        $Language->icon = "br";
        $Language->box_status = 1;
        $Language->left = "left";
        $Language->right = "right";
        $Language->status = 1;
        $Language->created_by = 1;
        $Language->save();

        $Language = new Language;
        $Language->title = "English";
        $Language->code = "en";
        $Language->direction = "ltr";
        $Language->icon = "us";
        $Language->box_status = 1;
        $Language->left = "left";
        $Language->right = "right";
        $Language->status = 0;
        $Language->created_by = 1;
        $Language->save();

        $Language = new Language;
        $Language->title = "Español";
        $Language->code = "es";
        $Language->direction = "ltr";
        $Language->icon = "mx";
        $Language->box_status = 1;
        $Language->left = "left";
        $Language->right = "right";
        $Language->status = 0;
        $Language->created_by = 1;
        $Language->save();
    }
}
