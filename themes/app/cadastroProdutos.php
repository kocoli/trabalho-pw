<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Cadastro de Produto</title>
  <link rel="stylesheet" href="/TRABALHO-PW/assets/css/cadastroProdutos.css">
</head>
<body>
  <div class="container">
    <h1>Cadastro de Produto</h1>
    <form class="form-produto">
      <label for="nome">Nome do Produto</label>
      <input type="text" id="nome" name="nome" required>

      <label for="descricao">Descrição</label>
      <textarea id="descricao" name="descricao" required></textarea>

      <label for="preco">Preço (R$)</label>
      <input type="number" id="preco" name="preco" step="0.01" required>

      <label for="quantidade">Quantidade em Estoque</label>
      <input type="number" id="quantidade" name="quantidade" required>

      <label for="imagem">Imagem do Produto</label>
      <input type="file" id="imagem" name="imagem">

      <button type="submit">Cadastrar Produto</button>
    </form>
  </div>
</body>
</html>
