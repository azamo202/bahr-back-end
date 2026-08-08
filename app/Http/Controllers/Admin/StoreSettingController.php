<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StoreSetting;

class StoreSettingController extends Controller
{
    public function index()
    {
        $settings = StoreSetting::first();
        return response()->json([
            'settings' => $settings
        ]);
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'phone'                   => 'nullable|array',
            'phone.*'                 => 'nullable|string',
            'whatsapp'                => 'nullable|string',
            'email'                   => 'nullable|email',
            'tiktok'                  => 'nullable|url',
            'facebook'                => 'nullable|url',
            'instagram'               => 'nullable|url',
            'youtube'                 => 'nullable|url',
            'stats'                   => 'nullable|array',
            'stats.*.valueAr'         => 'nullable|string',
            'stats.*.valueEn'         => 'nullable|string',
            'stats.*.labelAr'         => 'nullable|string',
            'stats.*.labelEn'         => 'nullable|string',
            'stats.*.labelKu'         => 'nullable|string',
            'reviews'                 => 'nullable|array',
            'reviews.*.textAr'        => 'nullable|string',
            'reviews.*.textEn'        => 'nullable|string',
            'reviews.*.textKu'        => 'nullable|string',
            'working_hours'           => 'nullable|array',
            'working_hours.*.textAr'  => 'nullable|string',
            'working_hours.*.textEn'  => 'nullable|string',
            'working_hours.*.textKu'  => 'nullable|string',
            // ===== الأسئلة الشائعة =====
            'faqs'                      => 'nullable|array',
            'faqs.*.questionAr'         => 'nullable|string|max:500',
            'faqs.*.questionEn'         => 'nullable|string|max:500',
            'faqs.*.questionKu'         => 'nullable|string|max:500',
            'faqs.*.answerAr'           => 'nullable|string|max:2000',
            'faqs.*.answerEn'           => 'nullable|string|max:2000',
            'faqs.*.answerKu'           => 'nullable|string|max:2000',
        ]);

        $settings = StoreSetting::first();

        if ($settings) {
            $settings->update($validatedData);
        } else {
            $settings = StoreSetting::create($validatedData);
        }

        return response()->json([
            'message' => 'Settings updated successfully',
            'settings' => $settings
        ]);
    }
}
