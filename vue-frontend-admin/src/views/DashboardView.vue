<template>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar" class="align-text-bottom"></span>
                This week
            </button>
        </div>
    </div>

    <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
</template>

<script>

export default {
    data: () => ({

    }),
    mounted(){
        // Load CDN
        let featherJs = document.createElement('script');
        featherJs.setAttribute('src', 'https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js');
        featherJs.setAttribute('integrity', 'sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE');
        featherJs.setAttribute('crossorigin', 'anonymous');
        document.head.appendChild(featherJs);

        let chartJs = document.createElement('script');
        chartJs.setAttribute('src', 'https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js');
        chartJs.setAttribute('integrity', 'sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha');
        chartJs.setAttribute('crossorigin', 'anonymous');
        document.head.appendChild(chartJs);

        let dashboardJs = document.createElement('script');
        dashboardJs.setAttribute('src', 'https://getbootstrap.com/docs/5.3/examples/dashboard/dashboard.js');
        document.head.appendChild(dashboardJs);
    },

    methods: {

    }
}
</script>

<style scoped>

</style>
