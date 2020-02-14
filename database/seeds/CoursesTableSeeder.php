<?php

use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courses')->insert([
            'provider_id' => 1,
            'title' => 'Asbestos Awareness Training',
            'provider_price' => '1000',
            'retail_price' => '2000',
            'description' => 'Mauris non tempor quam, et lacinia sapien. Mauris accumsan eros eget libero posuere vulputate. Etiam elit elit, elementum sed varius at, adipiscing vitae est. Sed nec felis pellentesque, lacinia dui sed, ',
            'excerpt' => 'Mauris non tempor quam, et lacinia sapien. Mauris accumsan eros eget libero posuere vulputate. Etiam elit elit, elementum sed varius at, adipiscing vitae est.',
            'duration' => '75',
            'main_image' => '/images/course.jpg',
            'provider_reference_id' => 'CRS2553DG',
        ]);
    }
}
