@cart @website
Feature: Shopping cart management
	Users can add, modify and delete things in their shopping cart

	Scenario: Create Test item
		Given I create a test product

	Scenario: Add item to cart
		Given I visit the test product page
		When I follow "Add to cart"
		Then I should see the "Shopping Cart" page
		And there should be 1 item in my shopping cart

	Scenario: Remove item to cart
		Given I visit the test product page
		When I follow "Add to cart"
		Then I should see the "Shopping Cart" page
		And there should be 1 item in my shopping cart
		When I check the delete checkbox for "Test Product"
		And I press "Delete Selected / Update Quantities"
		Then there should be 0 items in my shopping cart

	Scenario: Change quantity of item to cart
		Given I visit the test product page
		When I follow "Add to cart"
		Then I should see the "Shopping Cart" page
		And there should be 1 item in my shopping cart
		When I update the quantity of "Test Product" to "2"
		And I press "Delete Selected / Update Quantities"
		Then there should be 2 items in my shopping cart

		Scenario: Delete Test item
			Given I delete the test product