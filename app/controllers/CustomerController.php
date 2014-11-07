<?php
//
class CustomerController extends BaseController {

	public function getIndex() {
		$id = Input::get('id');
		return Customer::find($id);
	}

	public function getAll() {
		return Customer::all();
	}

	public function postIndex() {
		if (Input::has('first_name', 'last_name', 'email')) {
			$input = Input::all();
		}
	}
}
