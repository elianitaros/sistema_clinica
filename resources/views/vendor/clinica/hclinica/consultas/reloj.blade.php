<html> 
<head> 
   <style>
   .input{
      background-color: #9FF781;

   }

   </style>
<title>Reloj con Javascript</title> 
<script language="JavaScript"> 
function mueveReloj(){ 
   	momentoActual = new Date() 
   	hora = momentoActual.getHours() 
   	minuto = momentoActual.getMinutes() 
   	segundo = momentoActual.getSeconds() 

   	str_segundo = new String (segundo) 
   	if (str_segundo.length == 1) 
      	segundo = "0" + segundo 

   	str_minuto = new String (minuto) 
   	if (str_minuto.length == 1) 
      	minuto = "0" + minuto 

   	str_hora = new String (hora) 
   	if (str_hora.length == 1) 
      	hora = "0" + hora 

   	horaImprimible = hora + " : " + minuto + " : " + segundo 

   	document.form_reloj.reloj.value = horaImprimible 

   	setTimeout("mueveReloj()",1000) 
} 
</script> 
</head> 

<body onload="mueveReloj()"> 

<form name="form_reloj"> 
<input type="text" name="reloj"  size="20" style="background-color : #0B3861; height:40px; color : White; font-family : Verdana, Arial, Helvetica; font-size : 8pt; text-align : center;" onfocus="window.document.form_reloj.reloj.blur()"> 
</form> 

</body> 
</html> 