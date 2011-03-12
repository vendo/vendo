@billing @website
Feature: Shopping cart checkout
	In order for users to get stuff, they have to pay for it

	Scenario: Checkout fails with no data
		Given there are items in my cart
		When I go to /cart/index
		And I click the "Checkout" link
		Then I should see "Checkout goes here"
		When I press "Submit Order"
		Then I should see "Checkout goes here"