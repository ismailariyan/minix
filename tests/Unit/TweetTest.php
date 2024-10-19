<?php

namespace Tests\Unit;

use App\Models\Tweet;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class TweetTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function it_can_create_a_tweet_with_valid_attributes(): void
    {
        // Arrange: Create a user who will post the tweet
        $user = User::factory()->create();

        // Act: Create a tweet
        $tweet = $user->tweets()->create([
            'body' => 'This is a test tweet!',
            'type' => 'tweet',
        ]);

        // Assert: Check if the tweet was created successfully
        $this->assertDatabaseHas('tweets', [
            'id' => $tweet->id,
            'body' => 'This is a test tweet!',
            'type' => 'tweet',
            'user_id' => $user->id,
        ]);
    }
}
