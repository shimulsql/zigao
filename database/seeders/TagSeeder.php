<?php

namespace Database\Seeders;

use App\Models\Tags;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->tags() as $tag) {
            Tags::create(['name' => $tag]);
        }
    }

    private function tags()
    {
        return [
            'php',
            'laravel',
            'javascript',
            'react',
            'vue',
            'jquery',
            'python',
            'cpp',
            'nodejs',
            'angular',
            'svelte',
            'html',
            'css',
        ];
    }
}
