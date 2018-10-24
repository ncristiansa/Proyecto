function validarPregunta(){
  var selectCabello = document.getElementById("OptCabello");
  var selectGafas = document.getElementById("OptGafas");
  var selectSexo = document.getElementById("OptSexo");

  var contador = 0;
  if(selectCabello.value ==0 && selectGafas.value==0 && selectSexo.value==0){
    document.getElementById("mensajeError").innerText = "¡Selecciona al menos una pregunta!";
  }
  else {
    contador = contador +1;
  }

  if(selectCabello.value!=0 && selectGafas.value!=0 || selectGafas.value!=0 && selectSexo.value!=0 || selectSexo.value!=0 && selectCabello.value!=0){
    document.getElementById("mensajeError").innerText = "No puedes usar más de un pregunta a la vez.";
    document.getElementById('OptCabello').value = 0;
    document.getElementById('OptGafas').value = 0;
    document.getElementById('OptSexo').value = 0;
    contador=0;
  }
  alert(contador);
}
