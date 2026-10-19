<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Show the customer login form.
     */
    public function showCustomerLoginForm()
    {
        if (Auth::guard('customer')->check()) {
            return redirect()->route('customer.dashboard');
        }
        return view('auth.login');
    }

    /**
     * Handle customer authentication attempt.
     */
    public function customerLogin(Request $request)
    {
        $request->validate([
            'login' => ['required', 'string'],
            'password' => ['required'],
        ]);

        $login = $request->input('login');
        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';

        $credentials = [
            $field => $login,
            'password' => $request->input('password')
        ];

        $remember = $request->has('remember');

        if (Auth::guard('customer')->attempt($credentials, $remember)) {
            $user = Auth::guard('customer')->user();
 
            // Check if user is active and is a customer
            if (!$user->isActive()) {
                Auth::guard('customer')->logout();
                return back()->with('error', 'Your account is inactive. Please contact the administrator.')->withInput();
            }

            if (!$user->isCustomer()) {
                Auth::guard('customer')->logout();
                return back()->with('error', 'Unauthorized access. Customers only.')->withInput();
            }
 
            $request->session()->regenerate();
 
            if (session()->has('pending_order_id')) {
                $orderId = session()->pull('pending_order_id');
                $order = \App\Models\Order::find($orderId);
                if ($order) {
                    $order->update(['user_id' => $user->id]);
                    return redirect()->route('customer.orders.index')->with('success', 'Logged in and booking linked successfully!');
                }
            }
 
            if ($request->input('booking') == '1') {
                return redirect()->route('customer.dashboard', ['booking' => 1])->with('success', 'Logged in successfully. Continue with your booking.');
            }
            return redirect()->route('customer.dashboard')->with('success', 'Logged in successfully.');
        }
 
        return back()->withErrors([
            'login' => 'The provided credentials do not match our records.',
        ])->onlyInput('login');
    }

    /**
     * Show the customer registration form.
     */
    public function showCustomerRegisterForm()
    {
        if (Auth::guard('customer')->check()) {
            return redirect()->route('customer.dashboard');
        }
        return view('auth.register');
    }

    /**
     * Handle customer registration form submission.
     */
    public function customerRegister(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:20', 'unique:users,phone'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
 
        $user = \App\Models\User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
            'role' => 'customer',
            'status' => 'active',
        ]);
 
        Auth::guard('customer')->login($user);
 
        if (session()->has('pending_order_id')) {
            $orderId = session()->pull('pending_order_id');
            $order = \App\Models\Order::find($orderId);
            if ($order) {
                $order->update(['user_id' => $user->id]);
                return redirect()->route('customer.orders.index')->with('success', 'Account registered and booking linked successfully!');
            }
        }

        if ($request->input('booking') == '1') {
            return redirect()->route('customer.dashboard', ['booking' => 1])->with('success', 'Account registered and logged in successfully! Continue with your booking.');
        }
        return redirect()->route('customer.dashboard')->with('success', 'Account registered and logged in successfully!');
    }

    /**
     * Log the customer out of the application.
     */
    public function customerLogout(Request $request)
    {
        Auth::guard('customer')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Logged out successfully.');
    }

    /**
     * Show the admin login form.
     */
    public function showAdminLoginForm()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('auth.admin_login');
    }

    /**
     * Handle admin authentication attempt.
     */
    public function adminLogin(Request $request)
    {
        $request->validate([
            'login' => ['required', 'string'],
            'password' => ['required'],
        ]);

        $login = $request->input('login');
        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';

        $credentials = [
            $field => $login,
            'password' => $request->input('password')
        ];

        $remember = $request->has('remember');

        if (Auth::guard('admin')->attempt($credentials, $remember)) {
            $user = Auth::guard('admin')->user();
 
            // Check if user is active and is an admin
            if (!$user->isActive()) {
                Auth::guard('admin')->logout();
                return back()->with('error', 'Your account is inactive. Please contact the administrator.')->withInput();
            }

            if (!$user->isAdmin()) {
                Auth::guard('admin')->logout();
                return back()->with('error', 'Unauthorized access. Admins only.')->withInput();
            }
 
            $request->session()->regenerate();
 
            return redirect()->route('admin.dashboard')->with('success', 'Logged in successfully as Admin.');
        }
 
        return back()->withErrors([
            'login' => 'The provided credentials do not match our records.',
        ])->onlyInput('login');
    }

    /**
     * Log the admin out of the application.
     */
    public function adminLogout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login')->with('success', 'Logged out successfully.');
    }
}
