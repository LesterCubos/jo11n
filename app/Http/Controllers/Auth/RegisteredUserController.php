<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('admin.manage_users.form');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $temporaryPassword = 'temporaryPassword123.';

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'contact_number' => ['required', 'string', 'min:8','max:11'],
            'department' => ['required', 'string', 'max:255'],
            'role' => ['required', 'in:admin,clerk'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'contact_number' => $request->contact_number,
            'department' => $request->department,
            'password' => Hash::make($temporaryPassword),
            'role' => $request->role,
        ]);

        // event(new Registered($user));

        // Auth::login($user);

        return redirect('/admin/users')->with('notif.success','User created successfully!!');
    }

    public function userView(User $user): View {

        return view('admin.manage_users.show', ['user' => $user]);
    }

    public function destroy (Request $request, User $user) 
    {

        // Retrieve the admin user from the database
        $admins = User::where('role', 'admin')->get();

        foreach ($admins as $admin) {
            // Check if the password provided by the admin user is valid
            if (Hash::check($request->input('password'), $admin->password)) {
                // Proceed with the deletion of the user
                $user->delete();

                // Redirect to the users index page with a success message
                return redirect()->route('admin.manage_users.index')->with('notif.success', 'User deleted successfully!!');
            } 
        } 
        
        // Return an error message indicating that the password is incorrect
        return redirect()->back()->with('notif.danger','The password is incorrect!!');
    
       

    }
}
