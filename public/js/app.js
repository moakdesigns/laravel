// declare module
var app = angular.module('app', [ 'ngRoute' ]);

// define routing
app.config(function configure($routeProvider) {
  $routeProvider
      .when('/',  { controller: 'CustomersController', templateUrl: './templates/customers.html'})
      .when('/customer/:id', { controller: 'CustomerController', templateUrl: './templates/customer.html' })
      .otherwise({ redirect: '/'});
});

// factory is a function that returns a service
app.factory('Data', function Data($http) {  // first parameter is service's name & second one is a function
  return {  // return the service as an object w/ all methods used in controllers

    // Customers
    getCustomers: function getCustomers() { return $http.get('/customers/all'); }, // get all customers to display in list
    getCustomer: function getCustomer(id) { return $http.get('/customer?id=' + id); },  // get customer by id
    addCustomer: function addCustomer(data) { return $http.post('/customers', data); }, // add customer to database
    removeCustomer: function removeCustomer(id) { return $http.delete('/customer?id=' + id); }, // delete customer

    // Transactions
    getTransactions: function getTransactions(id) { return $http.get('/transactions?id=' + id); },  // get all transactions
    addTransaction: function addTransaction(data) { return $http.post('/transactions', data); },  // add transaction
    removeTransaction: function removeTransaction(id) { return $http.delete('/transactions?id=' + id); }  // delete transaction
  }
});
