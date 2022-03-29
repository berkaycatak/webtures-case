<x-app-layout>
    <x-slot name="website_title">Projelerim</x-slot>
    <x-slot name="website_description">Projelerim</x-slot>
    <x-slot name="header_action">
        <a href="{{ route('projects.create') }}">
            <edit-button-component><i class="fa fa-plus"></i> Proje Oluştur</edit-button-component>
        </a>
    </x-slot>

    <div class="row">
        <div class="col-lg-12">
            <div class="card spur-card">
                <div class="card-body ">
                    <table class="table table-in-card">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Adı</th>
                                <th scope="col">Açıklama</th>
                                <th scope="col">Website</th>
                                <th scope="col">Durum</th>
                                <th scope="col">İşlemler</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($projects as $project)
                                <tr>
                                    <th scope="row">{{ $project->id }}</th>
                                    <td>{{ $project->title }}</td>
                                    <td>{{ $project->description }}</td>
                                    <td>{{ $project->website_url }}</td>
                                    <td>{{ $project->status == "completed" ? "Tamamlandı" : "Devam ediyor" }}</td>
                                    <td>
                                        <div class="row">
                                            <a href="{{ route("projects.edit", $project->id) }}"><edit-button-component>Düzenle</edit-button-component></a>
                                            <form class="ml-1" method="POST" action="{{ route('projects.destroy', $project->id) }}">
                                                @method("DELETE") @csrf
                                                <delete-button-component/>
                                            </form>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $projects->links() !!}

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
