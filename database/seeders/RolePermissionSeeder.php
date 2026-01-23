<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**
         * Super Admin seeder
         */
        $permissions = [
            'Kelola Statistik',
            'Kelola Produk',
            'Kelola Prinsip',
            'Kelola Testimoni',
            'Kelola Klien',
            'Kelola Tim',
            'Kelola Tentang',
            'Kelola Janji Temu',
            'Kelola Bagian Hero',
            'Kelola Pengguna',
            'Kelola Absensi',
        ];

        foreach($permissions as $permission) {
            Permission::firstOrCreate(
                [
                    'name' => $permission
                ]
            );
        }

        $superAdminRole = Role::firstOrCreate(
            [
                'name' => 'super_admin'
            ]
        );

        $superAdminRole->syncPermissions($permissions);

        $user = User::firstOrCreate(
            [
                'email' => 'admin@pk-karisma.co.id'
            ],
            [
                'name' => 'PK-Karisma',
                'password' => Hash::make("Demo123!")
            ]
        );

        $user->assignRole($superAdminRole);

        /**
         * Multi Role seeder example
         */
        $designManagerPermissions = [
            'Kelola Produk',
            'Kelola Prinsip',
            'Kelola Testimoni',
        ];

        $designManagerRole = Role::firstOrCreate(
            [
                'name' => 'design_manager'
            ]
        );

        $designManagerRole->syncPermissions($designManagerPermissions);

        Role::firstOrCreate(
            [
                'name' => 'user'
            ]
        );
    }
}
