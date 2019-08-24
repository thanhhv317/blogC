<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
		    [
		    	'name' => 'Chuyện coding', 
		    	'slug' => 'chuyen-coding'
		    ],
		    [
		    	'name' => 'Chuyện nghề nghiệp', 
		    	'slug' => 'chuyen-nghe-nghiep'
		    ],
		    [
		    	'name' => 'Chuyện linh tinh ', 
		    	'slug' => 'chuyen-linh-tinh'
		    ]
		);
        DB::table('categories')->insert($data);
    }
}
