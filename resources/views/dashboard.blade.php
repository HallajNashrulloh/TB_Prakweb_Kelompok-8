@extends('layouts.app')  

@section('content')  
<div class="bg-gradient-to-br from-gray-100 to-gray-200">  
    <div class="container py-5">  
        <!-- Welcome Section -->  
        <div class="card shadow-lg border-0 mb-5 rounded-lg overflow-hidden">  
            <div class="card-body bg-gradient-to-r from-blue-500 to-indigo-600 text-white">  
                <div class="row align-items-center">  
                    <div class="col-md-8">  
                        <h1 class="display-4 fw-bold">Halo, {{ Auth::user()->name }}</h1>  
                        <p class="lead">Selamat datang di sistem votes. Berikan suara dengan jujur.</p>  
                    </div>   
                </div>  
            </div>  
        </div>  

        <!-- Hero Section -->
        <section
          class="overflow-hidden bg-cover bg-top bg-no-repeat"
          style="background-image: url('https://awsimages.detik.net.id/community/media/visual/2023/02/09/ilustrasi-pemungutan-suara-pemilu-1_169.jpeg?w=1200')"
        >
          <div class="bg-black/50 p-8 md:p-12 lg:px-16 lg:py-24">
            <div class="text-center sm:text-left">
              <h2 class="text-2xl font-bold text-white sm:text-3xl md:text-5xl">Keluarkan Suaramu</h2>

              <p class="hidden max-w-lg text-white/90 md:mt-6 md:block md:text-center md:leading-relaxed">
              Voting adalah kekuatan di tangan kita untuk menentukan arah masa depan. Dengan satu suara, kita bisa menciptakan perubahan, memperjuangkan keadilan, dan membangun masyarakat yang lebih baik. Jangan sia-siakan hakmu, karena setiap suara berarti dan memiliki dampak besar. Mari bersama-sama berpartisipasi, jadilah bagian dari keputusan, dan tunjukkan bahwa kita peduli. Suaramu adalah harapan, suaramu adalah masa depan!
              </p>

              <div class="mt-4 sm:mt-8">
                <a
                  href="{{ route('user.kontestans.index') }}"
                  class="inline-block rounded-full bg-indigo-600 px-12 py-3 text-sm font-medium text-white transition hover:bg-indigo-700 focus:outline-none focus:ring focus:ring-yellow-400"
                >
                  Berikan Suara
                </a>
              </div>
            </div>
          </div>
        </section>
    </div>
</div>
@endsection