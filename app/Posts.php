<?php

namespace App;

use Carbon\Carbon;

class Posts extends Model

{


    public function comment()

    {
        return $this->hasMany(Comment::class);

    }

    public function user()

    {

        return $this->belongsTo(User::class);
    }


    public function addComment($body, $user_id)

    {

        $this->comment()->create(compact('body', 'user_id'));

    }


    public function scopeFilter($query, $filters)

    {

        if($month = $filters['month']?? false) {

            $query->whereMonth('created_at', Carbon::parse($month)->month);

        }

        if($year = $filters['year']?? false){

            $query->whereYear('created_at', $year);

        }
    }

    public static function archives()
    {

        return static ::selectRaw('year(created_at)year, monthname(created_at)month, count(*)published')

            ->groupBy('year', 'month')

            ->orderByRaw('min(created_at) desc')

            ->get()

            ->toArray();
    }


}
