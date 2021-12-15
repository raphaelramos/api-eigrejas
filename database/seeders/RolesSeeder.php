<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Role1 = new Role();
        $Role1->name = "presbítero";
        $Role1->save();

        $Role2 = new Role();
        $Role2->name = "Pastor";
        $Role2->save();

        $Role3 = new Role();
        $Role3->name = "Líder";
        $Role3->save();

        $Role4 = new Role();
        $Role4->name = "Membro";
        $Role4->save();
    }
}
