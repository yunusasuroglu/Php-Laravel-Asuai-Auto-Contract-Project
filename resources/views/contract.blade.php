@extends('layout.layout')
@section('title', 'Yapay Zeka İle Sözleşme Oluştur')
@section('description', 'Yapay zeka destekli sözleşme oluşturma yazılımı ile hukuki işlemlerinizi kolaylaştırın. Hızlı, güvenilir ve profesyonel sözleşmeler oluşturun, zamandan tasarruf edin!')
@section('keywords', 'yapay zeka sözleşme oluşturma, sözleşme oluşturma yazılımı, yapay zeka hukuki destek, otomatik sözleşme oluşturma, sözleşme hazırlama aracı, hukuki yapay zeka yazılımı, akıllı sözleşme oluşturucu, profesyonel sözleşme yazılımı, yapay zeka danışmanlık, dijital sözleşme hazırlama')
@section('content')
<section style="background-color: #f8f9fa;">
<div class="container p-4 mb-4">
    <div style="margin-top: 60px;" class="title">
    </div>
    <div class="row">
        <div class="col-lg-7 mb-4">
            <form method="POST" id="contractForm" class="needs-validation" novalidate>
                <div class="row step" id="step1">
                    @csrf
                    <h3 class="mb-3">Sözleşme Türü ve Ödeme Yöntemi</h2>
                    <div class="col-lg-6 mb-3">
                        <label for="contractType" class="form-label">Sözleşme Türü</label>
                        <select class="form-select" id="contractType" name="contractType" required>
                            <option value="">Sözleşme Türü Seçin</option>
                            <option value="Araç Kiralama">Araç Kiralama</option>
                            <option value="Konut Kiralama">Konut Kiralama</option>
                            <option value="Satış Sözleşmesi">Satış Sözleşmesi</option>
                            <option value="Hizmet Sözleşmesi">Hizmet Sözleşmesi</option>
                            <option value="Araç Satış Sözleşmesi">Araç Satış Sözleşmesi</option>
                            <option value="Takas Sözleşmesi">Takas Sözleşmesi</option>
                            <option value="Ön Alım Sözleşmesi">Ön Alım Sözleşmesi</option>
                            <option value="Bağışlama Sözleşmesi">Bağışlama Sözleşmesi</option>
                            <option value="Taşınmaz Satış Vaadi Sözleşmesi">Taşınmaz Satış Vaadi Sözleşmesi</option>
                            <option value="Sigorta Sözleşmesi">Sigorta Sözleşmesi</option>
                            <option value="Taşıma Sözleşmesi">Taşıma Sözleşmesi</option>
                            <option value="Franchising Sözleşmesi">Franchising Sözleşmesi</option>
                            <option value="Acentelik Sözleşmesi">Acentelik Sözleşmesi</option>
                            <option value="Dağıtım Sözleşmesi">Dağıtım Sözleşmesi</option>
                            <option value="Ticari (Mal) Alım-Satım Sözleşmesi">Ticari (Mal) Alım-Satım Sözleşmesi</option>
                            <option value="İş Sözleşmesi">İş Sözleşmesi</option>
                            <option value="Eser Sözleşmesi">Eser Sözleşmesi</option>
                            <option value="Tüketici Sözleşmesi">Tüketici Sözleşmesi</option>
                            <option value="Adi Ortaklık Sözleşmesi">Adi Ortaklık Sözleşmesi</option>
                            <option value="İpotek Sözleşmesi">İpotek Sözleşmesi</option>
                            <option value="Karz Sözleşmesi">Karz Sözleşmesi</option>
                            <option value="Rehin Sözleşmesi">Rehin Sözleşmesi</option>
                            <option value="Garanti Sözleşmesi">Garanti Sözleşmesi</option>
                            <option value="Gizlilik Sözleşmesi">Gizlilik Sözleşmesi</option>
                            <option value="Komisyon Sözleşmesi">Komisyon Sözleşmesi</option>
                            <option value="Kredi Sözleşmesi">Kredi Sözleşmesi</option>
                            <option value="Kefalet Sözleşmesi">Kefalet Sözleşmesi</option>

                            <option value="Vekalet Sözleşmesi">Vekalet Sözleşmesi</option>
                            <option value=">Ölünceye Kadar Bakma Sözleşmesi">Ölünceye Kadar Bakma Sözleşmesi</option>
                            <option value="Pazarlamacılık Sözleşmesi">Pazarlamacılık Sözleşmesi</option>
                            <option value="Ödünç Sözleşmesi">Ödünç Sözleşmesi</option>
                            <option value="Geri Alım Sözleşmesi">Geri Alım Sözleşmesi</option>
                            <option value="Evlilik Sözleşmesi">Evlilik Sözleşmesi</option>
                            <option value="Evlat Edinme Sözleşmesi">Evlat Edinme Sözleşmesi</option>
                            <option value="Factoring Sözleşmesi">Factoring Sözleşmesi</option>
                            <option value="Miras Taksim Sözleşmesi">Miras Taksim Sözleşmesi</option>
                        </select>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label for="paymentType" class="form-label">Ödeme Yöntemi</label>
                        <select class="form-select" id="paymentType" name="paymentType" required>
                            <option value="">Sözleşme Ödeme Yöntemi Seçin</option>
                            <option value="Banka Transferi">Banka Transferi</option>
                            <option value="Nakit">Nakit</option>
                            <option value="Maaş Ödemesi">Maaş Ödemesi</option>
                            <option value="Taksitli Ödeme">Taksitli Ödeme</option>
                            <option value="Peşinatlı Ödeme">Peşinatlı Ödeme</option>
                            <option value="Sözleşmede Ödeme Yok">Sözleşmede Ödeme Yok</option>
                        </select>
                    </div>
                    <div class="col-lg-12">
                        <a id="nextButton1" class="btn btn-primary w-25 next-btn">İlerle</a>
                    </div>
                </div>
                <div class="row step d-none" id="step2">
                    <h3 class="mb-3">Sözleşmeyi Yapanın Bilgileri | Taraf 1</h2>
                    <div class="mb-3 col-lg-4 col-sm-6 col-12">
                        <label for="companyName" class="form-label">Şirket Adı / İsim Soyisim</label>
                        <input type="text" class="form-control" id="companyName" name="companyName" required>
                    </div>
                    <div class="mb-3 col-lg-4 col-sm-6 col-12">
                        <label for="companyId" class="form-label">Vergi No / TC No</label>
                        <input type="text" class="form-control" id="companyId" name="companyId" required>
                    </div>
                    <div class="mb-3 col-lg-4 col-sm-6 col-12">
                        <label for="companyPhone" class="form-label">Telefon</label>
                        <input type="tel" class="form-control" id="companyPhone" name="companyPhone" required>
                    </div>
                    <div class="mb-3 col-lg-4 col-sm-6 col-12">
                        <label for="companyEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="companyEmail" name="companyEmail" required>
                    </div>
                    <div class="mb-3 col-lg-8 col-sm-6 col-12">
                        <label for="companyEmail" class="form-label">Adres</label>
                        <input type="email" class="form-control" id="companyAddress" name="companyAddress" required>
                    </div>
                    <div class="col-lg-12">
                        <a id="prevButton2" class="btn btn-warning prev-btn">Geri</a>
                        <a id="nextButton2" class="btn btn-primary next-btn">İlerle</a>
                    </div>
                </div>
                <div class="row step d-none" id="step3">
                    <h3 class="mb-3">Sözleşme Yapılan Kişinin Bilgileri  | Taraf 2</h2>
                    <div class="mb-3 col-lg-4 col-sm-6 col-12">
                        <label for="personName" class="form-label">Şirket Adı / İsim Soyisim</label>
                        <input type="text" class="form-control" id="personName" name="personName" required>
                    </div>
                    <div class="mb-3 col-lg-4 col-sm-6 col-12">
                        <label for="companyId" class="form-label">Vergi No / TC No</label>
                        <input type="text" class="form-control" id="companyId" name="companyId" required>
                    </div>
                    <div class="mb-3 col-lg-4 col-sm-6 col-12">
                        <label for="personPhone" class="form-label">Telefon</label>
                        <input type="tel" class="form-control" id="personPhone" name="personPhone" required>
                    </div>
                    <div class="mb-3 col-lg-4 col-sm-6 col-12">
                        <label for="personEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="personEmail" name="personEmail" required>
                    </div>
                    <div class="mb-3 col-lg-8 col-sm-6 col-12">
                        <label for="personEmail" class="form-label">Adres</label>
                        <input type="email" class="form-control" id="personAddress" name="personAddress" required>
                    </div>
                    <div class="col-lg-12">
                        <a id="prevButton3" class="btn btn-warning prev-btn">Geri</a>
                        <a id="nextButton3" class="btn btn-primary next-btn">İlerle</a>
                    </div>
                </div>
                <div class="row step" id="step4">
                    <h3 class="mb-3">Sözleşme Ek Bilgiler</h2>
                    <div id="extraInputs" class="row"></div>
                    <div class="col-lg-12">
                        <a id="prevButton4" class="btn btn-warning prev-btn">Geri</a>
                        <a id="nextButton4" class="btn btn-primary next-btn">İlerle</a>
                    </div>
                </div>
                <div class="row step" id="step5">
                    <h3 class="mb-3">Sözleşme Ödeme Bilgileri</h2>
                    <div id="paymentInputs" class="row"></div>

                    <div class="mb-3 mb-3 col-lg-6 col-sm-6 col-12">
                        <label for="contractStartDate" class="form-label">Sözleşme Başlangıç Tarihi</label>
                        <input type="date" class="form-control" id="contractStartDate" name="contractStartDate" required>
                    </div>
                    <div class="mb-3 col-lg-6 col-sm-6 col-12">
                        <label for="contractEndDate" class="form-label">Sözleşme Bitiş Tarihi</label>
                        <input type="date" class="form-control" id="contractEndDate" name="contractEndDate" required>
                    </div>
                    <div class="col-lg-12">
                        <a id="prevButton5" class="btn btn-warning prev-btn">Geri</a>
                        <button type="submit" class="btn btn-primary next-btn">Oluştur</button>
                    </div>
                </div>
                <input type="hidden" id="hiddenInput" name="hiddenInput" required>
            </form>
        </div>
        <div class="col-lg-5">
            <div class="buttons">
                <button class="btn" style="background-color: #ff0000; color: white; border-radius: 0px !important;" onclick="downloadPDF()">PDF Olarak İndir</button>
                <button class="btn" style="background-color: #002C77; color: white; border-radius: 0px !important;" id="downloadwordBtn">Word Olarak İndir</button>
            </div>

            <div class="mt-4" id="result"></div>
        </div>
    </div>
</div>
</section>
<script src="{{asset('assets/js/contract.js')}}"></script>
@endsection
