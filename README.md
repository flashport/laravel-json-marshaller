# Laravel Json Marshaller
A laravel wrapper for the [json-marshaller](https://github.com/flashport/json-marshaller) lib.

## Installation:
```shell
    composer require flashport/laravel-json-marshaller
```

## Usage:

There are two main ways of using this lib, it is possible to use existing target cast objects without modifying them, 
modifying only the model which performs the cast.


### Option 1: Directly on the model

On the `$casts` array, specify the `JsonMarshallable::class` and the target class
after `:`. This will ensure the target class gets passed as an argument to the Marshaller. 

```php
/**
 * The attributes that should be cast.
 *
 * @var array<string, string>
 */
protected $casts = [
    'metadata'      => JsonMarshallable::class . ":" . Metadata::class,
    'customFields'  => JsonMarshallable::class . ":" . CustomField::class,
    'active'        => 'bool',
];
```

### Option 2: On the target classes


#### Target class:

Make sure to extend the `AsJsonMarshallable` class on your target classes.

```php

use LaravelJsonMarshaller\Castables\AsJsonMarshallable;

class CustomField extends AsJsonMarshallable
{
    //...
}
```

#### Model:
On the model, specify only the target class name you want to cast into.

```php
/**
 * The attributes that should be cast.
 *
 * @var array<string, string>
 */
protected $casts = [
    'metadata'      => Metadata::class,
    'customFields'  => CustomField::class,
    'active'        => 'bool',
];
```
