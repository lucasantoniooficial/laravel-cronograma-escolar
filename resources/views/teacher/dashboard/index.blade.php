<x-app-layout>
    <x-slot name="header">
        Turmas
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
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($teams as $team)
                        <tr>
                            <td><a href="{{route('teacher.teams.show', $team->id)}}">{{$team->code}}</a></td>
                            <td><a href="{{route('teacher.teams.show', $team->id)}}">{{$team->name}}</a></td>
                            <td>{{$team->start->format('d/m/Y')}}</td>
                            <td>{{$team->end}}</td>
                            <td>{{$team->hours}}</td>
                            <td style="background: {{$team->color}}"></td>
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
            </div>
        </div>
    </div>
    @push('script')
        <script>
            confirmation('delete-button', 'Você realmente deseja excluir ?', 'info', function(e) {
                const id = e.target.getAttribute('data-id');
                fetch(`/admin/events/${id}`, {
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

