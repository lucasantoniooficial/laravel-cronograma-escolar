<x-app-layout>
    <x-slot name="header">
        Calendário do ano
    </x-slot>

    <div class="container-fluid">
        <div class="card card-primary card-outline">
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Ano</th>
                            <th>Possui calendário próprio ?</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($holidays as $holiday)
                            <tr>
                                <td><a href="{{route('admin.holidays.show', $holiday->year)}}">{{$holiday->year}}</a></td>
                                <td>
                                    {{$holiday->calendar}}
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" id="delete-button" data-holiday-id="{{$holiday->year}}" class="btn btn-danger"><i data-holiday-id="{{$holiday->year}}" class="fas fa-trash"></i></button>
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
                    {{$holidays->links()}}
                </div>
            </div>
        </div>
    </div>
    @push('script')
        <script>
            confirmation('delete-button', 'Você realmente deseja excluir ?', 'info', function(e) {
                const teacherId = e.target.getAttribute('data-holiday-id');
                fetch(`/admin/holidays/${teacherId}`, {
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

