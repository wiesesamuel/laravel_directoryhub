<?php

use App\Category;
use App\City;
use App\Company;
use Illuminate\Database\Seeder;

class RealWebsiteSeeder extends Seeder
{

    public function run()
    {
        Category::insert([
            [
                'name'=>'Klassisch',
                'type' => 'kind',
            ],
            [
                'name'=>'Naturheilkunde',
                'type' => 'kind',
            ],
            [
                'name'=>'Risikoschwangerschaft',
                'type' => 'kind',
            ],
            [
                'name'=>'Klinik',
                'type' => 'location',
            ],
            [
                'name'=>'Geburtenhaus',
                'type' => 'location',
            ],
            [
                'name'=>'Hausgeburt',
                'type' => 'location',
            ],
        ]);
        City::insert([
            [
                'name'=>'Ulm',
            ],
        ]);
        Company::factory(100)->create();

        $ids_ca = Category::all('id')->pluck('id')->toArray();
        $ids_ci = City::all('id')->pluck('id')->toArray();
        $ids_co = Company::all('id')->pluck('id')->toArray();

        // Add one random city to each company
        foreach ($ids_co as $co_id) {
            $random_ci_id =  $ids_ci[array_rand($ids_ci)];
            Company::find($co_id)->city()->associate($random_ci_id)->save();
        }

        // Add a random number of categories (at least one) to each company
        foreach ($ids_co as $co_id) {
            $random_ca_ids = array_rand($ids_ca, mt_rand(1, count($ids_ca)));
            if (!is_array($random_ca_ids)) {
                $random_ca_ids = [$random_ca_ids];
            }
            // Convert the keys to values
            $random_ca_ids = array_map(function ($key) use ($ids_ca) {
                return $ids_ca[$key];
            }, $random_ca_ids);
            Company::find($co_id)->categories()->attach($random_ca_ids);
        }

    }
}
