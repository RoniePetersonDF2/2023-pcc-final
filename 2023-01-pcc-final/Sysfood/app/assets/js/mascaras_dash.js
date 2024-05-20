

//CRIAR FUNCIONARIO / EDITAR FUNCIONARIO
const f_create_edit = document.querySelectorAll('.f_create_edit');


//Campo CPF

//Adiciona formatação no cpf
f_create_edit[3].addEventListener('input', cpf_formata);

function cpf_formata(){
    let value = f_create_edit[3].value.replace(/\D/g, '');
  
  if (value.length > 3) {
    value = value.substring(0, 3) + '.' + value.substring(3);
  }
  if (value.length > 7) {
    value = value.substring(0, 7) + '.' + value.substring(7);
  }
  if (value.length > 11) {
    value = value.substring(0, 11) + '-' + value.substring(11);
  }
  
  f_create_edit[3].value = value;
}

//Alerta caso o cpf ja tenha sido cadastrado

function cpf_exist() {
    Swal.fire({
        icon: 'error',
        title: 'Erro',
        text: 'O CPF é invalido ou já foi cadastrado!'
      })
}


//Campo CEP

//Usando a API VIACEP
f_create_edit[5].addEventListener('input', cep_api);

function cep_api() {
  let cep = f_create_edit[5].value.substring(0, 5) + f_create_edit[5].value.substring(5 + 1);

  if (cep.length == 8) {
    let url = `https://viacep.com.br/ws/`+ cep +`/json/`;
    
    fetch(url).then(function(response){
    response.json().then(cep_preenche)
  });
  }else{
    console.log("Houve um erro a puxar os dados do cep");
  }
}

//Função que preenche automaticamente os campos de endereço com auxilio da API VIACEP

function cep_preenche(dados) {
  f_create_edit[6].value = `${dados.logradouro}`;
  f_create_edit[7].value = `${dados.bairro}`;
  f_create_edit[8].value = `${dados.localidade}`;
  f_create_edit[9].value = `${dados.uf}`;
}


//Formata o input de CEP
f_create_edit[5].addEventListener('input', cep_formata);

function cep_formata() {
  let value = f_create_edit[5].value.replace(/\D/g, '');
  
  if (value.length > 5) {
    value = value.substring(0, 5) + '-' + value.substring(5);
  }
  
  f_create_edit[5].value = value;
}