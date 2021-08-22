<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $c1 = Category::create([
           'name' => 'Web Development',
           'about' => 'officia est expedita minus quidem. Modi aut enim sequi optio quas quas nostrum aut. Commodi voluptas ut eos. Dicta alias non sint dolorem magnam. '
       ]);
       $c2 = Category::create([
           'name' => 'Web Designe',
           'about' => 'officia est expedita minus quidem. Modi aut enim sequi optio quas quas nostrum aut. Commodi voluptas ut eos. Dicta alias non sint dolorem magnam. '
       ]);
       $c3 = Category::create([
           'name' => 'IOT',
           'about' => 'officia est expedita minus quidem. Modi aut enim sequi optio quas quas nostrum aut. Commodi voluptas ut eos. Dicta alias non sint dolorem magnam. '
       ]);
       $c4 = Category::create([
           'name' => 'Blog',
           'about' => 'officia est expedita minus quidem. Modi aut enim sequi optio quas quas nostrum aut. Commodi voluptas ut eos. Dicta alias non sint dolorem magnam. '
       ]);
       $c5 = Category::create([
           'name' => 'Other',
           'about' => 'officia est expedita minus quidem. Modi aut enim sequi optio quas quas nostrum aut. Commodi voluptas ut eos. Dicta alias non sint dolorem magnam. '
       ]);
    }
}
