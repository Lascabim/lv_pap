<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use App\Models\User;

class UserController extends Controller
{
    public function checkToken(Request $request) {
        $user = $request->user();

        if (!$user) {
            return response()->json(['success' => false, 'errors' => 'Utilizador não encontrado'], 404);
        } else {
            return response()->json(['success' => true, 'errors' => 'Utilizador encontrado'], 200);
        }
    }
    
    public function createUser(Request $request) {
        $name = $request->input('name');
        $email = strtolower($request->input('email'));
    
        $password = $request->input('password');
        $confirmPassword = $request->input('confirmPassword');

        $is_visual = $request->input('is_visual') === 'true' ? 1 : 0;

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'min:8', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'confirmPassword' => ['required', 'same:password'],
            'is_visual' => ['required'],
        ]);       
        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()->toArray()], 400);
        }
        
        $hashedPassword = Hash::make($password);
        $hasUsername = User::where('username', strtolower($name))->first();

        if (!$hasUsername) {
            $user = User::create([
                'name' => $name,
                'username' => $name,
                'email' => $email,
                'password' => $hashedPassword,
                'is_visual' => $is_visual,
            ]);

            return response()->json(['success' => true, 'errors' => null, 'message' => 'Utilizador criado com sucesso'], 201);        
        } else {
            $username = $this->generateUniqueUsername($name);
            
            $user = User::create([
                'name' => $name,
                'username' => $username,
                'email' => $email,
                'password' => $hashedPassword,
                'is_visual' => $is_visual,
            ]);

            return response()->json(['success' => true, 'errors' => null, 'message' => 'Utilizador criado com sucesso'], 201);        
        }
    }

    public function loginUser(Request $request) {
        $email = strtolower($request->input('email'));
        $password = $request->input('password');
    
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ]);

    
        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()->toArray()], 403);
        }
        
        $user = User::where('email', $email)->first();

        if (!$user) {
            return response()->json(['success' => false, 'errors' => ['email' => ['Email inexistente']]], 401);
        }
    
        if (!Hash::check($password, $user->password)) {
            return response()->json(['success' => false, 'errors' => ['password' => ['Password inválida']]], 401);
        }

        $token = $user->createToken('authToken')->plainTextToken;
        return response()->json(['success' => true, 'errors' => null, 'token' => $token, 'message' => 'Utilizador logado com sucesso'], 200);
    }    

    public function getUser(Request $request) {
        $token = $request->bearerToken();
        $user = auth()->user();
    
        if (!$user) {
            return response()->json(['success' => false, 'user' => null, 'errors' => ['token' => ['Token inválido']]], 401);
        }
    
        return response()->json(['success' => true, 'token' => $token, 'user' => $user, 'errors' => null, 'message' => 'Informação do utilizador enviada'], 200);
    }

    public function updatePhoto(Request $request)
    {
        $user = $request->user();

        if (!$user) {
            return response()->json(['success' => false, 'errors' => 'Utilizador não encontrado'], 404);
        }

        $userEmail = $user->email;

        $validator = Validator::make($request->all(), [
            'image' => ['required', 'image', 'max:2048'],
        ]);
    
        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()->toArray()], 400);
        }
    
        $image = $request->file('image');
        $filename = uniqid('profile_photo_') . '.' . $image->getClientOriginalExtension();
        $storagePath = 'images/profile_photos/';
        $image->move(public_path($storagePath), $filename);
    
        $finalPath = $storagePath . $filename;

        $user->profile_photo_path = $finalPath;
        $user->save();
    
        return response()->json(['success' => true, 'errors' => null, 'message' => 'Foto de perfil atualizada'], 200);
    }    

    public function updateData(Request $request)
    {
        $user = $request->user();

        if (!$user) {
            return response()->json(['success' => false, 'errors' => 'Utilizador não encontrado, faz login novamente'], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:8|max:255',
            // 'username' => 'required|string|min:8|max:255|unique:users,username,' . $user->id,
            // 'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'required|string|min:8',
            'newPassword' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }

        if (!Hash::check($request->input('password'), $user->password)) {
            return response()->json(['success' => false, 'errors' => ['password' => ['Password inválida']]], 401);
        }

        $newPasswordValidator = Validator::make($request->all(), [
            'newPassword' => 'required|string|min:8',
        ]);

        if ($newPasswordValidator->fails()) {
            return response()->json(['success' => false, 'errors' => $newPasswordValidator->errors()], 422);
        }

        $user->update([
            'name' => $request->input('name'),
            // 'username' => $request->input('username'),
            // 'email' => $request->input('email'),
        ]);

        if ($request->has('newPassword')) {
            $hashedPassword = Hash::make($request->input('newPassword'));

            $user->update(['password' => $hashedPassword]);
        }

        return response()->json(['success' => true, 'errors' => null, 'message' => 'Dados atualizados'], 200);
    } 

    private function generateUniqueUsername($name) {
        $cleanName = strtolower(str_replace(' ', '', $name));
        $count = User::where('username', $cleanName)->count();
        $username = $count > 0 ? $cleanName . ($count + 1) : $cleanName;
    
        return $username;
    }
}
