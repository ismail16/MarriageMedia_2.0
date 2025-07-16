<template>
	<div class="content">
		<div class="row d-flex justify-content-center">
		    <div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
                <div class="card card-mini dash-card card-2">
                    <div class="card-body">
                        <h2 class="mb-1">6</h2>
                        <p>Pending</p>
                        <span class="mdi mdi-account-clock"></span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
                <div class="card card-mini dash-card card-2">
                    <div class="card-body">
                        <h2 class="mb-1">3</h2>
                        <p>Approved</p>
                        <span class="mdi mdi-account-clock"></span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
                <div class="card card-mini dash-card card-2">
                    <div class="card-body">
                        <h2 class="mb-1">21</h2>
                        <p>Ready To Ship</p>
                        <span class="mdi mdi-account-clock"></span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
                <div class="card card-mini dash-card card-2">
                    <div class="card-body">
                        <h2 class="mb-1">56</h2>
                        <p>Shipped</p>
                        <span class="mdi mdi-account-clock"></span>
                    </div>
                </div>
            </div>

			<div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
                <div class="card card-mini dash-card card-2">
                    <div class="card-body">
                        <h2 class="mb-1">24</h2>
                        <p>Delivered</p>
                        <span class="mdi mdi-account-clock"></span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
                <div class="card card-mini dash-card card-2">
                    <div class="card-body">
                        <h2 class="mb-1">7</h2>
                        <p>Cancelled</p>
                        <span class="mdi mdi-account-clock"></span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
                <div class="card card-mini dash-card card-2">
                    <div class="card-body">
                        <h2 class="mb-1">3</h2>
                        <p>Returned</p>
                        <span class="mdi mdi-account-clock"></span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
                <div class="card card-mini dash-card card-2">
                    <div class="card-body">
                        <h2 class="mb-1">6</h2>
                        <p>Refund Processing</p>
                        <span class="mdi mdi-account-clock"></span>
                    </div>
                </div>
            </div>
        </div>
	</div>
</template>

<script>

export default {
	name: "Dashboard",
	components: {
	},
	data() {
		return {
			userId: '', 

			map: null,
			marker: null,
			echo: null,

			watchId: null,
			trackingStarted: false,

			googleMapsLink: null,
			permissions: '',
			loading: false,

			role_id: '',
			series: [
				{
					name: "Customers",
					data: [],
				},
			],
			chartOptions: {
				chart: {
					height: 350,
					type: "line",
					zoom: {
						enabled: false,
					},
				},
				dataLabels: {
					enabled: false,
				},
				stroke: {
					curve: "straight",
				},
				title: {
					text: "Monthly Users",
					align: "left",
				},
				grid: {
					row: {
						colors: ["#f3f3f3", "transparent"], // takes an array which will be repeated on columns
						opacity: 0.5,
					},
				},
				xaxis: {
					categories: [],
				},
			},
			saleSeries: [
				{
					name: "Customers",
					data: [],
				},
			],
			

		};
	},



	methods: {


		showError(error) {
			let message = '';
			switch (error.code) {
				case error.PERMISSION_DENIED:
				message = 'User denied the request for Geolocation.';
				break;
				case error.POSITION_UNAVAILABLE:
				message = 'Location information is unavailable.';
				break;
				case error.TIMEOUT:
				message = 'The request to get user location timed out.';
				break;
				case error.UNKNOWN_ERROR:
				message = 'An unknown error occurred.';
				break;
			}
			alert(message);
		},


		
		
	},


	mounted() {

		if (localStorage.getItem("permissions")) {
			this.permissions = localStorage.getItem("permissions").split(",");
		}

		this.role_id = localStorage.getItem("role_id");
		this.userId =  localStorage.getItem("user_id");
		var token = localStorage.getItem("token");
		this.token = {
			headers: {
				Authorization: `Bearer ${token}`,
			},
		};

	},

	beforeDestroy() {
		if (this.watchId) {
            navigator.geolocation.clearWatch(this.watchId); // Stop tracking when the component is destroyed
        }
	}
};

</script>