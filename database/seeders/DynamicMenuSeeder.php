<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class DynamicMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('dynamic_menu')->count() == 0){

            DB::table('dynamic_menu')->insert([

                [
                    'id' => 1,
                    'icon' => 'fa fa-lg fa-fw fa-american-sign-language-interpreting',
                    'title' => 'Home',
                    'page_id' => 1,
                    'url' => '#',
                    'parent_id' => 0,
                    'is_parent' => 1,
                    'show_menu' => 1,
                    'parent_order' => 1,
                    'child_order' => 0,
                    'fOrder' => 1.00,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'id' => 2,
                    'icon' => 'fa fa-lg fa-fw fa-asterisk',
                    'title' => 'Master',
                    'page_id' => 2,
                    'url' => '#',
                    'parent_id' => 0,
                    'is_parent' => 1,
                    'show_menu' => 1,
                    'parent_order' => 2,
                    'child_order' => 0,
                    'fOrder' => 2.00,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'id' => 9,
                    'icon' => '',
                    'title' => 'Qualifications',
                    'page_id' => 8,
                    'url' => 'qualification-list',
                    'parent_id' => 2,
                    'is_parent' => 0,
                    'show_menu' => 0,
                    'parent_order' => null,
                    'child_order' => 7,
                    'fOrder' => 2.07,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'id' => 120,
                    'icon' => 'fa fa-lg fa-fw fa-user',
                    'title' => 'Admin',
                    'page_id' => 120,
                    'url' => '#',
                    'parent_id' => 0,
                    'is_parent' => 1,
                    'show_menu' => 1,
                    'parent_order' => 10,
                    'child_order' => 0,
                    'fOrder' => 120.00,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'id' => 121,
                    'icon' => '',
                    'title' => 'User',
                    'page_id' => 121,
                    'url' => 'users-list',
                    'parent_id' => 120,
                    'is_parent' => 0,
                    'show_menu' => 1,
                    'parent_order' => NULL,
                    'child_order' => 1,
                    'fOrder' => 120.01,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'id' => 122,
                    'icon' => '',
                    'title' => 'Role',
                    'page_id' => 122,
                    'url' => 'roles.index',
                    'parent_id' => 120,
                    'is_parent' => 0,
                    'show_menu' => 1,
                    'parent_order' => NULL,
                    'child_order' => 2,
                    'fOrder' => 120.02,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'id' => 123,
                    'icon' => '',
                    'title' => 'Logs',
                    'page_id' => 123,
                    'url' => 'log-activity-list',
                    'parent_id' => 120,
                    'is_parent' => 0,
                    'show_menu' => 1,
                    'parent_order' => NULL,
                    'child_order' => 3,
                    'fOrder' => 120.03,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],

            ]);

        } else { echo "\e[31mTable is not empty, therefore NOT "; }
    }
}
