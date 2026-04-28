<?php

use App\Models\User;

it('logs in a user', function () {
    $user = User::factory()->create([
        'email' => 'asaduzzamananik12@gmail.com',
        'password' => 'Anik@laravel',
    ]);
    visit('/login')
        ->type('email', 'asaduzzamananik12@gmail.com')
        ->type('password', 'Anik@laravel')
        ->press('@login-btn')
        ->assertPathIs('/');
});

it('logs out a user', function () {
    $user = User::factory()->create([
        'email' => 'asaduzzamananik12@gmail.com',
        'password' => 'Anik@laravel',
    ]);
    $this->actingAs($user);
    visit('/')
        ->press('Logout');
    $this->assertGuest();
});
