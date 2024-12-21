document.getElementById('projectType').addEventListener('change', handleProjectTypeChange);

function handleProjectTypeChange(e) {
    const extraInputs = document.getElementById('extraInputs');
    extraInputs.innerHTML = '';
    const types = {
        'World İle Araştırma': [
            { label: 'Sayfa Sayısı', type: 'text',placeholder: 'text', name: 'numberOfPages' },
            { label: 'Araştırılıcak Başlık', type: 'text',placeholder: 'text', name: 'title' },
        ],
        'Haber Yazısı': [
            { label: 'Sayfa Sayısı', type: 'text',placeholder: 'text', name: 'numberOfPages' },
            { label: 'Haber Başlığı', type: 'text',placeholder: 'text', name: 'title' },
            { label: 'Haber Yazarı', type: 'text',placeholder: 'text', name: 'author' },
        ],
        'Power Point Sunum': [
            { label: 'Sayfa Sayısı', type: 'text',placeholder: 'text', name: 'numberOfPages' },
            { label: 'Sunum Başlığı', type: 'text',placeholder: 'text', name: 'title' },
        ],
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

function downloadPDF() {
    const element = document.getElementById('result');
    
    const options = {
        margin: 10,
        filename: 'proje.pdf',
        image: { type: 'jpeg', quality: 0.98 },
        html2canvas: { 
            scale: 2,
            useCORS: true
        },
        jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
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
            <title>Proje</title>
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
    link.download = "proje.docx";
    link.click();
}
document.getElementById('projectForm').addEventListener('submit', function (event) {
    event.preventDefault(); // Sayfanın yenilenmesini engelle
    
    // Tüm form verilerini alma
    const formData = new FormData(this);
    let generatedText = "Proje detayları:\n";
    
    // Form verilerini metin olarak oluştur
    for (const [key, value] of formData.entries()) {
        if (value.trim() !== "" && key !== "_token" && key !== "hiddenInput") {
            const label = document.querySelector(`label[for="${key}"]`)?.innerText || key;
            generatedText += `${label}: ${value}\n`;
        }
    }
    
    // Son cümleyi ekleme
    generatedText += "Merhaba Öncelikle sen bir profesörsün ve Anlattığım bilgiler ile bana bir proje hazırlamanı istiyorum. Projeyi Html Etiketlerini kullanalarak oluşturmanı ve altına not yazmamanı istiyorum.";
    
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
    fetch("{{ route('create.project') }}", {
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