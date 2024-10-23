<?php
$array = [
    "first name" => "Isabella",
    "last name" => "Rodrigues",
    "age" => 21,
    "university" => "Fordham University"
];

foreach ($array as $key => $value) {
    echo "Their $key is $value.<br>";
}
?>

<?php
function getDescription(string $name, int $age = 20): string {
    return "The student's name is $name and they are $age years old.";
}

echo getDescription("Isabella", 21); 
?>
