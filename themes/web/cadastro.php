<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <!--CSS-->
    <link rel="stylesheet" href="/TRABALHO-PW/assets/css/cadastro.css">
</head>
<body>
    <div class="form-container">
        <h2>Cadastro - Otaku's Store</h2>
        <form>
            <label for="nome">Nome do usuário:</label>
            <input type="text" id="nome" name="nome" required>
    
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required>
    
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required>
    
            <label for="endereco">Endereço:</label>
            <textarea id="endereco" name="endereco" rows="3" required></textarea>
    
            <label for="telefone">Telefone:</label>
            <input type="tel" id="telefone" name="telefone">
    
            <label for="genero">Gênero favorito de anime/mangá:</label>
            <select id="genero" name="genero">
                <option value="shounen">Shounen</option>
                <option value="shoujo">Shoujo</option>
                <option value="seinen">Seinen</option>
                <option value="isekai">Isekai</option>
                <option value="romance">Romance</option>
                <option value="outros">Outros</option>
            </select>
    
            <button id="btn-register">Cadastrar</button>
        </form>
    </div>
    
</body>
</html>