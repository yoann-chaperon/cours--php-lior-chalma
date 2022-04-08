<?php
/* interface Travailleur 
{
    public function travailler();
} */

abstract class humain {
    public $nom;
    public $prenom;
    protected $age; // pour hériter

    public function __construct($nom, $prenom, $age)
    {
    $this->nom = $nom;
    $this->prenom = $prenom;
    $this->setAge($age);
    }
    
    abstract public function travailler();

    public function setAge($age) 
    {/*modifie l'age*/
        if(is_int($age) && $age >= 1 && $age <= 120){
            $this->age = $age;
        } else {
            throw new Exception("l'âge d'un employé devrait être un entier entre 1 et 120 !");
        }
    }
    public function getAge() 
    {/* renvoi l'age*/
        return $this->age;
    } 
}
class Employe extends humain
{
    public function travailler()
    {
        return "Je travaille !";
    }
    public function presentation() 
    {
        var_dump("Salut je suis $this->nom $this->prenom et j'ai $this->age ans");
    }
};
class Patron extends Employe
{
    public $voiture; 

    public function __construct($prenom, $nom, $age, $voiture)
    {
        parent::__construct($prenom, $nom, $age);

        $this->voiture = $voiture;
    }

    public function presentation() 
    {
        var_dump("Bonjour je suis $this->nom $this->prenom et j'ai $this->age ans et je suis le patron");
    }
    
    public function rouler()
    {
        var_dump("Bonjour, je roule avec ma $this->voiture ! et j'ai $this->age ans");
    }
    public function travailler()
    {
        return "je suis le patron et je bosse !!";
    }
}

class Etudiant extends humain
{
    public function travailler()
    {
        return "je suis étudiant et je révise !";
    }
}

$etudiant = new Etudiant("noe", "chaperon", 10, "velo");
$employe1 = new Employe("chaperon", "yoann", 41);
$employe1->setAge(90);
$employe1->presentation();

$employe2 = new Employe("gobard", "aurelie", 40);
$employe2->presentation();

$patron = new Patron("morice", "dupont", 49, "CV2");
$patron->presentation();
$patron->rouler();


faireTravailler($employe1);
faireTravailler($patron);
faireTravailler($etudiant);
function faireTravailler(humain $objet) 
{
    var_dump("travail en cours : {$objet->travailler()}");
}