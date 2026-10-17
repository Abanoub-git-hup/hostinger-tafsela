# Plexify — WordPress Theme

> ثيم وكالة تسويق رقمي احترافي مبني من ملفات HTML/CSS/JS ثابتة

---

## 🗂️ شجرة ملفات الثيم

```
plexify-theme/
│
├── style.css                        ← رأس تعريف الثيم (مطلوب من WP)
├── functions.php                    ← إعداد الثيم الكامل
├── header.php                       ← الهيدر الديناميكي
├── footer.php                       ← الفوتر الديناميكي
├── index.php                        ← قالب المدونة (fallback)
├── front-page.php                   ← الصفحة الرئيسية (جميع السيكشنز)
├── single.php                       ← المنشور الفردي
├── page.php                         ← الصفحات الثابتة
├── archive.php                      ← أرشيف التصنيفات والوسوم
├── 404.php                          ← صفحة الخطأ 404
├── sidebar.php                      ← الشريط الجانبي
├── comments.php                     ← قالب التعليقات
├── searchform.php                   ← نموذج البحث المخصص
│
├── template-parts/
│   ├── content.php                  ← كارت المنشور داخل Loop
│   ├── content-single.php           ← المنشور الفردي الكامل
│   └── content-none.php             ← رسالة "لا توجد نتائج"
│
├── inc/
│   ├── helpers.php                  ← دوال SVG kses، وقت القراءة، Meta Boxes
│   └── customizer-preview.js        ← Live Preview للـ Customizer
│
├── assets/
│   ├── css/
│   │   ├── main.css                 ← جميع أنماط الصفحة الرئيسية
│   │   └── blog.css                 ← أنماط المدونة والمنشورات والتعليقات
│   ├── js/
│   │   └── main.js                  ← جميع الأنيميشنز والتفاعلات
│   └── images/                      ← ارفع صورك هنا (انظر قسم الصور)
│
├── languages/
│   └── plexify.pot                  ← ملف الترجمة (أنشئه بـ WP-CLI)
│
└── screenshot.png                   ← لقطة الثيم (1200×900 px)
```

---

## ⚡ خطوات التثبيت السريع

### 1. رفع الثيم

**الطريقة الأولى — عبر لوحة WP:**
1. اضغط **Appearance → Themes → Add New → Upload Theme**
2. ارفع ملف `plexify-theme.zip`
3. اضغط **Install Now** ثم **Activate**

**الطريقة الثانية — عبر FTP / cPanel:**
```bash
# انسخ مجلد الثيم إلى:
wp-content/themes/plexify-theme/
```
ثم فعّله من **Appearance → Themes**.

---

### 2. إعداد الصفحة الرئيسية الثابتة

1. اذهب إلى **Pages → Add New** وأنشئ صفحة باسم **Home** (أو الرئيسية)
2. اذهب إلى **Settings → Reading**
3. اختر **A static page**، ثم اضبط:
   - **Front page:** Home
   - **Posts page:** Blog (أنشئ صفحة باسم Blog)
4. احفظ التغييرات

---

### 3. إنشاء القوائم

اذهب إلى **Appearance → Menus**:

| موضع القائمة | الاستخدام |
|---|---|
| **القائمة الرئيسية** | روابط الـ nav في الهيدر |
| **قائمة الفوتر — الشركة** | روابط عمود "Company" في الفوتر |
| **روابط السوشيال ميديا** | روابط السوشيال |

**تلميح:** روابط القائمة الرئيسية تشير إلى أقسام الصفحة الرئيسية (مثل `/#about`, `/#services`).
يمكن إضافتها كـ **Custom Links** في القائمة.

---

### 4. إعداد الـ Customizer

اذهب إلى **Appearance → Customize** لتخصيص:

| القسم | ما يمكن تعديله |
|---|---|
| **Site Identity** | الشعار (custom-logo)، اسم الموقع |
| **قسم الهيرو** | نص الـ badge، نص زر CTA |
| **قسم من نحن** | الإحصائيات (120k, 72+) |
| **معلومات التواصل** | البريد الإلكتروني وأرقام الهاتف |
| **روابط السوشيال ميديا** | LinkedIn, Instagram, X, Facebook |
| **التقييمات والشهادات** | تقييم Trustpilot وClutch |
| **إعدادات الفوتر** | نص حقوق النشر |
| **Colors** | لون الـ Accent (Lime) |

---

### 5. إضافة المحتوى الديناميكي

#### أ) الخدمات
1. من القائمة الجانبية: **الخدمات → إضافة خدمة جديدة**
2. أدخل: العنوان، الوصف، الـ Tag، مزايا الخدمة (كل ميزة في سطر)
3. يمكن إضافة كود SVG للأيقونة في حقل "كود SVG الأيقونة"

