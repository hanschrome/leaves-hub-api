<?php

declare(strict_types=1);

namespace Tests\Unit\src\Domain\Properties\AbstractTimestamp\Validators\TimestampPropertyRangeValidator;

require 'src/Domain/Properties/Validators/IPropertyValidator.php';
require 'DummyIProperty.php';
require 'src/Domain/Properties/Validators/Exceptions/IPropertyException.php';
require 'src/Domain/Properties/AbstractTimestamp/Validators/TimestampPropertyRangeValidator/TimestampPropertyRangeException.php';
require 'src/Domain/Properties/AbstractTimestamp/Validators/TimestampPropertyRangeValidator/TimestampPropertyRangeValidator.php';

use Src\Domain\Properties\AbstractTimestamp\TimestampPropertyRangeValidator;
use Src\Domain\Properties\AbstractTimestamp\TimestampPropertyRangeException;
use Tests\TestCase;

class TimestampPropertyRangeValidatorTest extends TestCase
{
    /**
     * @throws TimestampPropertyRangeException
     */
    public function test_Validate_Now_ShouldNotThrowException() {
        $dummyIProperty = new DummyIProperty(now()->getTimestamp());

        $sut = new TimestampPropertyRangeValidator($dummyIProperty);

        $sut->validate();

        $this->assertTrue(true);
    }

    public function test_Validate_NegativeValue_ShouldThrowException() {
        $this->expectException(TimestampPropertyRangeException::class);

        $dummyIProperty = new DummyIProperty(-1);

        $sut = new TimestampPropertyRangeValidator($dummyIProperty);

        $sut->validate();
    }

    public function test_Validate_FutureValue_ShouldThrowException() {
        $this->expectException(TimestampPropertyRangeException::class);

        $dummyIProperty = new DummyIProperty(now()->getTimestamp() + 1000);

        $sut = new TimestampPropertyRangeValidator($dummyIProperty);

        $sut->validate();
    }
}
