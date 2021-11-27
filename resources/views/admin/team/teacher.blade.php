<x-app-layout>
    <x-slot name="header">
        Turmas
    </x-slot>
    <div class="container-fluid">
        <div class="card card-primary card-outline">
            <div class="card-body">
                <form action="{{route('admin.teams.teacher',$team->id)}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="teacher_id">Professor</label>
                                <select multiple name="teacher_id[]" id="teacher_id" class="form-control">
                                    @foreach($teachers as $teacher)
                                        <option value="{{$teacher->id}}" {{$team->teachers->contains($teacher->id) ? 'selected' : ''}}>{{$teacher->user->name}}</option>
                                    @endforeach
                                </select>
                                @error('teacher_id')
                                    <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
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
            $('#teacher_id').select2({
                placeholder: 'Selecione',
                theme: "classic",
                allowClear: true
            });
        </script>
    @endpush
</x-app-layout>