#### ب) الأعمال (Portfolio)
1. من القائمة الجانبية: **الأعمال → إضافة عمل جديد**
2. أضف الصورة المميزة (Featured Image) للعمل
3. الأعمال تظهر تلقائياً في سيكشن الـ Work بتمرير أفقي

#### ج) الشهادات
1. من القائمة الجانبية: **الشهادات → إضافة شهادة جديدة**
2. العنوان = اسم العميل، المحتوى = نص الشهادة
3. أضف صورة العميل كـ Featured Image
4. أدخل اسم الشركة في حقل "اسم الشركة / المنصب"

#### د) مقالات المدونة
1. من القائمة الجانبية: **Posts → Add New**
2. أضف الصورة المميزة لتظهر في كارت المدونة
3. المقالات الخمسة الأحدث تظهر تلقائياً في سيكشن Blog

---

### 6. الصور المطلوبة

ارفع الصور التالية إلى `assets/images/` كـ **fallback** (إذا لم تُضف صوراً من WP):

| اسم الملف | الاستخدام | الأبعاد المقترحة |
|---|---|---|
| `team-walk.jpg` | صورة قسم About | 480×600 px |
| `work-social.jpg` | كارت العمل 1 | 560×420 px |
| `work-search.jpg` | كارت العمل 2 | 560×420 px |
| `work-analytics.jpg` | كارت العمل 3 | 560×420 px |
| `work-strategy.jpg` | كارت العمل 4 | 560×420 px |
| `blog-1.jpg` إلى `blog-5.jpg` | صور كروت المدونة | 150×90 px |
| `avatar-1.jpg` إلى `avatar-3.jpg` | صور الشهادات | 80×80 px |
| `faq-team.jpg` | صورة قسم FAQ | 480×600 px |
| `brand-*.svg` | شعارات العلامات التجارية | 32px height |

**ملاحظة:** بمجرد إضافة محتوى ديناميكي (CPTs، منشورات) تحل الصور من WP Media Library محل هذه الـ fallbacks تلقائياً.

---

### 7. تفعيل الـ Widgets

1. اذهب إلى **Appearance → Widgets**
2. أضف الـ widgets المطلوبة إلى منطقة **الشريط الجانبي الرئيسي** (يظهر في المدونة والمنشورات الفردية)

---

### 8. إنشاء ملف screenshot.png

أنشئ لقطة شاشة بأبعاد **1200×900 px** للثيم وضعها في:
```
plexify-theme/screenshot.png
```
تظهر هذه الصورة في **Appearance → Themes**.

---

## 🔧 تفعيل WP_DEBUG للتطوير

أضف في `wp-config.php`:
```php
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_DISPLAY', false );
```
السجل يظهر في `wp-content/debug.log`.

---

## 🌍 إضافة الترجمة (.pot)

```bash
# باستخدام WP-CLI
wp i18n make-pot . languages/plexify.pot --domain=plexify
```

ثم استخدم **Poedit** أو **Loco Translate** لإنشاء ملفات `.po` و `.mo`.

---

## ⚡ نصائح الأداء

| الإجراء | الأثر |
|---|---|
| تثبيت إضافة **WP Rocket** أو **Perfmatters** | minify CSS/JS تلقائياً |
| تفعيل **Smush** أو **ShortPixel** | ضغط الصور |
| الـ JS يُحمَّل في الفوتر (`true` في `wp_enqueue_script`) | لا يعيق تحميل الصفحة |
| الخطوط Google تُحمَّل عبر `wp_enqueue_style` مع `null` version | تجنب invalidation |
| استخدام `loading="lazy"` على جميع الصور | تحسين LCP |

---

## 🛡️ الأمان المطبَّق في الثيم

- `esc_url()` على جميع الروابط
- `esc_html()` / `esc_attr()` على النصوص
- `wp_kses_post()` / `wp_kses()` على HTML الديناميكي
- `sanitize_text_field()` / `sanitize_email()` / `sanitize_textarea_field()` على مدخلات Customizer والـ Meta Boxes
- `wp_verify_nonce()` على حفظ Meta Boxes
- `current_user_can()` للتحقق من الصلاحيات
- `check_ajax_referer()` على طلبات AJAX

---

## 🐛 حل مشاكل شائعة

| المشكلة | الحل |
|---|---|
| الصفحة الرئيسية تعرض قائمة المنشورات | Settings → Reading → اضبط Front page ثابتة |
| القائمة لا تظهر في الهيدر | Appearance → Menus → اختر موضع "القائمة الرئيسية" |
| CSS لا يتحدث بعد التعديل | غيّر رقم الـ Version في style.css أو امسح الكاش |
| CPT لا تظهر في لوحة التحكم | Settings → Permalinks → احفظ مرة أخرى |
| خطأ 404 على روابط CPT | Settings → Permalinks → Save Changes |
| صور الـ fallback لا تظهر | ارفع الصور إلى `assets/images/` أو استخدم WP Media Library |
