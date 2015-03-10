# Account Service

A micro service to manage accounts

## API

Here is the list of all methods provided by this API.

### Create account

* method: **POST**
* URL: _/account_
* parameters: _username, credentials_

Create an account with the given username and credentials.

### Get account

* method: **GET**
* URL: _/account/{identifier}_
* URL: _/account/{username}/{credentials}_

Retrieve all informations about an account. Can be used to validate a user.
