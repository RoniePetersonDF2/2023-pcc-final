const telefone = document.getElementById('telefone')
telefone.addEventListener('keypress', (e) =>mascaratelefone(e.target.value))
telefone.addEventListener('change', (e) =>mascaratelefone(e.target.value))

const mascaratelefone = (valor)=> {
    valor = valor.replace(/\D/g, "")
    valor = valor.replace(/^(\d{2})(\d)/g, "($1) $2")
    valor = valor.replace(/(\d)(\d{4})$/, "$1-$2")
    telefone.value=valor
}