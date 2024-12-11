<style>
	body{
	width: 100%;
	padding-left: 70px;
	padding-right: 70px;
}
</style>
<h1>Utilidades Python</h1>

<h3><code>_POST</code></h3>
<p>Variables POST de HTTP.</p>
<pre>
data = _POST
</pre>

<h3><code>cocomo.query(<var>sql</var>)</code></h3>
<p>Retorna un objecto <b>json</b> con la tabla resultado de la consulta.</p>
<pre>
data = cocomo.query('SELECT * FROM Customers')
## <var>[[1, "David Restrepo Zapata", "davidpaisa04@gmail.com", "1234", "http://zblogged.com/wp-content/uploads/2015/11/5.png", "(+57) 2752754", "@davidrestrepo04", "Medellin, Antioquia"]]</var>
</pre>

<h3><code>cocomo.execute(<var>sql</var>)</code></h3>
<p>Ejecuta un comando tipo SQL que no retorna ningún tipo de resultado.</p>
<pre>
data = cocomo.execute('INSERT INTO Orders VALUES (<var>value1, value2, ...., valueN</var>)')
</pre>

<h3><code>cocomo.printJson(<var>objeto</var>, <var>estado</var>)</code></h3>
<p>Retorna al cliente un objecto <b>Json</b> con la información especificada y un estado dado.</p>
<pre>
## <var>Ejemplo 1</var>
cocomo.printJson('Hola mundo', 'success')

## <var>Ejemplo 2</var>
data = cocomo.query('SELECT * FROM Customers')
cocomo.printJson(data, 'success')
</pre>

<h3><code>cocomo.moveUploadedFile(<var>src</var>, <var>dest</var>)</code></h3>
<p>Mueve un archivo subido a una nueva ubicación.</p>
<pre>
cocomo.moveUploadedFile(_POST['file']['tmp_name'], "image/uploads/" + _POST['file']['name'])
</pre>

<br>