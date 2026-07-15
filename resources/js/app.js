import Swal from "sweetalert2";

window.togglePassword = function (id, button) {
    const input = document.getElementById(id);

    if (!input) return;

    if (input.type === "password") {
        input.type = "text";
        button.classList.add("transition", "duration-200");
        button.textContent = "🙈";
    } else {
        input.type = "password";
        button.classList.add("transition", "duration-200");
        button.textContent = "👁️";
    }
};

window.toggleSidebar = function (forceOpen) {
    const body = document.body;
    const sidebar = document.getElementById("sidebar");
    const backdrop = document.getElementById("sidebarBackdrop");
    const isDesktop = window.matchMedia("(min-width: 768px)").matches;

    if (!sidebar || !backdrop) return;

    if (isDesktop) {
        if (typeof forceOpen === "boolean") {
            body.classList.toggle("sidebar-closed-desktop", !forceOpen);
        } else {
            body.classList.toggle("sidebar-closed-desktop");
        }
        body.classList.remove("sidebar-open");
        sidebar.classList.remove("-translate-x-full");
        backdrop.classList.add("hidden");
    } else {
        if (typeof forceOpen === "boolean") {
            body.classList.toggle("sidebar-open", forceOpen);
        } else {
            body.classList.toggle("sidebar-open");
        }
        sidebar.classList.toggle(
            "-translate-x-full",
            !body.classList.contains("sidebar-open"),
        );
        backdrop.classList.toggle(
            "hidden",
            !body.classList.contains("sidebar-open"),
        );
    }
};

window.showToast = function (message, icon = "success") {
    Swal.fire({
        toast: true,
        position: "top-end",
        icon: icon,
        title: message,
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        customClass: {
            popup: "rounded-3xl border border-slate-200 bg-white shadow-xl",
        },
        didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
    });
};

window.confirmDelete = function (
    event,
    form,
    message = "Tindakan ini tidak dapat dibatalkan.",
) {
    event.preventDefault();

    Swal.fire({
        title: "Yakin?",
        text: message,
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Ya, hapus",
        cancelButtonText: "Batal",
        reverseButtons: true,
        customClass: {
            popup: "rounded-2xl",

            title: "text-slate-800 text-xl font-bold",

            htmlContainer: "text-slate-600",

            confirmButton:
                "rounded-lg bg-rose-600 px-5 py-2.5 font-medium text-white transition hover:bg-rose-700 focus:outline-none focus:ring-2 focus:ring-rose-300",

            cancelButton:
                "mr-3 rounded-lg border border-slate-300 bg-white px-5 py-2.5 font-medium text-slate-700 transition hover:bg-slate-100 focus:outline-none focus:ring-2 focus:ring-slate-200",
        },
        buttonsStyling: false,
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
        }
    });
};

