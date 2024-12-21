document.getElementById('contractType').addEventListener('change', handleContractTypeChange);

function handleContractTypeChange(e) {
    const extraInputs = document.getElementById('extraInputs');
    extraInputs.innerHTML = '';
    const types = {
        'Araç Kiralama': [
            { label: 'Araç Plakası', type: 'text',placeholder: '(Örnek: 34test3434)', name: 'vehiclePlate' },
            { label: 'Araç Marka Model', type: 'text',placeholder: '(Örnek: Audi A4)', name: 'carBrand' },
            { label: 'Kira Bedeli', type: 'text',placeholder: '(Örnek: Toplam Kira Bedeli)', name: 'rentalPrice' },
            { label: 'Kira Süresi (Başlangıç)', type: 'date', name: 'rentalStartDate' },
            { label: 'Kira Süresi (Bitiş)', type: 'date', name: 'rentalEndDate' }
        ],
        'Konut Kiralama': [
            { label: 'Kiralanan Konut Adresi', type: 'text',placeholder: '(Örnek: mahalle, cadde - sokak, bina no , daire no , şehir / ilçe)', name: 'housingAddress' },
            { label: '1 Aylık Kira Bedeli', type: 'text',placeholder: '1 Aylık Kira Bedeli', name: 'housingMonthlyPrice' }
        ],
        'Satış Sözleşmesi': [
            { label: 'Ürün / Hizmet Detayları', type: 'text',placeholder: '(Örnek: Diş Fırçası - Yeşil - Slikon)', name: 'productDetail' }
        ],
        'Hizmet Sözleşmesi': [
            { label: 'Verilen / Verilecek Hizmet', type: 'text',placeholder: '(Örnek: Temizlik Hizmeti)', name: 'service' },
            { label: 'Verilen / Verilecek Hizmetin Bedeli', type: 'text',placeholder: 'Hizmetin Toplam Bedeli', name: 'servicePrice' }
        ],
        'Takas Sözleşmesi': [
            { label: '1. Taraf Verilecek Mal / Hizmet', type: 'text',placeholder: '1. Taraf Verilicek Mal / Hizmet', name: '1_swap' },
            { label: '2. Taraf Verilecek Mal / Hizmet', type: 'text',placeholder: '2. Taraf Verilicek Mal / Hizmet', name: '2_swap' },
        ],
        'Ön Alım Sözleşmesi': [
            { label: 'Satılacak Ürün / Hizmet Detayları', type: 'text',placeholder: 'Tam Detaylı Bilgiyi Giriniz', name: 'productDetail' },
            { label: 'Satılacak Ürün / Hizmet Bedeli', type: 'text',placeholder: 'Toplam Bedeli Giriniz', name: 'productPrice' },
            { label: 'Satılacak Ürün / Hizmet Kaporası', type: 'text',placeholder: 'Varsa kapora giriniz', name: 'productDeposit' },
            { label: 'Satılacak Ürün / Hizmet Teslim Tarihi', type: 'date', name: 'productDeliverDate' },
            { label: 'Satılacak Ürün / Hizmet Teslim Yeri', type: 'text',placeholder: '(Örnek: mahalle, cadde - sokak, bina no , daire no , şehir / ilçe)', name: 'productDeliverLocation' },
        ],
        'Bağışlama Sözleşmesi': [
            { label: 'Bağışlanacaklar', type: 'text',placeholder: '(Örnek: Araç, Konut, çek, eser)', name: 'donations' },
            { label: 'Bağışlanan Teslim Tarihi ve Yeri', type: 'text',placeholder: '(Örnek: 11.11.2024 - antep)', name: 'donationDeliverLocationDate' },
            { label: 'Şartlı Bağış', type: 'radio', value: 'Şartlı Bağış', name: 'donationCondition' },
            { label: 'Şartsız Bağış', type: 'radio', value: 'Şartsız Bağış', name: 'donationCondition' },
        ],
        'Taşınmaz Satış Vaadi Sözleşmesi': [
            { label: 'Taşınmazın Sahibi', type: 'text',placeholder: 'İsim Soyisim', name: 'buildOwner' },
            { label: 'Taşınmazın Sahibi TCNO', type: 'text',placeholder: 'TCNO', name: 'buildIdNumber' },
            { label: 'Adresi', type: 'text',placeholder: 'Adresi', name: 'buildIdNumber' },
            { label: 'Ada ve Parsel Numarası', type: 'text',placeholder: 'Ada ve Parsel no ', name: 'deedInfo' },
            { label: 'Yüz Ölçümü', type: 'text',placeholder: 'Metrekaresi', name: 'areaMeasurement' },
            { label: 'Niteliği', type: 'text',placeholder: 'Niteliği', name: 'qualification' },
            { label: 'Bağımsız Bölüm Numarası', type: 'text',placeholder: 'Bağımsız Bölüm Numarası', name: 'deedInfo2' },
            { label: 'Cilt ve Sayfa Numarası', type: 'text',placeholder: 'Cilt ve Sayfa No', name: 'deedInfo3' },
            { label: 'Edinim Türü', type: 'text',placeholder: 'Edinim türü', name: 'deedInfo4' },
            { label: 'İmar Durumu', type: 'text',placeholder: 'İmar Durumu', name: 'deedInfo5' },
            { label: 'Şerhler ve Beyanlar', type: 'text',placeholder: 'Şerhler ve Beyanlar', name: 'deedInfo6' },
            { label: 'Tescil Tarihi ve Tapu Sicil Müdürlüğü', type: 'text',placeholder: 'Tescil Tarihi ve Tapu Sicil Müdürlüğü', text: 'deedInfo7' },
            { label: 'Satış Bedeli', type: 'text', name: 'salesPrice' },
            { label: 'Taşınmazın Teslim Tarihi', type: 'date', name: 'deliverDateLocation' },
        ],
        'Sigorta Sözleşmesi': [
            { label: 'Sigorta Türü', type: 'text',placeholder: '(Örnek: Sağlık, Araç, Konut)', name: 'insuranceType' },
            { label: 'Sigorta Konusu', type: 'text',placeholder: 'Örnek Araç Sigortası, Telefon Sigortası', name: 'insuranceContent' },
            { label: 'Sigortalı Mal / Kişi', type: 'text',placeholder: 'Örnek Araç Sigortası, Telefon Sigortası',name: 'insuranceProduct' },
            { label: 'Sigorta Bedeli (Yıllık)', type: 'text',placeholder: '12 Aylık Tutar',name: 'insurancePriceYearly' },
            { label: 'Sigorta Bedeli (Aylık)', type: 'text',placeholder: '1 Aylık Tutar',name: 'insurancePriceMonthly' },
        ],
        'Taşıma Sözleşmesi': [
            { label: 'Eşyanın Türü', type: 'text',placeholder: 'Taşınanın Türü', name: 'furnitureType' },
            { label: 'Miktarı / Ağırlığı', type: 'text',placeholder: 'Miktarı (Eğer ev yada ofis ise bu kısmı boş geçebilirsiniz)', name: 'furnitureQty' },
            { label: 'Ambalaj ve Paketleme Durumu', type: 'text',placeholder: 'Taşınacak Eşyanın Paketleme Durumu',name: 'furniturePackage' },
            { label: 'Yükleme Adresi', type: 'text',placeholder: 'Yükleme Adresi',name: 'furnitureDeliverAddress' },
            { label: 'Varış Adresi', type: 'text',placeholder: 'Varış Adresi',name: 'furniturePickupAddress' },
            { label: 'Taşıma Ücreti', type: 'text',placeholder: 'virgüller ile yazmayınız',name: 'furniturePrice' },
        ],
        'Franchising Sözleşmesi': [
            { label: 'Giriş Bedeli', type: 'text',placeholder: 'Giriş Bedeli', name: 'entrancePrice' },
            { label: 'Aylık Royalty Ücreti', type: 'text',placeholder: 'Brüt cironun %', name: 'monthlyRoyaltyPrice' },
            { label: 'Reklam ve Pazarlama Payı', type: 'text',placeholder: 'Brüt cironun %',name: 'adsDigitalMarketingPrice' },
            { label: 'Yıllkık Toplam Bedel', type: 'text',placeholder: 'Yıllık Toplam', name: 'yearlyTotal' },
            { label: 'Aylık Ödeme', type: 'radio', value: 'Aylık Ödeme', name: 'monthlyPrice' },
            { label: 'Yıllık Ödeme', type: 'radio', value: 'Yıllık Ödeme', name: 'yearlyPrice' },
        ],
        'Araç Satış Sözleşmesi': [
            { label: 'Araç Plakası', type: 'text',placeholder: '(Örnek: 00YY00)', name: 'carPlate' },
            { label: 'Araç Cinsi', type: 'text',placeholder: '(Örnek: otomobil, minibüs)', name: 'carType' },
            { label: 'Araç Marka', type: 'text',placeholder: '(Örnek: Audi)', name: 'carBrand' },
            { label: 'Araç Modeli', type: 'text',placeholder: '(Örnek: A4)', name: 'carModel' },
            { label: 'Araç Rengi', type: 'text',placeholder: '(Örnek: Beyaz)', name: 'carColor' },
            { label: 'Araç Motor No', type: 'text',placeholder: '(Örnek: 00000000)', name: 'carEngineNumber' },
            { label: 'Araç Şase No', type: 'text',placeholder: '(Örnek: 00000000)', name: 'carVehicleIdentificationNumber' },
            { label: 'Araç Ruhsat Sahibi', type: 'text',placeholder: '(Örnek: Ruhsat Sahibinin İsmi)', name: 'carLicenseHolder' },
        ],
        'Acentelik Sözleşmesi': [
            { label: 'Satış Bedeli', type: 'text',placeholder: 'Satış Bedeli', name: 'sellPrice' },
            { label: 'Komisyon Oranı', type: 'text',placeholder: 'Satış bedelinin %', name: 'commissionRatio' }
        ],
        'Ticari (Mal) Alım-Satım Sözleşmesi': [
            { label: 'Malın Açıklaması', type: 'text',placeholder: 'Malın Açıklaması', name: 'productContent' },
            { label: 'Malın Cinsi', type: 'text',placeholder: 'Malın Cinsi', name: 'productType' },
            { label: 'Malın Miktarı', type: 'text',placeholder: 'Malın Miktarı', name: 'productQty' },
            { label: 'Malın Kalitesi/Standardı', type: 'text',placeholder: 'Malın Kalitesi ve Standardı', name: 'productQuality' },
            { label: 'Ambalaj ve Etiketleme', type: 'text',placeholder: 'Ambalaj ve Etiketleme Durumu', name: 'productTicket' },
            { label: 'Toplam Satış Bedeli', type: 'text',placeholder: 'Toplam Satış Bedeli', name: 'productTotalPrice' },
            { label: 'Ödeme Tarihi', type: 'date', name: 'priceDate' },
            { label: 'Gecikme Faizi', type: 'text',placeholder: 'Satış bedelinin %', name: 'interest' },
            { label: 'Teslim Yeri', type: 'text',placeholder: 'Teslimat Adresi', name: 'deliverLocation' },
            { label: 'Teslim Tarihi', type: 'date', name: 'deliverDate' },
        ],
        'İş Sözleşmesi': [
            { label: 'Sektör', type: 'text',placeholder: 'Sektör', name: 'sector' },
            { label: 'Çalışanın Pozisyonu', type: 'text',placeholder: 'Satış bedelinin %', name: 'personPosition' },
            { label: 'İşe Başlama Tarihi', type: 'date', name: 'workStartDate' },
            { label: 'Çalışma Saati ve Toplam Gün', type: 'text',placeholder: 'Örn: 45 Saat - 2 Gün', name: 'workTimeAndDay' },
            { label: 'Ücret Aylık Net', type: 'text',placeholder: 'Satış bedelinin %', name: 'monthlyPriceNet' },
            { label: 'Ücret Aylık Brüt', type: 'text',placeholder: 'Satış bedelinin %', name: 'monthlyPriceBrut' },
            { label: 'Ödeme Tarihi', type: 'text',placeholder: 'Örn: (Her Ayın ... Günü)', name: 'paymentDate' },
            { label: 'Yan Haklar', type: 'text',placeholder: 'Örn: (yol,yemek)', name: 'fringeBenefits' },
        ],
        'Eser Sözleşmesi': [
            { label: 'Eserin Türü', type: 'text',placeholder: 'Eserin Türü', name: 'workType' },
            { label: 'Teknik Özellikleri', type: 'text',placeholder: 'Teknik Özellikleri', name: 'technicalFeatures' },
            { label: 'Teslim yeri ve Şekli', type: 'text',placeholder: 'Teslim yeri ve Şekli', name: 'deliverLocation' },
            { label: 'Toplam Bedeli', type: 'text',placeholder: 'Toplam Bedeli', name: 'totalPrice' },
        ],
        'Dağıtım Sözleşmesi': [
            { label: 'Dağıtım Bölgesi', type: 'text',placeholder: 'Dağıtım Bölgesi:', name: 'location' },
            { label: 'Ürünler', type: 'text',placeholder: 'Ürünler', name: 'products' },
        ],
        'Tüketici Sözleşmesi': [
            { label: 'Ürün / Hizmet', type: 'text',placeholder: 'Ürün / Hizmet:', name: 'location' },
            { label: 'Miktar', type: 'text',placeholder: 'Miktar', name: 'qty' },
            { label: 'Fiyat', type: 'text',placeholder: 'Fiyat', name: 'price' },
            { label: 'Teslimat Tarihi', type: 'text',placeholder: 'Teslimat Tarihi', name: 'deliverDate' },
        ],
        'Adi Ortaklık Sözleşmesi': [
            { label: 'Alan', type: 'text',placeholder: 'Alan:', name: 'sector' },
            { label: 'Taraf 1 Sermaye Katkısı', type: 'text',placeholder: 'person1CapitalContribution', name: 'qty' },
            { label: 'Taraf 2 Sermaye Katkısı', type: 'text',placeholder: 'Taraf 2 Sermaye Katkısı', name: 'person2CapitalContribution' },
            { label: 'Ortaklığı Temsil Eden Ad Soyad', type: 'text',placeholder: 'Ortaklığı Temsil Eden Ad Soyad', name: 'partnershipRepresentative' },
        ],
        'Karz Sözleşmesi': [
            { label: 'Borç Tutarı', type: 'text',placeholder: 'Borç Tutarı:', name: 'debtPrice' },
            { label: 'Ödeme Tarihi', type: 'date', name: 'paymentDate' },
            { label: 'Faiz Oranı', type: 'text',placeholder: '(varsa belirtilir)', name: 'interest' },
            { label: 'Masraflar ve Komisyonlar', type: 'text',placeholder: 'Masraflar ve Komisyonlar', name: 'capital' },
        ],
        'Rehin Sözleşmesi': [
            { label: 'Rehnin İsmi', type: 'text',placeholder: 'Rehnin İsmi:', name: 'nameOfPledge' },
            { label: 'Rehnin Türü', type: 'text',placeholder: 'Borç Tutarı:', name: 'typeOfPledge' },
            { label: 'Rehnin Tanımı', type: 'text',placeholder: 'Borç Tutarı:', name: 'definitionOfPledge' },
            { label: 'Değeri', type: 'text',placeholder: '(varsa belirtilir)', name: 'value' },
            { label: 'Borç Tutarı', type: 'text',placeholder: 'Borç Tutarı', name: 'debtTotal' },
            { label: 'Ödeme Tarihi', type: 'date', name: 'paymentDate' },
        ],
        'Garanti Sözleşmesi': [
            { label: 'Garanti Kapsamındaki Ürün/Hizmet', type: 'text',placeholder: 'Garanti Kapsamındaki Ürün/Hizmet:', name: 'g1' },
            { label: 'Garanti Süresi Gün', type: 'text',placeholder: 'Garanti Süresi Gün:', name: 'g2' },
            { label: 'Garanti Şartları', type: 'text',placeholder: 'Garanti Şartları:', name: 'g3' },
            { label: 'Hariç Tutulan Durumlar', type: 'text',placeholder: '(varsa belirtilir)', name: 'g4' },
        ],
        'Gizlilik Sözleşmesi': [
            { label: 'Gizlenicek Bilgiler', type: 'text',placeholder: 'Gizlenicek Bilgilerin Özeti', name: 's1' },
        ],
        'Komisyon Sözleşmesi': [
            { label: 'Mal / Hizmet Adı', type: 'text',placeholder: 'Mal / Hizmet Adı', name: 'serviceName' },
            { label: 'Mal / Hizmet Bedeli', type: 'text',placeholder: 'Mal / Hizmet Bedeli', name: 'servicePrice' },
            { label: 'Satış', type: 'radio', value: 'Satış', name: 'sell' },
            { label: 'Aracılık', type: 'radio', value: 'Aracılık', name: 'tool' },
            { label: 'Komisyon Oranı %', type: 'text',placeholder: '% ile Belirtilir', name: 'commissionRatio' },
        ],
        'Kredi Sözleşmesi': [
            { label: 'Kredi Tutarı', type: 'text',placeholder: 'Kredi Tutarı', name: 'k1' },
            { label: 'Kredi Kullanım Amacı', type: 'text',placeholder: 'Kredi Kullanım Amacı', name: 'k2' },
            { label: 'Kredi Vadesi', type: 'text' ,placeholder: 'Kredi Vadesi', name: 'k3' },
            { label: 'Kredi Faiz Oranı', type: 'text',placeholder: 'Kredi Faiz Oranı', name: 'k4' },
            { label: 'Ödeme Planı', type: 'text',placeholder: 'Ödeme Planı Örn. Aylık, Yıllık', name: 'k5' },
            { label: 'Aylık Ödeme Tutarı', type: 'text',placeholder: 'Aylık Ödeme Tutarı', name: 'k6' },
        ],
        'Kefalet Sözleşmesi': [
            { label: 'Kefil Ad Soyad', type: 'text',placeholder: 'Kefil Ad Soyad', name: 'k1' },
            { label: 'Kefil TCNO', type: 'text',placeholder: 'Kefil TCNO', name: 'k2' },
            { label: 'Kefil Adres', type: 'text' ,placeholder: 'Kefil Adres', name: 'k3' },
            { label: 'Kefil Telefon', type: 'text',placeholder: 'Kefil Telefon', name: 'k4' },
            { label: 'Kefil E-Posta', type: 'text',placeholder: 'Kefil E-Posta', name: 'k5' },
            { label: 'Borç Tutarı', type: 'text',placeholder: 'Borç Tutarı Toplam', name: 'k6' },
            { label: 'Borç Türü', type: 'text',placeholder: 'Kredi, kira, borç, vb.', name: 'k7' },
            { label: 'Faiz Oranı %', type: 'text',placeholder: 'Faiz Oranı Varsa', name: 'k8' },
        ]
    };
    (types[e.target.value] || []).forEach(({ label, type, name,placeholder }) => {
        const div = document.createElement('div');
        div.classList.add('mb-3','col-lg-6');
        if (type === 'checkbox') {
            div.innerHTML = `
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="${name}" name="${name}">
                            <label class="form-check-label" for="${name}">${label}</label>
                        </div>
                    `;
        }else if(type == 'radio')
            div.innerHTML = `
                        <div class="form-radio">
                            <input type="radio" class="form-check-input" id="${name}" name="${name}">
                            <label class="form-check-label" for="${name}">${label}</label>
                        </div>
                    `;
        else {
            div.innerHTML = `
                        <label class="form-label">${label}</label>
                        <input placeholder="${placeholder}" type="${type}" class="form-control" name="${name}" required>
                    `;
        }
        extraInputs.appendChild(div);
    });
}

