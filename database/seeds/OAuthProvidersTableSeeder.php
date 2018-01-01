<?php

use Illuminate\Database\Seeder;

class OAuthProvidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('oauth_providers') -> insert([
        	['id' => 1, 'name' => 'facebook'],
        	['id' => 2, 'name' => 'twitter'],
        	['id' => 3, 'name' => 'linkedin'],
        	['id' => 4, 'name' => 'google'],
        	['id' => 5, 'name' => 'github'],
        	['id' => 6, 'name' => 'bitbucket'],
        ]);
    }
}
