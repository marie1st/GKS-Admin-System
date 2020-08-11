<?php

class UserController extends Controller{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function dashboard(){
        //
    }
}