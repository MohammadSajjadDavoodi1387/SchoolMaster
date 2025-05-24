<?php

// database/factories/PatientFactory.php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    protected $model = Student::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'code' => $this->faker->unique()->numerify('##########'),
            'phone' => $this->faker->unique()->regexify('09[0-9]{9}'),
            'address' => substr(\Faker\Factory::create('en_US')->streetAddress, 0, 20),
        ];
    }
}
