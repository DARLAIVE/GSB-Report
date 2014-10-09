<?php

namespace GSB\Domain;

use Symfony\Component\Security\Core\User\UserInterface;

class Visitor implements UserInterface
{
    /**
     * Visitor id.
     *
     * @var integer
     */
    private $visitor_id;

    /**
     * Visitor last name.
     *
     * @var string
     */
    private $visitor_last_name;
	
	/**
     * Visitor first name.
     *
     * @var string
     */
    private $visitor_first_name;
	
	/**
     * Visitor address.
     *
     * @var string
     */
    private $visitor_address;
	
	/**
     * Visitor zip code.
     *
     * @var integer
     */
    private $visitor_zip_code;
	
	/**
     * Visitor city.
     *
     * @var string
     */
    private $visitor_city;
	
	/**
     * Visitor hiring date.
     *
     * @var string
     */
    private $visitor_hiring_date;
	
	/**
     * Visitor user name.
     *
     * @var string
     */
    private $visitor_user_name;

    /**
     * Visitor password.
     *
     * @var string
     */
    private $password;

    /**
     * Salt that was originally used to encode the password.
     *
     * @var string
     */
    private $salt;

    /**
     * Role.
     * Values : NULL.
     *
     * @var string
     */
    private $role;
	
	/**
     * Visitor type.
     *
     * @var string
     */
    private $visitor_type;

	/**
     * @inheritDoc
     */
    public function getVisitorId() {
        return $this->visitor_id;
    }

	/**
     * @inheritDoc
     */
    public function setVisitorId($visitor_id) {
        $this->visitor_id = $visitor_id;
    }
	
	/**
     * @inheritDoc
     */
    public function getVisitorLastName() {
        return $this->visitor_last_name;
    }

	/**
     * @inheritDoc
     */
    public function setVisitorLastName($visitor_last_name) {
        $this->visitor_last_name = $visitor_last_name;
    }
	
	/**
     * @inheritDoc
     */
    public function getVisitorFirstName() {
        return $this->visitor_first_name;
    }

	/**
     * @inheritDoc
     */
    public function setVisitorFirstName($visitor_first_name) {
        $this->visitor_first_name = $visitor_first_name;
    }
	
	/**
     * @inheritDoc
     */
    public function getAdress() {
        return $this->visitor_address;
    }

	/**
     * @inheritDoc
     */
    public function setAdress($visitor_address) {
        $this->visitor_address = $visitor_address;
    }
	
	/**
     * @inheritDoc
     */
    public function getZipCode() {
        return $this->visitor_zip_code;
    }

	/**
     * @inheritDoc
     */
    public function setZipCode($visitor_zip_code) {
        $this->visitor_zip_code = $visitor_zip_code;
    }
	
	/**
     * @inheritDoc
     */
    public function getCity() {
        return $this->visitor_city;
    }

	/**
     * @inheritDoc
     */
    public function setCity($visitor_city) {
        $this->visitor_city = $visitor_city;
    }
	
	/**
     * @inheritDoc
     */
    public function getHiringDate() {
        return $this->visitor_hiring_date;
    }

	/**
     * @inheritDoc
     */
    public function setHiringDate($visitor_hiring_date) {
        $this->visitor_hiring_date = $visitor_hiring_date;
    }

    /**
     * @inheritDoc
     */
    public function getVisitorName() {
        return $this->visitor_user_name;
    }

    public function setVisitorName($visitor_user_name) {
        $this->visitor_user_name = $visitor_user_name;
    }

    /**
     * @inheritDoc
     */
    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    /**
     * @inheritDoc
     */
    public function getSalt()
    {
        return $this->salt;
    }

    public function setSalt($salt)
    {
        $this->salt = $salt;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function setRole($role) {
        $this->role = $role;
    }
	
	/**
     * @inheritDoc
     */
    public function getVisitorType() {
        return $this->visitor_type;
    }

	/**
     * @inheritDoc
     */
    public function setVisitorType($visitor_type) {
        $this->visitor_type = $visitor_type;
    }