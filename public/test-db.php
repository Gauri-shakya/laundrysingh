<?php
require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';

// Bootstrap Laravel kernel without running the full request lifecycle
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

header('Content-Type: text/plain');

try {
    // Test connection
    $pdo = \Illuminate\Support\Facades\DB::connection()->getPdo();
    echo "1. Database Connection: SUCCESS\n";
    
    // Test read count
    $userCount = \App\Models\User::count();
    echo "2. User Count in DB: " . $userCount . "\n";
    
    $serviceCount = \App\Models\Service::count();
    echo "3. Service Count in DB: " . $serviceCount . "\n";
    
    // Test write capability
    $email = 'dbtest_' . uniqid() . '@laundrysingh.com';
    $phone = '999' . rand(1000000, 9999999);
    
    $testUser = \App\Models\User::create([
        'name' => 'Database Test User',
        'email' => $email,
        'phone' => $phone,
        'password' => bcrypt('TestPass123'),
        'role' => 'customer',
        'status' => 'active'
    ]);
    
    echo "4. Database Write (User creation): SUCCESS (ID: " . $testUser->id . ")\n";
    
    // Test delete capability
    $testUser->delete();
    echo "5. Database Delete (User cleanup): SUCCESS\n";
    
    echo "\nSUMMARY: ALL DATABASE READ/WRITE OPERATIONS WORK 100% CORRECTLY!\n";
} catch (\Exception $e) {
    echo "DATABASE TEST FAILED: " . $e->getMessage() . "\n";
    echo $e->getTraceAsString() . "\n";
}
