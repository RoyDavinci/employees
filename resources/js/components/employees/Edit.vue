<template>
    <div>
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Create Page</h1>
        </div>

        <div class="card">
            <div class="card-header">
                Update Employee
                <router-link
                    :to="{ name: 'EmployeesIndex' }"
                    class="float-right"
                >
                    Back
                </router-link>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header"></div>

                            <div class="card-body">
                                <form @submit.prevent="updateEmployee">
                                    <div class="form-group row">
                                        <label
                                            for="first_name"
                                            class="col-md-4 col-form-label text-md-right"
                                            >First Name</label
                                        >

                                        <div class="col-md-6">
                                            <input
                                                id="first_name"
                                                type="text"
                                                v-model="form.first_name"
                                                class="form-control"
                                                name="first_name"
                                                value=""
                                                required
                                                autocomplete="first_name"
                                                autofocus
                                            />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label
                                            for="last_name"
                                            class="col-md-4 col-form-label text-md-right"
                                            >Last Name</label
                                        >

                                        <div class="col-md-6">
                                            <input
                                                id="last_name"
                                                type="text"
                                                v-model="form.last_name"
                                                class="form-control "
                                                name="last_name"
                                                value=""
                                                required
                                                autocomplete="last_name"
                                                autofocus
                                            />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label
                                            for="middle_name"
                                            class="col-md-4 col-form-label text-md-right"
                                            >Middle Name</label
                                        >

                                        <div class="col-md-6">
                                            <input
                                                id="middle_name"
                                                type="text"
                                                v-model="form.middle_name"
                                                class="form-control "
                                                name="middle_name"
                                                value=""
                                                required
                                                autocomplete="middle_name"
                                                autofocus
                                            />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label
                                            for="address"
                                            class="col-md-4 col-form-label text-md-right"
                                            >Address</label
                                        >

                                        <div class="col-md-6">
                                            <input
                                                id="address"
                                                v-model="form.address"
                                                type="text"
                                                class="form-control "
                                                name="address"
                                                value=""
                                                required
                                                autocomplete="address"
                                                autofocus
                                            />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label
                                            for="zip_code"
                                            class="col-md-4 col-form-label text-md-right"
                                            >Zip Code</label
                                        >

                                        <div class="col-md-6">
                                            <input
                                                id="zip_code"
                                                type="text"
                                                v-model="form.zip_code"
                                                class="form-control "
                                                name="zip_code"
                                                value=""
                                                required
                                                autocomplete="zip_code"
                                                autofocus
                                            />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label
                                            for="department_id"
                                            class="col-md-4 col-form-label text-md-right"
                                            >Department</label
                                        >
                                        <select
                                            v-model="form.department_id"
                                            class="form-select"
                                            name="department_id"
                                            aria-label="Default select example"
                                        >
                                            <option
                                                v-for="department in departments"
                                                :key="department.id"
                                                :value="department.id"
                                                >{{ department.name }}
                                            </option>
                                        </select>
                                    </div>

                                    <div class="form-group row">
                                        <label
                                            for="country_id"
                                            class="col-md-4 col-form-label text-md-right"
                                            >Country</label
                                        >
                                        <select
                                            v-model="form.country_id"
                                            @change="getStates()"
                                            class="form-control"
                                            name="country_id"
                                            aria-label="Default select example"
                                            id="country_id"
                                        >
                                            <option
                                                v-for="country in countries"
                                                :key="country.id"
                                                :value="country.id"
                                                >{{ country.name }}</option
                                            >
                                        </select>
                                    </div>

                                    <div class="form-group row">
                                        <label
                                            for="state_id"
                                            class="col-md-4 col-form-label text-md-right"
                                            >State</label
                                        >
                                        <select
                                            v-model="form.state_id"
                                            @change="getCities()"
                                            class="form-select"
                                            name="state_id"
                                            aria-label="Default select example"
                                        >
                                            <option
                                                v-for="state in states"
                                                :key="state.id"
                                                :value="state.id"
                                                >{{ state.name }}</option
                                            >
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label
                                            for="city_id"
                                            class="col-md-4 col-form-label text-md-right"
                                            >City</label
                                        >
                                        <select
                                            v-model="form.city_id"
                                            class="form-select"
                                            name="city_id"
                                            aria-label="Default select example"
                                        >
                                            <option
                                                v-for="city in cities"
                                                :key="city.id"
                                                :value="city.id"
                                                >{{ city.name }}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label
                                            for="zip_code"
                                            class="col-md-4 col-form-label text-md-right"
                                            >Birth Date</label
                                        >

                                        <div class="col-md-6">
                                            <datepicker
                                                input-class="form-control"
                                                v-model="form.birthdate"
                                            ></datepicker>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label
                                            for="zip_code"
                                            class="col-md-4 col-form-label text-md-right"
                                            >Date Hired</label
                                        >

                                        <div class="col-md-6">
                                            <datepicker
                                                input-class="form-control"
                                                v-model="form.date_hired"
                                            ></datepicker>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0 mt-4">
                                        <div class="col-md-6 offset-md-4">
                                            <button
                                                type="submit"
                                                class="btn btn-primary"
                                            >
                                                Update
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import Datepicker from "vuejs-datepicker";
import moment from "moment";

