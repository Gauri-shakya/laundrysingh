<?php

use Illuminate\Support\Facades\Route;

// Frontend Website Views
Route::get('/', function () {
    $services = \App\Models\Service::where('is_active', true)->get();
    return view('home', compact('services'));
});

Route::get('/privacy-policy', function () {
    return view('policies.privacy');
})->name('privacy');

Route::get('/terms-conditions', function () {
    return view('policies.terms');
})->name('terms');

Route::get('/refund-policy', function () {
    return view('policies.refund');
})->name('refund');

Route::get('/shipping-delivery-policy', function () {
    return view('policies.shipping');
})->name('shipping');



// Customer Authentication Routes
Route::get('/user/login', [App\Http\Controllers\AuthController::class, 'showCustomerLoginForm'])->name('login');
Route::post('/user/login', [App\Http\Controllers\AuthController::class, 'customerLogin'])->name('login.post');
Route::post('/user/logout', [App\Http\Controllers\AuthController::class, 'customerLogout'])->name('logout');
Route::get('/user/register', [App\Http\Controllers\AuthController::class, 'showCustomerRegisterForm'])->name('register');
Route::post('/user/register', [App\Http\Controllers\AuthController::class, 'customerRegister'])->name('register.post');

// Admin Authentication Routes
Route::get('/admin/login', [App\Http\Controllers\AuthController::class, 'showAdminLoginForm'])->name('admin.login');
Route::post('/admin/login', [App\Http\Controllers\AuthController::class, 'adminLogin'])->name('admin.login.post');
Route::post('/admin/logout', [App\Http\Controllers\AuthController::class, 'adminLogout'])->name('admin.logout');

// Schedule Pickup Route (Public Guest Modal Submission)
Route::post('/schedule-pickup', [App\Http\Controllers\PickupController::class, 'store'])->name('pickup.schedule');

// Admin Panel Routes (Protected by Auth:admin & Admin Middleware)
Route::middleware(['auth:admin', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/orders', [App\Http\Controllers\AdminDashboardController::class, 'orders'])->name('orders.index');
    Route::get('/orders/{order}', [App\Http\Controllers\AdminDashboardController::class, 'showOrder'])->name('orders.show');
    Route::post('/orders/{order}/status', [App\Http\Controllers\AdminDashboardController::class, 'updateStatus'])->name('orders.status');
    Route::delete('/orders/{order}', [App\Http\Controllers\AdminDashboardController::class, 'destroyOrder'])->name('orders.delete');
    
    // Customer Management
    Route::get('/customers', [App\Http\Controllers\AdminDashboardController::class, 'customers'])->name('customers.index');
    Route::delete('/customers/{customer}', [App\Http\Controllers\AdminDashboardController::class, 'destroyCustomer'])->name('customers.delete');
    
    // Pricing Management
    Route::get('/services', [App\Http\Controllers\PricingController::class, 'index'])->name('services.index');
    Route::post('/services', [App\Http\Controllers\PricingController::class, 'store'])->name('services.store');
    Route::post('/services/{service}/update', [App\Http\Controllers\PricingController::class, 'update'])->name('services.update');
    Route::post('/services/{service}/delete', [App\Http\Controllers\PricingController::class, 'destroy'])->name('services.delete');
});

