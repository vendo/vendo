Feature: Shopping cart management
	Users can add, modify and delete things in their shopping cart

	Scenario: Add item to cart
		Given I am on /product/view/195
		When I click the "Add to cart" link
		Then I should see the "Shopping Cart" page
		And there should be 1 item in my shopping cart