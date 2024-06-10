<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{

    private $permissions = [
        'dashboard',

        'permission-list',
        'permission-create',
        'permission-edit',
        'permission-delete',

        'role-list',
        'role-create',
        'role-edit',
        'role-delete',

        'admin-list',
        'admin-create',
        'admin-edit',
        'admin-delete',

        'instructor-list',
        'instructor-create',
        'instructor-edit',
        'instructor-delete',

        'student-list',
        'student-create',
        'student-edit',
        'student-delete',

        'author-list',
        'author-create',
        'author-edit',
        'author-delete',

        'course-list',
        'course-create',
        'course-edit',
        'course-delete',

        'enrollment-list',
        'enrollment-create',
        'enrollment-edit',
        'enrollment-delete',

        'article-list',
        'article-create',
        'article-edit',
        'article-delete',

        'forum-list',
        'forum-create',
        'forum-edit',
        'forum-delete',

        'forum-reply-list',
        'forum-reply-create',
        'forum-reply-edit',
        'forum-reply-delete',
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        $admin = Role::firstOrCreate(['name' => 'admin']);

        $admin->givePermissionTo($this->permissions);

        $student = Role::firstOrCreate(['name' => 'student']);

        $instructor = Role::firstOrCreate(['name' => 'instructor']);

        $instructor->givePermissionTo([
            'course-list',
            'course-create',
            'course-edit',
            'course-delete',

            'enrollment-list',
            'enrollment-create',
            'enrollment-edit',
            'enrollment-delete',

            'student-list',
            'student-create',
            'student-edit',
            'student-delete'
        ]);

        $author = Role::firstOrCreate(['name' => 'author']);

        $author->givePermissionTo([
            'article-list',
            'article-create',
            'article-edit',
            'article-delete'
        ]);
    }
}
