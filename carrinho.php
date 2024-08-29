<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho - Minha Loja</title>
    <link rel="stylesheet" href="css/style1.css">
</head>
<body>
    <?php include_once 'includes/header.php'; ?> 

    <main class="carrinho">
        <div class="container">
            <h2>Meu Carrinho</h2>
            <div id="carrinho-items">
                <!-- Itens do carrinho serão adicionados dinamicamente aqui -->
            </div>
            <button onclick="limparCarrinho()" class="limpar-carrinho">Limpar Carrinho</button>
        </div>
    </main>

    <footer class="footer">
        <div class="container">
            <p>&copy; 2024 Minha Loja. Todos os direitos reservados.</p>
        </div>
    </footer>

    <script src="script.js"></script>
    <script>
        // Função para exibir os itens do carrinho na página de carrinho.html
        function inicializarCarrinhoPage() {
            const carrinhoItemsDiv = document.getElementById('carrinho-items');
            carrinhoItemsDiv.innerHTML = ''; // Limpar o conteúdo atual

            // Obter o carrinho do localStorage
            let carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];

            // Verificar se o carrinho está vazio
            if (carrinho.length === 0) {
                carrinhoItemsDiv.innerHTML = '<p>Seu carrinho está vazio.</p>';
            } else {
                // Iterar sobre os itens do carrinho e criar elementos HTML para cada item
                carrinho.forEach(item => {
                    const itemDiv = document.createElement('div');
                    itemDiv.classList.add('carrinho-item');
                    itemDiv.innerHTML = `
                        <div class="product-info">
                            <h3>${item.nome}</h3>
                            <p class="price">Preço: ${item.preco}</p>
                            <p>Marca: ${item.marca}</p>
                        </div>
                        <button onclick="removerDoCarrinho('${item.nome}')" class="remover-item">Remover</button>
                    `;
                    carrinhoItemsDiv.appendChild(itemDiv);
                });
            }
        }

        // Event listener para aguardar o carregamento completo da página
        document.addEventListener('DOMContentLoaded', function() {
            inicializarCarrinhoPage();
        });
    </script>
</body>
</html>
