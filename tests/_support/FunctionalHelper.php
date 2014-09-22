<?php
namespace Codeception\Module;

use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Collection;
use Section;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

class FunctionalHelper extends \Codeception\Module
{

    public function haveSections($num = 10)
    {
        $faker = Faker::create();

        $sections = new Collection();

        for ($i = 0; $i < $num; $i++)
        {
            $name = $faker->unique()->sentence(2);

            $sections->add(Section::create([
                'name' => $name,
                'slug_url' => \Str::slug($name),
                'type' => $faker->randomElement(['page', 'blog']),
                'menu_order' => rand(1, 10),
                'menu' => rand(1, 0),
                'published' => rand(1, 0)
            ]));
        }

        return $sections;
    }

    public function haveSection()
    {
        return $this->getModule('Laravel4')->haveRecord('sections', [
            'name' => 'Our company',
            'slug_url' => 'our-company',
            'type' => 'page',
            'menu_order' => 2,
            'menu' => 1,
            'published' => 0
        ]);
    }

}