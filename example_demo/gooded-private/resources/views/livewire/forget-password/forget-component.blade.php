<div>
    <div class="row align-items-start">
        <div
            class="wodx align-self-center col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-8 offset-2 col-sm-8 offset-sm-2">
            <div class="form-group text-center text-sm-center @if ($process != 1) d-none @endif">
                <input class="form-control field-style text-center" type="email" wire:model='email'
                    placeholder="ระบุอีเมลล์">
                @error('email')
                    <small class="text-danger">*{{ $message }}</small>
                @enderror
                <div class="text-center">
                    <button type="button" class="btn btn-d btn-lg btn-11-style" wire:click='sendMail'>ส่ง</button>
                </div>
            </div>
            <div class="form-group text-center text-sm-center @if ($process != 2) d-none @endif">
                <input class="form-control field-style text-center" type="text" maxlength="6" wire:model='otp'
                    placeholder="ระบุรหัส OTP">
                @error('otp')
                    <small class="text-danger">*{{ $message }}</small><br>
                @enderror
                @error('otp_check')
                    <small class="text-danger">*{{ $message }}</small><br>
                @enderror
                @error('otp_status')
                    <small class="text-danger">*{{ $message }}</small><br>
                @enderror
                <small class="text-success" id="time" wire:ignore></small>
                <br>
                <a href="javascript:void(0)" class="btn btn-sm text-success" id="btnResentMail" wire:click="sendMail()" wire:ignore><i
                        class="ion-ios-refresh-empty text-success"></i> ส่งอีกครั้ง</a>
                <br>
                <div class="text-center">
                    <button type="button" class="btn btn-d btn-lg btn-11-style" wire:click='compareOTP'>ยืนยัน</button>
                </div>
            </div>
            <div class="form-group text-center text-sm-center @if ($process != 3) d-none @endif">
                <input type="password" class="form-control field-style text-center" wire:model="password1"
                    id="password1" placeholder="รหัสผ่าน">
                @error('password1')
                    <small class="text-danger">*{{ $message }}</small>
                @enderror
                <input type="password" class="form-control field-style text-center" wire:model="password2"
                    id="password2" placeholder="ยืนยันรหัสผ่าน">
                @error('password2')
                    <small class="text-danger">*{{ $message }}</small>
                @enderror
                @error('check_password')
                    <small class="text-danger">*{{ $message }}</small>
                @enderror
                <div class="text-center">
                    <button type="button" class="btn btn-d btn-lg btn-11-style"
                        wire:click='resetPassword'>ยืนยัน</button>
                    {{-- <a href="#" class="btn btn-d btn-lg btn-11-style" data-toggle="modal"
                        data-target="#modal-8975">ยืนยัน<br></a> --}}
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('livewire:load', function() {
        Livewire.on('startTimer', () => {
            document.getElementById("btnResentMail").classList.add("d-none");
            var setNow = new Date(@this.expire_time);
            setNow.setTime(setNow.getTime() + (5 * 60 * 1000));
            var countDownDate = new Date(setNow).getTime();
            startTimer(countDownDate);
        });
    });

    function startTimer(countDownDate) {
        var x = setInterval(function() {

            var now = new Date();
            var distance = countDownDate - now;

            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            document.getElementById("time").innerHTML = minutes + ":" + seconds;

            if (distance < 0) {
                clearInterval(x);
                document.getElementById("time").innerHTML = "หมดเวลา";
                document.getElementById("btnResentMail").classList.remove("d-none");
            }
        }, 1000);
    }
</script>
