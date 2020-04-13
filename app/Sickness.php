<?php

namespace App;

use Laravelha\Support\Traits\Tableable;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Sickness extends Model
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
            ['data' => 'mature.name'],
            ['data' => 'comorbidity.name'],
            ['data' => 'observation'],
        ];
    }


    /**
     * Get the mature of Sickness.
     */
    public function mature()
    {
        return $this->belongsTo(Mature::class);
    }


    /**
     * Get the comorbidity of Sickness.
     */
    public function comorbidity()
    {
        return $this->belongsTo(Comorbidity::class);
    }

}
