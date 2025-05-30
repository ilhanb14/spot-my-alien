<?php

namespace App\Livewire;

use App\Models\AbductionSighting;
use App\Models\AbductionState;
use App\Models\AlienShape;
use App\Models\AlienSighting;
use App\Models\Image;
use App\Models\Intention;
use App\Models\Sighting;
use App\Models\Type;
use App\Models\UfoShape;
use App\Models\UfoSighting;
use App\Models\User;
use App\Mail\SightingMail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\Reactive;
use Livewire\Component;
use Livewire\WithFileUploads;

class SightingRegistration extends Component
{

    use WithFileUploads;

    public $sightingTypes = [];
    public $shapes = [];
    public $intentions = [];
    public $abductionStates = [];

    public $message = '';

    public $type;
    public $date_time = '';
    public $description = '';
    public $location = '';

    public $photo_path = '';
    public $photo = [];

    // UFO
    public $ufo_speed = 0;
    public $ufo_shape_id;
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
    public $abduction_subject;
    public $abduction_duration;
    public $abduction_examination;
    public $abduction_returned = 0;
    public $abduction_live_subject = 0;
    public $abduction_state_id;

    public function mount()
    {
        $this->sightingTypes = Type::all();
    }

    // Method is called when type is changed
    function updatedType($value)
    {
        $this->reset('message');
        $this->resetErrorBag();

        switch (Type::find($value)->name) {
            case "ufo":
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

    public function saveSighting()
    {

        $this->validate();
        $user = Auth::user();

        // First store the generic sighting
        $sighting = Sighting::create([
            'type_id' => $this->type,
            'date_time' => Carbon::createFromFormat('Y-m-d\TH:i', $this->date_time),
            'description' => $this->description,
            'user_id' => $user->id ?? Auth::id(),
            'location' => $this->location,
            'status_id' => 1,
        ]);

        // Then store the photo(s), if any
        if ($this->photo) {
            foreach ($this->photo as $photo) {
                Image::create([
                    'sighting_id' => $sighting->id,
                    'path' => $photo->storePublicly('sighting_photos', ['disk' => 'public']),
                ]);
            }
        }

        // Then store the type specific sighting details
        $type = Type::find($this->type);
        if (!$type) return;

        switch ($type->name) {
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
                    'abductionstate_id' => $this->abduction_state_id
                ]);
            break;
        }

        // Send mail to the user
        Mail::to($user->email)->send(new SightingMail($user, $sighting));

        // Send notification email to all admins with plain text
        $subject = 'Nieuwe waarneming ingegeven';
        $message = "Een waarneming werd ingegeven op {$sighting->created_at}:\n\n
                    Gebruikersnaam: {$user->name}\n
                    Email: {$user->email}\n
                    Id van gebruiker: {$user->id}\n
                    Id van de waarneming: {$sighting->id}";
        foreach(User::where('is_admin', true)->get() as $admin) {
            Mail::raw($message, function ($mail) use ($admin, $subject) {
                $mail->to($admin->email)
                    ->subject($subject);
            });
        }

        // $this->reset();
        // $this->mount();
        $this->resetExcept(['sightingTypes']);

        $this->message = 'Uw melding werd geregistreerd';

        // return $this->redirect(route('sightings'), navigate: true);
    }

    // Form validation (based on selected sighting type)
    public function rules()
    {
        // Validation for the generic form fields
        $genericFields = [
            'date_time' => 'required',
            'location' => 'required|min:2',
            'description' => 'required|min:10',
            'photo.*' => 'image|mimes:jpg,jpeg,png,gif|max:1024'
        ];

        $type = Type::find($this->type);
        if (!$type) return;

        // Add validation for the type specific form fields
        switch ($type->name) {
            case "ufo":
                return array_merge($genericFields, [
                    'ufo_shape_id' => 'required'
                ]);
            break;
            case "alien":
                return array_merge($genericFields, [
                    'alien_shape_id' => 'required'
                ]);
            break;
            case "ontvoering":
                return array_merge($genericFields, [
                    'abduction_subject' => 'required|min:2',
                    'abduction_state_id' => $this->abduction_returned ? 'required' : '',
                    'abduction_duration' => $this->abduction_returned ? 'required' : '',
                ]);
            break;
        }

        return $genericFields;
    }

    // Custom (translated) error messages
    public function messages()
    {
        return [
            'date_time.required' => 'De datum + tijd is verplicht.',
            'location.required' => 'Geef de locatie van de waarneming in.',
            'location.min' => 'De locatie moet minstens 2 karakters lang zijn.',
            'description.required' => 'Geef de beschrijving in.',
            'description.min' => 'De beschrijving moet minstens 10 karakters zijn.',
            'ufo_shape_id.required' => 'Kies de vorm van de UFO.',
            'alien_shape_id.required' => 'Kies de vorm van de Alien.',
            'abduction_subject.required' => 'Geef het onderwerp van de ontvoering in.',
            'abduction_subject.min' => 'Het onderwerp van de ontvoering moet minstens 2 karakters zijn.',
            'abduction_state_id.required' => 'Kies de status van het teruggebrachte onderwerp.',
            'abduction_duration.required' => 'Geef in hoe lang de ontvoering duurde.',
            'photo.*.max' => 'De foto mag niet groter zijn dan 1MB'
        ];
    }

    public function render()
    {
        return view('livewire.sighting-registration');
    }
}
