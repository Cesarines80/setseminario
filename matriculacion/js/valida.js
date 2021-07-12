// Desarrollado por www.cesarcancino.com
function getXMLHTTPRequest()
{
var req = false;
try
  {
    req = new XMLHttpRequest(); /* p.e. Firefox */
  }
catch(err1)
  {
  try
    {
     req = new ActiveXObject("Msxml2.XMLHTTP");
  /* algunas versiones IE */
    }
  catch(err2)
    {
    try
      {
       req = new ActiveXObject("Microsoft.XMLHTTP");
  /* algunas versiones IE */
      }
      catch(err3)
        {
         req = false;
        }
    }
  }
return req;
}
var miPeticion1 = getXMLHTTPRequest();
//*********************************************************************


function from1(id,ide1,url1){
		//alert(id);
	
		var mi_aleatorio=parseInt(Math.random()*99999999);//para que no guarde la página en el caché...
		var vinculo=url1+"?id="+id+"&rand="+mi_aleatorio;
		//alert(vinculo);
		miPeticion1.open("GET",vinculo,true);//ponemos true para que la petición sea asincrónica
		miPeticion1.onreadystatechange=miPeticion.onreadystatechange=function(){
               if (miPeticion1.readyState==4)
               {
                       if (miPeticion1.status==200)
                       {
                               var http=miPeticion1.responseText;
							   if (http=="si")
							   {
								document.getElementById(ide1).innerHTML="<font color='red'>El usuario "+id+" no está disponible</font>";  
								document.getElementById("boton").style.display="none";
								document.getElementById("boton_2").style.display="block";
								}else
								{
								/*document.getElementById(ide1).innerHTML="<font color='green'>El usuario "+id+" si se encuentra disponible </font>"; 	
								document.getElementById("boton").style.display="block";
								document.getElementById("boton_2").style.display="none";*/
								}
							   
							   
                       }
				   }else{
					   //document.getElementById('resultados').style.display="block";
				   //	document.getElementById(ide1).innerHTML="<img src='ima/loading.gif' title='cargando...' />";
               }
       }
       miPeticion1.send(null);
		
}
/////////////////////////////////////////////////////////////////////////////////////////////
//******************************************************************
function limpiar()
{
		document.form.reset();
		document.form.nombre.focus();
}
//*****************************************************************************
//Valida correo
function valida_correo(correo) {
		  if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(correo)){
			
		   return (true)
		  } else {
		   
		   return (false);
		  }
		 }
//******************************************************************
var nav4 = window.Event ? true : false;
function acceptNum(evt){
var key = nav4 ? evt.which : evt.keyCode;
return (key <= 13 || (key >= 48 && key <= 57) || key == 46 || key == 12);
}
//*****************************************************************
var nav4 = window.Event ? true : false;
function acceptNum(evt){
var key = nav4 ? evt.which : evt.keyCode;
return (key <= 13 || (key >= 48 && key <= 57) || key == 46 || key == 12);
}


function valida_alm()
{
	var form=document.form;
	if (form.txt_nombre.value==0)
	{
			document.getElementById("div_nom").innerHTML="<font color='#ff0000'>Ingrese su nombre</font>";
			form.txt_nombre.value="";
			form.txt_nombre.focus();
			return false;
	}else
	{
		document.getElementById("div_nom").innerHTML="";
		}
		
		if (form.txt_apellido.value==0)
	{
			document.getElementById("div_apell").innerHTML="<font color='#ff0000'>Ingrese su Apellido</font>";
			form.txt_apellido.value="";
			form.txt_apellido.focus();
			return false;
	}else
	{
		document.getElementById("div_apell").innerHTML="";
		}
		
		if (form.txt_telefono.value==0)
	{
			document.getElementById("div_tel").innerHTML="<font color='#ff0000'>Ingrese su  Telefono Solo Numeros</font>";
			form.txt_telefono.value="";
			form.txt_telefono.focus();
			return false;
	}else
	{
		document.getElementById("div_tel").innerHTML="";
		}
		
			if (form.txt_celular.value==0)
	{
			document.getElementById("div_cel").innerHTML="<font color='#ff0000'>Ingrese el Nro. de Celular</font>";
			form.txt_celular.value="";
			form.txt_celular.focus();
			return false;
	}else
	{
		document.getElementById("div_cel").innerHTML="";
		}
		
	if (form.email.value==0)
	{
			document.getElementById("div_correo").innerHTML="<font color='#ff0000'>Ingrese su E-Mail</font>";
			form.email.value="";
			form.email.focus();
			return false;
	}else
	{
		document.getElementById("div_correo").innerHTML="";
		}	
	if (valida_correo(form.email.value)==false)
	{
			document.getElementById("div_correo").innerHTML="<font color='#ff0000'>Ingrese un E-Mail v&aacute;lido</font>";
			form.email.value="";
			form.email.focus();
			return false;
	}else
	{
		document.getElementById("div_correo").innerHTML="";
		}
		
		
		
	if (form.txt_ci.value==0)
	{
			document.getElementById("div_ci").innerHTML="<font color='#ff0000'>Ingrese su CI</font>";
			form.txt_ci.value="";
			form.txt_ci.focus();
			return false;
	}else
	{
		document.getElementById("div_ci").innerHTML="";
		}	
		
		
		
		form.submit();
}// JavaScript Document

