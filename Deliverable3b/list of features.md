# Implemented Features
1. A user can view his profile
2. A user can update his profile
3. A user can create a profile to become a seller
4. A seller can view his profile
5. A seller can update his profile
6. A seller can stop being a seller
7. A seller can create an inventory item
8. A seller can delete an inventory item
9. A seller can update an inventory item
10. A seller can view all inventory items
11. A seller can view an inventory item details
12. A seller can list items for sale as a listing
13. A seller can remove items for sale
14. A seller can create an auction for an item
15. A seller can update an auction
16. A seller can delete an auction
17. A seller can view an auction
18. A user can view all listed items
19. A user can filter listed items options by color (decided no sizing)
20. A user can view listed item details
21. A user can add a listed item to the cart 
22. A user can remove a listed item from the cart
23. A user can edit a listed item in the cart
24. A user can view their listed items in the cart
25. A user can add a listed item to the wishlist
26. A user can remove a listed item from the wishlist
27. A user can move a listed item from the wishlist to cart
28. A user can view their listed items in the wishlist
29. A user can view available auctions
30. A user can view auction details
31. A user can bid on an auction
32. A user can instantly buy an item at the buy now price of an auction
33. A user can purchase clothing
34. A user can view purchase history


# Features that have yet to be implemented
1. A seller can modify items for sale
	
  We did not think of it. We will implement after the deliverable. For now, the inventory and the listings are combined into one table.

2. A user can leave reviews after buying along with a picture
3. A seller can review their ratings, but if under 2 out of 5 stars the seller will be temporarily banned
	
  It did not meet the project scope. We were already the minimum amount of features when we got to it. We would also need to create another table, along with a trigger for the ban, or a check constraint, bringing a few more complications.
	
4. A user can retract a bid on an auction
	
  Realistically, you should not be able to retract a bid. It is also hard to keep track of more than one past bidder.

5. A seller receives a report when one of the items listed under him was bought
A seller can view their makings in a specific time stamp
	
  We forgot about these features. The quantity of items listed under a listing changes after someone buys. The seller should be able to keep track of their items like that instead. 

6. A seller can cancel a purchase
	
  Like the auction, this should be manually handled by the seller if ever a user wants a refund or cancellation. We can later implement the purchase history for the seller, and show the email of whoever bought their items. This also is not entirely a feature encoded into the web app.

7. A user can generate colors for their outfits
	
  The color api got deleted. https://x-colors.herokuapp.com/api/
