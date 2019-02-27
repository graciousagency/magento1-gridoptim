# Gracious Gridoptim #
Magento loads a customer grid on making a new order from the admin section. If you are creating a new order from an existing order then the customer is already known and the grid should not be shown then.

This is running in production with various shops.

## The Why ##
One of our customers complained that creating a new order from an existing order in the admin section of a Magento 1 shop was taking a considerable amount of time. We're talking more than 30s.

## The How ##
This module rewrites `sales_order_create_customer_grid` to `Gracious_Gridoptim_Block_Adminhtml_Sales_Order_Create_Customer_Grid` and breaks out of the `__construct` when a customer and it's id can be retrieved using `Mage::getSingleton('adminhtml/session_quote')->getCustomer();`

## The Result ##
Load times improved by over 30 seconds for that shops which has >720K unique customers in the `customer_entity` table. The page now loads within seconds.
