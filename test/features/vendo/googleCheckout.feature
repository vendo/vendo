Feature: Google checkout processing
	Google checkout works

	Scenario: Process google order notification callback
		Given I have an existing google checkout order
		When a user submits a google checkout order
		Then I should receive an order notification
		And the order should be assigned the google_order_id value from the notification

	Scenario: Google checkout returns a redirect URL when an order is submitted
		Given I have an existing google checkout order
		When I submit the order
		Then it should return a redirection URL