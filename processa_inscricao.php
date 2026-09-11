<?php

//Declaração das variáveis, passando pelos processos de verificação e sanitização.

$nome = trim(filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS));

$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

$idade = filter_input(INPUT_POST, 'idade', FILTER_VALIDATE_INT, [
    "options" => ["min_range" => 16, "max_range" => 90]
]);

$media = filter_input(INPUT_POST, 'media', FILTER_VALIDATE_FLOAT);

$curso = filter_input(INPUT_POST, 'curso', FILTER_UNSAFE_RAW);

$termos = isset($_POST['termos']);


$cursos_validos = ['ADS', 'ES', 'SI'];

//Verificação das informações enviadas

if (
    empty($nome) || strlen($nome) < 3 ||             
    !$email ||                                       
    $idade === false ||                              
    $media === false || $media < 0 || $media > 10 || 
    !in_array($curso, $cursos_validos) ||            
    !$termos                                         
) {
    
    echo "Erro: Dados inválidos. Corrija as informações.";
} else {

    echo "Sucesso: Inscrição processada de forma segura e validada!";
}
?>