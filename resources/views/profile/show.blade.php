@extends('layouts.app')

@section('title', 'Thông tin cá nhân - AutoLux')

@section('content')
<div class="min-h-screen bg-background pt-32 pb-20">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <!-- Header -->
            <div class="mb-10 animate-slide-up">
                <h1 class="text-4xl font-bold mb-2">Hồ sơ của tôi</h1>
                <p class="text-muted-foreground">Quản lý thông tin cá nhân và địa chỉ nhận hàng của bạn</p>
            </div>

            <div class="grid lg:grid-cols-3 gap-8">
                <!-- Left: Avatar & Quick Info -->
                <div class="lg:col-span-1 space-y-6 animate-slide-up" style="animation-delay: 100ms">
                    <div class="card-luxury p-8 flex flex-col items-center text-center">
                        <div class="relative group mb-6">
                            <div class="w-32 h-32 rounded-full overflow-hidden border-4 border-primary/20 bg-secondary">
                                @if($user->avatar)
                                    <img src="{{ asset('storage/' . $user->avatar) }}" alt="{{ $user->name }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                                    </div>
                                @endif
                            </div>
                            <label for="avatar_file" class="absolute bottom-0 right-0 w-10 h-10 bg-primary text-primary-foreground rounded-full flex items-center justify-center cursor-pointer shadow-lg hover:scale-110 transition-transform">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
                            </label>
                        </div>
                        <h2 class="text-xl font-bold mb-1">{{ $user->name }}</h2>
                        <p class="text-sm text-muted-foreground mb-4">{{ $user->email }}</p>
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full {{ $user->role === 'admin' ? 'bg-amber-500/10 text-amber-500 border-amber-500/20' : 'bg-primary/10 text-primary border-primary/20' }} text-xs font-medium border">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                @if($user->role === 'admin')
                                    <path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="m2 17 10 5 10-5M2 12l10 5 10-5"/>
                                @else
                                    <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/>
                                @endif
                            </svg>
                            {{ $user->role === 'admin' ? 'Quản trị viên' : 'Khách hàng' }}
                        </div>
                    </div>

                    <div class="card-luxury p-6 space-y-4">
                        <h3 class="font-bold border-b border-border pb-2">Thống kê</h3>
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-muted-foreground">Xe đã xem</span>
                            <span class="font-medium text-foreground">12</span>
                        </div>
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-muted-foreground">Xe yêu thích</span>
                            <span class="font-medium text-foreground">5</span>
                        </div>
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-muted-foreground">Lịch hẹn</span>
                            <span class="font-medium text-foreground">0</span>
                        </div>
                    </div>
                </div>

                <!-- Right: Form -->
                <div class="lg:col-span-2 animate-slide-up" style="animation-delay: 200ms">
                    <div class="card-luxury p-8">
                        <form action="{{ url('/profile') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                            @csrf
                            <input type="file" id="avatar_file" name="avatar_file" class="hidden" onchange="this.form.submit()">

                            <div class="space-y-6">
                                <h3 class="text-xl font-bold flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-primary"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                                    Thông tin cá nhân
                                </h3>
                                
                                <div class="grid md:grid-cols-2 gap-6">
                                    <div class="space-y-2">
                                        <label class="text-sm font-medium text-muted-foreground">Họ và tên</label>
                                        <input type="text" name="name" value="{{ old('name', $user->name) }}" required placeholder="Nhập họ tên" class="w-full h-12 bg-secondary border border-border rounded-xl px-4 focus:outline-none focus:ring-1 focus:ring-primary transition-all">
                                    </div>
                                    <div class="space-y-2">
                                        <label class="text-sm font-medium text-muted-foreground">Email</label>
                                        <input type="email" value="{{ $user->email }}" disabled class="w-full h-12 bg-background border border-border rounded-xl px-4 text-muted-foreground cursor-not-allowed">
                                        <p class="text-[10px] text-muted-foreground">Email không thể thay đổi</p>
                                    </div>
                                    <div class="space-y-2">
                                        <label class="text-sm font-medium text-muted-foreground">Số điện thoại</label>
                                        <input type="tel" name="phone" value="{{ old('phone', $user->phone) }}" placeholder="Nhập số điện thoại" class="w-full h-12 bg-secondary border border-border rounded-xl px-4 focus:outline-none focus:ring-1 focus:ring-primary transition-all">
                                    </div>
                                </div>
                            </div>

                            <div class="space-y-6">
                                <h3 class="text-xl font-bold flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-primary"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                                    Địa chỉ đầy đủ
                                </h3>
                                
                                <div class="space-y-2">
                                    <label class="text-sm font-medium text-muted-foreground">Địa chỉ nhận hàng / Giao dịch</label>
                                    <textarea name="address" rows="4" placeholder="Nhập địa chỉ chi tiết (Số nhà, đường, phường, quận, thành phố...)" class="w-full bg-secondary border border-border rounded-xl p-4 focus:outline-none focus:ring-1 focus:ring-primary transition-all">{{ old('address', $user->address) }}</textarea>
                                </div>
                            </div>

                            <div class="pt-6 border-t border-border flex justify-end">
                                <button type="submit" class="bg-primary text-primary-foreground px-8 py-3 rounded-xl font-bold btn-primary-glow flex items-center gap-2 transition-all hover:scale-105 active:scale-95">
                                    <span>Lưu thay đổi</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m5 12 5 5L20 7"/></svg>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
