<header>
    <div>
        <ul class="header">
            <li class="header">
                <a class="{{ request()->routeIs('home') ? 'active' : (request()->routeIs('emprestimos.get') ? 'active' : 'header') }}" href="{{ route('emprestimos.get') }}">Home</a>
            </li>
            <li class="header">
                <a class="{{ request()->routeIs('clientes.get') ? 'active' : 'header' }}" href="{{ route('clientes.get') }}">Clientes</a>
            </li>
            <li class="header">
                <a class="{{ request()->routeIs('livros.get') ? 'active' : 'header' }}" href="{{ route('livros.get') }}">Livros</a>
            </li>
        </ul>
    </div>
</header>
