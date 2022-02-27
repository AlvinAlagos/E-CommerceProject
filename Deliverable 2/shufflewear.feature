Feature: Checkout
    In order to buy clothes
    As a customer
    I want to be able to buy server clothes

    Scenario: Buying multiple items
        Given I have multiple items in my cart
        When I go to checkout
        Then I should see the same amount of items


Feature: Filter Clothing
    In order to chose clothes to my liking
    As a customer
    I want to be able to filter clothes to specifics

    Scenario: Find specific size and color in clothes
        Given I need a specific size 
        And I need a specific color
        When I select specific size 
        And I select color
        Then I should see items only associated with the criteria


Feature: View clothing details
    In order to learn more about product
    As a customer
    I want to be able to view the items description

    Scenario: Learning more about an item
        Given I want to know more about an item
        When I got to the items page
        Then I should see its description
        And more information


Feature: Wishlist
    In order to remember an item i would like to buy
    As a user
    I want to be a able to save the item

    Scenario: Saving an item for a later on
        Given I have an item i want to buy in the future
        And I want to save it
        When I go to my wishlist
        Then I should be able to see it


Feature: Add clothing to the cart
    In order to add clothing to the cart
    As a customer
    I need to choose a listing from the any clothing pages and add it to cart

    Scenario: Adding a shirt to the cart
        Given I am on a page with clothing
        And I want to purchase a shirt from the page
        When I select the shirt
        And I select the amount
        And I click Add to Cart
        Then the shirt appears in the cart
        And the total price of the cart increases


Feature: Remove clothing from the cart
    In order to remove clothing from the cart
    As a customer
    I need to remove the item from the cart and it is gone from the cart

    Scenario: Removing pants from the cart
        Given there are pants in the cart
        And I no longer want to buy it
        When I click Delete next to the item
        Then the pants dissappears from the cart
        And the total price of the cart decreases


Feature: Move an item from wishlist to cart
    In order to move an item from the wishlist to the cart
    As a customer
    I need to select an item from the wishlist and get it in the cart

    Scenario: Moving hoodie from wishlish to cart
        Given there is hoodie in the wishlist
        And I want to buy it now
        When I go to the wishlish page
        And I click on Transfer to cart
        Then the hoodie dissappears from the wishlist
        And the hoodie appears in the cart
        And the total price of the cart increases


Feature: Auction bidding
    In order to bid on an auction
    As a customer
    I need choose an auction on the auctions page and increment the price

    Scenario: Bidding on a necklace
        Given there is an ongoing auction for a necklace
        When I go to the auctions page
        And I select the necklace auction
        And I click Bid
        Then the bid increases by the set increment


Feature: Auction bid retraction
    In order to to retract a bid on an auction
    As a customer
    I need find the auction I bid on, on the auctions page, and retract my bid

    Scenario: Retracting bid on bracelet
        Given there is an ongoing auction for a bracelet
        And the current bid is my bid
        When I go the auctions page
        And I select the bracelet auction
        And I click Retract Bid
        Then the bid decreases to the previous increment


Feature: Purchase history
    In order to view my previous history
    As a customer
    I need to go to the history page and get a list of my previous purchases

    Scenario: viewing purchases
        Given I have made previous purchases
        When I go the History page
        Then I see my previous purchases

    Scenario: viewing purchases with no purchases
        Given I have made previous purchases
        When I go the History page
        Then I see message about no purchases


Feature: Reviews
    In order to leave feedback on an item
    As a user
    I want to be to leave a review 

    Scenario: leaving bad review
        Given I had a bad experience with an item
        And I want to give feedback
        When I go to the items page
        Then I should be able to leave a review
        And I can rate it out of 5 stars

    Scenario: leaving good review
        Given I had a good experience with an item
        And I want to give feedback
        When I go to the items page
        Then I should be able to leave a review
        And I can rate it out of 5 stars


Feature: Host Auction
    In order to sell valuables
    As a seller
    I want to be able to host an auction

    Scenario: Selling a rare piece of clothing
        Given I have a limited edition piece of clothing
        When I put it up for biddings
        Then customers will be able to bid for it


Feature: Auction deletion
    In order to delete an auction
    As a seller
    I need to find the auction on my auctions page and delete it

    Scenario: Deleting auction for backpack
        Given I have an ongoing auction for backpack
        When I go to my auctions
        And I click on Delete for the auction 
        Then the auction for the backpack no longer exists
        And is removed from the auction listings


Feature: Rating review
    In order to review my ratings
    As a seller
    I need to go to the ratings page and get ratings for my listings

    Scenario: Viewing with good ratings
        Given I have one or more listings
        When I go to the ratings page
        Then I see my overall ratings
        And I see my rating for every listing

    Scenario: Viewing with bad ratings
        Given I have one or more listings
        In total, ratings are less than 2 out of 5 stars
        When I log in
        Then I get banned for a certain amount of time
        And I get unbanned after that time
        And my listings dissappear


Feature: Bought Items Report
    In order to receive a report on bought items
    As a seller
    I need to go to the orders page and get information on bought items

    Scenario: Viewing report 
        Given I have clothing listings
        And I have listings with purchases
        When I go to the orders page
        Then I see information on items that were bought

    Scenario: Viewing report with no purchases
        Given I have clothing listings
        And I have no listings with purchases
        When I go to the orders page
        Then I see message about no purchases


Feature: Purchase cancellation
    In order to cancel a purchase
    As a seller
    I need to search the individual purchase and cancel it

    Scenario: Cancelling cape purchase
        Given there is an existing purchase for a cape
        And the purchase has not been completed
        When I go to the orders page
        And I find the purchase for the cape
        And I click on Cancel 
        Then the purchase for the cape no longer exists


Feature: Purchases within certain Time Frame (filter)
    In order to view purchases within a certain time frame
    As a seller
    I need to specify which time frame to view and see purchases

    Scenario: Finding purchases in the last 2 years
        Given I am on the orders page
        When I select today from 2 years ago for the first date
        And today as the second date
        And I click Search
        Then I see purchases made from 2 years ago to today


Feature: Profile Update
    In order to update my profile
    As a seller
    I want to change my information 

    Scenario: Change profile picture
        Given I am no longer happy with my profile picture
        And I want to change it
        When I go to update profile
        Then I upload a new profile picture


Feature: Post items for sale
    In order to show what i am selling
    As a seller
    I want to be able to display my products

    Scenario: Add new product to listing
        Given I have a new product
        And I want to list it for sale
        When I put it up on the market
        Then customers will be able to purchase them


Feature: Remove item for sale
    In order to remove an item off for sale
    As a seller
    I want to be able to remove specific items for sale

    Scenario: Remove product from listing
        Given I do not sell a specific item anymore  
        And I want to remove it for sale
        When I delete it off the market
        Then customers won't be able to see it anymore


Feature: Modify items for sale
    In order to edit an item on the market
    As a seller
    I want to be able change information about the item

    Scenario: Change sizes available
        Given I have a new sizes for an item 
        And I want to add it to available sizes
        When I edit it
        Then customers should see the new available size