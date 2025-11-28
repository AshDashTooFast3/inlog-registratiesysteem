<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PraktijkmanagementController extends Controller
{
    private $user;

    public function __construct()
    {
        $this->user = new User;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('praktijkmanagement.index', [
            'title' => 'Praktijkmanagement Home',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {
        $user = User::find($id);

        return view('praktijkmanagement.edit', [
            'title' => 'Gebruiker wijzigen',
            'user' => $user
            ]);
    }


    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        
        if (! $user) {
            return redirect()->route('praktijkmanagement.userroles')
                ->with('error', 'Gebruiker niet gevonden.');
        }

        $request->validate([
            'name'=> 'required|string|max:255',
            'email'=> 'nullable|string|max:255',
            'rolename' => 'nullable|string|max:20',
        ]);
        
        if ($request->filled('name')) {
            $user->name = $request->input('name');
        }

        if ($request->filled('email')) {
            $user->email = $request->input('email');
        }

        if ($request->filled('rolename')) {
            $user->rolename = $request->input('rolename');
        }


        $user->save();

        return redirect()->route('praktijkmanagement.userroles')
            ->with('success', 'Gebruiker succesvol bijgewerkt.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);

        if (! $user) {
            return redirect()->route('praktijkmanagement.userroles')
                ->with('error', 'Gebruiker niet gevonden.');
        }

        $user->delete();

        return redirect()->route('praktijkmanagement.userroles')
            ->with('success', 'Gebruiker succesvol verwijderd.');
    }

    public function manageUserroles()
    {
        $users = $this->user->sp_GetAllUsers(Auth::user()->id);

        return view('praktijkmanagement.userroles', [
            'title' => 'Gebruikersrollen',
            'users' => $users,
        ]);
    }
}
