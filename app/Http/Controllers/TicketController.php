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

    public function index() 
    {
        return Ticket::get();
    }


    public function store(Request $request)
    {

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

    public function show(int $ticket_id)
    {
        $ticket = Ticket::find($ticket_id);

        if (is_null($ticket)) {
            return response()->json('', 204);
        }
        return response()->json($ticket, 200);
    }

    public function update(int $ticket_id, Request $req)
    {
        $ticket = Ticket::find($ticket_id);
        if (is_null($ticket)) {
            return response()->json(['erro' => 'Recurso não encontrado'],
                                     204);
        }

        $ticket->fill($req->all());
        $ticket->save();
    }

    public function destroy(int $id)
    {
        $qtdRecursosRemovidos = Serie::destroy($id);
        if ($qtdRecursosRemovidos === 0) {
            return response()->json([
                'erro' => 'Recurso não encontrado'
            ], 404);
        }

        return response()->json('', 204);
    }
}