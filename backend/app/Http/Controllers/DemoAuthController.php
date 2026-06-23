<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DemoAuthController extends Controller
{
    public function loginAs(string $role)
    {
        $allowedRoles = ['admin', 'store', 'driver'];
        if (!in_array($role, $allowedRoles)) {
            return redirect()->back()->with('error', 'Invalid demo role');
        }

        $user = User::firstOrCreate(
            ['email' => "demo.{$role}@example.com"],
            [
                'name' => 'Demo ' . ucfirst($role),
                'password' => bcrypt('demo1234'),
                'role' => $role
            ]
        );

        Auth::login($user);
        return redirect('/dashboard')->with('success', "Logged in as Demo {$role}");
    }
}