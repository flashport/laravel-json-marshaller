<?php namespace Tests\Data;

use Illuminate\Database\Eloquent\Model;
use LaravelJsonMarshaller\Casts\JsonMarshallable;
use Tests\Data\Structures\CustomField;
use Tests\Data\Structures\Metadata;

/**
 * @property string $name
 * @property string $email
 * @property bool $active
 * @property Metadata $metadata
 * @property CustomField[] $customFields
 */
class User extends Model{

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'active',
        'metadata',
        'customFields',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'metadata'      => JsonMarshallable::class . ":" . Metadata::class ,
        'customFields'  => JsonMarshallable::class . ":" . CustomField::class ,
        'active'        => 'bool',
    ];

}