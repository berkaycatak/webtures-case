<x-app-layout>
    <x-slot name="website_title">Proje Oluştur</x-slot>
    <x-slot name="website_description">Proje Oluştur</x-slot>

    <div class="row">
        <div class="col-lg-12">
            <div class="card spur-card">
                <div class="card-body ">
                    <form method="POST" action="{{ route("projects.store") }}">
                        @csrf
                        <div class="form-group row">
                            <label for="title" class="col-sm-2 col-form-label">Proje İsmi</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="title" id="title" value="{{ old("title") }}" placeholder="Proje İsmi" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="title" class="col-sm-2 col-form-label">Başlama tarihi:</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="date" value="{{ old("date") }}" type="date" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="website_url" class="col-sm-2 col-form-label">Web sitesi:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="website_url" name="website_url" value="{{ old("website_url") }}" placeholder="Proje web sitesi" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">Açıklama</label>
                            <textarea class="form-control" name="description" id="description" rows="3" placeholder="Proje açıklaması">{{ old("description") }}</textarea>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2">Proje durumu:</div>
                            <div class="col-sm-10">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="status" id="status" {{ old("status") ? "checked" : "" }}>
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
