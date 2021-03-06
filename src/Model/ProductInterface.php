<?php

/*
 * This file is part of the Yeriki Simple Shopping Cart package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Yeriki\SimpleShoppingCartBundle\Model;

use Doctrine\ORM\Mapping as ORM;

use Gedmo\Mapping\Annotation as Gedmo;

/**
 * ProductInterface
 *
 * Represents an object that can be purchased, i.e. added to a Shopping Cart
 *
 * @author Tom Haskins-Vaughan <tom@tomhv.uk>
 * @since  0.2.0
 */
interface ProductInterface
{
    /**
     * Get sku
     *
     * Get a unique identifier for this Product.  Commonly, this is a
     * Stock Keeping Unit or SKU.
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.3.0
     *
     * @return string
     */
    public function getSku();

    /**
     * Get name
     *
     * A name to display on Product page or in Cart
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.3.0
     *
     * @return string
     */
    public function getName();

    /**
     * Get the price for this Product in the current context
     *
     * This may be a price stored on the Product itself, i.e. Product::\$price
     * or it might be set on the Product before it is added to the Cart, .i.e
     * Product::setPrice().  This all depends on how complicated pricing is in
     * the application.
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.3.0
     *
     * @return Money
     */
    public function getPrice();

    /**
     * Get the quantity for this Product in the current context
     *
     * This may be a quantity stored on the Product itself, i.e.
     * Product::\$quantity or it might be set on the Product before it is added
     * to the Cart, .i.e Product::setQuantity().  This all depends on how
     * complicated inventory is in the application.
     *
     * @author Tom Haskins-Vaughan <tom@tomhv.uk>
     * @since  0.3.0
     *
     * @return \Quantity\Quantity
     */
    public function getQuantity();
}
