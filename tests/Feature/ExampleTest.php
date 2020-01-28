<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\User;
use App\Entry;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function display_home_page ()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Laravel Blog');
    }

    /** @test */
    function display_user_profile_page ()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get('/users/' . $user['id']);
        $response->assertViewIs('users.show');
    }

    /** @test */
    function only_signed_in_users_can_create_entries ()
    {
        $response = $this->get('/entries/create');
        $response->assertRedirect('/login');
    }

    /** @test */
    function navbar_displays_login_option_when_user_is_not_signed_in ()
    {
        $response = $this->get('/');
        $response->assertSee('Login</a>');
    }

    /** @test */
    function navbar_hides_login_option_when_user_is_signed_in ()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get('/');
        $response->assertDontSee('Login</a>');
    }

    /** @test */
    function show_edit_entry_button_when_user_is_signed_in ()
    {
        $this->actingAs(factory(User::class)->create());
        $post = $this->post('/entries', [
            'title' => 'test title',
            'content' => 'test content'
        ]);
        $response = $this->get('/');
        $response->assertSee('Edit</a>');
    }

    /** @test */
    function user_can_create_new_entry ()
    {
        $this->actingAs(factory(User::class)->create());
        $response = $this->post('/entries', [
            'title' => 'test title',
            'content' => 'test content'
        ]);
        $this->assertCount(1, Entry::all());
    }

    /** @test */
    function validation_on_create_new_entry ()
    {
        $this->actingAs(factory(User::class)->create());
        $response = $this->post('/entries', [
            'title' => 'test title',
        ]);
        $response->assertSessionHasErrors('content');
        $this->assertCount(0, Entry::all());

    }
}
