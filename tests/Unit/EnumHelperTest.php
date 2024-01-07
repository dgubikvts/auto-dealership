<?php

namespace Tests\Unit;

use App\Enum\VehicleTypeEnum;
use App\Services\EnumHelper\EnumHelper;
use Illuminate\Support\Str;
use PHPUnit\Framework\TestCase;

class EnumHelperTest extends TestCase
{

    public function test_get_case_by_value_returns_enum_case_based_on_one_of_its_values(): void
    {
        $class = VehicleTypeEnum::class;
        $value = VehicleTypeEnum::CABRIOLET->value;

        $return = EnumHelper::getCaseByValue($class, $value);

        $this->assertEquals(VehicleTypeEnum::CABRIOLET, $return);
    }

    public function test_get_case_by_value_returns_null_if_case_with_value_doesnt_exist(): void
    {
        $class = VehicleTypeEnum::class;
        $value = Str::random(8);

        $return = EnumHelper::getCaseByValue($class, $value);

        $this->assertNull($return);
    }

    public function test_value_exists_returns_true_if_enum_value_exists(): void
    {
        $return = EnumHelper::valueExists('vehicle_type', VehicleTypeEnum::HATCHBACK->value);

        $this->assertTrue($return);
    }

    public function test_value_exists_returns_false_if_enum_value_doesnt_exist(): void
    {
        $return = EnumHelper::valueExists('vehicle_type', Str::random(8));

        $this->assertFalse($return);
    }
}
