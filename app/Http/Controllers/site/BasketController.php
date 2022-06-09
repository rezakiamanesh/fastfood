<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Repositories\Repository;
use App\Utility\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BasketController extends Controller
{
    public $repository;
    public $basket;
    public $user;

    public function __construct(Product $product)
    {
        $this->middleware(function ($request, $next) {
            $this->basket = \session()->get('cart');
            return $next($request);
        });
        parent::__construct();
        $this->repository = new Repository($product);
        $this->user = auth()->user();
    }

    public function addToCart($id)
    {
        $product = $this->repository->show($id);
        $cart = session()->get('cart', []);
        $checkedStock = self::checkInventory($cart,$id,$product);
        if ($checkedStock == true){
            if (isset($cart[$id])) {
                $cart[$id]['quantity']++;
            } else {
                $cart[$id] = [
                    "name" => $product->title,
                    "quantity" => 1,
                    "price" => $product->price,
                    "image" => $product->image[0]->url
                ];
            }
            $cart['totalPrice'] = self::updateCartTotalPrice($cart);
            session()->put('cart', $cart);
            return redirect()->back()->with('موفق', 'با موفقیت اضافه شد');
        }else{
            return redirect()->back()->with('ناموفق', 'موجودی به اتمام رسیده');
        }
    }


    public function basket()
    {
        $title = "سبد خرید";
        $basket = $this->basket;
        if (!empty($basket)) {
            return view('site.checkout.index', compact('title', 'basket'));
        }
        return redirect()->route('site.index');
    }

    public function address()
    {
        $title = "سبد خرید";
        $basket = $this->basket;
        return view('site.checkout.address', compact('title', 'basket'));

    }

    public function checkout()
    {
        $title = "سبد خرید";
        $basket = $this->basket;
        if (!empty($basket)) {
            return view('site.checkout.review', compact('title', 'basket'));
        }
        return redirect()->route('site.index');
    }

    public function basketStore(Request $request)
    {
        $cart = $this->basket;
        DB::beginTransaction();
        $order = $this->user->orders()->create([
            'user_info' => serialize($this->user),
            'total_amount' => $cart['totalPrice'],
            'tracking_code' => time(),
            'status' => Status::PAID,
        ]);
        if ($order instanceof Order) {
            DB::commit();
            foreach ($cart as $productId => $item) {
                if (is_array($item)) {
                    $orderItem = OrderItem::query()->create([
                        'order_id' => $order->id,
                        'product_id' => $productId,
                        'amount' => $item['price'],
                        'details' => serialize($item),
                        'itemCount' => $item['quantity'],
                    ]);
                    $orderItem->product->decrement('stock', $orderItem->itemCount);
                }
            }
        } else {
            DB::rollBack();
            // todo error...
        }
        Session::forget('cart');
        return redirect()->route('users.panel.order.index');
    }

    public static function updateCartTotalPrice($cart)
    {
        $amount = 0;
        foreach ($cart as $item) {
            if (is_array($item)) {
                $amount += $item['quantity'] * $item['price'];
            }
        }
        return $amount;
    }

    public static function checkInventory($cart,$id,$product)
    {
        if (isset($cart[$id]) && $cart[$id]['quantity'] >= $product->stock) {
            return false;
        }
        return true;
    }
}
