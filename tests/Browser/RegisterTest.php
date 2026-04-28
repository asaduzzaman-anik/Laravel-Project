<?php

use Illuminate\Support\Facades\Auth;

it('registers a user', function () {
    $page = visit('/register');
    $page->type('name', 'Asaduzzaman Anik')
        ->type('email', 'anik@test.com')
        ->type('password', 'password123')
        ->type('password_confirmation', 'password123')
        ->press('Create Account');
    $page->assertPathIs('/');

    $this->assertAuthenticated();

    expect(Auth::user())->toMatchArray([
        'name' => 'Asaduzzaman Anik',
        'email' => 'anik@test.com',
    ]);
});
