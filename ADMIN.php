<?php

$chute = 0;
$resposta_certa = random_int(1,100);
$tentativas = 10;
$pontuacao = 0;
print("Bem vindo ao jogo de adivinhação!\n");
print("Tente adivinhar o número entre 1 e 100 que estou pensando.\n");
print("Você tem 10 tentativas para acertar.\n");

 
while($chute != $resposta_certa)
{
    $chute = readline("\nDigite um número.\n");
    if($chute == $resposta_certa)
    {
    print("Você venceu!\n");
    $pontuacao = $tentativas * 10;
    print("Sua pontuação foi de $pontuacao pontos.\n");
    break;
    }
    else if($chute > $resposta_certa)
        {
        print("Você errou, o valor certo é menor que seu chute.\n");
        $tentativas--;
        print("Você tem $tentativas tentativas restantes.\n");
        }
        else
        {
            print("Você errou, o valor certo é maior que seu chute.\n");
            $tentativas--;
            print("Você tem $tentativas tentativas restantes.\n");
        }
    if($tentativas == 0)
    {
        print("Suas tentativas acabaram! O número certo era $resposta_certa.\n");
        break;
}
}



