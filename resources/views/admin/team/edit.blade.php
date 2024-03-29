<x-app-layout>
    <x-slot name="header">
        Turmas
    </x-slot>
    <div class="container-fluid">
        <div class="card card-primary card-outline">
            <div class="card-body">
                <form action="{{route('admin.teams.update',$team->id)}}" method="post">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="code">Código</label>
                                <input type="text" value="{{$team->code}}" class="form-control" id="code" name="code">
                                @error('code')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="name">Nome</label>
                                <input type="text" value="{{$team->name}}" class="form-control" id="name" name="name">
                                @error('name')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="start">Data início</label>
                                <input type="date" value="{{$team->start->format('Y-m-d')}}" name="start" id="start" class="form-control">
                                @error('start')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="hours">Quantidade de horas</label>
                                <input type="number" value="{{$team->hours}}" name="hours" id="hours" class="form-control">
                                @error('hours')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="color">Cor</label>
                                <input type="color" value="{{$team->color}}" name="color" id="color" class="form-control">
                                @error('color')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="weeks">Dias da semana</label>
                        <select multiple name="weeks[]" id="weeks" class="form-control">
                            @foreach($weeks as $week)
                                <option value="{{$week->id}}" {{$team->weeks->contains($week->id) ? 'selected' : ''}}>{{$week->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="d-grid gap-3">
                        <button class="btn btn-primary">Salvar</button>
                        <a href="{{route('admin.teams.index')}}" class="btn btn-danger">Voltar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @push('script')
        <script>
            $('#weeks').select2({
                placeholder: 'Selecione',
                theme: "classic",
                allowClear: true
            });
        </script>
    @endpush
</x-app-layout>
