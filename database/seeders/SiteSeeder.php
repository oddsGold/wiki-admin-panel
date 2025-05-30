<?php


namespace Database\Seeders;


use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class SiteSeeder extends Seeder
{


    public function run()
    {

        $user = \App\Models\User::query()->first();
        if(!is_null($user)){

            \App\Models\UserMemo\Type::factory()
                ->for($user, 'user')
                ->create(['id' => \App\Models\UserMemo\Type::SOTA_CRS, 'title' => 'Пам’ятка користувача «СОТА CRS»']);

            \App\Models\UserMemo\Type::factory()
                ->for($user, 'user')
                ->create(['id' => \App\Models\UserMemo\Type::SOTA_API_CRS, 'title' => 'Пам’ятка користувача «СОТА API CRS»']);


            \App\Models\File::factory()
                ->for($user, 'user')
                ->create([
                    'name' => 'vHMn00v6ouzgZXiHqgLDArz5DdfHdfUG8659jbwU.pdf',
                    'origin' => 'presentation.pdf',
                    'path' => 'uploads/files/2024/06',
                    'size' => 2996474,
                    'type' => 'application/pdf',
                ]);


        }
    }

}
