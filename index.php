<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha Loja</title>
    <link rel="stylesheet" href="css/styles.css">
    <style>
        /* Estilos básicos para o modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 600px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .modal-select {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <?php include_once 'includes/header.php'; ?>

    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title">Bem-vindo à Haiki</h1>
                <p class="hero-subtitle">Os melhores produtos para você</p>
            </div>
        </div>
    </section>

    <main>
        <!-- Produtos Adidas -->
        <section class="produtos">
            <div class="container">
                <h2 class="titulo-secao">Produtos Adidas</h2>
                <div class="produtos-lista">
                    <!-- Produto 1 Adidas -->
                    <article class="produto">
                        <img src="img/badbunnyforumlow.avif" alt="Produto Adidas 1">
                        <div class="descricao">
                            <h3>BB Forum Low</h3>
                            <p class="marca">Marca: Adidas</p>
                            <p class="preco">R$ 149,00</p>
                            <a href="#" onclick="mostrarTamanhos('BB Forum Low', ['35', '36', '37', '38', '39', '40', '41', '42', '43'], 149.00)" class="btn">Ver Tamanhos</a>
                        </div>
                    </article>

                    <!-- Produto 2 Adidas -->
                    <article class="produto">
                        <img src="img/adi2000.avif" alt="Produto Adidas 2">
                        <div class="descricao">
                            <h3>Adi2000 All Black</h3>
                            <p class="marca">Marca: Adidas</p>
                            <p class="preco">R$ 299,00</p>
                            <a href="#" onclick="mostrarTamanhos('Adi2000 All Black', ['35', '36', '37', '38', '39', '40', '41', '42', '43'], 299.00)" class="btn">Ver Tamanhos</a>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        <!-- Novos Tênis -->
        <section class="novos-tenis">
            <div class="container">
                <h2 class="titulo-secao">Novos Tênis</h2>
                <div class="produtos-lista">
                    <article class="produto">
                        <img src="img/blackbunny.png" alt="Tênis Novo 1">
                        <div class="descricao">
                            <h3>Tênis Novo Modelo 1</h3>
                            <p class="marca">Marca: Exemplo</p>
                            <p class="preco">R$ 199,00</p>
                            <a href="#" onclick="mostrarTamanhos('Adi2000 All Black', ['35', '36', '37', '38', '39', '40', '41', '42', '43'], 299.00)" class="btn">Ver Tamanhos</a>                        </div>
                    </article>

                    <article class="produto">
                        <img src="img/nikeT.webp" alt="Tênis Novo 2">
                        <div class="descricao">
                            <h3>Tênis Novo Modelo 2</h3>
                            <p class="marca">Marca: Exemplo</p>
                            <p class="preco">R$ 249,00</p>
                            <a href="#" onclick="mostrarTamanhos('Adi2000 All Black', ['35', '36', '37', '38', '39', '40', '41', '42', '43'], 299.00)" class="btn">Ver Tamanhos</a>                        </div>
                    </article>
                </div>
            </div>
        </section>

        <!-- Produtos Nike -->
        <section class="produtos">
            <div class="container">
                <h2 class="titulo-secao">Produtos Nike</h2>
                <div class="produtos-lista">
                    <article class="produto">
                        <img src="img/nikeJapaneseRoots.avif" alt="Produto Nike 1">
                        <div class="descricao">
                            <h3>Japanese Roots</h3>
                            <p class="marca">Marca: Nike</p>
                            <p class="preco">R$ 179,00</p>
                            <a href="#" onclick="mostrarTamanhos('Japanese Roots', ['35', '36', '37', '38', '39', '40', '41', '42', '43'], 179.00)" class="btn">Ver Tamanhos</a>
                        </div>
                    </article>

                    <article class="produto">
                        <img src="img/MichiganState.avif" alt="Produto Nike 2">
                        <div class="descricao">
                            <h3>Michigan State</h3>
                            <p class="marca">Marca: Nike</p>
                            <p class="preco">R$ 239,00</p>
                            <a href="#" onclick="mostrarTamanhos('Michigan State', ['35', '36', '37', '38', '39', '40', '41', '42', '43'], 239.00)" class="btn">Ver Tamanhos</a>
                        </div>
                    </article>
                </div>
            </div>
        </section>
    </main>

    <!-- Modal -->
    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="fecharModal()">&times;</span>
            <h2 id="modal-produto"></h2>
            <p id="modal-preco"></p>
            <div id="modal-tamanhos" class="modal-select"></div>
            <button id="modal-confirmar" class="btn" onclick="confirmarTamanho()">Confirmar</button>
        </div>
    </div>

    <script>
        function mostrarTamanhos(produto, tamanhos, preco) {
            const tamanhoSelect = tamanhos.map(tamanho => `<option value="${tamanho}">${tamanho}</option>`).join('');
            document.getElementById('modal-produto').innerText = produto;
            document.getElementById('modal-preco').innerText = 'Preço: R$ ' + preco;
            document.getElementById('modal-tamanhos').innerHTML = `
                <label for="tamanho-select">Escolha o tamanho:</label>
                <select id="tamanho-select" class="modal-select">
                    ${tamanhoSelect}
                </select>
            `;
            document.getElementById('modal').style.display = 'block';
        }

        function fecharModal() {
            document.getElementById('modal').style.display = 'none';
        }

        function confirmarTamanho() {
            const tamanhoSelecionado = document.getElementById('tamanho-select').value;
            if (tamanhoSelecionado) {
                alert('Tamanho selecionado: ' + tamanhoSelecionado);
                fecharModal();
            } else {
                alert('Por favor, selecione um tamanho.');
            }
        }

        // Fechar o modal quando o usuário clicar fora do conteúdo do modal
        window.onclick = function(event) {
            if (event.target == document.getElementById('modal')) {
                fecharModal();
            }
        }
    </script>
    
    <?php include_once 'includes/footer.php'; ?>
</body>

</html>
