<x-app-layout>
    <x-slot name="header">
        Calendário do ano
    </x-slot>

    <div class="container-fluid">
        <div class="card card-primary card-outline">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h6>Eventos</h6>
                    <a href="{{route('admin.events.create')}}" class="btn btn-primary">Cadastrar</a>
                </div>
                <hr>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Data</th>
                            <th>Recorrente</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($events as $event)
                            <tr>
                                <td>{{$event->name}}</td>
                                <td>{{$event->date->format('d/m/Y')}}</td>
                                <td>{{$event->recorrency}}</td>
                                <td>
                                    <div class="btn-group">
                                        <div class="btn-group">
                                            <a href="{{route('admin.events.edit', $event->id)}}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                            <button type="button" id="delete-button" data-event-id="{{$event->id}}" class="btn btn-danger"><i data-event-id="{{$event->id}}" class="fas fa-trash"></i></button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                         @empty
                            <tr>
                                <td colspan="4" class="text-center">Este professor não se encontra em nenhuma turma</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <hr>
                <div id="container-calendar" class="row"></div>

                <a href="{{route('admin.holidays.index')}}" class="btn btn-danger mt-3">Voltar</a>
            </div>
        </div>
    </div>
    @push('script')
        <script src="{{mix('js/holidays/calendar.js')}}"></script>
        <script>
            confirmation('delete-button', 'Você realmente deseja excluir ?', 'info', function(e) {
                const teacherId = e.target.getAttribute('data-event-id');
                fetch(`/admin/events/${teacherId}`, {
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
