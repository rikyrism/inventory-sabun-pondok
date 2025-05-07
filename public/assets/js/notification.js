/**
 * Notification.js - Sistem notifikasi menggunakan localStorage
 */

// Konfigurasi notifikasi
const NOTIFICATION_STORAGE_KEY_PREFIX = "cv_sabun_notification_";
const MAX_NOTIFICATIONS = 50; // Jumlah maksimum notifikasi yang disimpan

/**
 * Sistem notifikasi menggunakan localStorage
 */
class NotificationSystem {
    constructor() {
        // Get user role from the data attribute in body tag
        this.userRole = document.body.dataset.userRole || "guest";
        this.storageKey = NOTIFICATION_STORAGE_KEY_PREFIX + this.userRole;
        this.initialize();
    }

    /**
     * Inisialisasi sistem notifikasi
     */
    initialize() {
        this.notifications = this.getNotifications();
        this.setupUI();
        this.updateUI();
    }

    /**
     * Mengambil notifikasi dari localStorage berdasarkan role user
     */
    getNotifications() {
        const storedData = localStorage.getItem(this.storageKey);
        return storedData ? JSON.parse(storedData) : [];
    }

    /**
     * Menyimpan notifikasi ke localStorage berdasarkan role user
     */
    saveNotifications() {
        localStorage.setItem(
            this.storageKey,
            JSON.stringify(this.notifications)
        );
    }

    /**
     * Membersihkan semua notifikasi untuk role saat ini
     */
    clearNotifications() {
        this.notifications = [];
        this.saveNotifications();
        this.updateUI();
    }

    /**
     * Menambahkan notifikasi baru
     * @param {string} message - Pesan notifikasi
     * @param {string} type - Tipe notifikasi (success, warning, danger, info)
     * @param {string} category - Kategori notifikasi (Master, Transaksi, Laporan, Pengaturan)
     */
    addNotification(message, type = "info", category = "Info") {
        const notification = {
            id: Date.now(),
            message: message,
            type: type,
            category: category,
            timestamp: new Date().toISOString(),
            read: false,
        };

        // Menambahkan notifikasi baru di awal array
        this.notifications.unshift(notification);

        // Batasi jumlah notifikasi
        if (this.notifications.length > MAX_NOTIFICATIONS) {
            this.notifications = this.notifications.slice(0, MAX_NOTIFICATIONS);
        }

        this.saveNotifications();
        this.updateUI();
    }

    /**
     * Menghapus notifikasi tertentu
     * @param {number} id - ID notifikasi yang akan dihapus
     */
    removeNotification(id) {
        this.notifications = this.notifications.filter(
            (notification) => notification.id !== id
        );
        this.saveNotifications();
        this.updateUI();
    }

    /**
     * Setup UI dan event listeners
     */
    setupUI() {
        // Event listener untuk menghapus semua notifikasi
        $(".clearNotifications").on("click", () => {
            this.clearNotifications();
        });

        // Event listener untuk dropdown notifikasi
        $("#notifDropdown").on("click", () => {
            // Tandai semua notifikasi sebagai telah dibaca
            this.notifications.forEach((notification) => {
                notification.read = true;
            });
            this.saveNotifications();
            this.updateUI();
        });
    }

    /**
     * Update UI notifikasi
     */
    updateUI() {
        const $badge = $("#notification-badge");
        const $list = $("#notification-list");
        const $empty = $(".notification-empty");

        // Update badge jumlah notifikasi
        const unreadCount = this.notifications.filter(
            (notification) => !notification.read
        ).length;
        if (unreadCount > 0) {
            $badge.text(unreadCount).show();
        } else {
            $badge.hide();
        }

        // Update daftar notifikasi
        $list.find("a.notif-item").remove();

        if (this.notifications.length > 0) {
            $empty.hide();

            // Membuat HTML untuk semua notifikasi sekaligus
            let notifItemsHtml = "";

            this.notifications.forEach((notif) => {
                const date = new Date(notif.timestamp);
                const formattedDate = `${date.toLocaleDateString(
                    "id-ID"
                )} ${date.toLocaleTimeString("id-ID")}`;

                // Tentukan icon berdasarkan kategori
                let icon = "fas fa-info-circle";
                switch (notif.category) {
                    case "Master":
                        icon = "fas fa-database";
                        break;
                    case "Transaksi":
                        icon = "fas fa-exchange-alt";
                        break;
                    case "Laporan":
                        icon = "fas fa-file-alt";
                        break;
                    case "Pengaturan":
                        icon = "fas fa-cog";
                        break;
                }

                // Tentukan warna berdasarkan operasi (tambah = hijau, hapus = merah)
                let bgColor = "#67c963"; // Default hijau

                // Periksa apakah pesan mengandung kata "hapus" atau "dihapus"
                if (
                    notif.message.toLowerCase().includes("hapus") ||
                    notif.message.toLowerCase().includes("dihapus")
                ) {
                    bgColor = "#f25961"; // Warna merah untuk hapus
                }

                notifItemsHtml += `
                    <a href="javascript:void(0)" class="notif-item dropdown-item ${
                        !notif.read ? "active" : ""
                    }">
                        <div class="notif-icon" style="background-color: ${bgColor} !important;">
                            <i class="${icon} text-white"></i>
                        </div>
                        <div class="notif-content">
                            <span class="block">
                                ${notif.message}
                            </span>
                            <div class="d-flex justify-content-between">
                                <span class="time">${formattedDate}</span>
                                <button class="btn btn-link p-0 text-danger remove-notification" data-id="${
                                    notif.id
                                }">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </a>
                `;
            });

            // Tambahkan semua notifikasi ke daftar
            $list.append(notifItemsHtml);

            // Event handler untuk menghapus notifikasi individual
            $(".remove-notification").on("click", (e) => {
                e.stopPropagation();
                const id = parseInt($(e.currentTarget).data("id"));
                this.removeNotification(id);
            });
        } else {
            $empty.show();
        }
    }
}

// Inisialisasi sistem notifikasi saat dokumen ready
$(document).ready(function () {
    // Buat instance global dari sistem notifikasi
    window.notificationSystem = new NotificationSystem();

    // Notifikasi selamat datang dihapus
});

/**
 * Fungsi global untuk menambahkan notifikasi
 * @param {string} message - Pesan notifikasi
 * @param {string} type - Tipe notifikasi (success, warning, danger, info)
 * @param {string} category - Kategori notifikasi (Master, Transaksi, Laporan, Pengaturan)
 */
function addNotification(message, type = "info", category = "Info") {
    if (window.notificationSystem) {
        window.notificationSystem.addNotification(message, type, category);
    }
}
