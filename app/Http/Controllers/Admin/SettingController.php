<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function updatePopup(Request $request)
    {
        // 1. Liga ou Desliga o Popup
        SiteSetting::updateOrCreate(
            ['key' => 'popup_active'],
            ['value' => $request->has('is_active') ? '1' : '0']
        );

        // 2. Salva a Imagem se você subir uma nova
        if ($request->hasFile('popup_image')) {
            $path = $request->file('popup_image')->store('public/popup');
            $url = Storage::url($path);
            SiteSetting::updateOrCreate(
                ['key' => 'popup_image'],
                ['value' => $url]
            );
        }

        return back()->with('success', 'Configurações do Popup atualizadas!');
    }
}