<?php
class Usuari {
    private $nom;
    private $email;
    private $clau;

    public function __construct($nom, $email, $clau=null) {
        $this->nom = $nom;
        $this->email = $email;
        $this->clau = $clau;
    }
    public function saluda() {
        return "Hola, sóc $this->nom i el meu email és $this->email";
    }

    public function validar($usuari, $clau) {
        return $this->nom === $usuari && $this->clau === $clau;
    }

    public function getNom() {
        return $this->nom;
    }
}
