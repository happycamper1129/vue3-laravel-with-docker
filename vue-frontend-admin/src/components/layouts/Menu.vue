<template>
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3 sidebar-sticky">

            <ul class="nav flex-column">
                <li class="nav-item">
                    <router-link to="/" active-class="active" class="nav-link" aria-current="page">
                        <span data-feather="home" class="align-text-bottom"></span>
                        Dashboard
                    </router-link>
                </li>
                <li class="nav-item">
                    <router-link to="/users" active-class="active" class="nav-link">
                        <span data-feather="file" class="align-text-bottom"></span>
                        Users
                    </router-link>
                </li>
                <li class="nav-item">
                    <router-link to="/register" active-class="active" class="nav-link">
                        <span data-feather="file" class="align-text-bottom"></span>
                        Register
                    </router-link>
                </li>
            </ul>

            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
                <span>Saved reports</span>
                <a class="link-secondary" href="#" aria-label="Add a new report">
                    <span data-feather="plus-circle" class="align-text-bottom"></span>
                </a>
            </h6>

            <ul class="nav flex-column mb-2">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <span data-feather="file-text" class="align-text-bottom"></span>
                        Current month
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <span data-feather="file-text" class="align-text-bottom"></span>
                        Last quarter
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <span data-feather="file-text" class="align-text-bottom"></span>
                        Social engagement
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <span data-feather="file-text" class="align-text-bottom"></span>
                        Year-end sale
                    </a>
                </li>
            </ul>

        </div>
    </nav>
</template>

<script>
export default {
    name: "Menu"
}
</script>

<style scoped>

</style>
