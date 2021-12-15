<?php
namespace Database\Seeders;
use App\Models\DecisionStatus;

use Illuminate\Database\Seeder;

class DecisionsStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $group1 = new DecisionStatus();
        $group1->name = "Abertas";
        $group1->save();

        $group2 = new DecisionStatus();
        $group2->name = "Permaneceu";
        $group2->save();

        $group3 = new DecisionStatus();
        $group3->name = "Não Permaneceu";
        $group3->save();

        $group4 = new DecisionStatus();
        $group4->name = "Outra Cidade";
        $group4->save();

        $group5 = new DecisionStatus();
        $group5->name = "Outra Igreja";
        $group5->save();
    }
}
