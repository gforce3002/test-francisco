<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\ClientRepository;

class ApiController extends Controller
{
    public function getList(Request $request) {
        $keys = DB::table('oauth_clients')
            ->join('users', 'users.id', '=', 'oauth_clients.user_id')
            ->select('oauth_clients.*')
            ->where('users.id', $request->user()->id)
            ->where('oauth_clients.revoked', 0)
            ->get();

        return response()->json($keys);
    }

    public function create(Request $request) {
        $name = $request->input('name');
        $user = $request->user();

        $clients = new ClientRepository();
        $client = $clients->create($user->id, $name, '');

        return response()->json($client)->setStatusCode(201);
    }

    public function remove(Request $request, $id) {
        $clients = new ClientRepository();
        $client = $clients->find($id);
        $clients->delete($client);

        return response()->json([])->setStatusCode(204);
    }
}
