Feature: Shopping cart management
	Users can add, modify and delete things in their shopping cart

	Scenario: Add item to cart
		Given I am on /product/view/195
		When I click the "Add to cart" link
		Then I should see the "Shopping Cart" page
		And there should be 1 item in my shopping cart

	Scenario: Remove item to cart
		Given I am on /product/view/195
		When I click the "Add to cart" link
		Then I should see the "Shopping Cart" page
		And there should be 1 item in my shopping cart
		When I check "delete[195]"
		And I press "Delete Selected / Update Quantities"
		Then there should be 0 items in my shopping cart

	Scenario: Change quantity of item to cart
		Given I am on /product/view/195
		When I click the "Add to cart" link
		Then I should see the "Shopping Cart" page
		And there should be 1 item in my shopping cart
		When I fill in "new_quantity[195]" with "2"
		And I press "Delete Selected / Update Quantities"
		Then there should be 2 items in my shopping cart