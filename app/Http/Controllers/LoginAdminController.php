<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Admin\LoginAdminService;
use Illuminate\Validation\ValidationException;

class LoginAdminController extends Controller
{
    protected $loginAdminService;

    public function __construct(LoginAdminService $loginAdminService)
    {
        $this->loginAdminService = $loginAdminService;
    }

    
    public function store(Request $request)
    {
        $success = $this->loginAdminService->createAdmin($request);

        if ($success) {
            return redirect()->route('admin.dashboard')->with('success', 'Admin criado com sucesso!');
        }

        else {
            return redirect()->back()->with('Erro ao criar admin');
        }
    }

    public function update(Request $request, $id)
    {
        $success = $this->loginAdminService->updateAdmin($request, $id);

        if ($success) {
            return redirect()->route('admin.dashboard')->with('success', 'Admin atualizado com sucesso!');
        } else {
            return redirect()->back()->with('error', 'Erro ao atualizar admin. O registro não foi encontrado.');
        }
    }

    
    public function requestPassword(Request $request)
    {

        $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string|confirmed|min:8',
        ]);

        try {
           
            $this->loginAdminService->updatePassword(
                $request->input('current_password'),
                $request->input('new_password'),
                $request->input('new_password_confirmation')
            );

            return redirect()->back()->with('success', 'Senha atualizada com sucesso.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors());
        }
    }

    
}
