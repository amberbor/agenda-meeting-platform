<?php

namespace App\Traits;

trait RedirectsAuthUsers
{
    /**
     * @return string
     */
    public function redirectTo() : string
    {
        if(
            auth()->check() &&
            request()->user()->role !== null &&
            request()->user()->role->type == 'back'
        ){
            return session()->pull('url.intended', route('back.dashboard.index'));
        } else if(
            auth()->check() &&
            request()->user()->role !== null &&
            request()->user()->role->type == 'front'
        ) {
            return session()->pull('url.intended', route('front.agenda.index'));
        } else {
            return session()->pull('url.intended', '/');
        }
    }
}
