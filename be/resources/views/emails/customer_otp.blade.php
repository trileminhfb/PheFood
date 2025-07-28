<div style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <div style="max-width: 600px; margin: 0 auto; padding: 20px;">
        <img src="https://i.ibb.co/3mb6X2Fr/phefood.png" alt="PheFood Logo" style="max-width: 150px; border-radius: 9999px; display: block; margin-bottom: 20px;">
        <h1>{{$title}}</h1>
        <h2>Chào {{ $name }},</h2>
        <p>Mã OTP xác nhận của bạn là:</p>
        <h1 style="color: #2c5282; font-size: 32px; letter-spacing: 2px;">{{ $OTP }}</h1>
        <p>Mã này có hiệu lực đến: {{ $expiresAt }}</p>
        <p>Vui lòng sử dụng mã này để xác minh tài khoản của bạn.</p>
        <p>Nếu bạn không yêu cầu mã này, vui lòng bỏ qua email này.</p>
        <p>Trân trọng,<br>Đội ngũ hỗ trợ</p>
    </div>
</div>