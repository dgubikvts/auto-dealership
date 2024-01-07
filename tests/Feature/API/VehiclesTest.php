<?php

namespace API;

use App\Enum\FuelEnum;
use App\Enum\TransmissionEnum;
use App\Enum\VehicleTypeEnum;
use App\Enum\WheelsEnum;
use App\Models\Brand;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Tests\TestCase;

class VehiclesTest extends TestCase
{
    use RefreshDatabase;

    private User $user;

    private array $vehicleData;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();

        $this->vehicleData = [
            'brand_id' => Brand::factory()->create()->id,
            'vehicle_type' => VehicleTypeEnum::SEDAN->value,
            'wheels' => WheelsEnum::FOUR->value,
            'transmission' => TransmissionEnum::MANUAL->value,
            'fuel' => FuelEnum::PETROL->value,
            'model' => 'A4',
            'year' => '2012',
            'mileage' => '142647',
            'price' => '8000'
        ];
    }

    public function test_unauthorized_request_cannot_create_vehicle(): void
    {
        $response = $this->post('/api/vehicle/create', $this->vehicleData);

        $response->assertStatus(401);
    }

    public function test_create_vehicle_with_invalid_arguments_returns_validation_errors(): void
    {
        $data = [
            'brand_id' => '',
            'vehicle_type' => Str::random(8),
            'wheels' => Str::random(8),
            'transmission' => Str::random(8),
            'fuel' => Str::random(8),
            'model' => Str::random(26),
            'year' => Str::random(5),
            'mileage' => '',
            'price' => '0'
        ];

        $response = $this->withBasicAuth(config('app.admin_email'), config('app.admin_password'))->post('/api/vehicle/create', $data);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(array_keys($data));
    }

    public function test_create_vehicle_success(): void
    {
        $response = $this->withBasicAuth(config('app.admin_email'), config('app.admin_password'))->post('/api/vehicle/create', $this->vehicleData);

        $response->assertStatus(200);
        $response->assertJson(['success' => true]);
    }

    public function test_unauthorized_request_cannot_update_vehicle()
    {
        $data = [
            'vehicle_id' => Vehicle::factory()->create()->id,
            'model' => Str::random(8),
        ];

        $response = $this->post('/api/vehicle/update', $data);

        $response->assertStatus(401);
    }

    public function test_update_vehicle_with_invalid_arguments_throws_errors()
    {
        $data = [
            'id' => Vehicle::factory()->create()->id,
            'brand_id' => Str::random(2),
            'vehicle_type' => Str::random(8),
            'wheels' => Str::random(8),
            'transmission' => Str::random(8),
            'fuel' => Str::random(8),
            'model' => Str::random(26),
            'year' => Str::random(5),
            'mileage' => '',
            'price' => '0'
        ];

        $response = $this->withBasicAuth(config('app.admin_email'), config('app.admin_password'))->post('/api/vehicle/update', $data);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['brand_id', 'vehicle_type', 'wheels', 'transmission', 'fuel', 'model', 'year', 'mileage', 'price']);
    }

    public function test_update_vehicle_success()
    {
        $data = [
            'id' => Vehicle::factory()->create()->id,
            'model' => Str::random(8),
        ];

        $response = $this->withBasicAuth(config('app.admin_email'), config('app.admin_password'))->post('/api/vehicle/update', $data);

        $response->assertStatus(200);
        $response->assertJson(['success' => true]);
    }

    public function test_unauthorized_request_cannot_delete_vehicle()
    {
        $vehicle = Vehicle::create($this->vehicleData);

        $response = $this->post('/api/vehicle/delete', ['id' => $vehicle->id]);

        $response->assertStatus(401);
    }

    public function test_delete_vehicle_with_missing_arguments_throws_error()
    {
        $response = $this->withBasicAuth(config('app.admin_email'), config('app.admin_password'))->post('/api/vehicle/delete');

        $response->assertStatus(422);
        $response->assertJsonValidationErrorFor('id');
    }

    public function test_delete_vehicle_with_invalid_arguments_throws_error()
    {
        $vehicle = Vehicle::create($this->vehicleData);

        $response = $this->withBasicAuth(config('app.admin_email'), config('app.admin_password'))->post('/api/vehicle/delete', ['vehicle_id' => $vehicle->id]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrorFor('id');
    }

    public function test_delete_vehicle_success()
    {
        $vehicle = Vehicle::create($this->vehicleData);

        $response = $this->withBasicAuth(config('app.admin_email'), config('app.admin_password'))->post('/api/vehicle/delete', ['id' => $vehicle->id]);

        $response->assertStatus(200);
        $response->assertJson(['success' => true]);
    }
}
