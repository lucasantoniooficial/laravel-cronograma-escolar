<x-app-layout>
    <x-slot name="header">
        Professores
    </x-slot>

    <x-slot name="breadcrumb">
        <a href="{{route('admin.teachers.create')}}" class="btn btn-primary">Cadastrar</a>
    </x-slot>
    <div class="container-fluid">
        <div class="card card-primary card-outline">
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Matricula</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($teachers as $teacher)
                            <tr>
                                <td><a href="{{route('admin.teachers.show', $teacher->id)}}">{{$teacher->user->name}}</a></td>
                                <td>{{$teacher->user->email}}</td>
                                <td>{{$teacher->registration}}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{route('admin.teachers.edit', $teacher->id)}}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                        <a href="{{route('admin.teachers.destroy', $teacher->id)}}" onclick="event.preventDefault(); document.getElementById('form-delete-{{$teacher->id}}').submit();" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                        <form action="{{route('admin.teachers.destroy', $teacher->id)}}" class="d-none" id="form-delete-{{$teacher->id}}" method="post">
                                            @csrf
                                            @method('delete')
                                        </form>
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
            </div>
        </div>
    </div>
</x-app-layout>
