<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>أُنشئ أنظمة حماية | My Laravel App</title>
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/png">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('front/css/style.css')}}">
</head>
<body>

    <div class="container text-center text-md-end">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card-custom p-5">
                    <h1 class="display-5 mb-4">أُنشئ أنظمة حماية متكاملة — كل شيء أَبنيه بيدي</h1>


                    <p class="fs-5 mb-4 text-light">
                        مهندس نظم ومطور أُفضل الحلول المصممة يدويًا بدلاً من الاعتماد الكلي على الحزم الجاهزة.
                        أُطوّر نظم حماية قوية، أُحكم كل سطر كود، وأضمن أداءً آمنًا وموثوقًا يناسب متطلباتك الخاصة.
                    </p>


                    <ul class="list-unstyled text-muted mb-5">
                        <li>• تصميم وبناء يدوي لكل جزء من النظام (No black-box).</li>
                        <li>• تركيز على الأمان والاعتمادية (Security by design).</li>
                        <li>• حلول قابلة للتخصيص ومُحسّنة لأداء حقيقي في الإنتاج.</li>
                    </ul>

                    
                    <div class="d-flex gap-3 justify-content-md-start justify-content-center">
                        <a href="{{ route('login') }}" class="btn btn-outline-primary btn-lg px-4">تسجيل الدخول</a>
                        <a href="{{ route('register') }}" class="btn btn-outline-success btn-lg px-4">إنشاء حساب</a>
                    </div>
                </div>

                <p class="mt-4 text-secondary small text-center">
                    هل تريد عرض مشاريع سابقة أو توضيح خدمات الحماية؟ تواصل معي لعرض محفظة الأعمال.
                </p>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