function valida_materia()
{
	var form=document.form;
	if (form.materia.value==0)
	{
			document.getElementById("materia").innerHTML="<font color='#ff0000'><---- Ingrese la Materia</font>";
			form.materia.value="";
			form.materia.focus();
			return false;
	}else
	{
		document.getElementById("materia").innerHTML="";
		}
		
		if (form.sigla.value==0)
	{
			document.getElementById("sigla").innerHTML="<font color='#ff0000'>Ingrese la Sigla</font>";
			form.sigla.value="";
			form.sigla.focus();
			return false;
	}else
	{
		document.getElementById("sigla").innerHTML="";
		}
		
		if (form.creditos.value==0)
	{
			document.getElementById("creditos").innerHTML="<font color='#ff0000'>Ingrese los creditos</font>";
			form.creditos.value="";
			form.creditos.focus();
			return false;
	}else
	{
		document.getElementById("creditos").innerHTML="";
		}
		
			if (form.grado.value==0)
	{
			document.getElementById("grado").innerHTML="<font color='#ff0000'>Selecione el Grado</font>";
			form.grado.value="";
			form.grado.focus();
			return false;
	}else
	{
		document.getElementById("grado").innerHTML="";
		}
		
	if (form.activo.value==0)
	{
			document.getElementById("activo").innerHTML="<font color='#ff0000'>Seleccione el estado</font>";
			form.activo.value="";
			form.activo.focus();
			return false;
	}else
	{
		document.getElementById("activo").innerHTML="";
		}	
		
		form.submit();
}// JavaScript Document
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////Verificar los Datos de Docentes antes de ingresar//////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function from_1(id,ide1,url1){
		//alert(id);
	
		var mi_aleatorio=parseInt(Math.random()*99999999);//para que no guarde la página en el caché...
		var vinculo=url1+"?id="+id+"&rand="+mi_aleatorio;
		//alert(vinculo);
		miPeticion1.open("GET",vinculo,true);//ponemos true para que la petición sea asincrónica
		miPeticion1.onreadystatechange=miPeticion1.onreadystatechange=function(){
               if (miPeticion1.readyState==4)
               {
                       if (miPeticion1.status==200)
                       {
                               var http=miPeticion1.responseText;
							   //alert(http);
							   if (http== "si")
							   {
								document.getElementById(ide1).innerHTML="<font color='red'>El usuario "+id+" no está disponible</font>";  
								document.getElementById("boton").style.display="none";
								document.getElementById("boton_2").style.display="block";
								}else
					 			{
								document.getElementById(ide1).innerHTML="<font color='green'>El usuario "+id+" si se encuentra disponible</font>"; 	
								document.getElementById("boton").style.display="block";
								document.getElementById("boton_2").style.display="none";
								}
							   
							   
                       }
				   }else{
					   //document.getElementById('resultados').style.display="block";
				   	document.getElementById(ide1).innerHTML="<img src='../ima/loading.gif' title='cargando...' />";
               }
       }
       miPeticion1.send(null);
		
}

