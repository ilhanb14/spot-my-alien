<?php

namespace App\Livewire;

use App\Models\AbductionSighting;
use App\Models\AbductionState;
use App\Models\AlienShape;
use App\Models\AlienSighting;
use App\Models\Intention;
use App\Models\Sighting;
use App\Models\Type;
use App\Models\UfoShape;
use App\Models\UfoSighting;
use Livewire\Attributes\Reactive;
use Livewire\Component;

class SightingRegistration extends Component
{
    public $sightingTypes = [];
    public $shapes = [];
    public $intentions = [];
    public $abductionStates = [];

    public $message = '';

    public $type;
    public $date_time = '';
    public $description = '';
    public $user_id = '';
    public $location = '';

    // UFO
    public $ufo_speed = 0;
    public $ufo_shape_id = 0;
    public $ufo_color = '';

    // ALIEN
    public $alien_intention;
    public $alien_speed = 0;
    public $alien_shape_id = 0;
    public $alien_intelligence_level = 0;
    public $alien_aggression_level = 0;
    public $alien_spoken_language = '';
    public $alien_food_source = '';

    // ONTVOERING
    public $abduction_subject = '';
    public $abduction_duration = 0;
    public $abduction_examination = '';
    public $abduction_returned;
    public $abduction_live_subject;
    public $abduction_state_id;

    public $specificFormData = [];

    public function mount()
    {
        $this->sightingTypes = Type::all();
    }

    // Method is called when type is changed
    function updatedType($value)
    {
        $this->reset('message');

        switch (Type::find($value)->name) {
            case "ufo":
                // $specificFormData = [
                //     'speed' => 0,
                //     'shape_id' => '',
                //     'color' => ''
                // ];

                $this->shapes = UfoShape::all();
            break;
            case "alien":
                $this->intentions = Intention::all();
                $this->shapes = AlienShape::all();
            break;
            case "ontvoering":
                $this->abductionStates = AbductionState::all();
            break;
        }
    }

    // Method is called when "abduction_returned" is changed
    function updatedAbductionReturned($value)
    {
        $this->abduction_returned = $value ? 1 : 0;
    }

    // Method is called when "abduction_live_subject" is changed
    function updatedAbductionLiveSubject($value)
    {
        $this->abduction_live_subject = $value ? 1 : 0;
    }

    public function saveSighthing()
    {
        $sighting = Sighting::create([
            'type_id' => $this->type,
            'date_time' => $this->date_time,
            'description' => $this->description,
            'user_id' => 0,
            'location' => $this->location
        ]);

        switch (Type::find($this->type)->name) {
            case "ufo":
                $ufoSighting = UfoSighting::create([
                    'sighting_id' => $sighting->id,
                    'speed' => $this->ufo_speed,
                    'shape_id' => $this->ufo_shape_id,
                    'color' => $this->ufo_color
                ]);
            break;
            case "alien":
                $alienSighting = AlienSighting::create([
                    'sighting_id' => $sighting->id,
                    'aggression_level' => $this->alien_aggression_level,
                    'intelligence_level' => $this->alien_intelligence_level,
                    'spoken_language' => $this->alien_spoken_language,
                    'food_source' => $this->alien_food_source,
                    'intention_id' => $this->alien_intention,
                    'speed' => $this->alien_speed,
                    'shape_id' => $this->alien_shape_id
                ]);
            break;
            case "ontvoering":
                $abductionSighting = AbductionSighting::create([
                    'sighting_id' => $sighting->id,
                    'subject' => $this->abduction_subject,
                    'duration' => $this->abduction_duration,
                    'examination' => $this->abduction_examination,
                    'returned' => $this->abduction_returned,
                    'live_subject' => $this->abduction_live_subject,
                    'state_id' => $this->abduction_state_id
                ]);
            break;
        }

        $this->message = 'Uw melding werd geregistreerd';
    }

    public function rules()
    {

    }

    public function render()
    {
        return view('livewire.sighting-registration');
    }
}
