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
                                        <button type="button" data-teacher-id="{{$teacher->id}}" class="delete-button btn btn-danger"><i data-teacher-id="{{$teacher->id}}" class="fas fa-trash"></i></button>
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
                    {{$teachers->links()}}
                </div>
            </div>
        </div>
    </div>
    @push('script')
        <script>
            confirmation('delete-button', 'Você realmente deseja excluir ?', 'info', function(e) {
                const teacherId = e.target.getAttribute('data-teacher-id');
                fetch(`/admin/teachers/${teacherId}`, {
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

