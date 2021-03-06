<?php

namespace App\Http\Livewire;
use App\Models\Country;
use App\Models\Player;
use Livewire\Component;
class Assignment extends Component
{
    public $selectedCountry = null;
    public $players = null;


    // public $selectedPlayer= null;



    public function render()
    {
        return view('livewire.assignment',[
            'countrys' => Country::all()
        ]);
    }

    public function updatedSelectedCountry($country_id)
    {
        $this->players = Player::where('country_id',$country_id)->get();
    }
}
