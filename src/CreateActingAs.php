<?php
/**
 * Create the user, then set it as acting as
 */
declare(strict_types=1);

namespace Tests;

use Illuminate\Contracts\Auth\Authenticatable;

/**
 * Trait CreateActingAs
 * @package Tests
 */
trait CreateActingAs
{
    /**
     * @var Authenticatable Current acting as user
     */
    protected $actingAs;

    /**
     * Create an acting as user, save it, and return it
     *
     * Note that this uses the config option but it can be overridden by the other option
     *
     * @param array $properties
     * @param string|null $userModel
     * @return Authenticatable
     */
    protected function createActingAs(array $properties = [], string $userModel = null): Authenticatable
    {
        $userClass = $userModel ?: config('auth.providers.users.model');

        $this->actingAs = factory($userClass)->create($properties);
        $this->actingAs($this->actingAs);
        return $this->actingAs;
    }
}
