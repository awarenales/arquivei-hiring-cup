<?php
/**
 * Created by PhpStorm.
 * User: Amanda
 * Date: 26/11/2018
 * Time: 22:52
 */
function getData(){
    $useCase = new \Arquivei\Recruiter\Modules\ClosestString\UseCases\Generator\UseCase();
    $useCase->execute();

    return $useCase->getResponse();
}

function getAnswer($data){
    $useCase = new \Arquivei\Recruiter\Modules\ClosestString\UseCases\Verificator\UseCase();
    $useCase->execute($data);

    return $useCase->getResponse();
}

function solve($array){
    $bestMatch = [0,""];
    foreach ($array["word-list"] as $value){
        $similarity = similar_text($value,$array["word"]);
        if ($similarity > $bestMatch[0]) $bestMatch = [$similarity,$value];
    }
    return $bestMatch[1];
}

require_once getcwd()."/vendor/autoload.php";

$data = getData();

if (getAnswer($data) == solve($data)) echo "FUNFOU!";
else echo "Deu ruim";