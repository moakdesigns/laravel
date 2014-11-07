<?php

class CustomerController extends BaseController {

	// Get customer by their id
	public function getIndex() {
		$id = Input::get('id');
		return Customer::find($id);
	}
	// Return all customers list
	public function getAll() {
		return Customer::all();
	}
	// Add new customer
	public function postIndex() {
		// checks if any input are empty
		if (Input::has('first_name', 'last_name', 'email')) {
			$input = Input::all(); // this avoids calling Input::get() over & over
			
		}
	}
}
