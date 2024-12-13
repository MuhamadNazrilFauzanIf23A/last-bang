<?php
if (isset($_GET['id'])) {
    $mobil_id = $_GET['id'];
    
    // Ambil data mobil berdasarkan ID
    $stmt = $conn->prepare("SELECT * FROM mobil WHERE id = ?");
    $stmt->bind_param("i", $mobil_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $mobil = $result->fetch_assoc();
        // Tampilkan informasi mobil untuk form booking
        echo "Nama Mobil: " . $mobil['nama'];
        echo "Harga: " . $mobil['harga'];
        // Tambahkan form booking atau detail lainnya
    } else {
        echo "Mobil tidak ditemukan.";
    }
} else {
    echo "ID mobil tidak ditemukan.";
}
?>
