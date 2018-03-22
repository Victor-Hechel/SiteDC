<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="/admin/noticias">Divisão de Computação</a>
    </div>
    <ul class="nav navbar-nav">
      <li <?php if($controller == "Noticias") echo "class='active'";?>><a href="/admin/noticias">Notícias</a></li>
      <li <?php if($controller == "Projetos") echo "class='active'";?>><a href="/admin/projetos">Projetos</a></li>
      <li <?php if($controller == "Professores") echo "class='active'";?>><a href="/admin/professores">Professores</a></li>
      <li <?php if($controller == "Tccs") echo "class='active'";?>><a href="/admin/tccs">TCCs</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span>Admin</a></li>
      <li><a href="/admin/logout"><span class="glyphicon glyphicon-log-in"></span>Sair</a></li>
    </ul>
  </div>
</nav>