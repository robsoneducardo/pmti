<?php

namespace App;

use Laravelha\Support\Traits\Tableable;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Mature extends Model
{
    use Tableable;

    protected $guarded = ['id'];

    /**
     * ['data' => 'columnName', 'searchable' => true, 'orderable' => true, 'linkable' => false]
     *
     * searchable and orderable is true by default
     * linkable is false by default
     *
     * @return array[]
     */
    public static function getColumns(): array
    {
        return [
            ['data' => 'id', 'linkable' => true],
            ['data' => 'name'],
            ['data' => 'birth_at'],
            ['data' => 'cpf'],
            ['data' => 'registered_at'],
            ['data' => 'address'],
            ['data' => 'district.name'],
            ['data' => 'NIS'],
        ];
    }


    /**
     * Get the district of Mature.
     */
    public function district()
    {
        return $this->belongsTo(District::class);
    }

}
