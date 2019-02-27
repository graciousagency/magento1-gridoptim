<?php

/**
 * Magento loads a customer grid on making a new order from the admin section.
 * If you are creating a new order from an existing order then the customer
 * is already known and the grid should not be shown then.
 *
 * Class Gracious_Gridoptim_Block_Adminhtml_Sales_Order_Create_Customer_Grid
 */
class Gracious_Gridoptim_Block_Adminhtml_Sales_Order_Create_Customer_Grid extends Mage_Adminhtml_Block_Sales_Order_Create_Customer_Grid
{

    /**
     * Gracious_Gridoptim_Block_Adminhtml_Sales_Order_Create_Customer_Grid constructor.
     */
    public function __construct()
    {
        $customer = Mage::getSingleton('adminhtml/session_quote')->getCustomer();
        if ($customer && $customer->getId()) {
            return;
        }
        Mage_Adminhtml_Block_Sales_Order_Create_Customer_Grid::__construct();
    }
}
			