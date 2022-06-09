<?php

namespace App\Http\Controllers\users;

use App\Models\Address;
use App\Models\City;
use App\Models\Province;
use App\Services\ImageServices\ImageServices;
use App\Utility\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use SEO;

class UserProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('users.profile', compact('user'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:180',
            'family' => 'required|max:180',
            'tell' => 'required|max:20'
        ]);

        $image = $request->input('filepath');
        $name = $request->input('name');
        $family = $request->input('family');
        $tell = $request->input('tell');
        $email = $request->input('email');

        $find = Auth::user();
        if ($image && !empty($image)) {
            $updateImage = ImageServices::update_images($find, $request, auth()->user()->id);
            if ($updateImage <= 0) {
                ImageServices::create_images($find, $request, auth()->user()->id);
            }
        } else {
            ImageServices::delete_images($find);
        }
        $saveData = [
            'name' => $name,
            'family' => $family,
            'tell' => $tell,
            'email' => $email,
        ];
        if (Auth::user()->update($saveData)) {
            alert()->success("موفقیت آمیز", "پروفایل شما بروز شد")->showConfirmButton('بستن');
            return redirect()->back();
        } else {
            alert()->error(Message::errorMessageEdit, 'متاسفیم')->showConfirmButton('بستن');
            return redirect()->back();
        }
    }

    public function ChangePwFrom()
    {
        SEO::setTitle('ناحیه کاربری | تغییر گذرواژه');
        return view('users.change-pw');
    }

    public function ChangePw(Request $request)
    {
        $this->validate($request, [
            'current-password' => ['required', 'min:6', new MatchOldPassword],
            'new-password' => ['required', 'string', 'min:6', 'max:100'],
            'new-password-confirmation' => ['required', 'string', 'min:6', 'max:100', 'same:new-password'],
        ]);


        if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
            alert()->error('گذرواژه جدید نمی تواند مشابه رمز عبور فعلی شما باشد. لطفاً یک رمز عبور دیگر انتخاب کنید', 'متاسفیم');
            return redirect()->back();
        }

        Auth::user()->update(['password' => Hash::make($request->input('new-password'))]);

        alert()->success('موفقیت آمیز','رمز عبور با موفقیت تغییر کرد')->showConfirmButton('بستن');
        return redirect()->back();
    }

    public function addressUser()
    {
        $user = Auth::user();
        $address = $user->address()->get();
        $provinces = Province::all();
        return view('users.address',compact('address','user','provinces'));
    }

    public function StoreAddress(Request $request)
    {
        $this->validate($request, [
            'province_id' => 'required|numeric',
            'city_id' => 'required|numeric',
            'full_address' => 'required',
            'name' => ['required', 'string', 'max:190'],
            'tell' => ['required', 'string', 'max:190'],
            'mobile' => ['required', 'numeric', 'regex:/0{1}9{1}[0-9]{9}/'],
            'postal_code' => ['required', 'string', 'max:10']
        ]);

        auth()->user()->address()->create([
            'city_id' => $request->input('city_id'),
            'province_id' => $request->input('province_id'),
            'name' => $request->input('name'),
            'full_address' => $request->input('full_address'),
            'mobile' => $request->input('mobile'),
            'tell' => $request->input('tell'),
            'postal_code' => $request->input('postal_code'),
        ]);
        alert()->success("موفقیت آمیز","آدرس جدید با موفقیت اضافه شد")->showConfirmButton('بستن');
        return redirect()->route('users.panel.address');
    }

    public function DeleteAddress($id)
    {
        $address = Address::query()->owner()->where('id', $id)->delete();
        if ($address) {
            alert()->success("موفقیت آمیز","آدرس مورد نظر حذف گردید")->showConfirmButton('بستن');
            return redirect()->back();
        } else {
            alert()->error("آدرس به درستی حذف نگردید لطفا به پشتیبانی اطلاع دهید", 'خطا')->showConfirmButton('بستن');
            return redirect()->route('site.contactUs');
        }

    }

    public function getCityList(Request $request)
    {
        $city = City::where('province_id',$request->input('province_id'))->get();
        return response()->json($city);
    }

    public function ajaxCity(Request $request)
    {
        $province = $request->input('isRequestID');
        $provinceChange = $request->input('isRequestIDChange');
        if ($province) {
            $city = City::where('province_id', $province)->get();
            $user_city = User::where('id', auth()->user()->id)->select('city_id')->first();
            $view = view('users.layouts.partials.ajax.city', compact('city', 'user_city'))->render();
            return response()->json(['html' => $view]);
        }

        if ($provinceChange) {
            $city = City::where('province_id', $provinceChange)->get();
            $view = view('users.layouts.partials.ajax.city', compact('city'))->render();
            return response()->json(['html' => $view]);
        }
    }
}
