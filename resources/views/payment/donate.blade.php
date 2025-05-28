@include('partials.header')
@section('title', "Doneer")

<form id="donation-form" method="POST" action="{{ url('/doneer') }}">
    @csrf
    <label>Hoeveelheid (€):</label>
    <input type="number" name="amount" min="1" required>

    <!-- Stripe Elements will insert card info here -->
    <div id="card-element"></div>

    <button type="submit">Doneer</button>
</form>
@if(session('success'))
    <div>
        {{ session('success') }}
    </div>
@endif

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

@include('partials.footer')