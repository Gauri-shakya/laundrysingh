<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. Add user_id column if it does not exist
        if (Schema::hasTable('orders') && !Schema::hasColumn('orders', 'user_id')) {
            Schema::table('orders', function (Blueprint $table) {
                $table->foreignId('user_id')->nullable()->after('service_type')->constrained('users')->onDelete('cascade');
            });
        }

        // 2. Data repair / backfill script: match orders by phone number
        try {
            if (Schema::hasTable('orders') && Schema::hasTable('users')) {
                $orders = DB::table('orders')->whereNull('user_id')->get();
                $users = DB::table('users')->where('role', 'customer')->get();

                foreach ($orders as $order) {
                    if (empty($order->customer_phone)) {
                        continue;
                    }

                    $orderPhoneClean = preg_replace('/\D/', '', $order->customer_phone);
                    $orderPhoneLast10 = substr($orderPhoneClean, -10);

                    if (strlen($orderPhoneLast10) === 10) {
                        foreach ($users as $user) {
                            if (empty($user->phone)) {
                                continue;
                            }

                            $userPhoneClean = preg_replace('/\D/', '', $user->phone);
                            $userPhoneLast10 = substr($userPhoneClean, -10);

                            if ($orderPhoneLast10 === $userPhoneLast10) {
                                DB::table('orders')->where('id', $order->id)->update([
                                    'user_id' => $user->id
                                ]);
                                break; // Match found, move to next order
                            }
                        }
                    }
                }
            }
        } catch (\Exception $e) {
            // Log warning or handle exception if needed
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('orders') && Schema::hasColumn('orders', 'user_id')) {
            Schema::table('orders', function (Blueprint $table) {
                $table->dropForeign(['user_id']);
                $table->dropColumn('user_id');
            });
        }
    }
};
