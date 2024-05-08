# Anything

[![Latest Version on Packagist](https://img.shields.io/packagist/v/dex/anything.svg?style=flat-square)](https://packagist.org/packages/dex/anything)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/dex/anything/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/dex/anything/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/dex/anything/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/dex/anything/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/dex/anything.svg?style=flat-square)](https://packagist.org/packages/dex/anything)

You always need to create auxiliary tables in your database to store few records just to have good database 
normalization, with `anything` package this will finish.

## Installation

You can install the package via composer:

```bash
composer require dex/anything
```

Now, you can create any virtual/logical model using `Anything` model or extended it.

### Belongs to relation

Suppose you have a `Person` model that have a `belongsTo` relation with `Gender`, `Race` and `Religion` model, you 
should have something like this for you models using 4 database tables.

```php
class Person extends Model
{
    protected $table = 'person';
     
    public function gender(): BelongsTo
    {
        return $this->belongsTo(Gender::class);
    }
    
    public function race(): BelongsTo
    {
        return $this->belongsTo(Race::class);
    }
    
    public function religion(): BelongsTo
    {
        return $this->belongsTo(Religion::class);
    }
}

class Gender extends Model
{
    protected $table = 'gender';
}

class Race extends Model
{
    protected $table = 'race';
}

class Religion extends Model
{
    protected $table = 'religion';
}
```

For each model you will have a database table.

But using `Anything` model you will have just 2 database tables.

```php
class Person extends Model
{
    protected $table = 'person';
     
    public function gender(): BelongsTo
    {
        return $this->belongsTo(Gender::class);
    }
    
    public function race(): BelongsTo
    {
        return $this->belongsTo(Race::class);
    }
    
    public function religion(): BelongsTo
    {
        return $this->belongsTo(Religion::class);
    }
}

class Gender extends Anything
{
}

class Race extends Anything
{
}

class Religion extends Anything
{
}
```

And you still have access through Eloquent relationships normally

```php
$person = Person::factory()->create();

$person->gender->label; // Ex.: Female
$person->race->label; // Ex.: Black
$person->religion->label; // Ex.: Atheist
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Eder Soares](https://github.com/edersoares)
- [Edinei Valdameri](https://github.com/edineivaldameri)
- [Robert Ferraz de Sousa](https://github.com/robertfsousa)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
