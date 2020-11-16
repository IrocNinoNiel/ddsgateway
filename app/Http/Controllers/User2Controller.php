<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Http\Response;
    use App\Traits\ApiResponser;
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

        private $request;

       public function __construct(User2Service $user2Service){ 
            $this->user2Service = $user2Service; 
        }
        
        // Create User
        public function addUser(Request $request){
            return $this->successResponse($this->user2Service->addUser2($request->all()));
        }

        // Read Users
        public function getUsers(){
            return $this->successResponse($this->user2Service->obtainUsers2()); 
        }

        public function getUser($id){
            return $this->successResponse($this->user2Service->obtainUser2($id)); 
        }

        // Update User
        public function updateUser(Request $request, $id){
            return $this->successResponse($this->user2Service->editUser2($request->all(),$id));
        }
        
        public function deleteUser($id){
            return $this->successResponse($this->user2Service->deleteUser2($id));
        }
    }