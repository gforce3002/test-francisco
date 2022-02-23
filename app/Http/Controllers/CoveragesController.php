<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CoveragesController extends Controller {

    public function index() {
        return view('coverages.index');
    }

    public function create() {
        return view('coverages.create');
    }

    public function get(Request $request, $id) {
        return view('coverages.get', [
            'id' => $id
        ]);
    }

}
