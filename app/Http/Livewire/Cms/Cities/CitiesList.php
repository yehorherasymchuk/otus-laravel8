<?php

namespace App\Http\Livewire\Cms\Cities;

use App\Services\Cities\CitiesService;
use Livewire\WithPagination;
use View;
use App\Models\City;
use Livewire\Component;

class CitiesList extends Component
{
    use WithPagination;

    private function getCitiesService(): CitiesService
    {
        return app()->make(CitiesService::class);
    }

    public $search;

    protected $queryString = [
        'search' => ['except' => ''],
        'page' => ['except' => 1],
    ];

    public function mount()
    {
        $this->fill(request()->only('search', 'page'));
    }

    public function render()
    {
        $cities = $this->getAllCities();
        View::share([
            'cities' => $cities,
        ]);
        return view('livewire.cms.cities.list.index');
    }

    private function getAllCities()
    {
        return $this->getCitiesService()->searchByName($this->search ?? '', 10);
    }
}
