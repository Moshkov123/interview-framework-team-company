<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h4 class="text-center my-3 pb-3">To Do App</h4>

                    <form class="row row-cols-lg-auto g-3 justify-content-center align-items-center mb-4 pb-2" method="POST" action="/dashboard">
                        @csrf
                        <div class="col-12">
                            <div class="form-outline">
                                <input type="text" id="task" class="form-control" name="task" placeholder="Введите задачу" />
                            </div>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Сохранить задачу</button>
                        </div>
                    </form>
                    <table class="table mb-4">
                        <thead>
                            <tr>
                                <th scope="col">Текст задачи</th>
                                <th scope="col">Кнопка</th>
                            </tr>
                        </thead>
                        @foreach($private as $el)
                        @if($el->users_id == Auth::id())
                        <tr>
                            <td>{{ $el->task }}</td>
                            <td>
                                <form action="{{ route('dashboard.delete', ['id' => $el->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Удалить</button>
                                </form>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
    </section>
    </div>
    </div>
    </div>
    </div>
</x-app-layout>