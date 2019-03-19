<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    static $databaseReady = false;

    public function setUp()
    {
        parent::setUp();

        $sqliteDb = base_path() . DIRECTORY_SEPARATOR . env('DB_DATABASE');

        if (!file_exists($sqliteDb)) {
            touch($sqliteDb);
        }

        if (!self::$databaseReady) {
            $this->artisan('migrate:fresh');
            $this->artisan('db:seed');
            self::$databaseReady = true;
        }
    }
}
