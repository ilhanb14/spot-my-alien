<div class="w-120 mx-auto p-6">
    <form wire:submit.prevent="saveSighting">

        <div class="border bg-indigo-100 text-xl font-bold p-2 text-gray-900 mb-4 rounded-md" x-show="$wire.message != ''">{{ $message }}</div>

        <div>
            <h2>Wat heb je gezien?</h2>
            <div class="flex justify-between items-center bg-gray-900 p-4">
                @foreach ($sightingTypes as $sightingType)
                    <div>                        
                        <label class="flex flex-col items-center">
                            <input
                                type="radio"
                                name="type"
                                value="{{ $sightingType->id }}"
                                wire:model.live="type"
                            >
                            {{ $sightingType->name }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>
        @if (!is_null($type))
            <div class="bg-gray-900 space-y-2">
                <h2 class="font-bold text-2xl">{{ strtoupper($sightingTypes->find($type)->name) }}</h2>

                <div class="form-input">
                    <label for="datetime">Datum + uur van de waarneming</label>
                    <input type="datetime-local" id="datetime" wire:model="date_time">
                    @error('date_time')
                        <div class="validationError">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-input">
                    <label>Locatie:</label>
                    <input type="text" wire:model="location">
                    @error('location')
                        <div class="validationError">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-input">
                    <label for="description">Beschrijving:</label>
                    <textarea wire:model="description"></textarea>
                    @error('description')
                        <div class="validationError">{{ $message }}</div>
                    @enderror
                    <p class="text-sm">Beschrijf uw waarneming zo gedetailleerd mogelijk.</p>
                </div>
                <div class="form-input">
                    <label for="description">Foto(s):</label>
                    <input type="file" wire:model="photo" multiple>
                    @error('photo.*')
                        <div class="validationError">{{ $message }}</div>
                    @enderror
                    @if ($photo)
                        @foreach ($photo as $item)
                            <img class="w-full" src="{{ $item->temporaryUrl() }}">
                        @endforeach
                    @endif
                </div>

                @switch ($sightingTypes->find($type)->name)
                    @case ('ufo')
                        <div class="flex justify-between items-center">
                            @foreach ($shapes as $shape)
                                <div class="form-input">
                                    <label class="text-center">
                                        <input
                                            type="radio"
                                            name="ufo_shape"
                                            value="{{ $shape->id }}"
                                            wire:model="ufo_shape_id"
                                            class="mr-2"
                                        >
                                        {{ $shape->name }}
                                        {{-- <img src="{{ $shape->image_path }}" class="w-12"> --}}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        @error('ufo_shape_id')
                            <div class="validationError">{{ $message }}</div>
                        @enderror
                        <div class="form-input">
                            <label>Snelheid: {{ $ufo_speed }}</label>
                            <input type="range" wire:model.live.debounce="ufo_speed" min="0" max="10" step="1" class="w-full bg-indigo-800">
                        </div>
                        <div class="form-input">
                            <label>Kleur:</label>
                            <input type="color" wire:model.fill="ufo_color" value="#FFFFFF" />
                        </div>
                        @break
                    @case ('alien')
                        <div class="form-input">
                            <label for="intention">Bedoeling {{ $alien_intention }}</label>
                            <select id="intention" wire:model="alien_intention">
                                <option value="">Geen idee</option>
                                @foreach ($intentions as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-input">
                            <label>Agressie niveau: {{ $alien_aggression_level }}</label>
                            <input type="range" wire:model.live.debounce="alien_aggression_level" min="0" max="10" step="1" class="w-full bg-indigo-800">
                        </div>
                        <div class="form-input">
                            <label>Intelligentie: {{ $alien_intelligence_level }}</label>
                            <input type="range" wire:model.live.debounce="alien_intelligence_level" min="0" max="10" step="1" class="w-full bg-indigo-800">
                        </div>
                        <div class="form-input">
                            <label>Snelheid: {{ $alien_speed }}</label>
                            <input type="range" wire:model.live.debounce="alien_speed" min="0" max="10" step="1" class="w-full bg-indigo-800">
                        </div>
                        <div class="form-input">
                            <label>Gesproken taal:</label>
                            <input type="text" wire:model="alien_spoken_language">
                        </div>
                        <div class="form-input">
                            <label>Voedsel:</label>
                            <input type="text" wire:model="alien_food_source">
                        </div>
                        <div class="flex justify-between items-center">
                            @foreach ($shapes as $shape)
                                <div>
                                    <label class="flex flex-col justify-center items-center">
                                        <input
                                            id="shape_{{ $shape->id }}"
                                            type="radio"
                                            name="alien_shape"
                                            value="{{ $shape->id }}"
                                            wire:model="alien_shape_id"
                                            class="mr-2"
                                        >
                                        <span>{{ $shape->name }}</span>
                                        <img src="/storage/{{ $shape->image_path }}" class="w-12">
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        @break
                    @case ('ontvoering')
                        <div class="form-input">
                            <label>Wie/wat werd er ontvoerd?</label>
                            <input type="text" wire:model="abduction_subject">
                            @error('abduction_subject')
                                <div class="validationError">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-input">
                            <label>
                                Ontvoerde is/was een levend wezen
                                <input type="checkbox" wire:model="abduction_live_subject" value="1">
                            </label>
                        </div>
                        <div class="form-input">
                            <label>
                                Ontvoerde werd teruggebracht
                                <input type="checkbox" wire:model="abduction_returned" value="1">
                            </label>
                            
                        </div>
                        <div x-show="$wire.abduction_returned">
                            <div class="form-input">
                                <label>Lengte van ontvoering:</label>
                                <input type="text" wire:model="abduction_duration">
                                @error('abduction_duration')
                                    <div class="validationError">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-input">
                                <label for="abductionState">Hoe werd het onderwerp teruggebracht?</label>
                                <select id="abductionState" wire:model="abduction_state_id">
                                    <option value="">Kies een status</option>
                                    @foreach ($abductionStates as $abductionState)
                                        <option value="{{ $abductionState->id }}">{{ $abductionState->name }}</option>
                                    @endforeach
                                </select>
                                @error('abduction_state_id')
                                    <div class="validationError">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-input">
                                <label>Werd er een onderzoek uitgevoerd?</label>
                                <input type="text" wire:model="abduction_examination">
                            </div>
                        </div>
                        @break
                @endswitch
            </div>
            <div class="flex justify-center p-4">
                <button
                    type="submit"
                    class="text-white font-medium rounded-md px-4 py-2 bg-blue-600"   
                >Waarneming melden</button>
            </div>
        @endif
    </form>
</div>
