<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Tests\Traits\AuthenticateUsers;
use Database\Seeders\RoleTableSeeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UploadFilesTest extends TestCase
{
    use DatabaseMigrations, AuthenticateUsers;

    public $file;
    public $testFilesPath;

    public function setUp() : void
    {
        parent::setUp();
        $this->testFilesPath = getcwd() . '/';
        $this->file = UploadedFile::fake()->createWithContent("BooksImport.csv", file_get_contents($this->testFilesPath . "BooksImport.csv"));
        $this->seed(RoleTableSeeder::class);
    }

    public function test_can_upload_with_admin_user()
    {
        $this->authenticateMember();
        Storage::fake('local');

        $this->post('/api/table-file', ['file' => $this->file], ['Authorization' => $this->token])->assertStatus(403);

        $this->authenticateAdmin();

        $this->post('/api/table-file', ['file' => $this->file], ['Authorization' => $this->token])->assertCreated();
    }

    public function test_can_upload_csv_xml_and_xmlx_files()
    {
        // test files have 14 rows of books each
        $this->authenticateAdmin();
        // CSV File
        $this->post('/api/table-file', ['file' => $this->file], ['Authorization' => $this->token])
            ->assertCreated();

        $this->assertDatabaseCount('books', 14);

        // XML File
        $this->file = UploadedFile::fake()->createWithContent("BooksImport.xml", file_get_contents($this->testFilesPath . "BooksImport.xml"));

        $this->post('/api/table-file', ['file' => $this->file], ['Authorization' => $this->token])
        ->assertCreated();

        $this->assertDatabaseCount('books', 28);
        // XLSX File
        $this->file = UploadedFile::fake()->createWithContent("BooksImport.xlsx", file_get_contents($this->testFilesPath . "BooksImport.xlsx"));

        $this->post('/api/table-file', ['file' => $this->file], ['Authorization' => $this->token])
        ->assertCreated();

        $this->assertDatabaseCount('books', 42);
    }
}
