<?php

namespace GSB\Domain;

class Family 
{
    /**
     * Family id.
     *
     * @var integer
     */
    private $id;

    /**
     * Name.
     *
     * @var string
     */
    private $name;
	
	/**
	* Type id
	*
	* @var integer
	*/
	private $typeId;
	
	

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }
}