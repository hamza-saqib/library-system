<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Book;
use App\Models\Rack;

class BookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Book::class;
    
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'publish_year' => $this->faker->numberBetween($min = 1700, $max = 2500),
            'author' => $this->faker->name(),

            'rack_id' => Rack::pluck('id')->random()
        ];
    }
}
