<?php

namespace GSB\Domain;

class Practitioner 
{
    /**
     * Practitioner id.
     *
     * @var integer
     */
    private $id;

    /**
     * Type id.
     *
     * @var integer
     */
    private $typeId;

    /**
     * Name.
     *
     * @var string
     */
    private $name;

    /**
     * First name.
     *
     * @var string
     */
    private $firstName;

    /**
     * Address.
     *
     * @var string
     */
    private $address;

    /**
     * Zip code.
     *
     * @var integer
     */
    private $zipCode;

    /**
     * City.
     *
     * @var string
     */
    private $city;
	
	/**
	* Notoriety coefficient
	*
	* @var float
	*/
	private $notorietyCoefficient;

    /**
     * Family.
     *
     * @var \GSB\Domaine\Family
     */
    private $family;

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

    public function getFirstName() {
        return $this->firstName;
    }

    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    public function getAddress() {
        return $this->address;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function getZipCode() {
        return $this->zipCode;
    }

    public function setZipCode($zipCode) {
        $this->effects = $zipCode;
    }

    public function getCity() {
        return $this->city;
    }

    public function setCity($city) {
        $this->city = $city;
    }

    public function getNotorietyCoefficient() {
        return $this->notorietyCoefficient;
    }

    public function setNotorietyCoefficent($notorietyCoefficient) {
        $this->samplePrice = $notorietyCoefficient;
    }

    public function getFamily() {
        return $this->family;
    }

    public function setFamily($family) {
        $this->family = $family;
    }
}