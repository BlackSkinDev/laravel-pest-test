<?php

//setup (works like setup/constructor in php unit)
beforeEach(function(){
    $this->user = \App\Models\User::factory()->create();
});


it('tests if home page loads',function(){
    $response = $this->get('/');
    $response->assertStatus(200);
});

test('the home page loads',function(){
    $response = $this->get('/');
    $response->assertStatus(200);
});

it('creates  a new user',function(){
    \App\Models\User::factory()->create();
    $this->assertTrue(\App\Models\User::exists());

});

it('restricts guest from accessing profile',function(){
   $this->get('/profile')->assertRedirect(route('login'));
    actingAs($this->user)->get('profile')->assertSee($this->user->name);
});

//
                //or


// it('test if home page loads')
//   ->get('/')
//   ->as sertStatus(200);

// Grouping test
it('expects an exception',function(){
    throw new Exception('An exception was thrown');
})->throws(Exception::class,'exception was thrown')
->group('exception');

// Run group test with "vendor/bin/pest --group=exception"


// Skipping test
test('user is created',function(){
    \App\Models\User::factory()->create();
    $this->assertTrue(\App\Models\User::exists());
})->skip(true,'Redundant test');

// Running only a test
test('guest are denied access to profile',function(){
    $this->get('/profile')->assertRedirect(route('login'));
     actingAs($this->user)->get('profile')->assertSee($this->user->name);
 })->only();


