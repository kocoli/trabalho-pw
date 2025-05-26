<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Dashboard de Administração</title>
  <link rel="stylesheet" href="/trabalho-PW/assets/css/app/dashboard.css" />
  <script src="/trabalho-PW/assets/js/app/dashboard.js" defer></script>

</head>
<body>
  <div class="container">
    <aside class="sidebar">
      <h2>Vendedor</h2>
      <nav>
        <ul>
          <li><a href="#">Início</a></li>
          <li><a href="#">Produtos</a></li>
          <li><a href="#">Vendas</a></li>
          <li><a href="#">Estoque</a></li>
          <li><a href="#">Configurações</a></li>
        </ul>
      </nav>
    </aside>

    <main class="main-content">
      <header>
        <h1>DASHBOARD VENDAS</h1>
      </header>

      <section class="cards">
        <div class="card">
          <div class="barra"></div>
          <h3>Faturamento</h3>
          <p id="estoque">R$20,00</p>
        </div>
        <div class="card">
          <div class="barra"></div>
          <h3>Total de custos</h3>
          <p id="produtos">R$5,00</p>
        </div>
        <div class="card">
          <div class="barra"></div>
          <h3>Total de Lucro</h3>
          <p id="vendas">R$15,00</p>
        </div>
        <div class="card">
          <div class="barra"></div>
          <h3>Número de pedidos</h3>
          <p id="pedidos">4</p>
        </div>
        <div class="card">
          <div class="barra"></div>
          <h3>Itens Vendidos</h3>
          <p id="itens-vendidos">2</p>
        </div>
      </section>

      <section class="faturamento">
          
      </section>

    </main>
  </div>
</body>
</html>
