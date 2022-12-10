<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalendarEvent extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'events';

    public function getFormFields():array
    {
        return [
            'name' => $this->display,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'tickets' => $this->tickets,
            'price' => $this->price,
            'location' => $this->location,
            'description' => $this->description,
        ];
    }
}
