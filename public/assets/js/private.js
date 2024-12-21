document.getElementById('privateForm').addEventListener('submit', function (event) {
    event.preventDefault(); // Sayfanın yenilenmesini engelle
    
    // Tüm form verilerini alma
    const formData = new FormData(this);
    let generatedText = "Merhaba Öncelikle sen bir danışmansın. Bu bilgileri Sana Danışmak İstiyorum:\n";
    
    // Form verilerini metin olarak oluştur
    for (const [key, value] of formData.entries()) {
        if (value.trim() !== "" && key !== "_token" && key !== "hiddenInput") {
            const label = document.querySelector(`label[for="${key}"]`)?.innerText || key;
            generatedText += `${label}: ${value}\n`;
        }
    }
    
    // Son cümleyi ekleme
    generatedText += "Bana Gereken Bilgiyi Sağlarmısın";
    
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
    fetch("{{ route('create.private') }}", {
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