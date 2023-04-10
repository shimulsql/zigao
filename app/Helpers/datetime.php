<?php

use Illuminate\Support\Carbon;

if(!function_exists('dateDiffHuman'))
{
  function dateDiffHuman($date)
  {
    return Carbon::parse($date)->diffForHumans();
  }
}