document.addEventListener('DOMContentLoaded', () => {
    let currentStep = 0;
    const steps = document.querySelectorAll('.step');
    
    function showStep(stepIndex) {
        steps.forEach((step, index) => {
            step.classList.toggle('d-none', index !== stepIndex);
        });
    }
    
    document.querySelectorAll('.next-btn').forEach((btn, index) => {
        btn.addEventListener('click', () => {
            if (currentStep < steps.length - 1) {
                currentStep++;
                showStep(currentStep);
            }
        });
    });
    
    document.querySelectorAll('.prev-btn').forEach((btn, index) => {
        btn.addEventListener('click', () => {
            if (currentStep > 0) {
                currentStep--;
                showStep(currentStep);
            }
        });
    });
    
    showStep(currentStep);
});

document.getElementById('paymentType').addEventListener('change', handlePaymentTypeChange);

function handlePaymentTypeChange(e) {
    const extraInputs = document.getElementById('paymentInputs');
    extraInputs.innerHTML = '';
    const types = {
        'Nakit': [
            { label: 'Ödenicek Tutar', type: 'text',placeholder: '(Örnek: Sağlık, Araç, Konut)', name: 'cashPrice' }
        ],
        'Banka Transferi': [
            { label: 'Ödenicek Tutar', type: 'text',placeholder: '', name: 'cashPrice' },
            { label: 'Banka Adı', type: 'text',placeholder: '', name: 'bankName' },
            { label: 'Banka Şube', type: 'text',placeholder: '', name: 'bankCountry' },
            { label: 'Banka Şube No', type: 'text',placeholder: '', name: 'bankNo' },
            { label: 'İban', type: 'text',placeholder: '', name: 'bankIban' },
        ],
        'Taksitli Ödeme': [
            { label: 'Ödenicek Toplam Tutar', type: 'text',placeholder: '', name: 'totalPrice' },
            { label: 'Vade', type: 'text',placeholder: '', name: 'paymentMonth' },
            { label: 'Aylık Tutar', type: 'text',placeholder: '', name: 'monthPrice' },
        ],
        'Peşinatlı Ödeme': [
            { label: 'Ödenicek Toplam Tutar', type: 'text',placeholder: '', name: 'totalPrice' },
            { label: 'Verilen Peşinat', type: 'text',placeholder: '', name: 'totalAmount' },
            { label: 'Kalan Tutar', type: 'text',placeholder: '', name: 'netPrice' },
        ],
        'Maaş Ödemesi': [
            { label: 'Aylık Maaş Tutarı', type: 'text',placeholder: '', name: 'monthlyPrice' },
            { label: 'Günlük Maaş Tutarı', type: 'text',placeholder: '', name: 'dayPrice' },
        ],
        
    };
    (types[e.target.value] || []).forEach(({ label, type, name }) => {
        const div = document.createElement('div');
        div.classList.add('mb-3','col-lg-6');
        div.innerHTML = `<label class="form-label">${label}</label><input type="${type}" class="form-control" name="${name}" required>`;
        extraInputs.appendChild(div);
    });
}

