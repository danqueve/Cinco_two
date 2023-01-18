$(document).ready(function(){

 var dataTable = $('#personal').DataTable({
  "language": {
  "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
  },
  "processing" : true,
  "serverSide" : true,
  "order" : [],
  "ajax" : {
   url:"datos.php",
   type:"POST"
  }
 });

 $('#empleados').on('draw.dt', function(){/*`personal_nombre``personal_edad``personal_salario`*/
  $('#empleados').Tabledit({
   url:'edicion.php',
   dataType:'json',
   columns:{
    identifier : [0, 'dni'],
	editable:[[1, 'personal_nombre'], [2, 'personal_edad'], [3, 'personal_salario']]
   },
   restoreButton:false,
   onSuccess:function(data, textStatus, jqXHR)
   {
    if(data.action == 'delete')
    {
     $('#' + data.idp).remove();
     $('#personal').DataTable().ajax.reload();
    }
   }
  });
 });
  
}); 