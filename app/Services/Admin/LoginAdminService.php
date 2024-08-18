<?php

namespace App\Services\Admin;


use App\Models\Admin;
use Illuminate\http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\ValidationException;

class LoginAdminService extends Model
{

    
    public function createAdmin(Request $request){
        $validate = $request->validate([
                                            "adminUsername" => ["required", 
                                                                "string", 
                                                                "min:6", 
                                                                "max:255", 
                                                                Rule::unique('admin', 'admin_username')
                                                                ],

                                            "adminPassword" => ["required",
                                                                "string",
                                                                "min:6",
                                                                "max:255",
                                                                ]
                                         ]);

        if($validate){
            Admin::create([
                "adminUsername" => $validate['adminUsername'],
                "adminPassword" => bcrypt($validate['adminPassword'])
            ]);

            return true;
        }

        return false;
    }

    public function updateAdmin(Request $request, $id){
        $validated = $request->validate([
            'adminUsername' => [
                'required',
                'string',
                'min:6',
                'max:255',
                Rule::unique('admins', 'admin_username')->ignore($id),  
            ],
            'adminPassword' => [
                'nullable', 
                'string',
                'min:8',
            ],
        ]);

        //busca o admin pelo id
        $admin = Admin::find($id);

        if ($admin) 
        {
            $admin->update([
                'adminUsername' => $validated['adminUsername'],
                'adminPassword' => isset($validated['adminPassword']) ? bcrypt($validated['adminPassword']) : $admin->password,
            ]);

            return true;
        }
        
        else
        {
            return false;
        }
    }

    
    /**
     * Atualiza a senha do administrador autenticado.
     *
     * @param string $currentPass
     * @param string $newPass
     * @param string $newPassConf
     * @return void
     * @throws ValidationException
     */
    
    public function updatePassword(string $currentPass, $newPass, $newPassConf)
    {   
        /** @var \App\Models\Admin $admin */
        $admin = Auth::guard('admins')->user();

        if (!$admin) {
            throw new \Exception('Nenhum administrador autenticado encontrado.');
        }
        
        if (!Hash::check($currentPass, $admin->adminPassword)) {
            throw ValidationException::withMessages([
                'current_password' => 'A senha atual está incorreta.',
            ]);
        }

        if ($newPass !== $newPassConf) {
            throw ValidationException::withMessages([
                'new_password' => 'As novas senhas não coincidem.',
            ]);
        }
        
        $admin->adminPassword = Hash::make($newPass);
        
        $admin->save();
    }
    
}