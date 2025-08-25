<div style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <div style="max-width: 600px; margin: 0 auto; padding: 20px;">
        <img src="https://scontent.fhan14-5.fna.fbcdn.net/v/t39.30808-6/515494459_662816776815608_5502030976544276689_n.jpg?stp=dst-jpg_p526x296_tt6&_nc_cat=106&ccb=1-7&_nc_sid=127cfc&_nc_ohc=wUm6jkKNNkAQ7kNvwGUofAF&_nc_oc=AdnAwx_osrNODREjeGj5o7GkTaN1yRMic1cbyHAhEHhGt26Lc5azakxdvJxYciSYenVyQ2tRqERmUySR_IbKaFNe&_nc_zt=23&_nc_ht=scontent.fhan14-5.fna&_nc_gid=qcEKfLqtBcT32OPqe4qqgA&oh=00_AfU2S96NtnViQjevN3GtbuQFznn6GpV7Ihnvo_qityhihQ&oe=68AF9699"
            alt="PheFood Logo" style="max-width: 150px; border-radius: 9999px; display: block; margin-bottom: 20px;">
        <h1>{{$title}}</h1>
        <h2>Chào {{ $name }},</h2>
        <p>Mã OTP xác nhận của bạn là:</p>
        <h1 style="color: #2c5282; font-size: 32px; letter-spacing: 2px;">{{ $OTP }}</h1>
        <p>Mã này có hiệu lực đến: {{ \Carbon\Carbon::parse($expiresAt)->timezone(env('APP_TIMEZONE', 'Asia/Ho_Chi_Minh'))->format('H:i:s d-m-Y') }}, theo giờ Việt Nam.</p>
        <p>Vui lòng sử dụng mã này để xác minh tài khoản của bạn.</p>
        <p>Nếu bạn không yêu cầu mã này, vui lòng bỏ qua email này.</p>
        <p>Trân trọng, Đội ngũ hỗ trợ</p>
    </div>
</div>