window.openCourseModal = function (mode, url, course = {}) {
    const csrfToken = document.querySelector(
        'meta[name="csrf-token"]',
    )?.content;
    if (!url || !csrfToken) {
        window.showToast("Tidak dapat memproses request saat ini.", "error");
        return;
    }

    const pageTitle = mode === "edit" ? "Edit Kursus" : "Tambah Kursus";
    const confirmText =
        mode === "edit" ? "Perbarui kursus ini?" : "Tambah kursus baru?";

    Swal.fire({
        title: pageTitle,
        width: "min(90vw, 560px)",
        html: ` <div class="space-y-5 text-left">
                <div>
                    <label for="swal-course-title" class="mb-2 block text-sm font-medium text-slate-700">Judul Kursus</label>
                    <input id="swal-course-title" type="text" value="${escapeHtml(course.title ?? "")}" placeholder="Masukkan judul kursus" class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200">
                </div>

                <div>
                    <label for="swal-course-slug" class="mb-2 block text-sm font-medium text-slate-700">Slug</label>
                    <input id="swal-course-slug" type="text" value="${escapeHtml(course.slug ?? "")}" placeholder="laravel-12-fundamental" class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200">
                </div>

                <div class="grid grid-cols-2 gap-5">
                    <div>
                        <label class="mb-2 block text-sm font-medium text-slate-700">Harga</label>
                        <input id="swal-course-price" type="number" value="${escapeHtml(course.price ?? "0")}" class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200">
                    </div>
                    <div>
                        <label class="mb-2 block text-sm font-medium text-slate-700">Status</label>
                        <select id="swal-course-status" class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200">
                            <option value="draft" ${course.status === "draft" ? "selected" : ""}> Draft</option>
                            <option value="published" ${course.status === "published" ? "selected" : ""}> Published</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label class="mb-2 block text-sm font-medium text-slate-700">Deskripsi</label>
                    <textarea id="swal-course-description" rows="5" class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200">${escapeHtml(course.description ?? "")}</textarea>
                </div>
            </div>`,
        showCancelButton: true,
        confirmButtonText: mode === "edit" ? "Perbarui" : "Simpan",
        cancelButtonText: "Batal",
        focusConfirm: false,
        customClass: {
            popup: "rounded-3xl border border-slate-200",
            confirmButton: "bg-indigo-600 text-white hover:bg-indigo-700",
            cancelButton: "bg-slate-100 text-slate-700 hover:bg-slate-200",
        },
        didOpen: () => {
            document.getElementById("swal-course-title").focus();
        },
        preConfirm: () => {
            const title = document
                .getElementById("swal-course-title")
                .value.trim();
            const slug = document
                .getElementById("swal-course-slug")
                .value.trim();
            const price = document
                .getElementById("swal-course-price")
                .value.trim();
            const status = document.getElementById("swal-course-status").value;
            const description = document
                .getElementById("swal-course-description")
                .value.trim();

            if (!title || !slug || !price) {
                Swal.showValidationMessage(
                    "Judul, slug, dan harga harus diisi.",
                );
                return false;
            }

            return { title, slug, price, status, description };
        },
    }).then((result) => {
        if (!result.isConfirmed || !result.value) {
            return;
        }

        fetch(url, {
            method: mode === "edit" ? "PUT" : "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": csrfToken,
                Accept: "application/json",
            },
            body: JSON.stringify(result.value),
        })
            .then(async (response) => {
                const data = await response.json().catch(() => null);
                if (!response.ok) {
                    const message = data?.message || "Gagal menyimpan kursus.";
                    throw new Error(message);
                }
                return data;
            })
            .then((data) => {
                window.showToast(
                    data.message ||
                        (mode === "edit"
                            ? "Kursus berhasil diperbarui."
                            : "Kursus berhasil ditambahkan."),
                    "success",
                );
                setTimeout(() => window.location.reload(), 800);
            })
            .catch((error) => {
                Swal.fire({
                    icon: "error",
                    title: "Gagal",
                    text:
                        error.message ||
                        "Terjadi kesalahan saat menyimpan kursus.",
                    confirmButtonText: "Tutup",
                    customClass: {
                        confirmButton:
                            "bg-indigo-600 text-white hover:bg-indigo-700",
                    },
                    buttonsStyling: false,
                });
            });
    });
};

window.openAddCourseModal = function (button) {
    openCourseModal("create", button?.dataset?.courseStoreUrl);
};

