<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->unique()->company;
        if (Company::where('name', $name)->count()) {
            $name .= microtime(true);
        }
        $slug = Str::slug($name);

        return [
            'name' => $name,
            'url' => $slug,
            'description' => $this->faker->text,
            'status' => Company::STATUS_ACTIVE,
        ];
    }
}
