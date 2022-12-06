<?php

namespace AppBundle\Entity;

class Sale
{
    private $date_add;

    private $id_order_detail;

    private $id_order;

    private $product_id;

    private $product_quantity;

    private $price;

    private $status;

    public function getDateAdd()
    {
        return $this->date_add;
    }

    public function setDateAdd(\DateTime $date_add = null)
    {
        $this->date_add = $date_add;
    }

    public function getIdOrderDetail()
    {
        return $this->id_order_detail;
    }

    public function setIdOrderDetail($id_order_detail)
    {
        $this->id_order_detail = $id_order_detail;
    }

    public function getIdOrder()
    {
        return $this->id_order;
    }

    public function setIdOrder($id_order)
    {
        $this->id_order = $id_order;
    }

    public function getProductId()
    {
        return $this->product_id;
    }

    public function setProductId($product_id)
    {
        $this->product_id = $product_id;
    }

    public function getProductQuantity()
    {
        return $this->product_quantity;
    }

    public function setProductQuantity($product_quantity)
    {
        $this->product_quantity = $product_quantity;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

}