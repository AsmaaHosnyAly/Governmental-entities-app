<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Gender;


class GenderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('genders')->delete();

        $genders = [
            'male',
            'female'

        ];
        foreach ($genders as $ge) {
            Gender::create(['Name' => $ge]);
        }
    }
}

