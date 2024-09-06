
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
        /* Reset básico */
        body, h1, h2, h3, p, button, img {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f4;
            padding: 20px;
        }

        header {
            background: #333;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }

        footer {
            background: #333;
            color: #fff;
            padding: 10px 0;
            text-align: center;
            margin-top: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .hero {
            background: #fff;
            padding: 40px 0;
            text-align: center;
            margin-bottom: 40px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .hero-title {
            font-size: 2.5em;
            margin-bottom: 10px;
        }

        .hero-subtitle {
            font-size: 1.2em;
            color: #555;
        }

        .produtos, .novos-tenis {
            margin-bottom: 40px;
        }

        .titulo-secao {
            font-size: 2em;
            margin-bottom: 20px;
            text-align: center;
        }

        .produtos-lista {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .produto {
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        .produto img {
            width: 100%;
            height: auto;
        }

        .descricao {
            padding: 15px;
        }

        .descricao h3 {
            margin-bottom: 10px;
        }

        .descricao p {
            margin-bottom: 10px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background: #5cb85c;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
        }

        .btn:hover {
            background: #4cae4c;
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            max-width: 600px;
            width: 100%;
            position: relative;
        }

        .modal img {
            width: 100%;
            height: auto;
        }

        .fechar-modal {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 1.5em;
            cursor: pointer;
        }

        /* Estilos responsivos */
        @media (max-width: 768px) {
            .produtos-lista {
                flex-direction: column;
                align-items: center;
            }

            .produto {
                width: 90%;
                max-width: 400px;
            }

            .menu-toggle {
                display: block;
            }

            .nav-links {
                display: none;
                flex-direction: column;
                align-items: center;
            }

            .nav-links.active {
                display: flex;
            }
        }
    </style>
</head>

<body>
    <?php include_once 'includes/header.php'; ?>

    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title">Bem-vindo à Minha Loja</h1>
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
                            <a href="#" onclick="mostrarTamanhos('badbunny forum low', ['35', '36', '37', '38', '39', '40', '41', '42', '43'], 149.00)" class="btn">Ver Tamanhos</a>
                        </div>
                    </article>

                    <!-- Produto 2 Adidas -->
                    <article class="produto">
                        <img src="img/adi2000.avif" alt="Produto Adidas 2">
                        <div class="descricao">
                            <h3>Adi2000 All Black</h3>
                            <p class="marca">Marca: Adidas</p>
                            <p class="preco">R$ 299,00</p>
                            <a href="#" onclick="mostrarTamanhos('Adi2000', ['35', '36', '37', '38', '39', '40', '41', '42', '43'], 299.00)" class="btn">Ver Tamanhos</a>
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
                    <!-- Produto 1 Novo -->
                    <article class="produto">
                        <img src="img/novo-tenis1.avif" alt="Tênis Novo 1">
                        <div class="descricao">
                            <h3>Tênis Novo Modelo 1</h3>
                            <p class="marca">Marca: Exemplo</p>
                            <p class="preco">R$ 199,00</p>
                            <a href="#" onclick="mostrarDetalhes('Tênis Novo Modelo 1', 'Exemplo', 'R$ 199,00', 'Descrição do tênis Novo Modelo 1', 'img/novo-tenis1.avif')" class="btn">Ver Detalhes</a>
                        </div>
                    </article>

                    <!-- Produto 2 Novo -->
                    <article class="produto">
                        <img src="img/novo-tenis2.avif" alt="Tênis Novo 2">
                        <div class="descricao">
                            <h3>Tênis Novo Modelo 2</h3>
                            <p class="marca">Marca: Exemplo</p>
                            <p class="preco">R$ 249,00</p>
                            <a href="#" onclick="mostrarDetalhes('Tênis Novo Modelo 2', 'Exemplo', 'R$ 249,00', 'Descrição do tênis Novo Modelo 2', 'img/novo-tenis2.avif')" class="btn">Ver Detalhes</a>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        <!-- Produtos Nike -->
        <section class="produtos">
            <div class="container">
                <h2 class="titulo-secao">Produtos Nike</h2>
                <div class="produtos-lista">
                    <!-- Produto 1 Nike -->
                    <article class="produto">
                        <img src="img/nikeJapaneseRoots.avif" alt="Produto Nike 1">
                        <div class="descricao">
                            <h3>Japanese Roots</h3>
                            <p class="marca">Marca: Nike</p>
                            <p class="preco">R$ 179,00</p>
                            <a href="#" onclick="mostrarTamanhos('Japanese Roots', ['35', '36', '37', '38', '39', '40', '41', '42', '43'], 179.00)" class="btn">Ver Tamanhos</a>
                        </div>
                    </article>

                    <!-- Produto 2 Nike -->
                    <article class="produto">
                        <img src="img/MichiganState.avif" alt="Produto Nike 2">
                        <div class="descricao">
                            <h3>Michigan State</h3>
                            <p class="marca">Marca: Nike</p>
                            <p class="preco">R$ 349,00</p>
                            <a href="#" onclick="mostrarTamanhos('Michigan State', ['35', '36', '37', '38', '39', '40', '41', '42', '43'], 349.00)" class="btn">Ver Tamanhos</a>
                        </div>
                    </article>
                </div>
            </div>
        </section>
    </main>

    <!-- Modal de Tamanhos -->
    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="fechar-modal" onclick="fecharModal()">&times;</span>
            <h2 id="modal-title"></h2>
            <div id="tamanhos-container" class="tamanhos-container"></div>
        </div>
    </div>

    <!-- Modal de Detalhes do Produto -->
    <div id="modal-produto" class="modal">
        <div class="modal-content">
            <span class="fechar-modal" onclick="fecharModalProduto()">&times;</span>
            <div class="produto-detalhes">
                <img id="produto-imagem" src="" alt="Produto">
                <div class="produto-info">
                    <h2 id="produto-nome"></h2>
                    <p class="marca" id="produto-marca"></p>
                    <p class="preco" id="produto-preco"></p>
                    <p class="descricao" id="produto-descricao"></p>
                    <div id="tamanhos-container" class="tamanhos-container"></div>
                    <button onclick="adicionarAoCarrinho()" class="btn">Adicionar ao Carrinho</button>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p>&copy; 2024 Minha Loja. Todos os direitos reservados.</p>
        </div>
    </footer>

    <script src="script.js"></script>
</body>

</html>
