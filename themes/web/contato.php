<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contato - Otaku's Store</title>

    <!-- Link para o Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--CSS-->
    <link rel="stylesheet" href="/trabalho-pw/assets/css/style.css">
    <link rel="stylesheet" href="/trabalho-pw/assets/css/contato.css">
</head>
<body>
    <header>
        <img src="/trabalho-pw/assets/img/pikachu.png">

        <nav id="sidebar">
            <a href="/trabalho-pw/api">HOME</a>
            <a href="/trabalho-pw/api/sobre">ABOUT</a>
            <a href="/trabalho-pw/api/contato">CONTACT</a>
            <a href="/trabalho-pw/api/faq">FAQ</a>
        </nav>
    </header>

    <main>
        <section id="contact">
            <h2>Entre em contato conosco</h2>
            <p>Se você tiver alguma dúvida ou precisar de mais informações, não hesite em nos contatar. Estamos aqui para ajudar!</p>
            
            <!-- Formulário de Contato -->
            <form action="enviar-contato.php" method="POST">
                <div class="form-group">
                    <label for="nome">Seu nome:</label>
                    <input type="text" id="nome" name="nome" required placeholder="Digite seu nome">
                </div>

                <div class="form-group">
                    <label for="email">Seu e-mail:</label>
                    <input type="email" id="email" name="email" required placeholder="Digite seu e-mail">
                </div>

                <div class="form-group">
                    <label for="mensagem">Mensagem:</label>
                    <textarea id="mensagem" name="mensagem" required placeholder="Digite sua mensagem"></textarea>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn-submit">Enviar</button>
                </div>
            </form>

            <h3>Outras formas de contato:</h3>
            <p>Você também pode nos contatar pelos seguintes meios:</p>
            <ul>
                <li><i class="fas fa-envelope"></i> E-mail: <a href="mailto:suporte@otakusstore.com">suporte@otakusstore.com</a></li>
                <li><i class="fas fa-phone"></i> Telefone: (11) 99999-9999</li>
            </ul>
        </section>
    </main>

    <footer class="site-footer">
    <div class="footer-container">
      <div class="footer-about">
        <h3>Sobre Nós</h3>
        <p>Somos apaixonados por transformar ideias em soluções. Acompanhe nosso trabalho e fique por dentro das novidades!</p>
      </div>

      <div class="footer-links">
        <h3>Links Rápidos</h3>
        <ul>
          <li><a href="/trabalho-pw/api">Início</a></li>
          <li><a href="/trabalho-pw/api/sobre">Produtos</a></li>
          <li><a href="/trabalho-pw/api/contato">Contato</a></li>
          <li><a href="/trabalho-pw/api/faq">Privacidade</a></li>
        </ul>
      </div>

      <div class="footer-social">
        <h3>Redes Sociais</h3>
        <div class="social-icons">
          <a href="#"><img src="https://cdn-icons-png.flaticon.com/512/733/733547.png" alt="Facebook"></a>
          <a href="#"><img src="https://cdn-icons-png.flaticon.com/512/733/733558.png" alt="Instagram"></a>
          <a href="#"><img src="https://cdn-icons-png.flaticon.com/512/733/733579.png" alt="Twitter"></a>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <p>&copy; 2025 Todos os direitos reservados | Feito com ❤️</p>
    </div>
  </footer>
</body>
</html>
