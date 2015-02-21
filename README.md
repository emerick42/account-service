# Account Service

A micro service to manage accounts

## API

Here is the list of all methods provided by this API.

### Create account

* method: **POST**
* URL: _/account_
* parameters: _username_ _credentials_

Create an account with the given username and credentials.

### Get account

* method: **GET**
* URL: _/account/{username}/{credentials}_

Can be used to validate a user.
