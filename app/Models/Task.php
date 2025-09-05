<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    const STATUS = [
        'to do' => 'in progress',
        'in progress' => 'completed',
        'completed' => 'to do',
    ];

    protected $table = 'tasks';

    protected $fillable = [
        'title',
        'description',
        'detailed_description',
        'assignee',
        'priority',
        'status'
    ];

    public function updateStatus(): void
    {
        $current = strtolower(trim($this->status));

        if (isset(self::STATUS[$current])) {
            $this->status = self::STATUS[$current];
            $this->save();
        }
    } 
}
