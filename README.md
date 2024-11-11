# Work of Tracker

## Loyihaga Kirish

**Work of Tracker** – bu ishchilarning ismlari, ishga kelish va ketish vaqtlarini kuzatib boradigan tizim bo'lib, ularning kech qolishlari yoki erta ketishlarini aniqlash uchun ishlab chiqilgan. Loyiha PHP, HTML, CSS va MySQL-dan foydalanib amalga oshirilgan bo'lib, ishchilarning vaqtni nazorat qilish jarayonini osonlashtirish uchun mo'ljallangan.

## Loyihaning Maqsadi

Loyihaning asosiy maqsadi ishchilarning kelish va ketish vaqtlarini samarali boshqarish va ularning kech qolish yoki erta ketish holatlarini avtomatik ravishda hisoblashdir. Tizim shuningdek, ishchilarning ismlari bilan birga, qaysi vaqtda kech qolgan yoki erta ketganini ko'rsatib beradi.

## Asosiy Funksiyalar

- **Ism, kelish va ketish vaqtini kiritish** — Ishchi o'z ismini, ishga kelish va ishni tark etish vaqtlarini formaga kiritadi.
- **Kechikish va erta ketish hisoblash** — Tizim ishchilarning kiritilgan vaqtlarini oldindan belgilangan jadval bilan solishtiradi va kech qolgan yoki erta ketgan vaqtni hisoblaydi.
- **Ishchilarning kechikish vaqtini ko'rish** — Tizim kechikish vaqtini minutlarda hisoblab, uni jadvalda ko'rsatadi.
- **Ma'lumotlarni jadval ko'rinishida ko'rsatish** — Barcha ma'lumotlar, jumladan ism, kelish va ketish vaqti, hamda kechikish va erta ketish minutlari aniq va tartibli jadvalda ko'rsatiladi.

## Asosiy Talablar

- **PHP** — 8-versiya yoki undan yuqori.
- **MySQL** — Ma'lumotlar bazasini boshqarish uchun.
- **Apache yoki XAMPP** — Lokal server yaratish uchun.

## MySQL Jadvalini Yaratish

Loyihani ishga tushirishdan oldin MySQL-da kerakli jadvalni yaratish lozim. Quyidagi buyruqlarni MySQL-da bajarib, jadvalni yarating:

```sql
CREATE DATABASE work_of_tracker;

USE work_of_tracker;

CREATE TABLE work_time (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    arrived_at TIME NOT NULL,
    leaved_at TIME NOT NULL,
    required_of TIME NOT NULL
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

## Loyihani Ishga Tushirish

1. **Omborni klonlash yoki yuklab olish**:
   ```bash
   git clone https://github.com/MexriddinDev/Work-of-Tracker.git
   ```
2. **Ma'lumotlar bazasini sozlash**:
   - `work_of_tracker` bazasini yarating va yuqoridagi SQL buyruqlarni ishlating.
3. **Lokal serverni ishga tushiring** (masalan, XAMPP orqali).
4. **Brauzerda ochish**:
   - `http://localhost/Work_of_Tracker` manziliga kiring.

## Qo'shimcha Funksiyalar

- **Ishchilarning ismlari bilan qidiruv** — Ma'lumotlar bazasida ism orqali qidirish imkoniyati.
- **Kechikish haqidagi hisobotlar** — Har bir ishchining kechikish yoki erta ketishlari haqida to'liq hisobot olish.
- **Vaqt bo'yicha statistik ma'lumotlar** — Har oy yoki hafta uchun ishchilarning kelish va ketish statistikasi.

## Kelajakdagi Rejalar

- **Email bildirishnomalari** — Ishchilarga kechikish yoki erta ketish haqida elektron pochta orqali bildirishnoma yuborish.
- **Hisobotlarni eksport qilish** — Ma'lumotlarni PDF yoki Excel fayli ko'rinishida eksport qilish imkoniyati.

## Muallif

- [Ro'ziyev Sanjarbek](https://github.com/roziyevsanjarbek)

Agar loyihada savollar yoki takliflar bo'lsa, muallif bilan GitHub orqali bog'lanishingiz mumkin.
