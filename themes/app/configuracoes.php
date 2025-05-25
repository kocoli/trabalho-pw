<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Configurações</title>
  <link rel="stylesheet" href="/TRABALHO-PW/assets/css/configuracoes.css">
</head>
<body>
  <div class="container">
    <h1>Configurações da Conta</h1>

    <form class="form-config">
      <fieldset>
        <legend>Dados Pessoais</legend>
        <!-- Aqui pretende-se alterar as informações pessoais do usuário, os campos vão estar com as informações atuais e ao alterar e salvar, a alteração será salva! -->
        <label for="nome">Nome completo</label>
        <input type="text" id="nome" name="nome">

        <label for="email">E-mail</label>
        <input type="email" id="email" name="email">

        <label for="telefone">Telefone</label>
        <input type="tel" id="telefone" name="telefone">
      </fieldset>

      <fieldset>
        <!-- O mesmo pra senha-->
        <legend>Segurança</legend>
        <label for="senha-atual">Senha atual</label>
        <input type="password" id="senha-atual" name="senha-atual">

        <label for="nova-senha">Nova senha</label>
        <input type="password" id="nova-senha" name="nova-senha">
      </fieldset>

      <fieldset>
        <legend>Preferências</legend>
        <label>
          <input type="checkbox" name="notificacoes" checked>
          Receber notificações por e-mail
        </label>
        <label>
          <input type="checkbox" name="modo-escuro">
          Ativar modo escuro <!-- Repensando essa alternativa -->
        </label>
      </fieldset>

      <button type="submit">Salvar Alterações</button>
    </form>
  </div>
</body>
</html>
