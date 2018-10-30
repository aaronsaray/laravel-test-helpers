<?php
/**
 * This stops database access by throwing an exception from the listener
 */
declare(strict_types=1);

namespace AaronSaray\LaravelTestHelpers;

use AaronSaray\LaravelTestHelpers\Exceptions\DatabaseAccessException;
use DB;

/**
 * Trait StopDBAccess
 * @package AaronSaray\LaravelTestHelpers
 */
trait StopDBAccess
{
    /**
     * Call this method to issue an exception
     */
    protected function stopDBAccess(): void
    {
        DB::listen(function($query) {
            throw new DatabaseAccessException($query->sql);
        });
    }
}