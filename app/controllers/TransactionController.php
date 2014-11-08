<?php

class TransactionController extends BaseController {

  // Get all transactions for a user
  public function getIndex() {
    $id = Input::get('id');
    return User::find($id)->transactions;
  }  // end getIndex()

  // Create transaction
  public function postIndex() {
    if (Input::has('name', 'amount')) {  // check if all info provided
      $input = Input::all();  // if so, assign to $input
      if ($input['name'] == '' || $input['amount'] == '') { // check for emptiness
        return Response::make('You need to fill all fields', 400);  // if empty, return 400
      }
      // Create new Transaction
      $transaction = new Transaction;
      $transaction->name = $input['name'];
      $transaction->amount = $input['amount'];

      // Assign to appropriate Customer
      $id = $input['customer_id'];  // search for customer by id
      User::find($id)->transactions->save($transaction);  // save to customer via id
      return $transaction;
    } else {
        return Response::make('You need to fill all fields', 400); // if not all filled, return 400
    }
  }  // end postIndex()

  // Delete transaction
  public function deleteIndex() {
    $id = Input::get('id');
    $transaction = Transaction::find($id);
    $transaction->delete();

    return $id;
  }  // end deleteIndex()

}  // end TranscationController
