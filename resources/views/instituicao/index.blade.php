@extends('layouts.app')

@section('content')
    <div class="row my-4 borda-bottom">
        <div class="col-md-9">
            <h3 class="text-center">Instituições</h3>
        </div>
        <div class="col-md-3">
            <button type="button" class="btn btn-primary w-100 pb-1" data-toggle="modal" data-target="#cadastroModal">
                Cadastrar Instituição
            </button>
        </div>
    </div>

    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">Nome</th>
            <th class="w-25 text-center" scope="col">Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($instituicaos as $instituicao)
            <tr>
                <td>{{$instituicao->nome}}</td>
                <td class="text-center">
                    <a class="btn btn-group" href="{{route('unidade.index', ['instituicao_id' => $instituicao->id])}}"><i class="fa-solid fa-up-right-from-square"></i></a>
                    <button class="btn btn-group" type="button" data-toggle="modal" data-target="#editModal_{{$instituicao->id}}"><i class="fa-solid fa-pen-to-square"></i></button>
                    <a class="btn btn-group text-danger" href="{{route('instituicao.delete', ['instituicao_id' => $instituicao->id])}}"><i class="fa-solid fa-trash"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="modal fade" id="cadastroModal" tabindex="-1" role="dialog" aria-labelledby="cadastroModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cadastroModalLabel">Cadastrar Instituição</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('instituicao.store') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="row justify-content-center mt-2">
                            <div class="col-sm-10">
                                <label for="nome">Nome da Instituição:<strong style="color: red">*</strong></label>
                                <input class="form-control @error('nome') is-invalid @enderror" id="nome" name="nome" value="{{ old('nome') }}" required autocomplete="nome"
                                       autofocus>
                                @error('nome')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-success">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @foreach($instituicaos as $instituicao)
        <div class="modal fade" id="editModal_{{$instituicao->id}}" tabindex="-1" role="dialog" aria-labelledby="cadastroModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="cadastroModalLabel">Editar Instituição</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="{{ route('instituicao.update') }}">
                        @csrf
                        <div class="modal-body">
                            <input type="hidden" name="id" value="{{$instituicao->id}}">
                            <div class="row justify-content-center mt-2">
                                <div class="col-sm-10">
                                    <label for="nome">Nome da Instituição:</label>
                                    <input class="form-control @error('nome') is-invalid @enderror" id="nome" name="nome" value="{{ $instituicao->nome }}" autocomplete="nome"
                                           autofocus>
                                    @error('nome')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-success">Alterar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    <script>
        $('.table').DataTable({
            searching: true,
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "info": "Exibindo página _PAGE_ de _PAGES_",
                "search": "Pesquisar",
                "infoEmpty": "",
                "zeroRecords": "Nenhuma Instituição Cadastrada.",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Próximo"
                }
            },
            "order": [],
            "columnDefs": [{
                "targets": [0, 1],
                "orderable": false
            }]
        });
    </script>
@endsection
