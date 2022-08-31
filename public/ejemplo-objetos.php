<?php
/*
class Pajaro
{
    public $especie;
    public $nombre;
    public $edad = 10;
    private $dinero_en_el_banco;
    function hablar()
    {
        echo "pio pio <br>";
        echo "Me llamo " . $this->nombre . "<br>";
    }
}

$pajaro_concreto = new Pajaro();

$pajaro_concreto->especie = "Pingüino";
$pajaro_concreto->nombre = "Concreto";
$pajaro_concreto->edad = 6;
//$pajaro_concreto->dinero_en_el_banco = 1000;

$pajaro_2 = new Pajaro();
$pajaro_2->nombre = "Piolin";

$pajaro_concreto->hablar();
$pajaro_2->hablar();

echo $pajaro_2->edad;
echo "<br>";
echo $pajaro_concreto->edad;
echo "<br>";

// -- -- --

class FiguraGeometrica
{
    public $centro_x;
    public $centro_y;

    function __construct($x, $y)
    {
        echo "Se ha creado una figura! <br>";
        $this->centro_x = $x;
        $this->centro_y = $y;
    }

    function __construct1()
    {
        echo "Se ha creado una figura! <br>";
        $this->centro_x = 0;
        $this->centro_y = 0;
    }

    function __destruct()
    {
        echo "Se ha destruido una figura! <br>";
    }
}

$circulo1 = new FiguraGeometrica(10, 5);
$circulo2 = new FiguraGeometrica(10, 5);
$circulo3 = new FiguraGeometrica(5, 8);
$circulo4 = new FiguraGeometrica(10, 5);
$circulo5 = new FiguraGeometrica(10, 5);
$circulo6 = new FiguraGeometrica(10, 5);
//$circulo->centro_x = 10;
//$circulo->centro_y = 5;

class Post {
    public $id;
    public $author_id;
    public $title;
    public $content;
    public $created_at;
    public $last_access;
    public function save() {
        // Me conecto a la base de datos.
        // Mando una consulta a la base de datos para guardar
        // los datos en este post.
        // Me desconecto de la base de datos.
    }
    public function delete() {

    }
}

class Comment {
    public $id;
    public $author_id;
    public $post_id;
    public $content;
    public $created_at;
    public $last_access;
    public function save() {
        // Me conecto a la base de datos.
        // Mando una consulta a la base de datos para guardar
        // los datos en este post.
        // Me desconecto de la base de datos.
    }
    public function delete() {

    }  
}

$nuevo_post = new Post();

$nuevo_post->title = "hola mundo";

$nuevo_post->save();

// ---

class Animal {
    public $nombre;
    public function hacer_ruido() {
        echo "Soy un animal, hago ruido <br>";
    }
}

class Pez extends Animal {
    public function nadar() {
        echo "nadando por el maaar! <br>";
    }
}

class Gato extends Animal {
    public function arañar() {
        echo "voy a arañarte las cortinas! <br>";
    }
}

$mero = new Pez();
$a1 = new Animal();
$c1 = new Gato();

$mero->hacer_ruido();
$mero->nadar();

$a1->hacer_ruido();
$a1->nadar();

*/


class Model {
    public $id;
    public function save() {
        // Conectarse a la base de datos.
        // Guardar todo el contenido de la clase en un registro nuevo
    }
    public function delete() {

    }
    public function update() {

    }
    public $created_at;
    public $modified_at;

    static public function get_by_id($id) {
        echo "Voy a buscar el elemento con id = $id a la base de datos <br>";
    }
}

class Comment extends Model {
    public $content;
    public $title;
    public $post_id;
    public $user_id;
}

class Post extends Model {
    public $title;
    public $user_id;
    public $content;
}

class User extends Model {
    public $username;
    public $password;
}



$post = new Post();
$post->save();

$post2 = Post::get_by_id(4);

// -- -- --

$listaOrdenada = $lista
                    ->sort()
                    ->filter()
                    ->pluck("title")
                    ->toUpperCase();