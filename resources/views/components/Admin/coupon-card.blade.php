<div class="coupon-card">
    <div class="title-div ">
        <span class="date" style="margin-left: 25px">{{$start_date}}</span>
        <span class="tname" style="margin-left: 25px">{{$app_name}}</span>
        <img src="{{asset('admin/assets/imgs/logo-white.png')}}"style="width: 50px;">
    </div>
    <div class="card_body">
        <span class="body_title">كرت شحن رصيد</span>
        <div class="black_line"></div>
    </div>
    <div class="row card-body2">
        <div class="col-8" style="margin-top: 20px">
            <p>
                <span class="date-title">تاريخ التحرير :</span>
                <span class="date-text">{{$start_date}}</span>
            </p>
            <p style="margin-top: -10px">
                <span class="date-title">تاريخ الانتهاء :</span>
                <span class="date-text">{{$end_date}}</span>
            </p>
            <p style="margin-top: -10px">
                <span style="font-size: 15px;font-weight: 600;color: black;">القيمة :</span>
                <span dir="rtl">
                    <span class="date-title" style="font-weight: 700;">{{$value}}</span>
                    <span style="color: black;font-size: 10px">ج.م</span>
                </span>
            </p>
        </div>
        <div class="col-4">
            <div id="qr_tag_{{$counter}}" class="qr-tag"></div>
        </div>
    </div>
    <div class="card-code">
        <span>{{$code}}</span>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" width="374" height="244" viewBox="0 0 374 244">
        <g id="Group_286" data-name="Group 286" transform="translate(-191 -517)">
            <g id="Rectangle_84" data-name="Rectangle 84" transform="translate(207 517)" fill="#fff" stroke="#000" stroke-width="1" stroke-dasharray="10">
                <rect width="341" height="241" stroke="none"/>
                <rect x="0.5" y="0.5" width="340" height="240" fill="none"/>
            </g>
            <path id="Path_20" data-name="Path 20" d="M0,0H341V64H0Z" transform="translate(207 517)"/>
            <g id="Group_230" data-name="Group 230" transform="translate(58 -109)">
                <g id="Ellipse_8" data-name="Ellipse 8" transform="translate(136 817)" fill="#fff" stroke="#000" stroke-width="1" stroke-dasharray="5">
                    <circle cx="13.5" cy="13.5" r="13.5" stroke="none"/>
                    <circle cx="13.5" cy="13.5" r="13" fill="none"/>
                </g>
                <rect id="Rectangle_85" data-name="Rectangle 85" width="16" height="67" transform="translate(133 803)" fill="#fff"/>
            </g>
            <g id="Group_229" data-name="Group 229" transform="translate(59 -109)">
                <g id="Ellipse_9" data-name="Ellipse 9" transform="translate(478 817)" fill="#fff" stroke="#000" stroke-width="1" stroke-dasharray="5">
                    <circle cx="13.5" cy="13.5" r="13.5" stroke="none"/>
                    <circle cx="13.5" cy="13.5" r="13" fill="none"/>
                </g>
                <rect id="Rectangle_86" data-name="Rectangle 86" width="16" height="67" transform="translate(490 803)" fill="#fff"/>
            </g>
            <line id="Line_18" data-name="Line 18" x2="303" transform="translate(226.5 719.5)" fill="none" stroke="#c2c2c2" stroke-width="1" stroke-dasharray="10"/>
        </g>
    </svg>


</div>
