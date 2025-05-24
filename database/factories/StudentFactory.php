<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    protected $model = \App\Models\Student::class;

    public function definition()
    {
        return [
            'name'         => $this->faker->name,
            'code'         => $this->faker->unique()->numerify('##########'),
            'phone'        => $this->faker->unique()->regexify('09[0-9]{9}'),
            'email'        => $this->faker->unique()->safeEmail,
            'nameFather'   => $this->faker->name('male'),
            'codeFather'   => $this->faker->unique()->numerify('##########'),
            'phoneFather'  => $this->faker->regexify('09[0-9]{9}'),
            'nameMother'   => $this->faker->name('female'),
            'codeMother'   => $this->faker->unique()->numerify('##########'),
            'phoneMother'  => $this->faker->regexify('09[0-9]{9}'),
            'avatar'       => '50.png',
            'address' => substr(\Faker\Factory::create('en_US')->address, 0, 60),
            'isActive'     => $this->faker->boolean(90),
        ];
    }
}
