<?php

namespace repository;

class ContactRepository{


    public function recupererContacts()
    {
        $contacts = [];
        $bdd = new Bdd();
        $datebase = $bdd->getBdd();
        $req = $datebase->prepare('SELECT * FROM contact ORDER BY date DESC');
        $req->execute();
        $contactBdd = $req->fetchAll();
        foreach ($contactBdd as $contactsBdd) {
            $contacts[] = new Contact([
                'idContact' => $contactsBdd['id_contact'],
                'email' => $contactsBdd['email'],
                'objet' => $contactsBdd['objet'],
                'description' => $contactsBdd['description'],
                'date' => $contactsBdd['date']
            ]);
        }
        return $contacts;
    }

    public function envoyerMsg(Contact $contact)
    {
        $bdd = new Bdd();
        $database = $bdd->getBdd();
        $req = $database->prepare("INSERT INTO contact(email,objet,description,date) values(:email,:objet,:description,:date) ");
        $req->execute(array(
            "email" => $contact->getEmail(),
            "objet" => $contact->getObjet(),
            "description" => $contact->getDescription(),
            "date" => $contact->getDate()
        ));
    }

    public function deleteContact($idContact)
    {
        $bdd = new Bdd();
        $database = $bdd->getBdd();
        $req = $database->prepare("DELETE FROM Contact WHERE id_contact = :id_contact");
        $req->execute(array(
            "id_contact" => $idContact
        ));
    }



}