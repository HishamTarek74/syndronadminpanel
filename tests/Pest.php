<?php

/*
|--------------------------------------------------------------------------
| Test Case
|--------------------------------------------------------------------------
|
| The closure you provide to your test functions is always bound to a specific PHPUnit test
| case class. By default, that class is "PHPUnit\Framework\TestCase". Of course, you may
| need to change it using the "uses()" function to bind a different classes or traits.
|
*/

use App\Models\Admin;
use App\Models\Customer;
use App\Models\Supervisor;
use Database\Seeders\DatabaseSeeder;
use Database\Seeders\RolesAndPermissionsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Spatie\Permission\PermissionRegistrar;
use Tests\CreatesApplication;

uses(
    BaseTestCase::class,
    CreatesApplication::class,
    RefreshDatabase::class
)->beforeEach(function () {
    // now re-register all the roles and permissions (clears cache and reloads relations)
    $this->app->make(PermissionRegistrar::class)->registerPermissions();
    $this->seed(RolesAndPermissionsSeeder::class);
})->in(__DIR__.'/Feature/Api');

/*
|--------------------------------------------------------------------------
| BeforeEach Test
|--------------------------------------------------------------------------
| it will run before each test
|
*/

/*
|--------------------------------------------------------------------------
| Expectations
|--------------------------------------------------------------------------
|
| When you're writing tests, you often need to check that values meet certain conditions. The
| "expect()" function gives you access to a set of "expectations" methods that you can use
| to assert different things. Of course, you may extend the Expectation API at any time.
|
*/



/*
|--------------------------------------------------------------------------
| Functions
|--------------------------------------------------------------------------
|
| While Pest is very powerful out-of-the-box, you may have some testing code specific to your
| project that you don't want to repeat in every file. Here you can also expose helpers as
| global functions to help you to reduce the number of lines of code in your test files.
|
*/

/**
 * Set the currently logged in admin for the application.
 *
 * @param  null  $driver
 * @return Admin
 */
function actingAsAdmin($driver = null): Admin
{
    $admin = Admin::factory()->create();
    return test()->actingAs($admin, $driver);
}

/**
 * Set the currently logged in supervisor for the application.
 *
 * @param  null  $driver
 * @return Supervisor
 */
function actingAsSupervisor($driver = null): Supervisor
{
    $supervisor = Supervisor::factory()->create();

    return test()->actingAs($supervisor, $driver);
}

/**
 * Set the currently logged in customer for the application.
 *
 * @param  null  $driver
 * @return Customer
 */
function actingAsCustomer($driver = null): Customer
{
    $customer = Customer::factory()->create();

    return test()->actingAs($customer, $driver);
}
