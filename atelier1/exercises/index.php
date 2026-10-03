<?php

$a = 10;
$b = 3;

$somme = $a + $b;
$difference = $a - $b;
$produit = $a * $b;
$quotient = $a / $b;
$reste = $a % $b;
$carre = $a * $a;
$moyenne = ($a + $b) / 2;

echo "Somme : $somme<br>";
echo "Difference : $difference<br>";
echo "Produit : $produit<br>";
echo "Quotient : $quotient<br>";
echo "Reste : $reste<br>";
echo "Carre de a : $carre<br>";
echo "Moyenne : $moyenne<br>";

?>

<?php

$prenom = "Ghada";
$nom = "Derbeli";
$cours = "developpement web cote serveur";

$phrase = "Bonjour " . $prenom . " " . $nom . ", bienvenue dans le cours de " . $cours . ".";

echo $phrase;

?>

<?php

$note = 14;

if ($note < 10) {
    echo "Ajourne";
} else if ($note < 12) {
    echo "Passable";
} else if ($note < 14) {
    echo "Assez bien";
} else if ($note < 16) {
    echo "Bien";
}

?>
// 
<?php

for ($i = 1; $i <= 20; $i++) {
    echo $i . "<br>";
}

?> 
<?php

for ($i = 1; $i <= 20; $i++) {
    if ($i % 2 == 0) {
        echo $i . "<br>";
    }
}

?> 
<?php

for ($i = 1; $i <= 10; $i++) {
    echo "5 x " . $i . " = " . (5 * $i) . "<br>";
}

?> 
<?php

for ($i = 10; $i >= 1; $i--) {
    echo $i . "<br>";
}

?>
