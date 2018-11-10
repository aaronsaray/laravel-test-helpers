# Laravel Test Helpers

These are helper methods that I end up using in my unit tests a lot.

## Helpers

### Stop DB Access

In unit tests, I do not want database access. Integration tests are where I integrate with the database. In some cases, with misconfigured Unit tests we might introduce database dependencies.  To stop that, use the following:

`use AaronSaray\LaravelTestHelpers\StopDBAccess`

And then in your `setUp()` method (or in each method you have in your unit test), call `$this->stopDBAccess()`

Please note that this will technically warn after Database access, not stop it.  Afterward it will throw a `AaronSaray\LaravelTestHelper\Exceptions\DatabaseAccessException`

### Create Acting As

Often, you might want to create a user first, then set them as the acting as user in unit tests.  You can do that with:

`use AaronSaray\LaravelTestHelpers\CreatingActingAs`

Then, you can call `$this->createActingAs($passToFactory)` which will set `$this->actingAs` to the user model after setting it in the context of this test.

### Seed After Refresh

When you need to seed your data immediately after the first migration (re)fresh:

`use AaronSaray\LaravelTestHelpers\SeedAfterRefresh`

Now, when the `migrate:fresh` is called, `db:seed` will be called after (at the beginning of the test suite.)
