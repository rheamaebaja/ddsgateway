<?php
    namespace App\Services;
    use App\Traits\ConsumesExternalService;

    class User2Service{
        
        use ConsumesExternalService;
        /**
        * The base uri to consume the User2 Service
        * @var string
        */
        
        public $baseUri;

        /**
         * The secret to consume the User1 Service
         * @var string
         */
        
        public $secret;
        
        public function __construct()
        {
            $this->baseUri = config('services.users2.base_uri');
            $this->secret = config('services.users2.secret');
        }

        /**
        * Obtain the full list of Users from User1 Site
        * @return string
        */

        public function obtainUsers()
        {
            return $this->performRequest('GET', '/users'); 
        }

        /**
        * Create one user using the User2 service
        * @return string
        */

        public function createUser($data)
        {
            return $this->performRequest('POST', '/users', $data);
        }

        /**
        * Obtain the full list of Users from User2 Site
        * @return string
        */

        public function obtainUser($id)
        {
            return $this->performRequest('GET', "/users/{$id}");
        }
        
        /**
        * Update an instance of user2 using the User2 service
        * @return string
        */
        
        public function editUser($data, $id)
        {
        return $this->performRequest('PUT', "/users/{$id}", $data);
        }

        /**
        * Remove an existing user
        * @return Illuminate\Http\Response
        */

        public function deleteUser($id)
        {
            return $this->performRequest('DELETE', "/users/{$id}");
        }
    }