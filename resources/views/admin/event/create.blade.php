<x-app-layout>
    <x-slot name="header">
        Eventos
    </x-slot>
    <div class="container-fluid">
        <div class="card card-primary card-outline">
            <div class="card-body">
                <form action="{{route('admin.events.store')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="name">Nome</label>
                                <input type="text" class="form-control" id="name" name="name">
                                @error('name')
                                    <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="date">Data</label>
                                <input type="date" name="date" id="date" class="form-control">
                                @error('date')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="description">Observação</label>
                                <textarea name="description" id="description" class="form-control"></textarea>
                                @error('description')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="recorrency">Recorrente</label>
                                <select name="recorrency" id="recorrency" class="form-control">
                                    <option value="1">Sim</option>
                                    <option value="0" selected>Não</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="teacher_id">Professor</label>
                                <select name="teacher_id" id="teacher_id" class="form-control">
                                    <option value="" selected>Selecione</option>
                                    @foreach($teachers as $teacher)
                                        <option value="{{$teacher->id}}">{{$teacher->user->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="team_id">Turma</label>
                                <select multiple name="team_id[]" id="team_id" class="form-control">
                                    @foreach($teams as $team)
                                        <option value="{{$team->id}}">{{$team->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="d-grid gap-3">
                        <button class="btn btn-primary">Cadastrar</button>
                        <a href="{{route('admin.events.index')}}" class="btn btn-danger">Voltar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @push('script')
        <script>
            $('#teacher_id').select2();
            $('#team_id').select2({
                placeholder: "Selecione",
                theme: "classic",
            });
        </script>
    @endpush
</x-app-layout>
