<?php

namespace Database\Factories;

use App\Models\Lesson;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lesson>
 */
class LessonFactory extends Factory
{
    protected static array $types = ['تخصصی', 'عمومی'];
    
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titleFa' => $this->faker->randomElement(['ریاضی', 'علوم', 'ادبیات', 'دینی' , 'عربی' , 'انگلیسی' , 'فارسی' , 'کسب و کار']),
            'titleEn' => $this->faker->word,
            'producer' => $this->faker->numberBetween(1, 8),
            'type' => $this->faker->randomElement(static::$types),
            'code' => $this->faker->numerify('##########'),
            'isActive' => $this->faker->boolean,
        ];
    }
}

