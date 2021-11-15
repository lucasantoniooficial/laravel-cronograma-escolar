<x-app-layout>
    <x-slot name="header">
        Professores
    </x-slot>

    <div class="container-fluid">
        <div class="card card-primary card-outline">
            <div class="card-body">
                <small>Matricula: <strong>{{$teacher->registration}}</strong></small>
                <div class="row">
                    <div class="col-6">
                        <p>Nome: <strong>{{$teacher->user->name}}</strong></p>
                    </div>
                    <div class="col-6">
                        <p>E-mail: <strong>{{$teacher->user->email}}</strong></p>
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
                        @forelse($teacher->teams as $team)
                            <tr>
                                <td>{{$team->name}}</td>
                                <td>{{$team->code}}</td>
                                <td>{{$team->start}}</td>
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
                <h6>Eventos</h6>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Data</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($teacher->events as $event)
                            <tr>
                                <td>{{$event->name}}</td>
                                <td>{{$event->date}}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="text-center">Este professor não tem nenhum evento</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="mt-2 d-flex justify-content-center">
                    <a href="{{route('admin.teachers.index')}}" class="btn btn-danger">Voltar</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
