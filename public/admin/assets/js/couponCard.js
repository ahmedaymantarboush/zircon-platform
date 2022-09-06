///////////////////////////////////////////////////
/////////////////////QR Code//////////////////////
/////////////////////////////////////////////////
function createQr(id, code, value, counter = 1) {
    const qrCode = new QRCodeStyling({
        width: 95,
        height: 95,
        data: `id       : ${id},code  : ${code},value : ${value},`,
        margin: 0,
        qrOptions: {
            typeNumber: "0",
            mode: "Byte",
            errorCorrectionLevel: "H"
        },
        imageOptions: { hideBackgroundDots: true, imageSize: 0.5, margin: 0 },
        dotsOptions: { type: "square", color: "#545454" },
        backgroundOptions: { color: "#ffffff" },

        image: `${APP_URL}/public/admin/assets/imgs/logo.png`,
        dotsOptionsHelper: { colorType: { single: true, gradient: false }, gradient: { linear: true, radial: false, color1: "#6a1a4c", color2: "#6a1a4c", rotation: "0" } },
        cornersSquareOptions: { type: "extra-rounded", color: "#303030" },
        cornersSquareOptionsHelper: { colorType: { single: true, gradient: false }, gradient: { linear: true, radial: false, color1: "#000000", color2: "#000000", rotation: "0" } },
        cornersDotOptions: { type: "", color: "#545454" },
        cornersDotOptionsHelper: { colorTyp: { single: true, gradient: false }, gradient: { linear: true, radial: false, color1: "#000000", color2: "#000000", rotation: "0" } },
        backgroundOptionsHelper: { colorType: { single: true, gradient: false }, gradient: { linear: true, radial: false, color1: "#ffffff", color2: "#ffffff", rotation: "0" } },
    });
    qrCode.append(document.getElementById(`qr_tag_${counter}`));
};