function downloadPDF() {
    const element = document.getElementById('result');
    
    const options = {
        margin: 10,        // Kenar boşluğu
        filename: 'sozlesme.pdf',  // PDF dosyasının adı
        image: { type: 'jpeg', quality: 0.98 },  // Görüntü ayarları
        html2canvas: { 
            scale: 2,   // Kaliteli render için ölçekleme
            useCORS: true  // CORS uyumlu dış resimler
        },
        jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }  // Sayfa formatı
    };
    
    html2pdf().from(element).set(options).save();
}
document.getElementById("downloadWordBtn").addEventListener("click", downloadWord);
function downloadWord() {
    var content = document.getElementById("result").innerHTML;
    var html = `
            <!DOCTYPE html>
            <html lang="tr">
            <head>
                <meta charset="UTF-8">
                <title>Sözleşme</title>
                <style>
                    body { font-family: Arial, sans-serif; font-size: 12pt; }
                </style>
            </head>
            <body>
                ${content}
            </body>
            </html>
        `;
    
    var converted = htmlDocx.asBlob(html);
    var link = document.createElement("a");
    link.href = URL.createObjectURL(converted);
    link.download = "sozlesme.docx";
    link.click();
}

document.getElementById('contractForm').addEventListener('submit', function (event) {
    event.preventDefault(); // Sayfanın yenilenmesini engelle
    
    // Tüm form verilerini alma
    const formData = new FormData(this);
    let generatedText = "Sözleşme detayları:\n";
    
    // Form verilerini metin olarak oluştur
    for (const [key, value] of formData.entries()) {
        if (value.trim() !== "" && key !== "_token" && key !== "hiddenInput") {
            const label = document.querySelector(`label[for="${key}"]`)?.innerText || key;
            generatedText += `${label}: ${value}\n`;
        }
    }
    
    // Son cümleyi ekleme
    generatedText += "Bu bilgiler ile HTML Etiketlerini doctype html açmadan sadece etiketleri Kullanarak bir Sözleşme oluşturur musun?  Not yazısı olmasın ve  Kod Bloğu içinde Olmasın";
    
    // Gizli inputa metni yazma
    document.getElementById('hiddenInput').value = generatedText;
    function startLoading() {
        document.getElementById('load').style.display = 'block';
    }
    
    // Loading animasyonunu durdur
    function stopLoading() {
        document.getElementById('load').style.display = 'none';
    }
    // API isteği
    fetch("{{ route('create.contract') }}", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value
        },
        body: JSON.stringify({
            hiddenInput: generatedText
        })
    })
    .then(response => response.json())  // JSON yanıtını almak için
    .then(result => {
        stopLoading(); // Yanıt geldikten sonra loading'i durdur
        if (result.text) {  // 'text' alanını kontrol ediyoruz
            document.getElementById('result').innerHTML = `
                    ${result.text}
                `;
            formatContent();
        } else {
            document.getElementById('result').innerHTML = `
                    <p style="color: red;">Yanıt alınamadı. API yanıtı beklenmedik şekilde geldi.</p>
                `;
        }
    })
    .catch(error => {
        stopLoading(); // Hata durumunda da loading'i durdur
        console.error("API isteği başarısız:", error);
        document.getElementById('result').innerHTML = `
                <p style="color: red;">API isteği başarısız oldu.</p>
            `;
    });
    
    startLoading();
});
function formatContent() {
    const resultDiv = document.getElementById('result');
    if (resultDiv) {
        let content = resultDiv.innerHTML;
        
        // HTML kod bloklarını temizle
        content = content.replace(/```html/g, '');
        content = content.replace(/```/g, '');
        
        // Temizlenmiş içeriği tekrar yerleştir
        resultDiv.innerHTML = content.trim();
    }
}