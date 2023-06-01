<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',

            'wallet-read',
            'wallet-create',

            'payment-list',
            'payment-create',
            'payment-edit',
            'payment-delete',

            'transaction-list',
            'transaction-create',

            'detail-user-list',
            'detail-user-create',
            'detail-user-edit',
            'detail-user-delete',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
