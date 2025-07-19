<section class="py-24 bg-white">
    <div class="container mx-auto text-center">
        <h2 class="text-4xl font-bold mb-16 text-gray-900">Aktivitas</h2>

        <div class="relative w-full mx-auto">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    @foreach (['aktivitas1.jpg', 'aktivitas2.jpg', 'aktivitas3.jpg', 'aktivitas4.jpg', 'aktivitas5.jpg', 'aktivitas1.jpg', 'aktivitas2.jpg', 'aktivitas3.jpg', 'aktivitas4.jpg', 'aktivitas5.jpg'] as $img)
                        <div class="swiper-slide">
                            <img src="{{ asset('img/' . $img) }}"
                                class="rounded-[30px] w-[472px] h-[302px] object-cover shadow-xl" />
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination mt-6"></div>
            </div>

            {{-- Tombol Next/Prev di bawah --}}
            <div class="flex justify-center items-center gap-6 mt-6">
                <div class="swiper-button-prev relative text-teal-600"></div>
                <div class="swiper-button-next relative text-teal-600"></div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
    <script>
        const swiper = new Swiper('.mySwiper', {
            loop: true,
            centeredSlides: true,
            slidesPerView: 3,
            spaceBetween: 30,
            initialSlide: 2,
            effect: 'coverflow',
            coverflowEffect: {
                rotate: 0,
                stretch: 0,
                depth: 300,
                modifier: 1,
                slideShadows: false,
                scale: 1,
            },
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                0: {
                    slidesPerView: 1,
                },
                640: {
                    slidesPerView: 1.5,
                },
                1024: {
                    slidesPerView: 3,
                }
            }
        });
    </script>
@endpush
