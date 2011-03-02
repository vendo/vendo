Feature: Google checkout processing
	Google checkout works

	Scenario: Process google order notification callback
		Given I have an existing order
		When a user submits a google checkout order
		Then I should receive an order notification
		And the order should be assigned the google_order_id value from the notification