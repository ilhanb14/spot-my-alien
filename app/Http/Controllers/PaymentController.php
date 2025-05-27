<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;
use Stripe\PaymentIntent;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\PaymentMethod;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function showDonationForm() {
        return view('payment.donate');
    }

    public function process(Request $request) {
        $request->validate([
            'amount' => 'required|numeric|min:1',
            'payment_method' => 'required|string',
        ]);

        Stripe::setApiKey(config('cashier.secret'));

        $amount = $request->input('amount') * 100; // Stripe expects amount in cents

        try {
            // Create PaymentIntent with amount and payment method
            $paymentIntent = PaymentIntent::create([
                'amount' => $amount,
                'currency' => 'eur',
                'payment_method' => 'pm_card_visa',
                'confirm' => true,
                'automatic_payment_methods' => [
                    'enabled' => true,
                    'allow_redirects' => 'never',
                ],
            ]);
            
            if ($paymentIntent->status == 'succeeded') {
                // Donation successful
                $user = Auth::user();

                Donation::create([
                    'amount' => $amount,
                    'user_id' => $user->id
                ]);

                if (!$user->stripe_id) {    // Create a customer and get a stripe id for the current user
                    $stripeCustomer = Customer::create([
                        'email' => $user->email,
                    ]);

                    $user->stripe_id = $stripeCustomer->id;
                    $user->save();
                }

                // Attach this payment method to the user(/customer), this needs to be done so stripe will allow it being reused
                PaymentMethod::retrieve($request->payment_method)->attach([
                    'customer' => $user->stripe_id,
                ]);

                return redirect()->back()->with('success', 'Bedankt voor uw donatie!');
            } else {
                return redirect()->back()->withErrors('Payment failed.');
            }

        } catch (ApiErrorException $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}
