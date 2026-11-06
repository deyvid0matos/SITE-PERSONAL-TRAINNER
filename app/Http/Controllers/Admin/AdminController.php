<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\SiteSetting;
use App\Models\StudentResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function plansIndex() {
        $plans = Plan::all();
        return view('admin.plans.index', compact('plans'));
    }

    public function plansStore(Request $request) {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'nullable|numeric',
            'checkout_url' => 'required',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:12288'
        ]);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('plans', 'public');
            $data['photo_url'] = '/storage/' . $path;
        }

        Plan::create($data);
        return back()->with('success', 'Plano criado com sucesso!');
    }

    public function plansDestroy(Plan $plan) {
        if ($plan->photo_url) {
            Storage::disk('public')->delete(str_replace('/storage/', '', $plan->photo_url));
        }
        $plan->delete();
        return back()->with('success', 'Plano excluído!');
    }

    public function servicesIndex() {
        $services = Service::all();
        return view('admin.services.index', compact('services'));
    }

    public function servicesStore(Request $request) {
        $request->validate(['title' => 'required', 'icon' => 'required', 'description' => 'required']);
        Service::create($request->all());
        return back()->with('success', 'Serviço criado!');
    }

    public function servicesDestroy(Service $service) {
        $service->delete();
        return back()->with('success', 'Serviço excluído!');
    }

    public function testimonialsIndex() {
        $testimonials = Testimonial::all();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function testimonialsStore(Request $request) {
        $request->validate(['name' => 'required', 'content' => 'required']);
        Testimonial::create($request->all());
        return back()->with('success', 'Depoimento criado!');
    }

    public function testimonialsDestroy(Testimonial $testimonial) {
        $testimonial->delete();
        return back()->with('success', 'Depoimento excluído!');
    }

    // --- NOVA LÓGICA DE GALERIA ---
    public function resultsIndex() {
        $results = StudentResult::all();
        return view('admin.results.index', compact('results'));
    }

    public function resultsStore(Request $request) {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'instagram_url' => 'nullable|url',
            'photo' => 'required|image|max:12288'
        ]);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('results', 'public');
            $data['image_url'] = '/storage/' . $path;
        }

        StudentResult::create($data);
        return back()->with('success', 'Resultado adicionado à galeria!');
    }

    public function resultsDestroy(StudentResult $result) {
        if ($result->image_url) {
            Storage::disk('public')->delete(str_replace('/storage/', '', $result->image_url));
        }
        $result->delete();
        return back()->with('success', 'Resultado excluído!');
    }

    // --- LÓGICA DO POPUP ---
    public function updatePopup(Request $request)
    {
        SiteSetting::updateOrCreate(['key' => 'popup_active'], ['value' => $request->has('is_active') ? '1' : '0']);
        SiteSetting::updateOrCreate(['key' => 'popup_title'], ['value' => $request->popup_title]);
        SiteSetting::updateOrCreate(['key' => 'popup_text'], ['value' => $request->popup_text]);

        if ($request->hasFile('popup_image')) {
            $path = $request->file('popup_image')->store('popup', 'public');
            $url = '/storage/' . $path;
            SiteSetting::updateOrCreate(['key' => 'popup_image'], ['value' => $url]);
        }

        return back()->with('success', 'Popup atualizado com sucesso!');
    }
}