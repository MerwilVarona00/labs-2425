<?php
/**
 * This class is intentionally written as incomplete; students should be able to provide the missing properties and methods to this class
 */
class Profile
{
    protected $first_name;
    protected $middle_name;
    protected $last_name;
    protected $email;
    protected $contact_number;
    protected $address;
    protected $favorite_quote;

    // Constructor to initialize the object
    public function __construct($last_name, $first_name, $middle_name)
    {
        $this->last_name = $last_name;
        $this->first_name = $first_name;
        $this->middle_name = $middle_name;
    }

    // Method to get the full name
    public function getCompleteName($format = '{last}, {first} {middle}')
    {
        $full_name = $format;
        $full_name = str_replace('{last}', $this->getLastName(), $full_name);
        $full_name = str_replace('{first}', $this->getFirstName(), $full_name);
        $full_name = str_replace('{middle}', $this->getMiddleName(), $full_name);
        return $full_name;
    }

    // Getters and Setters for first, middle, and last name
    protected function getLastName()
    {
        return $this->last_name;
    }

    protected function getFirstName()
    {
        return $this->first_name;
    }

    protected function getMiddleName()
    {
        return $this->middle_name;
    }

    // Setter and Getter for email
    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    // Setter and Getter for address
    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function getAddress()
    {
        return $this->address;
    }

    // Setter and Getter for favorite quote
    public function setFavoriteQuote($quote)
    {
        $this->favorite_quote = $quote;
    }

    public function getFavoriteQuote()
    {
        return $this->favorite_quote;
    }
}

?>
