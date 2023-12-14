const maskphone = (event) => {
    let input = event.target
    input.value = phone(input.value)
  }

function phone(v){
  v=v.replace(/\D/g,"")
  v=v.replace(/(\d{2})(\d)/,"($1) $2")
  v=v.replace(/(\d)(\d{4})$/,"$1-$2")
  return v
}

const maskcnpj = (event) => {
  let input = event.target
  input.value = cnpj(input.value)
}

function cnpj(v){
  v=v.replace(/\D/g,"")                           
  v=v.replace(/^(\d{2})(\d)/,"$1.$2")             
  v=v.replace(/^(\d{2})\.(\d{3})(\d)/,"$1.$2.$3") 
  v=v.replace(/\.(\d{3})(\d)/,".$1/$2")           
  v=v.replace(/(\d{4})(\d)/,"$1-$2")              
  return v
}

const maskcpf = (event) => {
    let input = event.target
    input.value = cpf(input.value)
}

function cpf(v){
    v=v.replace(/\D/g,"")                    
    v=v.replace(/(\d{3})(\d)/,"$1.$2")       
    v=v.replace(/(\d{3})(\d)/,"$1.$2")       
    v=v.replace(/(\d{3})(\d{1,2})$/,"$1-$2") 
    return v
}