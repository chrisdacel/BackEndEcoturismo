<?php

namespace Tests\Feature;

use App\Models\PlaceEvent;
use App\Models\TuristicPlace;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EventsApiTest extends TestCase
{
    use RefreshDatabase;

    private function authHeaders(User $user): array
    {
        $token = $user->createToken('test')->plainTextToken;
        return ['Authorization' => "Bearer {$token}"];
    }

    public function test_can_list_upcoming_events(): void
    {
        $operator = User::factory()->operator()->create();
        $place = TuristicPlace::factory()->create(['user_id' => $operator->id]);
        PlaceEvent::factory()->create(['place_id' => $place->id]);

        $response = $this->getJson('/api/events/upcoming');

        $response->assertStatus(200)
            ->assertJsonStructure(['events']);
    }

    public function test_can_get_next_event(): void
    {
        $user = User::factory()->create();
        $operator = User::factory()->operator()->create();
        $place = TuristicPlace::factory()->create(['user_id' => $operator->id]);
        PlaceEvent::factory()->create(['place_id' => $place->id]);

        $response = $this->getJson('/api/events/next', $this->authHeaders($user));

        $response->assertStatus(200)
            ->assertJsonStructure(['event']);
    }

    public function test_can_get_event_by_id(): void
    {
        $user = User::factory()->create();
        $operator = User::factory()->operator()->create();
        $place = TuristicPlace::factory()->create(['user_id' => $operator->id]);
        $event = PlaceEvent::factory()->create(['place_id' => $place->id]);

        $response = $this->getJson("/api/events/{$event->id}", $this->authHeaders($user));

        $response->assertStatus(200);
    }

    public function test_returns_404_for_nonexistent_event(): void
    {
        $user = User::factory()->create();

        $response = $this->getJson('/api/events/99999', $this->authHeaders($user));

        $response->assertStatus(404);
    }

    public function test_operator_can_create_event(): void
    {
        $operator = User::factory()->operator()->create();
        $place = TuristicPlace::factory()->create(['user_id' => $operator->id]);

        $response = $this->postJson("/api/places/{$place->id}/events", [
            'title' => 'Evento de prueba',
            'description' => 'Descripción del evento',
            'starts_at' => now()->addDays(5)->toIso8601String(),
            'image' => \Illuminate\Http\UploadedFile::fake()->image('event.jpg'),
        ], $this->authHeaders($operator));

        $response->assertStatus(200);
    }

    public function test_regular_user_cannot_create_event(): void
    {
        $user = User::factory()->create();
        $operator = User::factory()->operator()->create();
        $place = TuristicPlace::factory()->create(['user_id' => $operator->id]);

        $response = $this->postJson("/api/places/{$place->id}/events", [
            'title' => 'Evento de prueba',
            'description' => 'Descripción del evento',
            'starts_at' => now()->addDays(5)->toIso8601String(),
        ], $this->authHeaders($user));

        $response->assertStatus(403);
    }

    public function test_operator_can_delete_own_event(): void
    {
        $operator = User::factory()->operator()->create();
        $place = TuristicPlace::factory()->create(['user_id' => $operator->id]);
        $event = PlaceEvent::factory()->create(['place_id' => $place->id]);

        $response = $this->deleteJson("/api/events/{$event->id}", [], $this->authHeaders($operator));

        $response->assertStatus(200)
            ->assertJson(['message' => 'Evento eliminado exitosamente']);
    }
}
