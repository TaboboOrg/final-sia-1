<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Models\Usersubject;

Class UsersubjectController extends Controller {
    use ApiResponser;
    private $request;
    public function __construct(Request $request){
        $this->request = $request;
    }
    public function getUsers(){
        $usersubject = Usersubject::all();
        // return response()->json($users, 200);
        return $this->successResponse($usersubject);
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
        'course_name' => 'required|max:100',
        'course_description' => 'required|max:500'
        ];
        $this->validate($request,$rules);
        $usersubject = User::create($request->all());
        return $this->successResponse($usersubject, Response::HTTP_CREATED);
        }
        /**
        * Obtains and show one user
        * @return Illuminate\Http\Response
        */
        public function show($subject_id)
        {
        $usersubject = Usersubject::findOrFail($subject_id);
        return $this->successResponse($usersubject);
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
        public function update(Request $request,$course_id)
        {
        $rules = [
            'course_name' => 'required|max:100',
            'course_description' => 'required|max:500'
        ];
        $this->validate($request, $rules);
        $user = User::findOrFail($course_id);
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
        public function delete($course_id)
        {
        $user = User::findOrFail($course_id);
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