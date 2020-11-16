<?php

    namespace App\Http\Controllers;
    use Illuminate\Http\Response; // Response Components
    use App\Traits\ApiResponser; // <-- use to standardizedour code for api response
    use Illuminate\Http\Request; // <-- handling http request in lumen
    use App\Services\User1Service; // user1 Services

    Class User1Controller extends Controller {   
        use ApiResponser;

        /**
         * The service to consume the User1 Microservice
         * @var User1Service
         */
        public $user1Service;
        /**
         * Create a new controller instance
         * @return void
         */

        private $request;

        public function __construct(User1Service $user1Service){ 
            $this->user1Service = $user1Service; 
        }

        // public function __construct(Request $request){
        //     $this->request = $request;
        // }
        

        // Read Users
        public function getUsers(){
            return $this->successResponse($this->user1Service->obtainUsers1()); 
        }

        // Read one User
        public function getUser($id){
            return $this->successResponse($this->user1Service->obtainUser1($id)); 
        }

        // Update User
        public function updateUser(Request $request, $id){
            return $this->successResponse($this->user1Service->editUser1($request->all(),$id));
        }
        
        // Delete User
        public function deleteUser($id){
            return $this->successResponse($this->user1Service->deleteUser1($id));
        }

        // Add User
        public function addUser(Request $request){
            return $this->successResponse($this->user1Service->addUser1($request->all()));
        }
    }