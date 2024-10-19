<?php

/*
|--------------------------------------------------------------------------
| Test Case
|--------------------------------------------------------------------------
|
| The closure you provide to your test functions is always bound to a specific PHPUnit test
| case class. By default, that class is "PHPUnit\Framework\TestCase".
|
*/

// Extend Pest to use the RefreshDatabase trait in each directory.
pest()->extend(Tests\TestCase::class)
    ->use(Illuminate\Foundation\Testing\RefreshDatabase::class)
    ->in('Feature') // Specify Feature directory
    ->in('Unit'); // Specify Unit directory

/*
|--------------------------------------------------------------------------
| Expectations
|--------------------------------------------------------------------------
|
| Extend the expectations to define custom assertions.
|
*/
expect()->extend('toBeOne', function () {
    return $this->toBe(1);
});

/*
|--------------------------------------------------------------------------
| Functions
|--------------------------------------------------------------------------
|
| Define global helper functions for testing.
|
*/
function something()
{
    // Define reusable helpers here
}
