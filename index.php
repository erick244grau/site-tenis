    <!DOCTYPE html>
    <html lang="pt-BR">
    <<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Minha Loja</title>
        <link rel="stylesheet" href="css/styles.css">
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

        <section class="produtos">
            <div class="container">
                <h2 class="titulo-secao">Produtos Adidas</h2>
                <div class="produtos-lista">
                    <!-- Produto 1 Adidas -->
                    <div class="produto">
                        <img src="img/badbunnyforumlow.avif" alt="Produto Adidas 1">
                        <div class="descricao">
                            <h3> bb forum low</h3>
                            <p class="marca">Marca: Adidas</p>
                            <p class="preco">R$ 149,00</p>
                            <button onclick="mostrarTamanhos('badbunny forum low', ['35', '36', '37', '38', '39', '40', '41', '42', '43'], 149.00)" class="btn">Ver Tamanhos</button>
                        </div>
                    </div>

                    <!-- Produto 2 Adidas -->
                    <div class="produto">
                        <img src="img/adi2000.avif" alt="Produto Adidas 2">
                        <div class="descricao">
                            <h3>Adi2000 all black</h3>
                            <p class="marca">Marca: Adidas</p>
                            <p class="preco">R$ 299,00</p>
                            <button onclick="mostrarTamanhos('Adi2000', ['35', '36', '37', '38', '39', '40', '41', '42', '43'], 299.00)" class="btn">Ver Tamanhos</button>
                        </div>
                    </div>
                    <div class="container">
                    <section class="mais-vendidos">
        <div class="container">
            <h2>Mais Vendidos</h2>
            <div class="produtos-lista">
                <!-- Produto 1 Mais Vendido -->
                <div class="produto">
                    <img src="img/mais-vendido1.avif" alt="Produto Mais Vendido 1">
                    <div class="descricao">
                        <h3>Produto Mais Vendido 1</h3>
                        <p class="marca">Marca: Exemplo</p>
                        <p class="preco">R$ 199,00</p>
                        <button onclick="mostrarDetalhes('Produto Mais Vendido 1', 'Exemplo', 'R$ 199,00', 'Descrição do Produto Mais Vendido 1', 'img/mais-vendido1.avif')" class="btn">Ver Detalhes</button>
                    </div>
                </div>

                <!-- Produto 2 Mais Vendido -->
                <div class="produto">
                    <img src="img/mais-vendido2.avif" alt="Produto Mais Vendido 2">
                    <div class="descricao">
                        <h3>Produto Mais Vendido 2</h3>
                        <p class="marca">Marca: Exemplo</p>
                        <p class="preco">R$ 299,00</p>
                        <button onclick="mostrarDetalhes('Produto Mais Vendido 2', 'Exemplo', 'R$ 299,00', 'Descrição do Produto Mais Vendido 2', 'img/mais-vendido2.avif')" class="btn">Ver Detalhes</button>
                    </div>
                </div>
                <!-- Adicione mais produtos conforme necessário -->
            </div>
        </div>
    </section>

            <h2>Novos Tênis</h2>
            <div class="produtos-lista">
                <!-- Produto 1 Novo -->
                <div class="produto">
                    <img src="img/novo-tenis1.avif" alt="Tênis Novo 1">
                    <div class="descricao">
                        <h3>Tênis Novo Modelo 1</h3>
                        <p class="marca">Marca: Exemplo</p>
                        <p class="preco">R$ 199,00</p>
                        <button onclick="mostrarDetalhes('Tênis Novo Modelo 1', 'Exemplo', 'R$ 199,00', 'Descrição do tênis Novo Modelo 1', 'img/novo-tenis1.avif')" class="btn">Ver Detalhes</button>
                    </div>
                </div>

                <!-- Produto 2 Novo -->
                <div class="produto">
                    <img src="img/novo-tenis2.avif" alt="Tênis Novo 2">
                    <div class="descricao">
                        <h3>Tênis Novo Modelo 2</h3>
                        <p class="marca">Marca: Exemplo</p>
                        <p class="preco">R$ 249,00</p>
                        <button onclick="mostrarDetalhes('Tênis Novo Modelo 2', 'Exemplo', 'R$ 249,00', 'Descrição do tênis Novo Modelo 2', 'img/novo-tenis2.avif')" class="btn">Ver Detalhes</button>
                    </div>
                </div>
                <!-- Adicione mais produtos conforme necessário -->
            </div>
                </div>
            </div>
        </section>

        <section class="produtos">
            <div class="container">
                <h2 class="titulo-secao">Produtos Nike</h2>
                <div class="produtos-lista">
                    <!-- Produto 1 Nike -->
                    <div class="produto">
                        <img src="img/nikeJapaneseRoots.avif" alt="Produto Nike 1">
                        <div class="descricao">
                            <h3>Japanese Roots</h3>
                            <p class="marca">Marca: Nike</p>
                            <p class="preco">R$ 179,00</p>
                            <button onclick="mostrarTamanhos('Japanese Roots', ['35', '36', '37', '38', '39', '40', '41', '42', '43'], 179.00)" class="btn">Ver Tamanhos</button>
                        </div>
                    </div>

                    <!-- Produto 2 Nike -->
                    <div class="produto">
                        <img src="img/MichiganState.avif" alt="Produto Nike 2">
                        <div class="descricao">
                            <h3>Michigan State</h3>
                            <p class="marca">Marca: Nike</p>
                            <p class="preco">R$ 349,00</p>
                            <button onclick="mostrarTamanhos('Michigan State', ['35', '36', '37', '38', '39', '40', '41', '42', '43'], 349.00)" class="btn">Ver Tamanhos</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Modal de Tamanhos -->
        <div id="modal" class="modal">
            <div class="modal-content">
                <span class="fechar-modal" onclick="fecharModal()">&times;</span>
                <h2 id="modal-title"></h2>
                <div id="tamanhos-container" class="tamanhos-container"></div>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <p>&copy; 2024 Minha Loja. Todos os direitos reservados.</p>
            </div>
        </footer>

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


        <script src="script.js"></script>
    </body>
    </html>
