<?php
/**
 * Description of CitiesForm.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Egor Gerasimchuk <egor@mister.am>
 */

namespace App\Http\Livewire\Cms\Cities;


use App\Models\City;
use Livewire\Component;

class CitiesCreateForm extends Component
{
    public $name;
    public $slug;

    protected $rules = [
        'name' => 'required|min:3',
        'slug' => 'required|min:3',
    ];

    public function submit()
    {
        $this->validate();

        City::create([
            'name' => $this->name,
            'slug' => $this->slug,
            'status' => City::STATUS_INACTIVE,
        ]);
    }

    public function render()
    {
        return view('livewire.cms.cities.form.create');
    }
}
