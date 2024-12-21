@extends('layout.layout')
@section('title', 'Anasayfa')
@section('description', 'Asur Soft, yapay zeka destekli danışmanlık, sözleşme oluşturma ve proje yönetimi çözümleri sunar. Hukuki ve iş süreçlerinizi kolaylaştırarak zaman ve maliyet tasarrufu sağlar.')
@section('keywords', 'yapay zeka danışmanlık, sözleşme oluşturma, proje yönetimi, yapay zeka yazılımı, dijital danışmanlık, hukuki danışmanlık, AI çözüm önerileri, profesyonel yazılım, dijital çözüm, zaman tasarrufu yazılımı')
@section('content')
<style>
.title{
    background: -webkit-linear-gradient(#eee, #333);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
   font-size: 40px;
}
.moving-image {
    animation: move-up-and-down 5s ease-in-out infinite;
}

@keyframes move-up-and-down {
    0% {
        transform: translateY(-10px);
    }
    50% {
        transform: translateY(10px);
    }
    100% {
        transform: translateY(-10px);
    }
}
.btn-home {
  padding: 15px 20px;
  border: none;
  outline: none;
  background-color: #151515;
  color: #eee;
  border-radius: 7px;
  font-weight: 600;
  cursor: pointer;
  transition: all 0.25s ease-out;
  text-decoration: none;
}

.btn-home:hover {
  transform: translateY(-3px);
}

.btn-home-span {
  color: #aaa;
}
</style>
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
<pre>{{ json_encode(session('contractData'), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}</pre>
@endif
@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif
<section id="home">
    <div class="row container mx-auto">
        <div class="col-lg-6">
            <h1 class="mb-4 title">Asur Ai Yapay Zeka Destekli Hukuki ve Proje Danışmanlık Çözümleri</h1>
            <p class="mb-5">
            Hukuki süreçlerinizi kolaylaştırın, profesyonel sözleşmeler ve dava dilekçeleri oluşturun, projelerinizi en verimli şekilde yönetin. Yapay zekamız, ihtiyaçlarınıza göre özelleştirilmiş çözümler sunarak zaman ve maliyet      tasarrufu sağlar. Danışmanlık ve proje yönetimi için de gelişmiş araçlarımızla her adımda yanınızdayız.
            </p>
            <a href="{{route('register')}}" class="btn-home">  Hemen Başlayın <span class="button-span"> ─ Ücretsiz</span></a>
        </div>
        <div class="col-lg-6">
            <img class="moving-image img-fluid mx-auto d-block" src="{{asset('assets/images/ai.png')}}" alt="">
        </div>
    </div>
</section>

<section id="about" style="background-color: #f8f9fa;">
    <div class="row container mx-auto">
        <div class="col-lg-6">
            <img class="img-fluid mx-auto d-block" src="{{asset('assets/images/ai2.avif')}}" alt="">
        </div>
        <div class="col-lg-6">
            <h2 class="mb-4 title">Hakkımızda</h2>
            <p><b>Hukuki ve Proje Danışmanlığında Yeni Bir Dönem: Asur AI</b></p>

            <p>Bu panel, hukuki işlemlerinizde ve hayata geçirmek istediğiniz projelerde size rehberlik etmek için yapay zeka teknolojisinin gücünden yararlanarak tasarlanmıştır. Asur Soft ve kurucusu Yunus Emre Aşuroğlu tarafından geliştirilen bu yenilikçi çözüm, karmaşık hukuki süreçlerle karşılaştığınızda en etkili ve pratik çözümleri sunmayı hedefler.</p>

            <h5>Amacımız ve Vizyonumuz</h5>
            <p>Projemizin temel amacı, hukuki işlemler ve proje yönetim süreçlerinde karşılaşılan zorlukları yapay zeka destekli araçlarla aşmak ve kullanıcılara hızlı, doğru, güvenilir bir destek sunmaktır. Bu sistem, yalnızca bir çözüm önerisi geliştirmekle kalmaz; aynı zamanda bu çözümü etkili bir şekilde uygulamanıza da yardımcı olur.</p>
            
            <h5>Hangi Modüller Sunuluyor?</h5>
            <p>Asur AI, farklı ihtiyaçlara yönelik bir dizi kullanışlı modül içerir:</p>
            <ul>
                <li><b>Danışmanlık Hizmetleri:</b> Hukuki süreçlerinizde rehberlik eden bir asistan.</li>
                <li><b>Sözleşme Oluşturma:</b> Profesyonel sözleşmeleri hızla oluşturun.</li>
                 <li><b> Proje Yönetimi:</b> Fikirlerinizi hayata geçirmenize yardımcı olan araçlar ve çözümler.</li>
            </ul>

            <h5>Neden Asur AI?</h5>
            <p><b>Asur Soft</b> olarak, yazılım çözümlerimizi her zaman insanların işlerini kolaylaştıracak, hayatlarını daha verimli hale getirecek şekilde tasarlıyoruz. Asur AI ile amacımız yalnızca bir araç sunmak değil; aynı zamanda güvenilir bir iş ortağı olarak sizinle birlikte hareket etmek.

Gelin, yapay zeka teknolojisinin sağladığı yeniliklerle tanışın ve işlerinizi bir üst seviyeye taşıyın.</p>
        </div>
    </div>
</section>
@endsection
