<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Response;
    use App\Traits\ApiResponser;
    use Illuminate\Http\Request;
    use DB;
    use App\Services\User2Service;

    Class User2Controller extends Controller {

        use ApiResponser;
        /**
         * 
         * @var User2Service
         */
        // private $request;

        public $user2Service;

        /*
        *
        * @return void 
        */

        public function __construct(User2Service $user2Service){
            $this->user2Service = $user2Service;
        }
        

        /**
         * Return the list of users
         * @return Illuminate\Http\Response
         */

        public function index(){
          return $this->successResponse($this->user2Service->obtainUsers());
        }

        public function add(Request $request)
        {
            return $this->successResponse($this->user2Service->createUser($request->all(), Response::HTTP_CREATED));
        }

        /**
        * Obtains and show one user
        * @return Illuminate\Http\Response
        */
        
        public function show($id)
        {
            return $this->successResponse($this->user2Service->obtainUser($id));
        }

        /**
        * Update an existing author
        * @return Illuminate\Http\Response
        */

        public function update(Request $request, $id)
        {
            return $this->successResponse($this->user2Service->editUser($request->all(), $id));
        }

        /**
        * Remove an existing user
        * @return Illuminate\Http\Response
        */

        public function delete($id)
        {
            return $this->successResponse($this->user2Service->deleteUser($id));
        }
    }
?>
