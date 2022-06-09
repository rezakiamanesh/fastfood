<?php

namespace App\Http\Controllers\users;

use App\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    protected $user;

    public const countOfRender = 9;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });

    }

    public function index()
    {
        $orders = Order::owner()->with(['orderItem', 'user'])->latest()->paginate(self::countOfRender);
        return view('users.orders', compact('orders'));
    }

    public function delete($id)
    {
        if (is_numeric($id)) {
            $find = Order::owner()->findOrFail($id);
            $deleteData = $find->delete();
            if ($deleteData) {
                alert()->success("سفارش به درستی حذف گردید", 'موفقیت آمیز')->showConfirmButton('بستن');
                return redirect()->back();
            } else {
                alert()->error("مشکلی در حذف سفارش پیش آمد", 'ناموفق')->showConfirmButton('بستن');
                return redirect()->back();
            }
        } else {
            alert()->error("مشکلی در حذف سفارش پیش آمده", 'ناموفق')->showConfirmButton('بستن');
            return redirect()->back();
        }
    }

}