window.openEditCourseModal = function (button) {
    const url = button?.dataset?.courseUpdateUrl;
    const course = {
        title: button?.dataset?.courseTitle || "",
        slug: button?.dataset?.courseSlug || "",
        price: button?.dataset?.coursePrice || "0.00",
        status: button?.dataset?.courseStatus || "draft",
        description: button?.dataset?.courseDescription || "",
    };
    openCourseModal("edit", url, course);
};
window.openMaterialModal = function (mode, url, material = {}) {
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content;
    if (!url || !csrfToken) {
        window.showToast("Tidak dapat memproses request saat ini.", "error");
        return;
    }

    const pageTitle = mode === "edit" ? "Edit Materi" : "Tambah Materi";

    Swal.fire({
        title: pageTitle,
        width: "min(90vw, 560px)",
        html: ` <div class="space-y-5 text-left">
                <div>
                    <label for="swal-material-title" class="mb-2 block text-sm font-medium text-slate-700">Judul Materi</label>
                    <input id="swal-material-title" type="text" value="${escapeHtml(material.title ?? "")}" placeholder="Masukkan judul materi" class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200">
                </div>

                <div>
                    <label for="swal-material-slug" class="mb-2 block text-sm font-medium text-slate-700">Slug</label>
                    <input id="swal-material-slug" type="text" value="${escapeHtml(material.slug ?? "")}" placeholder="slug-materi-penting" class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200">
                </div>

                <div>
                    <label class="mb-2 block text-sm font-medium text-slate-700">Status</label>
                    <select id="swal-material-status" class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200">
                        <option value="draft" ${material.status === "draft" ? "selected" : ""}>Draft</option>
                        <option value="published" ${material.status === "published" ? "selected" : ""}>Published</option>
                    </select>
                </div>

                <div>
                    <label class="mb-2 block text-sm font-medium text-slate-700">Deskripsi</label>
                    <textarea id="swal-material-description" rows="5" class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200">${escapeHtml(material.description ?? "")}</textarea>
                </div>
            </div>`,
        showCancelButton: true,
        confirmButtonText: mode === "edit" ? "Perbarui" : "Simpan",
        cancelButtonText: "Batal",
        focusConfirm: false,
        customClass: {
            popup: "rounded-3xl border border-slate-200",
            confirmButton: "bg-indigo-600 text-white hover:bg-indigo-700",
            cancelButton: "bg-slate-100 text-slate-700 hover:bg-slate-200",
        },
        didOpen: () => {
            document.getElementById("swal-material-title").focus();
        },
        preConfirm: () => {
            const title = document
                .getElementById("swal-material-title")
                .value.trim();
            const slug = document
                .getElementById("swal-material-slug")
                .value.trim();
            const status = document.getElementById("swal-material-status").value;
            const description = document
                .getElementById("swal-material-description")
                .value.trim();

            if (!title || !slug) {
                Swal.showValidationMessage(
                    "Judul dan slug harus diisi.",
                );
                return false;
            }

            return { title, slug, status, description };
        },
    }).then((result) => {
        if (!result.isConfirmed || !result.value) {
            return;
        }

        fetch(url, {
            method: mode === "edit" ? "PUT" : "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": csrfToken,
                Accept: "application/json",
            },
            body: JSON.stringify(result.value),
        })
            .then(async (response) => {
                const data = await response.json().catch(() => null);
                if (!response.ok) {
                    const message = data?.message || "Gagal menyimpan materi.";
                    throw new Error(message);
                }
                return data;
            })
            .then((data) => {
                window.showToast(
                    data.message ||
                        (mode === "edit"
                            ? "Materi berhasil diperbarui."
                            : "Materi berhasil ditambahkan."),
                    "success",
                );
                setTimeout(() => window.location.reload(), 800);
            })
            .catch((error) => {
                Swal.fire({
                    icon: "error",
                    title: "Gagal",
                    text:
                        error.message ||
                        "Terjadi kesalahan saat menyimpan materi.",
                    confirmButtonText: "Tutup",
                    customClass: {
                        confirmButton:
                            "bg-indigo-600 text-white hover:bg-indigo-700",
                    },
                    buttonsStyling: false,
                });
            });
    });
};

window.openAddMaterialModal = function (button) {
    openMaterialModal("create", button?.dataset?.materialStoreUrl);
};

window.openEditMaterialModal = function (button) {
    const url = button?.dataset?.materialUpdateUrl;
    const material = {
        title: button?.dataset?.materialTitle || "",
        slug: button?.dataset?.materialSlug || "",
        status: button?.dataset?.materialStatus || "draft",
        description: button?.dataset?.materialDescription || "",
    };
    openMaterialModal("edit", url, material);
};

