// Função para adicionar um produto ao carrinho com tamanho e preço
function adicionarAoCarrinho(nomeProduto, tamanho, preco) {
    const produto = {
        nome: nomeProduto,
        tamanho: tamanho,
        preco: preco
    };

    let carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];
    carrinho.push(produto);
    localStorage.setItem('carrinho', JSON.stringify(carrinho));

    alert(`${nomeProduto} (${tamanho}) foi adicionado ao carrinho! Preço: R$ ${preco.toFixed(2)}`);
    exibirCarrinho();
}

// Função para exibir os itens do carrinho na página de carrinho.html
function exibirCarrinho() {
    const carrinhoItemsDiv = document.getElementById('carrinho-items');
    carrinhoItemsDiv.innerHTML = '';
    
    let carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];
    if (carrinho.length === 0) {
        carrinhoItemsDiv.innerHTML = '<p>Seu carrinho está vazio.</p>';
    } else {
        carrinho.forEach(item => {
            const itemDiv = document.createElement('div');
            itemDiv.classList.add('carrinho-item');
            itemDiv.innerHTML = `
                <div class="info">
                    <p>${item.nome} (${item.tamanho})</p>
                    <p class="price">Preço: R$ ${item.preco.toFixed(2)}</p>
                </div>
                <button onclick="removerDoCarrinho('${item.nome}', '${item.tamanho}')">Remover</button>
            `;
            carrinhoItemsDiv.appendChild(itemDiv);
        });
    }
}

// Função para inicializar a página de carrinho.html
function inicializarCarrinhoPage() {
    exibirCarrinho();
}

// Event listener para aguardar o carregamento completo da página
document.addEventListener('DOMContentLoaded', function() {
    if (window.location.pathname.endsWith('carrinho.html')) {
        inicializarCarrinhoPage();
    }
});

// Função para mostrar os tamanhos disponíveis do produto em um modal
function mostrarTamanhos(nomeProduto, tamanhos, preco) {
    const modal = document.getElementById('modal');
    const modalTitle = document.getElementById('modal-title');
    const tamanhosContainer = document.getElementById('tamanhos-container');

    modal.style.display = 'flex';
    modalTitle.textContent = `Tamanhos disponíveis para ${nomeProduto}`;
    tamanhosContainer.innerHTML = '';

    tamanhos.forEach(tamanho => {
        const btnTamanho = document.createElement('button');
        btnTamanho.textContent = tamanho;
        btnTamanho.classList.add('btn-tamanho');
        btnTamanho.onclick = () => adicionarAoCarrinho(nomeProduto, tamanho, preco);
        tamanhosContainer.appendChild(btnTamanho);
    });
}

// Função para fechar o modal
function fecharModal() {
    const modal = document.getElementById('modal');
    modal.style.display = 'none';
}

// Função para remover um item específico do carrinho
function removerDoCarrinho(nomeProduto, tamanho) {
    let carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];
    carrinho = carrinho.filter(item => item.nome !== nomeProduto || item.tamanho !== tamanho);
    localStorage.setItem('carrinho', JSON.stringify(carrinho));
    exibirCarrinho();
}

// Função para limpar todos os itens do carrinho
function limparCarrinho() {
    localStorage.removeItem('carrinho');
    window.location.href = 'carrinho.html';
}

// Função para mostrar os detalhes do produto em um modal
function mostrarDetalhes(nome, marca, preco, descricao, imagem) {
    document.getElementById('produto-nome').innerText = nome;
    document.getElementById('produto-marca').innerText = 'Marca: ' + marca;
    document.getElementById('produto-preco').innerText = 'Preço: ' + preco;
    document.getElementById('produto-descricao').innerText = descricao;
    document.getElementById('produto-imagem').src = imagem;

    document.getElementById('modal-produto').style.display = 'block';
}

// Função para fechar o modal do produto
function fecharModalProduto() {
    document.getElementById('modal-produto').style.display = 'none';
}

// Função para fechar o modal ao clicar fora dele
document.addEventListener('click', function(event) {
    const modal = document.getElementById('modal');
    const modalProduto = document.getElementById('modal-produto');
    
    if (event.target === modal || event.target === modalProduto) {
        fecharModal();
        fecharModalProduto();
    }
});
