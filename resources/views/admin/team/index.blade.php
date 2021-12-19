<x-app-layout>
    <x-slot name="header">
        Turmas
    </x-slot>

    <x-slot name="breadcrumb">
        <a href="{{route('admin.teams.create')}}" class="btn btn-primary">Cadastrar</a>
    </x-slot>
    <div class="container-fluid">
        <div class="card card-primary card-outline">
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nome</th>
                            <th>Data início</th>
                            <th>Data fim</th>
                            <th>Quantidade de horas</th>
                            <th>Cor</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($teams as $team)
                        <tr>
                            <td><a href="{{route('admin.teams.show', $team->id)}}">{{$team->code}}</a></td>
                            <td><a href="{{route('admin.teams.show', $team->id)}}">{{$team->name}}</a></td>
                            <td>{{$team->start->format('d/m/Y')}}</td>
                            <td>{{$team->end}}</td>
                            <td>{{$team->hours}}</td>
                            <td style="background: {{$team->color}}"></td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{route('admin.teams.edit', $team->id)}}" class="btn btn-info" title="Editar turma"><i class="fas fa-edit"></i></a>
                                    <a href="{{route('admin.teams.add.teacher', $team->id)}}" class="btn btn-success" title="Adicionar professor a turma"><i class="fas fa-user-plus"></i></a>
                                    <button type="button" data-id="{{$team->id}}" class="delete-button btn btn-danger" title="Excluir turma"><i data-id="{{$team->id}}" class="fas fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr >
                            <td colspan="7">
                                <p class="text-center">
                                    Nenhum registro foi encontrado
                                </p>
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                <div class="mt-2 d-flex justify-content-end">
                    {{$teams->links()}}
                </div>
            </div>
        </div>
    </div>
    @push('script')
        <script>
            confirmation('delete-button', 'Você realmente deseja excluir ?', 'info', function(e) {
                const id = e.target.getAttribute('data-id');
                fetch(`/admin/teams/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{csrf_token()}}'
                    }
                }).then(e => {
                    setTimeout(function() {
                        window.location.reload()
                    }, 2500);
                });
            });
        </script>
    @endpush
</x-app-layout>

