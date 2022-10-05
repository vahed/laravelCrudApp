<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    protected $model = Item::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $start = $this->faker->dateTimeBetween('next Monday', 'next Monday +7 days');
        $end = $this->faker->dateTimeBetween($start, $start->format('Y-m-d H:i:s').' +2 days');

        return [
            'subject' => $this->faker->randomElement($array = array ('product1', 'product2', 'product3', 'product4', 'product5')),
            'description' => $this->faker->text,
            'priority' => $this->faker->randomElement($array = array (1, 2, 3, 4, 5)),
            'start_at' => $start,
            'finish_at' => $end
        ];
    }
}
