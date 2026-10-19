<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookingAuthTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutMiddleware(\Illuminate\Foundation\Http\Middleware\ValidateCsrfToken::class);
    }

    /**
     * Test guest redirects and auth checks on homepage.
     */
    public function test_guest_landing_page_redirect_links_have_booking_param()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee(route('register', ['booking' => 1]));
        $response->assertSee(route('login', ['booking' => 1]));
    }

    /**
     * Test registration form inherits booking query parameter.
     */
    public function test_register_page_preserves_booking_param()
    {
        $response = $this->get('/register?booking=1');

        $response->assertStatus(200);
        $response->assertSee(route('register.post', ['booking' => 1]));
        $response->assertSee(route('login', ['booking' => 1]));
    }

    /**
     * Test login form inherits booking query parameter.
     */
    public function test_login_page_preserves_booking_param()
    {
        $response = $this->get('/login?booking=1');

        $response->assertStatus(200);
        $response->assertSee(route('login.post', ['booking' => 1]));
        $response->assertSee(route('register', ['booking' => 1]));
    }

    /**
     * Test register redirects to customer dashboard with booking param on success.
     */
    public function test_register_submits_and_redirects_to_dashboard_with_booking_param()
    {
        $response = $this->post('/register?booking=1', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '1234567890',
            'password' => 'Password123',
            'password_confirmation' => 'Password123'
        ]);

        $response->assertRedirect(route('customer.dashboard', ['booking' => 1]));
        $this->assertAuthenticated();
    }

    /**
     * Test login redirects to customer dashboard with booking param on success.
     */
    public function test_login_submits_and_redirects_to_dashboard_with_booking_param()
    {
        $user = User::create([
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'phone' => '1234567891',
            'password' => bcrypt('Password123'),
            'role' => 'customer',
            'status' => 'active'
        ]);

        $response = $this->post('/login?booking=1', [
            'login' => 'jane@example.com',
            'password' => 'Password123'
        ]);

        $response->assertRedirect(route('customer.dashboard', ['booking' => 1]));
        $this->assertAuthenticatedAs($user);
    }
}
