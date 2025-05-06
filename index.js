document.addEventListener('DOMContentLoaded', function() {
    const images = [
        "../images/review.jpg",
        "../images/slide0.jpg",
        "../images/image-6.jpg"
    ];
    
    const text = "Welcome to Active SPA";
    const des = [
        "BEAUTY &<br>   SPA Wellness",
        "Health &<br> Relaxation",
        "Caring &<br> Sensuality"
    ];

    let textt = document.getElementById("text");
    let dess = document.getElementById("des");
    let hPage1 = document.querySelector('.h-page1');
    let btnContainer = document.querySelector(".btn");

    let currentSlide = 0;
    const totalSlides = images.length;
   
    function changeSlide() {
        // إخفاء العناصر مؤقتًا
        textt.classList.remove("show");
        dess.classList.remove("show");
        btnContainer.classList.remove("show");

        setTimeout(() => {
            // تغيير الخلفية
            hPage1.style.backgroundImage = `url(${images[currentSlide]})`;

            // تحديث النصوص
            textt.innerHTML = text;
            dess.innerHTML = des[currentSlide];

            // إظهار النصوص والأزرار بتأثير التدرج
            textt.classList.add("show");
            dess.classList.add("show");
            btnContainer.classList.add("show");

        }, 500); // تأخير نصف ثانية قبل التغيير
    }

    setInterval(function() {
        currentSlide = (currentSlide + 1) % totalSlides;
        changeSlide();
    }, 4000);

    // تشغيل التأثير عند تحميل الصفحة
    changeSlide();
    let positionX = 50; // نقطة البداية أفقياً (center)
    let positionY = 50; // نقطة البداية عمودياً (center)
    let step = 0.2; // سرعة الحركة (يمكن تغييرها)

    function moveBackground() {
        positionX += step; // تحرك أفقياً نحو الخارج
        positionY += step; // تحرك عمودياً نحو الخارج
        if (positionX >= 100 || positionY >= 100) { // إذا وصلت لنقطة معينة، تعود للحركة العكسية
            step = -step;
        }
        if (positionX <= 50 || positionY <= 50) {
            step = Math.abs(step);
        }

        hPage1.style.backgroundPosition = `${positionX}% ${positionY}%`;
    }

    setInterval(moveBackground, 50); // تحديث كل 50ms للحركة السلسة

  









});

