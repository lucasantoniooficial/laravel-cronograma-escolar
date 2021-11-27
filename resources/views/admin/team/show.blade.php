<x-app-layout>
    <x-slot name="header">
        Turmas
    </x-slot>

    <div class="container-fluid">
        <div class="card card-primary card-outline">
            <div class="card-body">
                <small>Código: <strong>{{$team->code}}</strong></small>
                <div class="row">
                    <div class="col-3">
                        <p>Nome: <strong>{{$team->name}}</strong></p>
                    </div>
                    <div class="col-3">
                        <p>Carga horária: <strong>@lang(':x hora:s', [
                            'x' => $team->hours,
                            's' => $team->hours > 1 ? 's' : null
                        ])</strong></p>
                    </div>
                    <div class="col-3">
                        <p>Data de início: <strong>{{$team->start->format('d/m/Y')}}</strong></p>
                    </div>
                    <div class="col-3">
                        <p>Data de término: <strong>{{$team->end}}</strong></p>
                    </div>
                </div>
                <p>Semanas de aula: <strong>{{$team->weeks->pluck('name')->join(', ',' e ')}}</strong></p>
                <hr>
                <h6>Professores</h6>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Matricula</th>
                            <th>Nome</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($team->teachers as $teacher)
                            <tr>
                                <td>{{$teacher->registration}}</td>
                                <td>{{$teacher->user->name}}</td>
                            </tr>
                         @empty
                            <tr>
                                <td colspan="4" class="text-center">Esta turma não se encontra com nenhum professor</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <hr>
                <h6>Eventos</h6>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Data</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($team->events as $event)
                            <tr>
                                <td>{{$event->name}}</td>
                                <td>{{$event->date->format('d/m/Y')}}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="text-center">Esta turma não tem nenhum evento</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <hr>
                <h6>Calendário</h6>
                <div id="container-calendar" class="row"></div>
                <div class="mt-2 d-flex justify-content-center">
                    <a href="{{route('admin.teams.index')}}" class="btn btn-danger">Voltar</a>
                </div>
            </div>
        </div>
    </div>
    @push('script')
        <script src="{{mix('js/team/calendar.js')}}"></script>
    @endpush
</x-app-layout>
