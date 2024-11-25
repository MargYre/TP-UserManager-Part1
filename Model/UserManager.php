<?php
class UserManager {
    private $db;
    
    public function __construct($db1) {
        $this->db = $db1;
    }

    public function login(User $user) {
        $req = $this->db->prepare(
            'SELECT * FROM users 
            WHERE email = :email AND password = :password'
        );
        $req->execute(array(
            'email' => $user->getEmail(),
            'password' => $user->getPassword()
        ));
        return $req->fetch();
    }

    public function create(User $user) {
        $req = $this->db->prepare(
            'INSERT INTO users (lastName, firstName, email, address, postalCode, city, password, admin)
            VALUES (:lastName, :firstName, :email, :address, :cp, :city, :password, 0)'
        );
        $req->execute(array(
            'lastName' => $user->getLastName(),
            'firstName' => $user->getFirstName(),
            'email' => $user->getEmail(),
            'address' => $user->getAddress(),
            'cp' => $user->getPostalCode(),
            'city' => $user->getCity(),
            'password' => $user->getPassword()
        ));
    }

    public function findAll() {
        $req = $this->db->prepare('SELECT * FROM users');
        $req->execute();
        return $req->fetchAll();
    }

    public final function findOne($id) {
        $req = $this->db->prepare('SELECT * FROM users WHERE id = :id');
        $req->execute(array('id' => $id));
        return $req->fetch();
    }

    public final function update(User $user) {
        $req = $this->db->prepare(
            'UPDATE users 
            SET lastName = :lastName,
                firstName = :firstName,
                email = :email,
                address = :address,
                postalCode = :cp,
                city = :city,
                password = :password
            WHERE id = :id'
        );
        $req->execute(array(
            'id' => $user->getId(),
            'lastName' => $user->getLastName(),
            'firstName' => $user->getFirstName(),
            'email' => $user->getEmail(),
            'address' => $user->getAddress(),
            'cp' => $user->getPostalCode(),
            'city' => $user->getCity(),
            'password' => $user->getPassword()
        ));
    }

    public final function delete(User $user) {
        $req = $this->db->prepare('DELETE FROM users WHERE id = :id');
        $req->execute(array('id' => $user->getId()));
    }
}
?>