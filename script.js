// Função para adicionar um produto ao carrinho com tamanho e preço
function adicionarAoCarrinho(nomeProduto, tamanho, preco) {
    const produto = { nome: nomeProduto, tamanho, preco };

    try {
        const carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];
        carrinho.push(produto);
        localStorage.setItem('carrinho', JSON.stringify(carrinho));
        alert(`${nomeProduto} (${tamanho}) foi adicionado ao carrinho! Preço: R$ ${preco.toFixed(2)}`);
        exibirCarrinho();
    } catch (error) {
        console.error('Erro ao adicionar produto ao carrinho:', error);
    }
}

// Função para exibir os itens do carrinho na página de carrinho.html
function exibirCarrinho() {
    const carrinhoItemsDiv = document.getElementById('carrinho-items');
    if (!carrinhoItemsDiv) return;

    try {
        const carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];
        carrinhoItemsDiv.innerHTML = carrinho.length === 0
            ? '<p>Seu carrinho está vazio.</p>'
            : carrinho.map(item => `
                <div class="carrinho-item">
                    <div class="info">
                        <p>${item.nome} (${item.tamanho})</p>
                        <p class="price">Preço: R$ ${item.preco.toFixed(2)}</p>
                    </div>
                    <button onclick="removerDoCarrinho('${item.nome}', '${item.tamanho}')">Remover</button>
                </div>
            `).join('');
    } catch (error) {
        console.error('Erro ao exibir carrinho:', error);
    }
}

// Função para inicializar a página de carrinho.html
function inicializarCarrinhoPage() {
    exibirCarrinho();
}

// Event listener para aguardar o carregamento completo da página
document.addEventListener('DOMContentLoaded', () => {
    if (window.location.pathname.endsWith('carrinho.html')) {
        inicializarCarrinhoPage();
    }
});

// Função para mostrar os tamanhos disponíveis do produto em um modal
function mostrarTamanhos(nomeProduto, tamanhos, preco) {
    const modal = document.getElementById('modal');
    const modalTitle = document.getElementById('modal-title');
    const tamanhosContainer = document.getElementById('tamanhos-container');

    if (modal && modalTitle && tamanhosContainer) {
        modal.style.display = 'flex';
        modalTitle.textContent = `Tamanhos disponíveis para ${nomeProduto}`;
        tamanhosContainer.innerHTML = tamanhos.map(tamanho => `
            <button class="btn-tamanho" onclick="adicionarAoCarrinho('${nomeProduto}', '${tamanho}', ${preco})">
                ${tamanho}
            </button>
        `).join('');
    } else {
        console.error('Elementos do modal não encontrados.');
    }
}

// Função para fechar o modal
function fecharModal() {
    const modal = document.getElementById('modal');
    if (modal) modal.style.display = 'none';
}

// Função para remover um item específico do carrinho
function removerDoCarrinho(nomeProduto, tamanho) {
    try {
        const carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];
        const carrinhoAtualizado = carrinho.filter(item => item.nome !== nomeProduto || item.tamanho !== tamanho);
        localStorage.setItem('carrinho', JSON.stringify(carrinhoAtualizado));
        exibirCarrinho();
    } catch (error) {
        console.error('Erro ao remover produto do carrinho:', error);
    }
}

// Função para limpar todos os itens do carrinho
function limparCarrinho() {
    localStorage.removeItem('carrinho');
    window.location.href = 'carrinho.html';
}

// Função para mostrar os detalhes do produto em um modal
function mostrarDetalhes(nome, marca, preco, descricao, imagem) {
    const modalProduto = document.getElementById('modal-produto');
    if (modalProduto) {
        document.getElementById('produto-nome').innerText = nome;
        document.getElementById('produto-marca').innerText = 'Marca: ' + marca;
        document.getElementById('produto-preco').innerText = 'Preço: R$ ' + preco.toFixed(2);
        document.getElementById('produto-descricao').innerText = descricao;
        document.getElementById('produto-imagem').src = imagem;
        modalProduto.style.display = 'block';
    } else {
        console.error('Modal de detalhes não encontrado.');
    }
}

// Função para fechar o modal do produto
function fecharModalProduto() {
    const modalProduto = document.getElementById('modal-produto');
    if (modalProduto) modalProduto.style.display = 'none';
}

// Função para fechar o modal ao clicar fora dele
document.addEventListener('click', (event) => {
    const modal = document.getElementById('modal');
    const modalProduto = document.getElementById('modal-produto');
    
    if (event.target === modal) fecharModal();
    if (event.target === modalProduto) fecharModalProduto();
});

// Função para alterar o estilo da barra de navegação ao rolar a página
window.onscroll = () => {
    const navbar = document.querySelector('.navbar');
    if (navbar) {
        navbar.classList.toggle('scrolled', window.pageYOffset > 50);
    }
};
