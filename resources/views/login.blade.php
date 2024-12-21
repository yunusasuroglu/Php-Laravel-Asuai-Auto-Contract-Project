@extends('layout.layout')
@section('title', 'Yapay Zeka Giriş Yap')
@section('description', 'Asur Ai Giriş Yaparak modüllerimizi ücretsiz kullanabilirsiniz')
@section('keywords', 'giriş yap, asur ai giriş yap, yapay zeka giriş yap, danışmanlık yazılımı')
@section('content')
<style>
    body{
        background-color: #fff;
    }
    .form-control::placeholder {
        color: rgba(203, 203, 203, 0.298);
    }
    .card{
        border: none;
        border-top: 5px solid  #007bff;
        box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
        background: #fff;
        color: #000;
    }
    p{
        font-weight: 600;
        font-size: 15px;
    }
    .fab{
        display: flex;
        justify-content: center;
        align-items: center;
        border: none;
        box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
        height: 40px;
        width: 90px;
    }
    .fab:hover{
        cursor: pointer;
    }
    .fa-twitter{
        color: #56ABEC;
    }
    .fa-facebook{
        color: #1775F1;
    }
    .fa-google{
        color: #CB5048;
    }
    .division{
        float: none;
        position: relative;
        margin: 30px auto 20px;
        text-align: center;
        width: 100%;
        box-sizing: border-box;
    }
    .division .line{
        border-top: 1.5px solid #57557A;;
        position: absolute;
        top: 13px;
        width: 85%;
    }
    .line.l{
        left: 52px;
    }
    .line.r{
        right: 45px;
        
    }
    .division span {
        font-weight: 600;
        font-size: 14px;
        position: relative;
        padding-left: 14px;
        padding-right: 14px;
        background: #fff;
        z-index: 5;
    }
    .myform{
        padding: 0 25px 0 33px;
    }
    .bn{
        text-decoration: underline;
    }
    .bn:hover{
        cursor: pointer;
    }
    .form-check-input {
        margin-top: 8px!important;
    }
    .btn-primary{
        background-color: #007bff;
        border: none;
        border-radius: 50px;
    }
    .btn-primary:focus{
        box-shadow: none;
        border: none;
    }
    small{
        color: #F2CEFF;
    }
    .far.fa-user{
        font-size: 13px;
    }
    
    @media(min-width: 767px){
        .bn{
            text-align: right;
        }
    }
    @media(max-width: 767px){
        .form-check{
            text-align: center;
        }
        .bn{
            text-align: center;
            align-items: center;
        }
    }
    @media(max-width: 450px){
        .fab{
            width: 100%;
            height: 100%;
        }
        .division .line{
            width: 50%;
        }
    }
</style>
<section style="background-color: #f8f9fa;  padding: 90px 0 90px 0;">
    <div class="container">
        <div class="row d-flex justify-content-center mt-5">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card py-3 px-2">
                    <p class="text-center mb-3 mt-2">Doğrudan Giriş Yap</p>
                    <div class="row mx-auto ">
                        <div class="col-4">
                            <i class="fab fa-twitter"></i>
                        </div>
                        <div class="col-4">
                            <i class="fab fa-facebook"></i>
                        </div>
                        <div class="col-4">
                            <i class="fab fa-google"></i>
                        </div>
                    </div>
                    <div class="division">
                        <div class="row">
                            <div class="col-3"><div class="line l"></div></div>
                            <div class="col-6"><span>Veya E-Posta İle</span></div>
                            <div class="col-3"><div class="line r"></div></div>
                        </div>
                    </div>
                    <form class="myform" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <input placeholder="example@example.com" value="demo@demo.com" type="email" name="email" id="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <input value="123456789" type="password" name="password" id="password" class="form-control" required>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn w-100 btn-block btn-primary btn-lg">
                                <small style="vertical-align: top;"><i style="margin-right: 10px;" class="far fa-user pr-2"></i>Giriş Yap</small>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

