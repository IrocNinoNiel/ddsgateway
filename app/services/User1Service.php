<?php
    namespace App\Services;
    use App\Traits\ConsumesExternalService;

    class User1Service{
        use ConsumesExternalService;
        /**
         * The base uri to consume the User1 Service
         * @var string
         */
        public $baseUri;

        public function __construct(){
            $this->baseUri = config('services.users1.base_uri');
        }

        public function obtainUsers1(){
            return $this->performRequest('GET','/api/users');
        }

        public function obtainUser1($id){
            return $this->performRequest('GET',"/api/users/{$id}");
        }

        public function editUser1($data,$id){
            return $this->performRequest('PUT',"/api/users/update/{$id}", $data);
        }

        public function deleteUser1($id){
            echo $id;
            return $this->performRequest('DELETE',"/api/users/delete/${id}");
        }

        public function addUser1($data){
            return $this->performRequest('POST',"/api/users/add", $data);
        }

    }