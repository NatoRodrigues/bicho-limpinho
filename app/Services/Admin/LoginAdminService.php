<?php

namespace App\Services\Admin;


use App\Models\Admin;
 
use Illuminate\http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Database\Eloquent\Model;

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

    
    
    
    

    
    
}