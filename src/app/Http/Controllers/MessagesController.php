<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessagesController
{
    public function index() {
        return view('messages.index');
    }
}
