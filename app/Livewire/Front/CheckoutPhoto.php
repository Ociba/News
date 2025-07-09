<?php

namespace App\Livewire\Front;

use App\Models\PhotosOnSell;
use App\Models\PhotoPurchase;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;

class CheckoutPhoto extends Component
{
    public $photoId;
    public $photo;
    public $paymentMethod = 'mobile_money';

    // Conditional input fields
    public $phone_number;
    public $bank_name;
    public $account_number;
    public $card_number;
    public $card_expiry;
    public $card_cvc;

    public function mount($photoId)
    {
        $this->photo = PhotosOnSell::findOrFail($photoId);
    }

    public function checkout()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Validate based on payment method
        $rules = [];

        if ($this->paymentMethod === 'mobile_money') {
            $rules['phone_number'] = 'required|regex:/^07\d{8}$/';
        } elseif ($this->paymentMethod === 'bank') {
            $rules['bank_name'] = 'required|string';
            $rules['account_number'] = 'required|string';
        } elseif ($this->paymentMethod === 'card') {
            $rules['card_number'] = 'required|digits:16';
            $rules['card_expiry'] = 'required|date_format:m/y';
            $rules['card_cvc'] = 'required|digits:3';
        }

        $this->validate($rules);

        // Simulate payment success
        PhotoPurchase::create([
            'photo_id' => $this->photo->id,
            'buyer_id' => Auth::id(),
            'amount' => $this->photo->price,
            'transaction_id' => Str::uuid(),
            'payment_method' => $this->paymentMethod,
            'status' => 'completed',
            'download_expires_at' => now()->addDays(7),
        ]);

        session()->flash('success', 'Payment successful! You can now download your photo.');

        return redirect()->away(
            URL::signedRoute('photo.details', ['photo' => $this->photo->id])
        );
    }
    public function updatedPaymentMethod($value)
    {
        // You can add any logic here if needed.
        // For example, reset other fields when switching
        if ($value === 'mobile_money') {
            $this->reset(['bank_name', 'account_number', 'card_number', 'card_expiry', 'card_cvc']);
        } elseif ($value === 'bank') {
            $this->reset(['phone_number', 'card_number', 'card_expiry', 'card_cvc']);
        } elseif ($value === 'card') {
            $this->reset(['phone_number', 'bank_name', 'account_number']);
        }
        logger('Payment method changed to: ' . $value);
    }
    

    public function render()
    {
        return view('livewire.front.checkout-photo');
    }
}
