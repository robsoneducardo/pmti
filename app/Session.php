<?php

namespace App;

use Laravelha\Support\Traits\Tableable;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Session extends Model
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
            ['data' => 'activity_id'],
            ['data' => 'minister_id'],
            ['data' => 'day'],
            ['data' => 'hour'],
        ];
    }

    
    /**
     * Get the activity of Session.
     */
    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

            
    /**
     * Get the minister of Session.
     */
    public function minister()
    {
        return $this->belongsTo(Minister::class);
    }

}