export default {
    // ...
    components: {
        Datepicker
    },
    data() {
        return {
            countries: [],
            departments: [],
            cities: [],
            states: [],
            form: {
                first_name: "",
                last_name: "",
                middle_name: "",
                country_id: "",
                department_id: "",
                city_id: "",
                state_id: "",
                zip_code: "",
                date_hired: null,
                address: "",
                birthdate: null
            }
        };
    },
    created() {
        this.getCountries();
        this.getDepartments();
        this.getEmployees();
        this.getStates();
        this.getCities();
    },
    methods: {
        getEmployees() {
            axios
                .get(`/api/employees/${this.$route.params.id}`)
                .then(res => {
                    this.form = res.data.data;
                    console.log(res);
                })
                .catch(err => {
                    console.log(err);
                });
        },
        getCountries() {
            axios
                .get("/api/employees/countries")
                .then(res => {
                    this.countries = res.data;
                    console.log(res);
                })
                .catch(err => {
                    console.log(err);
                });
        },
        getDepartments() {
            axios
                .get("/api/employees/departments")
                .then(res => {
                    this.departments = res.data;
                })
                .catch(err => {
                    console.log(err);
                });
        },
        getStates() {
            axios
                .get(`/api/employees/${this.form.country_id}/states`)
                .then(res => {
                    this.states = res.data;
                    console.log(res);
                })
                .catch(err => {
                    console.log(err);
                });
        },
        getCities() {
            axios
                .get(`/api/employees/${this.form.state_id}/cities`)
                .then(res => {
                    this.cities = res.data;
                    console.log(res);
                })
                .catch(err => {
                    console.log(err);
                });
        },
        updateEmployee() {
            axios
                .put(`/api/employees/${this.$route.params.id}`, {
                    first_name: this.form.first_name,
                    last_name: this.form.last_name,
                    middle_name: this.form.middle_name,
                    address: this.form.address,
                    city_id: this.form.city_id,
                    department_id: this.form.department_id,
                    state_id: this.form.state_id,
                    country_id: this.form.country_id,
                    zip_code: this.form.zip_code,
                    birthdate: this.format_date(this.form.birthdate),
                    date_hired: this.format_date(this.form.date_hired)
                })
                .then(res => {
                    this.$router.push({ name: "EmployeesIndex" });
                })
                .catch(err => {
                    console.log(err);
                });
        },
        format_date(value) {
            if (value) {
                return moment(String(value)).format("YYYYMMdd");
            }
        }
    }

    // ...
};
</script>
<style></style>