window.openEntityModal = function (entityName, mode, url, item = {}, onlyStatus = false) {
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content;
    if (!url || !csrfToken) {
        window.showToast("Tidak dapat memproses request saat ini.", "error");
        return;
    }

    const label = entityName === "certificate" ? "Sertifikat" : "Laporan";
    const pageTitle = mode === "edit" ? `Edit ${label}` : `Tambah ${label}`;

    Swal.fire({
        title: pageTitle,
        width: "min(90vw, 560px)",
        html: ` <div class="space-y-5 text-left">
                <div>
                    <label for="swal-${entityName}-title" class="mb-2 block text-sm font-medium text-slate-700">Judul ${label}</label>
                    <input id="swal-${entityName}-title" type="text" value="${escapeHtml(item.title ?? "")}" placeholder="Masukkan judul ${entityName}"
                        class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200">
                </div>

                <div>
                    <label for="swal-${entityName}-slug" class="mb-2 block text-sm font-medium text-slate-700">Slug</label>
                    <input id="swal-${entityName}-slug" type="text" value="${escapeHtml(item.slug ?? "")}" placeholder="slug-${entityName}-penting"
                        class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200">
                </div>

                <div>
                    <label class="mb-2 block text-sm font-medium text-slate-700">Status</label>
                    <select id="swal-${entityName}-status" class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200">
                        <option value="draft" ${item.status === "draft" ? "selected" : ""}>Draft</option>
                        <option value="published" ${item.status === "published" ? "selected" : ""}>Published</option>
                    </select>
                </div>

                <div>
                    <label class="mb-2 block text-sm font-medium text-slate-700">Deskripsi</label>
                    <textarea id="swal-${entityName}-description" rows="5"
                        class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200">${escapeHtml(item.description ?? "")}</textarea>
                </div>
            </div>`,
        showCancelButton: true,
        confirmButtonText: mode === "edit" ? "Perbarui" : "Simpan",
        cancelButtonText: "Batal",
        focusConfirm: false,
        customClass: {
            popup: "rounded-3xl border border-slate-200",
            confirmButton: "bg-indigo-600 text-white hover:bg-indigo-700",
            cancelButton: "bg-slate-100 text-slate-700 hover:bg-slate-200",
        },
        didOpen: () => {
            document.getElementById(`swal-${entityName}-title`).focus();
        },
        preConfirm: () => {
            const title = document.getElementById(`swal-${entityName}-title`).value.trim();
            const slug = document.getElementById(`swal-${entityName}-slug`).value.trim();
            const status = document.getElementById(`swal-${entityName}-status`).value;
            const description = document.getElementById(`swal-${entityName}-description`).value.trim();

            if (!title || !slug) {
                Swal.showValidationMessage(`Judul dan slug ${entityName} harus diisi.`);
                return false;
            }

            return { title, slug, status, description };
        },
    }).then((result) => {
        if (!result.isConfirmed || !result.value) {
            return;
        }

        fetch(url, {
            method: mode === "edit" ? "PUT" : "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": csrfToken,
                Accept: "application/json",
            },
            body: JSON.stringify(result.value),
        })
            .then(async (response) => {
                const data = await response.json().catch(() => null);
                if (!response.ok) {
                    const message = data?.message || `Gagal menyimpan ${entityName}.`;
                    throw new Error(message);
                }
                return data;
            })
            .then((data) => {
                window.showToast(
                    data.message ||
                        (mode === "edit"
                            ? `${label} berhasil diperbarui.`
                            : `${label} berhasil ditambahkan.`),
                    "success",
                );
                setTimeout(() => window.location.reload(), 800);
            })
            .catch((error) => {
                Swal.fire({
                    icon: "error",
                    title: "Gagal",
                    text: error.message || `Terjadi kesalahan saat menyimpan ${entityName}.`,
                    confirmButtonText: "Tutup",
                    customClass: {
                        confirmButton: "bg-indigo-600 text-white hover:bg-indigo-700",
                    },
                    buttonsStyling: false,
                });
            });
    });
};

window.openAddCertificateModal = function (button) {
    openEntityModal("certificate", "create", button?.dataset?.certificateStoreUrl);
};

window.openEditCertificateModal = function (button) {
    const url = button?.dataset?.certificateUpdateUrl;
    const certificate = {
        title: button?.dataset?.certificateTitle || "",
        slug: button?.dataset?.certificateSlug || "",
        status: button?.dataset?.certificateStatus || "draft",
        description: button?.dataset?.certificateDescription || "",
    };
    openEntityModal("certificate", "edit", url, certificate);
};

window.openAddReportModal = function (button) {
    openEntityModal("report", "create", button?.dataset?.reportStoreUrl);
};

window.openEditReportModal = function (button) {
    const url = button?.dataset?.reportUpdateUrl;
    const report = {
        title: button?.dataset?.reportTitle || "",
        slug: button?.dataset?.reportSlug || "",
        status: button?.dataset?.reportStatus || "draft",
        description: button?.dataset?.reportDescription || "",
    };
    openEntityModal("report", "edit", url, report);
};

function escapeHtml(value) {
    return String(value || "")
        .replace(/&/g, "&amp;")
        .replace(/</g, "&lt;")
        .replace(/>/g, "&gt;")
        .replace(/"/g, "&quot;")
        .replace(/\'/g, "&#039;");
}

window.addEventListener("DOMContentLoaded", () => {
    const message = document.body.dataset.swalSuccess;
    if (message) {
        window.showToast(message, "success");
    }

    document
        .querySelectorAll('form[data-swal-confirm="true"]')
        .forEach((form) => {
            form.addEventListener("submit", (event) => {
                event.preventDefault();

                const title = form.dataset.swalConfirmTitle || "Konfirmasi";
                const text =
                    form.dataset.swalConfirmText || "Lanjutkan aksi ini?";

                Swal.fire({
                    title: title,
                    text: text,
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonText: "Ya, lanjutkan",
                    cancelButtonText: "Batal",
                    reverseButtons: true,
                    customClass: {
                        confirmButton:
                            "bg-indigo-600 text-white hover:bg-indigo-700",
                        cancelButton:
                            "bg-slate-100 text-slate-700 hover:bg-slate-200",
                    },
                    buttonsStyling: false,
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
});
