<?php
class User {
    private $id;
    private $email;
    private $password;
    private $firstName;
    private $lastName;
    private $address;
    private $postalCode;
    private $city;

    // Getters
    public function getId() {
        return $this->id;
    }
    public function getEmail() {
        return $this->email;
    }
    public function getPassword() {
        return $this->password;
    }
    public function getFirstName() {
        return $this->firstName;
    }
    public function getLastName() {
        return $this->lastName;
    }
    public function getAddress() {
        return $this->address;
    }
    public function getPostalCode() {
        return $this->postalCode;
    }
    public function getCity() {
        return $this->city;
    }

    // Setters avec validations
    public final function setId($id) {
        $this->id = $id;
    }
    public function setEmail($email) {
        $this->email = $email;
    }
    public function setPassword($password) {
        $this->password = $password;
    }
    public function setFirstName($firstName) {
        if (is_string($firstName)) {
            $this->firstName = $firstName;
        }
    }
    public function setLastName($lastName) {
        if (is_string($lastName)) {
            $this->lastName = $lastName;
        }
    }
    public function setAddress($address) {
        $this->address = $address;
    }
    public function setPostalCode($postalCode) {
        $this->postalCode = $postalCode;
    }
    public function setCity($city) {
        $this->city = $city;
    }

    //  Hydrater un objet, c'est simplement assigner à ses attributs des valeurs
    //(autant que nécessaire pour fonctionner).
    public function hydrate(array $donnees) {
        foreach($donnees as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }
}
?>