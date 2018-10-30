# Laravel Test Helpers

These are helper methods that I end up using in my unit tests a lot.

## Helpers

### Stop DB Access

In unit tests, I do not want database access. Integration tests are where I integrate with the database. In some cases, with misconfigured Unit tests we might introduce database dependencies.  To stop that, use the following:

`use AaronSaray\LaravelTestHelpers\StopDBAccess`

And then in your `setUp()` method (or in each method you have in your unit test), call `$this->stopDBAccess()`

Please note that this will technically warn after Database access, not stop it.  Afterward it will throw a `AaronSaray\LaravelTestHelper\Exceptions\DatabaseAccessException`