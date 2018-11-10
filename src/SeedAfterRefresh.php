<?php
/**
 * Modify artisan to seed after refresh in tests
 */
declare(strict_types=1);

namespace Tests;

/**
 * Trait SeedAfterRefresh
 * @package Tests
 */
trait SeedAfterRefresh
{
    /**
     * Overwriting the artisan command for a specific reason:
     *
     * When we use the database command, it tries to run migrate fresh - but it gives no option to seed
     * I want mine to seed as well before we start transactions
     *
     * @param string $command
     * @param array $parameters
     * @return \Illuminate\Foundation\Testing\PendingCommand|int
     */
    public function artisan($command, $parameters = [])
    {
        if ($command === 'migrate:fresh') {
            $parameters['--seed'] = true;
        }

        return parent::artisan($command, $parameters);
    }
}
