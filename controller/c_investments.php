<?php



class C_Investments
{

 
    private $broker;
    private $cat;
    private $type;
    private $open; 
    private $expery;
    private $rateType;
    private $rate;
    private $amount;
    private $desc;
    private $idac;





    /**
     * Get the value of broker
     */
    public function getBroker()
    {
        return $this->broker;
    }

    /**
     * Set the value of broker
     */
    public function setBroker($broker): self
    {
        $this->broker = $broker;

        return $this;
    }




    /**
     * Get the value of cat
     */
    public function getCat()
    {
        return $this->cat;
    }

    /**
     * Set the value of cat
     */
    public function setCat($cat): self
    {
        $this->cat = $cat;

        return $this;
    }



    /**
     * Get the value of type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     */
    public function setType($type): self
    {
        $this->type = $type;

        return $this;
    }



    
    /**
     * Get the value of open
     */
    public function getOpen()
    {
        return $this->open;
    }

    /**
     * Set the value of open
     */
    public function setOpen($open): self
    {
        $this->open = $open;

        return $this;
    }




    /**
     * Get the value of expery
     */
    public function getExpery()
    {
        return $this->expery;
    }

    /**
     * Set the value of expery
     */
    public function setExpery($expery): self
    {
        $this->expery = $expery;

        return $this;
    }





    /**
     * Get the value of rateType
     */
    public function getRateType()
    {
        return $this->rateType;
    }

    /**
     * Set the value of rateType
     */
    public function setRateType($rateType): self
    {
        $this->rateType = $rateType;

        return $this;
    }





    /**
     * Get the value of rate
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * Set the value of rate
     */
    public function setRate($rate): self
    {
        $this->rate = $rate;

        return $this;
    }




    /**
     * Get the value of amount
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set the value of amount
     */
    public function setAmount($amount): self
    {
        $this->amount = $amount;

        return $this;
    }





    /**
     * Get the value of desc
     */
    public function getDesc()
    {
        return $this->desc;
    }

    /**
     * Set the value of desc
     */
    public function setDesc($desc): self
    {
        $this->desc = $desc;

        return $this;
    }





    /**
     * Get the value of idac
     */
    public function getIdac()
    {
        return $this->idac;
    }

    /**
     * Set the value of idac
     */
    public function setIdac($idac): self
    {
        $this->idac = $idac;

        return $this;
    }











}