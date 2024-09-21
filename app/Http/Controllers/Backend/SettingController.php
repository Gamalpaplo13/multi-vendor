<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    use ImageUploadTrait;
    public function index()
    {
        $generalSettings = GeneralSetting::first();
        return view('admin.setting.index', compact('generalSettings'));
    }
    public function generalSettingUpdate(Request $request)
    {
        $request->validate([
            'site_name' => ['required', 'max:200'],
            'layout' => ['required'],
            'contact_email' => ['required', 'email', 'max:50'],
            'currency_name' => ['required'],
            'currency_icon' => ['required', 'max:2000'],
            'time_zone' => ['required', 'max:200'],
        ]);
        GeneralSetting::updateOrCreate(
            ['id' => 1], // Condition for updateOrCreate
            [ // Attributes to update or create
                'site_name' => $request->site_name,
                'layout' => $request->layout,
                'contact_email' => $request->contact_email,
                'currency_name' => $request->currency_name,
                'currency_icon' => $request->currency_icon,
                'time_zone' => $request->time_zone,
            ]
        );

        toastr('Updated Data Successfully!', 'success', 'success');

        return redirect()->back();
    }
}
