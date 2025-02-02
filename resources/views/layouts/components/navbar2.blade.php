<nav class="navbar navbar-expand-md navbar-dark bg-black">
    <a class="navbar-brand ml-4" href="{{ route('welcome') }}">
        {{ config('app.name', 'Laravel') }}
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav me-auto">
            @auth()
                @if(Auth::user()->tipo_usuario_id == 1)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('instituicao.index') }}" style="color: white;">{{ __('Instituições') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('solicitacao.admin.index')}}" style="color: white;">{{ __('Solicitações') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('usuarios.index')}}" style="color: white;">{{ __('Usuários') }}</a>
                    </li>
                @endif
            @endauth
        </ul>

        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ms-auto mr-4">
            <!-- Authentication Links -->
            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">{{ __('Sobre') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">{{ __('Contato') }}</a>
                    </li>
                @endif


            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v- style="color: black">
                        <span class="font-weight-bolder">Olá, </span>{{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('user.perfil.editar') }}"> {{ __('Editar Perfil') }}</a>
                        <a class="dropdown-item" href="{{ route('user.senha.editar') }}"> {{ __('Alterar Senha') }}</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Sair') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </div>
</nav>
