//Por alguma razão esse codigo n tava pegando no mesmo arquivo das outras mascaras ai separei ele aq

//CRIAR PRODUTO/EDITAR PRODUTO
/*
//Formata o valor(opção bonita mas que da b.o)
const precoInput = document.querySelectorAll('.preco_class');
const valorPreDefinido = 0; // Valor pré-definido em centavos

precoInput[0].value = (valorPreDefinido / 100).toLocaleString("pt-BR", { style: "currency", currency: "BRL" });

precoInput[0].addEventListener("input", function() {
  let valor = precoInput[0].value.replace(/\D/g, ""); // Remove todos os caracteres não numéricos

  // Converte o valor para centavos
  valor = parseFloat(valor) / 100;

  // Formata o valor como representação monetária
  precoInput[0].value = valor.toLocaleString("pt-BR", { style: "currency", currency: "BRL" });
});
*/



//Formata o valor(opção que funciona mas n é mt bonita)
const precoInput = document.querySelectorAll('.preco_class');
precoInput[0].addEventListener('input', cpf_formata);

function cpf_formata(){
    let value = precoInput[0].value.replace(/\D/g, '');

  if (value.length > 0) {
    value = value.substring(0, 0) + 'R$' + value.substring(0);
  }
  if (value.length > 4) {
    value = value.substring(0, 4) + ',' + value.substring(4);
  }
  if (value.length > 7) {
    value = value.substring(0, 4) + value.substring(4 + 1);
    value = value.substring(0, 5) + ',' + value.substring(5);
  }
  
  precoInput[0].value = value;
}