<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Jobs\V1\Notebook as Jobs;
use App\Http\Requests\V1\Notebook as Requests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NotebookController extends Controller
{
    public function index()
    {
        $notebooks = Jobs\Index::dispatchSync();
        return response()->json(['notebooks' => $notebooks], Response::HTTP_OK);
    }

    public function show($id)
    {
        $notebook = Jobs\Show::dispatchSync($id);
        return response()->json(['notebook' => $notebook], Response::HTTP_OK);
    }

    public function store(Requests\Create $request)
    {
        Jobs\Create::dispatchSync(
            name: $request->name,
            company: $request->company,
            phone: $request->phone,
            email: $request->email,
            date_of_birth: $request->date_of_birth,
            url: $request->hasFile('url') ? $request->file('url') : null
        );

        return response()->json(['message' => 'Запись создана'], Response::HTTP_CREATED);
    }

    public function update(Request $request, $id)
    {
        Jobs\Update::dispatchSync(
            notebook_id: $id,
            name: $request->name,
            company: $request->company,
            phone: $request->phone,
            email: $request->email,
            date_of_birth: $request->date_of_birth,
        );

        return response()->json(['message' => 'Запись обновлена'], Response::HTTP_OK);
    }

    public function destroy($id)
    {
        Jobs\Delete::dispatchSync($id);
        return response()->json(['message' => 'Запись удалена'], Response::HTTP_OK);
    }
}