function valida_docente()
{
	var form=document.form;
	if (form.nombre.value==0)
	{
			document.getElementById("nombre").innerHTML="<font color='#ff0000'><---- Ingrese el Nombre</font>";
			form.nombre.value="";
			form.nombre.focus();
			return false;
	}else
	{
		document.getElementById("nombre").innerHTML="";
		}
		
		if (form.apellido.value==0)
	{
			document.getElementById("apellido").innerHTML="<font color='#ff0000'>Ingrese el Apellido</font>";
			form.apellido.value="";
			form.apellido.focus();
			return false;
	}else
	{
		document.getElementById("apellido").innerHTML="";
		}
		
		if (form.telefono.value==0)
	{
			document.getElementById("telefono").innerHTML="<font color='#ff0000'>Ingrese Telefono</font>";
			form.telefono.value="";
			form.telefono.focus();
			return false;
	}else
	{
		document.getElementById("telefono").innerHTML="";
		}
	
		if (form.celular.value==0)
	{
			document.getElementById("celular").innerHTML="<font color='#ff0000'>Ingrese Celular</font>";
			form.celular.value="";
			form.celular.focus();
			return false;
	}else
	{
		document.getElementById("celular").innerHTML="";
		}	
	
		if (form.sexo.value==0)
	{
			document.getElementById("sexo").innerHTML="<font color='#ff0000'>Ingrese Sexo</font>";
			form.sexo.value="";
			form.sexo.focus();
			return false;
	}else
	{
		document.getElementById("sexo").innerHTML="";
		}	
	
		if (form.ci.value==0)
	{
			document.getElementById("ci").innerHTML="<font color='#ff0000'>Ingrese Carnet Identidad</font>";
			form.ci.value="";
			form.ci.focus();
			return false;
	}else
	{
		document.getElementById("ci").innerHTML="";
		}	
		if (form.email.value==0)
	{
			document.getElementById("email").innerHTML="<font color='#ff0000'>Ingrese E-mail</font>";
			form.email.value="";
			form.email.focus();
			return false;
	}else
	{
		document.getElementById("email").innerHTML="";
		}	
	
	
	if (valida_correo(form.email.value)==false)
	{
			document.getElementById("email").innerHTML="<font color='#ff0000'>Ingrese un E-Mail v&aacute;lido</font>";
			form.email.value="";
			form.email.focus();
			return false;
	}else
	{
		document.getElementById("email").innerHTML="";
		}
	
			if (form.grado.value==0)
	{
			document.getElementById("grado").innerHTML="<font color='#ff0000'>Selecione el Grado</font>";
			form.grado.value="";
			form.grado.focus();
			return false;
	}else
	{
		document.getElementById("grado").innerHTML="";
		}

form.submit();
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////Registro de Alumnos///////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function valida_registro()
{
	var form=document.form;
	if (form.alumno.value==0)
	{
			document.getElementById("alumno").innerHTML="<font color='#ff0000'><---- Seleccione Alumno</font>";
			form.alumno.value="";
			form.alumno.focus();
			return false;
	}else
	{
		document.getElementById("alumno").innerHTML="";
		}
		
		if (form.materia.value==0)
	{
			document.getElementById("materia").innerHTML="<font color='#ff0000'>Seleccione Materia</font>";
			form.materia.value="";
			form.materia.focus();
			return false;
	}else
	{
		document.getElementById("materia").innerHTML="";
		}
		
		if (form.theDate.value==0)
	{
			document.getElementById("fechi").innerHTML="<font color='#ff0000'>Ingrese Fecha</font>";
			form.theDate.value="";
			form.theDate.focus();
			return false;
	}else
	{
		document.getElementById("fechi").innerHTML="";
		}
	
		if (form.docente.value==0)
	{
			document.getElementById("docente").innerHTML="<font color='#ff0000'>Seleccione Docente</font>";
			form.docente.value="";
			form.docente.focus();
			return false;
	}else
	{
		document.getElementById("docente").innerHTML="";
		}	
		if (form.grupo.value==0)
	{
			document.getElementById("grupo").innerHTML="<font color='#ff0000'>Seleccione grupo</font>";
			form.grupo.value="";
			form.grupo.focus();
			return false;
	}else
	{
		document.getElementById("grupo").innerHTML="";
		}	
	
		form.submit();
}

function valida_grupos()
{
	var form=document.form;
	if (form.grupo.value==0)
	{
			document.getElementById("grupo").innerHTML="<font color='#ff0000'>Ingrese Grupo</font>";
			form.grupo.value="";
			form.grupo.focus();
			return false;
	}else
	{
		document.getElementById("grupo").innerHTML="";
		}
		form.submit();
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////Ingreso de Notas///////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
var miPeticion = getXMLHTTPRequest();
//***************************************************************************************
function from_5(id,ide,url){
		var mi_aleatorio=parseInt(Math.random()*99999999);//para que no guarde la página en el caché...
		var vinculo=url+"?id="+id+"&rand="+mi_aleatorio+"&id_alm="+document.form.alumno.value;
		//alert(vinculo);
		miPeticion.open("GET",vinculo,true);//ponemos true para que la petición sea asincrónica
		miPeticion.onreadystatechange=miPeticion.onreadystatechange=function(){
               if (miPeticion.readyState==4)
               {
				   //alert(miPeticion.readyState);
                       if (miPeticion.status==200)
                       {
                                //alert(miPeticion.status);
                               //var http=miPeticion.responseXML;
                               var http=miPeticion.responseText;
                               document.getElementById(ide).innerHTML= http;

                       }
               }/*else
               {
			document.getElementById(ide).innerHTML="<img src='ima/loading.gif' title='cargando...' />";

                }*/
       }
       miPeticion.send(null);

}


function valida_notas()
{
	var form=document.form;
	if (form.alumno.value==0)
	{
			document.getElementById("alumno").innerHTML="<font color='#ff0000'>Seleccione Alumno</font>";
			form.alumno.value="";
			form.alumno.focus();
			return false;
	}else
	{
		document.getElementById("alumno").innerHTML="";
		}
	if (form.materia.value==0)
	{
			document.getElementById("materia").innerHTML="<font color='#ff0000'>Seleccione Materia</font>";
			form.materia.value="";
			form.materia.focus();
			return false;
	}else
	{
		document.getElementById("materia").innerHTML="";
		}
		
	if (form.nota.value==0)
	{
			document.getElementById("nota").innerHTML="<font color='#ff0000'>Ingrese Nota</font>";
			form.nota.value="";
			form.nota.focus();
			return false;
	}else
	{
		document.getElementById("nota").innerHTML="";
		}
		
		
		form.submit();
}
