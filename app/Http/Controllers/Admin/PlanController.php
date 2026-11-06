<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    // Listar os planos cadastrados
    public function index()
    {
        $plans = Plan::all();
        return view('admin.plans.index', compact('plans'));
    }

    // Mostrar o formulário de criação
    public function create()
    {
        return view('admin.plans.create');
    }

    // Salvar o novo plano no banco
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'checkout_url' => 'required|url',
        ]);

        Plan::create($request->all());

        return redirect()->route('admin.plans.index')->with('success', 'Plano criado com sucesso!');
    }

    // Outros métodos (edit, update, destroy) seguem a mesma lógica...
    public function edit(Plan $plan)
    {
        return view('admin.plans.edit', compact('plan'));
    }

    public function update(Request $request, Plan $plan)
    {
        $plan->update($request->all());
        return redirect()->route('admin.plans.index')->with('success', 'Plano atualizado!');
    }

    public function destroy(Plan $plan)
    {
        $plan->delete();
        return redirect()->route('admin.plans.index')->with('success', 'Plano excluído!');
    }
}