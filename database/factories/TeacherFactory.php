<?php

namespace Database\Factories;

use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{

    protected static array $major = ['فارسی','ریاضی','علوم','اجتماعی','عربی','انگلیسی',
    'جغرافیا','تاریخ','زیست','شیمی','نصب و راه اندازی سیستم','تولید محتوا'];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'licence' => fake()->numberBetween(12345678,99999999),
            'major'=>fake()->randomElement(static::$major),
            'phone' => fake()->phoneNumber(),
            'email' => fake()->unique()->safeEmail(),
            'address' => fake()->address(),
            'avatar' => '14.png',
            'isActive' => 1
        ];
    }
}
                                                                                      