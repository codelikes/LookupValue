<?php

namespace Codelikes\LookupValue\Test;

use Codelikes\LookupValue\Models\Test;
use PDOException;

class ModelTest extends TestCase
{
    /** @test */
    public function model_can_be_created()
    {
        $test1 = Test::create([
            'name' => 'Test 1'
        ]);

        $test2 = Test::create([
            'name' => 'Test 2'
        ]);

        $this->assertEquals(1, $test1->id);
        $this->assertEquals(2, $test2->id);
    }

    /** @test */
    public function check_entry_unique()
    {
        $this->expectException(PDOException::class);

        Test::create([
            'name' => 'Test 1'
        ]);

        Test::create([
            'name' => 'Test 1'
        ]);
    }
}
