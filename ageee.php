<?php 

const CHEQUE_ESPECIAL = 500;
$clientes = [];

function cadastrarCliente(&$clientes): bool {

    $nome = readline('Informe seu nome: ');
    $cpf  = readline('Informe seu CPF: ');

    //validar cliente
    if (isset($clientes[$cpf])) {
        print('Esse CPF já possui cadastro.\n');
        return false;
    }

    $clientes[$cpf] = [
        'nome' => $nome, 
        'cpf' => $cpf,
        'contas' => []
    ];

    return true;
}

function cadastrarConta(array &$clientes): bool {

    $cpf = readline("Informe seu CPF:");

    if (!isset($clientes[$cpf])) {
        print "Cliente não possui cadastro \n";
        return false;
    }

    $numConta = rand(1, 10);

    $clientes[$cpf]['contas'][$numConta] = [
        'saldo' => 0,
        'cheque_especial' => CHEQUE_ESPECIAL,
        'extrato' => []
    ];

    print "Conta criada com sucesso\n";
    print "O número da sua conta é: #{$numConta}";
    return true;

}

function depositar(array &$clientes){
    $cpf = readline("Informe seu CPF novamente: ");

    $numConta = readline("Informe o número da conta:");

    $valorDeposito = (float) readline("Informe o valor do depósito: ");

    if ($valorDeposito <= 0) {
        print "Valor de depósito inválido\n";
        return false;
    }

    $clientes[$cpf]['contas'][$numConta]['saldo'] += $valorDeposito;

    $dataHora = date('d/m/Y H:i');
    $clientes[$cpf]['contas'][$numConta]['extrato'][] = "Depósito de R$ $valorDeposito em $dataHora";


    print "Depósito realizado com sucesso\n";
    return true;
}

function sacar(&$clientes){
    //validar cpf
    $cpf = readline("Informe seu CPF: ");
    if(!isset($clientes[$cpf])){
        print "Cliente não possui cadastro\n";
        return false;
    }
    $conta = readline("informe o número da conta: ");

    if(!isset($clientes[$cpf]['contas'][$conta])){
        print "Conta não encontrada\n";
        return false;
    }
    

    $valorSaque = readline("Informe o valor do saque:");

    if ($clientes[$cpf]['contas'][$conta]['saldo'] >= $valorSaque) {
        $clientes[$cpf]['contas'][$conta]['saldo'] -= $valorSaque;
    }else {
        $totalDisponivel = $clientes[$cpf]['contas'][$conta]['saldo'] + $clientes[$cpf]['contas'][$conta]['cheque_especial'];
        if ($totalDisponivel >= $valorSaque) {
            $clientes[$cpf]['contas'][$conta]['saldo'] -= $valorSaque;
        } else {
            print "Saldo insuficiente\n";
            return false;
        }
    }
    $dataHora = date('d/m/Y H:i');
    $clientes[$cpf]['contas'][$conta]['extrato'][] = "Saque de R$ $valorSaque em $dataHora";   
    print "Saque realizado com sucesso\n";
    return true;
}

// MENU PRINCIPAL
function menu(){
    print "\n\n =============== MEU BANCO EM PHP ===============\n";
    print "1 - cadastrar cliente\n";
    print "2 - cadastrar conta\n";
    print "3 - depositar\n";
    print "4 - sacar\n";
    print "5 - consultar saldo\n";
    print "6 - consultar extrato\n";
    print "7 - sair\n";

    print "Escolha uma opção:\n";
}

function consultarSaldo($clientes){
    $cpf = readline("Informe seu CPF: ");
    if(!isset($clientes[$cpf])){
        print "Cliente não possui cadastro\n";
        return false;
    }
    $conta = readline("informe o número da conta: ");

    if(!isset($clientes[$cpf]['contas'][$conta])){
        print "Conta não encontrada\n";
        return false;
    }

    $saldo = $clientes[$cpf]['contas'][$conta]['saldo'];
    $chequeEspecial = $clientes[$cpf]['contas'][$conta]['cheque_especial'];

    print "Seu saldo é R$ $saldo\n";
    print "Seu limite de cheque especial é R$ $chequeEspecial\n";

    return true;
}

function consultarExtrato($clientes){
    $cpf = readline("Informe seu CPF: ");
    if(!isset($clientes[$cpf])){
        print "Cliente não possui cadastro\n";
        return false;
    }
    $conta = readline("informe o número da conta: ");

    if(!isset($clientes[$cpf]['contas'][$conta])){
        print "Conta não encontrada\n";
        return false;
    }

    $extrato = $clientes[$cpf]['contas'][$conta]['extrato'];
    print "===========================================\n";
    print "Extrato da conta #$conta:\n";
    for ($i=0; $i < count($extrato); $i++) { 
        print $extrato[$i] . "\n";
    }
    print "===========================================\n";

    return true;
}
//PROGRAMA PRINCIPAL
while(true){

    menu();

    $opcao = readline();

    switch ($opcao) {
        case '1':
            cadastrarCliente($clientes);
            break;
        case '2':
            cadastrarConta($clientes);
            break;
        case '3':
            depositar($clientes);
            break;
        
        case '4':
            sacar($clientes);
            break;
        
        case '5':
            consultarSaldo($clientes);
            break;

        case '6':
            consultarExtrato($clientes);
            break;

        case '7':
            print "Obrigado por usar nosso banco";
            die();
        
        default:
            print "Opção inválida";
            break;
    }
}


