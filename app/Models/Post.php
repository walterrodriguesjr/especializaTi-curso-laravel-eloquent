<?php

namespace App\Models;

use App\Scopes\YearScope;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'user_id',
        'title',
        'body',
        'date'
    ];

    protected $casts = [
        'date' => 'datetime:d/m/Y',
    ];

    //INICIO EXEMPLOS USANDO LOCAL SCOPE
    public function scopeLastWeek($query){
        return $this->whereDate('date', '>=', now()->subDays(4))
        ->whereDate('date', '<=', now()->subDays(1));
    }
    
    public function scopeToday($query){
        return $this->whereDate('date', '>=', now());
    }
    
    public function scopeBetween($query, $firstDate, $lastDate){
        $firstDate = Carbon::make($firstDate)->format('Y-m-d');
        $lastDate = Carbon::make($lastDate)->format('Y-m-d');
        return $this->whereDate('date', '>=', $firstDate)
        ->whereDate('date', '<=', $lastDate);
    }
    //FIM EXEMPLOS USANDO LOCAL SCOPE

    protected static function booted()
    {
        static::addGlobalScope(new YearScope);
    }

    /* public function getTitleAttribute($value) {
        return strtoupper($value);
    } */

    public function setDateAttribute($value) {
        $this->attributes['date'] = Carbon::make($value)->format('Y-m-d');
    }
}