// System Installer Route (Runs migrations, seeds and packages from browser)
Route::get('/install-system', function () {
    try {
        if (function_exists('opcache_reset')) {
            opcache_reset();
        }
        // Clear any cached configurations/routes/views to load fresh .env values
        \Illuminate\Support\Facades\Artisan::call('config:clear');
        \Illuminate\Support\Facades\Artisan::call('cache:clear');
        \Illuminate\Support\Facades\Artisan::call('route:clear');
        \Illuminate\Support\Facades\Artisan::call('view:clear');
    } catch (\Exception $e) {
        // Ignore cache errors
    }

    try {
        \Illuminate\Support\Facades\DB::connection()->getPdo();
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => 'Could not connect to database. Please verify your mysql server is active and the database "laundrysingh" exists. Details: ' . $e->getMessage()
        ], 500);
    }

    try {
        // Run migrations
        $fresh = request('fresh', 'true') === 'true';
        if ($fresh) {
            \Illuminate\Support\Facades\Artisan::call('migrate:fresh', ['--force' => true]);
            $migrationOutput = \Illuminate\Support\Facades\Artisan::output();

            // Run seeders
            \Illuminate\Support\Facades\Artisan::call('db:seed', ['--force' => true]);
            $seedOutput = \Illuminate\Support\Facades\Artisan::output();
        } else {
            \Illuminate\Support\Facades\Artisan::call('migrate', ['--force' => true]);
            $migrationOutput = \Illuminate\Support\Facades\Artisan::output();
            
            $seedOutput = 'Skipped general seeding.';
        }

        // Check and install DomPDF if needed
        $composerOutput = 'DomPDF already installed or skipped.';
        if (!class_exists(\Barryvdh\DomPDF\Facade\Pdf::class)) {
            putenv('COMPOSER_HOME=' . sys_get_temp_dir());
            $cmd = 'composer require barryvdh/laravel-dompdf --no-interaction 2>&1';
            $execOutput = shell_exec($cmd);
            $composerOutput = "Composer output:\n" . $execOutput;
        }

        // Clean up unused files and folders
        $filesToDelete = [
            base_path('app/Http/Controllers/CheckoutController.php'),
            base_path('app/Http/Controllers/DeliveryBoyController.php'),
            base_path('app/Http/Middleware/DeliveryBoyMiddleware.php'),
            base_path('resources/views/orders/checkout.blade.php'),
            base_path('resources/views/orders/razorpay_simulation.blade.php'),
            base_path('resources/views/orders/track.blade.php'),
        ];
        foreach ($filesToDelete as $file) {
            if (file_exists($file)) {
                @unlink($file);
            }
        }

        $dirsToDelete = [
            base_path('resources/views/delivery'),
            base_path('resources/views/admin/delivery-boys'),
            base_path('resources/views/admin/reports'),
            base_path('resources/views/invoices'),
        ];
        
        $deleteDirRecursive = function($dir) use (&$deleteDirRecursive) {
            if (!file_exists($dir)) return;
            foreach (scandir($dir) as $item) {
                if ($item == '.' || $item == '..') continue;
                $path = $dir . DIRECTORY_SEPARATOR . $item;
                if (is_dir($path)) {
                    $deleteDirRecursive($path);
                } else {
                    @unlink($path);
                }
            }
            @rmdir($dir);
        };

        foreach ($dirsToDelete as $dir) {
            $deleteDirRecursive($dir);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'System installation and file cleanup completed successfully!',
            'migration' => $migrationOutput,
            'seeder' => $seedOutput,
            'composer' => $composerOutput,
            'users' => \App\Models\User::count(),
            'services' => \App\Models\Service::count()
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => 'Installation failed: ' . $e->getMessage(),
            'trace' => $e->getTraceAsString()
        ], 500);
    }
});


// Customer Portal Routes (Protected by Auth:customer & Customer Middleware)
Route::middleware(['auth:customer', 'customer'])->prefix('customer')->name('customer.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\CustomerDashboardController::class, 'index'])->name('dashboard');
    Route::get('/orders', [App\Http\Controllers\CustomerDashboardController::class, 'orders'])->name('orders.index');
    Route::get('/orders/{order}', [App\Http\Controllers\CustomerDashboardController::class, 'showOrder'])->name('orders.show');
    Route::get('/profile', [App\Http\Controllers\CustomerDashboardController::class, 'editProfile'])->name('profile');
    Route::post('/profile', [App\Http\Controllers\CustomerDashboardController::class, 'updateProfile'])->name('profile.update');
});




