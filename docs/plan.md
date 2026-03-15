# STORE.COM, ECommerce Online Market
## Tech Stack
 - PostgreSQL
 - Bootstrap
 - JQuery
 - nginx `admin.store.com`, `delivery.store.com` and `store.com`
 - Anubis (Web Firewall)
 - Composer
 - Radis

## Framworks and Libraries
 - LNO
 - ~~phpdotenv~~
 - intervention/image
 - robthree/twofactorauth
 - PHPUnit
 - verifiedjoseph/gotify-api-php

## APIs
 - ALTCHA Captcha
 - Mailtrap for mail confirmation
 - Paymob for payment
 - Gotify
 - ~~Open Maps~~

## Functional Requirments
### User
 - Confirmed Email
 - 2FA

### Admin
 - have a dash board for each section
    - Categories (CRUD)
    - Sub Categories (CRUD)
    - Products (CRUD) (How many bought it, Who boaught it (go to order details), Stock)
    - Notifications
    - Orders (Current / Delevered)
    - Returned Products
    - Returning Requests
    - list of current wishlists
    - list of current carts
    - Store Users
    - Statics for each month (top: 10 / 100)
        - Top ordered/Returned Categories/subcategories/Products/Brands
        - Top Ordered Places
        - Top Ordered Users
        - Top Pressed Products
        - Top Used Keywords in search
        - Top Success Discounts
        - Top rated orders
        - Top Wishlisted products
        - Top shared products
    - Statics for each month about
        - Total Revenue
        - Total Sold Products
        - Overall Products Rating
        - Total Returned products
        - wishlisted products
        - shared products

### Customer
 - Search products
 - filter by: Category - Subcategory - Brand - Price Range - Discounts
 - Add Wish List
 - Add to cart
 - search history
 - visited products
 - current orders
 - Delivered Orders (Able to applu a returning request)
 - Returned products
 - Rating product
 - Writing a review
 - notifications
 - monitor the order status
 - submit orders
 - share product

### Deleviry
 - get orders notifications
 - update order (Shipping - Delevering - Arrived)
