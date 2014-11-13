// define Customer Controller
app.controller('CustomersController', function CustomersController($scope, Data) {  // second parameter is the constructor function for controller, $scope is link between DOM & controller, second one is the service from the factory
  Data.getCustomers().success(parseCustomers);
  function parseCustomers(data) { $scope.customers = data; }  // function to parse incoming data to show on page; no need for 'innerHTML'/'appendChild()' code

  // Add New Customers
  $scope.newCustomer = { name: '', email: '' }; // object in scope to hold new customer data; avoids accessing DOM
  $scope.addCustomer = function addCustomer() { // add customer
    var names = $scope.newCustomer.name.split(' '); // split name into first and last
    Data.addCustomer({ first_name: names[0], last_name: names[1], email: $scope.newCustomer.email })  // call appropriate function from factory w/ data from $scope
    .success(customerAddSuccess).error(customerAddError);
  }

  // Success Callback
  function customerAddSuccess(data) { // data argument holds the response's text
    $scope.error = null;  // clear $scope error
    $scope.customers.push(data);  // push newly added customer to $scope.customers
    $scope.newCustomer = { name: '', email: '' }; // set $scope.newCustomer to inital state to clear inputs
  }

  // Error Callback
  function customerAddError(data) { $scope.error = data; }  // set the $scope.error to text received from server


  // Remove Customers
  

})  // end app.controller
