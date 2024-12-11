import json, sys, cocomo # PELIGRO -- no borrar

def login():
	__object = _POST	
	__data = cocomo.query("select * from user where email = '"+__object['user']+"' and pass = '"+__object['password']+"'")
	if len(__data) == 0:
		cocomo.printJson("Datos no encontrados", "error")
	else:
		cocomo.printJson(__data, "success")

def subirImagen():
	__object = _POST
	cocomo.moveUploadedFile(__object['file']['tmp_name'], "image/uploads/" + __object['file']['name']);
	import time
	strg = "INSERT INTO galeria (nombre, tamanio, fecha, formato, id_user) VALUES ('"+__object['file']['name']+"',"+str(__object['file']['size'])+", '"+time.strftime("%d/%m/%y")+"', '"+__object['file']['type']+"', "+str(__object['post']['userId'])+")"
	cocomo.execute(strg)
	cocomo.printJson("done", "success")

def obtenerMisImagenes():
	__object = _POST
	__data = cocomo.query("select id, nombre, tamanio, fecha, formato from galeria where id_user = "+__object['id'])
	cocomo.printJson(__data, "success")

def editarImagen():
	__object = _POST
	cocomo.moveUploadedFile("image/uploads/" + __object['last'], "image/uploads/" + __object['nombre'])
	cocomo.execute("UPDATE galeria SET nombre = '"+__object['nombre']+"' WHERE id = "+__object['id'])
	cocomo.printJson("done", "success")

##COCOMO##COCOMO##COCOMO##COCOMO##COCOMO##COCOMO##COCOMO##COCOMO##COCOMO##COCOMO##COCOMO##
##
## Por favor, no borrar este codigo
## Necesario para el funcionamineto del script dentro del framework
## copie y pege este codigo en cada script que valla a ser utilizado como servicio
_EXECUTE = sys.argv[1] + "()"
_POST = json.loads(sys.argv[2])

def _MAIN():
	try:
		exec _EXECUTE
	except NameError:
		cocomo.printJson("funtion '"+_EXECUTE+"' not found", "error")


if __name__ == "__main__":
	_MAIN()
##
##COCOMO##COCOMO##COCOMO##COCOMO##COCOMO##COCOMO##COCOMO##COCOMO##COCOMO##COCOMO##COCOMO##