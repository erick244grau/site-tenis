// Função para adicionar um produto ao carrinho com tamanho e preço
function adicionarAoCarrinho(nomeProduto, tamanho, preco) {
    // Criar um objeto com as informações do produto
    const produto = {
        nome: nomeProduto,
        tamanho: tamanho,
        preco: preco
    };

    // Obter o carrinho do localStorage ou criar um novo array se estiver vazio
    let carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];

    // Adicionar o produto ao carrinho
    carrinho.push(produto);

    // Salvar o carrinho atualizado no localStorage
    localStorage.setItem('carrinho', JSON.stringify(carrinho));

    // Exibir uma mensagem de confirmação para o usuário
    alert(`${nomeProduto} (${tamanho}) foi adicionado ao carrinho! Preço: R$ ${preco.toFixed(2)}`);

    // Atualizar a exibição do carrinho na página, se necessário
    exibirCarrinho();
}

// Função para exibir os itens do carrinho na página de carrinho.html
function exibirCarrinho() {
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
                <div class="info">
                    <p>${item.nome} (${item.tamanho})</p>
                    <p class="price">Preço: R$ ${item.preco.toFixed(2)}</p>
                </div>
                <button onclick="removerDoCarrinho('${item.nome}')">Remover</button>
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
    // Verificar se estamos na página de carrinho.html
    if (window.location.pathname.endsWith('carrinho.html')) {
        inicializarCarrinhoPage();
    }
});

// Função para mostrar os tamanhos disponíveis do produto em um modal
function mostrarTamanhos(nomeProduto, tamanhos, preco) {
    const modal = document.getElementById('modal');
    const modalTitle = document.getElementById('modal-title');
    const tamanhosContainer = document.getElementById('tamanhos-container');

    modal.style.display = 'flex'; // Mostra o modal

    // Define o título do modal com o nome do produto
    modalTitle.textContent = `Tamanhos disponíveis para ${nomeProduto}`;

    // Limpa o conteúdo atual do container de tamanhos
    tamanhosContainer.innerHTML = '';

    // Adiciona os tamanhos disponíveis ao container de tamanhos
    tamanhos.forEach(tamanho => {
        const btnTamanho = document.createElement('button');
        btnTamanho.textContent = tamanho;
        btnTamanho.classList.add('btn-tamanho');
        btnTamanho.onclick = () => adicionarAoCarrinho(nomeProduto, tamanho, preco); // Adiciona o tamanho ao carrinho
        tamanhosContainer.appendChild(btnTamanho);
    });
}

// Função para fechar o modal
function fecharModal() {
    const modal = document.getElementById('modal');
    modal.style.display = 'none'; // Esconde o modal
}
// Função para remover um item específico do carrinho
function removerDoCarrinho(nomeProduto) {
    // Obter o carrinho do localStorage
    let carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];

    // Filtrar o carrinho para remover o item pelo nome
    carrinho = carrinho.filter(item => item.nome !== nomeProduto);

    // Salvar o carrinho atualizado no localStorage
    localStorage.setItem('carrinho', JSON.stringify(carrinho));

    // Atualizar a exibição dos itens do carrinho na página
    exibirCarrinho();
}

// Função para inicializar a página de carrinho.html
function inicializarCarrinhoPage() {
    exibirCarrinho();
}

// Event listener para aguardar o carregamento completo da página
document.addEventListener('DOMContentLoaded', function() {
    // Verificar se estamos na página de carrinho.html
    if (window.location.pathname.endsWith('carrinho.html')) {
        inicializarCarrinhoPage();
    }
});

// Função para mostrar os tamanhos disponíveis do produto em um modal
function mostrarTamanhos(nomeProduto, tamanhos, preco) {
    const modal = document.getElementById('modal');
    const modalTitle = document.getElementById('modal-title');
    const tamanhosContainer = document.getElementById('tamanhos-container');

    modal.style.display = 'flex'; // Mostra o modal

    // Define o título do modal com o nome do produto
    modalTitle.textContent = `Tamanhos disponíveis para ${nomeProduto}`;

    // Limpa o conteúdo atual do container de tamanhos
    tamanhosContainer.innerHTML = '';

    // Adiciona os tamanhos disponíveis ao container de tamanhos
    tamanhos.forEach(tamanho => {
        const btnTamanho = document.createElement('button');
        btnTamanho.textContent = tamanho;
        btnTamanho.classList.add('btn-tamanho');
        btnTamanho.onclick = () => adicionarAoCarrinho(nomeProduto, tamanho, preco); // Adiciona o tamanho ao carrinho
        tamanhosContainer.appendChild(btnTamanho);
    });
}

// Função para fechar o modal
function fecharModal() {
    const modal = document.getElementById('modal');
    modal.style.display = 'none'; // Esconde o modal
}
// Função para limpar todos os itens do carrinho
function limparCarrinho() {
    // Limpar o carrinho no localStorage
    localStorage.removeItem('carrinho');

    // Redirecionar para a página de carrinho para atualizar a exibição
    window.location.href = 'carrinho.html';
    
}
function mostrarDetalhes(nome, marca, preco, descricao, imagem) {
    document.getElementById('produto-nome').innerText = nome;
    document.getElementById('produto-marca').innerText = 'Marca: ' + marca;
    document.getElementById('produto-preco').innerText = 'Preço: ' + preco;
    document.getElementById('produto-descricao').innerText = descricao;
    document.getElementById('produto-imagem').src = imagem;

    document.getElementById('modal-produto').style.display = 'block';
}

function fecharModalProduto() {
    document.getElementById('modal-produto').style.display = 'none';
}



