# Account Service

A micro service to manage accounts

## API

Here is the list of all methods provided by this API.

### Create account

* method: **POST**
* URL: _/account_
* parameters: `{"account":{"username":"user1","credentials":"3NC0D3DP455W0RD","domain":"default"}}`

Create an account with the given username and credentials.

### Get account

* method: **GET**
* URL: _/account/{identifier}_
* URL: _/account/{identifier}/{credentials}_

Retrieve all informations about an account. Can be used to validate a user.
