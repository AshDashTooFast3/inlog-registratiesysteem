<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PraktijkmanagementController extends Controller
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
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
    public function show(string $id)
    {
        // var_dump("Ik ben bij show methode van project management controller");
        // exit();
        $user = User::find($id);

        if (! $user) {
            return redirect()->route('praktijkmanagement.userroles')
                ->with('error', 'Gebruiker niet gevonden.');
        }

        return view('praktijkmanagement.show', [
            'title' => 'Gebruiker details',
            'user' => $user,
        ]);
    }

    public function edit(string $Id)
    {
        
        $user = $this->user->sp_GetUserById($Id);

        // dd($user);

        $userroles = $this->user->sp_GetAllUserroles();

        // dd($userroles);

        return view('praktijkmanagement.edit', [
            'title' => 'Gebruiker wijzigen',
            'user' => $user,
            'userroles' => $userroles,
        ]);
    }

    public function update(Request $request, string $id)
    {
        $user = User::find($id);

        if (! $user) {
            return redirect()->route('praktijkmanagement.userroles')
                ->with('error', 'Gebruiker niet gevonden.');
        }

    
       $validated = $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|string|max:255',
            'rolename' => 'required|string',
        ]);

        $affected = $this->user->sp_UpdateUser(
            $id,
            $validated['name'],
            $validated['email'],
            $validated['rolename']
        );

        if ($affected === 0) {
            return back()->with('error', 'Er is een fout opgetreden bij het bijwerken van de gebruiker.');
        }

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
        $users = $this->user->sp_GetAllUsers(Auth::id());
        // $users = $this->user->sp_GetAllUsers(Auth::user()->id);

        return view('praktijkmanagement.userroles', [
            'title' => 'Gebruikersrollen',
            'users' => $users,
        ]);
    }
}
