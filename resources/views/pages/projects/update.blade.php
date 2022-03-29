<x-app-layout>
    <x-slot name="website_title">Proje Düzenle</x-slot>
    <x-slot name="website_description">Proje Düzenle</x-slot>

    <div class="row">
        <div class="col-lg-12">
            <div class="card spur-card">
                <div class="card-body ">
                    <form method="POST" action="{{ route("projects.update", $project->id) }}">
                        @csrf @method("PUT")
                        <div class="form-group row">
                            <label for="title" class="col-sm-2 col-form-label">Proje İsmi</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="title" id="title" value="{{ old("title") ? old("title") :  $project->title }}" placeholder="Proje İsmi" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="title" class="col-sm-2 col-form-label">Başlama tarihi:</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="date" value="{{ old("date") ? old("date") :  $project->date }}" type="date" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="website_url" class="col-sm-2 col-form-label">Web sitesi:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="website_url" name="website_url" value="{{ old("website_url") ? old("website_url") :  $project->website_url }}" placeholder="Proje web sitesi" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">Açıklama</label>
                            <textarea class="form-control" name="description" id="description" rows="3" placeholder="Proje açıklaması">{{ old("description") ? old("description") :  $project->description }}</textarea>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2">Proje durumu:</div>
                            <div class="col-sm-10">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="status" id="status" @if(old("status")) checked @elseif(!old("title") && $project->status != "continues") checked @endif>
                                    <label class="custom-control-label" for="status">Tamamlandı</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Oluştur</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
