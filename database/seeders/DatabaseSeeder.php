<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create Roles
        $superadminRole = Role::create([
            'name' => 'superadmin',
            'description' => 'Super Administrator with full access',
        ]);

        $adminRole = Role::create([
            'name' => 'admin',
            'description' => 'Administrator with restricted access',
        ]);

        $userRole = Role::create([
            'name' => 'user',
            'description' => 'Standard user access',
        ]);

        // Create Menus
        $menus = [
            ['name' => 'Dashboard', 'route' => 'dashboard', 'icon' => 'fas fa-tachometer-alt', 'order' => 1],
            ['name' => 'Manajemen Anggota', 'route' => 'members.index', 'icon' => 'fas fa-users', 'order' => 2],
            ['name' => 'Manajemen Kas', 'route' => 'cash.index', 'icon' => 'fas fa-exchange-alt', 'order' => 3],
            ['name' => 'Simpanan', 'route' => 'savings.index', 'icon' => 'fas fa-piggy-bank', 'order' => 4],
            ['name' => 'Pinjaman', 'route' => 'loans.index', 'icon' => 'fas fa-hand-holding-usd', 'order' => 5],
            ['name' => 'Laporan Neraca', 'route' => 'reports.index', 'icon' => 'fas fa-chart-bar', 'order' => 6],
            ['name' => 'Pengaturan', 'route' => 'settings.index', 'icon' => 'fas fa-cog', 'order' => 7],
            ['name' => 'Manajemen Role', 'route' => 'roles.index', 'icon' => 'fas fa-user-shield', 'order' => 8],
        ];

        foreach ($menus as $menuData) {
            \App\Models\Menu::create($menuData);
        }

        // Assign Menus to Roles
        $allMenus = \App\Models\Menu::all();
        $superadminRole->menus()->sync($allMenus);

        $adminMenus = $allMenus->whereIn('route', ['dashboard', 'members.index', 'savings.index', 'loans.index', 'reports.index']);
        $adminRole->menus()->sync($adminMenus);

        $userMenus = $allMenus->whereIn('route', ['dashboard']);
        $userRole->menus()->sync($userMenus);

        // Create Superadmin User
        User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@koperasi.bri',
            'password' => Hash::make('password'),
            'role_id' => $superadminRole->id,
            'email_verified_at' => now(),
        ]);

        // Create Regular Admin
        User::create([
            'name' => 'Admin Unit',
            'email' => 'admin@koperasi.bri',
            'password' => Hash::make('password'),
            'role_id' => $adminRole->id,
            'email_verified_at' => now(),
        ]);

        // Create Standard User
        User::create([
            'name' => 'Anggota Koperasi',
            'email' => 'anggota@koperasi.bri',
            'password' => Hash::make('password'),
            'role_id' => $userRole->id,
            'email_verified_at' => now(),
        ]);
    }
}
