<?php

namespace Tests\Feature;

use App\Models\BlogPost;
use App\Models\Comment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testNoBlogPostsWhenNothingInDatabase()
    {
        $response = $this->get('/posts');
        $response->assertSeeText('No posts found');
    }

    public function testSee1BlogPostWhenThereIs1WithNoComments()
    {
        //Arrange
        $post = $this->createDummyBlogPost();

        //Act
        $response = $this->get('/posts');

        //Assert
        $response->assertSeeText('New title');
        $response->assertSeeText('No comments yet!');

        $this->assertDatabaseHas('blog_posts', [
            'title' => 'New title'
        ]);
    }

    public function testSee1BlogPostWithComments()
    {
        $user = $this->user();

        $post = $this->createDummyBlogPost();
        Comment::factory()->count(4)->create([
            'commentable_id' => $post->id,
            'commentable_type' => 'App\Models\BlogPost',
            'user_id' => $user->id
        ]);


        $response = $this->get('/posts');

        $response->assertSeeText('4 comments');
    }

    public function testStoreValid()
    {

        $params = [
            'title' => 'Valid title',
            'content' => 'At least 10 characters'
        ];

        $this->actingAs($this->user())
            ->post('/posts', $params)
            ->assertStatus(302)
            ->assertSessionHas('status');

        $this->assertEquals(session('status'), 'The blog post was created!');
    }

    public function testStoreFail()
    {
        $params = [
            'title' => 'x',
            'content' => 'x'
        ];

        $this->actingAs($this->user())
            ->post('/posts', $params)
            ->assertStatus(302)
            ->assertSessionHas('errors');

        $messages = session('errors')->getMessages();
        $this->assertEquals($messages['title'][0], 'The title must be at least 5 characters.');
        $this->assertEquals($messages['content'][0], 'The content must be at least 10 characters.');
    }

    public function testUpdateValid()
    {
        $user = $this->user();
        $post = $this->createDummyBlogPost($user->id);

        $this->assertDatabaseHas('blog_posts', ['title' => $post->title]);

        $params = [
            'title' => 'A new named title',
            'content' => 'Content was changed'
        ];

        $this->actingAs($user)
            ->put("/posts/{$post->id}", $params)
            ->assertStatus(302)
            ->assertSessionHas('status');

        $this->assertEquals(session('status'), 'Blog post was updated!');

        $this->assertDatabaseMissing('blog_posts', ['title' => $post->title]);
        $this->assertDatabaseHas('blog_posts', [
            'title' => $params['title']
        ]);
    }

    public function testFailUpdate()
    {
        $post = $this->createDummyBlogPost();
        $user = $this->user();

        $this->assertDatabaseHas('blog_posts', ['title' => $post->title]);

        $params = [
            'title' => 'A new named title',
            'content' => 'Content was changed'
        ];

        $this->actingAs($user)
            ->put("/posts/{$post->id}", $params)
            ->assertStatus(403)
            ->assertSeeText('This action is unauthorized.');
    }

    public function testDelete()
    {
        $user = $this->user();
        $post = $this->createDummyBlogPost($user->id);
        $this->assertDatabaseHas('blog_posts', ['title' => $post['title']]);

        $this->actingAs($user)
            ->delete("/posts/{$post->id}")
            ->assertStatus(302)
            ->assertSessionHas('status');

        $this->assertEquals(session('status'), 'Blog post was deleted');
        // $this->assertDatabaseMissing('blog_posts', ['title' => $post['title']]);
        $this->assertSoftDeleted('blog_posts', ['title' => $post['title']]);
    }

    private function createDummyBlogPost($userId = null): BlogPost
    {
        return BlogPost::factory()->published()->create(
            [
                'user_id' => $userId ?? $this->user()->id,
            ]
        );
        // $post = new BlogPost();
        // $post->title = 'New title';
        // $post->content = 'Content of the blog post';
        // $post->save();

        // return $post;
    }
}
