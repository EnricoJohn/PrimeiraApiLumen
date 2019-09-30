<?php

namespace App\Http\Controllers;

use App\{Ticket, User, Comment, Category};
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    public function index() {
        return Ticket::get();
    }


    public function store(Request $request){

        return response()
            ->json(Ticket::create([
                'title'         => $request->title,
                'user_id'       => $request->user_id,
                'ticket_id'     => $request->ticket_id,
                'category_id'   => $request->category_id,
                'priority'      => $request->priority,
                'message'       => $request->message,
                'status'        => $request->status, 
            ]),
             201);

    }
}
