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
                $continuar = false;
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
    $sorteados = [];
    $qntd_dezenas = (int)readline("Quantas dezenas deseja apostar (6-20)? ");
    $qntd_jogos = (int)readline("Quantos jogos deseja fazer? ");
    $contador = 0;
    while ($contador < $qntd_dezenas) {
        $dezena_sorteada = rand(1, 60);
        if (!in_array($dezena_sorteada, $sorteados)) {
        $sorteados[] = $dezena_sorteada;
        }
        $contador++;
    }
    print_r($sorteados);

    //sorteio
    //calcular valores
}

function quina(): void
{
    print "Você escolheu Quina!\n";
    // Lógica específica para Quina
}

function loto_facil(): void
{
    print "Você escolheu Lotofácil!\n";
    // Lógica específica para Lotofácil
}

function loto_mania(): void
{
    print "Você escolheu Lotomania!\n";
    // Lógica específica para Lotomania
}

function sorteio_numeros(): void {}
