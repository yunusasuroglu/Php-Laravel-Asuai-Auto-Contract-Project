@extends('layout.layout')
@section('title', 'Yapay Zeka Danışmana Sor')
@section('description', 'Yapay zeka destekli danışmanlık hizmeti ile iş ve hukuk alanında profesyonel tavsiyeler alın. Sorularınıza hızlı ve doğru cevaplar vererek, size en uygun çözümü sunuyoruz.')
@section('keywords', 'yapay zeka danışmanlık, yapay zeka tavsiye, dijital danışman, iş danışmanlık yazılımı, hukuk danışmanlık yapay zeka, yapay zeka çözüm önerileri, profesyonel tavsiye, akıllı danışmanlık, dijital danışman, AI danışmanlık')
@section('content')
<section style="background-color: #f8f9fa; padding: 28px 0 90px 0;">
<div class="container p-4 mb-4">
    <div style="margin-top: 60px;" class="title">
    </div>
    <div class="row">
        <div class="col-lg-7 mb-4">
            <form method="POST" id="privateForm" class="needs-validation" novalidate>
                @csrf
                <div class="row step" id="step5">
                    <h3 class="mb-3">Danışmana Sor</h2>
                    <small class="mb-3">Danışmana Danışmak istediğiniz herşeyi danışabilirsiniz</small>
                    <div class="col-lg-12 mb-3">
                        <div class="form-group">
                            <label class="form-label">Danışılıcak Konu</label>
                            <textarea name="hereDetail" class="form-control" placeholder="Danışmak İstediğiniz Konu Hakkında Tam Detaylı Bilgi" id="floatingTextarea"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-primary next-btn">Oluştur</button>
                    </div>
                </div>
                <input type="hidden" id="hiddenInput" name="hiddenInput" required>
            </form>
        </div>
        <div class="col-lg-5">
            <h3 class="text*center mb-3">Cevap Alanı</h2>
            <div class="mt-4" id="result"></div>
        </div>
    </div>
</div>
</section>
<script src="{{asset('/assets/js/private.js')}}"></script>
@endsection
