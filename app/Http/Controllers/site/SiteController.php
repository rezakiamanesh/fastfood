<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Repositories\Repository;
use App\Utility\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    public $repository;

    public function __construct(Product $product)
    {
        $this->repository = new Repository($product);
    }

    public function index()
    {
        $products = $this->repository->get([['status', 1]]);
        return view('site.index', compact('products'));
    }

    public function product($slug = null)
    {
        if (!empty($slug)){
            $product = $this->repository->first([['slug',$slug]]);
            return view('site.product',compact('product'));
        }else{
            // todo product list...
        }
    }

    public function commentStore(Request $request,$id)
    {
        $user_id = Auth::user()->id;
        $this->validate($request, [
            'comment' => 'required|min:5',
            'commentable_type' => 'required',
        ]);
        $class = $request->input('commentable_type');

        /* check class */
        if (!class_exists($class)) {
            alert()->error("ارسال پیغام شما با شکست روبرو شد , لطفا دوباره امتحان نمایید.\n با تشکر", "خطا")->showConfirmButton("بستن");
            return back();
        }

        if (is_numeric($id)) {
            $comment = $class::whereId($id)->first();
            if ($comment->count() > 0) {

                $comment->comments()->create([
                    'user_id' => $user_id,
                    'status' => 0,
                    'comment' => $request->input('comment'),
                    'commentable_id' => $comment->id,
                    'commentable_type ' => get_class($comment)
                ]);

                alert()->success("دیدگاه شما ثبت شد\n با تشکر", "موفقیت آمیز")->showConfirmButton("بستن");
                return redirect()->back();

            } else {
                alert()->error("لطفا اطلاعات مناسب را وارد نمایید\n با تشکر", "خطا")->showConfirmButton("بستن");
                return redirect()->back();
            }
        } else {
            return redirect()->back()->with(['error' => Message::illegalError]);
        }
    }
}
