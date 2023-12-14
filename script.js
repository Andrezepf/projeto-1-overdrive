const handlePhone = (event) => {
    let input = event.target
    input.value = phoneMask(input.value)
  }

const phoneMask = (value) => {
  if (!value) return ""
  value = value.replace(/\D/g,'')
  value = value.replace(/(\d{2})(\d)/,"($1) $2")
  value = value.replace(/(\d)(\d{4})$/,"$1-$2")
  return value
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