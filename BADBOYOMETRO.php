<?php
system("clear");
print("Bem vindo ao BadBoyômetro!\n");
print("Responda as perguntas a seguir para descobrir seu nível de badboy!\n");
$dragon_ball = 0;
$complete = readline("Complete a canção sagrada: \"Seu sorriso é tão . . . que deixou meu coração\" \n");
$qual_ano = readline("E seu ano de nascimento, parceiro?\n");
while(!is_numeric($dragon_ball) || $dragon_ball < 1 || $dragon_ball > 10)
{
    $dragon_ball = readline("De 1 a 10, o quanto você gosta de Dragon ball?\n");
}
$dragon_ball = $dragon_ball * 3;


if ($complete == "Resplandecente" || $complete == "resplandecente")
{
    $complete = 33;
}
else
{
    $complete = 0;
}


$qual_ano = $qual_ano - 1980;



badboyometro($dragon_ball, $complete, $qual_ano);

function badboyometro( int $dragon_ball, int $complete, int $qual_ano)
{

   
    $nivel = $dragon_ball + $complete + $qual_ano;
    if($nivel > 100)
    {
        $nivel = 100;
    }
     print("Segundo o BadBoyômetro, seu nível de badboy é de: $nivel%!\n");
}

