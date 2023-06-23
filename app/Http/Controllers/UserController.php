<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Usersubject;

Class UserController extends Controller {
    use ApiResponser;
    private $request;
    public function __construct(Request $request){
        $this->request = $request;
    }
    public function getUsers(){
        $users = User::all();
        // return response()->json($users, 200);
        return $this->successResponse($users);
    }
    // public function show($course_id)
    // {
    //     $users = User::find($course_id);
    //     return response()->json($users, 200);
    // }
    // public function update(Request $request, $course_id)
    // {
    //     $users = User::find($course_id);
    //     $users->course_name = $request->input('course_name');
    //     $users->save();

    //     return response()->json($users, 200);
    // }
    // public function destroy($course_id)
    // {
    //     $users = User::find($course_id);
    //     $product->delete();
    //     return response()->json('Successfully Deleted');
    // }
    public function add(Request $request){
        $rules = [
        'bookid' => 'required|min:1',
        'bookname' => 'required|max:150',
        'yearpublish' => 'required',
        'authorid' => 'required|numeric|min:1'
        ];
        $this->validate($request,$rules);
        $usersubject = Usersubject::findOrFail($request->authorid);

        $user = User::create($request->all());
        return $this->successResponse($user, Response::HTTP_CREATED);
        }
        /**
        * Obtains and show one user
        * @return Illuminate\Http\Response
        */
        public function show($bookid)
        {
        $user = User::findOrFail($bookid);
        return $this->successResponse($user);
        // return User::where('course_id','like','%'.$course_id.'%')->get();
        // old code
        /*
        $user = User::where('userid', $id)->first();
        if($user){
        return $this->successResponse($user);
        }
        {
        return $this->errorResponse('User ID Does Not Exists',
        Response::HTTP_NOT_FOUND);
        }
        */
        }
        /**
        * Update an existing author
        * @return Illuminate\Http\Response
        */
        public function update(Request $request,$bookid)
        {
        $rules = [
            'bookname' => 'required|max:150',
            'yearpublish' => 'required',
            'authorid' => 'required|numeric|min:1'
        ];
        $this->validate($request, $rules);
        $usersubject = Usersubject::findOrFail($request->authorid);

        $user = User::findOrFail($bookid);
        $user->fill($request->all());
        
        // if no changes happen
        if ($user->isClean()) {
        return $this->errorResponse('At least one value must
        change', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $user->save();
        return $this->successResponse($user);
        // old code
        /*
        $this->validate($request, $rules);
        //$user = User::findOrFail($id);
        $user = User::where('userid', $id)->first();
        if($user){
        $user->fill($request->all());
        // if no changes happen
        if ($user->isClean()) {
        return $this->errorResponse('At least one value must
        change', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $user->save();
        return $this->successResponse($user);
        }
        {
        return $this->errorResponse('User ID Does Not Exists',
        Response::HTTP_NOT_FOUND);
        }
        */
        }
        /**
        * Remove an existing user
        * @return Illuminate\Http\Response
        */
        public function delete($bookid)
        {
        $user = User::findOrFail($bookid);
        $user->delete();
        
        return $this->successResponse($user);
        // old code
        /*
        $user = User::where('userid', $id)->first();
        if($user){
        $user->delete();
        return $this->successResponse($user);
        }
        {
        return $this->errorResponse('User ID Does Not Exists',
        Response::HTTP_NOT_FOUND);
        }
        */
        }
}