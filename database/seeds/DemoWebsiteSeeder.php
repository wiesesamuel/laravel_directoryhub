<?php

use App\Category;
use App\City;
use App\Company;
use Illuminate\Database\Seeder;

class DemoWebsiteSeeder extends Seeder
{
    private $count_ca = 7;
    private $count_ci = 3;
    private $count_co = 100;

    public function run()
    {
        Category::factory($this->count_ca)->create();
        City::factory($this->count_ci)->create();
        Company::factory($this->count_co)->create();

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
