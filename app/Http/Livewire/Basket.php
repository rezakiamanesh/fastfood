<?php

namespace App\Http\Livewire;

use App\Http\Controllers\site\BasketController;
use Livewire\Component;

class Basket extends Component
{
    public $basket = [];

    public function mount($basket)
    {
//        $this->basket = $basket;
    }

    public function removeCart($id)
    {
        if ($id) {
            $cart = session()->get('cart');
            if (isset($cart[$id])) {
                unset($cart[$id]);
                $cart['totalPrice'] = BasketController::updateCartTotalPrice($cart);
                session()->put('cart', $cart);
                if (count($cart) == 1){
                    session()->forget('cart');
                }
            }
            $this->basket = $cart;
        }
    }

    public function render()
    {
        return view('livewire.basket');
    }
}
