<?php
class SiteController extends BaseController {

    	public $restful = true;
     	
        public function authLogin(){

            //$remember = isset(Input::get('remember')) ? true : null;
            $rules = array(
                'email'    => 'required|email',
                'password' => 'required|alphaNum|min:5'
            );

            $validator = Validator::make(Input::all(), $rules);
            if ($validator->fails()) {
                return Redirect::to('/login')
                    ->withErrors($validator)
                    ->withInput(Input::except('password'));
            } else {
                
                  if(Auth::attempt(array(
                    'email' => Input::get('email'),
                    'password' => Input::get('password')
                    ),false)
                  ){
                         return Redirect::to('store/dashboard');
                  
                  }else{

                         return Redirect::to('/login')->with('success', 'Email or password incorect'); 
                  
                  }

            }

        }

        public function authLogout()
        {
            Auth::logout();
            //Session::flush();
            return Redirect::to('/');
        }

}
?>