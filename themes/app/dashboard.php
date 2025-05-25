<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Admin</title>
  <link rel="stylesheet" href="/TRABALHO-PW/assets/css/dashboard.css">
</head>
<body>
  <div class="dashboard-container">
    <aside class="sidebar">
      <h2>Admin</h2>
      <nav>
        <a href="dashboard.php">🏠 Início</a>
        <a href="#">👥 Usuários</a>
        <a href="cadastroProdutos.php">📦 Produtos</a>
        <a href="pedidos.php">📋 Pedidos</a>
        <a href="configuracoes.php">⚙️ Configurações</a>
      </nav>
    </aside>

    <main class="main-content">
      <header>
        <h1>Painel de Controle</h1>
        <p>Bem-vindo de volta, Admin!</p>
      </header>

      <section class="cards">
        <div class="card">
          <h3>Total de Usuários</h3>
          <p>1.230</p>
        </div>
        <div class="card">
          <h3>Pedidos Hoje</h3>
          <p>89</p>
        </div>
        <div class="card">
          <h3>Produtos Ativos</h3>
          <p>152</p>
        </div>
        <div class="card">
          <h3>Avaliações Pendentes</h3>
          <p>17</p>
        </div>
      </section>

<!-- Ainda pretendemos implementar algum gráfico de ações para deixar a experiencia de nossos vendedores mais dinâmica-->
    </main>
  </div>
</body>
</html>
