<x-app-layout>
    <x-slot name="header">
        Turmas
    </x-slot>

    <div class="container-fluid">
        <div class="card card-primary card-outline">
            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        <p>Nome: <strong>{{$event->name}}</strong></p>
                    </div>
                    <div class="col-3">
                        <p>Data: <strong>{{$event->date->format('d/m/Y')}}</strong></p>
                    </div>
                    <div class="col-3">
                        <p>Recorrente: <strong>{{$event->recorrency}}</strong></p>
                    </div>
                    <div class="col-3">
                        <p>Professor: <strong>{{$event->teacher->user->name ?? 'Turma toda'}}</strong></p>
                    </div>
                </div>
                <hr>
                <h6>Turmas</h6>
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Código</th>
                        <th>Início</th>
                        <th>Quantidade de horas</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($event->teams as $team)
                        <tr>
                            <td>{{$team->name}}</td>
                            <td>{{$team->code}}</td>
                            <td>{{$team->start->format('d/m/Y')}}</td>
                            <td>{{$team->hours}}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Este professor não se encontra em nenhuma turma</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                <hr>
                <div class="mt-2 d-flex justify-content-center">
                    <a href="{{route('admin.teams.index')}}" class="btn btn-danger">Voltar</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
