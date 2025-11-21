<?php


menu();
function menu(): void
{
    $continuar = true;
    do {
        print "========================\n";
        print "===|Menu de Loterias|===\n";
        print "====|1. Mega-Sena  |====\n";
        print "====|2. Quina      |====\n";
        print "====|3. Lotofácil  |====\n";
        print "====|4. Lotomania  |====\n";
        print "====|5. Sair       |====\n";
        print "========================\n";

        $opcao = trim((int)readline("Escolha uma opção: "));


        switch ($opcao) {
            case 1:
                mega_sena();
                sleep(2);
                break;
            case 2:
                quina();
                break;
            case 3:
                loto_facil();
                break;
            case 4:
                loto_mania();
                break;
            case 5:
                print "Saindo do programa...\n";
                $continuar = false;
                break;
            default:
                print "Opção inválida. Tente novamente.\n";
        }
    } while ($continuar);
}

function mega_sena(): void
{
    do {
    $qntd_dezenas = (int)readline("Quantas dezenas deseja apostar (6-20)? ");
    } while ($qntd_dezenas < 6 || $qntd_dezenas > 20);
    
    $qntd_jogos = (int)readline("Quantos jogos deseja fazer? ");
    sorteio_numeros($qntd_dezenas, 1, 60, $qntd_jogos, 6.0, 6);
    
}
function quina(): void
{
    do {
        $qntd_dezenas = (int)readline("Quantas dezenas deseja apostar (5-15)? ");
    } while ($qntd_dezenas < 5 || $qntd_dezenas > 15);
    $qntd_jogos = (int)readline("Quantos jogos deseja fazer? ");
    sorteio_numeros($qntd_dezenas, 1, 80, $qntd_jogos, 3.0, 5);
}

function loto_facil(): void
{
    do {
        $qntd_dezenas = (int)readline("Quantas dezenas deseja apostar (15-20)? ");
    } while ($qntd_dezenas < 15 || $qntd_dezenas > 20);
    $qntd_jogos = (int)readline("Quantos jogos deseja fazer? ");
    sorteio_numeros($qntd_dezenas, 1, 25, $qntd_jogos, 3.50, 15);
}

function loto_mania(): void
{
    //trabalho do erik
}

function sorteio_numeros($dezenas, $min, $max, $jogos, $preço, $minajogar)
{
    for($i = 0; $i < $jogos; $i++)
    {
    $sorteados = [];
    
    while (sizeof($sorteados) < $dezenas) {
        $dezena_sorteada = rand($min, $max);
        if (!in_array($dezena_sorteada, $sorteados)) {
        $sorteados[] = $dezena_sorteada;
        }
        
    }
    sort($sorteados);
    
    print(implode(" - ", $sorteados));
    print "\n";
    }
    print("\nO preço total a ser gasto é: R$ " .  fatorial($dezenas) / (fatorial($minajogar) * fatorial($dezenas - $minajogar)) * $preço . "\n");
 // (Fatorial das dezenas que voce escolhe / fatorial do minimo de dezenas quevoce PODE escolher * fatorial da diferenca de dezenas que voce escolhe pelo minimo) * preço   
}
function fatorial($num)
{
    $fat = 1;
    for ($i = 1; $i <= $num; $i++) {
        $fat *= $i;
    }
    return $fat;
}