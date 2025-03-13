Explanation of Relationships
Category → hasMany → Product

A category can have multiple products.
Product → belongsTo → Category

A product belongs to one category.
Product → hasMany → Cart, Wishlist, OrderProduct

A product can be in multiple carts, wishlists, and orders.
Wishlist → belongsTo → Product, Customer

A wishlist entry is linked to a specific product and customer.
Cart → belongsTo → Product, Customer

A cart entry is linked to a specific product and customer.
Customer → hasMany → Cart, Wishlist, Order, Payment

A customer can have multiple cart items, wishlists, orders, and payments.
Customer → hasManyThrough → Products through Cart

A customer can access all products they have added to their cart.
Payment → belongsTo → Customer, Order

A payment is linked to a specific customer and order.
Order → hasMany → Payment

An order can have multiple payments.
Order → belongsTo → Customer

An order belongs to one customer.
Order → hasMany → OrderProduct
An order contains multiple products.
OrderProduct → belongsTo → Product, Order
An order-product entry links a product with a specific order.