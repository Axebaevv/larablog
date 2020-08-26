<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $html = new Category();
        $html->name = strtoupper('HTML');
        $html->slug = strtolower('html');
        $html->save();

        $css = new Category();
        $css->name = strtoupper('CSS');
        $css->slug = strtolower('css');
        $css->save();

        $php = new Category();
        $php->name = strtoupper('PHP');
        $php->slug = strtolower('php');
        $php->save();
    }
}
