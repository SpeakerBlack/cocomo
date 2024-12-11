<style>
	body{
	width: 100%;
	padding-left: 70px;
	padding-right: 70px;
}
</style>
<h2 class="text-primary">Bienvenido a COCOMO, un framework basado en servicios web <small>Trabaja con Python 27</small></h2>
<p>COCOMO, orientado a servicios web, permite crear grandes aplicaciones con poco esfuerzo y con resultados exepcionales, centralizando la regla de negocio para acceder a esta desde cualquier lugar y desde cualquier lenguaje de programación, permitiendo así desarrollar aplicaciones multiplataforma  estables y con gran escalabilidad en el mercado. <br><br>
COCOMO tambien permite crear vistas para la version web del aplicativo, propocionando utilidades que hacen que contruir una aplicacion web sea mas facil y sencillo.
Al igual que para la web, COCOMO, tambien incluye utilidades para python, brindando un facil entorno de desarrollo para servicios web basados en JSON.
</p>

<p>Utilidades <a href="home/python">Python</a><br>
Utilidades <a href="home/js">JavaScript</a></p>

<p>Para ver un demo de su funcionamiento, inicia sesión <a href="home/login">Aqui</a></p>

<h1>Estructura</h1>
<p>Los siguientes archivos son indispensables para el correcto funcionamiento de la aplicación.</p>
<pre>
COCOMO/
      +-----default/
            +-----404.php
            +-----cocomo.js
            +-----footer.php
            +-----header.php
      +-----image/
      +-----service/
            +-----cocomo.py
      +-----style/
            +-----style.css
      +-----javascript/
            +-----application.js
      +-----view/
            +-----home/
                  +-----index.php
      +-----.htaccess
      +-----index.php
</pre>

<h1>Crear una vista</h1>
<p>Cree una subcarpeta en la carpeta <b>view</b> con el nombre de su vista y cree un archivo <b>index.php</b>.</p>
<p>Para añadir una subvista a una vista, cree un archivo <code>.php</code>.</p>
<pre>
+-----view/
      +-----home/
            +-----index.php
      <b>+-----newView/
            +-----index.php
            +-----newSubView.php</b>
</pre>
Luego acceda a ellas de la siguiente manera:
<pre>
https://localhost/<b>newView</b>

https://localhost/<b>newView/newSubView</b>
</pre>

<h3>Acceder a los archivos activos del sitio</h3>

<p>Para acceder a las capetas <b>image</b>, <b>style</b> y <b>javascript</b> ubicadas en la raiz, utilize en su código <b>HTML</b> el operador <code>../</code> seguido del nombre de la carpeta, seguido del nombre del archivo; Se recomienda denominar estos archivos como <b>Globales</b>.</p>
<pre>
&lt;img src="<b>../image/logo.png</b>" alt="Logo cocomo">

&lt;link href="<b>../style/style.css</b>" rel="stylesheet" type="text/css" >

&lt;script src="<b>../javacript/application.js</b>" type="text/javascript"></script>
</pre>

<p>Por otro lado para acceder a los archivos contenidos en la misma ubicacion de la vista, escriba el nombre del archivo tal como es; Se recomienda denominar estos archivos como <b>Locales</b>.</p>
<pre>
&lt;img src="<b>logo.png</b>" alt="Logo cocomo">

&lt;link href="<b>style.css</b>" rel="stylesheet" type="text/css" >

&lt;script src="<b>application.js</b>" type="text/javascript"></script>
</pre>

<h1>Crear un servicio web</h1>

<p>Cree un archivo <code>.py</code> en la carpeta <b>service</b>, el nombre asignado sera con el que se acceda a este servicio.</p>

<p>Para utilizar un archivo <code>.py</code> como <b>controlador</b> de un servicio, debe incluir sin exepción este código:</p>
<pre>
import json, sys, cocomo #Librerias requeridas para un servicio estandar

_EXECUTE = sys.argv[1] + "()"
_POST = json.loads(sys.argv[2])

def _MAIN():
	try:
		exec _EXECUTE
	except NameError:
		cocomo.printJson("funtion '"+_EXECUTE+"' not found", "error")


if __name__ == "__main__":
	_MAIN()
</pre>

<p>Cree una función dentro de su script python, debe definir el parametro <var>__object</var> pues por este se resivira la peticion <code>POST</code> realizada desde cliente. El nombre asignado a la funcion sera utilizado para invocala</p>

<p><b>Nota:</b> Todos los datos desde la vista deben ser enviados solo y unicamente por <code>POST</code> y se resivira en python como un objeto tipo Json</p>

<pre>
def myFunction(__object):
    cocomo.prepareOut("Hola mundo", "success")
</pre>

Ya a creado un servicio web que puede ser consumido, para esto agalo a través de la siguiente URL.
<pre>
http://localhost/post/myPythonFile/myFunction
</pre>

<h1>Subir archivo</h1>
<p>
	Esta funcion esta basada por completo en el plugin para jquery <b>jQuery Upload File</b> y lo puedes encontrar <a href="http://hayageek.com/docs/jquery-upload-file.php">aquí</a>.<br><br>
	Para subir un archivo, coloque la siguiente etiqueta donde se visualizara el control se subida.
</p>
<pre>&lt;div id="fileuploader">Upload&lt;/div></pre>
<p>Luego, en su archivo <b>javaScript</b> utilize la funcion <code>uploadFile</code></p>
<pre>
var objUpload = $("#fileuploader").uploadFile({
	multiple : false,
	autoSubmit : true,
	url : "url_del_servicio",
	allowedTypes : "png,jpg,gif", /*Tipos de archivos permitidos*/
	fileName : "file", /* El nombre 'file' es obligatorio en COCOMO */
	formData: {/*json data*/}
});
</pre>
<p>Para obtener la información del archivo en el servidor utilize <code>__object['file']</code>(Es igual a <code>$_FILES['file']</code> en PHP), y <code>__object['post']</code> para obtener la informacion enviada a travéz de <code>formData</code>.</p>
<p>Utilize <code>cocomo.moveUploadedFile(<var>source</var>, <var>destination</var>)</code>, en Python, al igual que en PHP, para completar la subida de archivos.</p>
<pre>
cocomo.moveUploadedFile(__object['file']['tmp_name'], <var>destination</var>);
</pre>