function validacion(){
  var correcto = true;
  if(document.getElementById('OptCabello').value ==''){
    correcto = false;
  }
  if(!correcto){
  alert('Algunos campos no están correctos, vuelva a revisarlos');
  }
  return correcto;
  }
