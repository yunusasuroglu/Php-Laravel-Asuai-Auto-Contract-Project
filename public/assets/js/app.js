window.onload = function() {
    const resultDiv = document.getElementById('result');
    if (resultDiv) {
        let content = resultDiv.innerHTML;
        
        content = content.replace(/```html/g, '');
        content = content.replace(/```/g, '');
        
        resultDiv.innerHTML = content.trim();
    }
};
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const targetId = this.getAttribute('href');
        const targetElement = document.querySelector(targetId);
        const targetPosition = targetElement.offsetTop; // Hedef konum
        
        // Yavaş kaydırma animasyonu
        const startPosition = window.scrollY;
        const distance = targetPosition - startPosition;
        const duration = 800; // 800ms
        let start = null;
        
        function smoothScroll(timestamp) {
            if (!start) start = timestamp;
            const progress = timestamp - start;
            const progressRate = Math.min(progress / duration, 1); // Animasyonu sınırla
            window.scrollTo(0, startPosition + distance * progressRate);
            
            if (progress < duration) {
                window.requestAnimationFrame(smoothScroll);
            }
        }
        
        window.requestAnimationFrame(smoothScroll);
    });
});