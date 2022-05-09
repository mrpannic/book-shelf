<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Book;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Traits\AuthenticateUsers;
use \Carbon\Carbon;
use Database\Seeders\RoleTableSeeder;

class BooksTest extends TestCase
{
    use DatabaseMigrations, AuthenticateUsers;

    protected function setUp() : void
    {
        parent::setUp();
        $this->seed(RoleTableSeeder::class);
        $this->authenticateAdmin();
    }

    public function test_can_retrieve_books()
    {
        Book::factory()->count(3)->create();
        
        $this->get('/api/books', ['Authorization' => $this->token])
            ->assertOk()
            ->assertJsonCount(3);
    }

    public function test_can_retrieve_a_book_by_id()
    {
        $book = Book::factory()->create();
        
        $this->get("/api/books/{$book->id}", ['Authorization' => $this->token])
            ->assertOk()->assertJsonFragment([
                'id' => $book->id,
                'name' => $book->name,
                'author' => $book->author,
                'publisher' => $book->publisher
            ]);
    }

    public function test_can_retrieve_books_based_on_date_filter()
    {


        $book1 = Book::factory()->create(['published_date' => Carbon::now()->subYears(4)]);
        $book2 = Book::factory()->create(['published_date' => Carbon::now()->subYears(10)]);
        $book3 = Book::factory()->create(['published_date' => Carbon::now()->subYears(11)]);

        // Five years ago
        $this->get('/api/books?date=1', ['Authorization' => $this->token])
            ->assertOk()
            ->assertJsonFragment(['id' => $book1->id]);
        // Ten years ago
        $this->get('/api/books?date=2', ['Authorization' => $this->token])
            ->assertOk()
            ->assertJsonFragment(['id' => $book2->id]);
        // More than ten years ago
        $this->get('/api/books?date=3', ['Authorization' => $this->token])
            ->assertOk()
            ->assertJsonFragment(['id' => $book3->id]);
    }

    public function test_can_retrieve_books_based_on_partial_name_filter()
    {
        $book1 = Book::factory()->create(['name' => 'some name1']);
        Book::factory()->create(['name' => 'some name2']);

        $this->get("/api/books?name=name1", ['Authorization' => $this->token])
            ->assertOk()
            ->assertJsonFragment(['id' => $book1->id]);
    }
}
