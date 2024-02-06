<template>
    <div class="nav-container primary-menu">
        <div class="mobile-topbar-header">
            <div>
                <img src="../assets/admin/images/logo-icon.png" class="logo-icon" alt="logo icon">
            </div>
            <div>
                <h4 class="logo-text">Rukada</h4>
            </div>
            <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
            </div>
        </div>
        <nav class="navbar navbar-expand-xl w-100">
            <ul class="navbar-nav justify-content-start flex-grow-1 gap-1">
                <li class="nav-item">
                    <router-link to="/admin/movie">
                        <a href="#" class="nav-link">
                            <div class="parent-icon">
                                <i class="fa-solid fa-film"></i>
                            </div>
                            <div class="menu-title">Phim</div>
                        </a>
                    </router-link>


                    <router-link to="/admin/language">
                        <a href="#" class="nav-link">
                            <div class="parent-icon">
                                <i class="fa-solid fa-language"></i>
                            </div>
                            <div class="menu-title">Ngôn Ngữ</div>
                        </a>
                    </router-link>
                    <router-link to="/admin/author">
                        <a href="#" class="nav-link">
                            <div class="parent-icon">
                                <i class="fa-solid fa-user-tie"></i>
                            </div>
                            <div class="menu-title">Đạo Diễn</div>
                        </a>
                    </router-link>
                    <router-link to="/admin/employee">
                        <a href="#" class="nav-link">
                            <div class="parent-icon">
                                <i class="fa-solid fa-person"></i>
                            </div>
                            <div class="menu-title">Nhân Viên</div>
                        </a>
                    </router-link>
                    <router-link to="/admin/country">
                        <a href="#" class="nav-link">
                            <div class="parent-icon">
                                <i class="fa-solid fa-flag"></i>
                            </div>
                            <div class="menu-title">Quốc gia</div>
                        </a>
                    </router-link>

                    <router-link to="/admin/client">
                        <a href="#" class="nav-link">
                            <div class="parent-icon">
                                <i class="fa-solid fa-clipboard-question"></i>
                            </div>
                            <div class="menu-title">Khách Hàng</div>
                        </a>
                    </router-link>
                    <router-link to="/admin/actor">
                        <a href="#" class="nav-link">
                            <div class="parent-icon">
                                <i class="fa-solid fa-masks-theater"></i>
                            </div>
                            <div class="menu-title">Diễn Viên</div>
                        </a>
                    </router-link>
                    <router-link to="/admin/type">
                        <a href="/admin/the-loai" class="nav-link">
                            <div class="parent-icon">
                                <i class="fa-regular fa-clone"></i>
                            </div>
                            <div class="menu-title">Thể Loại</div>
                        </a>
                    </router-link>
                </li>
            </ul>
        </nav>
    </div>
</template>
<script>
export default {

}
</script>
<style></style>