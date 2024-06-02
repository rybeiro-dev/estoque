<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Group;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Product;
use App\Models\Department;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $groups = [
            [
                'description' => 'Móveis'
            ],
            [
                'description' => 'Monitores'
            ],
            [
                'description' => 'Macbook'
            ],
            [
                'description' => 'Computador'
            ],
            [
                'description' => 'Teclado'
            ],
            [
                'description' => 'Mouse'
            ],
        ];

        $departments = [
            [
                'description' => 'Tecnologia'
            ],
            [
                'description' => 'Administrativo'
            ],
            [
                'description' => 'Financeiro'
            ],
            [
                'description' => 'Comercial'
            ],
            [
                'description' => 'Relacionamento'
            ]
        ];

        foreach($groups as $group)
            Group::create($group);

        foreach ($departments as $department)
            Department::create($department);

        Product::factory(1000)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
