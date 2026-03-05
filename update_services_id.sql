USE vananta_db;

UPDATE services SET title = 'Kunjungan Dokter ke Rumah', description = 'Layanan konsultasi, pemeriksaan, dan pengobatan langsung di rumah oleh dokter bersertifikat.' WHERE title_en = 'Doctor Home Visit';
UPDATE services SET title = 'Vaksinasi & Terapi Infus di Rumah', description = 'Layanan vaksinasi dan infus vitamin dengan protokol medis ketat untuk mendukung daya tahan tubuh, pemulihan, dan kesehatan menyeluruh.<br>Termasuk: &bull; Vaksinasi pencegahan &bull; Infus vitamin &bull; Terapi cairan' WHERE title_en = 'Home Vaccination & Infusion Therapy';
UPDATE services SET title = 'Perawatan Lansia & Jangka Panjang', description = 'Pendampingan dan perawatan menyeluruh bagi lansia dengan fokus pada kenyamanan, pemantauan medis, dan kualitas hidup.' WHERE title_en = 'Elderly & Long-Term Care';
UPDATE services SET title = 'Layanan Laboratorium di Rumah', description = 'Pengambilan sampel laboratorium langsung di rumah secara akurat dan tanpa antre.' WHERE title_en = 'Home Laboratory Service';
UPDATE services SET title = 'Evakuasi Medis & Layanan Darurat', description = 'Layanan evakuasi medis yang aman dan terkoordinasi dengan tim terlatih serta peralatan lengkap.' WHERE title_en = 'Medical Evacuation & Emergency Support';
UPDATE services SET title = 'Perawatan Paliatif', description = 'Pendampingan fisik, emosional, dan psikologis bagi pasien dengan penyakit kronis secara bermartabat dan penuh empati.' WHERE title_en = 'Palliative Care';
UPDATE services SET title = 'Layanan Medis untuk Acara', description = 'Layanan kesehatan profesional di lokasi acara untuk menjamin keselamatan peserta dan respon medis cepat.' WHERE title_en = 'Medical Support for Events';
