Feature: User management
	Users can register, login, logout

	Scenario: register
		Given I am logged out
		When I click the "Register" link
		And I fill out the registration form
		And I press "Submit"
		Then I should be logged in

	Scenario: login
		Given I log in
		Then I should be logged in

	Scenario: logout
		Given I log in
		Then I should be logged in
		When I click the "Logout" link
		Then I should be logged out

	Scenario: delete registered user
		Given I delete the test user