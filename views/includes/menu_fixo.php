<div class="mdl-layout mdl-js-layout">
  <header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
      <div class="mdl-layout-spacer"></div>
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable mdl-textfield--floating-label mdl-textfield--align-right">
          <div class="menu_perfil">
            <i class="material-icons">account_circle</i>
            <p><?php echo $_SESSION['usuarionome']?></p>
          </div>
          <div class="material-icons mdl-badge mdl-badge--overlap" data-badge="2" id="not">notifications</div>
          <i class="material-icons" id="button_search">search</i>
          <i class="material-icons">forum</i>
          <i class="material-icons">settings</i>
      </div>
    </div>
      
    <div class="search_bar" id="search_bar">
        <form action="#" method="post">
            <i class="material-icons">search</i>
            <input class="" type="text" placeholder="Encontre projetos, políticos, amigos..."> 
        </form>
    </div>
  </header>
        
  <div class="mdl-layout__drawer">
    <span class="mdl-layout-title">Title</span>
    <nav class="mdl-navigation">
      <a class="mdl-navigation__link" href="">Link</a>
      <a class="mdl-navigation__link" href="">Link</a>
      <a class="mdl-navigation__link" href="">Link</a>
      <a class="mdl-navigation__link" href="">Link</a>
    </nav>
  </div>
