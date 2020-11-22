<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            'id'                => 1,
            'name'              => 'users-list',
            'display_name'      => 'عرض المستخدمين',
            'description'       => 'صلاحية عرض المستخدمين ',
            'routes'            => 'user.index'
        ]);
        
        DB::table('permissions')->insert([
            'id'                => 2,
            'name'              => 'users-create',
            'display_name'      => ' إنشاء المستخدمين',
            'description'       => 'صلاحية إنشاء المستخدمين',
            'routes'            => 'user.create,user.store'
        ]);

        DB::table('permissions')->insert([
            'id'                => 3,
            'name'              => 'users-edit',
            'display_name'      => ' تعديل المستخدمين',
            'description'       => 'صلاحية تعديل المستخدمين',
            'routes'            => 'user.edit,user.update'
        ]);

        DB::table('permissions')->insert([
            'id'                => 4,
            'name'              => 'users-delete',
            'display_name'      => ' حذف المستخدمين',
            'description'       => 'صلاحية حذف المستخدمين',
            'routes'            => 'user.destroy'
        ]);
    }
}
