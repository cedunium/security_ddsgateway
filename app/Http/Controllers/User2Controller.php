<?php 

namespace App\Http\Controllers;

//use App\User;
// use App\Models\User;    //your model
use Illuminate\Http\Response;
use App\Traits\ApiResponser; //standardized code for api response
use Illuminate\Http\Request;  //handling http request in lumen 
use DB; //not using lumen eloquent you can use DB component in lumen
use App\Services\User2Service;

Class User2Controller extends Controller {     
    use ApiResponser;
    /**
    * The service to consume the User1 Microservice
    * @var User2Service
    */
    public $user2Service;
    /**
    * Create a new controller instance
    * @return void
    */

    public function __construct(User2Service $user2Service){
        $this->user2Service = $user2Service;
    }

    public function getUsers(){     
        return $this->successResponse($this->user2Service->obtainUsers2());    
    }

    public function index(){
        return $this->successResponse($this->user2Service->obtainUsers2());
    }
        
    public function addUser(Request $request){
        return $this->successResponse($this->user2Service->createUser2($request->all(), Response::HTTP_CREATED));
    }

    public function show($id){
        return $this->successResponse($this->user2Service->obtainUser2($id));
    }

    public function update(Request $request, $id){
        return $this->successResponse($this->user2Service->editUser2($request->all(), $id));
    }

    public function delete($id){
        return $this->successResponse($this->user2Service->deleteUser2($id));
    }
}