<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        return view('users.index');
    }
    public function listJson(Request $request)
    {

        // Page Length
        $pageNumber = ($request->start / $request->length) + 1;
        $pageLength = $request->length;
        $skip       = ($pageNumber - 1) * $pageLength;

         // Page Order
         $orderColumnIndex = $request->order[0]['column'] ?? '0';
         $orderBy = $request->order[0]['dir'] ?? 'desc';

         $orderByName = "name";

         switch($orderColumnIndex){
            case "0":
                $orderByName = "name";
                break;
            case "1":
                $orderByName = "email";
                break;
            case "2":
                $orderByName = "remember_token";
                break;
            case "3":
                $orderByName = "created_at";
                break;
            default:
                $orderByName = "name";
                break;
         }
        $query = \DB::table("users");


        // Search
        // $search = $request->search["value"];
        $search = $request->cSearch;
        if(!empty($search)){
            $query = $query->where(function($query) use ($search) {
                $query->orWhere('name', 'like', "%".$search."%");
                $query->orWhere('email', 'like', "%".$search."%");
                $query->orWhere('remember_token', 'like', "%".$search."%");
            });
        }

        $query = $query->orderBy($orderByName, $orderBy);
        $recordsTotal = $recordsFiltered = $query->count();

        $users = $query->take($pageLength)->skip($skip)->get();

        return response()->json([
            'draw' => $request->draw,
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data' => $users
        ], 200);
    }
}
