<div>
    <h2 class="text-center mb-4" style="color: #1e30f3; font-weight: 700;">Admin Panel Login</h2>
    
    @if (session('status'))
        <div class="alert alert-success mb-4">
            {{ session('status') }}
        </div>
    @endif
    
    <form wire:submit="login">
        <!-- Email -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input 
                type="email" 
                id="email"
                class="form-control @error('email') is-invalid @enderror" 
                wire:model="email"
                autofocus
                required
            >
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <!-- Password -->
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input 
                type="password" 
                id="password"
                class="form-control @error('password') is-invalid @enderror" 
                wire:model="password"
                required
            >
            @error('password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <!-- Remember Me -->
        <div class="mb-4">
            <div class="form-check">
                <input 
                    class="form-check-input" 
                    type="checkbox" 
                    id="remember"
                    wire:model="remember"
                >
                <label class="form-check-label" for="remember">
                    Ingat saya
                </label>
            </div>
        </div>
        
        <!-- Submit Button -->
        <button type="submit" class="btn btn-login">
            <span wire:loading.remove wire:target="login">Masuk</span>
            <span wire:loading wire:target="login">
                <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                Memproses...
            </span>
        </button>
    </form>
</div>
