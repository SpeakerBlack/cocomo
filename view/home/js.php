<style>
	body{
	width: 100%;
	padding-left: 70px;
	padding-right: 70px;
}
</style>
<h1>Utilidades JavaScript</h1>

<h3><code>cocomo.url</code></h3>
<p>Obtiene la url completa como se muestra en el navegador.</p>
<pre>
http://localhost/COCOMO/home/profile
</pre>

<h3><code>cocomo.host</code></h3>
<p>Obtiene el domino actual.</p>
<pre>
http://localhost/
</pre>

<h3><code>cocomo.path</code></h3>
<p>Obtiene la ruta del sitio actual.</p>
<pre>
http://localhost/COCOMO/home/
</pre>

<h3><code>cocomo.setSession(<var>key</var>, <var>value</var>)</code></h3>
<p>Establece una varible de sesión; Imita a <code>$_SESSION</code> de PHP, debe establecerse a partir de un objecto Json</p>
<pre>
cocomo.setSession("user", data);
</pre>

<h3><code>cocomo.getSession(<var>key</var>)</code></h3>
<p>Obtiene una sesión por su nombre previamente establecida, esta sesión es obtida como un objecto Json.</p>
<pre>
cocomo.getSession("user")
</pre>

<h3><code>cocomo.isHere(<var>site</var>)</code></h3>
<p>Determina si se esta en el sitio especidicado.</p>
<pre>
if (cocomo.isHere("profile")) {
	<var>//Code...</var>
}
</pre>

<br>