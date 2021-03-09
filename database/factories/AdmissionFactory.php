<?php

namespace Database\Factories;

use App\Models\Admission;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdmissionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Admission::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'roll_no' => $this->faker->word,
        'first_name' => $this->faker->word,
        'last_name' => $this->faker->word,
        'father_name' => $this->faker->word,
        'father_phone' => $this->faker->word,
        'mother_name' => $this->faker->word,
        'mother_phone' => $this->faker->word,
        'gender' => $this->faker->word,
        'email' => $this->faker->word,
        'dob' => $this->faker->word,
        'phone' => $this->faker->word,
        'address' => $this->faker->text,
        'current_address' => $this->faker->text,
        'nationality' => $this->faker->word,
        'passport' => $this->faker->word,
        'status' => $this->faker->word,
        'registered_date' => $this->faker->word,
        'user_id' => $this->faker->randomDigitNotNull,
        'class_id' => $this->faker->randomDigitNotNull,
        'image' => $this->faker->word,
        'deleted_at' => $this->faker->date('Y-m-d H:i:s'),
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
