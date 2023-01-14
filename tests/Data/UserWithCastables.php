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
class UserWithCastables extends Model{

    /**
     * @var string
     */
    protected $table = "users";

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
        'metadata'      => Metadata::class ,
        'customFields'  => CustomField::class ,
        'active'        => 'bool',
    ];

}