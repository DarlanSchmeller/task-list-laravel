<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;
use App\Models\Task;

class ChecklistItem extends Model
{
    protected $table = 'checklist_items';

    // SRelation with task
    protected function task() {
        return $this->belongsTo(Task::class);
    }
}
