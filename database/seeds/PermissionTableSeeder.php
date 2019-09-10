<?php

use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = [
            [
                'name' => 'manage-users',
                'display_name' => 'manage-users',
                'description' => 'manage sers (CRUD)',
            ],
            [
                'name' => 'manage-roles',
                'display_name' => 'manage-roles',
                'description' => 'manage roles (CRUD)',
            ],
            [
                'name' => 'book-view-list',
                'display_name' => 'book-view-list',
                'description' => 'view list all books',
            ],
            [
                'name' => 'book-create',
                'display_name' => 'book-create',
                'description' => 'create new books',
            ],
            [
                'name' => 'book-update',
                'display_name' => 'book-update',
                'description' => 'update books',
            ],
            [
                'name' => 'book-delete',
                'display_name' => 'book-delete',
                'description' => 'delete books',
            ],
            [
                'name' => 'access-dashboard',
                'display_name' => 'access-dashboard',
                'description' => 'access-dashboard',
            ],
        ];

        DB::table('permissions')->insert($permission);
    }
}
