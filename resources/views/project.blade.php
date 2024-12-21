@extends('layout.layout')
@section('content')
<section style="background-color: #f8f9fa;">

<div class="container p-4 mb-4">
    <div style="margin-top: 60px;" class="title">
    </div>
    <div class="row">
        <div class="col-lg-6 mb-4">
            <form method="POST" id="projectForm" class="needs-validation" novalidate>
                <div class="row step" id="step1">
                    @csrf
                    <h3 class="mb-3">Proje Türü</h2>
                    <div class="col-lg-12 mb-3">
                        <label for="projectType" class="form-label">Proje Türü</label>
                        <select class="form-select" id="projectType" name="projectType" required>
                            <option value="">Proje Türü Seçin</option>
                            <option value="World İle Araştırma">World İle Araştırma</option>
                            <option value="Haber Yazısı">Haber Yazısı</option>
                            <option value="Power Point Sunum">Power Point Sunum</option>
                            <option value="Özel">Özel</option>
                        </select>
                    </div>
                    <div class="col-lg-12">
                        <a id="nextButton1" class="btn btn-primary w-25 next-btn">İlerle</a>
                    </div>
                </div>
                <div class="row step" id="step3">
                    <h3 class="mb-3">Proje Ek Bilgiler</h2>
                    <small>(Power Point Olarak İndirme Şuanda Desteklenmemektedir o sebeble şuanlık sadece Bilgiler Alıp Kopyala Yapıştır yapabilirsiniz.)</small>
                    <div id="extraInputs" class="row"></div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-label">Proje Hakkında Tam Detaylı Bilgi</label>
                            <textarea name="projectDetail" class="form-control" placeholder="Tam olarak detaylı bilgileri giriniz" id="floatingTextarea"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <a id="prevButton4" class="btn btn-warning prev-btn">Geri</a>
                        <button id="" type="submit" class="btn btn-primary next-btn">İlerle</button>
                    </div>
                </div>
                <input type="hidden" id="hiddenInput" name="hiddenInput" required>
            </form>
        </div>
        <div class="col-lg-6">
            <div class="buttons">
                <button class="btn" style="background-color: #ff0000; color: white; border-radius: 0px !important;" onclick="downloadPDF()">PDF Olarak İndir</button>
                <button class="btn" style="background-color: #002C77; color: white; border-radius: 0px !important;" id="downloadwordBtn">Word Olarak İndir</button>
            </div>
            <div style="min-width: 625px !important;" class="mt-4" id="result"></div>
        </div>
    </div>
</div>

</section>
<script src="{{asset('/assets/js/project.js')}}"></script>
@endsection
