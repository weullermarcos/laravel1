<h1> CONFIG </h1>

<p>Meu nome é {{$nome}}</p>
<p>Minha idade é {{$idade}}</p>

<form method="POST">
    @csrf
    <br/> Nome: <input type="text" name="nome">
    <br/> Idade: <input type="text" name="idade">
    <br/> Nome: <input type="submit" value="Enviar">
</form>


<a href="/config/info"> Informações </a>

