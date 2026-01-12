<section class="relative min-h-screen flex items-center overflow-hidden">
    <!-- Background Image -->
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?w=1920&q=80" alt="Luxury car" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-background via-background/95 to-background/60"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-background via-transparent to-background/50"></div>
    </div>

    <!-- Content -->
    <div class="container relative z-10 mx-auto px-4 pt-32 pb-20">
        <div class="max-w-3xl">
            <!-- Badge -->
            <div class="inline-flex items-center gap-2 px-4 py-2 bg-primary/10 border border-primary/20 rounded-full mb-8 animate-fade-in">
                <span class="w-2 h-2 bg-primary rounded-full animate-pulse"></span>
                <span class="text-sm text-primary font-medium">Showroom xe sang số 1 Việt Nam</span>
            </div>

            <!-- Heading -->
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold leading-tight mb-6 animate-slide-up">
                Khám phá
                <span class="block text-gradient-accent">Đẳng cấp</span>
                <span class="text-gradient">Xe hơi hạng sang</span>
            </h1>

            <!-- Description -->
            <p class="text-lg md:text-xl text-muted-foreground mb-10 max-w-xl animate-slide-up" style="animation-delay: 0.1s">
                Chúng tôi mang đến bộ sưu tập xe cao cấp từ các thương hiệu hàng đầu thế giới. Trải nghiệm dịch vụ 5 sao ngay hôm nay.
            </p>

            <!-- CTA Buttons -->
            <div class="flex flex-wrap gap-4 mb-16 animate-slide-up" style="animation-delay: 0.2s">
                <a href="{{ url('/cars') }}" class="bg-primary text-primary-foreground px-8 py-3 rounded-xl text-lg font-medium btn-primary-glow flex items-center gap-2 transition-all hover:scale-105 active:scale-95">
                    Xem danh sách xe
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" x2="19" y1="12" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                </a>
                <button class="bg-transparent border border-muted-foreground/30 hover:border-primary px-8 py-3 rounded-xl text-lg font-medium transition-all flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="5 3 19 12 5 21 5 3"/></svg>
                    Xem video showroom
                </button>
            </div>

            <!-- Features -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 animate-slide-up" style="animation-delay: 0.3s">
                <div class="flex items-center gap-4 p-4 bg-secondary/50 rounded-xl border border-border/50">
                    <div class="w-12 h-12 rounded-lg bg-primary/10 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-primary"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-foreground">Bảo hành 5 năm</h3>
                        <p class="text-sm text-muted-foreground">Chính hãng toàn quốc</p>
                    </div>
                </div>
                <div class="flex items-center gap-4 p-4 bg-secondary/50 rounded-xl border border-border/50">
                    <div class="w-12 h-12 rounded-lg bg-primary/10 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-primary"><circle cx="12" cy="8" r="7"/><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"/></svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-foreground">Đại lý chính hãng</h3>
                        <p class="text-sm text-muted-foreground">Uy tín hàng đầu</p>
                    </div>
                </div>
                <div class="flex items-center gap-4 p-4 bg-secondary/50 rounded-xl border border-border/50">
                    <div class="w-12 h-12 rounded-lg bg-primary/10 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-primary"><path d="M18 8a6 6 0 0 0-12 0c0 7 3 9 3 9h6s3-2 3-9"/><path d="M10.14 12.7a2 2 0 1 0 3.71 0"/></svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-foreground">Hỗ trợ 24/7</h3>
                        <p class="text-sm text-muted-foreground"> Tư vấn tận tâm</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounce">
        <div class="w-8 h-12 border-2 border-muted-foreground/30 rounded-full flex justify-center pt-2">
            <div class="w-1.5 h-3 bg-primary rounded-full animate-pulse"></div>
        </div>
    </div>
</section>
