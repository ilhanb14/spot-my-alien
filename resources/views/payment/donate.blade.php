@extends('partials.header')
@section('title', "Doneer")

@section('content')
<div class="max-w-4xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
<div class="space-y-8">
    <div class="bg-gray-800 p-6 rounded-lg">
        <h1 class="text-4xl font-bold mb-8 text-center">Doneer!</h1>
        <form id="donation-form" method="POST" action="{{ url('/doneer') }}" class="space-y-4 max-w-md mx-auto">
            @csrf

            <div class="flex flex-col">
                <label for="amount" class="mb-1 font-medium">Hoeveelheid (€):</label>
                <input type="number" name="amount" min="1" required 
                    class="border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="flex flex-col">
                <label class="mb-1 font-medium">Kaartgegevens:</label>
                <!-- Stripe Elements will insert card info here -->
                <div id="card-element" class="border border-gray-300 rounded px-3 py-2 bg-white text-black"></div>
            </div>

            <div>
                <button type="submit" 
                        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded w-full mb-4">
                    Doneer
                </button>
            </div>
        </form>
        @if(session('success'))
            <div class='font-bold text-green-600'>
                {{ session('success') }}
            </div>
        @endif
    </div>
</div>
</div>

<script src="https://js.stripe.com/v3/"></script>
<script>
    const stripe = Stripe('{{ config('cashier.key') }}');
    const elements = stripe.elements();
    const cardElement = elements.create('card');
    cardElement.mount('#card-element');

    const form = document.getElementById('donation-form');
    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        const { paymentMethod, error } = await stripe.createPaymentMethod('card', cardElement);

        if (error) {
            alert(error.message);
            return;
        }

        // Append paymentMethod.id to the form and submit it
        const hiddenInput = document.createElement('input');
        hiddenInput.type = 'hidden';
        hiddenInput.name = 'payment_method';
        hiddenInput.value = paymentMethod.id;
        form.appendChild(hiddenInput);

        form.submit();
    });
</script>

@endsection