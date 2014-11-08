<?php

class CustomerController extends BaseController {

	// Get customer by their id
	public function getIndex() {
		$id = Input::get('id');
		return Customer::find($id);
	}	// end getIndex()

	// Return all customers list
	public function getAll() {
		return Customer::all();
	} 	// end getAll()

	// Add new customer
	public function postIndex() {
		if (Input::has('first_name', 'last_name', 'email')) { 	// check inputs
			$input = Input::all(); // this avoids calling Input::get() over & over
			if ($input['first_name'] == '' || $input['last_name'] == '' || $input['email'] == '') { 	// checks for empty input fields
				return Response::make('You need to fill all of the fields', 400);	// if found empty, return HTTP 400 Bad Request error
			}
			// Create new Customer
			$customer = new Customer;
			$customer->first_name = $input['first_name'];
			$customer->last_name = $input['last_name'];
			$customer->email = $input['email'];
			$customer->save();

			return $customer;
		} else  {
				return Response::make('You need to fill out all fields', 400);	// return 400 if not all inputs filled
		}
	} 	//end postIndex()

	// Search for & delete customer
	public function deleteIndex() {
		$id = Input::get('id');	// get customer by id
		$customer = Customer::find('id');	// search for customer
		$customer->delete(); 	// delete customer
		return $id;
	}	// end deleteIndex()

}	// end CustomerController
