<x-app-layout>
    <x-slot name="header">
        Eventos
    </x-slot>

    <x-slot name="breadcrumb">
        <a href="{{route('admin.events.create')}}" class="btn btn-primary">Cadastrar</a>
    </x-slot>
    <div class="container-fluid">
        <div class="card card-primary card-outline">
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Data</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($events as $event)
                        <tr>
                            <td><a href="{{route('admin.events.show', $event->id)}}">{{$event->name}}</a></td>
                            <td>{{$event->date->format('d/m/Y')}}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{route('admin.events.edit', $event->id)}}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                    <button type="button" data-id="{{$event->id}}" class="delete-button btn btn-danger"><i data-id="{{$event->id}}" class="fas fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr >
                            <td colspan="4">
                                <p class="text-center">
                                    Nenhum registro foi encontrado
                                </p>
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                <div class="mt-2 d-flex justify-content-end">
                    {{$events->links()}}
                </div>
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

