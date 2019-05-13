<?php

namespace Hisman\Option\Test;

use Hisman\Option\OptionServiceProvider;
use Orchestra\Testbench\TestCase as OrchestraTestCase;
use Option;
use DB;

class OptionTest extends OrchestraTestCase
{
    /**
     * Load package service provider
     * @param  \Illuminate\Foundation\Application $app
     * @return \Hisman\Option\OptionServiceProvider
     */
    protected function getPackageProviders($app)
    {
        return [OptionServiceProvider::class];
    }

    /**
     * Load package alias
     * @param  \Illuminate\Foundation\Application $app
     * @return array
     */
    protected function getPackageAliases($app)
    {
        return [
            'Option' => \Hisman\Option\Facade\Option::class,
        ];
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        // Setup default database to use sqlite :memory:
        $app['config']->set('database.default', 'testbench');
        $app['config']->set('database.connections.testbench', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);
    }

    /**
     * Setup the test environment.
     */
    public function setUp()
    {
        parent::setUp();

        $this->artisan('migrate', ['--database' => 'testbench']);
    }

    /**
     * Test for setting the option.
     *
     * @test
     */
    public function testOptionSet()
    {
        Option::set('test', 'Option Value');

        $option = DB::table('options')->where('name', '=', 'test')->first();

        $this->assertEquals('Option Value', unserialize($option->value));
    }

    /**
     * Test for getting the option.
     *
     * @test
     */
    public function testOptionGet()
    {
        Option::set('test', 'Option Value');

        $option = Option::get('test');

        $this->assertEquals('Option Value', $option);
    }
}
