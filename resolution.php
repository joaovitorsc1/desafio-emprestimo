<?php 

header('Content-Type: application/json');
$data = file_get_contents("php://input");

if($_SERVER["REQUEST_METHOD"] === "POST" && $data != NULL)
{
    $decode = json_decode($data);
    $ufs = ['AC', 'AL', 'AP', 'AM', 'BA', 'CE', 'DF', 'ES', 'GO', 'MA', 'MS', 'MT', 'MG', 'PA', 'PB', 'PR', 'PE', 'PI', 'RJ', 'RN', 'RS', 'RO', 'RR', 'SC', 'SP', 'SE', 'TO'];

    switch($decode)
    {
        // check if the index has been started
        case !isset($decode->age):
            echo json_encode(["Error" => "Missing age Param"]);
            break;
        
        case !isset($decode->cpf):
            echo json_encode(["Error" => "Missing cpf Param"]);
            break;

        case !isset($decode->name):
            echo json_encode(["Error" => "Missing name Param"]);
            break;
        
        case !isset($decode->income):
            echo json_encode(["Error" => "Missing income Param"]);
            break;

        case !isset($decode->location):
            echo json_encode(["Error" => "Missing location Param"]);
            break;

        case !in_array($decode->location, $ufs):
            echo json_encode(["Error" => "Location Invalid!"]);
            break;
        // check if the index has been started

        // PERSONAL Type
        case $decode->income <= (int) 3000.00:
            echo json_encode(["customer" => $decode->name, "loans" => ["type" => "PERSONAL", "interest_rate" => 4]]);
            break;
    
        // PERSONAL Type
        case $decode->income > 3000.00 && $decode->income < 5000.00 && $decode->age < 30 && $decode->location === "SP":
            echo json_encode(["customer" => $decode->name, "loans" => ["type" => "PERSONAL", "interest_rate" => 4]]);
            break;

        // CONSIGNMENT Type
        case $decode->income >= (int) 5000.00:
            echo json_encode(["customer" => $decode->name, "loans" => ["type" => "CONSIGNMENT", "interest_rate" => 2]]);
            break;
        
        // GUARANTEED Type
        case $decode->income <= (int) 3000.00:
            echo json_encode(["customer" => $decode->name, "loans" => ["type" => "GUARANTEED", "interest_rate" => 3]]);
            break;

        // GUARANTEED Type
        case $decode->income > 3000.00 && $decode->income < 5000.00 && $decode->age < 30 && $decode->location === "SP":
            echo json_encode(["customer" => $decode->name, "loans" => ["type" => "GUARANTEED", "interest_rate" => 3]]);
            break; 
    }       
} else 
{
    echo json_encode(["Error" => "Incorrect JSON Format"]);
}

?>