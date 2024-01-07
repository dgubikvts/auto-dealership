<?php

namespace API;

use App\Models\Brand;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Tests\TestCase;

class BrandsTest extends TestCase
{
    use RefreshDatabase;

    private User $user;

    private array $brandData;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();

        $this->brandData = [
            'name' => Str::random(20)
        ];
    }

    public function test_unauthorized_request_cannot_create_brand(): void
    {
        $response = $this->post('/api/brand/create', $this->brandData);

        $response->assertStatus(401);
    }

    public function test_create_brand_with_invalid_arguments_returns_validation_errors(): void
    {
        $data = [
            'name' => Str::random(25)
        ];

        $response = $this->withBasicAuth(config('app.admin_email'), config('app.admin_password'))->post('/api/brand/create', $data);
        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['name']);
    }

    public function test_create_brand_success(): void
    {
        $response = $this->withBasicAuth(config('app.admin_email'), config('app.admin_password'))->post('/api/brand/create', $this->brandData);

        $response->assertStatus(200);
        $response->assertJson(['success' => true]);
    }

    public function test_unauthorized_request_cannot_delete_brand()
    {
        $brand = Brand::create($this->brandData);

        $response = $this->post('/api/brand/delete', ['id' => $brand->id]);

        $response->assertStatus(401);
    }

    public function test_delete_brand_with_missing_arguments_throws_error()
    {
        $response = $this->withBasicAuth(config('app.admin_email'), config('app.admin_password'))->post('/api/brand/delete');

        $response->assertStatus(422);
        $response->assertJsonValidationErrorFor('id');
    }

    public function test_delete_brand_with_invalid_arguments_throws_error()
    {
        $brand = Brand::create($this->brandData);

        $response = $this->withBasicAuth(config('app.admin_email'), config('app.admin_password'))->post('/api/brand/delete', ['brand_id' => $brand->id]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrorFor('id');
    }

    public function test_delete_brand_success()
    {
        $brand = Brand::create($this->brandData);

        $response = $this->withBasicAuth(config('app.admin_email'), config('app.admin_password'))->post('/api/brand/delete', ['id' => $brand->id]);

        $response->assertStatus(200);
        $response->assertJson(['success' => true]);
    }
}
