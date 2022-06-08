<?php

namespace App\Http\Controllers\admin;


use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Repositories\Repository;
use App\Models\Product;

use App\Services\ImageServices\ImageServices;
use App\Utility\Message;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Lang;
use SEO;

class ProductController extends Controller
{
    protected $user;
    public const countOfRender = 9;
    protected $allCategoryProducts;
    protected $allProduct;
    public $repository;


    /*protected $allGuaranty;*/

    public function __construct(Product $product)
    {
        parent::__construct();
        $this->middleware(function ($productRequest, $next) {
            $this->user = Auth::user();
            return $next($productRequest);
        });
        $this->allCategoryProducts = Category::query()->whereStatus(1)->get();
        $this->allProduct = Product::whereStatus(1)->get();
        $this->repository = new Repository($product);

    }

    public function index()
    {
        $products = $this->repository->paginate(self::countOfRender);
        return view('panel.product.index', compact('products'));
    }

    public function create()
    {
        $allProduct = $this->allProduct;
        $allCategoryProducts = $this->allCategoryProducts;
        return view('panel.product.create', compact('allCategoryProducts', 'allProduct'));
    }

    public function store(ProductRequest $productRequest)
    {
        $category_id = $productRequest->input('category_id');
        $images = $productRequest->input('filepath');
        $productRequestData = [
            'title' => $productRequest->input('title'),
            'user_id' => $this->user->id,
            'description' => $productRequest->input('description'),
            'status' => $productRequest->input('status'),
            'price' => $productRequest->input('price'),
            'stock' => $productRequest->input('stock'),
            'time_to_prepare' => $productRequest->input('time_to_prepare'),
        ];
        $saveData = $this->repository->create($productRequestData);
        if ($saveData instanceof Product) {
            $this->repository->sync($saveData, 'categories', [$category_id]);
            if ($images && !empty($images) && count($images) > 0) {
                /* first all delete image */
                ImageServices::delete_images($saveData);

                foreach ($images as $item) {
                    if ($item != null) {
                        ImageServices::arrayCreate_images($saveData, $item, $this->user->id);
                    }
                }
            } else {
                ImageServices::delete_images($saveData);
            }
            toast()->success(Message::successMessageCreate, 'موفق');
            return redirect()->route('panel.product.index');
        } else {
            toast()->error(Message::errorMessageCreate, 'خطا');
            return back();
        }

    }

    public function edit($id)
    {
        $findIdProducts = $this->repository->show($id);
        $allCategoryProducts = $this->allCategoryProducts;
        return view('panel.product.create', compact('findIdProducts', 'allCategoryProducts'));

    }

    public function update(ProductRequest $productRequest, $id)
    {
        $findId = $this->repository->show($id);
        $category_id = $productRequest->input('category_id');
        $images = $productRequest->input('filepath');
        $productRequestData = [
            'title' => $productRequest->input('title'),
            'user_id' => $this->user->id,
            'description' => $productRequest->input('description'),
            'status' => $productRequest->input('status'),
            'price' => $productRequest->input('price'),
            'stock' => $productRequest->input('stock'),
            'time_to_prepare' => $productRequest->input('time_to_prepare'),
        ];
        $updateData = $this->repository->update($productRequestData,$findId);
        if ($updateData) {
            $this->repository->sync($findId, 'categories', [$category_id]);
            if ($images && !empty($images) && count($images) > 0) {
                ImageServices::delete_images($findId);
                foreach ($images as $item) {
                    if ($item != null) {
//                            if ($this->is_formatValid($item, config('whiteList.validImage'))) {
//                                if ($item != null) {
                        ImageServices::arrayCreate_images($findId, $item, $this->user->id);
//                                }
//                            } else {
//                                return back()->with(['error' => 'لطفا تصویر مناسب را وارد نمایید']);
//                            }
                    }
                }
            } else {
                ImageServices::delete_images($findId);
            }
            toast()->success(Message::successMessageCreate, 'موفق');
            return redirect()->route('panel.product.index');
        } else {
            toast()->error(Message::errorMessageEdit, 'خطا');
            return back();
        }
    }

    public function delete($id)
    {
        $find = $this->repository->show($id);
        $deleteData = $find->delete();
        if ($deleteData) {
            toast()->success(Message::successMessageDelete, 'موفقیت آمیز!');
            return back();
        } else {
            toast()->error(Message::errorMessageDelete, 'خطا');
            return back();
        }
    }

    public function status($id)
    {
        $find = $this->repository->show($id);
        if ($find->status == 0) {
            $data = [
                'status' => 1
            ];
        } elseif ($find->status == 1) {
            $data = [
                'status' => 0
            ];
        }
        $update = $find->update($data);
        if ($update) {
            toast()->success(Message::successMessageEdit, 'موفقیت آمیز!');
            return back();
        } else {
            toast()->error(Message::errorMessageEdit, 'خطا');
            return back();
        }
    }


}
