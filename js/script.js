const email = document.getElementById("email")
const form = document.getElementById("form")
const parrafo = document.getElementById("warnings")

form.addEventListener("submit", e => {
  e.preventDefault()
  let warnings = ""
  let entrar = false
  let regexEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/
  parrafo.innerHTML = warnings
  if (!regexEmail.test(email.value)) {
    warnings += `El email no es valido, porfavor ingrese otro.`
    entrar = true
  }

  if (entrar) {
    parrafo.innerHTML = warnings
  } else {
    parrafo.innerHTML = "¡Enviado!"
  }

})