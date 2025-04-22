<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Laravel\Facades\Image;

class GeneralSettingController extends Controller {


    public function generalSetting() {
        return view('master.setting.general_setting');
    }

    // main logo Update
    public function mainLogoUpdate(Request $request) {
        $request->validate([
            'manelogo' => 'required',
        ], [
            'manelogo.required' => 'This Mane Logo Field is Requird',
        ]);
        $generalSeting = GeneralSetting::where('id', 1)->first();

        if ($generalSeting) {
            if ($generalSeting->mane_logo == 'logo.png') {
                $manelogo     = $request->file('manelogo');
                $manelogoex   = $manelogo->getClientOriginalExtension();
                $manelogoName = date('Ymdhms.') . $manelogoex;
                Image::make($manelogo)->resize(250, 50)->save(public_path('image/logo/') . $manelogoName);
            } else {
                if (file_exists('image/logo/' . $generalSeting->mane_logo)) {
                    unlink('image/logo/' . $generalSeting->mane_logo);
                }

                $manelogo     = $request->file('manelogo');
                $manelogoex   = $manelogo->getClientOriginalExtension();
                $manelogoName = date('Ymdhms.') . $manelogoex;
                Image::make($manelogo)->resize(250, 50)->save(public_path('image/logo/') . $manelogoName);
            }

            $generalSeting->update([
                'create_by'  => Auth::id(),
                'mane_logo'  => $manelogoName,
                'updated_at' => Carbon::now(),
            ]);

            $notification = [
                'message'    => 'Mane Logo Has Been Successfully Update.',
                'alert-type' => 'success',
            ];
            return redirect()->back()->with($notification);
        } else {
            $notification = [
                'message'    => 'Oop! Something Is Wrong.',
                'alert-type' => 'error',
            ];
            return redirect()->back()->with($notification);
        }

    }

    // fab logo Update
    public function fabLogoUpdate(Request $request) {
        $request->validate([
            'fablogo' => 'required',
        ], [
            'fablogo.required' => 'This Small Logo Field is Requird',
        ]);
        $generalSeting = GeneralSettings::where('id', 1)->first();

        if ($generalSeting) {

            if ($generalSeting->fab_logo == 'fab_logo.png') {
                $fablogo     = $request->file('fablogo');
                $fablogoex   = $fablogo->getClientOriginalExtension();
                $fablogoName = date('Ymdhms.') . $fablogoex;
                Image::make($fablogo)->resize(50, 50)->save(public_path('image/logo/') . $fablogoName);
            } else {
                if (file_exists('image/logo/' . $generalSeting->fab_logo)) {
                    unlink('image/logo/' . $generalSeting->fab_logo);
                }

                $fablogo     = $request->file('fablogo');
                $fablogoex   = $fablogo->getClientOriginalExtension();
                $fablogoName = date('Ymdhms.') . $fablogoex;
                Image::make($fablogo)->resize(50, 50)->save(public_path('image/logo/') . $fablogoName);
            }

            $generalSeting->update([
                'create_by'  => Auth::id(),
                'fab_logo'   => $fablogoName,
                'updated_at' => Carbon::now(),
            ]);
            $notification = [
                'message'    => 'Small Logo Has Been Successfully Update.',
                'alert-type' => 'success',
            ];
            return redirect()->back()->with($notification);
        } else {
            $notification = [
                'message'    => 'Oop! Something Is Wrong.',
                'alert-type' => 'error',
            ];
            return redirect()->back()->with($notification);
        }

    }

