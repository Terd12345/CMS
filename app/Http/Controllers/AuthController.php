<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\AdminUser;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\News;
use App\Models\ArchivedUser;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }
    
    public function loginPost(Request $request) {
        $request->validate([
            'email' => 'required|email|min:5',
            'password' => 'required|min:6',
        ]);
    
        $credentials = $request->only('email', 'password');
    
        // 👇 Use 'admin' guard explicitly
        if (Auth::guard('admin')->attempt($credentials)) { 
            return redirect()->intended(route('home'))->with('success', 'Successfully Logged In');
        }

        // If not an admin, check the users table
        if (Auth::guard('web')->attempt($credentials)) {
            return redirect()->intended(route('enroll'))->with('success', 'Successfully Logged In');
        }
    
        return redirect(route('login'))->with('error', 'Login Failed! Wrong Email or Password');
    }


    public function register(){             //displays the register page
        return view('auth.register');
    }

    public function registerPost(Request $request){           //validates the register entry and saves the register entry 
        $request->validate([
            'fullName' => 'required|min:5|unique:users,name',
            'email' => 'required|email|min:5|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = new User();
        $user->name = $request->fullName;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        
        if($user->save()){
            return redirect(route('login'))->with('success', 'User created successfully');
        }
        return redirect(route('register'))->with('error', 'failed to create account');
    }

    public function logout(Request $request){   //logs out the user and removes the session
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('login'))->with('error', 'You have been logged Out.');
    }

    public function studentLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('login'))->with('error', 'You have been logged out.');
    }

    public function getAllUsers(){
    $users = User::all(); // Fetch all users
    return view('admin.user', compact('users')); // Pass data to the view
    }

    public function getAllAdmins(){
        // Fetch all admin users from the database
        $admins = AdminUser::all();
        // Pass the $admins variable to the view
        return view('admin.adminList', compact('admins'));
    }

    public function searchUsers(Request $request)
    {
        $searchTerm = $request->input('search');

        // Search users by name or email
        $users = User::where('name', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('email', 'LIKE', "%{$searchTerm}%")
                    ->get();

        return view('admin.user', compact('users'));
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.editUser', compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|email|min:5|unique:users,email,' . $id,
        ]);

        $user = User::findOrFail($id);

        // Check if the old password is provided and matches
        if ($request->filled('old_password')) {
            if (!Hash::check($request->old_password, $user->password)) {
                return redirect()->route('admin.users.edit', $id)->with('error', 'Old password does not match');
            }

            $request->validate([
                'password' => 'required|min:6|confirmed',
            ]);

            $user->password = Hash::make($request->password);
        }

        $user->name = $request->name;
        $user->email = $request->email;

        if ($user->save()) {
            return redirect()->route('admin.users')->with('success', 'User updated successfully');
        }

        return redirect()->route('admin.users.edit', $id)->with('error', 'Failed to update user');
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);

        // Archive the user
        $archivedUser = new ArchivedUser();
        $archivedUser->id = $user->id;
        $archivedUser->name = $user->name;
        $archivedUser->email = $user->email;
        $archivedUser->password = $user->password;
        $archivedUser->role = $user->role;
        $archivedUser->created_at = $user->created_at;
        $archivedUser->updated_at = $user->updated_at;
        $archivedUser->save();

        if ($user->delete()) {
            return redirect()->route('admin.users')->with('error', 'User deleted and archived successfully');
        }

        return redirect()->route('admin.users')->with('error', 'Failed to delete user');
    }

    public function getArchivedUsers()
    {
        $archivedUsers = ArchivedUser::all();
        return view('admin.archivedUsers', compact('archivedUsers'));
    }

    public function exportToPDF()
    {
        $users = User::all();

        $pdf = Pdf::loadView('admin.pdfUsers', compact('users'))->setPaper('a4', 'landscape');

        return $pdf->download('users_list.pdf');
    }

    public function exportNewsToPDF()
    {
        $news = News::all();

        $pdf = Pdf::loadView('admin.pdfPost', compact('news'))->setPaper('a4', 'landscape');

        return $pdf->download('news_list.pdf');
    }

    public function enrollNow()
    {
        if (Auth::guard('web')->check()) {
            return view('student.enroll');
        }

        return redirect(route('login'))->with('error', 'You must be logged in as a student to access this page.');
    }

}
