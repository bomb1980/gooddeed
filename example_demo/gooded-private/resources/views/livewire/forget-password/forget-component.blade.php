<div>
    <div class="row align-items-start">
        <div class="wodx align-self-center col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-8 offset-2 col-sm-8 offset-sm-2">
            <div class="form-group text-center text-sm-center @if ($process != 1) d-none @endif">
                <input class="form-control field-style text-center" type="email" wire:model='email' placeholder="ระบุอีเมลล์">
                @error('email')
                    <small class="text-danger">*{{ $message }}</small>
                @enderror
                <div class="text-center">
                    <button type="button" class="btn btn-d btn-lg btn-11-style" wire:click='sendMail'>ส่ง</button>
                </div>
            </div>
            <div class="form-group text-center text-sm-center @if ($process != 2) d-none @endif">
                <input class="form-control field-style text-center" type="text" maxlength="6" wire:model='otp' placeholder="ระบุรหัส OTP">
                @error('otp')
                    <small class="text-danger">*{{ $message }}</small>
                @enderror
                @error('otp_check')
                    <small class="text-danger">*{{ $message }}</small>
                @enderror
                <div class="text-center">
                    <button type="button" class="btn btn-d btn-lg btn-11-style" wire:click='compareOTP'>ยืนยัน</button>
                </div>
            </div>
            <div class="form-group text-center text-sm-center @if ($process != 3) d-none @endif">
                <input type="password" class="form-control field-style text-center" wire:model="password1" id="password1" placeholder="รหัสผ่าน" >
                @error('password1')
                    <small class="text-danger">*{{ $message }}</small>
                @enderror
                <input type="password" class="form-control field-style text-center" wire:model="password2" id="password2" placeholder="ยืนยันรหัสผ่าน" >
                @error('password2')
                    <small class="text-danger">*{{ $message }}</small>
                @enderror
                @error('check_password')
                    <small class="text-danger">*{{ $message }}</small>
                @enderror
                <div class="text-center">
                    <button type="button" class="btn btn-d btn-lg btn-11-style" wire:click='resetPassword'>ยืนยัน</button>
                    {{-- <a href="#" class="btn btn-d btn-lg btn-11-style" data-toggle="modal"
                        data-target="#modal-8975">ยืนยัน<br></a> --}}
                </div>
            </div>
        </div>
    </div>
</div>
