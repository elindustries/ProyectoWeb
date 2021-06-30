function confirmacion(evento){
    if (confirm("¿Desea eliminar el elemento?\nEsta acción no se puede revertir.")){
        return true;
    }else{
        return false;
    }
}