    // print logo Update
    public function printLogoUpdate(Request $request) {
        $request->validate([
            'printlogo' => 'required',
        ], [
            'printlogo.required' => 'This Print Logo Field is Requird',
        ]);
        $generalSeting = GeneralSettings::where('id', 1)->first();

        if ($generalSeting) {

            if ($generalSeting->print_logo == 'print_logo.png') {
                $printlogo     = $request->file('printlogo');
                $printlogoex   = $printlogo->getClientOriginalExtension();
                $printlogoName = date('Ymdhms.') . $printlogoex;
                Image::make($printlogo)->resize(250, 50)->save(public_path('image/logo/') . $printlogoName);
            } else {
                if (file_exists('image/logo/' . $generalSeting->print_logo)) {
                    unlink('image/logo/' . $generalSeting->print_logo);
                }

                $printlogo     = $request->file('printlogo');
                $printlogoex   = $printlogo->getClientOriginalExtension();
                $printlogoName = date('Ymdhms.') . $printlogoex;
                Image::make($printlogo)->resize(250, 50)->save(public_path('image/logo/') . $printlogoName);
            }

            $generalSeting->update([
                'create_by'  => Auth::id(),
                'print_logo' => $printlogoName,
                'updated_at' => Carbon::now(),
            ]);
            $notification = [
                'message'    => 'Print Logo Has Been Successfully Update.',
                'alert-type' => 'success',
            ];
            return redirect()->back()->with($notification);
        } else {
            $notification = [
                'message'    => 'Oop! Something Is Wrong.',
                'alert-type' => 'error',
            ];
            return redirect()->back()->with($notification);
        }

    }

    // update info
    public function update(Request $request) {
        $request->validate([
            'name'            => 'required',
            'address'         => 'required',
            'title'           => 'required',
            'phone'           => 'required',
            'email'           => 'required|email',
            'currency'        => 'required',
            'currency_symbol' => 'required',
            'country'         => 'required',
        ], [
            'name.required'            => 'This Mane Logo Field is Requird',
            'code.required'            => 'This Code Field is Requird',
            'address.required'         => 'This Address Field is Requird',
            'title.required'           => 'This Title Field is Requird',
            'phone.required'           => 'This Phone Number is Requird',
            'email.required'           => 'This Email Field is Requird',
            'email.email'              => 'This Email Field Accept Only Email',
            'currency.required'        => 'This Currency Field is Requird',
            'currency_symbol.required' => 'This Currency Symbol Field is Requird',
            'country.required'         => 'This Country Field is Requird',
        ]);

        $generalSeting = GeneralSetting::where('id', 1)->first();

        if ($generalSeting) {
            $generalSeting->update([
                'create_by'       => Auth::id(),
                'name'            => $request->name,
                'title'           => $request->title,
                'address'         => $request->address,
                'phone'           => $request->phone,
                'email'           => $request->email,
                'currency'        => $request->currency,
                'currency_symbol' => $request->currency_symbol,
                'country'         => $request->country,
                'website'         => $request->website,
                'youtube'         => $request->youtube,
                'twitter'         => $request->twitter,
                'linked_in'       => $request->linkedin,
                'facebook'        => $request->facebook,
                'instagram'       => $request->instagram,
                'pinterest'       => $request->pinterest,
                'vk'              => $request->vk,
                'snapchat'        => $request->snapchat,
                'updated_at'      => Carbon::now(),
            ]);
            $notification = [
                'message'    => 'General Setting Has Been Successfully Update.',
                'alert-type' => 'success',
            ];
            return redirect()->back()->with($notification);
        } else {
            $notification = [
                'message'    => 'Oop! Something Is Wrong.',
                'alert-type' => 'error',
            ];
            return redirect()->back()->with($notification);
        }

    }

    // Stamp Update
    public function stampUpdate(Request $request) {
        $request->validate([
            'stamp' => 'required',
        ], [
            'stamp.required' => 'The Stamp Field is Requird',
        ]);
        $generalSeting = GeneralSettings::where('id', 1)->first();

        if ($generalSeting) {

            if (file_exists('image/logo/' . $generalSeting->stamp)) {
                unlink('image/logo/' . $generalSeting->stamp);
            }

            $stamp     = $request->file('stamp');
            $stampex   = $stamp->getClientOriginalExtension();
            $stampName = date('Ymdhms.') . $stampex;
            Image::make($stamp)->resize(250, 250)->save(public_path('image/logo/') . $stampName);
            $generalSeting->update([
                'create_by'  => Auth::id(),
                'stamp'      => $stampName,
                'updated_at' => Carbon::now(),
            ]);
            $notification = [
                'message'    => 'Stamp Has Been Successfully Update.',
                'alert-type' => 'success',
            ];
            return redirect()->back()->with($notification);
        } else {
            $notification = [
                'message'    => 'Oop! Something Is Wrong.',
                'alert-type' => 'error',
            ];
            return redirect()->back()->with($notification);
        }

    }

}
